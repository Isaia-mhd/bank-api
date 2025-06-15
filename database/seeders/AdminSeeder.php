<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where("email", config("app.admin_email"))->exists();

        if(!$admin)
        {
            User::create([
                "name" => "Projet Vue Js",
                "email" => config("app.admin_email"),
                "password" => Hash::make(config("app.admin_password")),
                "role" => "admin",
                "email_verified_at" => now(),
            ]);
        }
    }
}
