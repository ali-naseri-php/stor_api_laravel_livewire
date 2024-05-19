<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /**
     * Register a new user.
     *
     * @OA\Post(
     *     path="/api/v1/register",
     *     operationId="registerUser",
     *     tags={"auth"},
     *     summary="register a new user",
     *     description="register a new user with  email, and password",
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
     *                 @OA\Property(
     *                      property="name",
     *                      type="string"
     *                  ),
     *                 example={ "name":"ali naseri","email": "john@example.com", "password": "11234567ali"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="username : username ,token : token is "
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|max:255|min:8',
            'email' => 'required|email|max:255|unique:users',
            'name' => 'required|min:2|max:255',
        ]);
        //        unique:users

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        //dd($validator->email);


        User::create(['name' => $request->name,
                                 'email' => $request->email,
                                 'password' => bcrypt($request->password),]);
        if (!Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            return response()->json(['msg' => 'error if not equal'], 422);

        $user = Auth::user();
//        dd($user);
        $token = $user->createToken('user')->accessToken;
        return response()->json(['username' => Auth::user()->name, 'token' => $token], 200);


    }

}
