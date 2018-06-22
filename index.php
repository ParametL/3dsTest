<?php
	ob_start();
	require_once( "import/conn.php" );
	require_once( "import/controller.php" );
	
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css?v=1" rel="stylesheet">
  </head>

	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-mea fixed-top">
      <div class="container">
			<div class="collapse navbar-collapse" id="navbarResponsive">			
          <ul class="nav navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="?mod=main">HOME</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<?php 
		//content
		include( $contentIndex );
	?>
    <!-- Footer -->
    <footer class="py-4 bg-mea footer">
      <div class="container">
				<h4 class="text-center"><u>แบบทดสอบ</u></h4>
		</div>
      </div>
      <!-- /.container -->
    </footer>
	
		<title><?php echo $pageTitle;?></title>
	
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="js/main.js"></script>
		<?php
			echo $script;
			echo $stylesheet;
		?>
  </body>

</html>
