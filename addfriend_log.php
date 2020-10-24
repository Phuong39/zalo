<?php

$servername = "localhost";
$username = "zalov2phan32f7";
$password = "ec0bc410e86b01b6";
$db = "zalov2_phan_32f7";


// Create connection
$conn = new mysqli($servername, $username, $password , $db);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_user = $_POST['id_user'];
$id_profile = $_POST['id_profile'];
$phone = $_POST['phone'];
$status = $_POST['status'];
$currentDateTime = new DateTime();
$sql = "INSERT INTO `dataaddfriend` (`user_id`, `id_profile`, `phone`, `status`, `date_add`) VALUES ('".$id_user."','".$id_profile."','".$phone."','".$status."','".$currentDateTime->format("Y-m-d H:i:s")."')";
$conn->query($sql);
file_put_contents('result.txt', json_encode($_POST['result']));