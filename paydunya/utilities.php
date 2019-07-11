<?php
class Paydunya_Utilities {

  // prevent instantiation of this class
  private function __construct() {}

  public static function httpJsonRequest($url,$data=array()){
    Requests::register_autoloader();
    $headers = array(
      'Accept' => 'application/json',
      'PAYDUNYA-PUBLIC-KEY' => Paydunya_Setup::getPublicKey(),
      'PAYDUNYA-PRIVATE-KEY' => Paydunya_Setup::getPrivateKey(),
      'PAYDUNYA-MASTER-KEY' => Paydunya_Setup::getMasterKey(),
      'PAYDUNYA-TOKEN' => Paydunya_Setup::getToken(),
      'PAYDUNYA-MODE' => Paydunya_Setup::getMode(),
      'User-Agent' => "PAYDUNYA Checkout API PHP client v1 aka Neptune"
    );

    $json_payload = json_encode($data);

    $request = Requests::post($url, $headers,$json_payload,array('timeout' => 10));

    return json_decode($request->body,true);
  }

  public static function httpPostRequest($url,$data=array()){
    Requests::register_autoloader();
    $headers = array(
      'Accept' => 'application/x-www-form-urlencoded',
      'PAYDUNYA-PUBLIC-KEY' => Paydunya_Setup::getPublicKey(),
      'PAYDUNYA-PRIVATE-KEY' => Paydunya_Setup::getPrivateKey(),
      'PAYDUNYA-MASTER-KEY' => Paydunya_Setup::getMasterKey(),
      'PAYDUNYA-TOKEN' => Paydunya_Setup::getToken(),
      'PAYDUNYA-MODE' => Paydunya_Setup::getMode(),
      'User-Agent' => "PAYDUNYA Checkout API PHP client v1 aka Neptune"
    );

    $request = Requests::post($url, $headers,$data,array('timeout' => 10));

    return json_decode($request->body,true);
  }

  public static function httpGetRequest($url){
    Requests::register_autoloader();
    $headers = array(
      'PAYDUNYA-PUBLIC-KEY' => Paydunya_Setup::getPublicKey(),
      'PAYDUNYA-PRIVATE-KEY' => Paydunya_Setup::getPrivateKey(),
      'PAYDUNYA-MASTER-KEY' => Paydunya_Setup::getMasterKey(),
      'PAYDUNYA-TOKEN' => Paydunya_Setup::getToken(),
      'PAYDUNYA-MODE' => Paydunya_Setup::getMode(),
      'User-Agent' => "PAYDUNYA Checkout API PHP client v1 aka Neptune"
    );

    $request = Requests::get($url, $headers,array('timeout' => 10));

    return json_decode($request->body,true);
  }
}
