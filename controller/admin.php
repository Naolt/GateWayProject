<?php
include '../model/database.php';

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query  = "SELECT EXISTS(SELECT * From user where ID=1)";
	$result = mysqli_query($connection,$query);
	while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		// echo "ID :{$row1['ID']} <br>".
		// "First Name :{$row1['firstName']}";
		// ;
		echo $row1;
	}
}
?>