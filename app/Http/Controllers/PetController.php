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
<<<<<<< HEAD

    /**
     * create pets by admin
     * 
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
    	Pet::create($request->only('name', 'category_id', 'about', 'age'));
    	return back();
    }
=======
>>>>>>> bfdb31c1167943a87d11ac3789436d2d66fe2d5c
}
