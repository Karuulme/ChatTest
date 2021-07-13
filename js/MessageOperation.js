var Target="";
var isim="";

var saat =0;
var aygun=0;
let now = new Date();
var ay=now.getMonth()+1;
var tarih="";
$(document).ready(function() {
    $("#submit").click(function (){

            if(isim.length!=0){

                var mesaj=$( "#Mesajtext" ).val();
                $.ajax({
                    type: "POST",
                    url: 'Message.php',
                    data: {SessionUserName,isim,mesaj,Target},
                    success: function (data) {
                        //  console.log(data)


                    }
                })



            }




    })

    $("#FriendList").on("click","button",function () {

        var a = $(this).text();
        isim = a.trim();


        var todoRef2 = firebase.database().ref().child("UserFriendRequestList").child(SessionUserName).child(isim);

        todoRef2.on("value", function (item) {


            Target = item.val().messageoperation;


        })





        var message = firebase.database().ref().child("message").child(Target);

        message.on("value",function (item){
            document.getElementById('MessageBox').innerHTML =" ";
            var html='';
            var tarihcontrol=0;
                item.forEach(function (t){

                    tarih = (t.val().Date).split(" ");


                    console.log(aygun[1]+"<"+ay+"---"+aygun[0]+"<"+now.getDate());

                  saat =tarih[1].split(":");
                     aygun=tarih[0].split(".");




                    if(t.val().Donor==SessionUserName){

                        html+=' <div id="mesajkutu">';
                        html+=' <span className="mesajyeri-right">'+t.val().Message+'</span>';
                        html+='<div class="messageDate">'+saat[0]+":"+saat[1]+'</div>';
                        html+=' </div>';
                    }
                    else {
                        html+='  <div id="mesajkutu2">';
                        html+='  <span className="mesajyeri-left">'+t.val().Message+'</span>';
                        html+='<div class="messageDate">'+saat[0]+":"+saat[1]+'</div>';
                        html+=' </div>';



                    }})


            if(aygun[1]<=ay && aygun[0]<now.getDate()) {

                tarihcontrol=1;
                html+='<h4 align="center" style="color: white">Dün ve öncesi</h4>';
            }

            document.getElementById('MessageBox').innerHTML =html;



            /*
        $(".list").animate({ scrollTop: $(".list").height() }, 1);

*/






        })



    })




})




