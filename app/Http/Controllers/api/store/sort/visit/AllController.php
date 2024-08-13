<?php

namespace App\Http\Controllers\api\store\sort\visit;

use App\Http\Controllers\Controller;
use App\Models\Kala;
use App\Models\Kalavisit;
use Illuminate\Http\Request;

class AllController extends Controller
{

    /**
     *
     * all kala
     *
     * @OA\Get (
     *     path="/api/v1/kala/sort/visit/all",
     *     operationId="allvisit",
     *     tags={"sort"},
     *     summary="all kala sort visit",
     *     description="all kala sort visit",
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
        $kalas = Kalavisit::with('kala')->orderBy('number', 'desc')->get();

        return response()->json(['kalavisit' => $kalas], 200);

    }
}
