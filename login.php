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
	
	session_start();
	require('db_sel.php');
	$wrong = "";
	
	if(!isset($_SESSION["username"])) {
		
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			$username = mysqli_real_escape_string($con, $_POST['username']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ") or DIE('Errore'.mysqli_error());
			
			if(mysqli_num_rows($query) != 0) {      
				$row = mysqli_fetch_assoc($query);
				$cod = $row['username'];
				$_SESSION["username"] = $username;  
				$_SESSION["cod"] = $cod;
				header("location:index.php");
				exit();
			 } else{
				$wrong = "Invalid data";
			}
		
		}
	
	} else {
	
		header("location:index.php");
		
	
	}
	  
 ?>    


    <!-- About Section -->
    <section id="register" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>SIGN IN</h2>
 
 <div id="Sign-In">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<hr>
<h4>Username</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control" type="text" name="username" required></div><div class="col-sm-4"></div>

<br><br>
<hr>
<h4>Password</h4>

<div class="col-sm-4"></div><div class="col-sm-4"><input class="form-control w50" type="password" name="password" required></div><div class="col-sm-4"></div>

<p><?php echo $wrong ?></p>

<br><br><br>

<input class="btn btn-default"id="button" type="submit" name="submit" value="Sign-In">

</form>
</div>
 
 
            </div>
        </div>
    </section>

    

  
<?php include('footer.php') ?>
