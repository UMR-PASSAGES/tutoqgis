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
			<h2>IV.6 Points de calage : en se basant sur une couche de référence</h2>
				<ul class="listetitres">
					<li><a href="#IV61">Ajout d'un fonds OpenStreetMap</a></li>
					<li><a href="#IV62">Zoom sur la zone d'étude avec l'extension Nominatim Locator Filter</a></li>
					<li><a href="#IV63">Création des points de calage</a></li>
				</ul>
				<br>
			
				<p>Comme expliqué dans la <a href="04_01_principe.php#IV12" >partie IV.1.2</a>, il est également possible de se baser sur une couche de référence pour géoréférencer une image.</p>
				<p>La manipulation sera la même que décrite dans les précédentes parties, sauf en ce qui concerne la création des points de calage. Seule cette partie sera donc décrite ici.</p>
				<p>L'image que nous allons caler est une carte de Doncaster East, dans la banlieue de Melbourne (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File:Doncaster_east_locality_map.PNG">Wikimedia</a>).</p>
				<figure>
					<a href="illustrations/tous/4_6_doncaster_east.png" >
						<img src="illustrations/tous/4_6_doncaster_east.png" alt="Carte à caler de Doncaster East (Australie)" width="500">
					</a>
				</figure>
				<p>Pour caler cette carte, nous allons nous baser sur les données <a class="ext" target="_blank" href="http://www.openstreetmap.org/">OpenStreetMap</a>. OpenStreetMap est une base de données cartographique libre ; on décrit souvent ce projet comme un "wikipedia cartographique". Pour en savoir plus, voir aussi <a href="03_05_donnees_osm.php" >ici</a> !</p>
			
				<h3><a class="titre" id="IV61">Ajout d'un fond OpenStreetMap</a></h3>
				
				    <p>2 méthodes permettant d'afficher un fonds OpenStreetMap sont décrites <a href="03_04_fonds_carte.php">ici</a>.</p>
				    
				    <div class="manip">
				        <p>Vous pouvez par exemple vous rendre dans le panneau Explorateur (s'il n'est pas déjà activé : menu Vue &#8594; Panneaux &#8594; Explorateur), rubrique <b>XYZ Tiles</b>, et double-cliquez sur le fonds <b>OpenStreetMap</b>.</p>
				        <figure>
        					<a href="illustrations/tous/4_6_ajout_OSM.png" >
        						<img src="illustrations/tous/4_6_ajout_OSM.png" alt="Panneau Explorateur, XYZ Tiles, OpenStreetMap" width="200">
        					</a>
        				</figure>
					
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Dans quel système de coordonnées est la couche OSM ?</label></p>
							<p class="reponse">Le <a href="02_03_couches_projets.php#II32">SCR de le couche</a> est le WGS84 projection Pseudo Mercator, EPSG:3857.</p>
						</div>
						<p>La couche ajoutée est projetée à la volée dans le SCR du projet.</p>
						<p>Pour simplifier les choses, nous allons passer le projet également en Pseudo Mercator, afin que la couche de base pour le géoréférencement et le projet aient le même SCR.</p>
						<p>Pour cela, rendez-vous dans les propriétés du projet et sélectionnez le SCR Pseudo Mercator, code EPSG 3857 (cf. <a href="02_04_changer_systeme.php#II41">ici</a>).</p>
					</div>
				
				<h3><a class="titre" id="IV62">Zoom sur la zone d'étude avec l'extension Nominatim Locator Filter</a></h3>
				
				    <p>Nous cherchons ici à zoomer sur la zone qui concerne notre carte, à savoir Doncaster East dans le banlieue de Melbourne, en Australie. Il est bien sûr possible d'utiliser les outils de zoom pour cela, mais nous allons en profiter pour découvrir une autre méthode parfois bien pratique, avec l'extension OSM place search.</p>
				    <div class="manip">
						<p>Commençons par installer l'extension Nominatim Locator Filter : procédez comme pour QuickMapServices, via le <b>menu Extensions &#8594; Installer/Gérer les extensions</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_install_nlf.png">
								<img src="illustrations/tous/4_6_install_nlf.png" alt="Installation de l'extension Nominatim Locator Filter" width="600">
							</a>
						</figure>
						<p>L'extension n'est pas visible dans QGIS ; en fait, cette extension ajoute une fonctionnalité à la barre de recherche tout en bas à gauche de la fenêtre de QGIS.</p>
						<figure>
							<a href="illustrations/tous/4_6_barre_recherche.png">
								<img src="illustrations/tous/4_6_barre_recherche.png" alt="Fenêtre de QGIS avec la barre de recherche en bas à gauche encadrée en rouge" width="600">
							</a>
						</figure>
					</div>
					
						<p>Cette barre de recherche permet de rechercher une couche chargée dans le projet, un algorithme de traitement... L'extension Nominatim Locator Filter lui ajoute la fonctionnalité permettant de rechercher des noms de lieux dans OpenStreetMap et de zoomer sur la zone correspondante (qu'une couche OSM soit chargée dans le projet en cours ou non).</p>
						<p><b>Pour cela, il faut taper le nom du lieu à rechercher puis le caractère espace.</b></p>
						
					<div class="manip">
						<p>Dans la barre de recherche, tapez : <b>Doncaster East, Victoria, Australia </b> en terminant par un espace.</p>
						<p>Appuyez sur la touche entrée pour valider la suggestion qui doit normalement apparaître : la carte est maintenant zoomée sur ce lieu.</p>
						<figure>
						  <a href="illustrations/tous/4_6_osm_zoom1.png" >
							<img src="illustrations/tous/4_6_osm_zoom1.png" alt="Données OSM : Melbourne" width="600">
						  </a>
						</figure>
					</div>
					
					<div class="manip">
						<p>Zoomez maintenant sur Doncaster East (pour vous aider : <a class="ext" target="_blank" href="http://www.openstreetmap.org/relation/2390038#map=13/-37.7776/145.1615" >carte OpenStreetMap de Doncaster Est</a>).</p>
						<figure>
							<a href="illustrations/tous/4_6_osm_doncaster_east.png">
								<img src="illustrations/tous/4_6_osm_doncaster_east.png" alt="Doncaster East : données OSM et carte à caler en vis à vis" width="600">
							</a>
						</figure>
					</div>
					<p>Nous allons maintenant pouvoir procéder à la création des points de calage.</p>
					
				<h3><a class="titre" id="IV63">Création des points de calage</a></h3>
					
					<div class="manip">
						<p>Ouvrez la fenêtre du géoréférenceur et ajoutez l'image à caler : <em class="data"><a href="donnees/TutoQGIS_04_Georef.zip">Doncaster_east_locality_map.PNG</a></em> située dans le dossier <b>TutoQGIS_04_Georef/donnees</b> (si nécessaire, aidez-vous pour cela du début de la <a href="04_03_calage_carroyage.php#IV31">partie IV.3.1</a>).</p>
						<p>Lorsque QGIS vous demande dans quel SCR est cette image, choisissez le <b>WGS84 / Pseudo-Mercator EPSG:3857</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_scr_3857.png">
								<img src="illustrations/tous/4_6_scr_3857.png" alt="choix du scr wgs84 pseudo-mercator epsg:3857" width="350">
							</a>
						</figure>
						<p>Cliquez sur une intersection de routes, par exemple entre Reynolds Road et Blackburn Road. La fenêtre de saisie des coordonnées apparaît : cliquez sur le bouton <b>Depuis le canevas de la carte</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_depuis_canevas.png">
								<img src="illustrations/tous/4_6_depuis_canevas.png" alt="fenêtre de saisie des coordonnées" width="570">
							</a>
						</figure>
						<p>Dans la fenêtre de QGIS, cliquez sur cette intersection sur les données OSM : les coordonnées de la fenêtre de saisie sont automatiquement remplies avec les coordonnées du point sur lequel vous venez de cliquer.</p>
						<figure>
							<a href="illustrations/tous/4_6_coord_remplies.png">
								<img src="illustrations/tous/4_6_coord_remplies.png" alt="les coordonnées sont remplies en fonction du point cliqué dans QGIS" width="600">
							</a>
						</figure>
						<p>Cliquez sur <b>OK</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_point_0.png">
								<img src="illustrations/tous/4_6_point_0.png" alt="point 0, dans la fenêtre du géoréférenceur et dans celle de QGIS" width="570">
							</a>
							<figcaption>Premier point : à gauche, dans la fenêtre de QGIS (données OSM) et à droite, dans la fenêtre du géoréférenceur.</figcaption>
						</figure>
						<p>Procédez de la même manière pour obtenir au moins six points de calage.</p>
						<p>Si vous avez besoin de <b>vous déplacer dans la fenêtre de QGIS avant de cliquer pour créer le point</b> : vous pouvez laisser la <b>barre d'espace</b> appuyée en bougeant la souris, et zoomer et dézoomer avec la molette. Vous pouvez aussi sélectionner l'outil <b>Se déplacer dans la carte</b> (icône de main) ; dans ce cas, revenez ensuite à la fenêtre du géoréférenceur et cliquez à nouveau sur le bouton <b>Depuis le canevas de la carte</b> pour créer le point.</p>
						<p>Ensuite, choisissez les <a href="04_04_parametrage.php">paramètres du géoréférencement</a> : vous pouvez choisir les mêmes que précédemment, mais <b>n'oubliez pas de sélectionner le SCR WGS84 Pseudo-Mercator EPSG:3857 au lieu du WGS84 EPSG:4326</b>.</p>
						<p><a href="04_05_lancement.php">Lancez le calage</a>.</p>
						<p>Une fois le calage terminé, vous pouvez en vérifier la précision en donnant de la transparence à votre image calée (dans les propriétés de la couche, rubrique Transparence) :</p>
						<figure>
							<a href="illustrations/tous/4_6_superposition.png">
								<img src="illustrations/tous/4_6_superposition.png" alt="Superposition de l'image calée et des données OSM" width="500">
							</a>
						</figure>
					</div>
					<p>L'image est calée, son SCR est WGS84 Pseudo-Mercator (vous pouvez le vérifier en allant dans les propriétés de la couche, rubrique Général). Si vous désirez modifier le SCR de cette couche, comme indiqué dans la <a href="02_04_changer_systeme.php#II42">partie II.4.2</a>, utilisez l'outil <b>Reprojeter une couche</b>.</p>
				<br>
				<a class="prec" href="04_05_lancement.php">chapitre précédent</a>
				<a class="suiv" href="05_00_numerisation.php">partie V : numérisation</a>
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
