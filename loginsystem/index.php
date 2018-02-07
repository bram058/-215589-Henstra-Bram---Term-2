<!DOCTYPE html>
<style>
#rcorners1 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 30px;
		font-family: monospace;
		text-align: left;
		color: white;
		position: absolute;
    left: 10px;
    top: 150px;
	}

	#rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 40px;
		position: absolute;
		font-family: monospace;
		color: white;
		text-align: center;
		font-size: 40px;
    left: 10px;
    top: 65px;
	}

</style>
</html>


<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<p id="rcorners2">Home</p>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo '<p id="rcorners1">';
				echo "You are logged in! </br>";
				echo "You can now ";
				echo '<a href="testpage.html">click here </a>';
				echo "to acces the main site. ";
				echo "</p>";

			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php'
?>
