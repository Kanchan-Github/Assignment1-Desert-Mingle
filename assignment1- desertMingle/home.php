<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include "profile.php";
    ?>
// Show Information about currently logged in user
    <h1>Your Bio</h1>
    <p> Hello <?php echo $_POST["name"]; ?></p>
    <p> Your Favourite Desserts are  <?php echo $_REQUEST["Dessert[]"]; ?></p>
    <p>
    <?php 
    if (isset($_POST ["dessert"])){
        $dessert_array = $_POST ["dessert"];
        if (count($dessert_array) >1)
            echo" Your favourite dessert are:";
            
            // Display the selected dessert from the database
            $sql = 'SELECT id, title FROM Dessert';
   mysql_select_db('ITECH_30344274_a1');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "id :{$row['id']}  <br>
         title : {$row['title']} "
   }
        else {
            echo" Your favourite dessert is not entered";
    }
        mysql_close($conn);
        ?>
    

</body>
</html>