<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

namespace FactSet\CurrencyConverter\Controller;

use FactSet\CurrencyConverter\Model\CurrencyConverterInterface;

class ConverterController
{

    private $currencyConverter;

    public $postParameter;

    /**
     * ConverterController constructor.
     * @param \FactSet\CurrencyConverter\Model\CurrencyConverter $currencyConverter
     * @param array $postParameter
     */
    function __construct(CurrencyConverterInterface $currencyConverter, $postParameter)
    {
        $this->currencyConverter = $currencyConverter;

        if ($postParameter) {
            $action = isset($postParameter['action']) ? strip_tags($postParameter['action']) : null;
            if ($action == "calculate") {
                $this->currencyConverter->setFromCurrency(isset($postParameter['from']) ? strip_tags($postParameter['from']) : null);
                $this->currencyConverter->setToCurrency(isset($postParameter['to']) ? strip_tags($postParameter['to']) : null);
                $this->currencyConverter->setAmount(isset($postParameter['amount']) ? strip_tags($postParameter['amount']) : null);
                $this->calculateAction();
            } else if ($action == "currencies") {
                $this->currenciesAction();
            }
        };

    }

    /**
     * return converted currency
     *
     * @return string
     *
     */
    public function calculateAction()
    {

        $responseArray = Array();
        if ($this->currencyConverter->amount != null && $this->isCurrency($this->currencyConverter->amount)) {
            $responseArray['status'] = 'success';
            $responseArray['answer'] = number_format($this->currencyConverter->calculate(), 2);
        } else {
            $responseArray['status'] = 'error';
            $responseArray['message'] = 'check your input data';
        }

        echo json_encode($responseArray);
    }

    /**
     * @return string
     */
    public function currenciesAction()
    {

        echo json_encode($this->currencyConverter->getCurrencyValues());
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