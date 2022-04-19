
<?php
echo "ddd";
session_start();
include '../model/database.php';

if(isset($_POST['submit'])){
	$loginType = $_POST['login-type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query  = "SELECT * From admin where username = '$username' and password = '$password '";
	$result = mysqli_query($connection,$query);
	while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		if(mysqli_num_rows($result) == 1){
			header("Location: ../view/pages/admin-account.html");
		}
		echo "ID :{$row1['ID']}";
	}
}

?>