<?php

include "../model/database.php";

// accepting json format
$dataJson=json_decode($_GET['q']);

// if the object is NULL
if(!$dataJson){
	$query = "SELECT * FROM user where type = 'student' order by firstName ASC" ;

}else{
	//  if the object has a value
	
	$type = $dataJson->type;
	$value = $dataJson->value;
	$sortBy = $dataJson->sortBy;
	$sortType = $dataJson->sortType;
	// check search type
	$condition = ($type=="firstName")?$value.'%':$value;
	
$query = "SELECT * FROM user where lower($type) like '$condition' and type = 'student' ORDER BY $sortBy $sortType";
	

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
                                            <img src='../images/sidemore.png ' alt='menu ' id='three-dots-'.{$std[ 'ID']} onmouseover='openmenu(this.id) '>
                                    <div class='menu-choice ' id='form-'.{$std[ 'ID']} onmouseleave='closemenu(this.id) '>
                                        <form class='choice1 ' action='../../controller/profile-option.php' method='post'>
                                            <input class='dot-menu-hidden' type='text' name='stdid' value={$std[ 'ID']} >
                                            <input type='submit' name='view' value='View profile'>
                                        </form>
                                        <form action='../../controller/profile-option.php' method='post' class='choice1 '>
                                            <input class='dot-menu-hidden' type='text' name='stdid' value={$std[ 'ID']} >
                                            <input type='submit' name='edit' value='Edit profile'>
                                        </form>


                                    </div>

                                    </li>
</ul>
	
	";
}

echo $content;
?>
