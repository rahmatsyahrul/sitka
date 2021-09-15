<?php

function pajak($pkp)
{

    if ($pkp < 0) {
        $pajaktukin = 0;
    } elseif ($pkp <= 50000000) {
        $pajaktukin = 5;
    } elseif ($pkp > 50000000) {
        $pajaktukin = 15;
    } elseif ($pkp >= 250000000) {
        $pajaktukin = 25;
    } elseif ($pkp >= 500000000) {
        $pajaktukin = 30;
    }

    return $pajaktukin;
}
