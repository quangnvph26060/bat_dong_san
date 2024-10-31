<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $image = null;
        try {
            $data = $this->validator($request);
            if ($data->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $data->errors(),
                    'message' => 'Vui lòng kiểm tra lại thông tin!'
                ]);
            }

            DB::beginTransaction();

            $data = $data->validated();

            if ($request->hasFile('image')) {
                $data['image'] = saveImages($request, 'image', 'images', 2048, 1463);
                $image = $data['image'];
            }
            News::create($data);

            DB::commit();

            session()->flash('success', 'Thêm bài viết thành công.');

            return response()->json([
                'status' => true,
                'message' => 'Đã lưu thành công!',
                'redirect' => route('admin.news.index')
            ]);
        } catch (\Exception $e) {
            deleteImageStorage($image);
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau ít phút!',
            ]);
        }
    }

    private function validator(Request $request)
    {

        $rules = [
            'title' => [
                'required',
                $request->id
                    ? Rule::unique('news', 'title')->ignore($request->id) // Nếu có id, bỏ qua kiểm tra unique cho id này
                    : 'unique:news,title',  // Nếu không có id, kiểm tra unique cho trường title
            ],
            'content' => 'required',
            'keywords' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'seo_description' => 'required|string',
            'status' => 'required|boolean',
        ];


        // if ($request->published_at) {
        //     $rules['published_at'] = 'date|date_format:Y-m-d\TH:i|after:today';
        // }

        return Validator::make(
            $request->all(),
            $rules,
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung',
                'keywords' => 'Từ khóa',
                'image' => 'Ảnh',
                'published_at' => 'Ngày đăng',
                'seo_description' => 'Mô tả seo',
            ]
        );
    }

    public function edit(News $news)
    {
        $news = $news->first();

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, string $id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy bài viết!'
            ]);
        }
        try {
            $data = $this->validator($request);
            if ($data->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $data->errors(),
                    'message' => 'Vui lòng kiểm tra lại thông tin!'
                ]);
            }

            DB::beginTransaction();

            $data = $data->validated();

            if ($request->hasFile('image')) {
                deleteImageStorage($news->image);
                $data['image'] = saveImages($request, 'image', 'images', 2048, 1463);
            }

            $news->update($data);

            DB::commit();

            session()->flash('success', 'Cập nhật bài viết thành công.');

            return response()->json([
                'status' => true,
                'message' => 'Đã lưu thành công!',
                'redirect' => route('admin.news.index')
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra. Vui được thử lại sau ít phút!',
            ]);
        }
    }
}
