<?php

namespace App\Http\Controllers;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function addVoucher(Request $request){
        $data = $request->all();
        \Log::info('i am calling');
        $voucher = Voucher::create($data);
        return response()->json([
            'voucher' => $voucher,
            'success' => true
        ],200);
    }

    public function showVoucher(){
        $voucher = Voucher::all();
        return response()->json([
            'voucher' => $voucher,
            'success' => true
        ],200);
    }

    
    public function showSingleVoucher($id){
        $voucher = Voucher::where('id',$id)->get();
        return response()->json([
            'voucher' => $voucher,
            'success' => true
        ],200);
    }
    public function updateVoucher(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $voucher = Voucher::where('id',$id)->update($data);
        return response()->json([
            'voucher' => $voucher,
            'success' => true
        ],200);
   
    }
    
    public function deleteVoucher($id)
    {
        $voucher = Voucher::where('id','=',$id)
          ->first();
          if($voucher->count()){
            $voucher->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
