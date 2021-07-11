<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include('FireBaseComment.php');
    $istek_gonderen = $_SESSION["UserName"];
    $istek_alan = $_POST["Name"];

    $data = [
        'Status' => 1,
        'Bill' => 0
    ];

    $table = "UserFriendRequestList/" . $istek_alan;
    $userListAlıcı = $database->getReference($table . "/" . $istek_gonderen)->set($data);

    $data2 = [
        'Status' => 1,
    ];

    $table = "UserFriendRequestList/" . $istek_gonderen;
    $userListGonderici = $database->getReference($table . "/" . $istek_alan)->set($data2);

            ?>
            <div id="preloader_1">
                                                                         <span></span>
                                                                         <span></span>
                                                                         <span></span>
                                                                         </div></span>
                </div>

            <?php


















}












