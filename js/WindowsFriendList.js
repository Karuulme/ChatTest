

$.UserStatusNotification=function() {

if(UserStatus.length!=0){


    $.ajax({
        type: "POST",
        url: 'UsersStatusToFriends.php',
        data: {UserStatus},
        success: function(data) {
            var html='';
            document.getElementById('FriendList').innerHTML=data;
        }
    });
}
}





setInterval(function() {
    $.UserStatusNotification();
},5000 );


function UserAktive(){


    $.ajax({
        type: "POST",
        url: 'LoginUsersActive.php',
        data: {},
        success: function(data) {

        }
    });

}
UserAktive();
setInterval(function() {
    UserAktive();
},15000);























