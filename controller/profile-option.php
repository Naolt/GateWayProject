<?php
include "../model/database.php";

// header("Location: ../view/pages/view-profile.html");
print_r($_POST);


if(isset($_POST['view'])){
	echo $_POST['stdid'] . "For View";
	$stdID = $_POST['stdid'];
	$_COOKIE['id'] = $stdID;
	echo "here \n";
// fetch the users profile
	$query = "SELECT * FROM user WHERE ID='$stdID'";
	echo $query;
	$result = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($result);
	
	header("Location: ../view/pages/view-profile.php?id=".$stdID);
}elseif(isset($_POST['edit'])){
	echo $_POST['stdid'] . "For Edit";
	$stdID = $_POST['stdid'];
}elseif(isset($_POST['delete'])){
	$query = "delete";
}




?>