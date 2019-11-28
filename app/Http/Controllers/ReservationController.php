<?php

namespace App\Http\Controllers;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function addReservation(Request $request){
        $data = $request->all();
        
        \Log::info('i am calling');
        $reservation = Reservation::create($data);
        return response()->json([
            'reservation' => $reservation,
            'success' => true
        ],200);
    }

    public function showReservation(){
        $reservation = Reservation::all();
        return response()->json([
            'reservation' => $reservation,
            'success' => true
        ],200);
    }

    
    public function showSingleReservation($id){
        $voucher = Reservation::where('id',$id)->get();
        return response()->json([
            'reservation' => $reservation,
            'success' => true
        ],200);
    }
    public function updateReservation(Request $request,$id){
        $data = $request->all();
        \Log::info('i am calling');
        $reservation = Reservation::where('id',$id)->update($data);
        return response()->json([
            'reservation' => $reservation,
            'success' => true
        ],200);
   
    }
    
    public function deleteReservation($id)
    {
        $reservation = Reservation::where('id','=',$id)
          ->first();
          if($reservation->count()){
            $reservation->delete();
            return response()->json(['msg'=>'success','status'=>$id]);
          } else {
            return response()->json(['msg'=>'error','status'=>$id]);
          }
    }
}
