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
			<h2>IX.2  Analyse spatiale : quelques exemples d'opérations sur des données raster</h2>
				<ul class="listetitres">
					<li><a href="#IX21">Préparation des données : découpage d'un raster</a></li>
					<li><a href="#IX22">Explorer les données en modifiant le mode de représentation</a></li>
					<li><a href="#IX23">Manipuler les données : extraction de valeurs</a></li>
					<li><a href="#IX24">Exemples d'opérations sur des données d'altitude</a>
						<ul class="listesoustitres">
							<li><a href="#IX24a">Création de courbes de niveau</a></li>
							<li><a href="#IX24b">Projection d'un raster</a></li>
							<li><a href="#IX24c">Calcul de pente à partir du raster projeté</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Vous verrez ici quelques manipulations sur un raster d'altitude, appliquées au <a href="03_01_donnees_internet.php#III12b">modèle d'élévation numérique (MNE)</a> de la Jamaïque.</p>	
		

			<h3><a class="titre" id="IX21">Préparation des données : découpage d'un raster</a></h3>
			
				<p>Le but sera ici de découper un raster pour ne  garder que la zone qui nous intéresse. Cette manipulation permet d'alléger les données et les futurs traitements.</p>
				
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS. <a href="01_02_info_geo.php#I24" >Ajoutez la couche raster</a> <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">srtm_21_09.tif</a></em> située dans <b>TutoQGIS_09_AnalyseSpat/donnees</b>.</p>
					<p>Le but va être de ne garder que la partie du MNE correspondant à la Jamaïque, en éliminant les parties de Cuba et des îles Caïman.</p>
					<figure>
						<a href="illustrations/tous/9_2_decoupage_principe.png" >
							<img src="illustrations/tous/9_2_decoupage_principe.png" alt="MNE sur fond OSM, la partie à garder est encadrée en rouge" width="85%" >
						</a>
						<figcaption>MNE sur fond OpenStreetMap. En gris transparent, l'emprise de la couche, en rouge encadré, la partie à conserver.</figcaption>
					</figure>
					<p>Rendez-vous dans la
						<a class="thumbnail_bottom" href="#thumb">boîte à outils &#8594; GDAL &#8594; Découper un raster selon une emprise
							<span>
								<img src="illustrations/tous/9_2_raster_decouper_menu.png" alt="Menu Raster, Extraction, Découper" width="80%" >
							</span>
						</a>
					:</p>
					<figure>
						<a href="illustrations/tous/9_2_raster_decouper_fenetre.png" >
							<img src="illustrations/tous/9_2_raster_decouper_fenetre.png" alt="Emplacement de l'outil de découpe dans la boîte à outils" width="100%" >
						</a>
					</figure>
					<ul>
						<li class="espace">Couche source : sélectionnez <em class="data">srtm_21_09</em></li>
						<li class="espace">Etendue de découpage : cliquez sur le bouton <b>...</b> tout à droite, choisissez <b>Sélectionner l'emprise depuis le canevas</b>. Il faut ensuite dessiner l'emprise à garder, toujours dans l'outil de découpage. Dessinez un rectangle approximatif autour de l'île de la Jamaïque :</li>
						<figure>
    						<a href="illustrations/tous/9_2_decoupe_jam.png" >
    							<img src="illustrations/tous/9_2_decoupe_jam.png" alt="Menu Raster, Extraction, Découper" width="80%" >
    						</a>
    					</figure>
						<li class="espace">Découpé (étendue)&nbsp;: cliquez sur le bouton à droite <b>...</b> et choisissez où la nouvelle couche sera créée, et son nom : <em class="data">srtm_jamaique</em></li>
						<li class="espace">Cliquez ensuite sur <b>Exécuter</b>.</li>
					</ul>
					
					<p>Une fois l'opération terminée, fermez la fenêtre de l'outil de découpage.</p>
					<p>Dans la liste des couches, décochez srtm_21_09 pour ne voir que la couche découpée : elle ne comprend que la Jamaïque.</p>
					<figure>
						<a href="illustrations/tous/9_2_decoupage_avant.png" >
							<img src="illustrations/tous/9_2_decoupage_avant.png" alt="srtm avant découpage" width="45%" >
						</a>
                        <a href="illustrations/tous/9_2_decoupage_apres.png" >
							<img src="illustrations/tous/9_2_decoupage_apres.png" alt="srtm après découpage" width="45%" >
						</a>
						<figcaption>SRTM avant et après découpage.</figcaption>
					</figure>
				</div>
				
				<p>Notez qu'il est également possible de découper un raster suivant l'emprise d'une couche de polygones, en utilisant l'option <b>Utiliser l'emprise de la couche</b>. Vous pouvez aussi directement rentrer à la main les coordonnées de l'emprise à conserver.</p>
			
			
			<h3><a class="titre" id="IX22">Explorer les données en modifiant le mode de représentation</a></h3>
			
			<h3><a class="titre" id="IX23">Manipuler les données : extraction de valeurs</a></h3>
			
			<h3><a class="titre" id="IX24">Exemples d'opérations sur des données d'altitude</a></h3>
			
			    <h4><a class="titre" id="IX24a">Création de courbes de niveau</a></h4>
				
    				<p>Les courbes de niveaux sont des lignes imaginaires joignant tous les points situés à la même altitude. Nous allons créer des courbes de niveau distantes de 100 mètres à partir du MNE de la Jamaïque.</p>
    				
    				<div class="manip">
    					<p>Rendez-vous dans le
    						<a class="thumbnail_bottom" href="#thumb">Menu Raster &#8594; Extraction &#8594; Création de contours
    							<span>
    								<img src="illustrations/tous/9_2_contours_menu.png" alt="Menu Raster, Extraction, Création de contours" height="200" >
    							</span>
    						</a>
    					:</p>
    					<figure>
    					   <a href="illustrations/tous/9_2_contours_fenetre.png" >
    					       <img src="illustrations/tous/9_2_contours_fenetre.png" alt="Fenêtre de l'outil de création de contours" width="600" >
    					   </a>
    					</figure>
    					<ul>
    						<li class="espace"><b>Fichier source :</b> sélectionnez <em class="data">srtm_jamaique</em></li>
    						<li class="espace"><b>Fichier de sortie pour les contours :</b> cliquez sur <b>Sélection...</b>, sélectionnez l'emplacement de la couche qui sera créée, tapez son nom : <em class="data">jamaique_courbes_100m</em> par exemple</li>
    						<li class="espace"><b>Intervalle entre les lignes de contour :</b> tapez <b>100</b></li>
    						<li class="espace"><b>Nom d'attribut :</b> il s'agit du nom du champ qui contiendra l'altitude de la courbe. Cochez la case, et laissez la valeur <b>ELEVATION</b> par exemple</li>
    						<li class="espace">Pour finir, cochez la case <b>Charger dans la carte une fois terminé</b>, et cliquez sur <b>OK</b>.</li>
    					</ul>
    					<figure class="gauche">
    						<a href="illustrations/tous/9_2_courbes_carte.png" >
    							<img src="illustrations/tous/9_2_courbes_carte.png" alt="Visualisation des courbes de niveau" width="600" >
    						</a>
    						<a href="illustrations/tous/9_2_courbes_table.png">
    							<img src="illustrations/tous/9_2_courbes_table.png" alt="Visualisation des courbes de niveau" width="200" >
    						</a>
    					</figure>
    				
    				</div>
    				
    				<p>Une couche de lignes a été créée. Chaque ligne possède en attribut son élévation, qui varie ici de 100 à 2200 mètres.</p>
    				
    					
    				
    			<h4><a class="titre" id="IX24b">Projection d'un raster</a></h4>
    			
    				<p>Il est également possible de créer à partir d'un raster d'altitude un raster de pente : chaque pixel aura la valeur de la pente en ce point. Pour en savoir plus sur la manière dont est calculée la pente, vous pouvez vous référer à <a class="ext" target="_blank" href="http://resources.arcgis.com/fr/help/main/10.1/index.html#//00q90000001r000000" >l'aide d'ArcGIS</a> sur ce point.</p>
    				<a href="illustrations/tous/9_2_pente.svg">
    					<img class="gauche" src="illustrations/tous/9_2_pente.png" alt="Représentation de la pente" width="150" >
    				</a>
    				<p>La pente est calculée en fonction de la distance horizontale et de la hauteur. Dans notre cas, la hauteur est en mètres, et la distance horizontale en degrés. Les deux unités étant différentes, le calcul de pente donnera des valeurs aberrantes.</p>
    				<p>La première étape est donc de <b>projeter notre raster, pour obtenir des unités identiques verticalement et horizontalement.</b></p>
    			
    				
    					<p>Quelle projection utiliser pour notre raster ?</p>
    					<p>En règle générale, il y a deux possibilités quand on cherche une projection pour un pays : utiliser une projection nationale, ou bien une <a href="02_02_coord.php#II22d" >projection UTM</a>.</p>
    					<p>Pour savoir s'il existe dans QGIS des projections  nationales pour la Jamaïque, vous pouvez faire une recherche dans les SCR proposés.</p>
    					
    					<div class="manip">
    						<p><img class="icone" src="illustrations/tous/2_3_scr_projet_icone.png" alt="icône SCR" >Rendez-vous dans les propriétés du projet, rubrique SCR, par exemple en cliquant sur l'icône de sphère tout en bas à droite de la fenêtre de QGIS :</p>
    						<figure>						
    							<a href="illustrations/tous/9_2_scr_jamaica.png">
    								<img src="illustrations/tous/9_2_scr_jamaica.png" alt="Recherche d'un SCR pour la Jamaïque" width="600" >
    							</a>
    						</figure>
    						<p>Tapez <b>jamaica</b> dans la rubrique <b>Filtre</b> : plusieurs réponses sont proposées, dont 3 SCR projetés. Une rapide recherche internet semble indiquer que le SCR <b>JAD2001</b> est le plus récent (source : <a class="ext" target="_blank" href="http://www.jamaicancaves.org/jad2001.htm" >http://www.jamaicancaves.org/jad2001.htm</a>). C'est donc ce SCR que nous utiliserons.</p>
    						<p>Sélectionnez <b>JAD2001 (code EPSG:3448) et cliquez sur <b>OK</b>.</b></p>
    					</div>
    					
    					<p>Nous venons de changer le SCR du projet, mais pas celui de notre raster (pour rappel, voir <a href="02_03_couches_projets.php">ici</a>).</p>
    					
    					<div class="manip">
    						<p>Une étape préliminaire avant de projeter le raster : ouvrez les propriétés du raster, rubrique <b>Métadonnées</b>, et dans le bas de la fenêtre, en faisant défiler les propriétés, recherchez <b>Aucune valeur de données</b>. Vous devriez avoir -32768, notez cette valeur. C'est celle utilisée pour les pixels &#171; sans valeur &#187; (qui ont donc en réalité la valeur -32768), en-dehors de l'île.</p>
    						<p>Ensuite, pour changer le SCR du raster :
    							<a class="thumbnail_bottom" href="#thumb">Menu Raster &#8594; Projections &#8594; Reprojection
    								<span>
    									<img src="illustrations/tous/9_2_reproj_raster_menu.png" alt="Menu Raster , Projections, Projection..." height="200" >
    								</span>
    							</a>
    						:</p>
    						<figure>
    							<a href="illustrations/tous/9_2_reproj_raster_fenetre.png">
    								<img src="illustrations/tous/9_2_reproj_raster_fenetre.png" alt="Fenêtre de reprojection du raster" width="550" >
    							</a>
    						</figure>
    						<ul>
    							<li class="espace"><b>Fichier source :</b> sélectionnez <em class="data">srtm_jamaique</em> dans la liste</li>
    							<li class="espace"><b>Fichier en sortie :</b> cliquez sur <b>Sélection...</b>, choisissez l'emplacement de la couche qui sera créée et tapez son nom : <em class="data">srtm_jamaique_JAD2001</em> par exemple</li>
    							<li class="espace"><b>SCR source :</b> vérifiez que cette case soit cochée, et que le SCR actuel de la couche (WGS84, code EPSG:4326) soit bien sélectionné</li>
    							<li class="espace"><b>SCR cible :</b> cochez cette case, et cliquez sur <b>Sélection</b> pour rechercher le SCR <b>JAD2001 code EPSG:3448</b></li>
    							<li class="espace"><b>Données sans valeur :</b> tapez la valeur notée précédemment : <b>-32768</b></li>
    							<li class="espace"><b>Charger dans la carte une fois terminé :</b> cochez cette case</li>
    							<li class="espace">Laissez les autres paramètres par défaut, cliquez sur <b>OK</b>.</li>
    						</ul>
    						<p>Patientez... La nouvelle couche est ajoutée, vous pouvez vérifier dans ses propriétés (rubrique Général) que son SCR est bien le JAD2001.</p>
    						<figure>
    							<a href="illustrations/tous/9_2_scr_ok.png">
    								<img src="illustrations/tous/9_2_scr_ok.png" alt="scr de la nouvelle couche : JAD2001" width="600" >
    							</a>
    						</figure>
    						<p>Supprimez les autres couches, pour ne garder dans le projet que la couche <em class="data">srtm_jamaique_JAD2001</em>.</p>
    					</div>
    				
    				
    				<h4><a class="titre" id="IX24c">Calcul de pente à partir du raster projeté</a></h4>
    				
    					<div class="manip">
    						<p>Rendez-vous dans le
    							<a class="thumbnail_bottom" href="#thumb">Menu Raster &#8594; Analyse &#8594; MNT/DEM (Modèles de terrain)
    								<span>
    									<img src="illustrations/tous/9_2_pente_menu.png" alt="Menu Raster, Analyse, MNT/DEM (Modèles de terrain)" height="250" >
    								</span>
    							</a>
    						:</p>
    						<figure>
    							<a href="illustrations/tous/9_2_pente_fenetre.png">
    								<img src="illustrations/tous/9_2_pente_fenetre.png" alt="Fenêtre de calcul de pente" width="500" >
    							</a>
    						</figure>
    						<ul>
    							<li class="espace"><b>Fichier source :</b> sélectionnez <em class="data">srtm_jamaique_JAD2001</em></li>
    							<li class="espace"><b>Fichier en sortie :</b> cliquez sur <b>Sélection...</b> et sélectionnez l'emplacement de la couche qui sera créée, tapez son nom : <em class="data">pente_jamaique_JAD2001</em></li>
    							<li class="espace"><b>Mode :</b> choisir <b>Pente</b> dans la liste déroulante</li>
    							<li class="espace">Cochez la case <b>Charger dans la carte une fois terminé</b></li>
    							<li class="espace">Laissez les autres paramètres par défaut (pour plus d'infos sur les méthodes de Zevenberger & Thorne et Horn : <a class="ext" target="_blank" href="http://www.macaulay.ac.uk/LADSS/documents/DEMs-for-spatial-modelling.pdf" >http://www.macaulay.ac.uk/LADSS/documents/DEMs-for-spatial-modelling.pdf</a>, pp. 12 et 13).</li>
    						</ul>
    						<p>Cliquez sur <b>OK</b>, patientez... la couche s'affiche :</p>
    						<figure>
    							<a href="illustrations/tous/9_2_pente_res.png">
    								<img src="illustrations/tous/9_2_pente_res.png" alt="la couche de pentes" width="600" >
    							</a>
    						</figure>
    						<p>Ici, les pixels sombres représentent des pentes faibles et les pixels clairs de fortes pentes.</p>
    						<p><img class="icone" src="illustrations/tous/8_2_id_icone.png" alt="menu projet, sauvegarder sous..." >En cliquant sur un pixel avec l'outil <b>Identifier les entités</b>, vous pouvez connaître la valeur de la pente pour ce pixel :</p>
    						<figure>
    							<a href="illustrations/tous/9_2_id_pente.png">
    								<img src="illustrations/tous/9_2_id_pente.png" alt="la couche de pentes" width="400" >
    							</a>
    						</figure>
    						<p>Ici, le pixel a une pente de 13,5° environ.</p>
    					</div>
			
		
				<br>
				<a class="suiv" href="09_03_vecteur_raster.php">chapitre suivant</a>
				<a class="prec" href="09_01_vecteur.php">chapitre précédent</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_9.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
