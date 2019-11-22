<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

namespace FactSet\CurrencyConverter\Model;

/**
 * Class CurrencyConverterInterface
 * @package FactSet\CurrencyConverter\Model
 */
interface CurrencyConverterInterface
{

    /**
     * @param $fromCurrency
     */
    public function setFromCurrency($fromCurrency);

    /**
     * @param array $currencyValues
     */
    public function setCurrencyValues($currencyValues);


    /**
     * @param string $toCurrrency
     */
    public function setToCurrency($toCurrrency);

    /**
     * @param string $amount
     */
    public function setAmount($amount);

    /**
     * Convert Currency
     *
     * @return string
     */
    public function calculate();
}




