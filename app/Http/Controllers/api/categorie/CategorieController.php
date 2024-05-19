<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::with('categorie_id')->get();

        return response()->json(['msg' => $categories], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:categories,name,NULL,id,categorie_id,' . $request->categorie_id,
            'categorie_id' => 'integer|exists:categories,id',
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->categorie_id = $request->categorie_id ? $request->categorie_id : 0;

        $categorie->save();

        return response()->json(['msg' => 'save ok'], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:categories,name,NULL,id,categorie_id,' . $request->categorie_id,
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $categorie->name = $request->name;
        $categorie->categorie_id = $request->categorie_id;
        $categorie->save();

        return response()->json(['msg' => 'save update'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


    }
}

