<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $table = 'pets';
	public function photo() {
		return $this->hasManyThrough( 'App\Image' , 'App\PetPhoto' , 'pet_id' , 'id' , 'id' , 'photo_id' );
	}
	protected $with = [ 'photo' ];

	// pets with categories 
	public function categories()
	{
		return $this->belongsTo('App\Category');
	}
}
