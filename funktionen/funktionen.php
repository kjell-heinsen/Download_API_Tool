<?php
/**
 * @since 1.0.0
 * @deprecated
 * @
 * @param $min
 * @param $max
 * @return float|int
 */
function random_float ($min,$max) {
    return ($min + lcg_value()*(abs($max - $min)));
}

function inc($zahl)
{
   $zahl = $zahl + 1; 
    return $zahl;
}


function mymath($mean, $StdDev){
    $U1 = 0;
    $S2 = 5;

    while($S2 < 1){
        $random = rand(1,5000);
        $random = $random / 10000;
        $U1 = 2*Rand() -1;
        $S2 = sqr($U1) + sqr(2*rand() -1);
    }
    $ergebnis = sqrt(-2*log($S2)/$S2) * $U1 * $StdDev + $mean;

    return $ergebnis;


}