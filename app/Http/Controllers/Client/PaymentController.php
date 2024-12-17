<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'amount' => 'required|numeric|min:1',
        //     'reference' => 'required|string|unique:payments,reference', // Ensure unique references
        // ]);

        try {
            // Set required fields for Paystack
            $request->merge([
                'amount' => $request->amount * 100, // Convert naira to kobo
            ]);
            $data = array(
                "amount" => 700 * 100,
                "reference" => '4g4g5485g8545jg8gj',
                "email" => 'user@mail.com',
                "currency" => "NGN",
                // "orderID" => 23456,
            );
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to initialize payment.');
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

}
