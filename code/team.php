<?php 
	$pagetitle = 'Team';
	include './parts/header.php'; 
	include './resources/functions.php'; 
?>

<section class="container">
	<section class="banner blockslider block">
		<a href="#" class="control_next"></a>
		<a href="#" class="control_prev"></a>
		<div class="inner" style="max-width: 2030px; width: 100%;">
			<ul>
				<?php
					$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

					$query = "SELECT * FROM novo_employee";
					if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
					else{ $result = mysqli_query($con,$query); }

					while($row = mysqli_fetch_assoc($result)) 
					{
						$name = stripslashes($row['Name']);
						$quote = charLimit(stripslashes($row['Description']), 250);
						echo '	<li class="profileblock" data-id="' . $row['EmployeeID'] . '">
									<figure class="profileblockphoto" style="background-image: url(images/member/' . $row['EmployeeID'] . '.jpg);"></figure>
									<p class="contenttext">' . $name . '</p>
								</li>';
					}
				?>
			</ul>
		</div>
	</section>
	<?php
		$query = "SELECT * FROM novo_employee";
		if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
		else{ $result = mysqli_query($con,$query); }

		while($row = mysqli_fetch_assoc($result)) 
		{
			$name = stripslashes($row['Name']);
			$quote = stripslashes($row['Description']);
			echo '	<section class="block sliderdata" data-id="' . $row['EmployeeID'] . '">
						<div class="inner">
							<figure class="profilephoto" style="background-image: url(images/member/' . $row['EmployeeID'] . '.jpg);"></figure>
							<div class="profiledata">
								<h1 class="contenttitle">' . $name . '</h1>
								<p class="contenttext">
									<i>' . $quote . '&nbsp;</i>
								</p>
								</div>
								<div class="profileprojects">';
							
			$query2 = "SELECT * FROM novo_works WHERE EmployeeID = " . $row['EmployeeID'];
			if (!mysqli_query($con, $query2)){ die('Error: ' . mysqli_error($con)); }
			else{ $result2 = mysqli_query($con,$query2); }

			while($row2 = mysqli_fetch_assoc($result2)) 
			{
				$query3 = "SELECT * FROM novo_project WHERE ProjectID = " . $row2['ProjectID'];
				if (!mysqli_query($con, $query3)){ die('Error: ' . mysqli_error($con)); }
				else{ $result3 = mysqli_query($con, $query3); }
				$row3 = mysqli_fetch_assoc($result3);
				
				if ($row3['Featured'] != '2')
				{
					if ($row3['LeaderID'] == $row['EmployeeID']) 
					{
						echo '		<a href="project#' . $row2['ProjectID'] . '"><figure class="profileproject" style="background-image: url(images/static/starred.png), url(images/project/' . $row2['ProjectID'] . '.jpg); background-size: 50px, cover; background-position: 100% 0%, 50% 50%;"></figure></a>';
					}
					else
					{
						echo '		<a href="project#' . $row2['ProjectID'] . '"><figure class="profileproject" style="background-image: url(images/project/' . $row2['ProjectID'] . '.jpg);"></figure></a>';
					}
				}
			}
							
			echo '			</div>
							<div style="clear: both;"></div>
						</div>
					</section>
					<section class="block" style="display: none;"></section>';
		}
		
		@mysqli_close($conn);
	?>
<?php include './parts/footer.php'; ?>