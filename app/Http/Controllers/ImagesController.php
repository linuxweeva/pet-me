<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Image;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function uploadSingleImage( Request $request ) {
        $validation = $request->validate([
        	'photo' => 'required|file|image|mimes:jpeg,png,gif,webp,jpg,bmp|max:20048'
        ]);
    	$file = $validation[ 'photo' ];
		$extension = $file->getClientOriginalExtension();
		$size = $file->getClientSize();
		$filename = 'photo-' . time() . '.' . $extension;
	    $path = Storage::disk( 'photos' )->put( $filename ,  \File::get( $file ) );
	    $url = Storage::disk( 'photos' )->url( $filename );
	    $path = Storage::disk( 'photos' )->path( $filename );
	    $photo = new Image;
	    $photo -> url = $url;
	    $photo -> path = $path;
	    $photo -> extension = $extension;
	    $photo -> code = $filename;
	    $photo -> kb = $size;
	    if ( $photo -> save() ) {
	    	return response()->json( $photo , 200 );
	    }
	    return response()->json( [] , 500 );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
