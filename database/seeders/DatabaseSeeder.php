<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'john',
            'email' => 'john@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
        ]);

        \App\Models\ProfileClinic::factory()->create([
            'name' => 'JohnWalker',
            'address' => 'Denpasar',
            'phone' => '087787676787',
            'email' => 'johnwalker@example.com',
            'doctor_name' => 'Dr. Johnwalker',
            'unique_code' => '12345678'
        ]);

        //Call Doctor Seed
        $this->call([
            DoctorSeeder::class,
            DoctorScheduleSeeder::class
        ]);
    }
}
