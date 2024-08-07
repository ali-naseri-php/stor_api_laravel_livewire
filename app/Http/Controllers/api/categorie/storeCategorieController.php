<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class storeCategorieController extends Controller
{
    /**
     *
     * store categories
     *
     * @OA\Post(
     *     path="/api/v1/categories",
     *     operationId="storecategories",
     *     tags={"categories"},
     *     summary="add new categories",
     *     description="categories store",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *                  @OA\Property(
     *                      property="category_id",
     *                      type="string"
     *                  ),
     *                @OA\Property(
     *                       property="name",
     *                       type="string"
     *                   ),
     *
     *                  example={"name":"moballe" ,"category_id": "Electronic"}
     *
     *      )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="store ok categories"
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

        return response()->json(['msg' => 'store ok categories'], 201);
    }
}
