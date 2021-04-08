<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nickname',100);
            $table->string('name',200)->nullable();
            $table->boolean('gender_id')->unsigned();
            $table->uuid('father_id')->nullable();
            $table->uuid('mother_id')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->date('dob')->nullable();
            $table->year('yob')->nullable();
            $table->unsignedTinyInteger('birth_order')->nullable();
            $table->date('dod')->nullable();
            $table->year('yod')->nullable();
            $table->string('email',200)->unique()->nullable();
            $table->string('password',255)->nullable();
            $table->string('address',200)->nullable();
            $table->string('city',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('photo_path',100)->nullable();
            $table->uuid('manager_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
