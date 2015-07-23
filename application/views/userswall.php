<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="devdutt sharma">

    <title>Users Book</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo CSS_PATH ?>bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo CSS_PATH ?>main.css" rel="stylesheet">
    <link href="<?php echo CSS_PATH ?>custom.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
	<script src="<?php echo JS_PATH ?>jquery.js" type="text/javascript"></script>
    
	
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php //echo site_url();?>">Users Book</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flright" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
					<?php if ($this->session->userdata('logged_in')) : ?>
                   
					<li>
					<a href=""><?php $sessionArray = $this->session->all_userdata(); 
					echo  "Hello ".$sessionArray['username'];?></a>
					</li>
				 	<li>
                        <a href="<? echo base_url()?>user/logout" />Logout</a>
                    </li>
                    <?php  else : ?>
                    <li>
                        <a href="<? echo base_url()?>user/login" />SignIn</a>
                    </li>
					<li>
                        <a href="<? echo base_url()?>user/registration" />SignUp</a>
                    </li>
					<?php endif; ?>
				
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Page Content -->
	<div class="container">


        <!-- Jumbotron Header -->
     
        <header class="jumbotron hero-spacer">
            <h1> Only $299 </h1>
            <p>Being a Landlord in today's ecomonic envioroment can be challenging. Regardless of your circumstances, each eviction is treated with the utmost attention and care!</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Posts</h3>
            </div>
        </div>
        <!-- /.row -->

      
        <hr>

    <!-- Footer -->
        <footer>
           <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Devdutt Sharma 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

