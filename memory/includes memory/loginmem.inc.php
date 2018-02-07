<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbhmem.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../KiesMode.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../KiesMode.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../KiesMode.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Login in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../KiesMode.php?login=succes");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../KiesMode.php?login=error");
	exit();
}

 