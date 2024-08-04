<?php

namespace App\Http\Controllers\api\store\sort\cheapest;

use App\Http\Controllers\Controller;
use App\Models\Kala;
use Illuminate\Http\Request;

class AllController extends Controller
{

    /**
     *
     * all kala
     *
     * @OA\Get (
     *     path="/api/v1/kala/sort/cheapest/all",
     *     operationId="allwheapest",
     *     tags={"sort"},
     *     summary="all kala sort cheapest",
     *     description="all kala sort cheapest",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *         )
     * )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="all kala "
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Request $request)
    {
        $kalas = Kala::orderBy('price')->get();
        return response()->json(['kalas' => $kalas], 200);    }
}
