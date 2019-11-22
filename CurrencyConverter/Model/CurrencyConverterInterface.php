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
    public function setFromCurrency(string $fromCurrency);

    /**
     * @param array $currencyValues
     */
    public function setCurrencyValues(string $currencyValues);


    /**
     * @param string $toCurrrency
     */
    public function setToCurrency(string $toCurrrency);

    /**
     * @param string $amount
     */
    public function setAmount(string $amount);

    /**
     * Convert Currency
     *
     * @return string
     */
    public function calculate(): float;
}




