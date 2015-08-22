<?php

/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 4:01
 * Интерфейс сервиса конвертера валют
 */
interface ICurrencyConverterService
{
    public function convert(array $conversions);
}