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


    /**
     * going to pets page with categories for selection
     * 
     * @return view
     * @return $categories
     */
    public function pets()
    {
    	$categories = Category::get();
    	return view('admin.pets-admin', ['categories' => $categories]);
    }
}
