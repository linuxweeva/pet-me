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


    /**
     * create pets by admin
     * 
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'        => 'required|max:256',
            'age'         => 'required',
            'about'       => 'required',
            'category_id' => 'required|integer'
        ]);

    	Pet::create($request->only('name', 'category_id', 'about', 'age'));
    	return back();
    }
}
