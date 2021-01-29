<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('farmer_id');
            $table->string('full_name');
            $table->string('gender');
            $table->string('age');
            $table->string('email');
            $table->string('phone');
            
            $table->string('address');
            $table->string('province');
            $table->string('photo');
            $table->string('citizenship_no');
       
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
        Schema::dropIfExists('farmers');
    }
}
