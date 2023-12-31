<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is for test purpose"

        ]);

        Session::flash('success', 'Payment successful!');

        return back();

    }

    }

