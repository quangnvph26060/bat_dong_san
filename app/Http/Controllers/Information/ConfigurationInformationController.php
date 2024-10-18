<?php

namespace App\Http\Controllers\Information;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ConfigurationInformationController extends Controller
{
    function index()
    {

        return view('admin.information.index');
    }

    function save(Request $request)
    {

        $config = Config::first();
        try {
            DB::beginTransaction();
            // Xác thực đầu vào
            $cridentials = $this->validator($request);

            // Kiểm tra xem có lỗi xác thực không
            if ($cridentials->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $cridentials->errors(),
                    'message' => 'Vui lòng nhập đúng thông tin!'
                ]);
            }

            // Khởi tạo một mảng để lưu trữ dữ liệu
            $data = $cridentials->validated(); // Lấy giá trị đã xác thực

            // dd($data);

            // Lưu ảnh banner nếu có
            if (isset($request->banner)) {
                $data['banner'] = saveImages($request, 'banner', 'images', 2048, 1024);
                deleteImageStorage($config->banner);
            }

            // Lưu ảnh logo nếu có
            if (isset($request->logo)) {
                $data['logo'] = saveImages($request, 'logo', 'images', 150, 100);
                deleteImageStorage($config->logo);
            }

            // icon
            if (isset($request->icon)) {
                $data['icon'] = saveImages($request, 'icon', 'images', 32, 29);
                deleteImageStorage($config->icon);
            }

            $config->update($data);


            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            // Ghi log lỗi
            Log::error($e->getMessage() . ' - Line: ' . $e->getLine());

            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau ít phút!'
            ]);
        }
    }



    private function validator(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'company_name'          => 'required',
                'departments'           => 'required',
                'address'               => 'required',
                'hotline'               => 'required|regex:/^[0-9]{3}\.[0-9]{4}\.[0-9]{3}$/',
                'email'                 => 'required|email',
                'banner'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'footer'                => 'required',
                'logo'                  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'icon'                  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'seo_description'       => 'nullable|string',
                'seo_keyword'           => 'nullable|string',
                'seo_title'            => 'nullable|string',
            ],
            __('request.messages'),
            [
                'company_name'          => 'Tên công ty',
                'departments'           => 'Phòng ban',
                'address'               => 'Địa chỉ',
                'hotline'               => 'Số điện thoại',
                'email'                 => 'Email',
                'footer'                => 'Chân trang',
            ]
        );
    }
}
