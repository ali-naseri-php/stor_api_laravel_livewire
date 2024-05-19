<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProppertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proppertis = Propperti::all();
        return response()->json(['msg'=>$proppertis], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        dd($request);
        $validator = Validator::make($request->all(), [
            'categorie_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255|min:2|unique:proppertis,name,NULL,id,categorie_id,' . $request->categorie_id
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $propperti = new Propperti();
        $propperti->name = $request->name;
        $propperti->categorie_id = $request->categorie_id;

        $propperti->save();


        return response()->json(['msg'=>'save ok'], 201);

    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propperti $propperti)
    {
        $validator = Validator::make($request->all(), [
            'categorie_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255|min:2|unique:proppertis,name,NULL,id,categorie_id,' . $request->categorie_id
        ]);

        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

            $propperti->name = $request->name;
            $propperti->categorie_id = $request->categorie_id;

            $propperti->save();


        return response()->json(['msg'=>'save update ok !'], 201);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
