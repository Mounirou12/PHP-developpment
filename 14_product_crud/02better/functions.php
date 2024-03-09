<?php
function RandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}