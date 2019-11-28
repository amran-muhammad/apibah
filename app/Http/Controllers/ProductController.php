<?php

namespace App\Http\Controllers;
use App\Product;
use App\Photo;
use App\Video;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request){
        $data = $request->all();
        $photolink = $data['photolink'];
        $videolink = $data['videolink'];
        unset($data['photolink']);
        unset($data['videolink']);
        $product = Product::create($data);

        $photo = [];
        $video = [];
        $ob1 = [];
        $ob1['productId'] = $product->id;
        $ob1['link'] = $photolink;
        array_push($photo,$ob1);
        
        Photo::insert($photo);
        $ob2 = [];
        $ob2['productId'] = $product->id;
        $ob2['link'] = $videolink;
        array_push($video,$ob2);
        
        Video::insert($video);

        \Log::info('i am calling');
        
        return response()->json([
            'product' => $product,
            'success' => true
        ],200);
    }

    public function showProduct(){
        $product = Product::all();
        return response()->json([
            'product' => $product,
            'success' => true
        ],200);
    }

    
    public function showSingleProduct($id){
        $product = Product::where('id',$id)->get();
        return response()->json([
            'product' => $product,
            'success' => true
        ],200);
    }
    public function updateProduct(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');

        $photolink['link'] = $data['photolink'];
        $videolink['link'] = $data['videolink'];
        unset($data['photolink']);
        unset($data['videolink']);
        $product = Product::where('id',$id)->update($data);
        
        Photo::where('productId',$id)->update($photolink);
       
        Video::where('productId',$id)->update($videolink);

        return response()->json([
            'product' => $product,
            'success' => true
        ],200);
   
    }
    
    public function deleteProduct($id)
    {
        $product = Product::where('id','=',$id)
          ->first();
          if($product->count()){
            $product->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
