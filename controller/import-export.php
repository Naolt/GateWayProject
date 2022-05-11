<?php
include '../model/database.php';

if(isset($_POST['submit']) && isset($_FILES['import-file'])){
	print_r($_FILES['import-file']);
	$file = $_FILES['import-file']['tmp_name'];
	$file_open = fopen($file,'r');
	$count = 0;
	while(($csv = fgetcsv($file_open,1000,',')) !== false){
		$id = $csv[0];
		$firstName = $csv[1];
		$lastName = $csv[2];
		$gender = $csv[3];
		$level = $csv[4];
		$type = $csv[5];
		$imgUrl = $csv[6];
		$barCode = $csv[7];
		
		if($count!=0){
		$query = "INSERT INTO user values('$id','$firstName','$lastName',
		'$gender',
		'$level',
		'$type',
		'$imgUrl',
		'$barCode')";
		$result;
	if($result = mysqli_query($connection,$query)){
		echo 'query excuted successfully';
	}else{
		die('query not executed');
	}	
	
	}
		$count++;
	}

}
?>
