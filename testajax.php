<?php 
 $userName = $_REQUEST["username"];
// // sleep(5);
// echo "Xin chao $userName!"
include_once("model/user.php");

$user = new User($userName, "123", "Minh Vo");
$jsonUser = json_encode($user);
echo $jsonUser;
?>

