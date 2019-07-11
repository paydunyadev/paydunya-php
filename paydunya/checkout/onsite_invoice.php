<?php
class Paydunya_Onsite_Invoice extends Paydunya_Checkout_Invoice {

  protected $invoice_token;

  function __construct(){
    parent::__construct();
  }

  public function charge($opr_token,$confirm_token) {
    $payload = array(
      'token' => $opr_token,
      'confirm_token' => $confirm_token
    );

    $result = Paydunya_Utilities::httpJsonRequest(Paydunya_Setup::getOPRChargeUrl(), $payload);
    if(count($result) > 0) {
      switch ($result['response_code']) {
        case 00:
          $this->status = $result["invoice_data"]['status'];
          $this->pushCustomData($result["invoice_data"]["custom_data"]);
          $this->pushItems($result["invoice_data"]["invoice"]['items']);
          $this->pushTaxes($result["invoice_data"]["invoice"]['taxes']);
          $this->customer = $result["invoice_data"]['customer'];
          $this->setTotalAmount($result["invoice_data"]['invoice']['total_amount']);
          $this->receipt_url = $result["invoice_data"]['receipt_url'];
          $this->response_text = $result["response_text"];
          return true;
          break;
        default:
          $this->status = Paydunya::FAIL;
          $this->response_text = $result["response_text"];
          $this->response_code = $result["response_code"];
          return false;
      }
    }else{
      $this->status = Paydunya::FAIL;
      $this->response_code = 4002;
      $this->response_text = "An Unknown PAYDUNYA Server Error Occured.";
      return false;
    }
  }

  public function create($account_alias = false) {
    $invoice_data = array(
      'invoice' => array(
        'items' => $this->items,
        'taxes' => $this->taxes,
        'total_amount' => $this->getTotalAmount(),
        'description' => $this->getDescription()
      ),
      'store' => array(
        'name' => Paydunya_Checkout_Store::getName(),
        'tagline' => Paydunya_Checkout_Store::getTagline(),
        'postal_address' => Paydunya_Checkout_Store::getPostalAddress(),
        'phone' => Paydunya_Checkout_Store::getPhoneNumber(),
        'logo_url' => Paydunya_Checkout_Store::getLogoUrl(),
        'website_url' => Paydunya_Checkout_Store::getWebsiteUrl()
      ),
      'custom_data' => $this->showCustomData(),
      'actions' => array(
        'cancel_url' => $this->cancel_url,
        'return_url' => $this->return_url
      )
    );

    $payload = array(
      'invoice_data' => $invoice_data,
      'opr_data' => array(
        'account_alias' => $account_alias
      )
    );

    $result = Paydunya_Utilities::httpJsonRequest(Paydunya_Setup::getOPRInvoiceUrl(),$payload);

    switch ($result["response_code"]) {
      case 00:
        $this->status = Paydunya::SUCCESS;
        $this->token = $result["token"];
        $this->invoice_token = $result["invoice_token"];
        $this->response_code = $result["response_code"];
        $this->response_text = $result["response_text"];
        return true;
        break;
      default:
        $this->invoice_url = "";
        $this->status = Paydunya::FAIL;
        $this->response_code = $result["response_code"];
        $this->response_text = $result["response_text"];
        return false;
        break;
    }
  }
}