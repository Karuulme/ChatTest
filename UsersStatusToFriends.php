<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$UserStatusList = $_POST["UserStatus"];
date_default_timezone_set('Europe/Istanbul');
$tarih=date('d.m.Y H:i:s');
include ("FireBaseComment.php");
if($UserStatusList!=" "){







    foreach ($UserStatusList as $Key)
    {
        $comment = "OnlineUserChecker/".$Key;
        $UserStatus = $database->getReference($comment)->getValue();
        if($UserStatus>0){




        if($tarih>$UserStatus["Date"])
        {


            ?>

            <button style="padding: 8px">
                <div style="float: left;background: red;width: 15px;height: 15px;border-radius: 100%"></div>

                    <?php echo $Key; ?>

            </button><br>


            <?php

            //   PASİF HALA GETİRİYORUZ
            $Upp = [
                'Active' => 0,
            ];

            $table = "OnlineUserChecker/" .$Key;
            $database->getReference($table)->update($Upp);



        }
        else{


            ?>

            <button style="padding: 8px">
                <div style="background: darkgreen;width: 15px;height: 15px;float: left;border-radius: 100%"></div>

                <?php echo $Key; ?>

            </button><br>




            <?php










    }
        }
    }

}




}












