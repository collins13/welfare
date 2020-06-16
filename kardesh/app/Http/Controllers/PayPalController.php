<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Donate;
use Carbon\Carbon;

class PayPalController extends Controller
{
    public function payment(Request $request)

    {
        

        $data = [];
        $data['items'] = [
            [
                'name' => $request->name,
                'price' => $request->amount,
                'desc'  => 'Kardesh Bernea Donation'.$request->plan,
                'qty' => 1
            ]
        ];

    $data['invoice_id'] = 1;
    $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
    $data['return_url'] = route('payment.success');
    $data['cancel_url'] = route('payment.cancel');
    $data['total'] = $request->amount;
  

    $provider = new ExpressCheckout;

  

    $response = $provider->setExpressCheckout($data);

  
    $response = $provider->setExpressCheckout($data, true);

    // insert iunto donation table
    $id = Donate::where('cat_id', (int)$request->cat)->first();
   
    // dd($request->cat);
        
        if ($id != null) {
            $don1 = Donate::where('cat_id', $request->cat)->first();
        
                if ($don1->email === $request->email && $don1->name === $request->name ) {
                    Donate::where('d_id',(int)$request->d_id)->update([
                        'name' => $request->name,
                        'plan' => $request->plan,
                        'email' => $request->email,
                        'amount' => $request->amount + $don1->amount,
                        'created_at' => Carbon::now(),
                        'cat_id' => $request->cat
                    ]);
                }else{
                    $don2 = new Donate();
                    $don2->name = $request->name;
                    $don2->plan = $request->plan;
                    $don2->email = $request->email;
                    $don2->amount = $request->amount;
                    $don2->created_at = Carbon::now();
                    $don2->cat_id = $request->cat;
                    $don2->save();
                }
        
          
            
      
    }else{
        $don = new Donate();
        $don->name = $request->name;
        $don->plan = $request->plan;
        $don->email = $request->email;
        $don->amount = $request->amount;
        $don->created_at = Carbon::now();
        $don->cat_id = $request->cat;
        $don->save();
    }
    

    // This will redirect user to PayPal
   return redirect($response['paypal_link']);

    }

   

    /**

     * Responds with a welcome message with instructions

     *

     * @return \Illuminate\Http\Response

     */

    public function cancel()

    {

        return Session::flash("warning", "Donation has been cancelled");

    }

  

    /**

     * Responds with a welcome message with instructions

     *

     * @return \Illuminate\Http\Response

     */

    public function success(Request $request)

    {
        $provider = new ExpressCheckout;
        
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            session()->flash("success", "Donation has been made successfully");
            return redirect()->back();

        }

  

        session()->flash("error", "there was an error proccessing you payment");

    }
}
