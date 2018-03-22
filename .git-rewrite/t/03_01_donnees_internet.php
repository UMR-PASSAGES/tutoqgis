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
					<li><a href="#III11">Données vecteur : quelques exemples</a>
						<ul class= "listesoustitres">
							<li><a href="#III11a" >Limites administratives du Kenya</a></li>
							<li><a href="#III11b" >Cours d'eau du Kenya</a></li>
						</ul>
					</li>
					<li><a href="#III12">Données raster : quelques exemples</a></li>
					<li><a href="#III13">Quelques sites utiles</a></li>
				</ul>
				<br>
	
			<p>Il est possible de trouver sur internet des <b>données déjà géoréférencées, c'est-à-dire possédant déjà des coordonnées, donc directement utilisables dans un SIG</b>. Ces données peuvent être vecteur ou raster.</p>
			<p>Dans le cas de <b>données vecteur</b>, le format le plus courant est sans doute le shapefile ; on trouvera aussi des données dans d'autres formats, par exemple TAB (MapInfo), GeoJSON... </p>
			<p>Dans le cas de <b>données raster</b>, on pourra trouver par exemple des données au format geotiff (TIF géoréférencé, c'est-à-dire avec des coordonnées lui permettant de se superposer correctement à d'autres couches).</p>
			<p>Parfois, on ne trouvera que des <b>données non géoréférencées</b> (carte papier par exemple, ou simple image trouvée sur internet). Ce cas sera traité dans la <a href="04_00_georeferencement.php" >partie 4 : géoréférencement</a>.</p>
				
			<h3><a class="titre" id="III11">Données vecteur : quelques exemples</a></h3>
			
				<h4><a class="titre" id="III11a">Limites administratives du Kenya</a></h4>
				
					<p>Il existe de nombreux sites permettant le téléchargement de données shapefile sur des thèmes variés. Nous allons ici supposer que vous cherchez les limites administratives d'un pays précis.</p>
					<div class="manip">		
						<p>Pour cela, rendez-vous sur le site : <a class="ext" target="_blank" href="http://www.gadm.org/">http://www.gadm.org/</a></p>
						<p>Trouvez sur ce site la rubrique téléchargement, et téléchargez les <b>limites administratives du Kenya</b> au format shapefile. Décompressez le fichier ZIP obtenu dans votre répertoire de travail.</p>
						<p>Lancez QGIS si ce n'est pas déjà fait, ou bien créez un nouveau projet sans sauvegarder l'ancien.</p>
						<p><img class="iconemid" src="illustrations/tous/1_2_ajout_vecteur_icone.png" alt="Icône ajout d'une couche vecteur">A partir de QGIS, chargez la couche <em class="data">KEN_adm5.shp</em>.</p>		
						<p class="note">Au cas où le téléchargement échouerait, cette couche est également disponible dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
						<p>Réussissez-vous à faire apparaître les grandes régions du Kenya (champ NAME_1) avec des couleurs différentes à partir de cette couche ?</p>
						<p>Pour cela, allez dans les <b>propriétés de la couche &#8594; rubrique Style</b> :
							<ul>
								<li>choisissez <b>Catégorisé</b> comme type de légende</li>
								<li>sélectionnez le champ de classification : <b>NAME_1</b></li>
								<li>Palette de couleur : choisissez <b>Couleurs au hasard</b> dans la liste</li>
								<li>Cliquez ensuite sur <b>Classer</b> en bas à gauche de la fenêtre</li>
							</ul>
						</p>
						<figure>
							<a href="illustrations/tous/3_1_style_categorise.png" >
								<img src="illustrations/tous/3_1_style_categorise.png" alt="Style de couche : catégorisé" height="450" >
							</a>
						</figure>
						<p>Cliquez sur <b>Appliquer</b> pour voir les changements (ou bien cliquez sur OK pour appliquer les changements + fermer la fenêtre) : vous pouvez voir les régions du Kenya. </p>
						<figure>
							<a href="illustrations/tous/3_1_kenya_regions.png" >
								<img src="illustrations/tous/3_1_kenya_regions.png" alt="résultat de la catégorisation : on voit les régions" height="300">
							</a>
						</figure>
						<p>Vous venez de réaliser votre première analyse thématique!</p>
					</div>
					
					<p>Cette opération permet de représenter de la même manière tous les éléments ayant la même valeur pour un champ donné.</p>		
					
					
				<h4><a class="titre" id="III11b">Cours d'eau du Kenya</a></h4>				
					
					<p>De nombreuses ressources sont également disponibles sur le site de la Food and Agriculture Organisation (FAO)</p>
					<div class="manip">
						<p>Rendez-vous sur <a class="ext" target="_blank" href="http://www.fao.org/geonetwork/">http://www.fao.org/geonetwork/</a></p>
					</div>
					<p>Ce site est un catalogue de métadonnées, utilisant le logiciel <a class="ext" target="_blank" href="http://geonetwork-opensource.org/" >GeoNetwork</a>. Il est possible d'y faire une recherche par thématique, mot clé... Certaines des données sont ensuite téléchargeables ; on y trouve aussi bien des données vecteur que des données raster.</p>
					<div class="manip">
						<p>Vous pouvez par exemple y rechercher les cours d'eau du Kenya. Tapez <b>rivers Kenya</b> dans la rubrique <b>WHAT?</b>, dans la colonne gauche de la page, puis sur le bouton <b>Search</b></p>
						<figure>
							<a href="illustrations/tous/3_1_fao.png" >
								<img src="illustrations/tous/3_1_fao.png" alt="recherche des cours d'eau du Kenya sur le site de la FAO" height="340">
							</a>
						</figure>
						<p>Prenez connaissance des métadonnées de  <b>Rivers of Kenya - AFRICOVER</b> et téléchargez ces données. Affichez ensuite la couche correspondante <em class="data">ke-rivers.shp</em> dans QGIS.</p>
						<figure>
							<a href="illustrations/tous/3_1_reg_courseau_kenya.png" >
								<img src="illustrations/tous/3_1_reg_courseau_kenya.png" alt="superposition des cours d'eau et des régions du Kenya" height="400" >
							</a>
						</figure>
						<p class="note">Au cas où le téléchargement échouerait, cette couche est également disponible dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
					</div>
					<p>Vous pouvez remarquer un léger décalage entre les deux couches, visible là où les cours d'eau semblent suivre les frontières. En effet, les deux couches ne proviennent pas du même organisme et ont des niveaux de précision différents...</p>
	
			<h3><a class="titre" id="III12">Données raster : quelques exemples</a></h3>
			
			<p>Les données raster seront par exemple des images satellite, des fonds de carte, des <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain">modèles numériques de terrain (MNT)</a>...</p>
			<p>Nous allons ici voir où trouver un modèle d'élévation pour le Kenya.</p>
			<p>Un <b>modèle d'élévation numérique (Digital Elevation Model ou DEM)</b> se rapproche d'un MNT, mais il ne mesure pas l'altitude au sol mais l'altitude des éléments présents au sol. Si une forêt est présente, ce sera donc l'altitude du sommet des arbres qui sera mesurée et non l'altitude du sol, idem si des bâtiments sont présents.</p>
			<p>On trouve sur internet deux DEM en libre accès : le modèle <b>ASTER</b> issu d'une collaboration NASA/METI (Ministry of Economy, Trade and Industry of Japan) et le modèle <b>SRTM</b> issu d'une collaboration NASA/NGA (National Geospatial-Intelligence Agency). Nous allons voir ici le cas du SRTM.</p>
			
			<div class="manip">
				<p>rendez-vous sur <a class="ext" target="_blank" href="http://dwtkns.com/srtm/">http://dwtkns.com/srtm/</a> et cliquez sur une des cases recouvrant le Kenya (par exemple la dalle <b>srtm_44_12</b>) :</p>
				<figure>
					<a href="illustrations/tous/3_1_srtm_kenya.png" >
						<img src="illustrations/tous/3_1_srtm_kenya.png" alt="téléchargement d'une dalle du SRTM" height="350">
					</a>
				</figure>
				<p>Téléchargez la dalle au format GeoTIFF, dézippez ensuite le fichier obtenu.</p>
				<p><img class="iconemid" src="illustrations/tous/3_1_ajout_raster_icone.png" alt="Icône ajout couche raster">Ajoutez le fichier TIF téléchargé au moyen de l'icône <b>Ajouter une couche raster</b>.</p>
				<figure>
					<a href="illustrations/tous/3_1_reg_courseau_srtm_kenya.png" >
						<img src="illustrations/tous/3_1_reg_courseau_srtm_kenya.png" alt="superposition des cours d'eau, des régions et du SRTM" height="400" >
					</a>
				</figure>
				<p class="note">Au cas où le téléchargement échouerait, cette couche est également disponible dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
			</div>
			
			<h3><a class="titre" id="III13">Quelques sites utiles (en vrac...)</a></h3>
			
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
					<li class="espace">CUB (Communauté Urbaine de Bordeaux) : données thématiques sur la CUB
						<br>
						<a class="ext" target="_blank" href="http://data.lacub.fr/themes.php">http://data.lacub.fr/themes.php</a>
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
						<a class="ext" target="_blank" href="http://asterweb.jpl.nasa.gov/gdem.asp">http://asterweb.jpl.nasa.gov/gdem.asp</a>
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
