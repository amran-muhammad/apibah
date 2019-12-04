<?php

namespace App\Http\Controllers;
use App\OrderDetail;
use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function addOrderDetail(Request $request){
        $data = $request->all();

        $details['customerId']=$data['userId'];
        $details['status']=$data['status'];
        $details['driverId']=$data['driverId'];
        $details['paymentType']=$data['paymentType'];
        $details['shippingPrice']=$data['shippingPrice'];
        $details['discount']=$data['discount'];
        $details['date']= $data['date'];
        unset($data['status']);
        unset($data['driverId']);
        unset($data['paymentType']);
        unset($data['shippingPrice']);
        unset($data['discount']);
        unset($data['date']);
        
        $details['subTotal']= 0;
        $OD = [];
        $carts = Cart::where('userId', $data['userId'])->get();

        foreach($carts as $cart) $details['subTotal']+=$cart->totalPrice;
       
        $details['grandTotal'] = $details['subTotal']+$details['shippingPrice']-$details['discount'];
        $order = Order::create($details);
        //stock decreases
        if($carts){
            foreach($carts as $cart){
             $data['productId'] =$cart->productId;
             $data['price'] =$cart->price;
             $data['quantity'] =$cart->quantity;
             $data['totalPrice'] =$cart->totalPrice;
             $data['orderId'] = $order->id;
             $stock = Product::where('id', $data['productId'])->value('stock');
             $stock-= $data['quantity'];
             Product::where('id', $data['productId'])->update(array('stock' => $stock));
             array_push($OD,$data); 
            }    
        }
    
        foreach($carts as $cart) $cart->delete();
        
        OrderDetail::insert($OD);
        return response()->json([
            'status' => $order,
            'success' => true
        ],200);
       
    }

    public function showOrderDetail(){
        $status = OrderDetail::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleOrderDetail($id){
        $status = OrderDetail::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateOrderDetail(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = OrderDetail::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteOrderDetail($id)
    {
        $status = OrderDetail::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }

}
