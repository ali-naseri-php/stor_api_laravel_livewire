<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class updateCategorieController extends Controller
{

    /**
     *
     * update categories
     *
     * @OA\Put(
     *     path="/api/v1/categories/2",
     *     operationId="updatecategories",
     *     tags={"categories"},
     *     summary="update categories for id Number 2 can be put the other thing",
     *     description="categories updated",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *                  @OA\Property(
     *                      property="categorie_id",
     *                      type="string"
     *                  ),
     *                       @OA\Property(
     *                       property="name",
     *                       type="string"
     *                   ),
     *                  example={ "name":"mobaile","category_id": "Electronic"}
     *
     *      )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="save update"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function __invoke(Request $request, Categorie $categorie)
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
}
