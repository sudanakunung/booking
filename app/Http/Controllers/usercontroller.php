<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use Session;
use Hash;
use App\booking;
use App\property;
use DB;
class usercontroller extends Controller
{
    public function index(){
        return view('user.login');
    }
   
        public function authenticate(Request $request)
    {   
       
        $credentials = $request->only('email', 'password');
      
        if (Auth::attempt($credentials)) {
          return redirect('user/dashboard');
        }else{
           return redirect()->back();
        }
       
        
    }
    public function changepassword( request $request){
        
        $kode=user::where('email',$request->email)->first();

        if($kode->kode_unik==$request->password){
            $request->session()->forget('sukses');
            $request->session()->put('change_password','Ganti password');
            return view('user.login',['email'=>$request->email]);
        }else{
            return view('user.login');
        }

    }
    public function change(request $request){
        $request->session()->forget('change_password');
        user::where('email',$request->email)->update([
            'password'=>hash::make($request->new_password),
        ]);
    }
    public function dashboard(request $request){
      
        $id=auth::user()->id;
        $data_transaksi=booking::where('id_user',$id)->get();

        $property = DB::table('property')
            ->join('booking', 'property.id', '=', 'booking.id_property')
            ->select('property.*', 'property.property_name','booking.date_start','booking.date_end','booking.jumlah_kamar','booking.amount','booking.status')
            ->where('booking.id_user',$id)
            ->get();
       return view('user.dashboard')->with(compact('data_transaksi','property'));
    }
}
