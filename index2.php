
<?php
session_start();

error_reporting(0);

$url =$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$a = explode("?",$url);
if ( $_SESSION["User"]=="1") {


    header('Location: Main.php');







}
else if($_SERVER["REQUEST_METHOD"] == "POST"){




}
else{

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Title</title>



    <style>

        body{
            padding: 0;
            margin: 0;
            background: #f2f2f2;
        }
        .mid{
            width: 350px;
            height: 350px;
            box-shadow: 0px 5px 9px 5px #dddddd;
            background: white;
            margin-right: auto;
            margin-left: auto;
            margin-top: 13%;
        }
        .dizayn{

            text-align: center;
        }
        .dizayn input{
            margin-top:35px;
            border: 1px solid ;
            background: white;
            width: 250px;
            padding: 10px;
            height: 30px;
            font-size: 1.1em;
            border-radius: 5px;
            border:1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="mid">


    <div class="dizayn">
        <form action="OturunOpen.php" method="POST" >
            <input type="text" placeholder="Kullanıcı Adı"  >
            <input type="password" placeholder="Şifre" >
            <input type="submit" value="LOGİN" style="height: 50px;width:275px;background: #f2f2f2;;color: black ">

        </form>

        <?php
        if($_SESSION["Kontrol"]==1)
        {
            ?>
            <span style="margin-top: 25px;color: red">Bilgileriniz kontrol ediniz...</span>

            <?php

        }


        ?>

    </div>

    <div class="text-center p-t-115">

        <a style="text-align: center;text-decoration: none;color: #555555;" href="register2.php">
            <h4>SİGN UP</h4>

        </a>




        <?php
        }
















        ?>





    </div>










</div>










</body>
</html>