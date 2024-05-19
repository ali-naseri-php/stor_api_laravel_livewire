<?php

namespace App\Http\Controllers\api\store;

use App\Http\Controllers\Controller;
use App\Models\KalaPropperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class kalaProppertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kalasproppertis = KalaPropperti::all();
        return response()->json(['kalasproppertis' => $kalasproppertis], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string|max:255|min:2',
            'propperti_id' => 'required|integer|exists:proppertis,id',
            'kala_id' => 'required|integer|exists:kalas,id',
        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $kalapropperti=new KalaPropperti;
        $kalapropperti->value=$request->value;
        $kalapropperti->kala_id=$request->kala_id;
        $kalapropperti->propperti_id=$request->propperti_id;
        $kalapropperti->save();
        return response()->json(['msg' => 'save ok!'], 201);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KalaPropperti $kalapropperti)
    {
        $validator = Validator::make(
            $request->all(), [
            'value' => 'required|array|max:255|min:2',


        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $kalapropperti->value=$request->value;

        $kalapropperti->save();
        return response()->json(['msg' => 'save update ok!'], 201);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
