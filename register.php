<?php



error_reporting(0);
if ( $_SESSION["User"]=="1") {

    header('Location: Main.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login V2</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>
<body>
<div class="limiter" style="cursor: default">
  <div class="container-login100">
    <div class="wrap-login100" style="cursor: cell">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        date_default_timezone_set('Europe/Istanbul');
        $User_Name=$_POST["User_Name"];
        $Email=$_POST["Email"];
        $Password1Key=$_POST["pass"];
        $Password2Key=$_POST["pass2"];


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
                'Name' => $User_Name,
                'Mail' => $Email,
                'Password' => $Password1Key,
                'RegisterDate' => date('d.m.Y H:i:s')
            ];

            $table = "UserList";
            $database->getReference($table)->push($data);

        $sn = date('s') + 30;
        $data = [
            'Active' => 0,
            'Date' => date('d.m.Y H:i:s'),
        ];

        $table = "UserStatus/" . $User_Name;
        $userListAlıcı = $database->getReference($table)->set($data);






        ?>
        <span class="login100-form-title p-b-26" style="color:#28a745">
                 Kayıt Başarılı
					</span>


        <div class="text-center p-t-115">
						<span class="txt1">
                          <a href="index.php">    <i class="fas fa-arrow-left fa-2x"><font style="margin-left: 20px;">login</font></i></a>
						</span>



            <?php

            }
            else{
                ?>






            <form class="login100-form validate-form" action="" method="POST">


					<span class="login100-form-title p-b-26">
						Welcome
					</span>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="User_Name" style="cursor: cell">
                    <span class="focus-input100" data-placeholder="User Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="Email" style="cursor: cell">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass" style="cursor: cell">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass2" style="cursor: cell">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            <input type="submit" value="SİNG UP" style="width: 100%;height: 100%;background: transparent;color: white;cursor: pointer">
                        </button>

                    </div>

                    <span style="margin-top: 25px;color: red">Bilgileriniz kontrol ediniz...</span>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
                          <a href="index.php">LOGİN</a>
						</span>






                    <?php



            }








            }
        else{
            ?>





        <form class="login100-form validate-form" action="" method="POST">


					<span class="login100-form-title p-b-26">
						Welcome
					</span>


            <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                <input class="input100" type="text" name="User_Name" style="cursor: cell">
                <span class="focus-input100" data-placeholder="User Name"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                <input class="input100" type="text" name="Email" style="cursor: cell">
                <span class="focus-input100" data-placeholder="Email"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                <input class="input100" type="password" name="pass" style="cursor: cell">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                <input class="input100" type="password" name="pass2" style="cursor: cell">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        <input type="submit" value="SİNG UP" style="width: 100%;height: 100%;background: transparent;color: white;cursor: pointer">
                    </button>
                </div>
            </div>

            <div class="text-center p-t-115">
						<span class="txt1">
                          <a href="index.php">LOGİN</a>
						</span>




            <?php



        }




        ?>



        </div>
      </form>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>