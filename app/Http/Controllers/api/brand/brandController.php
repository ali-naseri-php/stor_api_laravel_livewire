<?php

namespace App\Http\Controllers\api\brand;

use App\Http\Controllers\api\store\sort\visit\AddKalaController;
use App\Http\Controllers\api\store\sort\visit\AddVisitController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Kala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class brandController extends Controller
{
    /**
     * Register a new user.
     *
     * @OA\Post(
     *     path="api/v1/brands",
     *     operationId="brand",
     *     tags={"brands"},
     *     summary="lbrand all ",
     *     description="list all brand",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="{'msg':[{'id':'id','name':'name','created_at':'date','updated_at':'date'}]}"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function index()
    {
        $brands = Brand::all();
        return response()->json(['msg' => $brands], 201);


    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:kalas,name',

        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        //        return 'ali naseri';
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();
        return response()->json(['msg' => 'save ok brand!'], 201);


    }
    public function show(Brand $brand)
    {

        return response()->json(['msg' => $brand], 200);


    }



    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:kalas,name',

        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        $brand->name=$request->name;
        $brand->save();
        return response()->json(['msg'=>'update brand'],201);

    }
    public function destroy(string $id)
    {
        //
    }


}

