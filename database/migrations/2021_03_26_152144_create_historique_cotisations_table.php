<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueCotisationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('historique_cotisations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedInteger("cotisation");
            $table->boolean('status')->default(true);
            $table->uuid('user');
            $table->timestamps();
            $table->double('amount')->default(0);
            $table->double("particular_seuil")->default(0);
            $table->mediumText('description');
            $table->foreign('cotisation')->references('id')->on('cotisations');
            $table->foreign('user')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('historique_cotisations');
    }

}
