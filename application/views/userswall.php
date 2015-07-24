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
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Users Book</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flright" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
					<?php if ($this->session->userdata('logged_in')) : ?>
                   
					<li>
    					<a href="">
                        <?php $sessionArray = $this->session->all_userdata(); 
                        echo  "Hello ".$sessionArray['logged_in']['username'];?>
                        </a>
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

	<!-- Page Content -------------------------------------------->
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
			 	<div class='success_msg'>
	            	<?php echo $this->session->flashdata('message_data');?>
	       		</div>
	            <h3 class="page-heading">Latest Posts</h3>
	            <?php //echo "<pre>"; print_r($posts); die;?>
	            <?php foreach ($posts as $value) { ?>
	            	<h3><?php echo $value->Title; ?></h3>
	            	<p><?php echo $value->Desc; ?></p>
	            <?php } // endforeach  ?>
	            
            </div>
            <?php if ($this->session->userdata('logged_in')) : ?>
            <div class="col-lg-3">
               <a href="<?php echo base_url(); ?>post/add"><button type="button" class="btn btn-primary btn-lg">Add Post
               </button></a>
            </div>
        	<?php endif;?>
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

