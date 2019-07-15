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
			<h2>IV.2  Géoréférencement : les préliminaires</h2>
				<ul class="listetitres">
					<li><a href="#IV21">Découverte de l'image à caler</a></li>
					<li><a href="#IV22">Accéder au module de géoréférencement</a>
						<ul class= "listesoustitres">
							<li><a href="#IV22a" >Si tout va bien...</a></li>
							<li><a href="#IV22b" >Si le module n'est pas accessible...</a></li>
						</ul>
					</li>
				</ul>
				<br>
	
			<p>Notre but sera ici de caler une carte de l'île d'Oahu (Hawaii) de 1902 (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File%3A1902_Land_Office_Map_of_the_Island_of_Oahu%2C_Hawaii_(_Honolulu_)_-_Geographicus_-_OhauHawaii-lo-1902.jpg">Wikimedia</a>. Une fois cette carte calée, vous pourrez la superposer à d'autres données dans QGIS.</p>
			<p>La première étape consiste à prendre connaissance de cette carte, et à vérifier que le module de géoréférencement de QGIS soit activé.</p>
			
			<h3><a class="titre" id="IV21">Découverte de l'image à caler</a></h3>			
			
				<p>Où se situe l'île d'Oahu? Rendez-vous par exemple sur Wikipedia pour le savoir : <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Oahu" >http://fr.wikipedia.org/wiki/Oahu</a>.</p>
				<div class="question">
					<input type="checkbox" id="faq-1">
					<p><label for="faq-1">Quelles sont les coordonnées de l'île d'Oahu ? Dans quel SCR sont mesurées ces coordonnées ?</label></p>
					<p class="reponse">L'île est située approximativement aux coordonnées 21° 28' Nord et 157° 59' Ouest (SCR WGS84).</p>
				</div>
				
				<p>A partir de l'explorateur de fichiers de votre ordinateur, ouvrez l'image <em class="data">Oahu_Hawaiian_Islands_1906.jpg</em> située dans le dossier <b>TutoQGIS_04_Georef/donnees</b>.</p>
				<div class="question">
					<input type="checkbox" id="faq-2">
					<p><label for="faq-2">Pouvez-vous dire dans quel système sont mesurées les coordonnées de cette carte ?</label></p>
					<p class="reponse">Aucune mention d'un SCR n'est faite sur cette carte. Nous pouvons néanmoins être sûr qu'il s'agit d'un système géographique (non projeté) puisque les coordonnées sont exprimées en degrés.</p>
					<p class="reponse">Connaître quel système a été utilisé ici nécessiterait des recherches, en se basant sur la date de la carte et la zone couverte. Nous allons supposer ici, pour les besoins de l'exercice, que les coordonnées sont en WGS84 (ce qui n'est évidemment pas le cas, ce système datant de 1984). Nous vérifierons que ce choix nous donne une précision acceptable.</p>
				</div>				
			
			<h3><a class="titre" id="IV22">Accéder au module de géoréférencement</a></h3>
			
				<h4><a class="titre" id="IV22a">Si tout va bien...</a></h4>
			
					<div class="manip">	
						<p>Le module de géoréférencement de QGIS est normalement accessible via le menu
							<a class="thumbnail_bottom" href="#thumb">Raster &#8594; Géoréférencer &#8594; Géoréférencer
								<span>
									<img src="illustrations/tous/4_2_georeferencer_menu.png" alt="Menu Raster, géoréférencer, géoréférencer" height="200" >
								</span>
							</a>
						.</p>
					</div>
	
				<h4><a class="titre" id="IV22b">Si le module n'est pas accessible...</a></h4>
				
					<div class="manip">
				
						<p>Si vous n'avez pas accès au géoréférenceur à partir du menu raster, vérifier que l'extension est installée et activée via le menu
							<a class="thumbnail_bottom" href="#thumb">Extension &#8594; Installer/Gérer les extensions
								<span>
									<img src="illustrations/tous/4_2_extensions_menu.png" alt="Menu Extension, Installer/Gérer les extensions" height="100" >
								</span>
							</a>
						.</p>
						<figure>
							<a href="illustrations/tous/4_2_activation_georeferenceur.png" >
								<img src="illustrations/tous/4_2_activation_georeferenceur.png" alt="Activation de l'extension géoréférenceur" width="600">
							</a>
						</figure>
						<p>Allez dans la rubrique <b>installées</b> pour voir la liste des extensions installées, tapez "géo" (attention, l'accent est important) dans <b>Rechercher</b> pour limiter les résultats, et cochez la case de l'extension <b>Géoréférenceur GDAL</b>.</p>
						
					</div>
					

				<br>
				<a class="prec" href="04_01_principe.php">chapitre précédent</a>
				<a class="suiv" href="04_03_calage_carroyage.php">chapitre suivant</a>
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
