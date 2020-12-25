<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ShareSeeder::class);
        $this->call(TaggableSeeder::class);
    }
}
