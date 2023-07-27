<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Info;
use App\Models\Policy;
use App\Models\Socialmedia;
use App\Models\Theme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'image' => '',
        ]);

        About::insert([
            'description' => ''
        ]);

        Policy::insert([
            'description' => ''
        ]);

        Info::insert([
            'title' => ''
        ]);

        Contact::insert([
            'email' => 'test@mail.com',
            'phone' => 'xxxxxxxxxx'
        ]);

        Socialmedia::insert([
            'facebook' => 'https://www.facebook.com',
            'youtube' => 'https://www.youtube.com',
        ]);

        Theme::insert([
            'website_name' => 'Website Name'
        ]);
    }
}
