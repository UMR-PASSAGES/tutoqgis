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
			<h2>III.4  Accéder aux données OpenStreetMap</h2>
				<ul class="listetitres">
					<li><a href="#III41">Qu'est-ce qu'OpenStreetMap ?</a></li>
					<li><a href="#III42">Téléchargement de données OpenStreetMap</a>
						<ul class="listesoustitres">
							<li><a href="#III42a">A partir du site Geofabrik</a></li>
							<li><a href="#III42b">A partir du site BBBike</a></li>
							<li><a href="#III42c">Représenter les données OpenStreetMap</a></li>
						</ul>
					</li>
					<li><a href="#III43">Charger des données OpenStreetMap à partir de QGIS</a>
					   <ul class="listesoustitres">
							<li><a href="#III43a">Depuis le menu Vecteur</a></li>
							<li><a href="#III43b">Avec l'extension QuickOSM</a></li>
						</ul>
					</li>
				</ul>
	
			<h3><a class="titre" id="III41">Qu'est-ce qu'OpenStreetMap ?</a></h3>
			
                <p><a class="ext" target="_blank" href="http://www.openstreetmap.org">OpenStreetMap ou OSM</a> est un projet qui a pour but de constituer une base de données géographiques libre du monde. A l'instar de <a class="ext" target="_blank" href="https://fr.wikipedia.org">Wikipédia</a>, tout un chacun peut participer et enrichir le projet. On peut donc visualiser, réutiliser et même après inscription modifier gratuitement les données.</p>
                <p>La partie la plus connue du projet est peut-être la visualisation des données OSM sous forme de <a class="ext" target="_blank" href="http://www.openstreetmap.org/#map=19/44.79461/-0.61780" >carte</a> ; mais OSM est avant tout un ensemble de <a class="ext" target="_blank" href="https://www.openstreetmap.org/way/226888023">données</a> géographiques, utilisables entre autres dans un logiciel SIG.</p>
                <p>Les attributs des données OSM sont des paires <b>clé=valeur</b> (key=value). Un élément peut par exemple être caractérisé par <b>l'attribut</b> (tag) <b>waterway=river</b> pour indiquer qu'il s'agit d'un cours d'eau de type rivière. Un élément peut être caractérisé par plusieurs attributs (plusieurs paires clé=valeur).</p>
                <p>Il existe plusieurs valeurs possibles pour chaque clé, la clé <b>waterway</b> peut par exemple avoir comme valeur <b>river</b> (rivière), <b>stream</b> (ruisseau), <b>canal</b>... Retrouvez <a target="_blank" class="ext" href="http://wiki.openstreetmap.org/wiki/FR:%C3%89l%C3%A9ments_cartographiques">ici</a> la liste des clés et des valeurs couramment utilisées.</p>
                <p>Nous allons découvrir ici différentes manières d'utiliser les données OSM dans QGIS. Il est possible non seulement de télécharger ces données à partir de différents sites pour ensuite les ajouter à QGIS, mais également de les charger directement dans QGIS.</p>
                <p>Si vous désirez simplement <b>visualiser un fond OSM</b>, sans accéder aux données elles mêmes, référez-vous plutôt ici : <a href="04_06_calage_autre_couche.php#IV61">Installation de l'extension QuickMapServices</a> et <a href="04_06_calage_autre_couche.php#IV62">Ajout des données OpenStreetMap</a>.</p>
                
			<h3><a class="titre" id="III42">Téléchargement de données OpenStreetMap</a></h3>
			
			    <p>Il existe plusieurs possibilités pour <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/Downloading_data">télécharger des données OSM</a>, notamment <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/Shapefiles#Download_shapefiles">au format Shapefile</a>.</p>
			
                <h4><a class="titre" id="III42a">A partir du site Geofabrik</a></h4>
                
                    <p>Nous utiliserons ici les données créées par <a class="ext" target="_blank" href="http://www.geofabrik.de/">Geofabrik</a>, une société allemande spécialisée dans les services autour d'OpenStreetMap. Les données sont extraites d'OpenStreetMap et mises à jour quotidiennement. Il est possible de les télécharger par continent, sous-région, pays et parfois région au sein du pays.</p>
                    
                    <div class="manip">
                        <p>Dans un navigateur internet, rendez-vous sur <a class="ext" target="_blank" href="http://download.geofabrik.de/" >http://download.geofabrik.de/</a>.</p>
                    </div>
                    <p>Il est possible de télécharger les données par continent, pays, et parfois région. Nous allons ici télécharger les données du Suriname en Amérique du Sud.</p>
                    <div class="manip">
                         <p>Dans la colonne <b>Sub-Region</b>, cliquez sur <b>South America</b>, puis sur <b>Suriname</b>.</p>
                         <figure>
                        	<a href="illustrations/tous/3_4_geofabrik_suriname.png" >
                        		<img src="illustrations/tous/3_4_geofabrik_suriname.png" alt="lien pour télécharger les données du Suriname au format SHP sur Geofabrik" width="600">
                        	</a>
                        </figure>
                         <p>Les données sont disponibles sous différents formats ; nous utiliserons ici le format Shapefile, facile d'utilisation sous QGIS. Cliquez sur le lien <a class="ext" target="_blank" href="http://download.geofabrik.de/south-america/suriname-latest-free.shp.zip" >suriname-latest-free.shp.zip</a> et enregistrez le fichier sur votre ordinateur.</p>
                         <p class="note">Au cas où le téléchargement échouerait, ces données sont également disponibles ici : <b>TutoQGIS_03_RechercheDonnees/donnees/suriname-latest-free.shp.zip</b>.</p>
                         <p>Décompressez le fichier ZIP obtenu dans votre répertoire de travail : vous obtenez une série de couches au format Shapefile.</p>
                         <p>Que contiennent ces données ? Pour le savoir, cliquez sur le lien <a class="ext" target="_blank" href="http://download.geofabrik.de/osm-data-in-gis-formats-free.pdf" >Format description PDF</a> à la suite du lien précédent, toujours sur la page internet de Geofabrik pour le Suriname. Dans ce PDF sont décrites les données.</p>
                    </div>
                    <p class="note">Notez que les noms de couches correspondante au clés des attributs OSM. Par exemple, la couche <em class="data">gis.osm_waterways_free_1</em> regroupe les éléments ayant la clé <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/FR:Key:waterway">waterway</a>.</p>
                    <div class="manip">
                         <p>Dans un nouveau projet QGIS, ajoutez ces données. Ouvrez la table attributaire de la couche <em class="data">gis.osm_waterways_free_1</em>.</p>
                         <p>Les valeurs du champ <b>fclass</b> correspondent aux différentes valeurs prises par la clé de la couche pour chaque élément. On trouve par exemple les valeurs river, stream, canal et drain.</p>
                    </div>
                   
                    
                <h4><a class="titre" id="III42b">A partir du site BBBike</a></h4>
                
                    <p>Nous allons voir ici une manipulation similaire, mais à partir d'un autre site, qui permet la définition d'une zone d'intérêt de votre choix (GeoFabrik ne proposant que des zones prédéfinies).</p>
                    <p><a class="ext" target="_blank" href="http://www.bbbike.org/fr/" >BBBike</a> est un site proposant du calcul d'itinéraire vélo à partir des données OSM, et également de télécharger des extractions des données OSM.</p>
                    
                    <div class="manip">
                        <p>A partir de votre navigateur internet, rendez-vous sur <a class="ext" target="_blank" href="http://extract.bbbike.org/" >http://extract.bbbike.org/</a> :</p>
                         <figure>
                        	<a href="illustrations/tous/3_4_bbbike_bb.png" >
                        		<img src="illustrations/tous/3_4_bbbike_bb.png" alt="interface de définition d'une zone d'intérêt sur BBBike" width="300">
                        	</a>
                        </figure>
                    <ul>
                        <li class="espace"><b>Format :</b> Shapefile (Esri)</li>
                        <li class="espace"><b>Your email address :</b> tapez votre adresse courriel</li>
                        <li class="espace"><b>Name of area extract :</b> Suriname, puis cliquez juste au-dessus sur <b>or search</b> et choisissez <b>1. Suriname</b></li>
                        <li class="espace">En-dessous du bouton Extract, cliquez sur le bouton <b>here</b>.</li>
                    </ul>
                    <p>Vous pouvez ensuite modifiez la zone d'extraction en choisissant l'une ou l'autre option <b>add points to polygon</b> ou <b>resize or drag polygon</b>, en cliquant ensuite sur la zone et en faisant glisser les points orange.</p>
                    <figure>
                    	<a href="illustrations/tous/3_4_bbbike_resize_bb.png" >
                    		<img src="illustrations/tous/3_4_bbbike_resize_bb.png" alt="Modification de la zone d'intérêt sur BBBike" width="600">
                    	</a>
                    </figure>
                    <p>Une fois la zone d'intérêt définie à votre convenance, cliquez sur le bouton <b>Extract</b> et patientez un peu avant de recevoir un courriel avec un lien de téléchargement.</p>
                    <p>Cliquez sur ce lien, enregistrez les données et décompressez-les.</p>
                    <p class="note">Au cas où le téléchargement échouerait, ces données sont également disponibles ici : <b>TutoQGIS_03_RechercheDonnees/donnees/planet_-59.148,1.593_-52.107,6.385.osm.shp.zip</b>.</p>
                    <p>Vous obtenez une série de fichiers au format shapefile que vous pouvez ajouter dans QGIS.</p>
                    </div>
                    
                <h4><a class="titre" id="III42c">Représenter les données OpenStreetMap</a></h4>
                
                    <p>Les données OpenStreetMap ajoutées dans QGIS, comme toute autre donnée, ont un style &#171; par défaut &#187;, ne convenant pas pour une carte. Nous allons voir ici comment représenter ces données pour obtenir quelque chose de similaire à ceci :</p>
                    <figure>
                    	<a href="illustrations/tous/3_4_style_resultat.png" >
                    		<img src="illustrations/tous/3_4_style_resultat.png" alt="Exemple de données OSM stylées, grande échelle" width="500">
                    	</a>
                    </figure>
                    
                    <div class="manip">
                        <p>Chargez dans QGIS les couches GeoFabrik suivantes :</p>
                        <ul>
                            <li>qgis.osm_roads_free.1</li>
                            <li>qgis.osm_buildings_a_free.1</li>
                            <li>qgis.osm_railways_free.1</li>
                            <li>qgis.osm_waterways_free.1</li>
                            <li>qgis.osm_water_a_free.1</li>
                            <li>qgis.osm_natural_a_free.1</li>
                            <li>qgis.osm_landuse_a_free.1</li>
                        </ul>
                        <p>Une dernière couche sera nécessaire : ajoutez également <em class="data">land_polygons_suriname</em> présente dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
                    </div>
                    <p>Dans QGIS, le style d'une couche est enregistré dans le projet. Il est également possible de créer des fichiers de style, au format <b>QML</b> (fichier de style QGIS, propre au logiciel) ou <b>SLD</b> (Style Layer Descriptor, utilisé plus largement en cartographie web).</p>
                    <p>Nous allons ici charger pour chaque couche un fichier de style QML approprié. Ces fichiers ont été élaborés à partir de ceux créés par Charley Glynn et disponibles sur <a class="ext" target="_blank" href="https://github.com/charleyglynn/OSM-Shapefile-QGIS-stylesheets" >https://github.com/charleyglynn/OSM-Shapefile-QGIS-stylesheets</a>.</p>
                    <p>Ces fichiers de style sont adaptés pour un SCR projeté, car certaines taille de symboles sont définies en suivant les unités de la carte et adaptés pour des unités métriques et non en degrés. La première étape consistera donc à adopter un SCR projeté.</p>
                    <div class="manip">
                        <p><a href="02_04_changer_systeme.php#II41">Modifiez le SCR du projet</a> pour choisir par exemple le SCR World_Robinson (code EPSG 54030), et activez la projection à la volée.</p>
                        <p>Modifiez l'ordre des couches pour obtenir ceci :</p>
                         <figure>
                        	<a href="illustrations/tous/3_4_ordre_couches.png" >
                        		<img src="illustrations/tous/3_4_ordre_couches.png" alt="Ordre des couches OSM" width="250">
                        	</a>
                        </figure>
                        <p>Ouvrez la fenêtre <b>Propriétés</b> de la couche <em class="data">gis.osm_roads_free_1</em>, rubrique <b>Style</b> :</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_charger_style.png" >
                        		<img src="illustrations/tous/3_4_charger_style.png" alt="Charger un style" width="600">
                        	</a>
                        </figure>
                        <p>En bas de la fenêtre, cliquez sur la liste déroulante <b>Style</b> puis sur <b>Charger le style</b>.</p>
                        <p>Sélectionnez ensuite le fichier de style <b>roads.qml</b> situé dans le dossier <b>TutoQGIS_03_RechercheDonnees/legendes</b>.</p>
                        <p>Cliquez sur <b>OK</b> pour fermer la fenêtre des propriétés.</p>
                        <p>Zoomez et dézoomez : le style change suivant le niveau de zoom.</p>
                        <p>Procédez de manière similaire pour chacune des couches, en choisissant à chaque fois le fichier de style approprié.</p>
                        <p>Pour finir, donnez un fond bleu à votre carte : <b>menu Projet &#8594; Propriétés du projet &#8594; rubrique Général</b> : cliquez sur la couleur à droite de <b>Couleur du fond</b>.</p>
                        <p>Dans la boîte de dialogue qui s'affiche alors, choisissez une couleur pour la mer, par exemple dans l'exemple ci-dessous <b>R 184 V 217 B 247</b>.</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_couleur_rvb.png" >
                        		<img src="illustrations/tous/3_4_couleur_rvb.png" alt="Choix d'une couleur RVB" width="300">
                        	</a>
                        </figure>
                        <p class="note">Notez qu'une manipulation équivalente peut être effectuée dans le <a href="10_02_mise_en_page.php#X22">composeur d'impression</a>, sans changer la couleur de fond dans QGIS.</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_style_resultat_2.png" >
                        		<img src="illustrations/tous/3_4_style_resultat_2.png" alt="Exemple de données OSM stylées, petite échelle" width="500">
                        	</a>
                        </figure>
                    </div>
                    <p>Vous pouvez ensuite si vous le désirez modifier le style des couches pour créer votre propre version. Pour enregistrer un fichier de style QML, procédez comme pour charger un style, mais choisissez <b>Enregistrer le style</b> &#8594; <b>Fichier de style de couche QGIS</b>.</p>
               
                
			<h3><a class="titre" id="III43">Charger des données OpenStreetMap à partir de QGIS</a></h3>
			
			    <p>Il est également possible de charger des données OSM directement à partir de QGIS, sans passer par un navigateur internet.</p>
			
                <h4><a class="titre" id="III43a">Depuis le menu Vecteur</a></h4>
                
                    <div class="manip">
                        <p>Dans un nouveau projet QGIS, ajoutez la couche <em class="data">ne_10m_admin_0_countries</em> située dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>. Zoomez sur le Suriname.</p>
                        <p><a class="thumbnail_bottom" href="#thumb">Menu Vecteur &#8594; OpenStreetMap &#8594; Télécharger des Données OSM...
                        	<span>
                        		<img src="illustrations/tous/3_4_qgis_osm_menu.png" alt="Menu Vecteur, OpenStreetMap, Télécharger des Données OSM" height="300" >
                        	</span>
                        </a> :</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_qgis_osm_fenetre.png" >
                        		<img src="illustrations/tous/3_4_qgis_osm_fenetre.png" alt="Fenêtre de téléchargement des données OSM" width="375">
                        	</a>
                        </figure>
                        <ul>
                            <li class="espace"><b>Emprise :</b> laissez l'option par défaut <b>Depuis le canevas de la carte</b></li>
                            <li class="espace"><b>Fichier en sortie :</b> cliquez sur les <b>...</b> à droite, naviguez vers le dossier où vous voulez enregistrer vos données, et donnez un nom au fichier qui sera créé, par exemple <b>suriname.osm</b>. Attention, il faut bien écrire l'extension <b>.osm</b>.</li>
                            <li class="espace">Cliquez sur <b>OK</b>, patientez...</li>
                        </ul>
                        <p>Une fois les données téléchargées sur votre ordinateur, ajoutez-le fichier <em class="data">suriname.osm</em> en procédant comme pour une couche shapefile. La fenêtre suivante s'ouvre :</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_qgis_osm_ajout.png" >
                        		<img src="illustrations/tous/3_4_qgis_osm_ajout.png" alt="Fenêtre s'affichant pour le chargement d'un fichier OSM" width="500">
                        	</a>
                        </figure>
                        <p>Sélectionnez les toutes les lignes sauf celle de la couche <b>other_relations</b>, au moyen de la touche Ctrl, cette couche contenant plusieurs types de géométrie et provoquant un message d'erreur dans QGIS. Cliquez sur <b>OK</b>.</p>
                        <p>Les données s'affichent avec des couleurs aléatoires.</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_qgis_osm_resultat.png" >
                        		<img src="illustrations/tous/3_4_qgis_osm_resultat.png" alt="Données OSM dans QGIS, couleurs aléatoires" width="500">
                        	</a>
                        </figure>
                        <p>Comme vu <a href="03_04_donnees_osm.php#III42c">précédemment</a>, il est possible de donner des styles pré-déterminés à ces données. Nous allons utiliser ici les styles élaborés par Anita Graser et disponibles <a class="ext" target="_blank" href="https://github.com/anitagraser/QGIS-resources/tree/master/qgis2/osm_spatialite">ici</a>.</p>
                        <p>Ouvrez les propriétés de la couche <em class="data">suriname lines</em>, rubrique style, cliquez sur le bouton <b>Style</b> en bas à gauche et choisissez <b>Charger le style</b>.</p>
                        <p>Sélectionnez le fichier osm_spatialite_googlemaps_lines.qml situé dans le dossier <b>TutoQGIS_03_RechercheDonnees/legendes</b>.</p>
                        <p>De la même manière, sélectionnez les fichiers de style correspondant aux autres couches :</p>
                        <ul>
                            <li class="espace"><em class="data">suriname points</em> : fichier de style <b>osm_spatialite_googlemaps_places.qml</b></li>
                            <li class="espace"><em class="data">suriname multilinestrings</em> : fichier de style <b>osm_spatialite_googlemaps_lines.qml</b></li>
                            <li class="espace"><em class="data">suriname multipolygons</em> : fichier de style <b>osm_spatialite_googlemaps_places.qml</b></li>
                        </ul>
                        <p>Ajustez éventuellement l'ordre des couches. Les données s'affichent alors avec un style type Google Maps :</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_qgis_osm_resultat_style.png" >
                        		<img src="illustrations/tous/3_4_qgis_osm_resultat_style.png" alt="Données OSM dans QGIS, couleurs aléatoires" width="500">
                        	</a>
                        </figure>
                    </div>
                
                <h4><a class="titre" id="III43b">Avec l'extension QuickOSM</a></h4>
				
				    <p>Cette extension permet le téléchargement de données OSM sous forme de couches temporaires, pour l'emprise de votre choix.</p>
				    <p>Elle offre par rapport aux solutions précédentes une possibilité supplémentaire : <b>choisir la clé et les valeurs voulues</b>. Vous pouvez ainsi télécharger uniquement les cours d'eau de type rivière pour une zone.</p>
				    <div class="manip">
				        <p>Ouvrez un nouveau projet QGIS. Ajoutez la couche <em class="data">ne_10m_admin_0_countries</em> située dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>. Zoomez sur le Suriname.</p>
				        <p>Pour <b>installer l'extension QuickOSM</b>, en vous référant si nécessaire <a href="04_06_calage_autre_couche.php#IV61">ici</a> pour plus de détails (cette étape nécessite une connexion internet) :</p>
				        <ul>
				            <li>rendez-vous dans le <b>menu Extensions &#8594; Installer/Gérer les extensions</b>, rubrique <b>Toutes</b></li>
				            <li>tapez <b>quickosm</b> dans la barre de recherche en haut</li>
				            <li>cliquez sur le nom de l'extension puis sur le bouton <b>Installer l'extension</b> en bas à droite</li>
				            <li>Fermez la fenêtre du gestionnaire d'extension.</li>
				        </ul>
				        <p>Pour accéder à QuickOSM : <b>menu Vecteur &#8594; Quick OSM &#8594; QuickOSM</b>. La fenêtre suivante s'ouvre :</p>
				        <figure>
                        	<a href="illustrations/tous/3_4_quickosm_fenetre.png" >
                        		<img src="illustrations/tous/3_4_quickosm_fenetre.png" alt="Fenêtre de QuickOSM, choix des options" width="600">
                        	</a>
                        </figure>
                        <p>Dans la rubrique <b>Requête rapide</b> :</p>
                        <ul>
                            <li class="espace">Choisissez la clé <b>waterway</b> puis la valeur <b>river</b> pour ne récupérer que les cours d'eau de type rivière</li>
                            <li class="espace">Sélectionnez l'option <b>Emprise de la vue actuelle</b> pour limiter le volume de données à charger</li>
                            <li class="espace">Cliquez sur <b>Avancé</b> pour choisir le type de données à récupérer : ici, uniquement les <b>lignes, multilignes et multipolygones</b></li>
                            <li class="espace">Cliquez enfin sur le bouton <b>Exécuter</b>.</li>
                        </ul>
                        <p>Patientez... Les données d'affichent dans QGIS :</p>
                        <figure>
                        	<a href="illustrations/tous/3_4_quickosm_resultat.png" >
                        		<img src="illustrations/tous/3_4_quickosm_resultat.png" alt="Aperçu des données récupérées avec OSM : rivières du Suriname" width="600">
                        	</a>
                        </figure>
				    </div>
				    <p>Ces données sont temporaires&nbsp;: pour les sauvegarder, clic droit sur la couche &#8594; Enregistrer sous...</p>
				    <p>Pour savoir où sont stockées les données temporaires : propriétés de la couche, rubrique Général, Source de la couche.</p>
				    <p>Nous avons vu ici quelques méthodes pour accéder aux données OSM dans QGIS, mais il en existe d'autres !</p>
	
			<br>
			<a class="prec" href="03_03_donnees_XY.php">chapitre précédent</a>
			<a class="suiv" href="04_00_georeferencement.php">partie IV : géoréférencement</a>
			<br>
			<a class="hautpage" href="#wrap">haut de page</a>						
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_3.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
