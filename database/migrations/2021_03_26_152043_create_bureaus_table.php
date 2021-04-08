<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBureausTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bureaus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->uuid('family');
            $table->timestamp('start_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('end_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('status')->default(true);
            $table->uuid('user');
            $table->enum("poste", config('constants.POSTE_LISTE'));
            $table->mediumText('description');
            $table->foreign('user')->references('id')->on('families');
            $table->foreign('family')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bureaus');
    }

}
