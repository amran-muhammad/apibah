<?php

namespace App\Http\Controllers;
use App\OrderDetailsProduct;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderDetailsProductController extends Controller
{
    public function addOrderDetailsProduct(Request $request){
        $data = $request->all();
        $ODP = [];
        $carts = DB::table('carts')->where('userId', $data['userId'])->get();
        $orderId = rand(1,100000000);
        if($carts){
            foreach($carts as $cart){
             $data['productId'] =$cart->productId;
             $data['price'] =$cart->price;
             $data['quantity'] =$cart->quantity;
             $data['totalPrice'] =$cart->totalPrice;
             $data['orderId'] =$orderId;
            // $status = OrderDetailsProduct::create($data);
            array_push($ODP,$data); 
            }
            
        }
        $cartsdel = Cart::where('userId','=',$data['userId'])
          ->get();
            foreach($cartsdel as $cart){
                $cart->delete();
            }
        
           $status = OrderDetailsProduct::insert($ODP);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
       
    }

    public function showOrderDetailsProduct(){
        $status = OrderDetailsProduct::all();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }

    
    public function showSingleOrderDetailsProduct($id){
        $status = OrderDetailsProduct::where('id',$id)->get();
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
    }
    public function updateOrderDetailsProduct(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $status = OrderDetailsProduct::where('id',$id)->update($data);
        return response()->json([
            'status' => $status,
            'success' => true
        ],200);
   
    }
    
    public function deleteOrderDetailsProduct($id)
    {
        $status = OrderDetailsProduct::where('id','=',$id)
          ->first();
          if($status->count()){
            $status->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }

}
