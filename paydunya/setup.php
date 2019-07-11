<?php
class Paydunya_Setup extends Paydunya {
  private static $masterKey;
  private static $privateKey;
  private static $publicKey;
  private static $token;

  const ROOT_URL_BASE = "https://app.paydunya.com";

  const LIVE_CHECKOUT_INVOICE_BASE_URL = "/api/v1/checkout-invoice/create";
  const TEST_CHECKOUT_INVOICE_BASE_URL = "/sandbox-api/v1/checkout-invoice/create";

  const LIVE_CHECKOUT_CONFIRM_BASE_URL = "/api/v1/checkout-invoice/confirm/";
  const TEST_CHECKOUT_CONFIRM_BASE_URL = "/sandbox-api/v1/checkout-invoice/confirm/";

  const LIVE_OPR_BASE_URL = "/api/v1/opr/create";
  const TEST_OPR_BASE_URL = "/sandbox-api/v1/opr/create";

  const LIVE_OPR_CHARGE_BASE_URL = "/api/v1/opr/charge";
  const TEST_OPR_CHARGE_BASE_URL = "/sandbox-api/v1/opr/charge";

  const LIVE_DIRECT_PAY_CREDIT_BASE_URL = "/api/v1/direct-pay/credit-account";
  const TEST_DIRECT_PAY_CREDIT_BASE_URL = "/sandbox-api/v1/direct-pay/credit-account";

  private static $mode = "test";

  private function __construct(){}

  public static function setMasterKey($masterKey) {
    self::$masterKey = $masterKey;
  }

  public static function setPrivateKey($privateKey) {
    self::$privateKey = $privateKey;
  }

  public static function setPublicKey($publicKey) {
    self::$publicKey = $publicKey;
  }

  public static function setToken($token) {
    self::$token = $token;
  }

  public static function setMode($mode) {
    self::$mode = $mode;
  }

  public static function getMasterKey() {
    return self::$masterKey;
  }

  public static function getPrivateKey() {
    return self::$privateKey;
  }

  public static function getPublicKey() {
    return self::$publicKey;
  }

  public static function getToken() {
    return self::$token;
  }

  public static function getMode() {
    return self::$mode;
  }

  public static function getCheckoutConfirmUrl() {
    if (self::getMode() == "live") {
      return self::ROOT_URL_BASE.self::LIVE_CHECKOUT_CONFIRM_BASE_URL;
    }else{
      return self::ROOT_URL_BASE.self::TEST_CHECKOUT_CONFIRM_BASE_URL;
    }
  }

  public static function getCheckoutBaseUrl() {
    if (self::getMode() == "live") {
      return self::ROOT_URL_BASE.self::LIVE_CHECKOUT_INVOICE_BASE_URL;
    }else{
      return self::ROOT_URL_BASE.self::TEST_CHECKOUT_INVOICE_BASE_URL;
    }
  }

  public static function getOPRInvoiceUrl() {
    if (self::getMode() == "live") {
      return self::ROOT_URL_BASE.self::LIVE_OPR_BASE_URL;
    }else{
      return self::ROOT_URL_BASE.self::TEST_OPR_BASE_URL;
    }
  }

  public static function getOPRChargeUrl() {
    if (self::getMode() == "live") {
      return self::ROOT_URL_BASE.self::LIVE_OPR_CHARGE_BASE_URL;
    }else{
      return self::ROOT_URL_BASE.self::TEST_OPR_CHARGE_BASE_URL;
    }
  }

  public static function getDirectPayCreditUrl() {
    if (self::getMode() == "live") {
      return self::ROOT_URL_BASE.self::LIVE_DIRECT_PAY_CREDIT_BASE_URL;
    }else{
      return self::ROOT_URL_BASE.self::TEST_DIRECT_PAY_CREDIT_BASE_URL;
    }
  }
}