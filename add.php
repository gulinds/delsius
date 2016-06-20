<?php
    global $mysqli;

    $photo1 = (isset($_POST['photo1']) ? $_POST['photo1']: '');
    $headline1 = (isset($_POST['headline1']) ? $_POST['headline1']: '');
    $textbody1 = (isset($_POST['textbody1']) ? $_POST['textbody1']: '');

    $cover_photo = (isset($_POST['cover_photo']) ? $_POST['cover_photo']: '');
    $headline = (isset($_POST['headline']) ? $_POST['headline']: '');
    $textbody = (isset($_POST['textbody']) ? $_POST['textbody']: '');

    $bygg_id = (isset($_POST['bygg_id']) ? $_POST['bygg_id']: '');

    /*if (!empty($_POST['cover_photo'])) {
      if ($mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
           ('$cover_photo','$headline','$textbody','$bygg_id','1','')") === TRUE) {
        echo "Succeded";
        header('Location: admin.php');
      }else {
        echo "Error!";
      }
    }*/
    if (!empty($_POST['cover_photo'])) {
      $mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
           ('$cover_photo','$headline','$textbody','$bygg_id','1','')") ;
           header('Location: admin.php');

    }

    /*if (!empty($_POST['photo1'])) {
      if (  $mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
              ('$photo1','$headline1','$textbody1','$bygg_id','0','')") === true) {
        echo "Success";
        header('Location: admin.php');
      }
    }*/

    if (!empty($_POST['photo1'])) {
      $mysqli->query("INSERT INTO album(photo,headline,textbody,bygg_id,state,id) VALUES
              ('$photo1','$headline1','$textbody1','$bygg_id','0','')");
    }
?>
