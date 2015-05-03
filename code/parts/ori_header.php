<!--
	Novo Team Website
		Novo Team is the name of the Fontys Hogeschool ICT's Delta class of 2014-2015's corporate identity. This website is it's showcase and defines its identity.
	
	Front-End:
		Designed By: 
			Stan Jansen, Caspar Neervoort, Joris van Oers, Fons Winters
		Coded By: Caspar Neervoort
	Back-End:
		Coded By:
			Márton Wéber
-->

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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="resources/animatescroll.js"></script>
	<script type="text/javascript" src="resources/source.js"></script>
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
	<nav class="navbar">
		<div class="navbutton"></div>
		<section class="inner">
			<a href="home"><div class="navlogo"></div></a>
		</section>
		<div style="clear: both;"></div>
	</nav>
	<nav class="navside">
		<ul>
			<li>
				<a class="navitem" href="home">Novo</a>
			</li>
			<li>
				<a class="navitem" href="projects">Projects</a>
			</li>
			<li>
				<a class="navitem" href="team">Team</a>
			</li>
			<li>
				<a class="navitem" href="contact">Contact</a>
			</li>
		</ul>
	</nav>
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