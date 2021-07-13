<?php

session_start();
$UserNameSearch=$_POST["metin"];
$usernames=array();
$SpaceControl=0;
$say=0;
$get="";
$get2="";
$i=0;
$key=0;
$get="";
$SorguKontrol=0;
$FinishNameControl=0;

if(strlen($UserNameSearch)!=0) {
    if ($UserNameSearch[0] == " ") {
        $SpaceControl = 1;
    }
    if ($SpaceControl == 0) {
        $kkontrol = 0;
        include('FireBaseComment.php');
        $fetchdata = $database->getReference("Users")->getValue();
        if ($fetchdata > 0) {
            foreach ($fetchdata as $row) {
                if ($row["Username"] != $_SESSION["UserName"]) {
                    $GetName = $row["Username"];
                    if (strlen($GetName) >= strlen($UserNameSearch)) {
                        $get = substr($GetName, 0, strlen($UserNameSearch));
                        $get2 = substr($GetName, strlen($get), strlen($GetName));
                        if ($UserNameSearch == $get) {

                            $usernames[$say] = $GetName;
                            $SorguKontrol = 1;
                            $say = 1 + $say;

                        }
                    }
                }
            }//sorgu bitiş

            $i = 0;
        }
        else{
        ?>
        <h4 align="center" style="color: white">Hiç Sonuç Bulunamadı</h4>
        <?php
        }
        if ($SorguKontrol == 1) {
            $UserList = $usernames;
            $SorguEkrani = array();
            $comment = "UserFriendRequestList/".$_SESSION["UserName"];
            $fetchdata2 = $database->getReference($comment)->getValue();
            if ($fetchdata2 > 0) {
                   ;
                for ($j = 0; $j < count($UserList); $j++) {
                    $key = 0;
                    $Status=0;
                                         $fetchdata2_sayac=0;
                                     foreach ($fetchdata2 as $row => $value ){
                                           if ($UserList[$j] == array_keys($fetchdata2)[$fetchdata2_sayac]) {
                                               $Status=array_values($value)[0];
                                                                $key=1;
                                            }
                                         $fetchdata2_sayac++;
                                        }
                    if (1==$Status && $key==1) {
                        $startname = substr($UserList[$j], 0, strlen($UserNameSearch));
                        $finishname = substr($UserList[$j], strlen($get), strlen($UserList[$j]));
                        // Yükleme Simgesi YERİ--------------------------------------------------------------------------------------------
                        ?>
                        <li>  <div class="SearcListusername">
                                                                                 <span style="color: #0b2e13">
                                                                                     <?php
                                                                                     echo  $startname;
                                                                                     ?>
                                                                                 </span>
                                <span style="color: white">
                                                                      <?php
                                                                      echo  $finishname;
                                                                      ?>
                                                                                 </span>
                                <span  class="loadingAnimation">
                                                                                 <div id="preloader_1">
                                                                         <span></span>
                                                                         <span></span>
                                                                         <span></span>
                                                                         </div></span>
                            </div>
                        </li>
                        <?php







                    }
                    else{
                        $startname = substr($UserList[$j], 0, strlen($UserNameSearch));
                        $finishname = substr($UserList[$j], strlen($get), strlen($UserList[$j]));
                        // EKLEME YENİ --------------------------------------------------------------------------------------------


                        ?>
                        <li>
                            <div  class="SearcListusername"> <span style="color: #0b2e13">
                                                                                     <?php
                                                                                     echo  $startname;
                                                                                     ?>
                                                                                 </span>
                                <span style="color: white">
                                                                      <?php
                                                                      echo  $finishname;
                                                                      ?>
                                                                                 </span>
                                <span  class="loadingAnimation" id="<?php echo $UserList[$j];  ?>">
                     <input name="<?php echo $UserList[$j];  ?>" onclick="FriendsAdd('<?php echo $UserList[$j];  ?>')" id="preloader_1"
                            style="float:left;border: 0px;margin-top: -20px;margin-left: 180px;;width: 30px;text-align: center;color: white;background: transparent;width: 20px;height: 20px;" value="+">
                                 </span>
                            </div>
                        </li>
                        <?php







                    }


                }
            }
            else{

            foreach ($UserList as $Key) {


                $startname = substr($Key, 0, strlen($UserNameSearch));
                   $finishname = substr($Key, strlen($get), strlen($Key));
                   // Arkadaş listemde yok ve EKLEME YErine geöiş yapıyor direk  --------------------------------------------------------------------------------------------


                   ?>
                   <li>
                       <div  class="SearcListusername"> <span style="color: #0b2e13">
                                                                                        <?php
                                                                                        echo  $startname;
                                                                                        ?>
                                                                                    </span>
                           <span style="color: white">
                                                                         <?php
                                                                         echo  $finishname;
                                                                         ?>
                                                                                    </span>
                           <span  class="loadingAnimation" id="<?php echo $Key;  ?>">
                        <input name="<?php echo $Key;  ?>" onclick="FriendsAdd('<?php echo $Key;  ?>')" id="preloader_1"
                               style="float:left;border: 0px;margin-top: -20px;margin-left: 180px;;width: 30px;text-align: center;color: white;background: transparent;width: 20px;height: 20px;" value="+">
                                    </span>
                       </div>
                   </li>
                   <?php
            }


            }


        }
        else{

            ?>
            <h4 align="center" style="red: white">Hiç Sonuç Bulunamadı</h4>
            <?php




        }


    }
}
/*
else{

    header("index.html");


}
*/




















