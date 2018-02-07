<?php
  require_once("functions.php"); // THIS IS THE CONNECT TO DATABASE FILE //
  $remove = isset($_GET['action']) ? $_GET['action'] : -1;
  $id = isset($_GET['id']) ? $_GET['id'] : -1;
  $table = "Notes";
  if ($remove) {
    $sql = "DELETE FROM $table WHERE (`id` = '$id')";
    mysqli_query($link, $sql);
    echo "Removed succesfully";
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
    width: 500px;
    height: 50px;
    font-family: monospace;
    font-size: 35px;
  }

  #rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 750px;
    height: 185px;
    font-family: monospace;
  }
    

z</style>
<head>
<title> My search engine </title>
</head>

<body>
  <form action='results.php' method='POST'>
    <center>
      <p id="rcorners1">My Search Engine</p>
     
      <p id="rcorners2"> 
      <input type='text' size='90' name='search_title'></br></br> From
      <input type='date' name='from_date'> To
      <input type='date' name='to_date'>
      <input type="checkbox" name="check_date">Check if you want to search by date.</br></br>
      <select name="tag" disabled>
        <option value="school">school</option>
        <option value="portal">portal</option>
        <option value="home">home</option>
        <option value="tox">tox</option>
        <option value="ao17">ao17</option>
      </select>
      <input type="checkbox" name="check_tag" disabled>Filtering by tag is currently disabled, we are working on it.</br></br>
      <input type='submit' name='submit' value='Search source code'> </br></br>
      <a href="notesindex.php">Go to start!</a><br>
      <a href="../testpage.html">Go to the homepage</a>
    </center>
  </form>
</p>


</body>
</html>
