<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->uuid('propose_par');
            $table->string('name', 200);
            $table->unsignedInteger("cotisation");
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->enum("status", config('constants.ETAPE_PROJET'));
            $table->mediumText('description');
            $table->foreign('propose_par')->references('id')->on('families');
            $table->foreign('cotisation')->references('id')->on('cotisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('projets');
    }

}
