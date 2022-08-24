<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplyInternship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applyinternship', function (Blueprint $table){
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('age');
            $table->string('education');
            $table->string('courses');
            $table->string('contactno');
            $table->string('email');
            $table->string('objective')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('department')->nullable();
            $table->date('start');
            $table->date('end');
            $table->string('file')->nullable();
            $table->string('status');
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
        //
    }
}
