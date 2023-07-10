<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Instructor;
use Psy\VersionUpdater\Installer;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'ridoy kahn',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678')
        ];
        Admin::create($admin);
    }
}
