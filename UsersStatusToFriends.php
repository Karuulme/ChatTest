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


            ?><button>
        <li >
                <span style="margin-left:15px"><i class="fas fa-circle" style="font-size: 12px;color: red;"></i></span>
               <span id="<?php echo $Key; ?>" class="username"><?php echo $Key; ?></span>
            </li>
            </button>
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

            <button>
            <li  >
                <span style="margin-left:15px"><i class="fas fa-circle" style="font-size: 12px;color: #00ff20;"></i></span>
             <span id="<?php echo $Key; ?>"  class="username"><?php echo $Key; ?></span>
            </li>
            </button>




            <?php










    }
        }
    }

}




}












