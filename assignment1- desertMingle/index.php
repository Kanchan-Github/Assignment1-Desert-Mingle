<?php 
require "header.php";
?>

<main>
<div>
<?php
if(isset($_SESSION['userId'])) {
        echo '<p> you are logged in ! </p>'; 
}
else{
    echo '<p> you are logged out !</p>';
}

?>
</div>
</main>

<?php 
require "footer.php";
?>