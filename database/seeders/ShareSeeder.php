<?php

namespace Database\Seeders;

use App\Models\Share;
use Illuminate\Database\Seeder;

class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Share::factory()->count(20)->create();
    }
}
