<?php include 'function.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  <body>


    <?php
      if (isset($_POST["state"]) && isset($_POST["photo"]) && isset($_POST["bygg_id"]) &&
      !empty($_POST["state"]) && !empty($_POST["photo"]) && !empty($_POST["bygg_id"]) ) {
        global $mysqli;
        $state = $mysqli->real_escape_string($_POST['state']);
        $photo = $mysqli->real_escape_string($_POST['photo']);
        $bygg_id = $mysqli->real_escape_string($_POST['bygg_id']);
        echo "$photo";
          $mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
           ('$photo','dvs','zczx','$bygg_id','$state','')");


      }else {
        echo "wrong";
      }
    ?>



    <form action="admin.php" method="post">
      State:<br> <input type="text" name="state"> <br><br>
      Photo URL:<br> <input type="text" name="photo"> <br><br>
      Bygg ID:<br> <input type="text" name="bygg_id"> <br> <br>
      <input type="submit" name="submit" value="Submit"> <br>
    </form>


  </body>
</html>
