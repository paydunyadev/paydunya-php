<?php
require_once("paydunya/dependency_check.php");

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

abstract class Paydunya {
  const VERSION = "1.0.0";
  const SUCCESS = "success";
  const FAIL = "fail";
  const PENDING = "pending";
}

if (strnatcmp(phpversion(),'5.3.0') >= 0) {
  define('JSON_ENCODE_PARAM_SUPPORT',   true);
}else{
  define('JSON_ENCODE_PARAM_SUPPORT',   false);
}

require_once("paydunya/setup.php");
require_once("paydunya/customdata.php");
require_once("paydunya/checkout.php");
require_once("paydunya/checkout/store.php");
require_once("paydunya/checkout/checkout_invoice.php");
require_once("paydunya/checkout/onsite_invoice.php");
require_once("paydunya/direct_pay.php");
require_once("paydunya/libraries/Requests.php");
require_once("paydunya/utilities.php");