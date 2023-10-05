<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!Admin::whereEmail("admin@devbunch.com")->exists())
            Admin::create([
                'name'=>"Admin",
                'email'=>"admin@devbunch.com",
                'password'=>Hash::make("12345678"),
            ]);
        if (!Student::whereEmail("student@devbunch.com")->exists())
            Student::create([
                'name'=>"Student",
                'email'=>"student@devbunch.com",
                'password'=>Hash::make("12345678"),
            ]);
        if (!Teacher::whereEmail("teacher@devbunch.com")->exists())
            Teacher::create([
                'name'=>"Teacher",
                'email'=>"teacher@devbunch.com",
                'password'=>Hash::make("12345678"),
            ]);
    }
}
