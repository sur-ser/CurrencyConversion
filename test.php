<?php
/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 3:49
 */
require_once 'ICurrencyConversion.php';
require_once 'ICurrencyConverterService.php';
require_once 'CurrencyConverter.php';
require_once 'CurrencyServices\CbaService.php';
require_once 'CurrencyServices\GoogleService.php';

$converter = new CurrencyConverter(new CurrencyServices\CbaService());
var_dump($converter->convert([
    ['USD','RUB',10],
    ['RUB','USD',50000],
    ['AMD','USD',1000],
    ['USD','AMD',10]
]));

//var_dump($converter->getCurrencies());

$converter->setService(new CurrencyServices\GoogleService());

var_dump($converter->convert([
    ['USD','RUB',10],
    ['RUB','USD',50000],
    ['AMD','USD',1000],
    ['USD','AMD',10]
]));
