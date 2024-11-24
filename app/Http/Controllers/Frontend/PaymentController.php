<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Pricing;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlans;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $config = DB::table('config')->where('config_key', 'like', '%paypal%')->get();
        $mode = $config[0]->config_value;
        $paypal_client_id = $config[1]->config_value;
        $paypal_secret = $config[2]->config_value;
        config()->set('paypal.mode', $mode);
        if ($mode == 'sandbox') {
            config()->set('paypal.sandbox.client_id', $paypal_client_id);
            config()->set('paypal.sandbox.client_secret', $paypal_secret);
        } else {
            config()->set('paypal.live.client_id', $paypal_client_id);
            config()->set('paypal.live.client_secret', $paypal_secret);
        }
    }
    // Process payment
    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        if ($paymentMethod === 'paypal') {
            return $this->processPayPalPayment($request);
        } elseif ($paymentMethod === 'stripe') {
            return $this->processStripePayment($request);
        }
    }

    // PayPal payment processing
    public function processPayPalPayment(Request $request)
    {
        // Retrieve PayPal credentials from config table
        // $config = DB::table('config')->whereIn('id', [5, 6])->pluck('config_value', 'id');
        // $paypalClientId = $config[5];
        // $paypalSecret = $config[6];

        // Retrieve plan details
        $plan_id = $request->pricing_id;
        $plan = Pricing::find($plan_id);

        if (!$plan) {
            Toastr::error('Plan not found.', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('user.dashboard.plansBilling');
        }

        $plan_name = $plan->title;
        $plan_price = $plan->price;
        $plan_duration = $plan->duration;
        $user_id = auth()->user()->id;

        // Set PayPal credentials
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // Create PayPal order
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.dashboard.payment.paypalSuccess', [
                    'plan_id' => $plan_id,
                ]),
                "cancel_url" => route('user.dashboard.payment.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD", // Only currency code, no symbols
                        "value" => $plan_price,
                    ],
                    "description" => $plan_name,
                    "reference_id" => json_encode([
                        "user_id" => $user_id,
                        "plan_id" => $plan_id,
                    ]),
                ]
            ]
        ]);

        // Handle response
        if (isset($response['id']) && $response['id'] != null) {
            // Redirect to the PayPal approval URL
            foreach ($response['links'] as $links) {
                if ($links['rel'] === 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            Toastr::error('Failed to retrieve payment approval link.', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('user.dashboard.plansBilling');
        } else {
            Toastr::error('Something went wrong with the PayPal payment.', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('user.dashboard.plansBilling');
        }
    }


    // Stripe payment processing
    public function processStripePayment($request)
    {
        $config = DB::table('config')->select('config_value')->whereIn('id', ['10', '11'])->get()->pluck('config_value');
        $stripe     = new \Stripe\StripeClient($config[1]);
        $plan_id = $request->pricing_id;
        $plan = Pricing::find($plan_id);
        // dd($plan);
        $plan_name = $plan->title;
        $plan_price = $plan->price;
        $plan_duration = $plan->duration;
        $user_id = auth()->user()->id;
        $amountInCents = intval($plan_price * 100);
        $response = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $plan_name, // You might want to dynamically set this
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'user_id' => $user_id,
                'plan_id' => $plan_id,
            ],
            'mode' => 'payment',
            'success_url' => route('user.dashboard.payment.stripeSuccess') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('user.dashboard.payment.cancel'),
        ]);

        if (isset($response->id) && $response->id != '') {
            return redirect($response->url);
        } else {
            return null;
        }
    }
    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $referenceIdData = json_decode($response['purchase_units'][0]['reference_id'], true);
            $user_id = $referenceIdData['user_id'] ?? null;
            $plan_id = $referenceIdData['plan_id'] ?? null;

            $plan = Pricing::find($plan_id);
            $trx_id = uniqid();

            $userPlan = new UserPlans();
                $userPlan->user_id        = $user_id;
                $userPlan->plan_id        = $plan_id;
                $userPlan->plan_duration  = $plan->duration;
                $userPlan->expired_date   = date('Y-m-d', strtotime('+' . $plan->duration . ' days'));
                $userPlan->save();

                $user = User::find($userPlan->user_id);
                $user->current_pan_id          = $plan_id;
                $user->current_pan_expire_date = $userPlan->expired_date;
                $user->save();

                $trnx                  = new Transaction();
                $trnx->transaction_id  = $trx_id;
                $trnx->payment_method  = 'paypal';
                $trnx->plan_id         = $plan_id;
                $trnx->user_plan_id    = $userPlan->id;
                $trnx->user_id         = $user_id;
                $trnx->amount          = $plan->price;
                $trnx->currency_symbol = '$';
                $trnx->payment_status  = 'paid';
                $trnx->save();

                $mailData = [
                    'title' => 'Order Submit Succesfully for' . ' ' . $plan->title  ,
                    'data' => [
                        'plan_name' => $plan->title,
                        'plan_price' => $plan->price,
                        'plan_duration' => $plan->duration,
                        'expired_date' => $userPlan->expired_date,
                        'user_name' => $user->name,
                        'user_email' => $user->email,
                        'details' => route('user.dashboard.viewInvoice',  $trnx->transaction_id ),
                    ]
                ];
                Mail::to($user->email)->send(new InvoiceMail($mailData));


            Toastr::success('Your payment was successful, and your plan actived successfully.');
            return redirect()->route('user.dashboard.plansBilling');
        } else {
            Toastr::error('Something Wrong Please try again later.');
            return redirect()->route('user.dashboard.plansBilling');

        }
    }


    public function stripeSuccess(Request $request)
    {
        $config = DB::table('config')->select('config_value')->whereIn('id', ['10', '11'])->get()->pluck('config_value');
        if ($request->session_id) {
            // Initialize Stripe client with secret key
            $stripe = new \Stripe\StripeClient($config[1]);

            // Retrieve the session details from Stripe
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            $trx_id = uniqid();
            $plan_id = $response->metadata->plan_id;
            $plan = Pricing::find($plan_id);


            if ($response && $response->id) {

                $userPlan = new UserPlans();
                $userPlan->user_id        = $response->metadata->user_id;
                $userPlan->plan_id        = $plan_id;
                $userPlan->plan_duration  = $plan->duration;
                $userPlan->expired_date   = date('Y-m-d', strtotime('+' . $plan->duration . ' days'));
                $userPlan->save();

                $user = User::find($userPlan->user_id);
                $user->current_pan_id          = $plan_id;
                $user->current_pan_expire_date = $userPlan->expired_date;
                $user->save();

                $trnx                  = new Transaction();
                $trnx->transaction_id  = $trx_id;
                $trnx->payment_method  = 'stripe';
                $trnx->plan_id         = $plan_id;
                $trnx->user_plan_id    = $userPlan->id;
                $trnx->user_id         = $response->metadata->user_id;
                $trnx->amount          = $plan->price;
                $trnx->currency_symbol = '$';
                $trnx->payment_status  = 'paid';
                $trnx->save();


                $mailData = [
                    'title' => 'Order Submit Succesfully for' . ' ' . $plan->title  ,
                    'data' => [
                        'plan_name' => $plan->title,
                        'plan_price' => $plan->price,
                        'plan_duration' => $plan->duration,
                        'expired_date' => $userPlan->expired_date,
                        'user_name' => $user->name,
                        'user_email' => $user->email,
                        'details' => route('user.dashboard.viewInvoice',  $trnx->transaction_id ),
                    ]
                ];
                Mail::to($user->email)->send(new InvoiceMail($mailData));

                // Success message and redirect
                Toastr::success('Your payment was successful, and your plan actived successfully.');
                return redirect()->route('user.dashboard.plansBilling');
            } else {
                // Handle case where session retrieval fails
                Toastr::error('Failed to retrieve payment details.');
                return redirect()->route('user.dashboard.plansBilling');
            }
        } else {
            // Handle case where session_id is missing
            Toastr::error('Invalid session. Payment could not be verified.');
            return redirect()->route('user.dashboard.plansBilling');
        }
    }

    public function paymentCancel()
    {
        Toastr::error('Your payment could not be processed. Please try again or contact support if the issue persists.');
        return redirect()->route('user.dashboard.plansBilling');
    }
}
