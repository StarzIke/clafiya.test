<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function registration(Request $request){
        try {
            //Validates user's registration data
            $validation = Validator::make($request->all(),[
               'name'=> 'required',
               'email' => 'required|string|email|max:255|unique:users',
               'password' => 'required|string|min:6|confirmed'
            ]);

            //returns validation error message if validation fails
            if($validation->fails()){
                return response()->json($validation->errors(), 422);
            }

            //Gets user's data after validation
            $userData = $request->all();

            //Encrypts user's password
            $userData['password'] = bcrypt($userData['password']);

            //create a new user and saves record in database
            $user = User::create($userData);

            //generates access token for new user
            $token = $user->createToken('Authorization Token')->accessToken;

            return response()->json([
                'status' => true,
                'access_token' => $token,
                'user'=> $userData,
                'message' => 'User Successfully Registered'
            ], 200);

        } catch (\Exception $e) {

            return response()->json(['status' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function login(Request $request)
    {
        try {

            $login = $request->validate([
                'email'   => 'required',
                'password' => 'required|min:6'
            ]);

            if(!Auth::attempt($login)){
                return response(['status' => false,'message' => 'Invalid Login Credentials'], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('Authorization Token')->accessToken;           
            return response()->json([
                'status' => true,
                'access_token' => $token,
                'user'=> $user,
                'message' => 'User Logged In Successfully'
                
            ], 200);
        } catch (\Exception $e) {

            return response()->json(['status' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function logout(Request $request)
    {
        try {

            $request->user()->token()->revoke();     

            return response()->json(['status' => 1, 'message' => ' User Successfully logged out']);
        } catch (\Exception $e) {

            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }
}
