<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		<div class="main">
		  <h1 class="hide_for_pdf">I.  Prise en main</h1>
			<h2>I.3  Formats de données SIG</h2>
				<ul class="listetitres">
					<li><a href="#I31">Formats vecteur : SHP, GPKG et TAB</a>
						<ul class= "listesoustitres">
							<li><a href="#I31a">Format Shapefile ou SHP : un "standard"</a></li>
							<li><a href="#I31b">Format GPKG (GeoPackage)</a></li>
							<li><a href="#I31c">Format TAB (MapInfo)</a></li>
							<li><a href="#I31d">Et bien d'autres...</a></li>
						</ul>
					</li>
					<li><a href="#I32">Un exemple de format raster : le GeoTIFF</a></li>
					<li><a href="#I33">Quel format utiliser parmi tout ça ?</a></li>
				</ul>
				<br>
				
				<div class="manip">
					<p>Réduire la fenêtre de QGIS. Ouvrir dans l'explorateur de fichiers de votre ordinateur le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b></p>
					<figure>
						<a href="illustrations/1_3_fichiers.jpg" >
							<img src="illustrations/1_3_fichiers.jpg" alt="fichiers format SIG" width="250">
						</a>
					</figure>
				</div>
				<p class="note">Si dans Windows, vous ne voyez pas les extensions de tous les fichiers : dans la fenêtre, Outils &#8594; Options des dossier, onglet Affichage, décocher la case "Masquer les extensions dont le type est connu".</p>
				
				
				<h3>Formats vecteur : SHP, GPKG et TAB<a class="headerlink" id="I31" href="#I31"></a></h3>
				
					<h4>Format Shapefile ou SHP : un "standard"<a class="headerlink" id="I31a" href="#I31a"></a></h4>
					
					    <figure>
						  <a href="illustrations/1_3_fichiers_shp.jpg" >
							 <img src="illustrations/1_3_fichiers_shp.jpg" alt="fichiers format shapefile" width="250">
						  </a>
					    </figure>
					    <p>La couche <em class="data">DEPARTEMENT_BRETAGNE</em> est au format <b>shapefile</b> ou <b>SHP</b>.</p>
						<p>Le format shapefile a été créé par ESRI, l'auteur notamment du logiciel ArcGIS. Ce format est aujourd'hui l'un des standards du SIG et est couramment utilisé par les logiciels libres de SIG.</p>
						<p><b>Un fichier SHP est en fait composé de plusieurs fichiers qui fonctionnent ensemble</b>, dont 3 sont obligatoires :</p>
						<ul>
							<li><b>SHP</b> : contient les informations spatiales</li>
							<li><b>DBF</b> : contient les informations attributaires</li>
							<li><b>SHX</b> : fichier d'index</li>
						</ul>
    					<p>Deux autres fichiers sont aussi bien utiles :</p>
    					<ul>
    						<li><b>PRJ</b> : contient le code du système de coordonnées et éventuellement de la projection, lisible par le logiciel ArcGIS</li>
    						<li><b>QPJ</b> : contient le code du système de coordonnées et éventuellement de la projection, lisible par le logiciel QGIS</li>
    					</ul>
    					<p>Le fichier QPJ contient plus d'informations que le fichier PRJ&nbsp;; néanmoins, QGIS crée également un fichier PRJ pour des raisons de compatibilité avec ArcGIS. Si les 2 fichiers sont présents, QGIS utilisera le QPJ.</p>
    					<p>Pour que le shapefile s'ouvre correctement, tous ces fichiers doivent avoir exactement le même nom. QGIS peut ouvrir et éditer les fichiers SHP.</p>
    					
    					<p>Outre le fait d'être constitué de plusieurs fichiers, le format Shapefile possède plusieurs limitations&nbsp;: les noms de colonnes sont limités à 10 caractères et doivent éviter les accents (limites dues à l'utilisation du format DBF), la taille est limitée à 2Go... Pour en savoir plus sur ces aspects, et pour connaître des formats alternatifs&nbsp;: <a class="ext" target="_blank" href="http://switchfromshapefile.org/" >Switch from Shapefile</a>.</p>
	
					<h4>Format GPKG (GeoPackage)<a class="headerlink" id="I31b" href="#I31b"></a></h4>
					
					   <figure>
						  <a href="illustrations/1_3_fichiers_gpkg.jpg" >
							 <img src="illustrations/1_3_fichiers_gpkg.jpg" alt="fichiers format geopackage" width="250">
						  </a>
					    </figure>
					    <figure>
						  <a href="illustrations/1_3_fichiers_gpkg_2.jpg" >
							 <img src="illustrations/1_3_fichiers_gpkg_2.jpg" alt="fichiers format geopackage (suite)" width="250">
						  </a>
					    </figure>
					    <p>Les 4 couches <em class="data">LA_DEPARTEMENT</em>, <em class="data">LA_LOCALITE_P</em>, <em class="data">LA_REGION_S</em> et <em class="data">TR_SEGMENT_ROUTIER_L</em> sont au format GeoPackage ou GPKG.</p>
					
					   <p>Le format <b>GeoPackage</b> constitue une alternative au Shapefile. Il est le format par défaut de QGIS depuis la version 3. Il est constitué d'<b>un seul fichier avec l'extension GPKG</b>.</p>
					   <p>Il s'agit en réalité d'une base de données (au format SQLite) et peut donc <b>contenir plusieurs couches, aussi bien vecteur que raster</b>.</p>
					   <p>Ce format léger est implémenté aujourd'hui dans la plupart des logiciels SIG.</p>
					   <p>Pour en savoir plus : <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Geopackage" >https://fr.wikipedia.org/wiki/Geopackage</a> (en français) ou <a class="ext" target="_blank" href="http://switchfromshapefile.org/#geopackage">http://switchfromshapefile.org/#geopackage</a> (en anglais).</p>
					   
					
					<h4>Format TAB (MapInfo)<a class="headerlink" id="I31c" href="#I31c"></a></h4>
					
 					    <figure>
						  <a href="illustrations/1_3_fichiers_tab.jpg" >
							 <img src="illustrations/1_3_fichiers_tab.jpg" alt="fichiers format TAB" width="180">
						  </a>
					    </figure>
					    <p>La couche <em class="data">DEPARTEMENT</em> est au format TAB.</p>
						<p>Ce format que vous rencontrerez plus rarement a été créé pour le logiciel <b>MapInfo</b>. Comme pour le SHP, un fichier au format <b>TAB</b> est en fait composé de <b>plusieurs fichiers</b> :</p>
						<ul>
							<li><b>MAP</b> : données spatiales (avec le système de coordonnées)</li>
							<li><b>DAT</b> : données attributaires</li>
							<li><b>TAB</b> : structure de la couche</li>
							<li><b>ID</b> : lien entre les fichiers DAT et MAP</li>
							<li><b>IND</b> : fichier d'indexation (facultatif)</li>
						</ul>
						<p>QGIS peut ouvrir et éditer les fichiers au format TAB.</p>
						
				    <h4>Et bien d'autres...<a class="headerlink" id="I31d" href="#I31d"></a></h4>
				    
				        <p>Il existe de nombreux autres formats de fichiers vecteur lisibles par QGIS. Citons par exemple le <b>GeoJSON</b>, utilisé notamment pour les cartes interactives en ligne, le <b>KML</b>, utilisé par Google Maps et Google Earth...</p>
	
				<h3>Un exemple de format raster : le GeoTIFF<a class="headerlink" id="I32" href="#I32"></a></h3>
				
			        <figure>
					  <a href="illustrations/1_3_fichiers_tif.jpg" >
						 <img src="illustrations/1_3_fichiers_tif.jpg" alt="fichiers format TIF" width="250">
					  </a>
				    </figure>
				    <p>La couche <em class="data">srtm_bretagne</em> est au format TIF.</p>
				
					<p>Vous avez peut-être déjà manipulé des images au format TIF. Les TIF utilisés dans les logiciels SIG possèdent des informations en plus par rapport aux TIF "classiques" : quel type de coordonnées est utilisé, quelles sont les coordonnées de l'image... Il s'agit alors d'un cas particulier de TIF nommé <b>GeoTIFF</b>.</p>
					<p>L'extension du fichier reste TIF. Cependant, chargé dans un logiciel SIG, ce TIF s'affichera directement au bon endroit (c'est-à-dire qu'il se superposera correctement à d'autres couches)&nbsp;; on dit qu'il est <b>géoréférencé</b> (cf. <a href="04_00_georeferencement.php">partie 4 sur le géoréférencement</a>).</p>
					<p>D'autres fichiers peuvent être associés à un raster :</p>
					<ul>
						<li class="espace"><b>QML :</b> ce fichier facultatif sauvegarde le mode de représentation du raster : du noir vers le blanc, valeur minimum et maximum... S'il n'est pas présent, le raster s'affichera avec des paramètres par défaut. Il est propre à QGIS.</li>
						<li class="espace"><b>AUX.XML :</b> ce fichier parfois présent sauvegarde des statistiques et parfois le système de coordonnées de l'image. Il permet d'accélérer l'affichage et certains traitements. Ce fichier est également lisible par le logiciel ArcGIS.</li>
						<li class="espace"><b>TFW :</b> souvent appelé <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/World_file">"World file"</a>, ce fichier stocke les coordonnées de l'image et la taille des pixels. Ce type de fichier existe pour plusieurs formats d'image : l'extension sera JGW pour un JPG, PGW pour un PNG etc. Ce fichier n'est pas nécessaire si les informations sont déjà contenues dans l'en-tête de l'image (ce qui est le cas pour notre GeoTIFF). Les world file sont de moins en moins utilisés dans les SIG&nbsp;; ils peuvent cependant être utiles pour un logiciel non SIG ou pour un format d'image ne permettant pas le stockage d'informations de localisation dans son en-tête.</li>
					</ul>
					
				  <p class="note">Pour en savoir plus sur ce format, vous pouvez lire cet article (en anglais) sur <a class="ext" target="_blank" href="https://blogs.loc.gov/maps/2023/05/the-secret-life-of-geotiffs/" >la vie secrète des GeoTIFFs</a>&nbsp;!</p>
				
				<h3>Quel format utiliser parmi tout ça ?<a class="headerlink" id="I33" href="#I33"></a></h3>
				
				    <p>La réponse à cette question dépend de plusieurs critères :</p>
				    <ul>
				        <li>Quels formats utilisent les gens avec qui vous travaillez au quotidien ?</li>
				        <li>Quels sont les volumes des données que vous manipulez ?</li>
				        <li>S'agit-il de données raster, vecteur ?</li>
				        <li>Faites-vous des traitements sur ces données, ou bien les affichez-vous simplement ?</li>
				    </ul>
				    <p>Utiliser le même format que vos collègues simplifie généralement les choses.</p>
				    <p>Dans ce tutoriel, nous utiliserons surtout des données au format GeoPackage, pour les avantages cités plus haut. Cependant, les manipulations sont exactement les mêmes avec des données au format Shapefile ou autre.</p>
				   
				    

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
