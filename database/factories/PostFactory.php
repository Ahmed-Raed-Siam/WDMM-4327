<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence,
            'body' => $this->faker->text,
            'feature_image' => 'posts/feature_images/img.jpg',
            'large_image' => 'posts/large_image/img.jpg',
            'views' => random_int(20,200),
            'shares' => random_int(20,200),
            'category_id' => Category::all()->random(),
            'user_id' => User::all()->random()
        ];
    }
}
