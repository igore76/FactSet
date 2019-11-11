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
     * Information can be moved later in DB or CSV
     *
     * @var array
     */
    private $currencyValues = array("EUR" => array("USD" => "1.1956", "CHF" => "1.1689", "GBP" => "0.8848"),
        "USD" => array("JPY" => "111.4500"),
        "CHF" => array("USD" => "1.0224"),
        "GBP" => array("CAD" => "1.6933"));


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
     * @param $toCurrrency
     */
    public function setToCurrency($toCurrrency){
        $this->toCurrency = $toCurrrency;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount){
        $this->amount = $amount;
    }


    /**
     * @return array
     */
    public function returnCurrencyValues(){
        return $this->currencyValues;
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




