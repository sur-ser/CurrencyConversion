<?php

/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 3:46
 * ��������� ���������� ������
 */
interface ICurrencyConversion
{

    public function convert(array $conversions);

    public function getCurrencies();
}