<?php
	$pagetitle = 'Home';
    echo "<div class='homeheader'>";
	include './parts/header.php';
    echo "</div>";
	include './resources/functions.php';
?>

<div class="wrapper">
    <ul class="rslides" id="slider3">
        <li>
            <div style="background-image:url(images/1.jpg)" alt="Bean Project" class="slide">
                <article>
                    <h2>Bean Open Lab Branding</h2>
                    <p>Het Bean Open Lab is een initiatief vanuit Fontys ICT, Greenhouse Group en STRP. Novo heeft de branding van Bean verzorgd.</p>
                </article>
            </div>
        </li>
        <li>
            <div style="background-image:url(images/2.jpg)" alt="Genetechs Project" class="slide">
                <article>
                    <h2>Genetechs Belevingsconcept</h2>
                    <p>Genetechs is een fictief bedrijf wat Novo is gestart als belevingsconcept voor het Eindhovense medialab van de VPRO. Het sluit aan op de serie 'De Volmaakte Mens'.</p>
                </article>
            </div>
        </li>
        <li>
            <div style="background-image:url(images/3.jpg)" alt="Nao Project" class="slide">
                <article>
                    <h2>Nao Robots Programming</h2>
                    <p>Nao robots speelde een rol in een 360 VR film van de VPRO. Novo programmeerde de robots om te doen wat ze moesten doen.</p>
                </article>
            </div>
        </li>
        <li>
            <div style="background-image:url(images/4.jpg)" alt="DDW Warehouse Project" class="slide">
                <article>
                    <h2>DDW Fontys Factory: Warehouse</h2>
                    <p>Fontys Factory Warehouse is een onderzoek naar digitale recycling in de vorm van een laboratorium en een winkel. Novo heeft met docenten samengewerkt om dit neer te zetten.</p>
                </article>
            </div>
        </li>
    </ul>

    <!-- Slideshow 3 Pager -->
    <ul id="slider3-pager">
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
      <li><a href="#">.</a></li>
    </ul>
</div>

<?php include './parts/footer.php'; ?>