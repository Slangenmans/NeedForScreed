<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'email' => 'test@test.com',
            'password' => '$2y$10$3xOUlMFb4IH3Tj2.dkVPPO4dfnHKYF4SV.JA3mo4x0Z2B9PsdCehG',
        ]);

        Project::factory()->count(25)->create();
    }
}
