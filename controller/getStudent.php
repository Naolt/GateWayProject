<?php

include "../model/database.php";

// accepting json format
$dataJson=json_decode($_GET['q']);

// if the object is NULL
if(!$dataJson){
	$query = "SELECT * FROM user " ;

}else{
	//  if the object has a value
	
	$type = $dataJson->type;
	$value = $dataJson->value;
	// check search type
	$condition = ($type=="firstName")?$value.'%':$value;
	
$query = "SELECT * FROM user where lower($type) like '$condition'";
	

}
$result = mysqli_query($connection,$query);
$content = '';
while($std = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$content .= "
	<ul class='list-content'>
	<li><img src='../images/profile.png' alt='profile'></li>
	<li class='user-name'>
		{$std['firstName']} {$std['lastName']}
	</li>
	<li class='user-id '>
		{$std['ID']}
	</li>
	<li class='user-gender '>
		{$std['gender']}
	</li>
	<li class='user-level '>
		{$std['level']}
	</li>
	<li class='actions '>
		<img src='../images/sidemore.png ' alt='menu ' id='three-dots-{$std[ 'ID']} ' onmouseover='openmenu(this.id) '>
<div class='menu-choice ' id='{$std['ID']}' onmouseleave='closemenu(this.id) '>
	<div class='choice1 '>View profile</div>
	<div class='choice2 '>Edit profile</div>
</div>

</li>
</ul>
	
	";
}

echo $content;
?>
