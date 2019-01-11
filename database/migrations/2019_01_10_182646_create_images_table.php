<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists( 'images' );
        Schema::create( 'images' , function (Blueprint $table) {
            $table->increments( 'id' );
            $table -> string( 'url' , 100 )->nullable();
            $table -> string( 'code' , 100 )->nullable();
            $table -> string( 'path' , 100 )->nullable();
            $table -> string( 'extension' , 10 )->nullable();
            $table -> float( 'kb' )->nullable();
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
        Schema::dropIfExists('images');
    }
}
