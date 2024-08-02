<?php

namespace App\Http\Controllers\api\image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
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
    public function index()
    {

        $images = Image::select('url')->get();
        return response()->json(['images' => $images], 200);


    }


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
    public function store(Request $request)
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
    /**
     *
     * all images
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
    public
    function update(Request $request, Image $image)
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

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
