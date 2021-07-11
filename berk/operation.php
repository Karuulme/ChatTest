<?php
include('firebase_connection.php');

#Kayıt Ekleme
if (isset($_POST['kayit'])) {

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $number = $_POST['number'];

    $data = [
        'Name' => $name,
        'Mail' => $mail,
        'Password' => $number
    ];

    $table = "UserList";
    $database->getReference($table)->push($data);
}

#Kayıt Silme
if (isset($_POST['delete'])) {
    
    $del_id = $_POST['delete'];

    $ref_table = 'users/' . $del_id;
    $database->getReference($ref_table)->remove();
}
header("Location:index.php");
