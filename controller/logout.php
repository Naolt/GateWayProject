
<?php
include '../controller/session.php';
include '../model/database.php';

if(isset($_POST['submit'])){
	if(isset($_SESSION['username'])){
		session_unset();
		session_destroy();
		echo "session variables are unset";
		
		header("Location: ../index.html");
	}else{
		echo "No one logged in";
	}
	}

?>