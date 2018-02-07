<!DOCTYPE html>
<html>
<style>
body{
  background-color: black;
  font-family: monospace;
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
      $search_title = $_POST["search_title"];
      $from_date = $_POST["from_date"];
      $to_date = $_POST["to_date"];
      $check_date = isset($_POST["check_date"]);
      // $check_tag = isset($_POST["check_tag"]);
      // $tag = $_POST["tag"];
      $table = "Notes";
      $empty = true;

      if (!($check_date)){
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%')";
      }
      elseif ($check_date) {
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%') AND (`date` >= '$from_date') AND (`date` <= '$to_date')";
      }
      /* elseif ($check_tag && !($tag == null)) {
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%') AND (`id` = (SELECT `note_id` FROM `Pivot` WHERE (`tag_id` = (SELECT `Tags.id` FROM `Tags` WHERE (`tag` = '$tag')))))";
      } */

      $result = mysqli_query($link, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        // Puts matches in variables //
        $title = $data["title"];
        $content = $data["content"];
        $id = $data["id"];
        $date = $data["date"];
        $empty = false;

        // Shows the matches //
        echo "Title: ";
        print_r($title);
        echo "</br> Content: ";
        print_r($content);
        echo "</br> Date: ";
        print_r($date);
        echo "<br/><a href=\"index.php?action=edit&id=$id\">Edit</a><br/>";
        echo "<a href=\"search.php?action=remove&id=$id\">Remove</a><br/><br/>";
      }
      
      if ($empty) {
        echo "<a href=\"search.php\">No match found, return to search engine.</a><br>";
        echo "<a href=\"../testpage.html\">Or return the the homepage.</a>";
      }
      else {
        echo "<a href=\"search.php\">Return to search engine.</a><br>";
        echo "<a href=\"../testpage.html\">Or return the the homepage.</a>";
      }
    ?>
  </body>
</html>
