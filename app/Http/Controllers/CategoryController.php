<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Category::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showCategory(){
        $status = Category::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleCategory($id){
        $status = Category::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateCategory(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Category::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteCategory($id)
    {
        $status = Category::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}

