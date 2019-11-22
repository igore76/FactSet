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
class CurrencyConverter implements CurrencyConverterInterface
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
     * @param $fromCurrency
     */
    public function setFromCurrency(string $fromCurrency)
    {
        $this->fromCurrency = $fromCurrency;
    }

    /**
     * @param array $currencyValues
     */
    public function setCurrencyValues(string $currencyValues)
    {
        $this->currencyValues = $currencyValues;
    }

    /**
     * @return array
     */
    public function getCurrencyValues(): array
    {
        return $this->currencyValues;
    }


    /**
     * @param string $toCurrrency
     */
    public function setToCurrency(string $toCurrrency)
    {
        $this->toCurrency = $toCurrrency;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount)
    {
        $this->amount = $amount;
    }


    /**
     * Convert Currency
     *
     * @return string
     */
    public function calculate(): string
    {
        $value = $this->currencyValues[$this->fromCurrency][$this->toCurrency];
        return (float)($this->amount * $value);
    }
}




