<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * going to categories page with values
	 *
	 * @return view
	 */
    public function categories()
    {
    	$categories = Category::get();
    	return view('admin.categories-admin', ['categories' => $categories]);
    }
}
