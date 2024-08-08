<?php

namespace App\Http\Controllers\api\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class allBrandController extends Controller
{
    /**
     * brands
     *
     * @OA\Get(
     *     path="api/v1/brands",
     *     operationId="brand all",
     *     tags={"brand"},
     *     summary="brands all ",
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
    public function __invoke()
    {
        $brands = Brand::all();
        return response()->json(['msg' => $brands], 201);


    }
}
