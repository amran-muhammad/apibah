<?php

namespace App\Http\Controllers;
use App\ShippingTable;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function addShipping(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $status = ShippingTable::create($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    public function showShipping(){
        $status = ShippingTable::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleShipping($id){
        $status = ShippingTable::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateShipping(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = ShippingTable::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteShipping($id)
    {
        $status = ShippingTable::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }   
}
