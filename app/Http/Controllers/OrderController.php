<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    

    public function showOrder(){
        $order = Order::all();
        return response()->json([
            'order' => $order,
            'success' => true
        ],200);
    }

    
    public function showSingleOrder($id){
        $order = Order::where('id',$id)->get();
        return response()->json([
            'order' => $order,
            'success' => true
        ],200);
    }
    public function updateOrder(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $order = Order::where('id',$id)->update($data);
        return response()->json([
            'order' => $order,
            'success' => true
        ],200);
   
    }
    
    public function deleteOrder($id)
    {
        $order = Order::where('id','=',$id)
          ->first();
          if($order->count()){
            $order->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
