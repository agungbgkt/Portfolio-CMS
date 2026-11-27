<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun Super Admin dari .env
        $admin = User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'agungbangkit25@gmail.com')],
            [
                'name' => env('ADMIN_NAME', 'Super-Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD',))
            ]
        );

        // Buat data Profil (Relasi 1:1 dengan User)
        Profile::updateOrCreate(
            ['user_id' => $admin->id],
            [
                'full_name' => $admin->name,
                'headline' => 'Engineering Systems Beyond the Interface',
                'short_bio' => 'Full-Stack Developer, UI/UX Designer, & IoT Systems Engineer yang berfokus membangun sistem perangkat lunak dan perangkat keras terintegrasi.',
                'about_description' => 'Berpengalaman merancang arsitektur aplikasi web modern, antarmuka pengguna yang intuitif, hingga prototipe sistem tertanam dan IoT yang memecahkan masalah nyata di lapangan.',
                'email_public' => $admin->email,
                'phone' => null,
                'location' => 'Indonesia',
                'social_links' => [
                    'github' => 'https://github.com/agungbgkt',
                    'linkedin' => 'https://www.linkedin.com/in/agungbgkt',
                    'instagram' => 'https://www.instagram.com/agungbgkt',
                ],
                'years_of_experiences' => 2,
            ]
        );

        // Buat pengaturan default website
        $defaultSettings = [
            'site_title' => 'Portfolio',
            'site_description' => 'Personal Portfolio covering Software Engineer.',
            'availability_status' => 'Available for Work, Projects & Collaboration'
        ];

        foreach($defaultSettings as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
    }
}
