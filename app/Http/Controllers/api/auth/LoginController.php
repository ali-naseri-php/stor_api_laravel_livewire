<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Register a new user.
     *
     * @OA\Post(
     *     path="/api/v1/login",
     *     operationId="loginUser",
     *     tags={"auth"},
     *     summary="login a  user",
     *     description="login a  user with  email, and password",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={ "email": "john@example.com", "password": "11234567ali"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="username : username ,token : token is "
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|max:255|min:8',
            'email' => 'required|email|max:255',
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        if (!Auth::attempt($validator->validate()))
            return response()->json(['msg' => 'error if not equal'], 422);

        $user = Auth::user();
        $token = $user->createToken('user')->accessToken;
        //dd($token);
        //        $tokenval = $token->token;
        return response()->json(['username' => Auth::user()->name, 'token' => $token], 200);


    }


}
