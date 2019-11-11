<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

namespace FactSet\CurrencyConverter\Model;

/**
 * Class CurrencyConverter
 * @package FactSet\CurrencyConverter\Model
 */
class CurrencyConverter {

    /**
     *
     * @var array
     */
    private $currencyValues = null;


    /**
     * @var string
     */
    public $fromCurrency;

    /**
     * @var string
     */
    public $toCurrency;

    /**
     * @var string
     */
    public $amount;

    /**
     * @param $fromCurrency
     */
    public function setFromCurrency($fromCurrency){
        $this->fromCurrency = $fromCurrency;
    }

    /**
     * @param array $currencyValues
     */
    public function setCurrencyValues($currencyValues){
        $this->currencyValues = $currencyValues;
    }

    /**
     * @return array
     */
    public function getCurrencyValues(){
        return $this->currencyValues;
    }


    /**
     * @param string $toCurrrency
     */
    public function setToCurrency($toCurrrency){
        $this->toCurrency = $toCurrrency;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount){
        $this->amount = $amount;
    }


    /**
     * Convert Currency
     *
     * @return string
     */
    public function calculate() {
        $value = $this->currencyValues[$this->fromCurrency][$this->toCurrency];
        return number_format(($this->amount * $value), 2);
    }
}




