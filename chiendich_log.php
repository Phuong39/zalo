<?php
$servername = "localhost";
$username = "zalov2phan32f7";
$password = "ec0bc410e86b01b6";
$db = "zalov2_phan_32f7";


// Create connection
$conn = new mysqli($servername, $username, $password , $db);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = json_decode($_GET['data']);

file_put_contents('aaa.txt', $data);
$sql = "INSERT INTO `chiendich_log` (`id_chiendich`,`name`,`user_id`,`id_profile`,`status`) VALUES('".$data->id_chiendich."','".$data->name."','".$data->id_user."','".$data->id_profile."','".$data->status."')";
$result = $conn->query($sql);