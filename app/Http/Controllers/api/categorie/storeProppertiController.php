<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class storeProppertiController extends Controller
{
    /**
     *
     * store  proppertie
     *
     * @OA\Post(
     *     path="/api/v1/proppertis",
     *     operationId="storeproppertis",
     *     tags={"categories"},
     *     summary="proppertis store ",
     *     description="proppertis store",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                            @OA\Property(
     *                        property="categorie_id",
     *                        type="string"),
     *                   @OA\Property(
     *                      property="name",
     *                       type="string"
     *       )
     *      )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="store proppertis"
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
            'categorie_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255|min:2|unique:proppertis,name,NULL,id,categorie_id,' . $request->categorie_id
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $propperti = new Propperti();
        $propperti->name = $request->name;
        $propperti->categorie_id = $request->categorie_id;

        $propperti->save();


        return response()->json(['msg' => 'save ok'], 201);

    }

}
