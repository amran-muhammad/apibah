<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request){
        $data = $request->all();

        
       
        $stockp = DB::table('products')->where('id', $data['productId'])->first();

        $stock = $stockp->stock;


        if( $stock  >= $data['quantity']){

            $query = DB::table('carts')->where([
                ['productId', '=',$data['productId'] ],
                ['userId', '=', $data['userId']]
            ])->first();
            if($query){
                $data['quantity']+=$query->quantity;
                $data['totalPrice'] =  $data['price']*$data['quantity'];
                $cart = Cart::where([
                    ['productId', '=',$data['productId'] ],
                    ['userId', '=', $data['userId']]
                ])->update($data);
                return response()->json([
                    'cart' => $cart,
                    'success' => true
                ],200);

            }else{
                $data['totalPrice'] =  $data['price']*$data['quantity'];
                $cart = Cart::create($data);
            return response()->json([
                'cart' => $cart,
                'success' => true
                    ],200);
                }
            }
            else{
                return response()->json(['msg' => 'out of stock']);
            }




            
       
    }

    public function showCart(){
        $cart = Cart::all();
        return response()->json([
            'cart' => $cart,
            'success' => true
        ],200);
    }

    
    public function showSingleCart($id){
        $cart = Cart::where('id',$id)->get();
        return response()->json([
            'cart' => $cart,
            'success' => true
        ],200);
    }
    public function updateCart(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $cart = Cart::where('id',$id)->update($data);
        return response()->json([
            'cart' => $cart,
            'success' => true
        ],200);
   
    }
    
    public function deleteCart($id)
    {
        $cart = Cart::where('id','=',$id)
          ->first();
          if($cart->count()){
            $cart->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
