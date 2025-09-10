<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Establece el tipo de usuario 'client' para todos los usuarios que no tienen un tipo definido.
        DB::table('users')->whereNull('user_type')->update(['user_type' => 'client']);
    }
}
