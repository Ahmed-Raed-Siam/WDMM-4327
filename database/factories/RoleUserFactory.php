<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random(),
            'role_id' => Role::all()->random()
        ];
    }
}
