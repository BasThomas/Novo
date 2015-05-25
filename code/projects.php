<?php 
	$pagetitle = 'Projects';
	include './parts/header.php'; 
	include './resources/functions.php'; 
?>

<section class="container">
	<section class="banner blockslider portfolioblock">
		<a href="#" class="control_next"></a>
		<a href="#" class="control_prev"></a>
		<div class="inner" style="max-width: 2030px; width: 100%;">
			<ul>
				<?php
					$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

					$query = "SELECT * FROM novo_project WHERE Featured != 2";
					if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
					else{ $result = mysqli_query($con,$query); }

					while($row = mysqli_fetch_assoc($result)) 
					{
						$name = stripslashes($row['Name']);
						echo '	<li class="profileblock" data-id="' . $row['ProjectID'] . '">
									<figure class="profileblockphoto" style="background-image: url(images/project/' . $row['ProjectID'] . '.jpg);"></figure>
									<p class="contenttext">' . $name . '</p>
								</li>';
					}
				?>
			</ul>
		</div>
	</section>
	<?php
		$query = "SELECT * FROM novo_project WHERE Featured != 2";
		if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
		else{ $result = mysqli_query($con,$query); }

		while($row = mysqli_fetch_assoc($result)) 
		{
			$name = stripslashes($row['Name']);
			$description = stripslashes($row['Description']);
			echo '	<section class="portfolioblock sliderdata" data-id="' . $row['ProjectID'] . '">
						<div class="inner">
							<h1 class="contenttitle">' . $name . '</h1>
							<p class="contenttext">
								' . $description . '
							</p>';
							
			$query2 = "SELECT * FROM novo_works WHERE ProjectID = " . $row['ProjectID'];
			if (!mysqli_query($con, $query2)){ die('Error: ' . mysqli_error($con)); }
			else{ $result2 = mysqli_query($con,$query2); }

			while($row2 = mysqli_fetch_assoc($result2)) 
			{
				if ($row2['EmployeeID'] == $row['LeaderID']) 
				{
					echo '	<a href="team#' . $row2['EmployeeID'] . '"><figure class="profileproject" style="background-image: url(images/static/starred.png), url(images/member/' . $row2['EmployeeID'] . '.jpg); background-size: 50px, cover; background-position: 100% 0%, 50% 50%;"></figure></a>';
				}
				else
				{
					echo '	<a href="team#' . $row2['EmployeeID'] . '"><figure class="profileproject" style="background-image: url(images/member/' . $row2['EmployeeID'] . '.jpg);"></figure></a>';
				}
			}
							
			echo '			<div style="clear: both;"></div>
						</div>
					</section>
					<section class="portfolioblock" style="display: none;"></section>';
		}
		
		@mysqli_close($conn);
	?>
<?php include './parts/footer.php'; ?>