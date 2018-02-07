<!DOCTYPE html>
<html>
<style>
body{
  background-color: black;
  font-family: monospace;
  color: white;
}

#rcorners1 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 300px;
    height: 50px;
    text-align: center;
    color: white;
  }
</style>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
  </head>

  <body>
    <?php
      require_once("functions.php"); // THIS IS THE CONNECT TO DATABASE FILE //
      // Collects the data from the index.php submit //
      $title = $_POST['title'];
      $content = $_POST['content'];
      $id = $_POST["id"];
      $date = $_POST["date"];
      $tag = $_POST["tag"];
      $table = "Notes";

      // Insert stuff from the note in database //
      if ($id == -1) {
        $sql = "INSERT INTO $table (`date`, `title`, `content`) Values ('$date', '$title', '$content')";
        mysqli_query($link, $sql);
        $sql = "INSERT INTO `Pivots` (`note_id`, `tag_id`) Values ((SELECT `id` FROM `Notes` WHERE (`title` = '$title')), (SELECT `id` FROM `Tags` WHERE (`tag` = '$tag')))";
        mysqli_query($link, $sql);
        echo "Upload succes!" . "</br>";
      }
      // Updates stuff from the note in database //
      else {
        $sql = "UPDATE $table SET `title` = '$title', `content` = '$content', `date` = '$date' WHERE (`id` = '$id')";
        mysqli_query($link, $sql);
        $sql = "UPDATE `Pivots` SET `note_id` = (SELECT `id` FROM `Notes` WHERE (`title` = '$title')), `tag_id` = (SELECT `id` FROM `Tags` WHERE (`tag` = '$tag'))";
        mysqli_query($link, $sql);
        echo "Update succes!" . "</br>";
      }
    ?>
    <p id="rcorners1">
    <a href="search.php">Go to search.</a><br>
    <a href="notesindex.php">Upload another text.</a>
    </p>
  </body>
</html>
