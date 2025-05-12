<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;


class VerificationSms
{
    public static function remindOrder($MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'bz3tzgk7ufvbhgh';
        $to = array($MobileNumber);
        $input_data = array('code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function selectProvider($MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'x6zf3e7pyk91yp3';
        $to = array($MobileNumber);
        $input_data = array('code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }

    public static function acceptOrder($MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'vjtc16wfc8nsr8d';
        $to = array($MobileNumber);
        $input_data = array('code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }

    public static function rejectOrder($MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'lz4gbn43roqi69y';
        $to = array($MobileNumber);
        $input_data = array('code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function documentOrder($MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = '1w1mznaqcfn38jw';
        $to = array($MobileNumber);
        $input_data = array('code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }

    public static function EndWorkUrl($Name,$url, $MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'ee2hyxysi3o9b9y';
        $to = array($MobileNumber);
        $input_data = array("name" => $Name,'url'=>$url,'code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function PaymentUrl($Name,$url, $MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'b2u4kilklz5gb6i';
        $to = array($MobileNumber);
        $input_data = array("name" => $Name,'url'=>$url,'code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function VerificationCode($Code, $MobileNumber) {
            try {
        $client = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer 357|yGoKmA5lqEPLknxveDe3tRaTlbAtD8kQ5MXGuZQv2b2cd8aa ',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = '{
          "recipient": 964'.$MobileNumber.',
          "sender_id": "AppOTP",
          "type": "whatsapp",
          "message": '.$Code.',
          "lang": "ar"
        }';
        // $bodyArray=["recipient"=>'964'.$MobileNumber,'sender_id'=>"EBTEKAR",'type'=>"whatsapp",'message'=>$Code,'lang'=>"ar"];
        // $body=(object)$bodyArray;
        $request = new \GuzzleHttp\Psr7\Request('POST', 'https://gateway.standingtech.com/api/v4/sms/send', $headers,$body);
        $res = $client->sendAsync($request)->wait();
        $result = json_decode($res->getBody(), true);
        return $result;
            } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }

    }
    public static function sendSmsCancelProvider($code,$name, $MobileNumber) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'scsfh1q2u5xptqb';
        $to = array($MobileNumber);
        $input_data = array("code" => $code,'name'=>$name);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function sendSmsNotAcceptedProvider($code,$name, $MobileNumber) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'p3swdqcwjel4btk';
        $to = array($MobileNumber);
        $input_data = array("code" => $code,'name'=>$name);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function SendSmsAccepteSelectiveOrder($name, $MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = '5o1fgbpzlp923yz';
        $to = array($MobileNumber);
        $input_data = array("name" => $name,'code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
    public static function SendSmsAccepteCallOrder($name, $MobileNumber,$code) {
        $username = 'co09103803722';
        $password = 'AliNazem1362@';
        $from = '3000505';
        $pattern_code = 'yj6iyci4fvw7tga';
        $to = array($MobileNumber);
        $input_data = array("name" => $name,'code'=>$code);
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password)
            . "&from=".$from."&to=" .
            json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
        curl_close($handler);
    }
}

