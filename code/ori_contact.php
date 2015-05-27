<?php
	$pagetitle = 'Home';
	include './parts/header.php';
	include './resources/functions.php';
?>

<section class="container">
	<section class="fullbanner" id="map_canvas_block">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize() {
				var latlng = new google.maps.LatLng(51.451664,5.481603);
				var settings = {
					scrollwheel: false,
					zoom: 12,
					center: latlng,
					mapTypeControl: true,
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
					mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas_block"), settings);
			var huisPos = new google.maps.LatLng(51.451664, 5.481603);
			  var huisMarker = new google.maps.Marker({
			      position: huisPos,
			      map: map,
			      title:"Novo Team"
			  });
			}

			initialize();
		</script>
	</section>
	<section class="block">
		<div class="inner">
			<h1 class="contenttitle">How to reach us.</h1>
			<p class="contenttext">
				You can contact Novo using the contact information below.<br />
				<br />
				We're available during weekdays between 9:00 AM and 10:00 PM and on saturdays between 10:00 AM and 6:00 PM.<br />
				Of course, you can reach us at any time via email, our social media or regular mail.<br />
				<br />
				If you've made an appointment and are looking for directions, above is a map to show you where we are located.<br />
			</p>
		</div>
	</section>
	<!--<section class="block">
		<div class="inner" style="text-align: center;">
			<p class="contenttext">
				<div class="contactrow colorlink"><i class="icon-phone"></i>+31(0) 678-912-356</div>
				<div class="contactrow"><a class="colorlink" href="https://www.facebook.com/novoteam"><i class="icon-facebook"></i>Facebook</a></div>
				<div class="contactrow"><a class="colorlink" target="_blank" href="mailto:contact@novoteam.nl"><i class="icon-email"></i>contact@novoteam.nl</a></div>
				<div class="contactrow"><a class="colorlink" target="_blank" href="https://twitter.com/novo_team"><i class="icon-twitter"></i>Twitter</a></div>
				<div class="contactrow"><a class="colorlink" target="_blank" href="https://www.google.nl/maps/place/Rachelsmolen+1,+5612+MA+Eindhoven/@51.4516268,5.4814267,17z/data=!3m1!4b1!4m2!3m1!1s0x47c6d92199730073:0x2a4de046a5d850af?hl=en"><i class="icon-maps"></i>Rachelsmolen 1, Eindhoven</a></div>
			</p>
		</div>
	</section>-->

<?php include './parts/footer.php'; ?>