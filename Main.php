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
        <title><?php  echo $_SESSION["UserName"];  ?></title>
    </head>
    <body>
    <div  class="-table" >
        <div class="left" >
            <div class="Mesaj_icerigi"  id="MessageBox"  style="overflow-y: auto;">




            </div>
            <div class="TextBox">
                <input type="text" id="Mesajtext" placeholder="Bir şeyler yaz..." >
                <button id="submit" class="submit"> GÖNDER</button>
            </div>
        </div>
        <div class="right">
            <h1 id="SessionUserName"><?php  echo $_SESSION["UserName"];  ?></h1>
            <div class="Add_Search">

                    <div id="bill" style="width: 26px;height: 26px" >
                    </div>
                <br>
                <button id="ListSearcFriend_" >

                    <i class="fas fa-search" ></i>
                </button>

                <br>
                <button id="UserFriendAddU" style="margin-top: 15px">

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

                <div id="FriendList"></div>
                <div id="BillNotification">
                    <div id="BillNotification_">








                    </div>


                </div>
                <div id="SearcFrendsDataBaseList">SearcFrendsDataBaseList</div>
                <div id="SearchFrendsList">
                    <div class="SearcTextBox" id="SearcTextBox">
                       <table  style="padding: 0px;margin-top: 8px" width="100%">
                       <tr>
                           <td width="10%"><button id="SearchFrendsListoff" onclick="SearcTextBoxClose()"><i style="padding:0px" class="fas fa-angle-left fa-2x"></i></button></td>

                           <td>    <input type="text" placeholder="Arama" class="SearcTextboxinput" id="tbxboxsearch" name="SearchListFriend" ></td>

                       </tr>


                       </table>





                    </div>
                    <div id="aramasonuclari"></div>


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
        <script src="js/MessageOperation.js" charset="UTF-8"></script>
    </body>
    </html>

    <?php
}
else{
    header("Location:Main.php");

}
?>

