<?php

function convertisseur($amount, $currencyOfExit)
{
    if ($currencyOfExit == 'USD') {
        $amount = '1';
    } else ($currencyOfExit == 'EUR') {
        $amount = '1.085965'
    } 
