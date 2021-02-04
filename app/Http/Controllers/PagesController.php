<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Currency;

class PagesController extends Controller
{
    
    public function index(){

    	return view('pages.index');
    }


    public function store(Request $request){

    	$request->validate([

    		'firstName'   => 'required',

    		'lastName'    => 'required',

    		'phoneNumber' => 'required|max:15',

    		'email'       => 'required|email',

    		'currency'    => 'required',

    		'amount'      => 'required|numeric'

    	]);


    	$currency      = new Currency();

  		$amount        = $request->amount;

  		$currency      = $request->currency;

  		$email          = $request->email;

  		$total_amount   = 0;

  		

  			if ($currency == 'USD') {
  				
  				$total_amount = intval($amount) * 0.96;

  			} else if($currency == 'KES'){

  				$total_amount = intval($amount) * 116 ;

  			} elseif ($currency == 'GHS') {
  				
  				$total_amount = intval($amount) * 5.9 ;

  			} elseif ($currency == 'EUR') {
  				
  				$total_amount = intval($amount) * 0.88 ;

  			}elseif($currency == 'GBP'){

  				$total_amount = intval($amount) * 0.78 ;

  			}else{

  				$total_amount = intval($amount) * 485 ;
  			}

  			


		$collected_data  = [

		   "tx_ref"          => time(),
		   "amount"          => $total_amount,
		   "currency"        => $currency,
		   "redirect_url"    => "http://127.0.0.1:8000/",
		   "payment_options" => "card",
		   "meta" => [
		      "price"=> $amount
		   ],
		   "customer" => [
		      "email"=>  $email
		   ],
		   "customizations"=> [
		      "title"=> "Pied Piper Payments",
		      "description"=> "Middleout isn't free. Pay the price",
		      "logo"=> "https://assets.piedpiper.com/logo.png"
		   ]
		];


		
		//send Data to flutterwave Endpoints::-->


		$curl = curl_init();

		curl_setopt_array($curl, array(
 	    CURLOPT_URL            => "https://api.flutterwave.com/v3/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT       =>  0,
        CURLOPT_MAXREDIRS      => 10,
  		CURLOPT_CUSTOMREQUEST  => "POST",
  		CURLOPT_POSTFIELDS     => json_encode($collected_data),
	  		CURLOPT_HTTPHEADER => array(
	  		"Authorization: FLWSECK-5a2ecea5a6018609d4db4839dca5911a-X",
	    	"content-type: application/json",
	    	"cache-control: no-cache"	    	
	  	),
		));


		$response = curl_exec($curl);


		//Decode the JSON request

		$result = json_decode($response);


		//Check if the the result status is successful -->

		if (!empty($result)) {
			
			if ($result->status  == "success") {
			
				$link  = $result->data->link;

				return redirect()->to($link);

			}else{

				echo "We cannot process your request!";
			}


		}else{

			echo"Check your Internet Connection Please seems you are not connected!";
		}

		



    }
} 
