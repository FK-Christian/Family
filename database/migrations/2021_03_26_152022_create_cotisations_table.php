<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotisationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cotisations', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('family');
            $table->string("name",200);
            $table->double("seuil")->default(0);
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->mediumText('description');
            $table->foreign('family')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cotisations');
    }

}
