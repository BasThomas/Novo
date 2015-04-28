<?php 
	$pagetitle = 'Home';
	include './parts/header.php'; 
	include './resources/functions.php'; 
?>

<section class="container">
	<section class="fullbanner slider">
		<a href="#" class="control_next"></a>
		<a href="#" class="control_prev"></a>
		<ul>
			<?php
				$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

				$query = "SELECT * FROM novo_project WHERE Featured = 1 LIMIT 0, 4";
				if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
				else{ $result = mysqli_query($con,$query); }

				while($row = mysqli_fetch_assoc($result)) 
				{
					$title = stripslashes($row['Name']);
					$description = charLimit(stripslashes($row['Description']), 250);
					echo '	<li style="background-image: url(images/project/' . $row['ProjectID'] . '.jpg);">
								<div class="bannertitlebox">
									<h1 class="inner bannertitle">' . $title . '</h1>
									<p class="inner bannertext">
										' . $description . '
										<a class="colorlink bannerlink" href="project#' . $row['ProjectID'] . '">Find out more...</a>
									</p>
								</div>
							</li>';
				}
				
				@mysqli_close($conn);
			?>
		</ul>  
	</section>
	<section class="block">
		<div class="inner">
			<h1 class="contenttitle">We are Novo!</h1>
			<p class="contenttext">
				We are creative, we are motivated, we are innovative and we are a team! Our team hosts a wide range of talents and skills to let us take on almost every project.<br>
				<br>
				Based at the Fontys University in Eindhoven, a selection of motivated and skilled ICT-bachelor students come together to work on great project with awesome and innovating technology.<br>
				There is no project Novo can’t take on, and if our knowledge doesn’t reach as far as we need, we’ll make sure we get that far.<br>
				<br>
				So if you have a challenge for us or if you want to test our skills, don’t hesitate to <a class="colorlink" href="contact">give us a call</a>. 
			</p>
		</div>
	</section>
<?php include './parts/footer.php'; ?>