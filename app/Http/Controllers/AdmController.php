<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
Use App\Personal;
Use App\School;
Use App\Gallery;
Use App\Facility;
Use App\City;
Use App\Property_facility;
Use App\Blog;
Use App\Booking;
Use App\Property;
use Illuminate\Support\Facades\Hash;
use ImageOptimizer;
use DB;
use File;
use Illuminate\Support\Facades\Storage;

class AdmController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
    		if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
    			return redirect('/dashboard');
    		}else{
                return redirect('/login')->with('error', '<div class="alert alert-danger"><strong>Error!</strong> Invalid Emmail or Password</div>');
            }
        }
        return view('auth.login');
    }

    public function logout(){
        Session::flush();
        return redirect('/login')->with('error', '<div class="alert alert-success"><strong>Success!</strong> You have logged out</div>');
    }

    public function dashboard(){
        $user = User::where(['email' => Auth::user()->email])->first();
        return view('adm.dashboard')->with(compact('user'));
    }

    public function booking(){
        $user = User::where(['email' => Auth::user()->email])->first();
        $booking = Booking::with('booking_user', 'booking_property')->get();
        return view('adm.booking')->with(compact('user', 'booking'));
    }

    public function profile(){
        $user = User::where(['email' => Auth::user()->email])->first();
        return view('adm.profile')->with(compact('user'));
    }

    // Property
    public function property(){
        $user = User::where(['email' => Auth::user()->email])->first();
        $property = Property::with('property_facility', 'property_gallery', 'property_user', 'property_city')->get();
        $facility = Facility::all();
        return view('adm.property')->with(compact('user','property','facility'));
    }

    public function property_add(){
        $user = User::where(['email' => Auth::user()->email])->first();
        $city = City::all();
        $facility = Facility::all();
        return view('adm.property_add')->with(compact('user','city','facility'));
    }

    public function property_upload(Request $request){
        $pi = $request->primary_image;
        $gambar_utama = $pi->store('/public/property');
        Property::create([
            'property_name' => $request->property_name, 
            'uid' => $request->uid, 
            'slug' => $request->slug, 
            'description' => $request->description, 
            'address' => $request->address, 
            'detail_address' => $request->detail_address, 
            'longitude' => $request->longitude, 
            'latitude' => $request->latitude, 
            'city_id' => $request->city, 
            'max_person' => $request->max_person, 
            'total_room' => $request->total_room, 
            'primary_image' => $gambar_utama,
            'price' => $request->price, 
            'user_id' => '1'
        ]);
        
        foreach ($request->gallery as $photo) {
            $name = $photo->store('/public/property');
            Gallery::create([
                'uid' => $request->uid,
                'gambar' => $name
            ]);
        }

        foreach ($request->facility as $fasilitas) {
            Property_facility::create([
                'uid' => $request->uid,
                'facility_id' => $fasilitas
            ]);
        }
        return redirect('/dashboard/property')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been saved</div>');
    }

    public function property_edit_save($uid){
        $pi = $request->primary_image;
        $gambar_utama = $pi->store('/public/property');
        Property::create([
            'property_name' => $request->property_name, 
            'uid' => $request->uid, 
            'slug' => $request->slug, 
            'description' => $request->description, 
            'address' => $request->address, 
            'detail_address' => $request->detail_address, 
            'longitude' => $request->longitude, 
            'latitude' => $request->latitude, 
            'city_id' => $request->city, 
            'max_person' => $request->max_person, 
            'total_room' => $request->total_room, 
            'primary_image' => $gambar_utama,
            'price' => $request->price, 
            'user_id' => '1'
        ]);
        
        foreach ($request->gallery as $photo) {
            $name = $photo->store('/public/property');
            Gallery::create([
                'uid' => $request->uid,
                'gambar' => $name
            ]);
        }

        foreach ($request->facility as $fasilitas) {
            Property_facility::create([
                'uid' => $request->uid,
                'facility_id' => $fasilitas
            ]);
        }
        return redirect('/dashboard/property')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been saved</div>');
    }

    public function property_edit($uid){
        $user = User::where(['email' => Auth::user()->email])->first();
        $property = Property::where(['uid' => $uid])->first();
        $property_facility = Property_facility::where(['uid' => $uid])->get();
        $facility = Facility::all();
        $gallery = Gallery::where(['uid' => $uid])->get();
        $city = City::all();
        return view('adm.property_edit')->with(compact('user','facility','property','gallery','city','property_facility'));
    }

    public function property_delete($uid){
        $gallery = Gallery::where(['uid' => $uid])->get();
        foreach($gallery as $g){
            Storage::delete($g->gambar);
        }
        $property = Property::where(['uid' => $uid])->get();
        foreach($property as $p){
            Storage::delete($p->primary_image);
        }
        Property::where(['uid' => $uid])->delete($uid);
        Property_facility::where(['uid' => $uid])->delete($uid);
        Gallery::where(['uid' => $uid])->delete($uid);
        return redirect('/dashboard/property')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been deleted</div>');
    }

    public function property_facility_delete($uid, $fid){
        $pf = Property_facility::where(['facility_id' => $fid], ['uid'=> $uid])->first();
        $p = Property_facility::find($pf->id);
        $p->delete();
        return redirect()->back();
    }

    public function property_gallery_delete($uid, $id){
        $g = Gallery::where(['id' => $id], ['uid'=> $uid])->first();
        Storage::delete($g->gambar);
        Gallery::where(['gambar'=> $g->gambar])->delete();
        return redirect()->back();
    }
    // End Propertys

    // Facility
    public function facility(){
        $user = User::where(['email' => Auth::user()->email])->first();
        $facility = Facility::all();
        return view('adm.facility')->with(compact('user','facility'));
    }

    public function facility_add(Request $request){
        $this->validate($request,[
    		'facility_name' => 'required'
    	]);

    	Facility::create([
    		'facility_name' => $request->facility_name
    	]);
 
    	return redirect('/dashboard/facility')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been saved</div>');
    }

    public function facility_edit($id){
        $user = User::where(['email' => Auth::user()->email])->first();
        $facility = Facility::all();
        $edit = Facility::find($id);
        return view('adm.facility_edit')->with(compact('user','facility','edit'));
    }

    public function facility_edit_save($id, Request $request){
    	$this->validate($request,[
    		'facility_name' => 'required'
    	]);

    	$f = Facility::find($id);
    	$f->facility_name = $request->facility_name;
    	$f->save();
    	return redirect('/dashboard/facility')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been updated</div>');
	}

	public function facility_delete($id){
        $user = User::where(['email' => Auth::user()->email])->first();
        $facility = Facility::find($id);
    	$facility->delete();
        return redirect('/dashboard/facility')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been deleted</div>');
    }
    // End Facility

    // City
    public function city(){
        $user = User::where(['email' => Auth::user()->email])->first();
        $city = City::all();
        return view('adm.city')->with(compact('user','city'));
    }

    public function city_add(Request $request){
        $this->validate($request,[
    		'city_name' => 'required'
    	]);

    	City::create([
    		'city_name' => $request->city_name,
            'slug' => $request->slug
    	]);
 
    	return redirect('/dashboard/city')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been saved</div>');
    }

    public function city_edit($id){
        $user = User::where(['email' => Auth::user()->email])->first();
        $city = City::all();
        $edit = City::find($id);
        return view('adm.city_edit')->with(compact('user','city','edit'));
    }

    public function city_edit_save($id, Request $request){
    	$this->validate($request,[
    		'city_name' => 'required'
    	]);

    	$f = City::find($id);
    	$f->city_name = $request->city_name;
        $f->slug = $request->slug;
    	$f->save();
    	return redirect('/dashboard/city')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been updated</div>');
	}

	public function city_delete($id){
        $user = User::where(['email' => Auth::user()->email])->first();
        $city = City::find($id);
    	$city->delete();
        return redirect('/dashboard/city')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Your data has been deleted</div>');
    }
    // End City

    // Password
    public function change_password(){
        $user = User::where(['email' => Auth::user()->email])->first();
        return view('adm.change_password')->with(compact('user'));
    }

    public function update_password(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['id' => $data['id_user']])->first();
            $current_password = $data['current_password'];
            if(Hash::check($current_password, $check_password->password)){
                $password = bcrypt($data['new_password']);
                User::where('id',$data['id_user'])->update(['password' => $password]);
                return redirect('/dashboard/change-password')->with('error', '<div class="alert alert-success"><strong>Success!</strong> Password updated Successfully</div>');
            }else{
                return redirect('/dashboard/change-password')->with('error', '<div class="alert alert-danger"><strong>Error!</strong> Incorrect Current Password</div>');
            }
        }
        return view('adm.profile');
    }
    // End Password
}
