<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

require 'Model/CurrencyConverter.php';
require 'Controller/ConverterController.php';

use FactSet\CurrencyConverter\Model\CurrencyConverter;
use FactSet\CurrencyConverter\Controller\ConverterController;

//get Ajax Parameter
$fromCurrency = isset($_POST['from']) ? strip_tags($_POST['from']) : null;
$toCurrency = isset($_POST['to']) ? strip_tags($_POST['to']) : null;
$amount = isset($_POST['amount']) ? strip_tags($_POST['amount']) : null;
$action =  isset($_POST['action']) ? strip_tags($_POST['action']) : null;

if($action){
    $currencyConverter = new CurrencyConverter();
    $converterController = new ConverterController($currencyConverter);

    if($action == "calculate"){
        $currencyConverter->setFromCurrency($fromCurrency);
        $currencyConverter->setToCurrency($toCurrency);
        $currencyConverter->setAmount($amount);
        echo $converterController->calculateAction();
    }elseif($action == "currencies"){
        echo $converterController->currenciesAction();
    }

}else{
    include('view/template/form.html');
}



