<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProppertiController extends Controller
{

    /**
     *
     * all categories
     *
     * @OA\Get(
     *     path="/api/v1/proppertis",
     *     operationId="allproppertis",
     *     tags={"categories"},
     *     summary="proppertis all ",
     *     description="proppertis all",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *      )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="all proppertis"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function index()
    {
        $proppertis = Propperti::all();
        return response()->json(['msg' => $proppertis], 200);

    }


    /**
     *
     * all categories
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


    public function store(Request $request)
    {
        //        dd($request);
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

    /**
     *
     * all categories
     *
     * @OA\Put(
     *     path="/api/v1/proppertis",
     *     operationId="updateproppertis",
     *     tags={"categories"},
     *     summary="proppertis updated ",
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
     *         response=200,
     *         description="all proppertis"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update(Request $request, Propperti $propperti)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
