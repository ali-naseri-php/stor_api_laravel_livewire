<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Propperti;
use Illuminate\Http\Request;

class allProppertiController extends Controller
{
    /**
     *
     * all propperti
     *
     * @OA\Get(
     *     path="/api/v1/proppertis",
     *     operationId="allproppertis",
     *     tags={"categories"},
     *     summary="proppertis all ",
     *     description="proppertis all",
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
     *         description="all proppertis"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke()
    {
        $proppertis = Propperti::all();
        return response()->json(['msg' => $proppertis], 200);
    }
}
