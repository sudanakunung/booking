<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
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
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Database\Eloquent\Model;


class FrntController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
 
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

        $booking=booking::select("booking.*")->
        whereRaw('? between date_start and date_end',[$request->date_start,$request->date_end])->get();

        $bookingan= DB::table('booking')->where('date_start','>=',$request->date_start,'and','date_end','<=',$request->date_end)->where('id_property',$request->id_property)->get()->sum('jumlah_kamar');

        $kamar_disewa=$request->room;
        $jumlah_kamar=$bookingan+ $kamar_disewa;
        $max_room=$property->total_room;

        $harga_sebelum_potongan=$request->room*$property->price;
        $harga_setelah_potongan=$harga_sebelum_potongan*0.1;
        $fix_harga=$harga_sebelum_potongan-$harga_setelah_potongan;
       if($request->session()->has('full_name')==NULL){
                $pwd = rand(20,9999);
                $kode_unik=rand(20,999);       
                $user=User::create([
                    'full_name' =>  $request->full_name,
                    'email' =>  $request->email,
                    'phone' =>  $request->phone,
                    'password' => hash::make($pwd),
                    'kode_unik' => $kode_unik,
                    ]);
                    $request->session()->put('id_user',$user->id);
                    $request->session()->put('full_name', $user->full_name);
                    $request->session()->put('email', $user->email);
                    $request->session()->put('phone', $user->phone);
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                    $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
                    $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
                    $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
                    $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
                    $mail->setFrom(env('MY_EMAIL'), env('MY_NAME')); 
                    // $mail->Subject = $request->subject;
                    $mail->MsgHTML(view('user.mail',['password'=>$pwd,'user'=>$user]));
                    $mail->addAddress($request->email ); 
                    $mail->send();
                
            }
                if($jumlah_kamar>$max_room){
                    $request->session()->forget('berhasil');
                   $request->session()->put('full', 'room full');
                    return redirect()->back();
                }else{

                    $request->session()->forget('full');
                    $request->session()->put('date_start', $request->date_start);
                    $request->session()->put('date_end', $request->date_end);
                    $request->session()->put('servis', $harga_setelah_potongan);
                    $request->session()->put('fix_harga', $fix_harga);
                    $request->session()->put('room', $request->room);
                    $request->session()->put('id_user', $request->id_user);
                    $request->session()->put('property_name', $property->property_name);
                    $request->session()->put('berhasil', 'room tersedia');
                            return redirect()->back();
                        }          
                }
    public function forget(Request $request){
        $request->session()->flush();
        return redirect()->back();
    }
  
}
