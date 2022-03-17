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
			<h2>XII.1  Introduction à la télédétection</h2>
			    <ul class="listetitres">
					<li><a href="#XII11">Données utilisées : image Sentinel-2</a>
					   <ul class="listesoustitres">
							<li><a href="#XII11a">Type de satellite et de produit</a></li>
							<li><a href="#XII11b">Localisation de l'image</a></li>
						</ul>
					</li>
					<li><a href="#XII12">Téléchargement des données avec l'extension SCP</a></li>
					<li><a href="#XII13">Visualisation et présentation des images</a></li>
				</ul>
				<br>
				
                <p>L'objectif de cette introduction est de voir comment :</p>
                
                <ul>
                    <li>importer et ouvrir une image satellitaire de type Sentinel-2 (ESA)</li>
                    <li>comprendre les caractéristiques spectrales, spatiales, radiométriques et temporelles associées à une image satellitaire</li>
                    <li>interpréter une image satellitaire, extraire de l’information spatiale et spectrale</li>
                </ul>
                
                <h3>Données utilisées : image Sentinel-2<a class="headerlink" id="XII11" href="#XII11"></a></h3>
                
                    <p>L'image que nous allons utiliser ici est une <b>image <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/Sentinel-2">Sentinel-2</a> acquise le 17 août 2021</b>. Nous allons commencer par essayer de répondre à 3 questions :</p>
                    
                    <ul>
                        <li><b>Comment&nbsp;?</b> Quel est le type de satellite, de produit, etc.</li>
                        <li><b>Où&nbsp;?</b> Quelle est la localisation de l'image, le type de référentiel cartographique</li>
                        <li><b>Quand&nbsp;?</b> Quelle est la date de prise de vue, l'heure, l'hémisphère...</li>
                    </ul>
                    
                    <h4>Type de satellite et de produit<a class="headerlink" id="XII11a" href="#XII11a"></a></h4>
                    
                        <p>Il s'agit d'une image <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/Sentinel-2">Sentinel-2</a> de <a target="_blank" class="ext" href="https://sentinels.copernicus.eu/web/sentinel/user-guides/sentinel-2-msi/product-types">niveau 1C</a>, qui contient donc les valeurs de <b>réflectance</b> obtenues en haut de l'atmosphère (&#171;&nbsp;Top Of Atmosphere&nbsp;&#187; ou TOA).</p>
                        
                        <table>
                            <caption>Sentinel-2 product types from <a target="_blank" class="ext" href="https://sentinels.copernicus.eu/web/sentinel/user-guides/sentinel-2-msi/product-types">https://sentinels.copernicus.eu</a>, European Space Agency - ESA</caption>
                            <tr>
                                <th class="centre">Name</th>
                                <th class="centre">High-level Description</th>
                                <th class="centre">Production & Distribution</th>
                                <th class="centre">Data Volume</th>
                            </tr>
                            <tr class="white">
                                <td class="centre">Level-1C</td>
                                <td class="centre">Top-of-atmosphere reflectances in cartographic geometry</td>
                                <td class="centre">Systematic generation and on-line distribution</td>
                                <td class="centre">600 MB (each 100x100 km2)</td>
                            </tr>
                            <tr class="white">
                                <td class="centre">Level-2A</td>
                                <td class="centre">Bottom-of-atmosphere reflectance in cartographic geometry</td>
                                <td class="centre">Systematic generation and on-line distribution and generation on user side (using Sentinel-2 Toolbox)</td>
                                <td class="centre">800 MB (each 100x100 km2)</td>
                            </tr>
                        </table>
                        <br>
                        
                        <p class="keskonfai">Demander autorisation à ESA pour reproduire du contenu du site web ,cf. https://sentinels.copernicus.eu/web/sentinel/terms-conditions</p>
                        
                        <div class="theorie">
                            <p class="theorie">Qu'est-ce que la <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/R%C3%A9flectance">réflectance</a>&nbsp;? C'est une grandeur physique qui correspond à la lumière réfléchie par un objet géographique. C’est donc un rapport entre l’énergie réfléchie et l’énergie incidente (soleil), il s’exprime en pourcentage.</p>
                            <figure>
        						<a href="illustrations/tous/12_01_reflectance.svg" >
        							<img src="illustrations/tous/12_01_reflectance.png" alt="illustration réflectance : flux incident entre soleil et sol et énergie réfléchie entre sol et satellite" width="420">
        						</a>
        					</figure>
        					<p>Exemple pour une parcelle de maïs en juillet dans le Proche Infra Rouge (PIR) en Bretagne :</p>
        					<p class="code">Réflectance x 100 = 60%</p> 
                        </div>
                        
                        <p>Pour obtenir des valeurs de réflectances en bas de l'atmosphère (&#171;&nbsp;Bottom Of Atmosphere&nbsp;&#187; ou BOA), il faut appliquer un <b>modèle de corrections atmosphériques</b>. Il en existe de nombreux et tous sont imparfaits&nbsp;:</p>
                            
                         
                        <ul>
                            <li>Modèle 6S, ATCOR, MACCS, etc.</li>
                            <li>Modèle DOS (Dark Object Substraction) utilisé dans QGIS et SCP</li>
                            <li>Modèle MAJA (CNES)</li>
                        </ul>
                        <p>L'objectif principal est&nbsp;:</p>
                        <ul>
                            <li>d'estimer la contribution atmosphérique dans les réflectances mesurées</li>
                            <li>de passer des comptes numériques d’une image (CN ou DN pour « Digital Number ») à des valeurs physiques de réflectance</li>
                        </ul>
                        
                        <p class="keskonfai">Mais du coup on n'est pas déjà sur des valeurs de réflectance TOA ?</p>
                        
                    
                    <h4>Géométrie des images Sentinel-2<a class="headerlink" id="XII11b" href="#XII11b"></a></h4>
                    
                    <p class="keskonfai">Ca correspond à la question "Où" d'un peu plus haut ?</p>
                    <p class="keskonfai">Trouver l'illustration qui va bien : montrer uniquement la grille sentinel-2 ? Les zones UTM aussi ?</p>
                    
                    <p>Les images Sentinel-2 sont des <b>granules ou tuiles de 100 x 100 km</b>. Ces images sont <b>orthorectifiées</b> et projetées dans le système de coordonnées <b><a href="02_02_coord.php#II22d">UTM</a> / WGS84</b> et ont donc des coordonnées métriques.</p>
                    <p>Elles ont subi des <b>corrections géométriques</b> très précises qui permettent entre autres de les intégrer dans un SIG, de calculer des surfaces...</p>
                    
                    <div class="manip">
                        <p>Pour voir où se situe notre image Sentinel-2 <em class="data">Sentinel2_2021_08_17.tif</em>, ajoutez-la à QGIS, avec par exemple un <a href="03_04_fonds_carte.php#III42a">fonds de carte OpenStreetMap</a>&nbsp;:</p>
                        <figure>
    						<a href="illustrations/tous/12_01_localisation_image_zoom.png" >
    							<img src="illustrations/tous/12_01_localisation_image_zoom.png" alt="fonds OSM centré vers Saint-Raphaël, avec affichage de l'image S2A par dessus" width="400">
    						</a>
    					</figure>
    					<p>L'image est située dans le département du Var, près du golfe de Saint-Tropez.</p>
                    </div>
                
                <h3>Téléchargement des données avec l'extension SCP<a class="headerlink" id="XII12" href="#XII12"></a></h3>
                
                
                <h3>Visualisation et présentation des images<a class="headerlink" id="XII13" href="#XII13"></a></h3>
                
                
				
				<br>
				<a class="prec" href="12_00_teledetection.php">chapitre précédent</a>
				<a class="suiv" href="12_02_info_spectrale.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_12.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
