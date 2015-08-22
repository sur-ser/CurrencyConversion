<?php
/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 5:21
 * Конвертер работает по средствам google
 */

namespace CurrencyServices;

class GoogleService implements \ICurrencyConverterService
{
    private $_ratesEndpoint = 'https://www.google.com/finance/converter?';

    public function convert(array $conversions)
    {
        $result = [];
        foreach($conversions as $c){
            $result [] = $this->_convert($c[2],$c[0],$c[1]);

        }
        return $result;
    }

    public function getCurrencies(){
        return ['any'];
    }

    private function _convert($amount,$from,$to){
        $amount = urlencode($amount);
        $from = urlencode($from);
        $to = urlencode($to);
        $get = file_get_contents("{$this->_ratesEndpoint}a={$amount}&from={$from}&to={$to}");
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        return preg_replace("/[^0-9\\.]/", null, $get[0]);
    }
}