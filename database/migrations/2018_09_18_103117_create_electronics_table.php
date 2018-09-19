<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronics', function (Blueprint $table) {
            $table->increments('id');
            $table->text('model');
            $table->string('type',100);
            
            $table->boolean('has_warranty')->default(true);
            $table->unsignedInteger('advert_id');            
            $table->foreign('advert_id')->references('id')->on('adverts')
            ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('electronics', function (Blueprint $table) {
            //
        });
    }
}
