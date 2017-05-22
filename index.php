<?php
	
	session_start();
    define('base_url', 'http://etiamanere.com');
	$etiamanere = "ETIAMANERE";
	
	if (isset($_SESSION["username"])) {

		include('layoutlogged.php');	

	} else {
		
		include('layout.php');
	
	}
	
?> 
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">
                        
                        <?php
								
								echo $etiamanere;
							
							?>
                        
                        </h1>
                        <p class="intro-text">Your Digital Trainer</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About Etiamanere</h2>
                <p>Etiamanere is the best way to obtain fast results on your body. Choose your mass or definition program, set your body details and download the Etiamanere Program good for you. Our training card includes a workout program matched with a diet.</p>
            </div>
        </div>
    </section>

<?php if (isset($_SESSION["username"])) {

		include('start.php');	

	} else {
		
		include('signup.php');
	
	} ?>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Etiamanere</h2>
                <p>Mail and Social:</p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-envelope fa-fw"></i> <span class="network-name">Mail</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                </ul>
                <p>View how is structured the project!</p>
                   <ul class="list-inline banner-social-buttons">
         
                    <li>
                        <a href="https://github.com/NikMari/etiamanere" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">GitHub</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </section>

<?php include ('footer.php') ?>
