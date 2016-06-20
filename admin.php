<?php include 'function.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Raleway|Open+Sans' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <div class="container">

      <?php

        /*********************************************************************************************/
          if (isset($_POST['cover_photo']) && isset($_POST["photo1"]) && isset($_POST["bygg_id"]) && !empty($_POST['bygg_id'])) {
            global $mysqli;

            $photo1 = $mysqli->real_escape_string(isset($_POST['photo1']) ? $_POST['photo1'] : '');
            $headline1 = $mysqli->real_escape_string(isset($_POST['headline1']) ? $_POST['headline1'] : '');
            $textbody1 = $mysqli->real_escape_string(isset($_POST['textbody1']) ? $_POST['textbody1'] : '');

            $cover_photo = $mysqli->real_escape_string(isset($_POST['cover_photo']) ? $_POST['cover_photo'] : '');
            $headline = $mysqli->real_escape_string(isset($_POST['headline']) ? $_POST['headline'] : '');
            $textbody = $mysqli->real_escape_string(isset($_POST['textbody']) ? $_POST['textbody'] : '');

            $bygg_id = $mysqli->real_escape_string(isset($_POST['bygg_id']) ? $_POST['bygg_id'] : '');


            if (!empty($_POST['cover_photo'])) {
              if ($mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
                   ('assets/bilder/$cover_photo','$headline','$textbody','$bygg_id','1','')") === true) {
                     echo '<script language="javascript">';
                     echo 'alert("Success")';
                     echo '</script>';
              }else {
                echo "Error!";
              }
            }
            if (!empty($_POST['photo1'])) {
              $mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
                    ('assets/bilder/$photo1','$headline1','$textbody1','$bygg_id','0','')");

            }
          }/***************************************************************************/


          if (!empty($_POST['bygg_id1'])) {
            global $mysqli;

            $bygg_id1 = $mysqli->real_escape_string(isset($_POST['bygg_id1']) ? $_POST['bygg_id1'] : '');

            if ($mysqli->query("DELETE FROM `album` WHERE bygg_id='$bygg_id1'")===true) {
              echo '<script language="javascript">';
              echo 'alert("Success")';
              echo '</script>';
            }else {
              echo '<script language="javascript">';
              echo 'alert("Fel sökväg på fotot eller fel på bygg_id")';
              echo '</script>';
            }
          }
          /***********************/

          if (!empty($_POST['photo2']) && !empty($_POST['bygg_id2'])) {
            global $mysqli;

            $photo2 = $mysqli->real_escape_string(isset($_POST['photo2']) ? $_POST['photo2'] : '');
            $bygg_id2 = $mysqli->real_escape_string(isset($_POST['bygg_id2']) ? $_POST['bygg_id2'] : '');

            if ($mysqli->query("DELETE FROM `album` WHERE bygg_id='$bygg_id2' AND photo='assets/bilder/$photo2'")===true) {
              echo '<script language="javascript">';
              echo 'alert("Success")';
              echo '</script>';
            }else {
              echo '<script language="javascript">';
              echo 'alert("Fel sökväg på fotot eller fel på bygg_id")';
              echo '</script>';
            }
          }
        /*****************/
        ?>



      <div class="laggtill row">
        <form action="admin.php" method="post">
          <h1>Lägg till: <br></h1>
          Start Photo:<br> <input class="file" type="file" name="cover_photo"> <br><br>
          Huvudrubrik <br> (Helst samma som bygg_id):<br> <input type="text" name="headline"> <br><br>
          Start photo text:<br> <textarea name="textbody1" rows="8" cols="40"></textarea> <br><br><br>
          <b>Lägg in ALLA resterande foton här förutom <br> start bilden av Albumet!</b><br><br>
          Photo URL:<br> <input class="file" type="file" name="photo1"> <br><br>
          Photo rubrik:<br> <input type="text" name="headline1"> <br><br>
          Photo text:<br> <textarea name="textbody1" rows="8" cols="40"></textarea> <br><br><br>
          -------------------------------------------------- <br>

          Bygg ID:<br> <input type="text" name="bygg_id"> <br> <br>
          <input class="btn" type="submit" name="submit" value="Submit" > <br>
        </form>
      </div>

      <div class="tabort row">
        <form action="admin.php" method="post">
          <h1>Radera album: <br></h1>
          Bygg ID:<br> <input type="text" name="bygg_id1"> <br> <br>
          <input class="btn" type="submit" name="submit" value="Submit" > <br>
        </form>
      </div>

      <div class="tabort row">
        <form action="admin.php" method="post">
          <h1>Radera bild: <br></h1>
          Foto URL:<br> <input class="file" type="file" name="photo2"> <br> <br>
          Bygg ID:<br> <input type="text" name="bygg_id2"> <br> <br>
          <input class="btn" type="submit" name="submit" value="Submit" > <br>
        </form>
      </div>

      <!--onclick="document.write('<?php remove() ?>');"-->


    </div>


  </body>
</html>
