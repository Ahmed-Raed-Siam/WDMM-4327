<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Share;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Share::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $shareables = [
            Post::class,
            Video::class,
        ];
        $shareable_type = $this->faker->randomElement($shareables);
        $shareable = $this->faker->randomElement($shareables);
        return [
            'url' => $this->faker->url,
            'shareable_id' => self::factoryForModel($shareable),
            'shareable_type' => $shareable_type,
        ];
    }
}
