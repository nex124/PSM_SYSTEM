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
        Schema::create('carnival_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('coordinatorID');
            $table->string('coordinatorName');
            $table->string('studentID');
            $table->string('studentName');
            $table->string('studentPhone');
            $table->date('date');
            $table->string('appoinmentID');
            $table->text('reason');
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
        Schema::dropIfExists('carnival_evaluations');
    }
};
