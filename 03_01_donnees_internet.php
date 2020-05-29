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
			<h2>III.1  Recherche de données SIG sur internet</h2>
				<ul class="listetitres">
					<li><a href="#III11">Données nationales pour la France</a>
						<ul class= "listesoustitres">
							<li><a href="#III11a" >Avec l'IGN</a></li>
							<li><a href="#III11b" >Avec geo.data.gouv.fr</a></li>
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
			<p>Dans le cas de <b>données vecteur</b>, le format le plus courant est sans doute le shapefile ; on trouvera aussi des données dans d'autres formats, par exemple GeoPackage, GeoJSON, KML...</p>
			<p>Dans le cas de <b>données raster</b>, on pourra trouver par exemple des données au format geotiff (TIF géoréférencé, c'est-à-dire avec des coordonnées lui permettant de se superposer correctement à d'autres couches).</p>
			<p>Parfois, on ne trouvera que des <b>données non géoréférencées</b> (carte papier par exemple, ou simple image trouvée sur internet). Ce cas sera traité dans la <a href="04_00_georeferencement.php" >partie 4 : géoréférencement</a>.</p>
			<p>Cette partie se borne à donner quelques exemples de sites permettant le téléchargement de données SIG. Il en existe beaucoup d'autres !</p>
			<p>Ne vous offusquez pas de ne pas voir ici les données OpenStreetMap : il existe <a href="03_04_donnees_osm.php">une partie qui leur est spécialement dédiée !</a></p>
				
			<h3><a class="titre" id="III11">Données nationales pour la France</a></h3>
			
				<h4><a class="titre" id="III11a">Avec l'IGN</a></h4>
				
					<p>L'IGN (Institut National de l'Information Géographique et Forestière) diffuse gratuitement une partie de ses données ici : <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/diffusion/telechargement-donnees-libres.html">https://geoservices.ign.fr/documentation/diffusion/telechargement-donnees-libres.html</a>.</p>
					<p class="note">Si vous êtes étudiant ou bien si vous travaillez dans un laboratoire de recherche, il existe peut-être entre votre structure et l'IGN une convention recherche et enseignement vous donnant accès à plus de données !</p>
					<p>Nous allons ici télécharger les communes de la Guyane.</p>
					<div class="manip">
					   <figure>
							<a href="illustrations/tous/3_1_ign_telechargement.png" >
								<img src="illustrations/tous/3_1_ign_telechargement.png" alt="page de téléchargement des données IGN" width="90%">
							</a>
						</figure>
					   <p>Sur la page internet <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/diffusion/telechargement-donnees-libres.html">https://geoservices.ign.fr/documentation/diffusion/telechargement-donnees-libres.html</a>, cliquez sur <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/diffusion/telechargement-donnees-libres.html#admin-express">ADMIN-EXPRESS</a>.</p>
					</div>
					   <p>La base ADMIN EXPRESS contient des couches de régions, départements, arrondissements, EPCI, communes et chef-lieux pour la France métropolitaine et ultra-marine. Elle remplace la base GEOFLA® qui n'est plus mise à jour et dont la dernière édition est celle de 2016.</p>
					<div class="manip">
					   <figure>
							<a href="illustrations/tous/3_1_ign_telechargement_2.png" >
								<img src="illustrations/tous/3_1_ign_telechargement_2.png" alt="page de téléchargement des données ADMIN EXPRESS (IGN)" width="90%">
							</a>
						</figure>
						<p>Téléchargez la dernière édition des données <b>ADMIN EXPRESS par territoire</b> (ici celle de mai 2020).</p>
						<p class="note">Vous pouvez également télécharger la version <a class="ext" target="_blank" href="https://geoservices.ign.fr/ressources_documentaires/Espace_documentaire/BASES_VECTORIELLES/ADMIN_EXPRESS_COG/SE_ADMIN_EXPRESS_COG.pdf">COG (Code Officiel Géographique)</a> mais celle-ci est plus lourde.</p>
						<p>Dézippez le fichier téléchargé (vous pouvez par exemple utiliser <a class="ext" target="_blank" href="https://www.7-zip.org/">7-zip</a>).</p>
						<p>A partir de l'explorateur de fichiers de QGIS, ajoutez la couche <em class="data">COMMUNE</em> du sous-dossier <b>ADE_2-X_SHP_UTM22RGFG95_D973</b> (973 correspond au code département de la Guyane, et l'UTM 22 RGFG95 au SCR qui y est utilisé).</p>
						<figure>
							<a href="illustrations/tous/3_1_commune_guyane_explorateur.png" >
								<img src="illustrations/tous/3_1_commune_guyane_explorateur.png" alt="ajout de la couche de communes de Guyane via l'explorateur QGIS" width="90%">
							</a>
						</figure>
					</div>
					
					<p class="note">Si le téléchargement échoue, cette couche est également accessible <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">en téléchargement</a></em>.</p>
					
					<p>Dans les données téléchargées sur le site de l'IGN se trouvent également les autres découpages administratifs pour la Guyane, ainsi que pour les autres territoires ultra-marins et la France métropolitaine.</p>
					
					
				<h4><a class="titre" id="III11b">Avec geo.data.gouv.fr</a></h4>				
					
					<p>Le site <a class="ext" target="_blank" href="https://geo.data.gouv.fr/fr/">https://geo.data.gouv.fr/fr/</a> recense les jeux de données géographiques en accès libre pour la France. Nous allons utiliser ce site pour rechercher des données sur les hôpitaux en Guyane.</p>
					
					<div class="manip">
					   <p>Dans la barre de recherche du site internet <a class="ext" target="_blank" href="https://geo.data.gouv.fr/fr/">https://geo.data.gouv.fr/fr/</a>, tapez <b>hôpitaux guyane puis appuyez sur Entrée</b>.</p>
					   <figure>
							<a href="illustrations/tous/3_1_geodatagouv_recherche.png" >
								<img src="illustrations/tous/3_1_geodatagouv_recherche.png" alt="recherche sur le site geo.data.gouv.fr" width="90%">
							</a>
						</figure>
						<p>Cliquez sur le résultat <b>Guyane - Finess cat1100 - Etablissements Hospitaliers</b>.</p>
						<figure>
							<a href="illustrations/tous/3_1_geodatagouv_recherche_2.png" >
								<img src="illustrations/tous/3_1_geodatagouv_recherche_2.png" alt="recherche sur le site geo.data.gouv.fr" width="90%">
							</a>
						</figure>
						<p>Les métadonnées nous apprennent que ces données proviennent de la BD Adresse et datent de  2013.</p>
						<p>Téléchargez ces données au format GeoJSON, en cliquant sur le bouton <b>GeoJSON</b> en bas à gauche de la fenêtre : </p>
						<figure>
							<a href="illustrations/tous/3_1_geodatagouv_recherche_3.png" >
								<img src="illustrations/tous/3_1_geodatagouv_recherche_3.png" alt="téléchargement au format geojson sur le site geo.data.gouv.fr" width="90%">
							</a>
						</figure>
						<p class="note">Si le téléchargement échoue, cette couche est également disponible dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees/COMMUNE.shp</b> accessible en <a href="telechargement.php" >téléchargement</a>.</p>
						<p>Ajoutez ensuite ces données à QGIS. Attention, l'extension étant JSON et non GeoJSON, l'explorateur de QGIS n'affichera pas le fichier. Utilisez plutôt le gestionnaire de sources de données, ou bien faites glisser directement le fichier dans QGIS.</p>
						<figure>
							<a href="illustrations/tous/3_1_guyane_communes_hopitaux.png" >
								<img src="illustrations/tous/3_1_guyane_communes_hopitaux.png" alt="affichage des communes et des hôpitaux de Guyane" width="70%">
							</a>
						</figure>
					</div>
	
			<h3><a class="titre" id="III12">Données mondiales</a></h3>
			
			    <h4><a class="titre" id="III12a">Avec Natural Earth</a></h4>
			    
			     <p><a class="ext" target="_blank" href="https://www.naturalearthdata.com/">Natural Earth</a> est un jeu de données cartographiques public mondial disponible à 3 échelles différentes. De nombreuses données sont disponibles, notamment les limites administratives, routes, cours d'eau et fonds raster.</p>
			     <p>Nous allons télécharger ici les <b>limites administratives des pays à petite échelle</b> (peu de niveau de détail).</p>
			     
			     <div class="manip">
			         <p>Sur la page internet <a class="ext" target="_blank" href="https://www.naturalearthdata.com/downloads/">https://www.naturalearthdata.com/downloads/</a>, dans la rubrique <b>Small scale data 1:110m</b>, cliquez sur le bouton <b>Cultural</b>.</p>
			         <figure>
						<a href="illustrations/tous/3_1_naturalearth_telechargement.png" >
							<img src="illustrations/tous/3_1_naturalearth_telechargement.png" alt="téléchargement des données Natural Earth" width="70%">
						</a>
					 </figure>
					 <p>Ces données sont utilisables à l'échelle mondiale mais ne seront pas assez détaillées pour travailler à l'échelle d'un pays.</p>
					 <p>Sur la page suivante, dans <b>Admin 0 - Countries</b>, cliquez sur le bouton <b>Download countries</b>.</p>
					 <figure>
						<a href="illustrations/tous/3_1_naturalearth_telechargement_2.png" >
							<img src="illustrations/tous/3_1_naturalearth_telechargement_2.png" alt="téléchargement des données Natural Earth" width="70%">
						</a>
					 </figure>
					 <p class="note">Si le téléchargement échoue, cette couche est également accessible <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">en téléchargement</a></em>.</p>
					 <p>Une fois le fichier téléchargé, placez-le dans votre dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
					 <p>Ouvrez un nouveau projet QGIS, et à partir de l'explorateur, ajoutez la couche <em class="data">ne_110m_admin_0_countries</em>. <b>Notez qu'il n'est pas nécessaire de dézipper le fichier pour visualiser les données dans QGIS !</b> Ceci est très pratique quand on est par exemple à la recherche de données sur internet et évite de dézipper tous les fichiers et donc de se retrouver avec beaucoup de dossiers. Il faudra cependant décompresser les données pour pouvoir les éditer.</p>
					 <figure>
						<a href="illustrations/tous/3_1_donnees_naturalearth.png" >
							<img src="illustrations/tous/3_1_donnees_naturalearth.png" alt="visualisation dans QGIS de la couche ne_110m_admin_0_countries" width="70%">
						</a>
					 </figure>
			     </div>
			    
			    <h4><a class="titre" id="III12b">Avec les données SRTM</a></h4>
			
			<p>Nous avons vu jusqu'ici le téléchargement de quelques données vecteur. Les données raster seront par exemple des images satellite, des fonds de carte, des <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain">modèles numériques de terrain (MNT)</a>...</p>
			<p>Nous allons ici télécharger un <b>modèle d'élévation pour le Kenya</b>.</p>
			<p>Un <b>modèle d'élévation numérique (Digital Elevation Model ou DEM)</b> se rapproche d'un MNT, mais il ne mesure pas l'altitude au sol mais l'altitude des éléments présents au sol. Si une forêt est présente, ce sera donc l'altitude du sommet des arbres qui sera mesurée et non l'altitude du sol, idem si des bâtiments sont présents.</p>
			<p>On trouve sur internet deux DEM à couverture mondiale en libre accès : le modèle <b>ASTER</b> issu d'une collaboration NASA/METI (Ministry of Economy, Trade and Industry of Japan) et le modèle <b>SRTM</b> issu d'une collaboration NASA/NGA (National Geospatial-Intelligence Agency). Nous allons voir ici le cas du SRTM.</p>
			
			<div class="manip">
				<p>Rendez-vous sur <a class="ext" target="_blank" href="http://dwtkns.com/srtm/">http://dwtkns.com/srtm/</a> et cliquez sur une des cases recouvrant le Kenya (par exemple la dalle <b>srtm_44_12</b>) :</p>
				<figure>
					<a href="illustrations/tous/3_1_telechargement_srtm.png" >
						<img src="illustrations/tous/3_1_telechargement_srtm.png" alt="téléchargement d'une dalle du SRTM" width="350">
					</a>
				</figure>
				<p>Téléchargez la dalle au format GeoTIFF, placez-le fichier dans votre dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>. Il n'est pas nécessaire de dézipper le fichier obtenu.</p>
				<p>Dans QGIS, ajoutez le fichier TIF téléchargé au moyen de l'explorateur.</p>
				<figure>
					<a href="illustrations/tous/3_1_srtm_kenya.png" >
						<img src="illustrations/tous/3_1_srtm_kenya.png" alt="superposition des cours d'eau, des régions et du SRTM" width="90%" >
					</a>
				</figure>
				<p class="note">Au cas où le téléchargement échouerait, cette couche est également disponible dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
			</div>
			
			<h3><a class="titre" id="III13">Et tout le reste ?</a></h3>
			 
			    <p>Selon la zone sur laquelle vous travaillez et votre sujet, il existe de nombreux sites avec des données géographiques en téléchargement. En voici quelques uns en vrac, qui seront ou non pertinents pour vous :</p>
			
				<ul>
					<li class="espace">L'annuaire de données de l'incontournable GeoRezo, portail francophone de la géomatique
						<br>
						<a class="ext" target="_blank" href="http://georezo.net/annuaire/donnees-c-4.html">http://georezo.net/annuaire/donnees-c-4.html</a>
					</li>
					<li class="espace">Natural Earth : données à l'échelle mondiale : limites administratives, hydrographie, bathymétrie, fonds de carte raster...
						<br>
						<a class="ext" target="_blank" href="http://www.naturalearthdata.com/downloads/">http://www.naturalearthdata.com/downloads/</a>
					</li>
					<li class="espace">FAO (Food and Agriculture Organisation) : catalogue de métadonnées donnant accès à un large éventail de données vecteur ou raster, en particulier sur les pays du Sud.
						<br>
						<a class="ext" target="_blank" href="http://www.fao.org/geonetwork/">http://www.fao.org/geonetwork/</a>
					</li>
					<li class="espace">geo.data.gouv.fr : portail national français de données géographiques
						<br>
						<a class="ext" target="_blank" href="https://geo.data.gouv.fr/fr/">https://geo.data.gouv.fr/fr/</a>
					</li>
					<li class="espace">OpenStreetMap : extractions de données au format SHP ou OSM, fourni par Geofabrik :
						<br>
						<a class="ext" target="_blank" href="http://download.geofabrik.de/openstreetmap/">http://download.geofabrik.de/openstreetmap/</a>
					</li>
					<li class="espace">IGN : nombreuses données disponibles pour la France, certaines gratuites pour les établissements de recherche
						<br>
						<a class="ext" target="_blank" href="http://professionnels.ign.fr/catalogue">http://professionnels.ign.fr/catalogue</a>
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
						<a class="ext" target="_blank" href="http://www.diva-gis.org/gdata">http://www.diva-gis.org/gdata</a>
					</li>
					<li class="espace">ASTER : modèle d'élévation, données mondiales téléchargeables par dalles
						<br>
						<a class="ext" target="_blank" href="https://search.earthdata.nasa.gov/">https://search.earthdata.nasa.gov/</a>
					</li>
					<li class="espace">SRTM : modèle d'élévation, données mondiales téléchargeables par dalles
						<br>
						<a class="ext" target="_blank" href="http://dwtkns.com/srtm/">http://dwtkns.com/srtm/</a>
					</li>
					<li class="espace">Global Land Cover Facility : images satellites
						<br>
						<a class="ext" target="_blank" href="http://glcfapp.glcf.umd.edu:8080/esdi/">http://glcfapp.glcf.umd.edu:8080/esdi/</a>
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
