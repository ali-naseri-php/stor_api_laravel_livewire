<?php

namespace App\Http\Controllers\api\store;


use App\Http\Controllers\api\store\sort\visit\AddVisitController;
use App\Http\Controllers\Controller;
use App\Models\Kala;


class GetProppertiKalaController extends Controller
{
    /**
     *
     * all images
     *
     * @OA\Get (
     *     path="/api/v1'/getpropperti/2",
     *     operationId="gettpropertikala",
     *     tags={"store"},
     *     summary="get properti kala",
     *     description="get properti kala",
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
     *         description="all properti kala "
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function getproppertikala(int $id)
    {
        $kala = Kala::with('properties')->find($id);



        $addvisit=new AddVisitController();
        $addvisit->addvisit($kala->id);
        return response()->json(['kala' => $kala], 200);


    }
}
