<!DOCTYPE html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>
		<?php echo $pagetitle; ?> - Novo
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/static/favicon.ico" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="resources/style.css" type="text/css" />
    <link rel="stylesheet" href="resources/slider.css" type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="resources/animatescroll.js"></script>
    <script type="text/javascript" src="resources/menuicon.js"></script>
<!--    <script type="text/javascript" src="resources/responsiveslides.min.js"></script>-->
    <script type="text/javascript" src="resources/responsiveslides.js"></script>
	<script type="text/javascript" src="resources/source.js"></script>
    
    <script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 3
      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager'
      });

    });
  </script>
	<?php
		if(isset($include))
		{
			foreach($include as $value)
			{
				echo $value;
			}
		}
	?>
</head>
<body>
	<header class="navbar">
			<a href="index.php"><img class="logo" src="images/static/logo.png"></a>
        <ul class="nav">
            <li><a href="team.php">About us</a></li>
            <li><a href="projects.php">Portfolio</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        
        <div class="menuicon">
          <button class="cmn-toggle-switch cmn-toggle-switch__htx">
            <span>toggle menu</span>
          </button>
        </div>
        
	</header>

	<?php
		if(isset($_SESSION['state']) && $_SESSION['state'] != "")
		{
			if(isset($_SESSION['status']) && $_SESSION['status'] != "")
			{
				echo '	<section class="notification '.$_SESSION['state'].'">	
						<p>
							'.$_SESSION['status'].'
						</p>
					</section>';
				ClearState();
			}
		}
	?>