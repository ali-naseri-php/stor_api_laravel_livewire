<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetProppertiCategorieController extends Controller
{

    /**
     *
     * get prapertis categories
     *
     * @OA\Get(
     *     path="/api/v1/getProppertiCategorie/2",
     *     operationId="Proppertforcategories",
     *     tags={"categories"},
     *     summary="Get Propperti Categorie ",
     *     description="Get Propperti Categorie ",
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
     *         description="Get Propperti Categorie "
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function __invoke(Categorie $categorie)
    {


        $proppertis=Propperti::where('categorie_id','=',$categorie->id)->select('name')->get();

        return response()->json(['categorie' => $categorie,'proppertis'=>$proppertis], 200);

    }
}
