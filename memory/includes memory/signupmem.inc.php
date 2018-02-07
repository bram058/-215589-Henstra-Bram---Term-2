<?php 
print_r($_POST);
if (isset($_POST['submit'])) {
	
	include_once 'dbhmem.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check for empty fields
	if (empty($uid) || empty($pwd)) {
		header("Location: ../signupmem.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signupmem.php?signup=invalid");
			exit();
		} else {
			
				if ($resultCheck > 0) {
					header("Location: ../signupmem.php?signup=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_uid, user_pwd) VALUES ('$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../signupmem.php?signup=succes");
					exit();
				}
			}
		}
	}

 else {
	header("Location: ../signupmem.php");
	exit();
}

