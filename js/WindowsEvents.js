
function FriendsAdd(Name){

    document.getElementById(Name).innerHTML = " ";
    var secilenID = document.getElementById(Name);
    secilenID.style.display = "none";
    $.ajax({
        type: "POST",
        url: '../UserFriendsAdd.php',
        data: {Name},
        success: function(data) {

            document.getElementById(Name).innerHTML = "";
            document.getElementById(Name).innerHTML=data;
        }
    });

}
function Gonder() {
    var metin= $('#SearcText').val();
    $.ajax({
        type: "POST",
        url: 'SearchDataBaseList.php',
        data: $("#SearcText"), // formdaki tüm bilgileri gönder.
        success: function(data) {
            //gelen sonuçları gelensonuc adlı değişkene yüklüyoruz.
            DivIds.forEach(function (item){
                if("searList"!=item){
                    $(item).hide();
                }
                else
                {
                    $(item).show()
                    document.getElementById('searList').innerHTML = "";
                    document.getElementById("searList").innerHTML=data;
                }
            })

        }
    });
}
$(document).ready(function() {
    var DivIds=[];
    DivIds[0]="UserFriendAdd";
    DivIds[1]="BillNotification";
    DivIds[2]="SearchFrendsList";
    DivIds[3]="SearcFrendsDataBaseList";
    DivIds[4]="UserSetting";
    DivIds.forEach(function (item){
      var Id = document.getElementById(item);
       Id.style.display = "none";
    }
    )
    $("#bell").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="BillNotification") {
                    Id.style.display = "none";
                }
                else {
                    $.NotificationBell();
                    Id.style.display = "block";

                }
            }
        )})
    $("#ListSearcFriend").click(function () {
        DivIds.forEach(function (item) {

            var Id = document.getElementById(item);

            if (item!="SearcFrendsDataBaseList") {
                Id.style.display = "none";
               }
               else {
                Id.style.display = "block";
               }
        }
        )})


    $("#UserFriendAdd_").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="SearchFrendsList") {
                    Id.style.display = "none";
                }
                else {
                    Id.style.display = "block";
                }
            }
        )})
    $("#Setting").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="UserFriendAdd") {
                    Id.style.display = "none";
                }
                else {
                    Id.style.display = "block";
                }
            }
        )})


})

setInterval(function() {

    $.ajax({
        type: "POST",
        url: '../OturumOnline.php',
        data: {}, // formdaki tüm bilgileri gönder.
        success: function(data) {
            //gelen sonuçları gelensonuc adlı değişkene yüklüyoruz.


            document.getElementById('UserList_Id').innerHTML = "";
            document.getElementById("UserList_Id").innerHTML=data;
        }
    });

},150000);



function FriendRequestDelete(Name){

    $.ajax({
        type: "POST",
        url: '../FriendRequestDelete.php',
        data: {Name},
        success: function(data) {

        }
    });

}

function FriendRequestConfirmation(Name){

    $.ajax({
        type: "POST",
        url: '../FriendRequestConfirmation.php',
        data: {Name},
        success: function(data) {

        }
    });

}
