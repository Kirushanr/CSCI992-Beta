<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list', function (Blueprint $table) {
        $table->integer('advert_id')->unsigned()->nullable();
        $table->foreign('advert_id')->references('id')
            ->on('adverts')->onDelete('cascade');

        $table->integer('user_id')->unsigned()->nullable();
        $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('wish_list');
    }
}
