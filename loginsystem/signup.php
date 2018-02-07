<!DOCTYPE html>
<style>
#rcorners1 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 40px;
		font-family: monospace;
		text-align: center;
		font-size: 40px;
		color: white;
		position: absolute;
    left: 10px;
    top: 65px;
	}

	#rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 250px;
		position: absolute;
		font-family: monospace;
		color: white;
		font-size: 40px;
    left: 10px;
    top: 150px;
	}

</style>
</html>

<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<p id="rcorners1">Signup</p>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<p id="rcorners2">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Signup</button>
		</p>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php'
?>
