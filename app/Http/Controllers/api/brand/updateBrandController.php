<?php

namespace App\Http\Controllers\api\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class updateBrandController extends Controller
{
    /**
     *
     * update a brand
     *
     * @OA\Put(
     *     path="/api/v1/brands/1",
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

    public function __invoke(Request $request, Brand $brand)
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
}
