<?php

namespace App\Http\Controllers\api\image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $images = Image::select('url')->get();
        return response()->json(['images' => $images], 200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'imageable_type' => 'required|string|max:255|min:2|',
            'image' => 'required|image|',
            'imageable_id' => 'required|integer|max:255'
        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $nameImage = time() . "." . $request->image->extension();
        $request->image->move(public_path('images/'), $nameImage);
        $image = new Image();
        $image->imageable_type = 'App/Models/' . $request->imageable_type;
        $image->url = 'images/' . $nameImage;
        $image->imageable_id = $request->imageable_id;
        $image->save();


        return response()->json(['msg' => 'save ok !'], 201);

    }


    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, Image $image)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $nameImage = time() . "." . $request->image->extension();
        $request->image->move(public_path('images/'), $nameImage);

        $image->url = 'images/' . $request->image;
        $image->save();

        return response()->json(['msg' => 'save update ok !'], 201);


    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
