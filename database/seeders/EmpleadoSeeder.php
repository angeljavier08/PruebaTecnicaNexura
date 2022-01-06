<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("empleados")->insert([

            ["id" => "3", "nombres" => "Pedro Pérez", "email" => "pperez@example.co", "sexo" => "M", "area_id" => "5", "boletin" => 1, "descripcion" => "Hola mundo"],
            ["id" => "4", "nombres" => "Amalia Bayona", "email" => "abayona@example.co", "sexo" => "F", "area_id" => "8", "boletin" => 0, "descripcion" => "Para contactar a Amalia Bayona, puede escribir al correo electrónico abayona@example.co"],

        ]);
    }
}
