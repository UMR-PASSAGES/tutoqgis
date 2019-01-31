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
					<li><a href="#IV61">Installation de l'extension QuickMapServices</a></li>
					<li><a href="#IV62">Ajout des données OpenStreetMap</a></li>
					<li><a href="#IV63">Zoom sur la zone d'étude avec l'extension GeoSearch</a></li>
					<li><a href="#IV64">Création des points de calage</a></li>
				</ul>
				<br>
			
			
			
				<p>Comme expliqué dans la <a href="04_01_principe.php#IV12" >partie IV.1.2</a>, il est également possible de se baser sur une couche de référence pour géoréférencer une image.</p>
				<p>La manipulation sera la même que décrite dans les précédentes parties, sauf en ce qui concerne la création des points de calage. Seule cette partie sera donc décrite ici.</p>
				<p>L'image que nous allons caler est une carte de Doncaster East, dans la banlieue de Melbourne (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File:Doncaster_east_locality_map.PNG">Wikimedia</a>).</p>
				<p>Pour caler cette carte, nous allons nous baser sur les données <a class="ext" target="_blank" href="http://www.openstreetmap.org/">OpenStreetMap</a>. OpenStreetMap est une base de données cartographique libre ; on décrit souvent ce projet comme un "wikipedia cartographique".</p>
			
				<h3><a class="titre" id="IV61">Installation de l'extension QuickMapServices</a></h3>
					
					<p>Accéder aux données OpenStreetMap dans QGIS requiert l'utilisation d'une extension nommée QuickMapServices. Cette extension permet également d'afficher les données Google Maps ainsi que beaucoup d'autres.</p>
					<p class="note">L'extension QuickMapServices est similaire à l'extension <b>OpenLayers</b> sur laquelle elle est d'ailleurs basée, mais propose plus de couches et utilise un serveur de <a class="ext" target="_blank" href="http://www.neogeo-online.net/blog/archives/1727/">tuilage</a>, ce qui semble provoquer moins d'erreur lors de changements de niveau de zoom et de SCR.</p>
					<div class="manip">
						<p>Ouvrez tout d'abord un nouveau projet QGIS.</p>
						<p>Pour installer QuickMapServices : 
							<a class="thumbnail_bottom" href="#thumb">Menu Extension &#8594; Installer/Gérer les extensions
								<span>
									<img src="illustrations/tous/4_6_extensions_menu.png" alt="Menu Extension, Installer/Gérer les extensions" height="100" >
								</span>
							</a>	
						 : la fenêtre du gestionnaire d'extensions s'ouvre.</p>
						<figure>
							<a href="illustrations/tous/4_6_install_quickmapservices.png" >
								<img src="illustrations/tous/4_6_install_quickmapservices.png" alt="Installation de QuickMapServices" height="310">
							</a>
						</figure>
						<p>Dans la rubrique <b>Tout</b>, tapez &#171; quickmap &#187; dans la partie <b>Rechercher</b> pour limiter les résultats, sélectionner <b>QuickMapServices</b> puis cliquez sur <b>Installer l'extension</b> en bas à droite de la fenêtre.</p>
						<p>Fermez la fenêtre du gestionnaire d'extensions.</p>
					</div>
						
				<h3><a class="titre" id="IV62">Ajout des données OpenStreetMap</a></h3>
				
				    <div class="manip">
				        <p>Vous pouvez commencer par ajouter la couche <em class="data">ne_10m_admin_0_countries</em>, située dans le dossier <b>TutoQGIS_04_Georef/donnees</b>.</p>
				        <div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">Dans quel système de coordonnées est votre projet ?</label></p>
							<p class="reponse">Comme vous pouvez le voir dans le coin en bas à droite de la fenêtre, ou bien menu Projet, propriétés du projet, le <a href="02_03_couches_projets.php#II31">SCR du projet</a> est le WGS84, EPSG:4326.</p>
						</div>
						<p>Pour ajouter les données OSM : le menu QuickMapServices est maintenant visible dans le menu Internet. Chargez la couche <b>MapQuest OSM</b> dans la rubrique MapQuest.</p>
						<figure>
							<a href="illustrations/tous/4_6_menu_quickmapservices.png" >
								<img src="illustrations/tous/4_6_menu_quickmapservices.png" alt="Menu QuickMapServices" width="625">
							</a>
						</figure>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Dans quel système de coordonnées est votre projet ?</label></p>
							<p class="reponse">Le <a href="02_03_couches_projets.php#II31">SCR du projet</a> est maintenant le WGS84 projection Pseudo Mercator, EPSG:3857.</p>
						</div>
						<p><b>A l'ajout de données de l'extension QuickMapServices, le SCR du projet est automatiquement modifié en WGS84 Pseudo-Mercator</b>, qui est le SCR utilisé notamment par Google Maps.</p>
					</div>
						<p class="note">Notez qu'il est possible de désactiver ce comportement dans les paramètres de QuickMapServices (menu Internet, QuickMapServices, Settings, onglet Général).</p>
				
				<h3><a class="titre" id="IV63">Zoom sur la zone d'étude avec l'extension GeoSearch</a></h3>
				
				    <p>Nous cherchons ici à zoomer sur la zone qui concerne notre carte, à savoir Doncaster East dans le banlieue de Melbourne, en Australie. Il est bien sûr possible d'utiliser les outils de zoom pour cela, mais nous allons en profiter pour découvrir une autre méthode parfois bien pratique, avec l'extension GeoSearch.</p>
				    <div class="manip">
						<p>Commençons par installer l'extension GeoSearch : procédez comme pour QuickMapServices, via le <b>menu Extensions &#8594; Installer/Gérer les extensions</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_install_geosearch.png">
								<img src="illustrations/tous/4_6_install_geosearch.png" alt="Installation de l'extension GeoSearch" height="300">
							</a>
						</figure>
						<p>GeoSearch est ensuite accessible via le 
    						<a class="thumbnail_bottom" href="#thumb">menu Extensions &#8594; GeoSearch &#8594; GeoSearch
                            	<span>
                            		<img src="illustrations/tous/4_6_geosearch_menu.png" alt="Menu Extensions, Geosearch, GeoSearch" height="300" >
                            	</span>
                            </a>
                        <figure>
							<a href="illustrations/tous/4_6_geosearch.png">
								<img src="illustrations/tous/4_6_geosearch.png" alt="Utilisation de l'extension GeoSearch" height="450">
							</a>
						</figure>
						<p>Dans la zone <b>Address</b>, tapez : <b>Doncaster East, Melbourne, Australia</b> puis cliquez sur le bouton <b>Search</b> : une ligne correspondant à ce lieu apparaît dans la liste en bas de la fenêtre.</p>
						<p>En double-cliquant sur cette ligne, vous centrez la carte sur ce lieu ; en utilisant les outils de zoom et GeoSearch, vous pouvez donc vous rapprocher de la zone correspondant à notre carte à caler :</p>
						<figure>
						  <a href="illustrations/tous/4_6_osm_zoom1.png" >
							<img src="illustrations/tous/4_6_osm_zoom1.png" alt="Données OSM : Melbourne" height="300">
						  </a>
						</figure>
					</div>
					
					<p class="note">Notez qu'une couche temporaire <b>GeoSearch</b> a été ajoutée à votre projet ; vous pouvez également faire un clic droit dessus, zoomer sur la couche.</p>
					<div class="manip">
						<p>Zoomez maintenant sur Doncaster East (pour vous aider : <a class="ext" target="_blank" href="http://www.openstreetmap.org/relation/2390038#map=13/-37.7776/145.1615" >carte OpenStreetMap de Doncaster Est</a>).</p>
						<figure>
							<a href="illustrations/tous/4_6_osm_doncaster_east.png">
								<img src="illustrations/tous/4_6_osm_doncaster_east.png" alt="Doncaster East : données OSM et carte à caler en vis à vis" height="300">
							</a>
						</figure>
					</div>
					<p>Nous allons maintenant pouvoir procéder à la création des points de calage.</p>
					
				<h3><a class="titre" id="IV64">Création des points de calage</a></h3>
					
					<div class="manip">
						<p>Ouvrez la fenêtre du géoréférenceur et ajoutez l'image à caler : <em class="data">Doncaster_east_locality_map.PNG</em> située dans le dossier <b>TutoQGIS_04_Georef/donnees</b> (si nécessaire, aidez-vous pour cela du début de la <a href="04_03_calage_carroyage.php#IV31">partie IV.3.1</a>).</p>
						<p>Lorsque QGIS vous demande dans quel SCR est cette image, choisissez le <b>WGS84 / Pseudo-Mercator EPSG:3857</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_scr_3857.png">
								<img src="illustrations/tous/4_6_scr_3857.png" alt="choix du scr wgs84 pseudo-mercator epsg:3857" height="500">
							</a>
						</figure>
						<p>Cliquez sur une intersection de routes, par exemple entre Reynolds Road et Blackburn Road. La fenêtre de saisie des coordonnées apparaît : cliquez sur le bouton <b>Depuis le canevas de la carte</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_depuis_canevas.png">
								<img src="illustrations/tous/4_6_depuis_canevas.png" alt="fenêtre de saisie des coordonnées" height="170">
							</a>
						</figure>
						<p>Dans la fenêtre de QGIS, cliquez sur cette intersection sur les données OSM : les coordonnées de la fenêtre de saisie sont automatiquement remplies avec les coordonnées du point sur lequel vous venez de cliquer.</p>
						<figure>
							<a href="illustrations/tous/4_6_coord_remplies.png">
								<img src="illustrations/tous/4_6_coord_remplies.png" alt="les coordonnées sont remplies en fonction du point cliqué dans QGIS" height="170">
							</a>
						</figure>
						<p>Cliquez sur <b>OK</b>.</p>
						<figure>
							<a href="illustrations/tous/4_6_point_0.png">
								<img src="illustrations/tous/4_6_point_0.png" alt="point 0, dans la fenêtre du géoréférenceur et dans celle de QGIS" height="300">
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
								<img src="illustrations/tous/4_6_superposition.png" alt="Superposition de l'image calée et des données OSM" height="500">
							</a>
						</figure>
					</div>
					<p>L'image est calée, son SCR est WGS84 Pseudo-Mercator (vous pouvez le vérifier en allant dans les propriétés de la couche, rubrique Général). Si vous désirez modifier le SCR de cette couche, comme indiqué dans la <a href="02_04_changer_systeme.php#II42">partie II.4.2</a>, clic-droit sur le nom de la couche, Enregistrer sous...</p>
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
