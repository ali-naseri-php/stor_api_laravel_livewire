<?php

namespace App\Http\Controllers\api\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class showBrandController extends Controller
{
    /**
     * show brand for id
     *
     * @OA\Get(
     *     path="/api/v1/brand/{id }",
     *     operationId="show brand for id",
     *     tags={"brand"},
     *     summary="show brand for id",
     *     description="show brand for id",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *
     *                 example={ }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="{'msg':'data brand as array'}",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Brand $brand)
    {

        return response()->json(['msg' => $brand], 200);


    }

}
