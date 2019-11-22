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
class CurrencyConverterCommission implements CurrencyConverterInterface
{

    /**
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
     * @var string
     */
    public $commission = 1;

    /**
     * @param $fromCurrency
     */
    public function setFromCurrency($fromCurrency)
    {
        $this->fromCurrency = $fromCurrency;
    }

    /**
     * @param array $currencyValues
     */
    public function setCurrencyValues($currencyValues)
    {
        $this->currencyValues = $currencyValues;
    }

    /**
     * @return array
     */
    public function getCurrencyValues()
    {
        return $this->currencyValues;
    }


    /**
     * @param string $toCurrrency
     */
    public function setToCurrency($toCurrrency)
    {
        $this->toCurrency = $toCurrrency;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param string $procent
     */
    public function setCommission($procent)
    {
        $this->commission = $procent;
    }

    /**
     * @param string $procent
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Convert Currency
     *
     * @return string
     */
    public function calculate()
    {
        $value = $this->currencyValues[$this->fromCurrency][$this->toCurrency];
        return ($this->amount * $value) * $this->getCommission();
    }
}




