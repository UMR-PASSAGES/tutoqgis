<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">III.  Recherche et ajout de données</h1>
			<h2>III.1  Recherche de données SIG sur internet</h2>
				<ul class="listetitres">
					<li><a href="#III11">Données nationales pour la France</a>
						<ul class= "listesoustitres">
							<li><a href="#III11a" >Avec l'IGN</a></li>
							<li><a href="#III11b" >Avec un catalogue de données régional</a></li>
						</ul>
					</li>
					<li><a href="#III12">Données mondiales</a>
					   <ul class= "listesoustitres">
							<li><a href="#III12a" >Avec Natural Earth</a></li>
							<li><a href="#III12b" >Avec les données SRTM</a></li>
						</ul>
					</li>
					<li><a href="#III13">Et tout le reste ?</a></li>
				</ul>
				<br>
	
			<p>Il est possible de trouver sur internet des <b>données déjà géoréférencées, c'est-à-dire possédant déjà des coordonnées, donc directement utilisables dans un SIG</b>. Ces données peuvent être vecteur ou raster.</p>
			<p>Dans le cas de <b>données vecteur</b>, les formats les plus courants sont probablement le shapefile et le GeoPackage ; on trouvera aussi des données dans d'autres formats, par exemple GeoJSON, KML...</p>
			<p>Dans le cas de <b>données raster</b>, on pourra trouver par exemple des données au format geotiff (TIF géoréférencé, c'est-à-dire avec des coordonnées lui permettant de se superposer correctement à d'autres couches).</p>
			<p>Parfois, on ne trouvera que des <b>données non géoréférencées</b> (carte papier par exemple, ou simple image trouvée sur internet). Ce cas sera traité dans la <a href="04_00_georeferencement.php" >partie 4 : géoréférencement</a>.</p>
			<p>Cette partie se borne à donner quelques exemples de sites permettant le téléchargement de données SIG. Il en existe beaucoup d'autres !</p>
			<p>Quant aux <b>données OpenStreetMap</b>, elles ne seront pas traitées ici car il existe <a href="03_05_donnees_osm.php">une partie qui leur est tout spécialement dédiée !</a></p>
				
			<h3>Données nationales pour la France<a class="headerlink" id="III11" href="#III11"></a></h3>
			
				<h4>Avec l'IGN<a class="headerlink" id="III11a" href="#III11a"></a></h4>
				
					<p>L'IGN (Institut National de l'Information Géographique et Forestière) diffuse gratuitement la plupart de ses données ici : <a class="ext" target="_blank" href="https://geoservices.ign.fr/catalogue">https://geoservices.ign.fr/catalogue</a>.</p>
					<p>Nous allons ici télécharger les <b>communes de la Guyane</b>.</p>
					<div class="manip">
					   <p>Sur la page internet <a class="ext" target="_blank" href="https://geoservices.ign.fr/catalogue">https://geoservices.ign.fr/catalogue</a>, cliquez sur <a class="ext" target="_blank" href="https://geoservices.ign.fr/adminexpress">ADMIN-EXPRESS</a>.</p>
					   <p class="note">La page listant beaucoup de données, vous pouvez faire une recherche sur le terme <b>admin</b> avec la fonction <b>rechercher</b> de votre navigateur (ou le raccourci clavier <b>ctrl + F</b>). Vous pouvez aussi filtrer les données sur <b>Données/services</b> puis <b>Bases de données au format vectoriel</b>.</p>
					   <figure>
							<a href="illustrations/3_1_ign_telechargement.jpg" >
								<img src="illustrations/3_1_ign_telechargement.jpg" alt="page de téléchargement des données IGN" width="500">
							</a>
						</figure>
					</div>
					   <p>La base ADMIN EXPRESS contient des couches de régions, départements, arrondissements, EPCI, communes et chef-lieux pour la France métropolitaine et ultra-marine. Elle remplace la base GEOFLA® qui n'est plus mise à jour et dont la dernière édition est celle de 2016. Il est possible de télécharger la base ADMIN EXPRESS séparément pour la France métropolitaine et les territoires ultramarins, ou bien dans son ensemble.</p>
					<div class="manip">
					   <p>Téléchargez la dernière édition des données <b>ADMIN EXPRESS pour le territoire de la Guyane</b> (ici celle de décembre 2025 qui fait 1,1 Mo) :</p>
					   <figure>
							<a href="illustrations/3_1_ign_telechargement_2.jpg" >
								<img src="illustrations/3_1_ign_telechargement_2.jpg" alt="page de téléchargement des données ADMIN EXPRESS (IGN)" width="500">
							</a>
						</figure>
						<p class="note">Vous pouvez également utiliser la version COG (Code Officiel Géographique), qui existe dans 2 versions : une version plus généralisée pour des usages cartographiques (COG-CARTO) et une version plus précise pour des usages statistiques (COG).</p>
						<p>Dézippez le fichier téléchargé (vous pouvez par exemple utiliser <a class="ext" target="_blank" href="https://www.7-zip.org/">7-zip</a>).</p>
					</div>
					
					<p class="note">Si le téléchargement échoue, cette couche est également accessible <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">en téléchargement</a></em>.</p>
					
					<div class="manip">
					  <p>Une fois le fichier dézippé, vous pouvez constater qu'il contient une arborescence de dossiers complexe. Comment y voir plus clair ?</p>
					  <p>En commençant par les métadonnées ! Sur la page de téléchargement d'Admin Express, cliquez sur le bouton <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/donnees/vecteur/adminexpress" >Documentation</a> dans la partie droite puis sur <a class="ext" target="_blank" href="https://geoservices.ign.fr/sites/default/files/2021-11/DC_DL_ADMIN_EXPRESS_3-1_0.pdf" >ADMIN EXPRESS - Descriptif de contenu</a>, ce qui ouvre un fichier PDF.</p>
					  <p>En parcourant ce PDF, vous en saurez plus sur les données que vous venez de télécharger. Vous y trouverez notamment page dans la partie 2.3 <em>Références géodésiques</em> la liste des différents SCR utilisés pour la France métropolitaine ainsi que pour l'Outre-Mer : le SCR utilisé pour la Guyane est le <b>RGFG95 UTM 22, code EPSG 2972</b>.</p>
					</div>
					
					<p>Pour rappel, le but de l'exercice est ici d'afficher les communes de la Guyane, mais vous pouvez très bien décider de travailler sur un autre département !</p>
					
					<div class="manip">
					  <p>La couche <em class="data">COMMUNE</em> de la Guyane est donc située dans le dossier <b>1_DONNEES_LIVRAISON_...</b> puis dans le sous-dossier <b>ADE_X-X_GPKG_UTM22RGFG95_GUF</b> où :</p>
					  <ul>
					   <li><b>ADE</b> signifie ADMIN EXPRESS</li>
					   <li><b>X-X</b> correspond à la version d'ADMIN EXPRESS téléchargée, par exemple 4-0</li>
					   <li><b>GPKG</b> correspond au format (GeoPackage)</li>
					   <li><b>UTM22RGFG95</b> correspond au SCR des données (voir plus haut)</li>
					   <li><b>GUF</b> signifie Guyane française</li>
					  </ul>
						<p>A partir de l'explorateur de fichiers de QGIS, ajoutez les communes de Guyane à la carte, dans un nouveau projet vide.</p>
						<figure>
							<a href="illustrations/3_1_commune_guyane_explorateur.jpg" >
								<img src="illustrations/3_1_commune_guyane_explorateur.jpg" alt="ajout de la couche de communes de Guyane via l'explorateur QGIS" width="600">
							</a>
						</figure>
						<p>Si les données ne s'affichent pas, vérifiez que cela n'est pas dû à une visibilité dépendant de l'échelle (la couche s'affiche ou non suivant le niveau de zoom) : <b>propriétés de la couche &#8594; Rendu</b>, décochez la case 
						  <a class="thumbnail_bottom" href="#thumb">Visibilité dépendante de l'échelle
            		<span>
            			<img src="illustrations/3_1_rendu_echelle.jpg" alt="Propriétés de la couche, rendu" height="400" >
            		</span>
            	</a>.</p>  
					</div>
					
					<p class="note">Pour télécharger les données de l'IGN, vous pouvez également passer par <a class="ext" target="_blank" href="https://geotribu.github.io/ign-fr-opendata-download-ui/index.html" >ign2map</a> (et profitez-en pour aller faire un tour sur l'excellent site <a class="ext" target="_blank" href="https://static.geotribu.fr/" >Geotribu</a> !)</p>
					
					
				<h4>Avec un catalogue de données régional<a class="headerlink" id="III11b" href="#III11b"></a></h4>				
					
					<p>En france comme dans d'autres pays, il existe des catalogues de données pour chaque région. Comme nous avons déjà téléchargé les communes de Guyane, nous allons donc nous rendre sur le géocatalogue guyanais pour télécharger l'emplacement des centrales électriques.</p>
					
					<p>Si le téléchargement échoue, la couche est également disponible <a href="donnees/TutoQGIS_03_RechercheDonnees.zip." >ici</a>.</p>
					
					<p>Le cas de la Guyane est un peu particulier car il existe 2 catalogues pour ce territoire, <a class="ext" target="_blank" href="https://www.guyane-sig.fr" >guyane-sig</a> et <a class="ext" target="_blank" href="https://www.geoguyane.fr/" >geoguyane</a>. C'est ce dernier que nous allons utiliser ici.</p>
					
					<div class="manip">
					   <p>Dans la barre de recherche du site internet <a class="ext" target="_blank" href="https://catalogue.geoguyane.fr/">https://catalogue.geoguyane.fr/</a>, tapez <b>centrale électrique</b> puis appuyez sur <b>Entrée</b>.</p>
					   <figure>
							<a href="illustrations/3_1_geoguyane_recherche.jpg" >
								<img src="illustrations/3_1_geoguyane_recherche.jpg" alt="recherche de 'centrale électrique' sur le catalogue geoguyane" width="600">
							</a>
						</figure>
						<p>Vous obtenez normalement un seul résultat : <b>Recensement des centrales de production électrique</b> : cliquez sur <a class="ext" target="_blank" href="https://catalogue.geoguyane.fr/geonetwork/srv/fre/catalog.search#/metadata/fd503135-bf8d-450a-9b8d-823e450e6617">cette fiche</a>.</p>
						<p>Les métadonnées nous apprennent notamment que ces données proviennent de la DAAF Guyane, ont été créées en 2013 et révisées en 2015.</p>
						<p>Cliquez sur le lien de téléchargement : </p>
						<figure>
							<a href="illustrations/3_1_geoguyane_fiche.jpg" >
								<img src="illustrations/3_1_geoguyane_fiche.jpg" alt="Fiche métadonnée 'Recensement des centrales de production électrique' sur geoguyane" width="600">
							</a>
						</figure>
						<p>Choisissez :</p>
						<ul>
						  <li>le format : geojson par exemple pour changer</li>
						  <li>le système de coordonnées : RGF95 UTM 22 Nord (code EPSG 2972) pour avoir le même SCR que les communes précédemment téléchargées</li>
						</ul>
						<p>Puis cliquez sur <b>Télécharger la donnée</b>.</p>
						<figure>
							<a href="illustrations/3_1_geoguyane_telechargement.jpg" >
								<img src="illustrations/3_1_geoguyane_telechargement.jpg" alt="page de téléchargement des centrales électriques sur geoguyane" width="600">
							</a>
						</figure>
						<p>Dézippez le fichier obtenu, et ajoutez la couche <em  class="data">l_ouvrage_elec_prod_973.json</em> à QGIS : vous pouvez la faire glisser depuis l'explorateur de fichier, ou bien passer par le panneau Explorateur ou le gestionnaire de sources de données.</p>
					</div>
					<figure>
					  <a href="illustrations/3_1_centrales_guyane.jpg" >
							<img src="illustrations/3_1_centrales_guyane.jpg" alt="affichage des communes et des centrales de Guyane dans QGIS" width="400">
						</a>
						<figcaption>Affichage des centrales électriques avec un style catégorisé sur le champ "centrale".</figcaption>
					</figure> 
	
			<h3>Données mondiales<a class="headerlink" id="III12" href="#III12"></a></h3>
			
			    <h4>Avec Natural Earth<a class="headerlink" id="III12a" href="#III12a"></a></h4>
			    
			     <p><a class="ext" target="_blank" href="https://www.naturalearthdata.com/">Natural Earth</a> est un jeu de données cartographiques public mondial disponible à 3 échelles différentes. De nombreuses données sont disponibles, notamment les limites administratives, routes, cours d'eau et fonds raster.</p>
			     <p>Nous allons télécharger ici les <b>limites administratives des pays à petite échelle</b> (peu de niveau de détail).</p>
			     
			     <div class="manip">
			         <p>Sur la page internet <a class="ext" target="_blank" href="https://www.naturalearthdata.com/downloads/">https://www.naturalearthdata.com/downloads/</a>, dans la rubrique <b>Small scale data 1:110m</b>, cliquez sur le bouton <b>Cultural</b>.</p>
			         <figure>
						<a href="illustrations/3_1_naturalearth_telechargement.jpg" >
							<img src="illustrations/3_1_naturalearth_telechargement.jpg" alt="téléchargement des données Natural Earth" width="500">
						</a>
					 </figure>
					 <p>Ces données sont adaptées à une échelle mondiale mais ne seront pas assez détaillées pour travailler à l'échelle d'un pays.</p>
					 <p>Sur la page suivante, dans <b>Admin 0 - Countries</b>, cliquez sur le bouton <b>Download countries</b>.</p>
					 <figure>
						<a href="illustrations/3_1_naturalearth_telechargement_2.jpg" >
							<img src="illustrations/3_1_naturalearth_telechargement_2.jpg" alt="téléchargement des données Natural Earth" width="500">
						</a>
					 </figure>
					 <p class="note">Si le téléchargement échoue, cette couche est également accessible <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">en téléchargement</a></em>.</p>
					 <p>Une fois le fichier téléchargé, <b>ouvrez un nouveau projet QGIS</b>, et à partir de l'explorateur, ajoutez la couche <em class="data">ne_110m_admin_0_countries</em>.</p>
					 <p><b>Notez qu'il n'est pas nécessaire de dézipper le fichier pour visualiser les données dans QGIS !</b> Ceci est très pratique quand on est par exemple à la recherche de données sur internet et évite de dézipper tous les fichiers et donc de se retrouver avec beaucoup de dossiers. Il faudra cependant décompresser les données pour pouvoir les éditer.</p>
					 <figure>
						<a href="illustrations/3_1_donnees_naturalearth.jpg" >
							<img src="illustrations/3_1_donnees_naturalearth.jpg" alt="visualisation dans QGIS de la couche ne_110m_admin_0_countries" width="450">
						</a>
					 </figure>
			     </div>
			    
			    <h4>Avec les données SRTM<a class="headerlink" id="III12b" href="#III12b"></a></h4>
			
        			<p>Nous avons vu jusqu'ici le téléchargement de quelques données vecteur. Les données raster seront par exemple des images satellite, des fonds de carte, des <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain">modèles numériques de terrain (MNT)</a>...</p>
        			<p>Nous allons ici télécharger un <b>modèle d'élévation pour le Kenya</b>.</p>
        			<p>Un <b>modèle d'élévation numérique (Digital Elevation Model ou DEM)</b> se rapproche d'un MNT, mais il ne mesure pas l'altitude au sol mais l'altitude des éléments présents au sol. Si une forêt est présente, ce sera donc l'altitude du sommet des arbres qui sera mesurée et non l'altitude du sol, idem si des bâtiments sont présents.</p>
        			<p>On trouve sur internet deux DEM à couverture mondiale en libre accès : le modèle <b>ASTER</b> issu d'une collaboration NASA/METI (Ministry of Economy, Trade and Industry of Japan) et le modèle <b>SRTM</b> issu d'une collaboration NASA/NGA (National Geospatial-Intelligence Agency). Nous allons voir ici le cas du SRTM.</p>
        			
        			<div class="manip">
        				<p>Rendez-vous sur <a class="ext" target="_blank" href="http://dwtkns.com/srtm/">http://dwtkns.com/srtm/</a>. Un avertissement en haut de la page indique que l'outil ne fonctionne plus, mais il semble néanmoins opérationnel.</p>
        				<p>Cliquez sur une des cases recouvrant le Kenya (par exemple la dalle <b>srtm_44_12</b>) :</p>
        				<figure>
        					<a href="illustrations/3_1_telechargement_srtm.jpg" >
        						<img src="illustrations/3_1_telechargement_srtm.jpg" alt="téléchargement d'une dalle du SRTM" width="350">
        					</a>
        				</figure>
        				<p>Téléchargez la dalle au format GeoTIFF. Il n'est pas nécessaire de dézipper le fichier obtenu.</p>
        				<p>Dans QGIS, ajoutez le fichier TIF téléchargé au moyen de l'explorateur.</p>
        				<figure>
        					<a href="illustrations/3_1_srtm_kenya.jpg" >
        						<img src="illustrations/3_1_srtm_kenya.jpg" alt="superposition des cours d'eau, des régions et du SRTM" width="500" >
        					</a>
        				</figure>
        				<p class="note">Au cas où le téléchargement échouerait, cette couche est également disponible <a href="donnees/TutoQGIS_03_RechercheDonnees.zip">avec les autres données du tutoriel</a>.</p>
        			</div>
			
			<h3>Et tout le reste ?<a class="headerlink" id="III13" href="#III13"></a></h3>
			 
			    <p>Selon la zone sur laquelle vous travaillez et votre sujet, il existe de nombreux sites avec des données géographiques en téléchargement. En voici quelques uns en vrac, qui seront ou non pertinents pour vous :</p>
			
				<ul>
					<li class="espace">Natural Earth : données à l'échelle mondiale : limites administratives, hydrographie, bathymétrie, fonds de carte raster...
						<br>
						<a class="ext" target="_blank" href="http://www.naturalearthdata.com/downloads/">http://www.naturalearthdata.com/downloads/</a>
					</li>
					<li class="espace">FAO (Food and Agriculture Organisation) : catalogue de métadonnées donnant accès à un large éventail de données vecteur ou raster, en particulier sur les pays du Sud.
						<br>
						<a class="ext" target="_blank" href="https://data.apps.fao.org/catalog/">https://data.apps.fao.org/catalog/</a>
					</li>
					<li class="espace">data.gouv.fr : plateforme des données publiques françaises (filtrer les données par format, par ex. geopackage, geojson ou shp pour trouver des données géographiques)
						<br>
						<a class="ext" target="_blank" href="https://www.data.gouv.fr/datasets/search">https://www.data.gouv.fr/datasets/search</a>
					</li>
					<li class="espace">OpenStreetMap : extractions de données au format SHP ou OSM, fourni par Geofabrik :
						<br>
						<a class="ext" target="_blank" href="http://download.geofabrik.de/">http://download.geofabrik.de/</a>
					</li>
					<li class="espace">IGN : nombreuses données disponibles pour la France, dont un grand nombre en libre accès
						<br>
						<a class="ext" target="_blank" href="https://geoservices.ign.fr/catalogue">https://geoservices.ign.fr/catalogue</a>
					</li>
					<li class="espace">cadastre.data.gouv.fr : données cadastrales françaises en opendata
						<br>
						<a class="ext" target="_blank" href="https://cadastre.data.gouv.fr/datasets/plan-cadastral-informatise">https://cadastre.data.gouv.fr/datasets/plan-cadastral-informatise</a>
						(pour exploiter les données du cadastre au format edigeo sous QGIS : voir <a class="ext" target="_blank" href="http://atelier.adullact.org/projects/edigeo/">ce projet</a> et <a class="ext" target="_blank" href="http://atelier.adullact.org/frs/download.php/file/8387/documentationEDIGEO-0.90.pdf">sa documentation</a>)
					</li>
					<li class="espace">THEIA : structure nationale inter-organismes ayant pour vocation de faciliter l’usage des images satellite
						<br>
						<a class="ext" target="_blank" href="http://www.theia-land.fr/">http://www.theia-land.fr/</a>
					</li>
					<li>GADM : limites administratives accessibles par pays
						<br>
						<a class="ext" target="_blank" href="http://www.gadm.org/">http://www.gadm.org/</a>
					</li>
					<li class="espace">DIVA-GIS : site du logiciel SIG libre DIVA, où sont aussi disponibles des données vecteur sur les limites administratives, l'hydrographie, le transport, la population... classées par pays
						<br>
						<a class="ext" target="_blank" href="https://diva-gis.org/data.html">https://diva-gis.org/data.html</a>
					</li>
					<li class="espace">ASTER : modèle d'élévation, données mondiales téléchargeables par dalles
						<br>
						<a class="ext" target="_blank" href="https://www.earthdata.nasa.gov/data/instruments/aster">https://www.earthdata.nasa.gov/data/instruments/aster</a>
					</li>
					<li class="espace">SRTM : modèle d'élévation, données mondiales téléchargeables par dalles
						<br>
						<a class="ext" target="_blank" href="http://dwtkns.com/srtm/">http://dwtkns.com/srtm/</a>
					</li>
				</ul>
				
				<p>Vous pouvez également tester une recherche internet avec quelques mots clés, de préférence dans la langue du pays ou en anglais, ainsi que par exemple le mot clé <em>shapefile</em>, qui reste un format de données SIG très utilisé. De manière générale, on trouve beaucoup de données accessibles en téléchargement, mais attention à la date de ces données, à leur échelle, leur mode de fabrication... qui peuvent ne pas être en adéquation avec vos questions.</p>
			
				<br>
				<a class="prec" href="03_00_recherche_ajout.php">chapitre précédent</a>
				<a class="suiv" href="03_02_donnees_flux.php">chapitre suivant</a>
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
