<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('crops', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // Tipo de café
        $table->string('location'); // Ubicación de la plantación
        $table->date('planting_date'); // Fecha de siembra
        $table->decimal('area_size', 8, 2); // Tamaño del área en hectáreas
        $table->integer('estimated_yield'); // Rendimiento estimado en kilogramos
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
