<?php

namespace App\Http\Controllers\api\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class storeBrandController extends Controller
{
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

    public function __invoke(Request $request)
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

}
