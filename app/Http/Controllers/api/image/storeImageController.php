<?php

namespace App\Http\Controllers\api\image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class storeImageController extends Controller
{
    /**
     *
     * all images
     *
     * @OA\Post(
     *     path="/api/v1/images",
     *     operationId="imagesstore",
     *     tags={"images"},
     *     summary="images store",
     *     description="images store",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *              @OA\Property(
     *                      property="image",
     *                       type="image"
     *       ),
     *              @OA\Property(
     *                      property="imageable_type",
     *                       type="string"
     *       ),
     *                @OA\Property(
     *                      property="imageable_id",
     *                       type="integer"
     *       )
     *         )
     * )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="save ok !"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'imageable_type' => 'required|string|max:255|min:2|',
            'image' => 'required|image|',
            'imageable_id' => 'required|integer|max:255'
        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $nameImage = time() . "." . $request->image->extension();
        $request->image->move(public_path('images/'), $nameImage);
        $image = new Image();
        $image->imageable_type = 'App/Models/' . $request->imageable_type;
        $image->url = 'images/' . $nameImage;
        $image->imageable_id = $request->imageable_id;
        $image->save();


        return response()->json(['msg' => 'save ok !'], 201);

    }
}
