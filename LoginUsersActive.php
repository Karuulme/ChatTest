<?php
session_start();
if($_SESSION["User"]=="1"){

date_default_timezone_set('Europe/Istanbul');
$tarih = date('d.m.Y H:i:s');
include ("FireBaseComment.php");
$sn = date('s') + 30;
$Upp = [
    'Active' => 1,
    'Date' => date('d.m.Y H:i:' . $sn . '')
];

$table = "UserStatus/" . $_SESSION["UserName"];
$database->getReference($table)->update($Upp);















}