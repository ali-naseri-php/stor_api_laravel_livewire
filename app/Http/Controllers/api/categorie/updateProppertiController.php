<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class updateProppertiController extends Controller
{

    /**
     *
     * update proppperti
     *
     * @OA\Put(
     *     path="/api/v1/proppertis/2",
     *     operationId="updateproppertis",
     *     tags={"categories"},
     *     summary="proppertis updated Number 2 can be put the other thing",
     *     description="proppertis updated",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                       @OA\Property(
     *                       property="categorie_id",
     *                       type="string"),
     *                  @OA\Property(
     *                     property="name",
     *                      type="string"
     *      )
     *         )
     * )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="all proppertis"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function __invoke(Request $request, Propperti $propperti)
    {
        $validator = Validator::make($request->all(), [
            'categorie_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255|min:2|unique:proppertis,name,NULL,id,categorie_id,' . $request->categorie_id
        ]);

        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $propperti->name = $request->name;
        $propperti->categorie_id = $request->categorie_id;

        $propperti->save();


        return response()->json(['msg' => 'save update ok !'], 201);


    }

}
