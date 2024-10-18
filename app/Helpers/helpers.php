<?php

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

/**
 * Lưu hình ảnh và trả về đường dẫn.
 *
 * @param string $inputName
 * @param string $directory
 * @return string|null
 */
function saveImages($request, string $inputName, string $directory = 'images', $width = 150, $height = 150, $isArray = false)
{
    $paths = [];

    // Kiểm tra xem có file không
    if ($request->hasFile($inputName)) {
        // Lấy tất cả các file hình ảnh
        $images = $request->file($inputName);

        if (!is_array($images)) {
            $images = [$images]; // Đưa vào mảng nếu chỉ có 1 ảnh
        }

        // Tạo instance của ImageManager
        $manager = new ImageManager(new Driver());

        foreach ($images as $key => $image) {
            // Đọc hình ảnh từ đường dẫn thực
            $img = $manager->read($image->getRealPath());

            // Thay đổi kích thước
            $img->resize($width, $height);

            // Tạo tên file duy nhất
            $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Lưu hình ảnh đã được thay đổi kích thước vào storage
            Storage::put($directory . '/' . $filename, $img->encode());

            // Lưu đường dẫn vào mảng
            $paths[$key] = $directory . '/' . $filename;
        }

        // Trả về danh sách các đường dẫn
        return $isArray ? $paths : $paths[0];
    }

    return null;
}

function saveImage($image, string $directory = 'images', $width = 150, $height = 150)
{
    // Tạo instance của ImageManager
    $manager = new ImageManager(new Driver());

    // Đọc hình ảnh từ đường dẫn thực
    $img = $manager->read($image->getRealPath());

    // Thay đổi kích thước
    $img->resize($width, $height);

    // Tạo tên file duy nhất
    $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();

    // Lưu hình ảnh đã được thay đổi kích thước vào storage
    Storage::put($directory . '/' . $filename, $img->encode());

    // Trả về đường dẫn
    return $directory . '/' . $filename;
}

function showImageStorage($path)
{
    if ($path && Storage::exists($path)) {
        return Storage::url($path);
    }

    return asset('assets/img/banner.jpg');
}

function deleteImageStorage($path)
{
    if ($path && Storage::exists($path)) {
        Storage::delete($path);
    }
}
