<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	/**
	 * store category from admin
	 */
	public function store(Request $request)
	{
		Category::create($request->only('title'));
		return back();
	}

}
