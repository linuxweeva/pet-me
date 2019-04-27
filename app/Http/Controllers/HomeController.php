<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Category;
use App\User;

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
    public function privacy() {
        return view( 'static.privacy' );
    }
    public function terms() {
        return view( 'static.terms' );
    }





    function create(Request $request) {
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $request
         * @return \Illuminate\Contracts\Validation\Validator
         */
        $valid = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return \Response::json($jsonError);
        }

        $data = request()->only('email','name','password');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin' => 1,
        ]);

        // And created user until here.

       return response()->json($user);
    }

}
