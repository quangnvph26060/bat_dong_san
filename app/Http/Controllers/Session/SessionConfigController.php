<?php

namespace App\Http\Controllers\Session;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SessionConfigController extends Controller
{
    function session()
    {
        return view('admin.session.index');
    }

    public function save(Request $request)
    {
        switch ($request->type) {
            case 'tab-1':
                return $this->s1($request);
            case 'tab-2':
                // Xử lý dữ liệu của tab 2
                return $this->s2($request);

            default:
                return response()->json([
                    'status' => false,
                    'message' => 'Loại dữ liệu không hợp lệ'
                ]);
        }
    }

    protected function s1(Request $request)
    {
        $config = Config::first();
        $data = Validator::make(
            $request->all(),
            [
                'main_title' => 'required',
                'short_content' => 'required',
                'title' => 'required',
                'content' => 'required',
                'image_container' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image_thumbnail' => 'nullable|array',
                'image_thumbnail.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'main_title' => 'Tiêu đề',
                'short_content' => 'Nội dung',
                'image_container' => 'Ảnh',
                'image_thumbnail' => 'Ảnh',
            ]
        );

        if ($data->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $data->errors(),
                'message' => 'Vui lòng kiểm tra lại!'
            ]);
        }

        $data = $data->validated();
        DB::beginTransaction();
        try {
            if (isset($request->image_container)) {
                $data['image_container'] = saveImages($request, 'image_container', 'images', 2048, 1463);
                deleteImageStorage($config->image_container);
            } else {
                $data['image_container'] = $config->image_container;
            }

            if ($request->hasFile('image_thumbnail')) {
                $oldImage = $config->image_thumbnail;


                $imageThumbnailKeys = array_keys(array_filter($request->image_thumbnail, function ($value) {
                    return $value !== null;
                }));


                $newArrayImage = saveImages($request, 'image_thumbnail', 'images', 768, 432, true);

                foreach ($imageThumbnailKeys as $index) {
                    if (isset($oldImage[$index])) {
                        deleteImageStorage($oldImage[$index]);

                        $oldImage[$index] = $newArrayImage[$index];
                    } else {
                        $oldImage[$index] = $newArrayImage;
                    }
                }

                $data['image_thumbnail'] = $oldImage;
            } else {
                $data['image_thumbnail'] = $config->image_thumbnail;
            }

            $config->update($data);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công!'
            ]);
        } catch (\Exception $e) {
            Log::error('Loi cap nhat config: ' . $e->getMessage() . ' - ' . $e->getLine());
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Cập nhật thất bại!'
            ]);
        }
    }

    protected function s2(Request $request){
        dd($request->all());
    }
}
