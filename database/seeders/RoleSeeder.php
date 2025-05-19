<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // role user 
    Role::create(['name' => 'admin', 'guard_name' => 'web']);
Role::create(['name' => 'Penanggung Jawab', 'guard_name' => 'web']);
Role::create(['name' => 'Tim Evaluasi', 'guard_name' => 'web']);
Role::create(['name' => 'Ketua Tim Kerja', 'guard_name' => 'web']);
    }
}
