<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		<div class="backgrounds">
			<div class="main"></div>
			<div class="sidebar"></div>
		</div>	
	
		<div class="main">
			<h2>II.1  Introduction à la géodésie</h2>
				<ul class="listetitres">
					<li><a href="#II11">Bref historique</a></li>
					<li><a href="#II12">Deux notions préliminaires : géoïde et ellipsoïde</a></li>
				</ul>
				<br>		
			
			<h3><a class="titre" id="II11">Bref historique</a></h3>
				<p>La géodésie est la science qui étudie la forme et les dimensions de la Terre, en tenant compte de son champ de pesanteur.</p>
				<p>La géodésie est une science ancienne ; on attribue au grec <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/%C3%89ratosth%C3%A8ne" >Eratosthène</a> (276 à 194 av. JC) la première mesure de la circonférence de la Terre, qu'il évalua à environ 39 375 km. Cette mesure s'est révélée proche de la réalité puisque les estimations actuelles sont d'environ 40 075 km.</p>
				
			<h3><a class="titre" id="II12">Deux notions préliminaires : géoïde et ellipsoïde</a></h3>
				<p>La surface de la Terre est très irrégulière et complexe on peut la modéliser de différentes manières.</p>
				<p>La <b>sphère</b> est le modèle le plus simple.</p>
				<p>L'<b>ellipsoïde</b> est une sphère aplatie, plus simple à modéliser. On le définit généralement par ses demis-axes (<b><em>a</em></b>,  <b><em>b</em></b> et  <b><em>c</em></b>) et son centre (<b><em>O</em></b>).</p>
				<figure>	
					<a href="http://en.wikipedia.org/wiki/File:Ellipsoid_tri-axial_abc.svg" >		
						<img src="illustrations/tous/2_1_ellipsoide.png" alt="ellipsoïde" height="200">
					</a>
					<figcaption>Ellipsoïde (Source : Peter Mercator, Wikimedia Commons, licence Creative Commons Attribution-Share Alike 3.0 Unported).</figcaption>
				</figure>			
				<p>Le <b>géoïde</b> est une surface perpendiculaire en tout point à la direction de la gravité (fil à plomb). Cette surface passe par le niveau moyen des mers. Les altitudes sont mesurées par rapport au géoïde depuis les années 1960 (altitude normale). On peut considérer le géoïde comme un sphère cabossée. C'est une représentation exacte mais compliquée à utiliser.</p>
				<figure>
					<a href="http://en.wikipedia.org/wiki/File:Geoids_sm.jpg" >
						<img src="illustrations/tous/2_1_geoide.jpg" alt="géoïde" height="200">
					</a>
					<figcaption>Géoïde (Source : NASA, Wikimedia Commons, domaine public)</figcaption>
				</figure>
				<p>Il existe une infinité d'ellipsoïdes, qui peuvent coïncider avec la surface de la Terre sur toute leur surface (ellipsoïde global) ou seulement sur une partie de leur surface (ellipsoïde local). A l'inverse, il n'existe qu'un seul géoïde.</p>
				<figure>
					<a href="illustrations/tous/2_1_geoide_ellipsoide.svg" >
						<img src="illustrations/tous/2_1_geoide_ellipsoide.svg" alt="ellipsoïdes et géoïde" height="250" >
					</a>
					<figcaption>Géoïde et ellipsoïdes (Source : pôle ARD, adess, domaine public)</figcaption>
				</figure>
				
				<br>
				<a class="prec" href="02_00_geodesie.php">chapitre précédent</a>
				<a class="suiv" href="02_02_coord.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>
			
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_2.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
