<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

namespace FactSet\CurrencyConverter\Controller;

use FactSet\CurrencyConverter\Model\CurrencyConverter;

class ConverterController {

    private $currencyConverter;

    /**
     * ConverterController constructor.
     * @param \FactSet\CurrencyConverter\Model\CurrencyConverter $currencyConverter
     */
    function __construct(CurrencyConverter $currencyConverter) {
        $this->currencyConverter = $currencyConverter;
    }

    /**
     * return converted currency
     *
     * @return string
     *
     */
    public function calculateAction(){

        $responseArray = Array();
        if($this->currencyConverter->amount != null && $this->isCurrency($this->currencyConverter->amount)){
            $responseArray['status'] = 'success';
            $responseArray['answer'] = $this->currencyConverter->calculate();
        }else {
            $responseArray['status'] = 'error';
            $responseArray['message'] = 'check your input data';
        }

        return json_encode($responseArray);
    }

    /**
     * @return string
     */
    public function currenciesAction(){

        return json_encode($this->currencyConverter->returnCurrencyValues());
    }

    /**
     * @param $number
     * @return false|int
     */
    private function isCurrency($number)
    {
        return preg_match("/^[0-9]+(?:\.[0-9]{1,2})?$/", $number);
    }
}

