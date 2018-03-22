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
			<h2>I.3  Formats de données SIG</h2>
				<ul class="listetitres">
					<li><a href="#I31">Formats vecteur : SHP et TAB</a>
						<ul class= "listesoustitres">
							<li><a href="#I31a">Format Shapefile ou SHP : un "standard"</a></li>
							<li><a href="#I31b">Format TAB (MapInfo)</a></li>
						</ul>
					</li>
					<li><a href="#I32">Un exemple de format raster : le GeoTIFF</a></li>
					<li><a href="#I33">Application</a></li>
				</ul>
				<br>
				
				<div class="manip">
					<p>Réduire la fenêtre de QGIS. Ouvrir dans l'explorateur de fichiers de votre ordinateur le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b></p>
					<figure>
						<a href="illustrations/tous/1_3_fichiers.png" >
							<img src="illustrations/tous/1_3_fichiers.png" alt="fichiers format SIG" height="350">
						</a>
					</figure>
				</div>
				<p class="note">Si dans Windows, vous ne voyez pas les extensions de tous les fichiers : dans la fenêtre, Outils &#8594; Options des dossier, onglet Affichage, décocher la case "Masquer les extensions dont le type est connu".</p>
				
				
				<h3><a class="titre" id="I31">Formats vecteur : SHP et TAB</a></h3>
				
					<h4><a class="titre" id="I31a">Format Shapefile ou SHP : un "standard"</a></h4>
						<p>Le format shapefile a été créé par ESRI, l'auteur notamment du logiciel ArcGIS. Ce format est aujourd'hui l'un des standards du SIG et est couramment utilisé par les logiciels libres de SIG.</p>
						<p>Un fichier SHP est en fait composé de plusieurs fichiers, dont 3 sont obligatoires :</p>
						<ul>
							<li>SHP : contient les informations spatiales</li>
							<li>DBF : contient les informations attributaires</li>
							<li>SHX : fichier d'index</li>
						</ul>
					<p>Le format DBF impose certaines limitations pour les noms de colonnes : maximum 10 caractères, éviter les accents...</p>
					<p>Un 4ème fichier est aussi bien utile :</p>
					<ul>
						<li>PRJ : contient le code du système de coordonnées et éventuellement de la projection</li>
					</ul>
					<p>Pour que le shapefile s'ouvre correctement, tous ces fichiers doivent avoir exactement le même nom. QGIS peut ouvrir et éditer les fichiers SHP.</p>
					
					<p>Le format Shapefile possède plusieurs limitations : les noms de colonne sont limités à 10 caractères, la taille est limitée à 2Go... Pour en savoir plus sur ces aspects, et pour connaître des formats alternatifs : <a class="ext" target="_blank" href="http://switchfromshapefile.org/" >Switch from Shapefile</a>.</p>
	
					<h4><a class="titre" id="I31b">Format TAB (MapInfo)</a></h4>
						<p>Ce format a été créé pour le logiciel MapInfo. Comme pour le SHP, un fichier au format TAB est en fait composé de plusieurs fichiers :</p>
						<ul>
							<li>MAP : données spatiales (avec le système de coordonnées)</li>
							<li>DAT : données attributaires</li>
							<li>TAB : structure de la couche</li>
							<li>ID : lien entre les fichiers DAT et MAP</li>
							<li>IND : fichier d'indexation (facultatif)</li>
						</ul>
						<p>QGIS peut ouvrir des fichiers au format TAB, mais il ne peut pas les éditer ; il faudra pour cela les enregistrer au format SHP.</p>
	
				<h3><a class="titre" id="I32">Un exemple de format raster : le GeoTIFF</a></h3>
				
					<p>Vous avez peut-être déjà manipulé des images au format TIF. Les TIF utilisés dans les logiciels SIG possèdent des informations en plus par rapport aux TIF "classiques" : quel type de coordonnées est utilisé, quelles sont les coordonnées de l'image... Il s'agit alors d'un cas particulier de TIF nommé <b>GeoTIFF</b>.</p>
					<p>L'extension du fichier reste TIF. Cependant, chargé dans un logiciel SIG, ce TIF s'affichera directement au bon endroit.</p>
					<p>D'autres fichiers peuvent être associés à un raster :</p>
					<ul>
						<li class="espace"><b>QML :</b> ce fichier facultatif sauvegarde le mode de représentation du raster : du noir vers le blanc, valeur minimum et maximum. S'il n'est pas présent, le raster s'affichera avec des paramètres par défaut. Il est propre à QGIS.</li>
						<li class="espace"><b>AUX.XML :</b> ce fichier parfois présent sauvegarde des statistiques et parfois le système de coordonnées de l'image. Il permet d'accélérer l'affichage et certains traitements. Ce fichier est également lisible par le logiciel ArcGIS.</li>
						<li class="espace"><b>TFW :</b> souvent appelé <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/World_file">"World file"</a>, ce fichier stocke les coordonnées de l'image et la taille des pixels. Ce type de fichier existe pour plusieurs formats d'image : l'extension sera JGW pour un JPG, PGW pour un PNG etc. Ce fichier n'est pas nécessaire si les informations sont déjà contenues dans l'en-tête de l'image (ce qui est le cas pour notre GeoTIFF). Les world file sont de moins en moins utilisés dans les SIG ; ils peuvent cependant être utiles pour un logiciel non SIG ou pour un format d'image ne permettant pas le stockage d'informations de localisation dans son en-tête.</li>
					</ul>
				
				
				<h3><a class="titre" id="I33">Application</a></h3>
					<div class="manip">			
						<div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">Combien de couches sont présentes dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b> ? En quel format est chaque couche ?</label></p>
							<p class="reponse">Le dossier contient 4 couches au format SHP : <b>depts_bretagne_geofla</b>, <b>senegal_regions_gadm</b>, <b>senegal_rivieres_fao</b> et <b>senegal_villes_geonames</b>, une couche au format TAB : <b>depts_france_geofla</b> et une couche au format GeoTIFF avec un fichier de style QML et un fichier AUX.XML associés : <b>srtm_bretagne</b>.</p>
						</div>
					</div>			
	
				<br>
				<a class="prec" href="01_02_info_geo.php">chapitre précédent</a>
				<a class="suiv" href="01_04_projets.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>
					
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_1.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
