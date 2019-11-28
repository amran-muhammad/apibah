<?php

namespace App\Http\Controllers;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addWishlist(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Wishlist::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showWishlist(){
        $status = Wishlist::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleWishlist($id){
        $status = Wishlist::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateWishlist(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Wishlist::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteWishlist($id)
    {
        $status = Wishlist::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
