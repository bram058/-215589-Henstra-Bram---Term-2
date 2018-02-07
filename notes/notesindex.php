<?php
  require_once("functions.php"); // THIS IS THE CONNECT TO DATABASE FILE //
  $title = '';
  $content = '';
  $value = '';
  $id = null;
  $date = null;
  // still need to work on tags //

  $editmode = isset($_GET["action"]) && $_GET["action"] == 'edit';
  $id = isset($_GET['id']) ? $_GET['id'] : -1;
  if ($editmode) {
    $table = "Notes";
    $sql = "SELECT * FROM $table WHERE (`id` = '$id')";
    $result = mysqli_query($link, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
      $id = $data["id"];
      $content = $data["content"];
      $title = $data["title"];
    }
  }
 ?>

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
    width: 680px;
    height: 265px;
    font-family: monospace;
    color: white;
  }

  #rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 300px;
    height: 45px;
    font-family: monospace;
    text-align: center;
    color: white;
  }


</style>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome">
</head>
<body>

    
    <form method="post" action="notes.php">
    <p id="rcorners1"><font size="5"> Upload Form </font><br><br>
    <input type="text" value="<?=$title?>" name="title" placeholder="title"><br>
    <input type="hidden" value="<?=$id?>" name="id"><br>
    <textarea name="content" rows="8" cols="80" placeholder="text input area"><?= $content ?></textarea>
    <select name="tag" size="6">
    <option disabled>TAGS</option>
    <option value="school">school</option>
    <option value="portal">portal</option>
    <option value="home">home</option>
    <option value="tox">tox</option>
    <option value="ao17">ao17</option>
    </select> </br>
    <input type="date" name="date" value="<?= $date ?>"><br>
    <button type="submit">Submit</button>
  </form>
  </p>
 
 <p id="rcorners2"><a href="search.php">Go to searching</a><br>
 <a href="../testpage.html">Go to the homepage</a>

 </p>
</body>
</html>
