<?php



error_reporting(0);
if ( $_SESSION["User"]=="1") {

    header('Location: Main.php');

}

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

            box-shadow: 0px 5px 9px 5px #dddddd;
            background: white;
            margin-right: auto;
            margin-left: auto;
            margin-top: 5%;
        }
        .dizayn{

            text-align: center;
        }
        .dizayn input{
            margin-top:20px;
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
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        date_default_timezone_set('Europe/Istanbul');
        $Name=$_POST["Ad"];
        $Surname=$_POST["Soyad"];
        $User_Name=$_POST["Kullanıcı"];
        $Email=$_POST["E-Posta"];
        $Password1Key=$_POST["Sifre"];
        $Password2Key=$_POST["Sifretekrarı"];


        str_split($Email);

        $MailKontrol=0;
        for($i=0; $i<strlen($Email);$i++){

            if($Email[$i]=="@"){
                $MailKontrol=1;


            }


        }
        if($MailKontrol==1 && $Password1Key==$Password2Key){
            include('FireBaseComment.php');


            $data = [
                'Username' => $User_Name,
                'E-Mail' => $Email,
                'Password' => $Password1Key,
                'Registered' => date('d.m.Y H:i:s'),
                'Ban' => 0,
                'Rand' => "User",
                'Name' => $Name,
                'Surname' =>  $Surname,


            ];

            $table = "Users/".$User_Name;
            $database->getReference($table)->set($data);

            $sn = date('s') + 30;
            $data = [
                'Active' => 0,
                'Date' => date('d.m.Y H:i:s'),
                'Status'=>1
            ];

            $table = "OnlineUserChecker/" . $User_Name;
            $userListAlıcı = $database->getReference($table)->set($data);






            ?>

            <div style="width: 100%;height: 150px">
                <h2 style="padding:10px;margin: 30px">
                    Kayıt Başarılı
                </h2>




                <a href="index.php" style="text-decoration:none;font-size: 1.1em;" > login</a>
            </div>



            <?php

        }
        else{
        ?>






        <form action=" " method="POST">
            <input type="text" placeholder="Ad"  name="Ad" >
            <input type="text" placeholder="Soyad" name="Soyad" >
            <input type="text" placeholder="Kullanıcı Adı"  name="Kullanıcı">
            <input type="text" placeholder="E-Posta"  name="E-Posta">
            <input type="password" placeholder="Şifre" name="Sifre" >
            <input type="password" placeholder="Şifre Tekrarı" name="Sifretekrarı">
            <input type="submit" value="LOGİN" style="height: 50px;width:275px;background: #f2f2f2;;color: black;margin-bottom: 50px ">
        </form>



        <h5 style="padding: 20px">Bilgilerinizi Kontrol Ediniz</h5>
    </div>




    <?php



    }








    }
    else{
    ?>




    <form action=" " method="POST">
        <input type="text" placeholder="Ad"  name="Ad" >
        <input type="text" placeholder="Soyad" name="Soyad" >
        <input type="text" placeholder="Kullanıcı Adı"  name="Kullanıcı">
        <input type="text" placeholder="E-Posta"  name="E-Posta">
        <input type="password" placeholder="Şifre" name="Sifre" >
        <input type="password" placeholder="Şifre Tekrarı" name="Sifretekrarı">
        <input type="submit" value="LOGİN" style="height: 50px;width:275px;background: #f2f2f2;;color: black;margin-bottom: 50px ">
    </form>

</div>





<?php



}




?>









</div>







</body>
</html>