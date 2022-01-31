<?php

namespace Database\Seeders;

use App\Models\Catogry;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
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
         User::factory()->count(10)->create();
        Catogry::factory()->count(15)->create();
        Company::factory()->count(10)->create();
        Job::factory()->count(70)->create();
        Profile::factory()->count(10)->create();
    }
}
