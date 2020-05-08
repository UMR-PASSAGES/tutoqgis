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
			<h2>III.5  QGIS et OpenStreetMap</h2>
				<ul class="listetitres">
					<li><a href="#III51">Qu'est-ce qu'OpenStreetMap ?</a></li>
					<li><a href="#III52">Visualiser un fonds OpenStreetMap</a>
					   <ul class= "listesoustitres">
						   <li><a href="#III52a" >Via l'explorateur</a></li>
					       <li><a href="#III52b" >Avec l'extension QuickMapServices</a></li>
					   </ul>
					</li>
					<li><a href="#III53">Télécharger des données OpenStreetMap</a></li>
					<li><a href="#III54">Représenter des données OpenStreetMap</a></li>
					<li><a href="#III55">Charger des données OpenStreetMap à partir de QGIS</a></li>
				</ul>
	
			<h3><a class="titre" id="III51">Qu'est-ce qu'OpenStreetMap ?</a></h3>
			
                <p><a class="ext" target="_blank" href="http://www.openstreetmap.org">OpenStreetMap ou OSM</a> est un projet qui a pour but de constituer une base de données géographiques libre du monde. A l'instar de <a class="ext" target="_blank" href="https://fr.wikipedia.org">Wikipédia</a>, tout un chacun peut participer et enrichir le projet. On peut donc visualiser, réutiliser et même après inscription modifier gratuitement les données.</p>
                <p>La partie la plus connue du projet est peut-être la visualisation des données OSM sous forme de <a class="ext" target="_blank" href="http://www.openstreetmap.org/#map=19/44.79461/-0.61780" >carte</a> ; mais OSM est avant tout un ensemble de <a class="ext" target="_blank" href="https://www.openstreetmap.org/way/226888023">données</a> géographiques, utilisables entre autres dans un logiciel SIG.</p>
                <p>Les attributs des données OSM sont des paires <b>clé=valeur</b> (key=value). Un élément peut par exemple être caractérisé par <b>l'attribut</b> (tag) <b>waterway=river</b> pour indiquer qu'il s'agit d'un cours d'eau de type rivière. Un élément peut être caractérisé par plusieurs attributs (plusieurs paires clé=valeur).</p>
                <p>Il existe plusieurs valeurs possibles pour chaque clé, la clé <b>waterway</b> peut par exemple avoir comme valeur <b>river</b> (rivière), <b>stream</b> (ruisseau), <b>canal</b>... Retrouvez <a target="_blank" class="ext" href="http://wiki.openstreetmap.org/wiki/FR:%C3%89l%C3%A9ments_cartographiques">ici</a> la liste des clés et des valeurs couramment utilisées.</p>
                <p>Nous allons découvrir ici différentes manières pour non seulement visualiser un fonds OSM, mais également pour utiliser les données OSM dans QGIS. Il est possible de télécharger ces données à partir de différents sites pour ensuite les ajouter à QGIS, mais aussi de les charger directement dans QGIS.</p>
                <p>Si vous désirez simplement <b>visualiser un fond OSM</b>, sans accéder aux données elles mêmes, référez-vous plutôt ici : <a href="04_06_calage_autre_couche.php#IV61">Installation de l'extension QuickMapServices</a> et <a href="04_06_calage_autre_couche.php#IV62">Ajout des données OpenStreetMap</a>.</p>
                
			<h3><a class="titre" id="III52">Visualiser un fonds OpenStreetMap</a></h3>
			
			<p>Il s'agira ici de simplement visualiser les données OSM comme un fonds raster, c'est-à-dire une image non modifiable. OSM étant une base de données, il est possible de représenter ces données comme on le souhaite ; plusieurs organismes proposent ainsi leur représentation des données OSM. Ces représentations peuvent avoir des objectifs différents : servir de fonds de carte discret, représenter les itinéraires cyclables, les données utiles pour les organisations humanitaires...</p>
			
			<p>Il est possible d'afficher un fonds OpenStreetMap, comme décrit précédemment, soit <a href="03_04_fonds_carte.php#III42">via l'explorateur avec un serveur de tuiles</a>, soit <a href="03_04_fonds_carte.php#III43">via l'extension QuickMapServices</a>.</p>
			
			 <p>Si vous choisissez la première méthode, voici comment ajouter de nombreux fonds utilisant les données OSM :</p>
	        
	        <div class="manip">
	            <p>Dans un navigateur internet, rendez-vous dans <a target="_blank" class="ext" href="https://wiki.openstreetmap.org/wiki/Tile_servers">la page du wiki OSM dédiée aux serveurs de tuiles raster</a> : cette page liste les adresses des fonds de carte utilisant les données OSM accessibles en ligne.</p>
	            <p>Ici, nous allons ajouter le fonds <b>Stamen Toner</b> en noir et blanc.</p>
	            <figure>
                	<a href="illustrations/tous/3_5_stamen_toner.png" >
                	    <img src="illustrations/tous/3_5_stamen_toner.png" alt="page du wiki OSM sur les serveurs de tuiles, ligne correspondant au fonds Stamen Toner" width="100%">
                    </a>
                </figure>
	            <p>Copiez l'url du serveur : <b>http://a.tile.stamen.com/toner/${z}/${x}/${y}.png</b></p>
	            <p>Dans QGIS, panneau explorateur, clic-droit sur XYZ Tiles &#8594; Nouvelle connexion...</p>
	            <figure>
                	<a href="illustrations/tous/3_5_stamen_connexion.png" >
                	    <img src="illustrations/tous/3_5_stamen_connexion.png" alt="Fenêtre de nouvelle connexion à un serveur de tuiles" width="80%">
                    </a>
                </figure>
                <ul>
                    <li>Nom : il s'agit du nom qui apparaîtra dans le panneau explorateur, vous pouvez taper par exemple <b>Stamen Toner</b></li>
                    <li>URL : collez l'URL que vous avez préalablement copiée, et <b>supprimez les &#171;&nbsp;$&nbsp;&#187;</b> : l'URL finale est donc <b>http://a.tile.stamen.com/toner/{z}/{x}/{y}.png</b></li>
                </ul>
                <p>Laissez les valeurs par défaut pour les autres paramètres, cliquez sur OK.</p>
                <p>Le fonds Stamen Toner apparaît maintenant avec les autres fonds dans la rubrique XYZ Tiles.</p>
                <figure>
                    <a href="illustrations/tous/3_5_stamen_xyz.png" >
                	    <img src="illustrations/tous/3_5_stamen_xyz.png" alt="panneau explorateur, rubrique XYZ Tiles : le fonds Stamen Toner apparaît avec les autres" width="80%">
                	</a>
                </figure>
                <p>Double-cliquez pour l'ajouter :</p>
                <figure>
                	<a href="illustrations/tous/3_5_stamen_visu.png" >
                	    <img src="illustrations/tous/3_5_stamen_visu.png" alt="Aperçu du fonds Stamen Toner" width="70%">
                    </a>
                </figure>
	        </div>
			   
			
			<h3><a class="titre" id="III43">Télécharger des données OpenStreetMap</a></h3>
			
			    <p>Il existe plusieurs possibilités pour <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/Downloading_data">télécharger des données OSM</a>, notamment <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/Shapefiles#Download_shapefiles">au format Shapefile</a>.</p>
			
                <p>Nous utiliserons ici les données créées par <a class="ext" target="_blank" href="http://www.geofabrik.de/">Geofabrik</a>, une société allemande spécialisée dans les services autour d'OpenStreetMap. Les données sont extraites d'OpenStreetMap et mises à jour quotidiennement. Il est possible de les télécharger par continent, sous-région, pays et parfois région au sein du pays.</p>
                
                <div class="manip">
                    <p>Dans un navigateur internet, rendez-vous sur <a class="ext" target="_blank" href="http://download.geofabrik.de/" >http://download.geofabrik.de/</a>.</p>
                </div>
                <p>Il est possible de télécharger les données par continent, pays, et parfois région. Nous allons ici télécharger les données du Suriname en Amérique du Sud.</p>
                <div class="manip">
                     <p>Dans la colonne <b>Sub-Region</b>, cliquez sur <b>South America</b>, puis sur téléchargez les données au format shapefile pour le <b>Suriname</b>.</p>
                     <figure>
                    	<a href="illustrations/tous/3_5_geofabrik_southamerica.png" >
                    		<img src="illustrations/tous/3_5_geofabrik_southamerica.png" alt="lien pour télécharger les données du Suriname au format SHP sur Geofabrik" width="80%">
                    	</a>
                     </figure>
                     <figure>
                    	<a href="illustrations/tous/3_5_geofabrik_suriname.png" >
                    		<img src="illustrations/tous/3_5_geofabrik_suriname.png" alt="lien pour télécharger les données du Suriname au format SHP sur Geofabrik" width="80%">
                    	</a>
                    </figure>
                     <p class="note">Au cas où le téléchargement échouerait, ces données sont également disponibles ici : <b>TutoQGIS_03_RechercheDonnees/donnees/suriname-latest-free.shp.zip</b>.</p>
                     <p>Enregistrer le fichier sur votre ordinateur, décompressez le fichier ZIP obtenu dans votre répertoire de travail : vous obtenez une série de couches au format Shapefile.</p>
                     <p>Que contiennent ces données ? Pour le savoir, cliquez sur le lien <a class="ext" target="_blank" href="http://download.geofabrik.de/osm-data-in-gis-formats-free.pdf" >Format description PDF</a> disponible en cliquant sur <b>Suriname</b> à partir de la page où vous avez téléchargé les données.</p>
                </div>
                <p class="note">Notez que les noms de couches correspondent au clés des attributs OSM. Par exemple, la couche <em class="data">gis.osm_waterways_free_1</em> regroupe les éléments ayant la clé <a class="ext" target="_blank" href="http://wiki.openstreetmap.org/wiki/FR:Key:waterway">waterway</a>.</p>
                <div class="manip">
                     <p>Dans un nouveau projet QGIS, ajoutez ces données. Ouvrez la table attributaire de la couche <em class="data">gis.osm_waterways_free_1</em>.</p>
                     <p>Les valeurs du champ <b>fclass</b> correspondent aux différentes valeurs prises par la clé de la couche pour chaque élément. On trouve par exemple les valeurs river, stream, canal et drain.</p>
                </div>
                   
                    
                <h3><a class="titre" id="III44">Représenter des données OpenStreetMap</a></h3>
                
                    <p>Les données OpenStreetMap ajoutées dans QGIS, comme toute autre donnée, ont un style &#171; par défaut &#187;, ne convenant pas pour une carte. Nous allons voir ici comment représenter ces données pour obtenir quelque chose de similaire à ceci :</p>
                    <figure>
                    	<a href="illustrations/tous/3_5_style_resultat.png" >
                    		<img src="illustrations/tous/3_5_style_resultat.png" alt="Exemple de données OSM stylées, grande échelle" width="500">
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
                        	<a href="illustrations/tous/3_5_ordre_couches.png" >
                        		<img src="illustrations/tous/3_5_ordre_couches.png" alt="Ordre des couches OSM" width="250">
                        	</a>
                        </figure>
                        <p>Ouvrez la fenêtre <b>Propriétés</b> de la couche <em class="data">gis.osm_roads_free_1</em>, rubrique <b>Symbologie</b> :</p>
                        <figure>
                        	<a href="illustrations/tous/3_5_charger_style.png" >
                        		<img src="illustrations/tous/3_5_charger_style.png" alt="Charger un style" width="600">
                        	</a>
                        </figure>
                        <p>En bas de la fenêtre, cliquez sur la liste déroulante <b>Style</b> puis sur <b>Charger le style</b>.</p>
                        <figure>
                        	<a href="illustrations/tous/3_5_charger_style_fenetre.png" >
                        		<img src="illustrations/tous/3_5_charger_style_fenetre.png" alt="Sélectionner un style depuis un fichier" width="75%">
                        	</a>
                        </figure>
                        <p>Dans la fenêtre qui s'affiche :</p>
                        <ul>
                           <li class="espace">sélectionnez <b>depuis un fichier</b> dans la liste déroulante</li>
                           <li class="espace">Catégories : laissez les valeurs par défaut</li>
                           <li class="espace">Fichier : cliquez sur le bouton <b>...</b> et sélectionnez le fichier de style <b><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">roads.qml</a></b> situé dans le dossier <b>TutoQGIS_03_RechercheDonnees/legendes</b>.</li>
                           <li class="espace">Cliquez sur <b>Charger le style</b></li>
                        </ul>
                        <p>Cliquez ensuite sur <b>OK</b> pour fermer la fenêtre des propriétés.</p>
                        <p>Zoomez et dézoomez : le style change suivant le niveau de zoom.</p>
                        <p>Procédez de manière similaire pour chacune des couches, en choisissant à chaque fois le fichier de style approprié.</p>
                        <p>Pour finir, donnez un fond bleu à votre carte : <b>menu Projet &#8594; Propriétés... &#8594; rubrique Général</b> : cliquez sur la couleur à droite de <b>Couleur du fond</b>.</p>
                        <p>Dans la boîte de dialogue qui s'affiche alors, choisissez une couleur pour la mer, par exemple dans l'exemple ci-dessous <b>R 184 V 217 B 247</b>.</p>
                        <figure>
                        	<a href="illustrations/tous/3_5_couleur_rvb.png" >
                        		<img src="illustrations/tous/3_5_couleur_rvb.png" alt="Choix d'une couleur RVB" width="300">
                        	</a>
                        </figure>
                        <p class="note">Notez qu'une manipulation équivalente peut être effectuée dans le <a href="10_02_mise_en_page.php#X22">composeur d'impression</a>, sans changer la couleur de fond dans QGIS.</p>
                        <figure>
                        	<a href="illustrations/tous/3_5_style_resultat_2.png" >
                        		<img src="illustrations/tous/3_5_style_resultat_2.png" alt="Exemple de données OSM stylées, petite échelle" width="500">
                        	</a>
                        </figure>
                    </div>
                    <p>Vous pouvez ensuite si vous le désirez modifier le style des couches pour créer votre propre version. Pour enregistrer un fichier de style QML, procédez comme pour charger un style, mais choisissez <b>Enregistrer le style</b>.</p>
               
                
			<h3><a class="titre" id="III45">Charger des données OpenStreetMap à partir de QGIS</a></h3>
			 
			    <p>Nous allons utiliser ici l'extension <b>QuickOSM</b> pour charger des données OpenStreetMap directement dans QGIS.</p>
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
                    	<a href="illustrations/tous/3_5_quickosm_fenetre.png" >
                    		<img src="illustrations/tous/3_5_quickosm_fenetre.png" alt="Fenêtre de QuickOSM, choix des options" width="75%">
                    	</a>
                    </figure>
                    <p>Dans la rubrique <b>Requête rapide</b> :</p>
                    <ul>
                        <li class="espace">Choisissez la clé <b>waterway</b> puis la valeur <b>river</b> pour ne récupérer que les cours d'eau de type rivière</li>
                        <li class="espace">Sélectionnez l'option <b>Emprise du canevas</b> pour limiter le volume de données à charger à la zone visible dans QGIS</li>
                        <li class="espace">Cliquez enfin sur le bouton <b>Exécuter</b>.</li>
                    </ul>
                    <p>Patientez (plus la zone visible dans QGIS est grande, plus c'est long !)... Les données sont chargées et affichées :</p>
                    <figure>
                    	<a href="illustrations/tous/3_5_quickosm_resultat.png" >
                    		<img src="illustrations/tous/3_5_quickosm_resultat.png" alt="Aperçu des données récupérées avec OSM : rivières du Suriname" width="600">
                    	</a>
                    </figure>
			    </div>
			    <p>Ces données sont temporaires&nbsp;: pour les sauvegarder, clic droit sur la couche &#8594; Enregistrer sous...</p>
			    <p>Pour savoir où sont stockées les données temporaires : propriétés de la couche, rubrique Information.</p>
			    <p>Nous avons vu ici quelques méthodes pour accéder aux données OSM dans QGIS, mais il en existe d'autres !</p>
	
			<br>
			<a class="prec" href="03_04_fonds_carte.php">chapitre précédent</a>
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
