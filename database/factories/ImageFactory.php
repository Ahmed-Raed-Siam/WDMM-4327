<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $imageables = [
            User::class,
            Post::class,
        ];
        $imageable_type = $this->faker->randomElement($imageables);
        $imageable = $this->faker->randomElement($imageables);
        return [
            'url' => $this->faker->url.'image.jpg',
            'imageable_id' => self::factoryForModel($imageable),
            'imageable_type' => $imageable_type,
        ];
    }
}
