<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="<?php echo JS_PATH;?>jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo JS_PATH;?>bootstrap.min.js"></script>
	
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

	<!-- Page Content ---------------------------->
	<div class="container">
   
       <?php if ($this->session->userdata('logged_in')) : ?>
        <div class="row page_header">
         <div class="col-lg-12">
                <div class='error_msg'>
                <?php  if (isset($message)) { echo $message; } ?>
                </div>
            
                <form class="form-post" role="form" method="post" action="<?php echo base_url();?>post/insert_post">
                 
                    <div class="form-group">
                    <!-- <label class="control-label col-sm-2" for="description">Description:</label> -->
                    <input type="text" class="form-control" name="description" placeholder="What's in your mind ?">
                    </div>
                
                    <div class="form-group"> 
                    <button type="submit" class="btn btn-default cpost">Post</button>
                    </div>
                </form>
          </div>
        </div>

        <?php endif;?>
        <!-- /.row -->
    

		<div class="row page-content">
			<div class="col-lg-9">
  			 	<span class='success_msg'>
            	<?php echo $this->session->flashdata('message_data');?>
       		</span>
  	          
          <?php //echo "<pre>"; print_r($results); die;?>
          <?php foreach ($results as $result) :  ?>
          	<h4 class="uppercase-hd"><?php echo $result['posts']->Name; ?></h4>
           <span class="post-desc"><?php echo $result['posts']->Description; ?></span>
          		<!--start notation row -->
                <table class="table table-hover" id="postaddon-table">
                <tr>
                <td class="rowicon"><?php echo $result['posts']->submitted_at; ?></td>
                <td class="rowicon">
                <button class="like-btn" value="<?php echo $result['posts']->Id; ?>">Like: 
                <span class="likes"><?php echo $result['like-count']?></span>
                </button></td>
                <!-- <td class="rowicon"><button class="unlike-btn" value="<?php echo $result['posts']->Id; ?>">Unlike</button></td> -->
                
                <td class="rowicon"><i class="icon-comment">Comments : </i><?php echo $result['comment-count']?></td>
                </tr>
                </table>
              <!--start notation row -->

            <!--start div comment list -->
            <div class="comments-row">
               	
                <?php foreach ($result['comments'] as $key => $comments) { ?>
                  <h5 class="uppercase-hd"><?php echo $comments->Name; ?></h5>
                  <span><?php echo $comments->Comment; ?></span>
                <?php } // end comments?>
               	              <!-- Add comment form -->
                <form class="form-comment" role="form" method="post" action="<?php echo base_url();?>post/insert_comment">
                    <br/>
                    <input type="hidden" class="form-control" name="postid" value="<?php echo $result['posts']->Id;?>">
                    <div class="form-group">
                    <input type="text" class="form-control" name="comment" placeholder="write a comment">
                    </div>
                </form>
            </div>
            <!--end div comment list -->
          		
          <?php endforeach; // end main result array  ?>
	            
      </div>
         
      <!-- <div class="col-lg-3">
         <a href="<?php echo base_url(); ?>post/add"><button type="button" class="btn btn-primary btn-lg">Add Post
         </button></a>
      </div> -->
        	
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

    
    <!-- show comment by ajax -->
    <script type="text/javascript">
      $(document).ready(function(){
        // $(document).on('click', 'button', function(){
        //   $('div.col-lg-6').remove();  

        // //$('button').click(function (){
        //   var thisObj = $(this);
        //   var postid = $(this).attr('value');
        //   var response = "";   
        //   $.ajax({
        //      type :'POST',
        //      url :'post/ajaxcall',
        //      data : {postid : postid},
        //      dataType:'json', 
        //     success: function(response) {
        //      // console.log(response);
        //       var output="<div class='ajax-comments'>";
        //       for (var i in response) 
        //       {
        //           output+="<h5 class='uppercase-hd'>" + response[i].Name + "</h5>";
        //           output+="<span>" + response[i].Comment + "</span>";
        //       }
        //        output+="</div>";
              
              
        //         thisObj.next().append(output);

              
        //     }
        //   })
        // });
          

          $('.like-btn').click(function(){

              $('.dislike-btn').removeClass('dislike-h');    
              $(this).addClass('like-h');
              var thisObj = $(this);
              var id = $(this).attr('value');

              $.ajax({
                  type:"POST",
                  url:"post/ajax_insert_like",
                  data:{postid :id},
                  success: function(response){
                  	 $(".likes").remove();
                  	 
                     thisObj.append(response);

                  }
              });
          });
      });
    </script>

    <!-- end of the page html -->
 </body>
</html>
