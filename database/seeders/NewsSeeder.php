<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $newsData = [
            [
                'title' => 'Màu sắc nổi bật dành cho phái mạnh',
                'slug' => Str::slug('Màu sắc nổi bật dành cho phái mạnh'),
                'content' => 'Những gam màu rực rỡ đang trở thành xu hướng trong thời trang nam...',
                'image' => 'images/news1.jpg',
            ],
            [
                'title' => 'Sơ mi denim cho chàng khoẻ cá tính',
                'slug' => Str::slug('Sơ mi denim cho chàng khoẻ cá tính'),
                'content' => 'Sơ mi denim không chỉ mang lại sự thoải mái mà còn giúp các chàng trai trông mạnh mẽ hơn...',
                'image' => 'images/news2.jpg',
            ],
            [
                'title' => 'Quý ông: mặc gì để “trẻ mãi không già”?',
                'slug' => Str::slug('Quý ông: mặc gì để trẻ mãi không già?'),
                'content' => 'Việc lựa chọn trang phục phù hợp có thể giúp bạn trông trẻ trung hơn...',
                'image' => 'images/news3.jpg',
            ],
        ];

        foreach ($newsData as $news) {
            DB::table('news')->insert([
                'title' => $news['title'],
                'slug' => $news['slug'],
                'content' => $news['content'],
                'image' => $news['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        News::factory()->count(10)->create([
            'views' => rand(100, 1000) // Tạo giá trị ngẫu nhiên cho views
        ]);
    }
}
