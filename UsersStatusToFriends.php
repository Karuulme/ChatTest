<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$UserStatusList = $_POST["UserStatus"];
date_default_timezone_set('Europe/Istanbul');
include ("FireBaseComment.php");
if($UserStatusList==" "){





    foreach ($UserStatusList as $Key)
    {
        $comment = "UserStatus/".$Key;
        $UserStatus = $database->getReference($comment)->getValue();
        if($UserStatus>0){




        if($tarih>$UserStatus["Date"])
        {


            ?>
            <li>
                <span style="margin-left:15px"><i class="fas fa-circle" style="font-size: 12px;color: red;"></i></span>
                <span class="username"><?php echo $Key; ?></span>
            </li>
            <?php

            //   PASİF HALA GETİRİYORUZ
            $Upp = [
                'Active' => 0,
            ];

            $table = "UserStatus/" .$Key;
            $database->getReference($table)->update($Upp);



        }
        else{


            ?>


            <li>
                <span style="margin-left:15px"><i class="fas fa-circle" style="font-size: 12px;color: #00ff20;"></i></span>
                <span class="username"><?php echo $Key; ?></span>
            </li>




            <?php










    }
        }
    }

}




}












