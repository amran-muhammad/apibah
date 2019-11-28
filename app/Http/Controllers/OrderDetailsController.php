<?php

namespace App\Http\Controllers;
use App\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function addOrderDetails(Request $request){
        $data = $request->all();
        $data['subTotal']= 0;
        
        $orders = DB::table('order_details_products')->where('userId', $data['customerId'])->get();
        if($orders){
            foreach($orders as $order) {
                $data['orderId']=$order->orderId;
                $data['subTotal']+=$order->totalPrice;
               
            }
            $orderdetails = OrderDetails::create($data);
            return response()->json([
                'orderdetails' => $orderdetails,
                'success' => true
            ],200);
        }


        
       
    }

    public function showOrderDetails(){
        $orderdetails = OrderDetails::all();
        return response()->json([
            'orderdetails' => $orderdetails,
            'success' => true
        ],200);
    }

    
    public function showSingleOrderDetails($id){
        $orderdetails = OrderDetails::where('id',$id)->get();
        return response()->json([
            'orderdetails' => $orderdetails,
            'success' => true
        ],200);
    }
    public function updateOrderDetails(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $orderdetails = OrderDetails::where('id',$id)->update($data);
        return response()->json([
            'orderdetails' => $orderdetails,
            'success' => true
        ],200);
   
    }
    
    public function deleteOrderDetails($id)
    {
        $orderdetails = OrderDetails::where('id','=',$id)
          ->first();
          if($orderdetails->count()){
            $orderdetails->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
