<?php

namespace App\Http\Controllers;

use App\BkashToken;
use App\BkashTransaction;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\SchoolHelperController;
use GuzzleHttp\Client;
class APIBkashController extends Controller
{

    private $schoolHelper;

    // constructor
    public function __construct(SchoolHelperController $schoolHelper)
    {
        $this->schoolHelper = $schoolHelper;
    }


    public function createCheckOut(Request $request)
    {
      $token = $this->genToken();
        $curl = curl_init();
        $json = ['invoice_id'=>$request->id];
        $url = $this->schoolHelper->getEmsUrl().'/api/applicant/profile/';
        $client = new Client();
        $studentProfile = json_decode($client->request('GET', $url,['json' => $json])->getBody()->getContents());
         if($studentProfile->status=='success'){

        $payload = [
            'amount' => $studentProfile->data->amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => $request->id
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/create",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => \json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $token,
                "X-APP-Key: 5tunt4masn6pv2hnvte1sb5n3j",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = \json_decode($response, true);
        } 
        if (intval($info['http_code']) === 200) {
            $json = [
                'merchantInvoiceNumber'=>$response['merchantInvoiceNumber'],
                'transactionStatus'=>$response['transactionStatus'],
                'paymentID'=>$response['paymentID'],
            ];
            $url = $this->schoolHelper->getEmsUrl().'/api/bkash/transaction/store';
            $client = new Client();
            $bkashTransactionStore= json_decode($client->request('POST', $url, ['json' => $json])->getBody()->getContents());
            if($bkashTransactionStore->status=='success'){
                return ['status' => 'success', 'uuid' => $bkashTransactionStore->uuid, 'bkash' => $response];
             }
            } else {
                return ['status' => 'failed', 'bkash' => $response];
            }
        }
    }

    public function executeCheckout(Request $request)
    {
        $json = ['id'=>$request->id];
        $url = $this->schoolHelper->getEmsUrl().'/api/bkash/transaction/find/';
        $client = new Client();
        $bkashTransProfile = json_decode($client->request('GET', $url,['json' => $json])->getBody()->getContents());
       
        if($bkashTransProfile->status=='success'){ 
            // dd($bkashTransProfile);

        $token = $this->genToken();
        

        // return [
        //     $token->id_token,
        //     '5tunt4masn6pv2hnvte1sb5n3j'
        // ];

        $curl = curl_init();
        $payload = [
            'paymentID' => $request->paymentid
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/execute/" . $bkashTransProfile->data->payment_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => \json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                "Authorization:" . $token,
                "X-APP-Key:5tunt4masn6pv2hnvte1sb5n3j",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            $response = ['message' => 'Something went wrong!'];
        } else {
            $response = \json_decode($response, true);
        }

        if (intval($info['http_code']) === 200) {
            if (isset($response['errorCode'])) {
                return ['status' => 'failed', 'bkash' => $response];
            } else {
                dd($response);
            $json = [
                'id'=>$request->id,
                'transactionStatus'=>$response['transactionStatus'],
                'trxID'=>$response['trxID'],
            ];
            $url = $this->schoolHelper->getEmsUrl().'/api/bkash/transaction/update/';
             $client = new Client();
            $bkashTransactionUpdate = json_decode($client->request('POST', $url,['json' => $json])->getBody()->getContents());
            if($bkashTransactionUpdate->status=='success'){
                return ['status' => 'success', 'bkash' => $response];
          }else {
            return ['status' => 'failed', 'bkash' => $bkashTransactionUpdate->msg];
          }
         }
           
        } else return ['status' => 'failed', 'bkash' => $response];
     } else {
             // server eeror 
        }
    }

    private function genToken()
    {
         // academic level list url
         $url = $this->schoolHelper->getEmsUrl().'/api/bkash/token/find/';
         $client = new Client();
         $tokenProfile = json_decode($client->request('GET', $url)->getBody()->getContents());
          if($tokenProfile->status=='success'){
             return $tokenProfile->token;
          }else {

            $curl = curl_init();


            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n      \"app_key\":\"5tunt4masn6pv2hnvte1sb5n3j\",\n      \"app_secret\":\"1vggbqd4hqk9g96o9rrrp2jftvek578v7d2bnerim12a87dbrrka\"\n  }",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "password: hWD@8vtzw0",
                    "username: sandboxTestUser"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $response = json_decode($response);
                $json = [
                    'id_token'=>$response->id_token,
                    'expires_in'=>$response->expires_in,
                ];
                $url = $this->schoolHelper->getEmsUrl().'/api/bkash/token/store';
                $client = new Client();
                $tokenStore= json_decode($client->request('POST', $url, ['json' => $json])->getBody()->getContents());
                 if($tokenStore->status=='success'){
                    return $tokenProfile->token;
                 }
            }
        }
    }


    public function bkashPaymentView($invoiceID)
    {
        // return $invoiceID;
    //    $studentProfile = Student::where('invoice_id', $invoiceID)->first();
    //    $transactionProfile= BkashTransaction::where('marcent_invoice_num',$invoiceID)->where('transaction_status','Completed')->first();
    //     if(empty($transactionProfile)) {
    //         return view('bkash-pay', compact('studentProfile'));
    //     } else {
    //         return view('already-paid', compact('studentProfile'));
    //     }

    if($invoiceID){
        // json body information
        $json = ['invoice_id'=>$invoiceID];
        // academic level list url
        $url = $this->schoolHelper->getEmsUrl().'/api/applicant/profile/';
        $client = new Client();
        $response = json_decode($client->request('GET', $url,['json' => $json])->getBody()->getContents());
        if($response->status=='success'){
             $studentProfile = $response->data;
         }else{
             $requestData = null;
         }
         return view('frontend.pages.bkash.bkash-pay',compact('studentProfile'));

    }else{
        // return null
        return [];
    }
    
    }


    public function bkashSuccess()
    {
        return view('frontend.pages.bkash.payment-success');
    }



 
     // get institute id
     public static function getInstituteId()
     {
         // institute id
         $instituteId = env('INSTITUTE_ID');
         // return institute id
         return $instituteId;
     }
 
     // get institute id
     public static function getCampusId()
     {
         // campus id
         $campusId = env('CAMPUS_ID');
         // return campus id
         return $campusId;
     }
 
     // get institute id
     public static function getEmsUrl()
     {
         // ems url
         $url = env('EMS_URL');
         // return ems url
         return $url;
     }


}
