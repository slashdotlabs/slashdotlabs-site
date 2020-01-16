<?php


namespace App\Billing;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class IpayPaymentGateway implements PaymentGatewayContract
{

    public function charge($meta_data)
    {
        $ipay_base_url = "https://payments.ipayafrica.com/v3/ke";
        $fields = collect(["live" => "1",
            "oid" => $meta_data['order_id'],
            "inv" => null,
            "ttl" => $meta_data['total_amount'],
            "tel" => $meta_data['phone_number'],
            "eml" => $meta_data['email'],
            "vid" => "slashdot", //demo use demo slashdot
            "curr" => "KES",
            "p1" => "KES",
            "p2" => "",
            "p3" => "",
            "p4" => "",
            "cbk" => url('payment/process'),
            "cst" => "1",
            "crl" => "0"
        ]);

        // datastring
        $datastring = implode("", $fields->toArray());
        // hashkey
        $hashkey = 'S1@shD0T!@bz';
        // generate hash
        $generated_hash = hash_hmac('sha1',$datastring , $hashkey);

        $fields->put('hsh', $generated_hash);
        // url encode callback
        $fields['cbk'] = urlencode($fields->get('cbk'));
        $fields_string = $fields->map(function ($value, $key) {
            return $key.'='.$value;
        })->join('&');

        // Log
        Log::channel('ipay')->debug(['fields' => $fields->toArray(), 'url' => $ipay_base_url.'?'.$fields_string]);

        return redirect($ipay_base_url.'?'.$fields_string);
    }

    public function verify_payment()
    {
        //TODO:
    }

    /**
     * @param $code string Status code from iPay redirct
     * @return mixed
     */
    public function get_status_state($code)
    {
        $state = '';
        $process = false;
        switch ($code) {
            case 'fe2707etr5s4wq':
                $state = 'Failed transaction';
                break;
            case 'aei7p7yrx4ae34':
                $state  = 'Success';
                $process = true;
                break;
            case 'bdi6p2yy76etrs':
                $state = 'Pending: Incoming Mobile Money Transaction Not found. Please try again in 5 minutes.';
                break;
            case 'cr5i3pgy9867e1':
                $state = 'This code has been used already. A notification of this transaction sent to the merchant.';
                break;
            case 'dtfi4p7yty45wq':
                $state = 'The amount that you have sent via mobile money is LESS than what was required to validate this transaction.';
                break;
            case 'eq3i7p5yt7645e':
                $state = 'The amount that you have sent via mobile money is MORE than what was required to validate this transaction.';

        }
        return ['process'=>$process, 'state' => $state];

    }

}
