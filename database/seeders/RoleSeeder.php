<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([

            ["id" => "1", "nombre" => "Desarrollador"],
            ["id" => "2", "nombre" => "Analista"],
            ["id" => "3", "nombre" => "Tester"],
            ["id" => "4", "nombre" => "Diseñador"],
            ["id" => "5", "nombre" => "Profesional PMO"],
            ["id" => "6", "nombre" => "Profesional de servicios"],
            ["id" => "7", "nombre" => "Auxiliar administrativo"],
            ["id" => "8", "nombre" => "Codirector"],

        ]);
    }
}
