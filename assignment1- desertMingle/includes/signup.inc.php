<?php
if(isset($_POST['signup-submit'])){

  require 'dbh.inc.php';
  
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Input fieilds validation

//reject empty fields

if ((empty($username) || (empty($email) || (empty($password)) {
header("Location: ../signup.php?error=emptyfields");
exit();
}
//check valid username and valid email
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../signup.php?error=invalidmail&uid");
    exit();
// validate email
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup.php?error=invalidmail&uid");
    exit();
}
// validate username
elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
	header("Location: ../signup.php?error=invaliduid&mail=");
    exit();
    //check for duplicate username
    else{
$sql = "SELECT user_id FROM User WHERE user_id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0){
        header("Location: ../signup.php?error=usertaken");
        //shows error if the user is already taken
        exit();
    }
    else{
$sql "INSERT INTO User (username, email, password) VALUES(?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=sqlerror");
    exit();
    }
    else {
        //hashing password
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    header("Location: ../signup.php?signup=success")
    }
}

    }
}
mysqli_stmt_close($stmt);
mysqli_close_($conn);

}
else{
    header("Location: ../signup.php?");
    exit();
}