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
     * brands
     *
     * @OA\Get(
     *     path="api/v1/brands",
     *     operationId="brand all",
     *     tags={"brand"},
     *     summary="brand request  ",
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


    /**
     * new brands
     *
     * @OA\Post(
     *     path="/api/v1/brands",
     *     operationId="brand new ",
     *     tags={"brand"},
     *     summary="add new brand",
     *     description="new brand",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *
     *                 example={ "name": "apple"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="{'msg':'save ok'}"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

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
        return response()->json(['msg' => 'save ok'], 201);


    }

    /**
     * show brand for id
     *
     * @OA\Get(
     *     path="/api/v1/brand/{id }",
     *     operationId="show brand for id",
     *     tags={"brand"},
     *     summary="show brand for id",
     *     description="show brand for id",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *
     *                 example={ }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="{'msg':'data brand as array'}",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function show(Brand $brand)
    {

        return response()->json(['msg' => $brand], 200);


    }


    /**
     *
     * update a brand
     *
     * @OA\Put(
     *     path="/api/v1/brands/{id}",
     *     operationId=" updatingBrand",
     *     tags={"brand"},
     *     summary="update a brand",
     *     description="update abrand with a name",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 example={ "name": "samsong"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="update brand"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */


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
    /**
     *
     * update a brand
     *
     * @OA\delete(
     *     path="/api/v1/brands/{id}",
     *     operationId="destroyBrand",
     *     tags={"brand"},
     *     summary="destroy a brand",
     *     description="destroy abrand with a name",
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
     *         description="destroy brand"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function destroy(string $id)
    {
        //
    }


}

