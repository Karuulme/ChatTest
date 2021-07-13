<?php
session_start();
if($_SESSION["User"]=="1"){

date_default_timezone_set('Europe/Istanbul');
$tarih = date('d.m.Y H:i:s');
include ("FireBaseComment.php");
$dk = date('i') +1;
$Upp = [
    'Active' => 1,
    'Date' => date('d.m.Y H:' . $dk . ':s')
];

$table = "OnlineUserChecker/" . $_SESSION["UserName"];
$database->getReference($table)->update($Upp);

















}