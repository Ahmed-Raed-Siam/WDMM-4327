<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaggableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taggable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $taggables = [
            Post::class,
            Video::class,
        ];
        $taggable_type = $this->faker->randomElement($taggables);
        $taggable = $this->faker->randomElement($taggables);
        return [
            'tag_id' => Tag::all()->random()->id,
            'taggable_id' => self::factoryForModel($taggable),
            'taggable_type' => $taggable_type,
        ];
    }
}
