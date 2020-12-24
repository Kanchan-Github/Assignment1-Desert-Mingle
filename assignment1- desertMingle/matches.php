<?php
session_start();
include "includes/dbh.inc.php":
$username = $_SESSION['login-username'];
include "header.php";
?>

// finding matches

<?php
$username = $_SESSION['login-username'];
$userId = $_SESSION['user_id'];
$sql = "SELECT User.name, user-profile, GROUP_CONCAT(dessert.title) AS interests,Count(dessert.title) as ndessert
        from User join likes on users.id
        = likes.user_id join dessert on dessert.id = likes.dessert_id join users on users.id = likes.user_id
        where users.name = '$username') and users.id NOT IN (SELECT to_user_id from Message WHERE from_user_id = $userId)
        GROUP BY users.name ORDER BY (ndessert) DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    print"{
}