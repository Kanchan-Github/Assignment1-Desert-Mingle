<?php
session_start();
require("db.php");
$user_id = $_SESSION['user_id'];
$toUser = $_POST['toUser'];
$messsage = $_POST['message'];
if($_POST['toUser'] && $_POST['message']){
    $query = " INSERT INTO message(from_user_id, to_user_id, message_date, text) VALUES
    ($userId,(SELECT id from users where name = '$toUser'), DEFAULT,'$message');";
    mysqli_query($conn, $query);
}
header ("Location: ../message.php")

//list all the messages from other users
$query = "SELECT * FROM MESSAGES Where to_user_id= loggedinuserid";
mysqli_query($conn, $query);





?>

