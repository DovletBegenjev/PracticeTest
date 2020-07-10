<?php

//$connect_str="host=localhost dbname=db_18168643 user=root password=220597";

$db = mysqli_connect('172.23.64.64','18168643', '220597');
//$db = mysqli_connect('localhost','root', '');
mysqli_set_charset($db, "utf8");
mysqli_select_db($db,'db_18168643');

?>
		

 



