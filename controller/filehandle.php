<?php

$filename = "groupmemebers.txt";
if (!file_exists($filename)) {
    die("The file $filename does not exist.");
}

$f = fopen($filename, 'r');
if ($f) {
    // process the file
    // ...
//     echo 'The file ' . $filename . ' is open <br>';
//     while($str = fgets($f) !== false){
// // reading
// }
$str = file($filename);
	fclose($f);
}
echo $str[0];
e

?>