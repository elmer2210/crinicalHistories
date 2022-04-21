<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //patients clinical Histories 
        Schema::create('clinical_histories', function (Blueprint $table) {
            $table->bigIncrements('patient_historial');
            $table->string('ci', 10);
            $table->string('patient_name', 300);
            $table->date('born_date');
            $table->bigInteger('age');
            $table->decimal('temperature');
            $table->bigInteger('blood_presure');
            $table->bigInteger('pulse');
            $table->bigInteger('respiratory_frecuency');
            $table->bigInteger('saturation');
            $table->decimal('weight');
            $table->decimal('height');
            $table->decimal('imc');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop if exist the clinical histories
        Schema::dropIfExists('clinical_histories');
    }
};
