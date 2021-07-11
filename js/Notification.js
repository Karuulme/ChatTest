var sayac=0;
var BillUserName=[];
var UserStatus=[];


var SessionUserName=document.getElementById("SessionUserName").innerHTML;
$(document).ready(function(){
    var firebaseConfig = {
        apiKey: "AIzaSyCwpKwGk8YFRk7fCWYv9iLvkSKe5grffYE",
        authDomain: "chataplication-ee6c9.firebaseapp.com",
        databaseURL: "https://chataplication-ee6c9-default-rtdb.firebaseio.com",
        projectId: "chataplication-ee6c9",
        storageBucket: "chataplication-ee6c9.appspot.com",
        messagingSenderId: "634947902220",
        appId: "1:634947902220:web:aad4d50f036a9ffae30729"
    };
    firebase.initializeApp(firebaseConfig);
    var todoRef = firebase.database().ref().child("UserFriendRequestList").child(SessionUserName);

    todoRef.on("value", function(snapshot){
        var Bildirim=0;
        var StatusSayac=0;
        snapshot.forEach(function(item){
            if(item.val().Status==2) {
                UserStatus[StatusSayac] = item.key.toString();
                StatusSayac++;
            }

                if(item.val().Bill==0){

                BillUserName[sayac]=item.key.toString();
                    sayac++;
                    console.log(sayac);
                Bildirim=1;
                 }
        })
        var html='';
        if(Bildirim==1){
            var tirnak2="'";
            html+=' <button >';
            html+='  <img  src="Back/bell2.png" width="26"/>';
            html+=' </button>';
            document.getElementById('bell').innerHTML =html;


        }
        else
        {

            html+=' <button> ';
            html+='  <img  src="Back/bell.png" width="26"/>';
            html+=' </button>';
            document.getElementById('bell').innerHTML =html;
        }
        Bildirim=0;
        $.NotificationBell();
    });
})
$.NotificationBell=function() {

    if(sayac!=0) {

        document.getElementById('BillNotification').innerHTML =" ";

        var html = '';

        html+='<table width="100%"><tr ><td width="20%" height="25px" valign="center"><button onclick="BildirimOff()"><i style="padding:0px" class="fas fa-angle-left fa-2x"></i></button></td><td valign="center" align="center"> <p style="margin-left: -50px;font-weight: bold">Bildirimler</p></td></tr> </table>';

        html+=' <table width="90%" align="center" style="margin-top: 25px" >';
        var tirnak="'";

        for (var i = 0; i < sayac; i++) {

            html+=' <tr id="'+BillUserName[i]+'"><td width="70%" ><div>'+BillUserName[i]+'</div></td><td width="5%" ><button  style="width: 25px" onclick="BillUserCheck('+tirnak+BillUserName[i]+tirnak+')"><i  class="fas fa-check"></i></button></td><td width="10%" ><button style="width: 25px" onclick="BillUserDelete('+tirnak+BillUserName[i]+tirnak+')"><i class="fas fa-minus "></i></button></td></tr>';

            firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(BillUserName[i]).child("Bill").set(1);
        }



        html+='  </table>';
        document.getElementById('BillNotification').innerHTML = html;
    }



}













function BillUserCheck() {

    BillUserName.forEach(function (item){

        firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(item).child("Bill").set(1);




    })

}
function BillUserCheck(Name) {


    document.getElementById(Name).innerHTML = " ";
     firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(Name).child("Status").set(2);
    firebase.database().ref("UserFriendRequestList").child(Name).child(SessionUserName).child("Status").set(2);


}
function BillUserDelete(Name) {
    document.getElementById(Name).innerHTML = " ";
     firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(Name).remove();
     firebase.database().ref("UserFriendRequestList").child(Name).child(SessionUserName).remove();
}
function BildirimOff() {
    document.getElementById('bildirimyeri').innerHTML ="";
    var secilenID = document.getElementById("SearcTextBox");
    secilenID.style.display = "none";

}















