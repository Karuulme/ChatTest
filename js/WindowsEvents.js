$(document).ready(function() {

/*
    $("#tbxboxsearch").keydown(function () {
        var metin = $('#tbxboxsearch').val();
        $.ajax({
                type: "POST",
                url: 'SearchDataBaseList.php',
                data: {metin},
                success: function (data) {
                    //     document.getElementById('aramasonuclari').innerHTML = "";
                    document.getElementById("aramasonuclari").innerHTML = data;
                }
            }
        )
    })
*/
})


































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




$(document).ready(function() {
    var DivIds=[];
    DivIds[0]="FriendList";
    DivIds[1]="BillNotification";
    DivIds[2]="SearcFrendsDataBaseList";
    DivIds[3]="SearchFrendsList";
    DivIds[4]="UserSetting";
    DivIds.forEach(function (item){
            if(item!="FriendList") {


                var Id = document.getElementById(item);
                Id.style.display = "none";
            }
        }
    )
    $("#bill").click(function () {

        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="BillNotification") {
                    Id.style.display = "none";
                }
                else {
                    BillControl=1;
                    Id.style.display = "block";


                }
            }
        )




            tell();
            BillStatus();

    }


    )




    $("#ListSearcFriend_").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="SearcFrendsDataBaseList") {
                    Id.style.display = "none";
                    BillControl=0;
                }
                else {

                    Id.style.display = "block";

                }
            }
        )})


    $("#UserFriendAddU").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="SearchFrendsList") {
                    Id.style.display = "none";
                    BillControl=0;
                }
                else {
                    Id.style.display = "block";
                }
            }
        )})
    $("#Setting").click(function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="UserSetting") {
                    Id.style.display = "none";
                    BillControl=0;
                }
                else {
                    Id.style.display = "block";
                }
            }
        )
    }
    )

    $("#BillNotification_").on("click","#SearchfrendsListofff",function () {
        DivIds.forEach(function (item) {

                var Id = document.getElementById(item);

                if (item!="FriendList") {
                    Id.style.display = "none";
                    BillControl=0;
                }
                else {
                    Id.style.display = "block";
                }
            }
        )



    })














})











