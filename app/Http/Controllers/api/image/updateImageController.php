<?php

namespace App\Http\Controllers\api\image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class updateImageController extends Controller
{
    /**
     *
     * update images
     *
     * @OA\Put (
     *     path="/api/v1/images/2",
     *     operationId="imagesupdate",
     *     tags={"images"},
     *     summary="images update !",
     *     description="images update",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *              @OA\Property(
     *                      property="image",
     *                       type="image"
     *       )
     *         )
     * )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="save update ok !"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Request $request, Image $image)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $nameImage = time() . "." . $request->image->extension();
        $request->image->move(public_path('images/'), $nameImage);

        $image->url = 'images/' . $request->image;
        $image->save();

        return response()->json(['msg' => 'save update ok !'], 201);


    }
}
