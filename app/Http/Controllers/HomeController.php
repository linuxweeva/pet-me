<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pets = Pet::orderBy( 'id' , 'desc' ) -> paginate( 6 );
        $categories = Category::get();
        return view( 'home' , compact( 'pets', 'categories' ) );
    }
    public function showPet( Request $req , $id )
    {
        $pet = Pet::findOrFail( $id );
        $pet -> watched++;
        $pet -> save();
        return view( 'pet' , compact( 'pet' ));
    }
}
