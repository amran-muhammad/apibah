<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $user = User::create($data);
        return response()->json([
            'user' => $user,
            'success' => true
        ],200);
    }

    public function showUser(){
        $user = User::all();
        return response()->json([
            'user' => $user,
            'success' => true
        ],200);
    }

    
    public function showSingleUser($id){
        $user = User::where('id',$id)->get();
        return response()->json([
            'user' => $user,
            'success' => true
        ],200);
    }
    public function updateUser(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $user = User::where('id',$id)->update($data);
        return response()->json([
            'user' => $user,
            'success' => true
        ],200);
   
    }
    
    public function deleteUser($id)
    {
        $user = User::where('id','=',$id)
          ->first();
          if($user->count()){
            $user->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }

    
}
