<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title;?></title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

	 <!-- Custom CSS -->
    <link href="/assets/css/half-slider.css" rel="stylesheet">
    <link href="/assets/css/tin.css" rel="stylesheet">
	
	
	

  </head>
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
                <a class="navbar-brand" href="<?php echo index_page(); ?>">T I N</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">HOT EVENT!</a>
                    </li>
                    <li>
                        <a href="#">PROFILE</a>
                    </li>
                    <li>
                        <a href="#">CONTACT US</a>
                    </li>
                </ul>
            <?php if (isset($user)) { ?>
            <div>
                <?php echo $user['name']; ?>
                <img src="<?php echo $user['picture']['url']; ?>">
            </div>
            <?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
