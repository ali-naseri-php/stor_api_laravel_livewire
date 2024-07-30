<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    /**
     *
     * all categories
     *
     * @OA\Get(
     *     path="/api/v1/categories",
     *     operationId="allcategories",
     *     tags={"categories"},
     *     summary="categories",
     *     description="categories all",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *      )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="all categories"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function index()
    {
        $categories = Categorie::with('categorie_id')->get();

        return response()->json(['msg' => $categories], 200);
    }


    /**
     *
     * store categories
     *
     * @OA\Post(
     *     path="/api/v1/categories",
     *     operationId="storecategories",
     *     tags={"categories"},
     *     summary="storecategories",
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
    public function store(Request $request)
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


    /**
     *
     * update categories
     *
     * @OA\Put(
     *     path="/api/v1/categories",
     *     operationId="updatecategories",
     *     tags={"categories"},
     *     summary="updatecategories",
     *     description="categories updated",
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

    public function update(Request $request, Categorie $categorie)
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


    public function destroy(string $id)
    {


    }
}

