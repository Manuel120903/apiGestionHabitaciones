<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario 
        DB::table('users')->insert([
            'name' => 'Carmen',
            'email' => 'carmen@correo.com',
            'phone' => '3312345678',
            'image' => 'storage/images/profilePics/carmen.jpg',
            'password' => Hash::make('carmen123'),
            'role' => 1,

            ]);
        }
    }