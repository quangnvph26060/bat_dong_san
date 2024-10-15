<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        // if (Bank::query()->first())
        //     return;

        // $file_path = resource_path('sql/bank.json');
        // $data      = json_decode(file_get_contents($file_path));
        // foreach ($data->RECORDS as $item) {
        //     $cities[] = [
        //         'id'         => $item->id,
        //         'name'       => $item->name,
        //         'code'       => $item->code,
        //         'bin'        => $item->bin,
        //         'shortName'  => $item->shortName
        //     ];
        // }
        // Bank::query()->insert($cities ?? []);

        for ($index = 0; $index < 100; $index++) {
            $title = fake()->sentence;
            News::query()->create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => fake()->paragraphs(5, true), // Nội dung giả
                'image' => fake()->imageUrl(640, 480, 'news', true), // URL ảnh giả
                'published_at' => fake()->dateTimeBetween('-1 month', '+1 month'), // Ngày đăng giả
                'unpublished_at' => fake()->optional()->dateTimeBetween('+2 months', '+6 months'), // Ngày gỡ giả
                'keywords' => implode(',', fake()->words(5)), // Từ khóa giả
                'status' => rand(0, 1), // Trạng thái ngẫu nhiên
            ]);
        }
    }
}
