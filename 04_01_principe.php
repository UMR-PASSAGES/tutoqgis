<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">IV.  Géoréférencement</h1>
			<h2>IV.1  Principe du géoréférencement</h2>
				<ul class="listetitres">
					<li><a href="#IV11">Qu'est-ce que le géoréférencement ?</a></li>
					<li><a href="#IV12">Géoréférencer par rapport à quoi ? Deux méthodes</a>
						<ul class= "listesoustitres">
							<li><a href="#IV12a" >En se basant sur les informations contenues dans l'image</a></li>
							<li><a href="#IV12b" >En se basant sur des informations contenues dans une autre couche</a></li>
						</ul>
					</li>
				</ul>
				<br>
			
			<h3>Qu'est-ce que le géoréférencement ?<a class="headerlink" id="IV11" href="#IV11"></a></h3>
			
				<p>Les données SIG que nous avons utilisées jusqu'ici ont toutes des coordonnées, ce qui nous permet de les superposer correctement dans une logiciel SIG. A l'inverse, dans le cas d'une image simplement scannée, une carte ancienne par exemple, le logiciel ne possède pas d'informations de coordonnées&nbsp;; il placera cette image simplement en considérant que le coin en haut à gauche a les coordonnées 0,0.</p>
				<p><b>Le géoréférencement, ou calage, consiste à attribuer des coordonnées à une image</b>. Cette image pourra ensuite être superposée à d'autres couches dans un logiciel SIG, et servir par exemple de fond de carte ou être <a href="05_00_numerisation.php">numérisée</a>. Nous traiterons uniquement du cas des données raster (il existe d'autres méthodes pour les données vecteur qui ne seront pas abordées ici).</p>
				<p>Lors du géoréférencement, il faudra aussi préciser dans quel SCR est notre image.</p>
				
			<h3>Géoréférencer par rapport à quoi ? Deux méthodes<a class="headerlink" id="IV12" href="#IV12"></a></h3>
			
				<p>Pour donner des coordonnées à une image, il est possible de se baser soit sur des informations contenues directement dans l'image, par exemple si l'image est une carte avec un carroyage, ou soit sur une autre couche déjà existante et correctement calée (vecteur ou raster).</p>
				
				<h4>En se basant sur les informations contenues dans l'image<a class="headerlink" id="IV12a" href="#IV12a"></a></h4>
				
					<p>Si on connaît précisément les coordonnées de quelques points sur l'image, grâce à un carroyage avec des amorces de coordonnées, on va pouvoir se servir de ces coordonnées pour géoréférencer l'image.</p>
					<p>Il faut néanmoins connaître le système de coordonnées utilisé, ce qui peut nécessiter des recherches.</p>
					<figure>
						<a href="illustrations/4_1_calage_methode1.jpg" >
							<img src="illustrations/4_1_calage_methode1.jpg" alt="calage grâce à un carroyage avec coordonnées" width="480" >
						</a>
						<figcaption>Calage grâce à un carroyage avec amorces de coordonnées (Source de l'image : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File%3A1902_Land_Office_Map_of_the_Island_of_Oahu%2C_Hawaii_(_Honolulu_)_-_Geographicus_-_OhauHawaii-lo-1902.jpg">Wikimedia</a>, domaine public)</figcaption>
					</figure>
				
				<h4>En se basant sur des informations contenues dans une autre couche<a class="headerlink" id="IV12b" href="#IV12b"></a></h4>
				
					<p>Si l'image ne possède pas d'indications de coordonnées, il va falloir utiliser une couche déjà géoréférencée possédant une zone commune avec l'image à géoréférencer. On pourra alors indiquer que tel point sur l'image correspond à tel point sur la couche déjà géoréférencée. Cette méthode sera employée pour caler des photographies aériennes par exemple.</p>
					<p>La carte résultante aura le même système de coordonnées que la couche de référence. La précision du calage dépend alors notamment de la précision de la couche de référence.</p>
					<figure>
						<a href="illustrations/4_1_calage_methode2.svg" >
							<img class="noshadow" src="illustrations/4_1_calage_methode2.svg" alt="calage grâce à une couche déjà calée servant de référence" width="600" >
						</a>
						<figcaption>Calage grâce à une couche de référence (Source de l'image à caler : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File:Doncaster_east_locality_map.PNG">Wikimedia</a>, domaine public, source des données de référence <a class="ext" target="_blank" href="http://www.openstreetmap.org/#map=14/-37.7762/145.1778">OpenStreetMap</a> © les contributeurs d’OpenStreetMap).</figcaption>
					</figure>
	
					<p>Dans l'illustration ci-dessus, l'image de gauche est géoréférencée en utilisant le fond de carte <a class="ext" target="_blank" href="http://www.openstreetmap.org/">OpenStreetMap</a>. Des points que l'on peut facilement identifier sur les deux images (par exemple des intersections de routes) servent de points de calage.</p>
						
				<br>
				<a class="prec" href="04_00_georeferencement.php">chapitre précédent</a>
				<a class="suiv" href="04_02_preliminaires.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_4.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
