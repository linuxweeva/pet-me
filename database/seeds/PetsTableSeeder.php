<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $pets = null;
    public function run()
    {
        //
        $this -> pets = file_get_contents( __DIR__ . '/pets.json' );
        DB::table( 'pets' )->insert( json_decode( $this -> pets , 1 ) );
    }
}
