<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Etiamanere - Your Digital Trainer</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    

    <!-- Theme CSS -->
    <link href="css/etiamanere.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	
	<!-- PHP -->
    
    

    
    
    <!--PHP -->
    
    
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand page-scroll" href="http://etiamanere.com">
                    <i class="fa fa-envira"></i><span class="light">ETIAMANERE</span>
                </a>
            </div>
                        
        <!-- /.container -->
    </nav>
    
 <?php
	
	
	require('db_sel.php');
	
	$young = "";
	$exusername = "";
	$exemail = "";
	$expassword = "";
	$exconfirm = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// If the values are posted, insert them into the database.
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			$age = $_POST['age'];
			$verifyusername = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
			$verifyemail = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
			
	 
	 		if ($age >= 16 && $age <= 100 && !empty($username) && !empty($email) && !empty($password) && $password == $confirm) {
				$query = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$password', '$email')";
				$result = mysqli_query($con, $query);
				if($result){
					header("Location: thanks.php");
				}
				
			}

		// Filters.
		
		if (empty($age)) { $young = "Insert Age"; } else if($age >= 100) {$young = "You are too older";} else { if($age < 16) {$young = "You are too young";} }
		
		
		if (empty($username)) { $exusername = "Insert Username";} 
			else if (!preg_match("/^[a-z\d_]{2,20}$/i",$username)) {$exusername="Please enter a valid Username";} 
			else { if(mysqli_num_rows($verifyusername) >=1  ) {$exusername = "Username Already Taken";} }
		
		
		if (empty($email)) { $exemail = "Insert Email"; } 
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {$exemail="Invalid email";} 
			else { if(mysqli_num_rows($verifyemail) >=1  ) {$exemail = "Email Already Taken";} }
		
		
		if (empty($password)) {$expassword = "Insert Password";}
		
		
		if($confirm != $password) {$exconfirm = "Invalid Password";}
		
	}
	  
 ?>    


    <!-- About Section -->
    <section id="register" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>SIGN UP</h2>
 
 <div id="Sign-Up">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<h4>Age</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control text-center" type="number" name="age" required></div><div class="col-sm-4"></div>

<p><?php echo $young; ?></p>

<br><br>

<hr>
<h4>Username</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control" type="text" name="username" required></div><div class="col-sm-4"></div>

<p><?php echo $exusername; ?></p>

<br><br>

<hr>
<h4>Email</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control w50" type="text" name="email" required></div><div class="col-sm-4"></div>

<p><?php echo $exemail; ?></p>

<br><br>

<hr>
<h4>Password</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control w50" type="password" name="password" required></div><div class="col-sm-4"></div>

<p><?php echo $expassword; ?></p>

<br><br>

<hr>
<h4>Confirm Password</h4>


<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control" type="password" name="confirm" required></div><div class="col-sm-4"></div>

<p><?php echo $exconfirm; ?></p>

<br><br><br>

<input class="btn btn-default"id="button" type="submit" name="submit" value="Sign-Up">

</form>
</div>
 
 
            </div>
        </div>
    </section>

    

  
<?php include('footer.php') ?>
