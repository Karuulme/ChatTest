<?php

session_start();
error_reporting(0);
if($_SESSION["User"]=="1"){


    $_SESSION["User"]="0";



    header("Location:index.php");
}
else{

    header("Location:Main.php");

}




?>