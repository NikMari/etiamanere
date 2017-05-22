<?php 

define('DB_HOST', '89.46.111.43'); 
define('DB_NAME', 'Sql1095191_1'); 
define('DB_USER','Sql1095191'); 
define('DB_PASSWORD','w6l5v14c77'); 

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$select_db = mysqli_select_db($con,DB_NAME);
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($con));
}


?>


