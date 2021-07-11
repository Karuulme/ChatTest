function init() {
    var firebaseConfig = {
        apiKey: "AIzaSyCCYe66t-OYZo4saKb1VbvMOiJlyTNNx8Y",
        authDomain: "bvm-v1.firebaseapp.com",
        projectId: "bvm-v1",
        storageBucket: "bvm-v1.appspot.com",
        messagingSenderId: "543865758536",
        appId: "1:543865758536:web:85b787acd9e5d1e243497d"
    };
    firebase.initializeApp(firebaseConfig);

    ref=firebase.database().ref("messages");
    refUser=firebase.database().ref("User");
    firebase.database().ref("messages").on("child_added",(snapshot)=>{
        var html='';
        if(snapshot.val().sender==myName){
            html+= '<li class="message mine">';
            html+= '<p class="text">'+snapshot.val().message+'</p>';
            html+= '<span class="date">'+tarihCevir(snapshot.val().time)+'</span>';
            html+= '</li>';
        }else{
            html+= '<li class="message">';
            html+= '<p class="text">'+snapshot.val().message+'</p>';
            html+= '<span class="date">'+tarihCevir(snapshot.val().time)+'</span>';
            html+= '<span class="sender">'+snapshot.val().sender+'</span>';
            html+= '</li>';
        }
        messages.innerHTML+=html;
        messages.scroll({behavior:"smooth",top:999999999999999999999});

    });
}

function sohbeteBasla() {
    myName = nameInput.value;

    if (myName.length > 0) {
        console.log(myName);
        login.classList.add("hidden");
        init();

    }
    document.getElementById("SohbetName").innerText="BvM v1.0 Hoşgeldin : "+myName;
}

function tarihCevir(stamp){
    var dt= new Date(stamp);
    var s= "0"+dt.getHours();
    var d= "0"+dt.getMinutes();
    var format=s.substr(-2)+":"+d.substr(-2);
    return format

}
window.onkeydown=function(olay) {
    if (olay.keyCode == 13) {



        mesajGonder()



    }
}
function  MesajKontrol(){
    var msg = document.getElementById("myInput").value;
    for(var i=0;i<msg.length;i++){
        if(msg[i]!=" "){

            return true;

        }



    }



}



function mesajGonder() {

    if(MesajKontrol()){



        var msg = document.getElementById("myInput").value;
        if (msg.length > 0) {
            ref.push().set({
                sender:myName,
                message:msg,
                time:firebase.database.ServerValue.TIMESTAMP

            })
            refUser.push().set({
                FirsName:"Muhammet",
                LastName:"Karul",
                Ip:1054556456

            })

        }

        document.getElementById("myInput").value="";


    }

}



var login = document.querySelector(".login");
var nameInput = document.getElementById("myName");
var messages = document.querySelector(".messages");
messages.innerHTML="";
var myName = "";
var ref;



var input = document.getElementById("txtAdi");
input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("myBtn").click();
    }
});















