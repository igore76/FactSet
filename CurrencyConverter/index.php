<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

require '../vendor/autoload.php';

use FactSet\CurrencyConverter\Model\CurrencyConverter;
use FactSet\CurrencyConverter\Model\CurrencyConverterCommission;
use FactSet\CurrencyConverter\Controller\ConverterController;

if($_POST['action']){
    //$currencyConverter = new CurrencyConverter();
    //$converterController = new ConverterController($currencyConverter,$_POST);
    $currencyConverterCommission = new CurrencyConverterCommission();
    $currencyConverterCommission->setCommission("1.3");
    $converterController = new ConverterController($currencyConverterCommission,$_POST);
}else{
    include('view/template/form.html');
}



