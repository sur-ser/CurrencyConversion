<?php

/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 22.08.2015
 * Time: 4:00
 * Êîíâåğòåğ  öåíòğàëüíîãî áàíêà Àğìåíèè
 * Íå íàø¸ë â îïèñàíèè API ñóùåñòâóåò ëè ó ÖÁ Àğìåíèè êîíâåğòåğ,
 * â ñëåäñòâèè ÷åãî äàííûé êëàññ êîíâåğòèğóåò íà îñíîâå êóğñà âàëşòû
 * ïğåäîñòîâëÿåìûì áàíêîì â ñîîòíîøåíèè ñ Àğìÿíñêèì äğàìîì
 */
namespace CurrencyServices;

class CbaService implements \ICurrencyConverterService
{


    private $_ratesEndpoint = 'http://cb.am/latest.json.php';

    private $_rates;

    private $_nativeCurrency = 'AMD';

    public function __construct(){
        $this->_rates = json_decode(file_get_contents($this->_ratesEndpoint),true);
    }

    public function convert(array $conversions)
    {
        $result = [];
        foreach($conversions as $c){
            if( ! in_array($this->_nativeCurrency,$c)){
                $result [] = (isset($this->_rates[$c[0]]) && isset($this->_rates[$c[1]])) ? ($this->_rates[$c[0]] * $c[2]) / $this->_rates[$c[1]] : null;
            }else{
                $result [] = ($c[0] == $this->_nativeCurrency) ? $c[2] / $this->_rates[$c[1]] : $this->_rates[$c[0]] * $c[2];
            }

        }
        return $result;
    }

    public function getCurrencies(){
        return array_keys($this->_rates);
    }
}