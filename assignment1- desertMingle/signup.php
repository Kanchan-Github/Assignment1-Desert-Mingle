<?php 
require "header.php";
?>

<main>
<h1>Sign UP</h1>
// display error message to fill in all fields
<?php
if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo'<p Class = "signuperror">Fill in all fields!</p>';
    }
}
elseif($_GET["signup"] == "success"){
    echo'<p Class="signupsuccess">Signup Successful!</p>';
}
<form action="includes/signup.inc.php" method="POST">
<input type="text" name="username" placeholder="username"><br>
<input type="text" name="email" placeholder="email"><br>
<input type="password" name="password" placeholder="password"><br>
<button type="submit" name="signup-submit">Signup</button>

</form>
</main>

<?php 
require "footer.php";
?>