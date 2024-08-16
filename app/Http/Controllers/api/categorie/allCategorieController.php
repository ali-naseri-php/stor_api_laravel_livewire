<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class allCategorieController extends Controller
{

    /**
     *
     * all categories
     *
     * @OA\Get(
     *     path="/api/v1/categories",
     *     operationId="allcategories",
     *     tags={"categories"},
     *     summary="categories all ",
     *     description="categories all",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *   @OA\Property(
     *  property="page",
     * type="string"
     *),
     *
     *   example={ "page": "2"}
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

    public function __invoke()
    {

        $categories = Categorie::with('categorie_id')->paginate(5);

        return response()->json(['msg' => $categories], 200);
    }
}
