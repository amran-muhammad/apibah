<?php

namespace App\Http\Controllers;
use App\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function addSubCategory(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = SubCategory::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showSubCategory(){
        $status = SubCategory::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleSubCategory($id){
        $status = SubCategory::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateSubCategory(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = SubCategory::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteSubCategory($id)
    {
        $status = SubCategory::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
