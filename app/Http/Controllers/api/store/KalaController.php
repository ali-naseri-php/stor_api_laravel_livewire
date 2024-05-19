<?php

namespace App\Http\Controllers\api\store;

use App\Http\Controllers\api\store\sort\visit\AddKalaController;
use App\Http\Controllers\api\store\sort\visit\AddVisitController;
use App\Http\Controllers\Controller;
use App\Models\Kala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kalas = Kala::select('name', 'price');
        return response()->json(['kala' => $kalas], 200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:kalas,name',
            'body' => 'required|string|max:255|min:2',
            'number_kala' => 'required|integer',
            'price' => 'required|integer',
            'weight' => 'required|string',
        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        //        return 'ali naseri';
        $kala = new Kala;
        $kala->name = $request->name;
        $kala->body = $request->body;
        $kala->number_kala = $request->number_kala;
        $kala->price = $request->price;
        $kala->weight = $request->weight;
        $kala->save();


        $add_kala_sort = new AddKalaController();
        $add_kala_sort->addkala($kala->id);

        return response()->json(['kala' => 'save ok kala!'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Kala $kala)
    {

$addvisit=new AddVisitController();
$addvisit->addvisit($kala->id);
        return response()->json(['kala' => $kala], 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kala $kala)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:kalas,name',
            'body' => 'required|string|max:255|min:2',
            'number_kala' => 'required|integer',
            'price' => 'required|integer',
            'weight' => 'required|string',
        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $kala->name = $request->name;
        $kala->body = $request->body;
        $kala->number_kala = $request->number_kala;
        $kala->price = $request->price;
        $kala->weight = $request->weight;
        $kala->save();
        return response()->json(['images' => 'save update ok kala!'], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
