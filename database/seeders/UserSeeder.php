<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'supervisor',
            'email' =>'supervisor@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'supervisor',
        ]); 

        DB::table('users')->insert([
            'name' => 'contador',
            'email' =>'contador@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'contador',
        ]); 

         DB::table('users')->insert([
            'name' => 'cliente',
            'email' =>'cliente@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'cliente',
        ]); 

         DB::table('users')->insert([
            'name' => 'encargado',
            'email' =>'encargado@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'encargado',
        ]); 

         DB::table('users')->insert([
            'name' => 'vendedor',
            'email' =>'vendedor@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'vendedor',
        ]); 

         DB::table('users')->insert([
            'name' => 'vendedor2',
            'email' =>'vendedor2@gmail.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('1234'),
            'rol'=>'vendedor',
        ]); 
    }
}
