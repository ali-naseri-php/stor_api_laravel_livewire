<?php

namespace App\Http\Controllers\api\store\sort\cheapest;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class whereController extends Controller
{
    /**
     *
     * get where cheapest
     *
     * @OA\Get(
     *     path="/api/v1/kala/sort/cheapest/1",
     *     operationId="sortcheapest",
     *     tags={"sort"},
     *     summary="",
     *     description=" all kala where and sort cheapest price",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                       @OA\Property(
     *                       property="where",
     *                       type="url")
     *
     *         )
     * )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="all kala price"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Categorie $categorie, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'where' => 'required|array',
            'name' => 'required|string'
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $kalas = DB::table('kalas')
            ->leftJoin('kalas_proppertis', 'kalas_proppertis.kala_id', '=', 'kalas.id')
            ->leftJoin('proppertis', 'proppertis.id', '=', 'kalas_proppertis.propperti_id')
            ->leftJoin('categories', 'categories.id', '=', 'proppertis.categorie_id')
            ->where('kalas_proppertis.value', '=', $request->where)
            ->where('categories.id', '=', $categorie->id)
            ->where('kalas.name', '=', $request->name)
            ->orderBy('kalas.price')
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')->get();
        return response()->json(['kalas' => $kalas], 200);

    }
}
