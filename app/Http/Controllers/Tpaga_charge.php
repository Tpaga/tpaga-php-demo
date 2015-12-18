<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tpaga;

class Tpaga_charge extends Controller
{


    public function index()
    {
        return view('Tpaga_charge.index');

    }

    public function charge(Request $request)
    {

        $data['firstname'] = ''; 
        $data['lastname'] = '';
        $data['cardnumber'] = 0;
        $data['duemonth'] = '';
        $data['dueyear'] = '';
        $data['securitycode'] = '';
        $data['installments'] = '';
        $data['description'] = '';
        $data['amount'] = 0;
        $data['taxamount'] = 0;
        $data['customerid'] = '';
        $data['cardid'] = '';
        $data['chargeid'] = '';
        $data['error'] = '';

        // Authentication
        $config= new Tpaga\Configuration();
        $config->setUsername('d13fr8n7vhvkuch3lq2ds5qhjnd2pdd2');
        $apiClient = new tpaga\ApiClient($config);
       
        // Getting info from form
        $data['firstname'] = $request->input('firstname'); 
        $data['lastname'] = $request->input('lastname');
        $data['cardnumber'] =  str_replace(' ', '', $request->input('cardnumber'));
        $duedate = $request->input('duedate');
        $data['duemonth'] = substr($duedate, 0, 2);
        $data['dueyear'] = substr($duedate,5);
        $data['securitycode'] = $request->input('securycode');
        $data['installments'] = $request->input('installments');
        $products = $request->input('products');
        $description ='';
        $amount=0;
        foreach ($products as $product) {
            $description = $description . " " . $product;
            if (strcmp($product, "Combo 1")==0)
            {
                $amount=$amount+3000;   
            }
            if (strcmp($product,"Combo 2")==0)
            {
                $amount=$amount+4500;   
            }
            if (strcmp($product,"Combo 3")==0)
            {
                $amount=$amount+2800;   
            } 
        }
        $data['description'] = $description;
        $data['amount'] = $amount;
        $data['taxamount'] = $amount*0.1;  

        // Create a customer
        $customer = $this->createCustomer($apiClient,$data);
        if (is_object($customer)){
            $data['customerid'] = $customer->getId();
        }
        else
        {
            echo $data['error'] = $customer;
        }
        // Create a credit card for the customer
        $card = $this->createCreditCard($apiClient,$data);  
        if (is_object($card)){   
            $data['cardid'] = $card->getId();
        }
        else
        {
            echo $data['error'] = $card;
        }
        // Charge customer's credit card 
        $charge = $this->chargeCreditCard($apiClient, $data);
        if (is_object($charge)){
            $data['chargeid'] = $charge->getId();
        }
        else
        {
            echo $data['error'] = $charge;
        }

        return view('Tpaga_charge.confirm',$data);

    }


//TPAGA functionalities

    public function createCustomer($apiClient,$data){

        $customer = new Tpaga\Model\Customer();
        $customer->setFirstName($data['firstname']);
        $customer->setLastName($data['lastname']);
        $customer->setEmail("customer@mail.com");
        $customer->setGender("M");
        $customer->setPhone("0000000000");
        $customerAPI = new Tpaga\Api\CustomerApi($apiClient);

        try {
            $response = $customerAPI->createCustomer($customer);
            return $response;
        } catch (Tpaga\ApiException $e) {
            return ('Caught exception: ' . $e->getMessage() . "\n");
        }

    }



    public function createCreditCard($apiClient, $data){

        $creditCard = new Tpaga\Model\CreditCardCreate();
        $billingAddress = new Tpaga\Model\BillingAddress();

        $creditCard->setPrimaryAccountNumber($data['cardnumber']);
        $creditCard->setExpirationMonth($data['duemonth']);
        $creditCard->setExpirationYear($data['dueyear']);
        $creditCard->setCardVerificationCode($data['securitycode']);
        $creditCard->setCardHolderName($data['firstname']." ".$data['lastname']);
        $creditCard->setBillingAddress($billingAddress);

        $creditCardCustomer = $data['customerid'];
        $creditCardAPI = new Tpaga\Api\CreditCardApi($apiClient);

        try {
            $response = $creditCardAPI->addCreditCard($creditCardCustomer, $creditCard);
            return $response;
        } catch (Tpaga\ApiException $e) {
            return ('Caught exception: ' . $e->getMessage() . "\n");
        }

      }

    public function chargeCreditCard($apiClient, $data){

        $charge = new Tpaga\Model\CreditCardCharge();
        $charge->setCreditCard($data['cardid']);
        $charge->setAmount($data['amount']);
        $charge->setTaxAmount($data['taxamount']);
        $charge->setCurrency("COP");
        $charge->setDescription($data['description']);
        $charge->setOrderId("order id");
        $charge->setInstallments($data['installments']);
        $charge->setThirdPartyId("3PId");
        $chargeAPI = new Tpaga\Api\ChargeApi($apiClient);

        try {
            $response = $chargeAPI->addCreditCardCharge($charge);
            return $response;
        } catch (Tpaga\ApiException $e) {
            return ('Caught exception: ' . $e->getMessage() . "\n");
        }

      }
        
}
