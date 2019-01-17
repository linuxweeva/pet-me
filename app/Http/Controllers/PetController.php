<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Category;

class PetController extends Controller
{
	/**
	 * get pets by category
	 * 
	 * @param integer $id
	 * @return view
	 */
    public function getCategory(Request $request, $id)
    {
    	$pets = Pet::where('category_id', $id)->paginate(6);
    	$categories = Category::get();
    	return view('home',  compact( 'pets', 'categories' ) );
    }
}
