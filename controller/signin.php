
<?php
include '../controller/session.php';
include '../model/database.php';

if(isset($_POST['submit'])){
	$loginType = $_POST['login-type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query  = "SELECT * From $loginType  where username = '$username' and password = '$password '";
	$result = mysqli_query($connection,$query);
	if(mysqli_num_rows($result) == 1){
		$_SESSION['username'] = $username;
		echo $_SESSION['username'];
		echo "session variables are set";
			if($loginType == 'admin'){
			header("Location: ../view/pages/admin-account.php");
			}else{
				header("Location: ../view/pages/reception_search.html");
			}
		}else{
		header("Location: ../index.html");
	}
		echo "<br>".mysqli_num_rows($result)."<br>";
	while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		echo "ID :{$row1['ID']}    "."   Firstname:{$row1['firstName']}<br>";
	}
}

?>