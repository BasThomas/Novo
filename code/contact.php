<?php 
	$pagetitle = 'Contact';
	include './parts/header.php'; 
	include './resources/functions.php'; 
?>

<section class="container">
	<section class="fullbanner" id="map_canvas_block">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize()
			{
				var latlng = new google.maps.LatLng(51.451664,5.481603);
				var settings = {
					scrollwheel: false,
					zoom: 12,
					center: latlng,
					mapTypeControl: true,
					mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
					navigationControl: true,
					navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				var map = new google.maps.Map(document.getElementById("map_canvas_block"), settings);
				var novoPos = new google.maps.LatLng(51.451664, 5.481603);
				var novoMarker = new google.maps.Marker({
			    	position: novoPos,
			    	map: map,
			    	title: "Novo"
			 	});
			}
			
			initialize();
		</script>
	</section>
	<section class="block">
		<div class="inner">
			<h1 class="contenttitle">Neem contact op.</h1>
			<p class="contenttext">
				Wij zijn te bereiken via de onderstaande kanalen. Het makkelijkst is om een mailtje te sturen of via de social media contact met ons op te nemen.
				We komen er dan zo snel mogelijk op terug.<br /><br />
				Ook voor vragen en/of suggesties kunt u ons altijd bereiken.
			</p>
		</div>
	</section>
<?php include './parts/footer.php'; ?>