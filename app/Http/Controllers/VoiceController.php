<?php
namespace App\Http\Controllers;
require '../../vendor/autoload.php';
use Plivo\RestClient;
use Illuminate\Http\Request;

class VoiceController extends Controller
{
        // To make your first outbound call

    public function makeCall(Request $request)
    {
        $data = $request->all();
        $phone = array();
        if(isset($data['mobile'])) {
            array_push($phone, $data['mobile']);
        } else {
            return "Mobile Number Required!!";
        }
        $auth_id    = "MAYTYZMWI3NZG3MDLIMZ";
        $auth_token = "NzViMzZmYzU1NDEwMzljMjg4ODA1NDM4OTBlMmE4";
        $client     = new RestClient($auth_id, $auth_token);
        $response = $client->calls->create('+18334071615',
        $phone,
        'http://s3.amazonaws.com/static.plivo.com/answer.xml',
        'GET');
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Speak XML to handle your first incoming call
    // public function receiveCall()
    // {
    //     $response = new Response();
    //     $speak_body = "Hello, you just received your first call";
    //     $response->addSpeak($speak_body);
    //     Header('Content-type: text/xml');
    //     echo $response->toXML();
    // }
}