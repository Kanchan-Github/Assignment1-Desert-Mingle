<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';
    //allow user to either use username or email to signup 
    $mailuid = $_POST['email'];
    $password = $_POST['password'];

    if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
    }
    else{
        $sql = "SELECT * FROM User WHERE user_id=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
    exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc()) {
                //verify is the password matches
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    //start session
                   session_start();
                   $_SESSION['userId'] = $row['user_id'];
                   $_SESSION['username'] = $row['username'];
                   header("Location: ../index.php?login=success");
                   exit();
                }
            }
            else {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        }
    }

}
else{
    header("Location: ../index.php?");
    exit();
}