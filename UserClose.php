<?php

session_start();
error_reporting(0);
if($_SESSION["User"]=="1"){


    $_SESSION["User"]="0";



    header("Location:index.php");

    include ("FireBaseComment.php");

    $dk=date('i')-2;

    $Upp = [
        'Active' =>0,
        'Date' => date('d.m.Y H:' . $dk . ':s')
    ];

    $table = "OnlineUserChecker/" . $_SESSION["UserName"];
    $database->getReference($table)->update($Upp);















}
else{

    header("Location:Main.php");

}




?>