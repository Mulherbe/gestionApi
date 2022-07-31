<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class WalletController extends Controller
{
    public function getWalletByUser(Request $request) 
    {   
        $todo = Wallet::all()->where('id_user', $request['id_user']);
        return $todo  ;
        
     }
   
     
    public function addValueWallet(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'quantity' => 'required',
            'device' => 'required',

        ]
    );

    if($validator->fails()) {
        return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
    }
    else{

        $response["status"] = "successs";
        Wallet::create([
            'title' => $request['title'],
            'priceBuy' => $request['priceBuy'],
            'quantity' =>  $request['quantity'],
            'id_user' => $request['id_user'],
            'device' =>  $request['device'],
            'date' => '2022-06-26 09:39:23'
        ]);
        return response()->json($response);

    }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function getPriceCrypto(Request $request)
    {

        $url = 'https://pro-api.coinmarketcap.com/v1/tools/price-conversion';
        $parameters = [
         'amount'=>'1',
        'symbol'=>$request['device'], 
        'convert'=>'USD'
        ];
        
        $headers = [
          'Accepts: application/json',
          'X-CMC_PRO_API_KEY: 08bb6813-f4b5-4ca7-af11-82154584a9d0'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL
        
        
        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
          CURLOPT_URL => $request,            // set the request URL
          CURLOPT_HTTPHEADER => $headers,     // set the headers 
          CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));
        
        $response = curl_exec($curl); // Send the request, save the response
        // print_r(json_decode($response)); // print json decoded response
        curl_close($curl); // Close request    

        return (json_decode($response));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
