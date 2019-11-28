<?php

namespace App\Http\Controllers;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function addStatus(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Status::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showStatus(){
        $status = Status::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleStatus($id){
        $status = Status::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateStatus(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = Status::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteStatus($id)
    {
        $status = Status::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
