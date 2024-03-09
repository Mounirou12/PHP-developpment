<?php
require_once 'compte.php';

$compte = new Compte();
$compte->depot("123",12000,2000);
echo '<pre>';
var_dump($compte);
echo '</pre>';
$compte->retrait(5000);
echo '<pre>';
var_dump($compte);
echo '</pre>';
echo $compte->getSold().'<br>';
echo $compte->afficherSolde().'<br>';
$compte->virement(3000,"104");
echo '<pre>';
var_dump($compte);
echo '</pre>';
?>