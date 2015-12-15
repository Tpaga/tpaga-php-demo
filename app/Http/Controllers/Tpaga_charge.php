<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class Tpaga_charge extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Tpaga_charge.index');//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function charge(Request $request)
    {
        // Authentication
        //$config= new tpaga\Configuration();
        //$config->setUsername('9jk59hpr858j34oibplotp839pdm7mau');
        //$apiClient = new tpaga\ApiClient($config);
        //echo $username=$apiClient->getConfig()->getUsername() ;


        $data['firstname'] = $request->input('firstname'); 
        $data['lastname'] = $request->input('lastname');
        $data['cardnumber'] = $request->input('cardnumber');
        $data['duemonth'] = $request->input('duemonth');
        $data['dueyear'] = $request->input('dueyear');
        $data['securitycode'] = $request->input('securycode');
        $products = $request->input('products');
        $description ='You will get:';
        $amount=0;
        foreach ($products as $product) {
            $description = $description . "\n" . $product;
            if (strcmp($product, "Combo 1")==0)
            {
                $amount=$amount+3000;   
            }
            if (strcmp($product,"Combo 2")==0)
            {
                $amount=$amount+4500;   
            }
            if (strcmp($product,"Combo 1")==0)
            {
                $amount=$amount+2800;   
            } 
        }
        $data['description'] = $description;
        $data['amount'] = $amount;
        $data['taxamount'] = $amount*0.1;  

        //createCustomer($apiClient,$data);      

        return view('Tpaga_charge.confirm',$data);

    }


//TPAGA functionalities

    function createCustomer($apiClient,$data){

    $customer = new Tpaga\Model\Customer();
    $customer->setFirstName($data['firstname']);
    $customer->setLastName($data['lastname']);
    $customer->setEmail("customer@mail.com");
    $customer->setGender("M");
    $customer->setPhone("0000000000");
    $customerAPI = new Tpaga\Api\CustomerApi($apiClient);

    try {
        $response = $customerAPI->createCustomer($customer);
        var_dump($response);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

  }
    
}
