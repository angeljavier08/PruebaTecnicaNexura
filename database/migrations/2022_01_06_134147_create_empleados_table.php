<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 255);
            $table->string('email')->unique();
            $table->char('sexo', 1);
            $table->unsignedInteger('area_id');
            $table->integer('boletin', 11)->nullable();
            $table->text('descripcion');


            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
