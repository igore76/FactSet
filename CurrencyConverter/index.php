<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

require '../vendor/autoload.php';

use FactSet\CurrencyConverter\Model\CurrencyConverter;
use FactSet\CurrencyConverter\Controller\ConverterController;

if($_POST['action']){
    $currencyConverter = new CurrencyConverter();
    $converterController = new ConverterController($currencyConverter,$_POST);
}else{
    include('view/template/form.html');
}



