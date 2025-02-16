<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(6); // Tiêu đề không bị trùng
        return [
            'title' => $title,
            'slug' => Str::slug($title), // Không cần thêm số ngẫu nhiên nếu dùng unique()
            'content' => $this->faker->paragraphs(3, true),
            'image' => 'images/news' . rand(1, 5) . '.jpg',
            'views' => rand(100, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
