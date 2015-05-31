<?php
	$pagetitle = 'Home';
    echo "<div class='homeheader'>";
	include './parts/header.php';
    echo "</div>";
	include './resources/functions.php';
?>

<!--<section class="container">-->
<!--	<section class="fullbanner slider">-->
<!--
		<a href="#" class="control_next"></a>
		<a href="#" class="control_prev"></a>
-->
<!--
		<ul>

			<?php
//				$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");
//
//				$query = "SELECT * FROM novo_project WHERE Featured = 1 LIMIT 0, 1";
//				if (!mysqli_query($con,$query))
//				{
//					die('Error: ' . mysqli_error($con));
//				}
//				else
//				{
//					$result = mysqli_query($con,$query);
//				}
//
//				while($row = mysqli_fetch_assoc($result))
//				{
//					$title = stripslashes($row['Name']);
//					$description = charLimit(stripslashes($row['Description']), 250);
//					echo '<li class="homeimage" style="background-image: url(images/project/' . $row['ProjectID'] . '.jpg);">
//								<div class="bannertitlebox"><div class="homedescription">
//									<a class="homelink" href="project#' . $row['ProjectID'] . '"><h1 class="bannertitle">' . $title . '</h1>
//									<p class="bannertext">
//										' . $description . '
//									</p></a>
//                                    </div>
//								</div>
//							</li>';
//				}
//
//				@mysqli_close($conn);
			?>

		</ul>
-->
<div class="wrapper">
    <ul class="rslides" id="slider3">
        <li><div style="background-image:url(images/1.jpg)" alt="" class="slide"></div></li>
        <li><div style="background-image:url(images/2.jpg)" alt="" class="slide"></div></li>
        <li><div style="background-image:url(images/3.jpg)" alt="" class="slide"></div></li>
        <li><div style="background-image:url(images/4.jpg)" alt="" class="slide"></div></li>
    </ul>

    <!-- Slideshow 3 Pager -->
    <ul id="slider3-pager">
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
    </ul>
</div>


<!--	</section>-->
<!--
	<section class="block">
			<h1 class="contenttitle">Wij zijn Novo.</h1>
			<p class="contenttext">
				Novo is een bruisend team waarin media en software elkaar ontmoeten. Met een samenspel van creativiteit en passie bieden wij u de beste oplossingen bij uw vragen.<br /><br />
				We zitten op locatie bij de Fontys Hogescholen in Eindhoven, waar we ook werken aan innovatieve en nieuwe oplossingen die nog niet in de markt staan en alleen nog maar van kunnen dromen.
			</p>
	</section>
-->
<!--</section>-->
<?php include './parts/footer.php'; ?>