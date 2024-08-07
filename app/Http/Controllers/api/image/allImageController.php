<?php

namespace App\Http\Controllers\api\image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class allImageController extends Controller
{
    /**
     *
     * all images
     *
     * @OA\Get (
     *     path="/api/v1/images",
     *     operationId="imagesall",
     *     tags={"images"},
     *     summary="images all",
     *     description="images all",
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
     *         description="all url amage"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke()
    {

        $images = Image::select('url')->get();
        return response()->json(['images' => $images], 200);


    }
}
