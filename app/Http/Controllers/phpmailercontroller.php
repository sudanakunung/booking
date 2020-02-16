<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class phpmailercontroller extends Controller
{
    
    public function sendmail( request $request){

        $user=user::where('email',$request->email)->first();
        $mail = new PHPMailer(true);
        try{
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
            $passwrod=$user->kode_unik;
            $mail->MsgHTML(view('user.mail',['password'=>$passwrod]));
            $mail->addAddress($request->email ); 
            $mail->send();
        }catch(phpmailerException $e){
            dd($e);
        }catch(Exception $e){
            dd($e);
        }
        if($mail){
            $request->session()->put('sukses','masukkan 4 digit angka');
            return view('user.login',['email'=>$request->email]);
        }else{
            return redirect('user/login')->with('tidak_ketemu','check email alamat email anda');
        }
    }
}
