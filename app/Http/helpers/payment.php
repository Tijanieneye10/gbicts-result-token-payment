<?php

use App\Models\Admin\Admin;

if (!function_exists('payment_method')) {
    function payment_method($quantity)
    {
        $postdata = array(
            "tx_ref" => uniqid() . uniqid(),
            "amount" => auth()->user()->price * $quantity,
            "currency" => "NGN",
            "redirect_url" => route('tokens.create'),
            "payment_options" => "card",
            "meta" => array(
                "consumer_id" => 23,
                "consumer_mac" => "92a3-912ba-1192a"
            ),
            "customer" => array(
                "email" => auth()->user()->email,
                "phonenumber" => auth()->user()->phone,
                "name" => auth()->user()->school
            ),
            "customizations" => array(
                "title" => "Result checker Tokens",
                "description" => "Result checker tokens ",
                "logo" => "https://assets.piedpiper.com/logo.png"
            )
        );

        //making a call to the endpoint....
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.flutterwave.com/v3/payments");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);

        $secKey = env('FLUTTERWAVE_API');
        $token = 'Bearer ' . $secKey;
        $headers = array('Content-Type: application/json', 'Authorization:' . $token);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $request = curl_exec($ch);
        $result = json_decode($request, true);
        
        $url = $result['data']['link'];
        return $url;
        curl_close($ch);
    }
}

if (!function_exists('upsertDatabase')) {
    function upsertDatabase($numberOfTokens)
    {
        $result = Admin::where(['status' => null, 'card_user' => null])
            ->limit($numberOfTokens)
            ->get('card_no');
        $getTokenNumber = [];

        foreach ($result as $value) {
            auth()->user()->sales()->create(['cards' => $value->card_no]);
            $getTokenNumber[] = $value->card_no;
        }

        Admin::whereIn('card_no', $getTokenNumber)
            ->update(['status' => 'Sold', 'school' => auth()->user()->school]);
        return $result;
    }
}
