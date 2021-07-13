<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    include("FireBaseComment.php");
    date_default_timezone_set('Europe/Istanbul');
    date('d.m.Y H:i:s');
    $Gonderici = $_SESSION["UserName"];

    $Hedef = $_POST["Target"];

    $Alici = $_POST["isim"];
    $Mesaj = $_POST["mesaj"];




       $data = [
           'Donor'=> $Gonderici,
           'Message'=> $Mesaj,
           'Date' => date('d.m.Y H:i:s'),

       ];

       $table = "message/" . $Hedef;
       $userListAlıcı = $database->getReference($table)->push($data);



}





?>