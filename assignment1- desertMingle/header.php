<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <a href="#">
    <img src="img/logo.png" alt="logo">
    </a>
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Portfolio</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
    </ul>
    <div>
    <h1>Login</h1>
    <?php
    if(isset($_SESSION['userId'])) {
        echo '<form action="includes/logout.inc.php" method ="post">
        <button type="submit" name="logout-submit">Logout</button>
        </form>';
    }
    else{
        echo '<form action="includes/login.inc.php" method ="post">
        <input type="text" name="username" placeholder="username"><br>
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit" name="login-submit">Login</button>
        </form>
        <a href="signup.php">Sign up</a>';
    }
    ?>
    
    
    </div>

    </header>
</body>
</html>