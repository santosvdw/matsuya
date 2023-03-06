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
        Schema::create('reservering', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam', 15);
            $table->string('achternaam', 30);
            $table->string('email', 40);
            $table->string('telefoon');
            $table->date('datum');
            $table->time('tijd');
            $table->integer('aant_personen');
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
        Schema::dropIfExists('reservering');
    }
};
