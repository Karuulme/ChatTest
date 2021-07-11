<?php
session_start();


error_reporting(0);
 if($_SERVER["REQUEST_METHOD"] == "POST") {
     $_SESSION["Kontrol"]=0;
     $_SESSION["User"] = "0";

     $Usermail = $_POST["useremail"];
     $Userpassword = $_POST["userpass"];
     include('FireBaseComment.php');
     $fetchdata = $database->getReference("UserList")->getValue();
     if ($fetchdata > 0) {

         foreach ($fetchdata as $key => $row) {

             if ($row["Mail"] == $Usermail && $row["Password"] == $Userpassword) {

                 $_SESSION["User"] = "1";
                 header("Location:Main.php");
                 $_SESSION["UserName"]=$row["Name"];
                 die();
             }
         }
         if ($_SESSION["User"] != "1") {

             $_SESSION["Kontrol"] = 1;
             header("Location:index.php");
         }
     }

 }
 else if($_SESSION["User"] = "1"){
     header("Location:Main.php");
 }
 else
 {

     header("Location:index.php");

 }


