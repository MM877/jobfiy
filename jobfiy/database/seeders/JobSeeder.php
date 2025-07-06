<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $employers = Employer::all();
        $users = User::all();

        for ($i = 0; $i < 10; $i++) {
            $employer = $employers->random();
            $user = $users->random();

            Job::create([
                'title' => $faker->jobTitle,
                'salary' => '$' . $faker->numberBetween(1000, 30000),
                'employer_id' => $employer->id,
                'user_id' => $user->id, // if your jobs table has user_id
                'employer_name' => $employer->employer_name, // if your jobs table has employer_name
                'email' => $faker->companyEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'country' => $faker->country,
                'is_remote' => $faker->boolean,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
