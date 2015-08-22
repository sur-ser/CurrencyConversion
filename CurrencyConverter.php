<?php

/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 3:52
 */
class CurrencyConverter implements ICurrencyConversion
{

    /**
     * —ервис осуществл€ющий операции над валютами
     * @var ICurrencyConverterService
     */
    private $_service;

    public function __construct(ICurrencyConverterService $service){
        $this->_service = $service;
    }
//[['USD','GB','12.00']]
    public function convert(array $conversions)
    {
        return $this->_service->convert($conversions);
    }

    public function getCurrencies()
    {
        return $this->_service->getCurrencies();
    }

    public function setService(ICurrencyConverterService $service){
        $this->_service = $service;
        return $this;
    }
}