<?php

namespace App\Http\Controllers;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Review::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showReview(){
        $status = Review::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleReview($id){
        $status = Review::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateReview(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Review::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteReview($id)
    {
        $status = Review::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
