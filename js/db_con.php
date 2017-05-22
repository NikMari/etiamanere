<?php 
define('DB_HOST', '89.46.111.43'); 
define('DB_NAME', 'Sql1095191_1'); 
define('DB_USER','Sql1095191'); 
define('DB_PASSWORD','w6l5v14c77'); 

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

function newuser() { 
$username = $_POST['username']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$query = "INSERT INTO users (username,email,pass) VALUES ('$username','$email','$password')"; 
$data = mysql_query ($query)or die(mysql_error()); 
if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } 

} 

function SignUp() { 

if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 

{ 

$query = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error()); 

	if(!$row = mysql_fetch_array($query) or die(mysql_error())) { 
	
		newuser();
	
	} 
	
	else { 
	
		echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
	} 
} 
} 
	
	if(isset($_POST['submit'])) 
	
	
	{ 
	
		SignUp(); 
	
	} 

?>


