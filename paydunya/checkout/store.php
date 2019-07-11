<?php
class Paydunya_Checkout_Store extends Paydunya {
  private static $name;
  private static $tagline;
  private static $postalAddress;
  private static $phoneNumber;
  private static $websiteUrl;
  private static $logoUrl;
  private static $cancelUrl;
  private static $returnUrl;
  private static $callbackUrl;


  public static function setName($name) {
    self::$name = $name;
  }

  public static function setTagline($tagline) {
    self::$tagline = $tagline;
  }

  public static function setPostalAddress($postalAddress) {
    self::$postalAddress = $postalAddress;
  }

  public static function setPhoneNumber($phoneNumber) {
    self::$phoneNumber = $phoneNumber;
  }

  public static function setWebsiteUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      self::$websiteUrl = $url;
    }
  }

  public static function setLogoUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      self::$logoUrl = $url;
    }
  }

  public static function setCancelUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      self::$cancelUrl = $url;
    }
  }

  public static function setReturnUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      self::$returnUrl = $url;
    }
  }

  public static function setCallbackUrl($url) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
      self::$callbackUrl = $url;
    }
  }

  public static function getName() {
    return self::$name;
  }

  public static function getTagline() {
    return self::$tagline;
  }

  public static function getPostalAddress() {
    return self::$postalAddress;
  }

  public static function getPhoneNumber() {
    return self::$phoneNumber;
  }

  public static function getWebsiteUrl() {
    return self::$websiteUrl;
  }

  public static function getLogoUrl() {
    return self::$logoUrl;
  }

  public static function getCancelUrl() {
    return self::$cancelUrl;
  }

  public static function getReturnUrl() {
    return self::$returnUrl;
  }

  public static function getCallbackUrl() {
    return self::$callbackUrl;
  }
}