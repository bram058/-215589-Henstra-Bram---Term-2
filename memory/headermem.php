<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="cssmem.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="KiesMode.php">Home</a></li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])) {
					 	echo '<form action="memincludes/logoutmem.inc.php" method="POST">
				 			<button type="submit" name="submit">Logout</button>
						</form>';
					} else {
						echo '<form action="memincludes/loginmem.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signupmem.php">Signup</a>';
					}
			 ?>
			</div>
		</div>
	</nav>
</header>