<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Transaction;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $paystack = new Paystack;
        return $paystack->getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paystack = new Paystack;
        $paymentDetails = $paystack->getPaymentData();

        // dd($paymentDetails['data']['authorization']);
        $this->storeAuth($paymentDetails['data']['authorization']);
        TransactionController::storeTrans($paymentDetails, 'card added', 0);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
    public static function storeAuth($details)
    {
        DB::table('authorization')->insert([
            'user_id' => auth()->user()->id,
            'pay_email' => auth()->user()->email,
            'authorization_code' => $details['authorization_code'],
            'bin' => $details['bin'],
            'last4' => $details['last4'],
            'exp_month' => $details['exp_month'],
            'exp_year' => $details['exp_year'],
            'channel' => $details['channel'],
            'card_type' => $details['card_type'],
            'bank' => $details['bank'],
            'country_code' => $details['country_code'],
            'brand' => $details['brand'],
            'reusable' => $details['reusable'],
            'signature' => $details['signature'],
        ]);

    }


    public function chargeCard($cus){
        // config()

        $result = array();
        $charge = DB::table('authorization')->where('id', $cus)->first();
        // dd($charge);
        // Pass the customer's authorisation code, email and amount
        $postdata =  array( 'authorization_code' => $charge->authorization_code,'email' => $charge->pay_email, 'amount' => 5000000,"reference" => '0bxco8lyc2aa0fq');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/charge_authorization");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
          'Authorization: Bearer sk_test_b71eddb3917fd383b8d78a4303d06b11309b2f74',
          'Content-Type: application/json',
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $request = curl_exec ($ch);

        curl_close ($ch);
        if ($request) {
          $result = json_decode($request, true);
        }
    }
}
