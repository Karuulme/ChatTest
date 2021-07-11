<?php
session_start();
error_reporting(0);
if($_SESSION["User"]=="1"){
    ?>
    <html
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" >
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
        <link href="css/MainStil.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
    <div  class="-table" >
        <div class="left">
            <div class="Mesaj_icerigi">
            </div>
            <div class="TextBox">
                <input type="text" placeholder="Bir şeyler yaz..." >
                <button class="submit"> GÖNDER</button>
            </div>
        </div>
        <div class="right">
            <h1 id="SessionUserName"><?php  echo $_SESSION["UserName"];  ?></h1>
            <div class="Add_Search">

                    <div id="bell" style="width: 26px;height: 26px" >
                    </div>
                <br>
                <button id="ListSearcFriend" >

                    <i class="fas fa-search" ></i>
                </button>

                <br>
                <button id="UserFriendAdd_" style="margin-top: 15px">

                    <i class="fas fa-plus"></i>
                </button>
                <br>
                <button id="Setting" style="margin-top: 10px">

                    <i class="fas fa-cog"></i>
                </button>


                <br><a  href="UserClose.php"> <button onclick="UserClose()" style="margin-top: 15px">
                    <i class="fas fa-sign-out-alt"></i></button></a>
            </div>




            <div id="searList">

                <div id="FriendList">FriendList</div>
                <div id="BillNotification">BillNotification</div>
                <div id="SearcFrendsDataBaseList">SearcFrendsDataBaseList</div>
                <div id="SearchFrendsList">
                    <div class="SearcTextBox" id="SearcTextBox">
                        <input type="text" placeholder="Arama" id="SearcText" name="SearchListFriend"  onkeyup="Gonder()" >
                        <input class="SearcTextBoxButton" type="button" value="X" onclick="SearcTextBoxClose()">
                    </div>

                </div>

                <div id="UserSetting">UserSetting</div>






            <br>
            <div class="UserList_1" id="UserList_Id">
            </div>
        </div>
    </div>

    <div id="sonuc"></div>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-database.js"></script>
    <script src="js/Notification.js" charset="UTF-8"></script>
    <script src="js/WindowsEvents.js" charset="UTF-8"></script>
    <script src="js/WindowsFriendList.js" charset="UTF-8"></script>

    </body>
    </html>

    <?php
}
else{
    header("Location:Main.php");

}
?>

