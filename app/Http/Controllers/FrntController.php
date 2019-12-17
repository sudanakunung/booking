<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;
use App\Facility;
use App\Property_facility;
use App\Gallery;
use App\City;
use App\User;
use App\booking;
use Hash;
Use Alert;
use DB;
use Illuminate\Database\Eloquent\Model;


class FrntController extends Controller
{
    public function index(){
        $city = City::all();
        return view('frnt.home')->with(compact('city'));
    }

    public function properties(){
        $cities = City::all();
        $properties = Property::paginate(12);
        return view('frnt.properties', compact('properties','cities'));
    }

    public function property($slug){
        $property = Property::where(['slug' => $slug])->first();
        $property_facility = Property_facility::where(['uid' => $property->uid])->get();
        $facility = Facility::all();
        $gallery = Gallery::where(['uid' => $property->uid])->get();
        return view('frnt.property')->with(compact('property', 'property_facility', 'facility', 'gallery'));
    }

    public function check_availability(Request $request){
        $pwd = rand(1, 9999);
        $request->session()->put('full_name', $request->full_name);
        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($pwd),
        ]);
        return view('frnt.property');
    }

    public function desa_wisata(){
        return view('frnt.desa_wisata');
    }

    public function area($slug){
        // $data = $request->input();
        $cities = City::all();
        $city = City::where(['slug' => $slug])->first();
        $properties = Property::where(['city_id' => $city->id])->get();
        return view('frnt.area')->with(compact('properties', 'cities'));
    }
    public function check_date(Request $request){
        $property = Property::where(['id' => $request->id_property])->first();
        // check date
        $booking=booking::select("booking.*")->
        whereRaw('? between date_start and date_end',[$request->date_start,$request->date_end])->get()->min('sisa_kamar');


        // check sisa kamar
        if ($booking!=NULL){
            $sisa_room=$booking;
        }else{
            $sisa_room=$property->total_room;
        }
        $property = Property::where(['id' => $request->id_property])->first();
            $max_pengunjung=$property->max_person;
            $jumlah_pengunjung=$request->adult+$request->child;
            if ($max_pengunjung>$jumlah_pengunjung)
            {
                $kamar=1;
            }else{
                $kamar=$jumlah_pengunjung/$max_pengunjung;
            }
                if($kamar>$sisa_room){
                    $pwd = rand(1, 9999);
                    $request->session()->put('full_name', $request->full_name);
                    User::create([
                        'full_name' => $request->full_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'password' => Hash::make($pwd),
                    ]);
                    return redirect()->back()->with('error', 'room full');
                }else{
                
                    $request->session()->put('berhasil', 'cek pembayaran anda');
                    $sisa_room=$sisa_room-$kamar;
                    $booking=booking::create([
                                'id_property' => $request->id_property,
                                'jumlah_adult' => $request->adult,
                                'jumlah_kamar'=> $kamar,
                                'sisa_kamar'=>$sisa_room,
                                'jumlah_child' => $request->child,
                                'date_start'=> $request->date_start,
                                'date_end' => $request->date_end, 
                            ]);
                            return redirect()->back()->with('status', 'berhasil');
                }

    }
    public function forget(Request $request){
        $request->session()->forget('berhasil', 'cek pembayaran anda');
        $request->session()->forget('full_name');
        return redirect()->back();
    }
}
