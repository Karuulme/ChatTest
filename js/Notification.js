var sayac=0;
var BillUserName=[];
var UserStatus=[];
var userwants=[];
var BillControl=0;
var BildirimControl=0;

var SessionUserName=document.getElementById("SessionUserName").innerHTML;
$(document).ready(function(){

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
    var firebaseConfig = {
        apiKey: "AIzaSyCwpKwGk8YFRk7fCWYv9iLvkSKe5grffYE",
        authDomain: "chataplication-ee6c9.firebaseapp.com",
        databaseURL: "https://chataplication-ee6c9-default-rtdb.firebaseio.com",
        projectId: "chataplication-ee6c9",
        storageBucket: "chataplication-ee6c9.appspot.com",
        messagingSenderId: "634947902220",
        appId: "1:634947902220:web:aad4d50f036a9ffae30729"
    };
var ref;
    firebase.initializeApp(firebaseConfig);

    var todoRef = firebase.database().ref().child("UserFriendRequestList").child(SessionUserName);

    todoRef.on("value", function(snapshot){
        var Bildirim=0;
        var StatusSayac=0;
        var userS=0;

        snapshot.forEach(function(item){
            if(item.val().Status==2) {
                UserStatus[StatusSayac] = item.key.toString();
                StatusSayac++;
            }
            if(item.val().Status==1){
                userwants[userS]=item.key.toString();



                userS++;
              //  $.NotificationBell();

            }

                if(item.val().Bill==0){

                BillUserName[sayac]=item.key.toString();
                    sayac=sayac+1;
                Bildirim=1;
                 }
        })

        var html='';
        if(Bildirim==1){

            var tirnak2="'";
            html+='<button>';
            html+='  <img  src="Back/bell2.png" width="26"/>';
            html+=' </button>';
            document.getElementById('bill').innerHTML =html;
        }
        else
        {
            html+=' <button > ';
            html+='  <img  src="Back/bell.png" width="26"/>';
            html+=' </button>';
            document.getElementById('bill').innerHTML =html;

        }

        $.UserStatusNotification();
        if(1==BillControl && BildirimControl==0){

            BillStatus();


        }
        BildirimControl==false;

        if(BildirimControl==0){
            tell();

        }

        sayac=0;

    });

})
function tell(){

        var html2 = ' ';
        html2+='<table width="100%" style="margin-bottom: 15px"><tr ><td width="20%" height="25px" valign="center"><button id="SearchfrendsListofff"><i style="padding:0px" class="fas fa-angle-left fa-2x"></i></button></td><td valign="center" align="center"> <p style="margin-left: -50px;font-weight: bold">Bildirimler</p></td></tr> </table>';
        var tirnak="'";
if(userwants.length==0){

    html2+= '<h4 align="center" style="color: white">Bildiriminiz Bulunamadı.</h4>' ;

}
        for (var i = 0; i < userwants.length; i++) {

            if(i!=0 && userwants[i]!=userwants[i-1]) {


                html2 += '<div id="' + userwants[i] + '" class="isteklistesi"><table width="100%"><tr><td width="60%">' + userwants[i] + '</td><td><button  style="width: 25px" onclick="userrequestconfirmation(' + tirnak + userwants[i] + tirnak + ')"><i  class="fas fa-check"></i></button></td><td><button style="width: 25px" onclick="userrequestcondelete(' + tirnak + userwants[i] + tirnak + ')"><i class="fas fa-minus "></i></button></td></tr></table></div>';
            }
            else if(i==0){


                html2 += '<div id="' + userwants[i] + '" class="isteklistesi"><table width="100%"><tr><td width="60%">' + userwants[i] + '</td><td><button  style="width: 25px" onclick="userrequestconfirmation(' + tirnak + userwants[i] + tirnak + ')"><i  class="fas fa-check"></i></button></td><td><button style="width: 25px" onclick="userrequestcondelete(' + tirnak + userwants[i] + tirnak + ')"><i class="fas fa-minus "></i></button></td></tr></table></div>';


            }


        }
    document.getElementById('BillNotification_').innerHTML = " ";
    document.getElementById('BillNotification_').innerHTML = html2;


             userS=0;


}




function BillStatus(){

if(BildirimControl!=true)
    {


        userwants.forEach(function (item) {

            firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(item).child("Bill").set(1);


        })
    }



}

function userrequestconfirmation(Name) {

    BildirimControl=1;
    document.getElementById(Name).innerHTML = " ";
    firebase.database().ref("UserFriendRequestList").child(Name).child(SessionUserName).child("Status").set(2);
    firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(Name).child("Status").set(2);

}

function userrequestcondelete(Name) {

    BildirimControl=1;
    document.getElementById(Name).innerHTML = " ";
     firebase.database().ref("UserFriendRequestList").child(SessionUserName).child(Name).remove();
    firebase.database().ref("UserFriendRequestList").child(Name).child(SessionUserName).remove();

}















