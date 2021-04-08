<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->uuid('family');
            $table->unsignedInteger("bureau");
            $table->timestamps();
            $table->text('repport');
            $table->foreign('bureau')->references('id')->on('bureaus');
            $table->foreign('family')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('seances');
    }

}
