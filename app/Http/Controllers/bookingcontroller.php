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
class bookingcontroller extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
 
    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user=user::where('email',$request->email)->first();
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
 
    /**
     * Show index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['donations'] = Donation::orderBy('id', 'desc')->paginate(8);
 
        return view('welcome', $data);
    }
 
    /**
     * Submit donation.
     *
     * @return array
     */
    public function submitbooking( request $request)
    {   
       
        \DB::transaction(function(){
            // Save donasi ke database
          
         $booking=booking::create([
                            'id_property' =>  $this->request->id_property,
                            'jumlah_kamar'=> $this->request->room,
                            'amount'=> $this->request->fix_harga,
                            'id_user'=>   $this->user->id,
                            'date_start'=>  $this->request->date_start,
                            'date_end' =>  $this->request->date_end, 
                        ]);
 
            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $booking->id,
                    'gross_amount'  => $booking->amount,
                ],
                'customer_details' => [
                    'first_name'    => $booking->full_name,
                    'email'         => $this->user->email,
                    'phone'         => $this->user->phone,
                    // 'address'       => '',
                ],
                'item_details' => [
                    [
                        'id'       => $booking->id_property,
                        'price'    => $this->request->fix_harga,
                        'quantity' => $booking->jumlah_kamar,
                        'name'     => ucwords(str_replace('_', ' ',$this->request->property_name))
                    ]
                ]
            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $booking->snap_token = $snapToken;
            $booking->save();
 
            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });
 
        return response()->json($this->response);
    }
 
    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Donation::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $donation->setSuccess();
 
          } elseif($transaction == 'pending'){
 
            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $donation->setPending();
 
          } elseif ($transaction == 'deny') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $donation->setFailed();
 
          } elseif ($transaction == 'expire') {
 
            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $donation->setExpired();
 
          } elseif ($transaction == 'cancel') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $donation->setFailed();
 
          }
 
        });
 
        return;
    }
}