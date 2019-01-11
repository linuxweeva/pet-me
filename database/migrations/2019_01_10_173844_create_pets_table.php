<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'pets' , function (Blueprint $table) {
            $table->increments( 'id' );
            $table -> string( 'name' ) -> nullable();
            $table -> text( 'about' ) -> nullable();
            $table -> integer( 'age' ) -> nullable();
            $table -> integer( 'watched' ) -> nullable();
            $table -> integer( 'category_id' ) -> nullable();
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
        Schema::dropIfExists('pets');
    }
}
