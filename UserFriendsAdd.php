<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include('FireBaseComment.php');
    $istek_gonderen = $_SESSION["UserName"];
    $istek_alan = $_POST["Name"];

    $data = [
        'Status' => 1,
        'Bill' => 0,
        'messageoperation' =>$istek_gonderen."-".$istek_alan
    ];

    $table = "UserFriendRequestList/" . $istek_alan;
    $userListAlıcı = $database->getReference($table . "/" . $istek_gonderen)->set($data);


    $data2 = [
        'Status' => 1,
        'messageoperation' =>$istek_gonderen."-".$istek_alan
    ];

    $table = "UserFriendRequestList/" . $istek_gonderen;
    $userListGonderici = $database->getReference($table . "/" . $istek_alan)->set($data2);

    $data = [
        'Status' => 1,
        'Bill' => 0,
        'messageoperation' =>$istek_gonderen."-".$istek_alan
    ];

    $data = [
            'start' =>"0"
    ];

    $table = "message/" .$istek_gonderen."-".$istek_alan;
    $userListAlıcı = $database->getReference($table . "/" . $istek_gonderen)->push($data);


            ?>
            <div id="preloader_1">
                                                                         <span></span>
                                                                         <span></span>
                                                                         <span></span>
                                                                         </div></span>
                </div>

            <?php


















}












