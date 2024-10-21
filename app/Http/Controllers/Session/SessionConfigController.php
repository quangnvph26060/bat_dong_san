<?php

namespace App\Http\Controllers\Session;

use App\Models\Config;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\BuildingImage;
use App\Models\ConfigSession01;
use App\Models\ConfigSession02;
use App\Models\ConfigSession03;
use App\Models\ConfigSession04;
use App\Models\ConfigSession05;
use App\Models\ConfigSession06;
use App\Models\ConfigSession07;
use App\Models\ConfigSession08;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SessionConfigController extends Controller
{
    function session()
    {

        $titles = ConfigSession07::with('toas.images')->get();

        return view('admin.session.index', compact('titles'));
    }

    public function save(Request $request)
    {
        switch ($request->type) {
            case 'tab-1':
                return $this->sessionOne($request);
            case 'tab-2':
                return $this->sessionTwo($request);
            case 'tab-3':
                return $this->sessionThree($request);
            case 'tab-4':
                return $this->sessionFour($request);
            case 'tab-5':
                return $this->sessionFive($request);
            case 'tab-6':
                return $this->sessionSix($request);
            case 'tab-7':
                return $this->sessionSeven($request);
            case 'tab-8':
                return $this->sessionEight($request);
            case 'tab-9':
                return $this->sessionNine($request);
            default:
                return response()->json([
                    'status' => false,
                    'message' => 'Loại dữ liệu không hợp lệ'
                ]);
        }
    }

    protected function sessionOne(Request $request)
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
                $data['image_container'] = saveImages($request, 'image_container', 'public/images', 2048, 1463);
                deleteImageStorage($config->image_container);
            } else {
                $data['image_container'] = $config->image_container;
            }

            if ($request->hasFile('image_thumbnail')) {
                $oldImage = $config->image_thumbnail;


                $imageThumbnailKeys = array_keys(array_filter($request->image_thumbnail, function ($value) {
                    return $value !== null;
                }));


                $newArrayImage = saveImages($request, 'image_thumbnail', 'public/images', 768, 432, true);

                foreach ($imageThumbnailKeys as $index) {
                    if (isset($oldImage[$index])) {
                        deleteImageStorage($oldImage[$index]);

                        $oldImage[$index] = $newArrayImage[$index];
                    } else {
                        $oldImage[$index] = $newArrayImage[$index];
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

    protected function sessionTwo(Request $request)
    {
        $session_01 = ConfigSession01::first();
        $validator = Validator::make($request->all(), [
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_title' => 'nullable|string',
            'extra_title' => 'nullable|string',
            'extra_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text' => 'nullable|string',
        ]);

        $data = $validator->validated();

        if ($request->hasFile('main_image')) {
            deleteImageStorage($session_01->main_image);

            $main_image = saveImages($request, 'main_image', 'public/images', 1241, 1755);

            $data['main_image'] = $main_image;
        }

        if (is_null($session_01)) {
            ConfigSession01::create($data);
        }

        $session_01->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    protected function sessionThree(Request $request)
    {
        $session_02 = ConfigSession02::first();
        $validator = Validator::make($request->all(), [
            'title_s2' => 'nullable|string',
            'link_video' => 'nullable|string',
            'text_s2' => 'nullable|string',
        ]);

        $data = $validator->validated();

        if (is_null($session_02)) {
            ConfigSession02::create($data);
        } else {
            $session_02->update($data);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    protected function sessionFour(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_s3' => 'nullable|string',
            'text_s3' => 'nullable|string',
            'image_s3' => 'nullable|array',
            'image_s3.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validator->validated();

        try {
            $session_03 = ConfigSession03::first();
            if ($request->hasFile('image_s3')) {
                $oldImage = $session_03->image_s3 ?? [];
                $imageThumbnailKeys = array_keys($request->image_s3);

                $newArrayImage = saveImages($request, 'image_s3', 'public/images', 300, 168, true);

                foreach ($imageThumbnailKeys as $index) {
                    if (isset($oldImage[$index])) {
                        deleteImageStorage($oldImage[$index]);

                        $oldImage[$index] = $newArrayImage[$index];
                    } else {
                        $oldImage[$index] = $newArrayImage[$index];
                    }
                }

                $data['image_s3'] = $oldImage;
            } else {
                $data['image_s3'] = $session_03->image_s3;
            }


            if (is_null($session_03)) {
                ConfigSession03::create($data);
            } else {
                $session_03->update($data);
            }
        } catch (\Exception $e) {
            Log::error('Loi cap nhat config: ' . $e->getMessage() . ' - ' . $e->getLine());
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    protected function sessionFive(Request $request)
    {
        $session_04 = ConfigSession04::first();
        $validator = Validator::make($request->all(), [
            'small_banner_s4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text_s4' => 'nullable|string',
            'banner_s4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4 ' => 'nullable',
        ]);

        $data = $validator->validated();

        if ($request->hasFile('small_banner_s4')) {
            deleteImageStorage($session_04->small_banner_s4);
            $data['small_banner_s4'] = saveImages($request, 'small_banner_s4', 'public/images', 1670, 136);
        }

        if ($request->hasFile('banner_s4')) {
            deleteImageStorage($session_04->banner_s4);
            $data['banner_s4'] = saveImages($request, 'banner_s4', 'public/images', 2560, 1024);
        }

        if ($request->hasFile('image_4')) {
            deleteImageStorage($session_04->image_4);
            $data['image_4'] = saveImages($request, 'image_4', 'public/images', 2560, 1828);
        }

        $session_04 = ConfigSession04::first();

        if (is_null($session_04)) {
            ConfigSession04::create($data);
        } else {
            $session_04->update($data);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    protected function sessionSix(Request $request)
    {
        $session_05 = ConfigSession05::first();
        $validator = Validator::make(
            $request->all(),
            [
                'main_title_s5' => 'nullable|string',
                'extra_title_s5' => 'nullable|string',
                'text_s5' => 'nullable|string',
                'main_image_s5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'extra_image_s5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $data = $validator->validated();

        if ($request->hasFile('main_image_s5')) {
            deleteImageStorage($session_05->main_image_s5);
            $data['main_image_s5'] = saveImages($request, 'main_image_s5', 'public/images', 2560, 1440);
        }

        if ($request->hasFile('extra_image_s5')) {
            deleteImageStorage($session_05->extra_image_s5);
            $data['extra_image_s5'] = saveImages($request, 'extra_image_s5', 'public/images', 2560, 1280);
        }

        if (is_null($session_05)) {
            ConfigSession05::create($data);
        } else {
            $session_05->update($data);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }


    protected function sessionSeven(Request $request)
    {
        $session_06 = ConfigSession06::first();
        $validator = Validator::make(
            $request->all(),
            [
                'title_s6' => 'nullable|string',
                'slider_s6' => 'nullable|array',
                'text_s6' => 'nullable|string',
                'images_s6' => 'nullable|array',
                'images_s6.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $data = $validator->validated();

        if ($request->hasFile('images_s6')) {
            $oldImage = $session_06->images_s6 ?? [];

            $imageThumbnailKeys = array_keys($request->images_s6);
            $newArrayImage = saveImages($request, 'images_s6', 'public/images', 768, 512, true);

            foreach ($imageThumbnailKeys as $index) {
                if (isset($oldImage[$index])) {
                    // Xóa hình ảnh cũ và cập nhật với hình ảnh mới
                    deleteImageStorage($oldImage[$index]);
                    $oldImage[$index] = $newArrayImage[$index];  // Gán phần tử đúng
                } else {
                    // Chỉ thêm hình ảnh mới tương ứng tại vị trí chỉ định
                    $oldImage[$index] = $newArrayImage[$index];  // Gán đúng chỉ mục
                }
            }

            $data['images_s6'] = $oldImage;
        } else {
            $data['images_s6'] = $session_06->images_s6 ?? [];
        }

        // dd($data);


        if ($request->hasFile('slider_s6')) {
            $oldSlider = $session_06->slider_s6 ?? [];
            $sliderKeys = array_keys($request->slider_s6);
            $newArraySlider = saveImages($request, 'slider_s6', 'public/images', 768, 512, true);

            foreach ($sliderKeys as $index) {
                if (isset($oldSlider[$index])) {
                    deleteImageStorage($oldSlider[$index]);
                    $oldSlider[$index] = $newArraySlider[$index];
                } else {
                    $oldSlider[$index] = $newArraySlider[$index];  // Chỉ gán đúng phần tử
                }
            }

            $data['slider_s6'] = $oldSlider;
        } else {
            $data['slider_s6'] = $session_06->slider_s6 ?? [];
        }



        if (is_null($session_06)) {
            ConfigSession06::create($data);
        } else {
            $session_06->update($data);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    protected function sessionEight(Request $request)
    {
        // Sử dụng transaction để đảm bảo tất cả các thao tác lưu trữ thành công
        DB::beginTransaction();
        try {
            // Lưu thông tin title
            $titleData = [
                'title_s7' => $request->input('title'),
                'displayed_location' => $request->input('displayed_location', ''),
            ];

            $title = ConfigSession07::create($titleData);

            // Lưu thông tin các buildings
            foreach ($request->buildings as $building) {
                // Tạo building record
                $buildingData = [
                    'title_id' => $title->id,
                    'building_name' => $building['name'],
                ];
                $buildingRecord = Building::create($buildingData);

                // Lưu từng hình ảnh của building
                if (isset($building['images']) && is_array($building['images'])) {
                    foreach ($building['images'] as $image) {
                        $imagePath = saveImage($image, 'building_images', 2560, 1810);

                        // Lưu thông tin ảnh vào bảng building_images
                        BuildingImage::create([
                            'building_id' => $buildingRecord->id,
                            'image' => $imagePath,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công!',
                'html' => view('admin/session/response/detail', compact('title'))->render()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error saving data', 'error' => $e->getMessage()], 500);
        }
    }

    protected function sessionNine(Request $request)
    {
        $session_09 = ConfigSession08::first();

        $validator = Validator::make($request->all(), [
            'title_s8' => 'nullable|string',
            'content_s8' => 'nullable|string',
            'images_s8' => 'nullable|array',
            'images_s8.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $validator->validated();

        if ($request->hasFile('images_s8')) {
            $oldImage = $session_09->images_s8 ?? [];

            $imageThumbnailKeys = array_keys($request->images_s8);

            $newArrayImage = saveImages($request, 'images_s8', 'public/images', 2560, 1280, true);

            foreach ($imageThumbnailKeys as $index) {
                if (isset($oldImage[$index])) {
                    deleteImageStorage($oldImage[$index]);
                    $oldImage[$index] = $newArrayImage[$index];
                } else {
                    $oldImage[$index] = $newArrayImage[$index];
                }
            }

            $data['images_s8'] = $oldImage;


            if (is_null($session_09)) {
                ConfigSession08::create($data);
            } else {
                $session_09->update($data);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }

    public function destroy()
    {
        $id = request()->input('id');
        $title = ConfigSession07::find($id);

        if (is_null($title)) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy title!'
            ]);
        }

        $title->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa thành công!'
        ]);
    }

    public function edit() {
        $id = request()->input('id');
        $title = ConfigSession07::with('toas.images')->find($id);

        if (is_null($title)) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy title!'
            ]);
        }

        return response()->json([
            'status' => true,
            'title' => $title,
        ]);
    }

    public function update(Request $request) {
        dd($request->all());
    }


}
