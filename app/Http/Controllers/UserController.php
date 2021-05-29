<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Request Method: GET
    public function getAllUser(){
        return UserResource::collection(User::orderBy('created_at','Desc')->get()) ;
    }

    // $request -> JSON (consume = application/json)
    // Response -> JSON (Produce = JSON)
    // Request Method: POST
    public function storeUser(Request $request){
        $user = new User();

        $user->fullName = $request->data['fullName'];
        $user->email = $request->data['email'];
        $user->password = Hash::make($request->data['password']);

        $user->save();

        return response()->json(['data'=>$user]);
    }

    //
    public function updateUser(Request $request, User $user){

    }

    //
    public function deleteUser(User $user){

    }

    //
    public function login(Request $request){

    }

    //
    public function changePassword(Request $request, User $user){

    }

    //
    public function forgetPassword(){

    }
}
