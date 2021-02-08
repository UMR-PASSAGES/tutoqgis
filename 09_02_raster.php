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
					<li><a href="#IX22">Explorer les données en modifiant le mode de représentation</a>
					   <ul class="listesoustitres">
					       <li><a href="#IX22a">Répartition des valeurs : histogramme de fréquence</a></li>
					       <li><a href="#IX22b">La valeur des pixels sans valeur</a></li>
					       <li><a href="#IX22c">Modifier le style pour explorer les données</a></li>
					   </ul>
					</li>
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
							<img src="illustrations/tous/9_2_decoupage_principe.png" alt="MNE sur fond OSM, la partie à garder est encadrée en rouge" width="500" >
						</a>
						<figcaption>MNE sur fond OpenStreetMap. En gris transparent, l'emprise de la couche, en rouge encadré, la partie à conserver.</figcaption>
					</figure>
					<p>Rendez-vous dans la
						<a class="thumbnail_bottom" href="#thumb">boîte à outils &#8594; GDAL &#8594; Extraction raster &#8594; Découper un raster selon une emprise
							<span>
								<img src="illustrations/tous/9_2_raster_decouper_menu.png" alt="Menu Raster, Extraction, Découper" width="350" >
							</span>
						</a>
					:</p>
					<figure>
						<a href="illustrations/tous/9_2_raster_decouper_fenetre.png" >
							<img src="illustrations/tous/9_2_raster_decouper_fenetre.png" alt="Emplacement de l'outil de découpe dans la boîte à outils" width="600" >
						</a>
					</figure>
					<ul>
						<li class="espace">Couche source : sélectionnez <em class="data">srtm_21_09</em></li>
						<li class="espace">Etendue de découpage : cliquez sur le bouton <b>...</b> tout à droite, choisissez <b>Sélectionner l'emprise depuis le canevas</b>. Il faut ensuite dessiner l'emprise à garder, toujours dans l'outil de découpage. Dessinez un rectangle approximatif autour de l'île de la Jamaïque :
    						<a href="illustrations/tous/9_2_decoupe_jam.png" >
    							<img src="illustrations/tous/9_2_decoupe_jam.png" alt="Menu Raster, Extraction, Découper" width="400" >
    						</a></li>
						<li class="espace">Découpé (étendue)&nbsp;: cliquez sur le bouton à droite <b>...</b> et choisissez où la nouvelle couche sera créée, et son nom : <em class="data">srtm_jamaique</em></li>
						<li class="espace">Cliquez ensuite sur <b>Exécuter</b>.</li>
					</ul>
					
					<p>Une fois l'opération terminée, fermez la fenêtre de l'outil de découpage.</p>
					<p>Dans la liste des couches, décochez srtm_21_09 pour ne voir que la couche découpée : elle ne comprend que la Jamaïque.</p>
					<figure>
						<a href="illustrations/tous/9_2_decoupage_avant.png" >
							<img src="illustrations/tous/9_2_decoupage_avant.png" alt="srtm avant découpage" width="280" >
						</a>
                        <a href="illustrations/tous/9_2_decoupage_apres.png" >
							<img src="illustrations/tous/9_2_decoupage_apres.png" alt="srtm après découpage" width="280" >
						</a>
						<figcaption>SRTM avant et après découpage.</figcaption>
					</figure>
				</div>
				
				<p>Notez qu'il est également possible de découper un raster suivant l'emprise d'une couche de polygones, en utilisant l'option <b>Utiliser l'emprise de la couche</b>. Vous pouvez aussi directement rentrer à la main les coordonnées de l'emprise à conserver.</p>
			
			
			<h3><a class="titre" id="IX22">Explorer les données en modifiant le mode de représentation</a></h3>
			
			    <p>Les données ne contiennent maintenant plus que la zone d'étude et sont donc prêtes pour la suite... Mais au fait, que contiennent-elles, ces données&nbsp;?</p>
			    <p>Avant de créer de nouvelles données à partir de ce MNE, ou bien de le croiser avec d'autres couches, il peut être judicieux d'explorer un peu ces données. Pour cela, il est possible de faire beaucoup de choses en allant simplement dans les propriétés de la couche &nbsp;!</p>
			    
			    <h4><a class="titre" id="IX22a">Répartition des valeurs : histogramme de fréquence</a></h4>
			    
			        <p>Une manière simple d'avoir un aperçu du contenu des données est de visualiser l'histogramme de fréquence des valeurs des pixels. Vous pourrez ainsi voir d'un coup d'&#339;il la répartition des valeurs d'élévation.</p>
			        
			        <div class="manip">
			            <p><b>Propriétés de la couche <em class="data">srtm_jamaique</em> &#8594; rubrique Histogramme</b> : cliquez sur le bouton <b>Calculer l'histogramme</b>.</p>
			            <figure>
    						<a href="illustrations/tous/9_2_histogramme.png" >
    							<img src="illustrations/tous/9_2_histogramme.png" alt="Rubrique histogramme des propriétés de la couche" width="600" >
    						</a>
    					</figure>
    				</div>
    				<p>L'axe horizontal représente les valeurs de pixels, donc ici d'élévation. L'axe vertical représente le nombre de pixels ayant une valeur donnée. Il est également possible de lire les valeurs minimale et maximale sou l'histogramme.</p>
    				<p>On peut voir d'un seul coup d'&#339;il que beaucoup de pixels ont une valeur inférieure à 100 mètres d'élévation.</p>
    				<div class="manip">
    					<p>Il est possible de zoomer sur le graphique en dessinant un rectangle, ou bien en modifiant les valeurs min et max. Un clic droit permet de revenir à la vue initiale.</p>
			        </div>
			        
			    <h4><a class="titre" id="IX22b">La valeur des pixels sans valeur</a></h4>
			    
			        <p>Une information utile à savoir est la <b>valeur des pixels &#171; sans données &#187;</b>. En effet, vous ne voyez dans QGIS que les pixels de la Jamaïque et non ceux de l'océan les environnant, bien que nous ayons précédemment découpé cette couche suivant un rectangle.</p>
			        <p>En fait, <b>un raster étant un tableau, son emprise sera toujours rectangulaire et tous les pixels auront toujours une valeur</b>. Cependant, par commodité, on donne une valeur aberrante aux pixels &#171; sans données &#187;. D'où ce titre énigmatique&nbsp;!</p>
			        <div class="manip">
			            <p>Pour savoir quelle est cette valeur : <b>propriétés de la couche &#8594; rubrique Transparence</b> :</p>
			            <figure>
    						<a href="illustrations/tous/9_2_nodata.png" >
    							<img src="illustrations/tous/9_2_nodata.png" alt="Rubrique Transparence des propriétés de la couche, avec encadré la valeur nulle des pixels" width="600" >
    						</a>
    					</figure>
    					<p>Regardez la valeur à droite de <b>Aucune valeur de données</b> : pour cette couche, cette valeur est de <b>-32768</b>.</p>
			        </div>
			        <p>Il est évident que l'élévation n'est jamais de -32768 mètres : il s'agit d'une valeur aberrante pour indiquer que certains pixels n'ont pas de valeur d'élévation associée.</p>
			        <p><b>Le logiciel gère cela en rendant ces pixels transparents par défaut.</b></p>
			        <div class="manip">
			            <p>Pour tester cela, décochez la case devant <b>Aucune valeur de données</b> et fermez la fenêtre des propriétés. Vous pouvez voir toute l'emprise de la couche, y compris les pixels sans données.</p>
			            <p><img class="icone" src="illustrations/tous/1_2_informations_icone.png" alt="icône identifier les entités" >Vous pouvez utiliser l'outil <b>Identifier des entités</b> pour cliquer sur un pixel &#171; sans données &#187; sur le bord du raster et voir que sa valeur correspond bien à -32768.</p>
			            <figure>
    						<a href="illustrations/tous/9_2_test_nodata.png" >
    							<img src="illustrations/tous/9_2_test_nodata.png" alt="SRTM Jamaïque en visualisant toutes les valeurs, y compris la valeur -32768" width="500" >
    						</a>
    					</figure>
    					<p>Retournez dans les propriétés de la couche et recochez la case <b>Aucune valeur de données</b>.</p>
    					<p>Si vous utilisez à nouveau l'outil d'identification sur un pixel du bord du raster (désormais invisible), vous verrez qu'il est maintenant considéré comme &#171; sans données &#187;. En cliquant en-dehors de l'emprise du raster, l'outil d'identification ne renvoie aucun résultat.</p>
			        </div>
			        
			        <p>Pourquoi la valeur -32768&nbsp;? Voici quelques explications si vous désirez en savoir plus. Il existe différents types de raster : 8 bits, 16 bits, 32 bits... Ce qui correspond en fait au nombre de bits sur lesquels est stockée la valeur d'un pixel.</p>
			        <p>Ici, notre raster est de type 16 bits (ce que vous pouvez vérifier en allant dans les propriétés de la couche, rubrique Information). Chaque valeur de pixel est codée sur 16 bits, ce qui donne 2<sup>16</sup> soit 65536 possibilités. Les valeurs pouvant être positives ou négatives, elles vont de -32768 à 32767, puisque 65536/2=32768.</p>
			        <p>La valeur nulle est donc la valeur la plus aberrante possible, ici -32768.</p>
			        <p>Rendez-vous <a class="ext" target="_blank" href="http://desktop.arcgis.com/fr/arcmap/10.3/manage-data/raster-and-images/bit-depth-capacity-for-raster-dataset-cells.htm" >ici</a> pour en savoir plus sur les différents types de raster et les données qu'ils peuvent contenir. En règle général, on choisit le type codé sur le moins de bits possibles en restant compatible avec les données, pour obtenir des rasters moins lourds.</p>
			        
			        
			    <h4><a class="titre" id="IX22c">Modifier le style pour explorer les données</a></h4>
			    
			        <p>Une manière simple d'explorer les données, aussi bien pour un vecteur que pour un raster, est de modifier la manière dont sont représentées les données.</p>
			        
			        <div class="manip">
			            <p>Rendez-vous dans les propriétés de la couche, rubrique <b>Symbologie</b>.</p>
			            <p>A la place de <b>Bande grise unique</b>, sélectionnez <b>Pseudo-couleur à bande unique</b> et appliquez les changements (sans forcément fermer la fenêtre des propriétés).</p>
			            <figure>
    						<a href="illustrations/tous/9_2_style_pseudocouleur.png" >
    							<img src="illustrations/tous/9_2_style_pseudocouleur.png" alt="Fenêtre des propriétés, Symbologie, style pseudo-couleur à bande unique" width="600" >
    						</a>
    					</figure>
    					<figure>
    						<a href="illustrations/tous/9_2_style_pseudocouleur_res.png" >
    							<img src="illustrations/tous/9_2_style_pseudocouleur_res.png" alt="Fenêtre des propriétés, Symbologie, style pseudo-couleur à bande unique" width="400" >
    						</a>
    					</figure>
    					<p>Ce style permet de choisir le degradé de couleur utilisé pour étirer les valeurs.</p>
    					<p>Choisissez maintenant un mode d'interpolation <b>discret</b> au lieu de linéaire.</p>
    					<a href="illustrations/tous/9_2_interpol_discret.png" >
							<img src="illustrations/tous/9_2_interpol_discret.png" alt="Choix du mode d'interpolation discret dans les propriétés, rubrique Style" width="600" >
						</a>
						<p>Appliquez les changements :</p>
						<figure>
    						<a href="illustrations/tous/9_2_style_discret.png" >
    							<img src="illustrations/tous/9_2_style_discret.png" alt="Elevations en classes du orange clair au marron (mode discret)" width="400" >
    						</a>
    					</figure>
    					<p><b>Les valeurs sont maintenant représentées par classes.</b></p>
    					<p>Il est possible de modifier les classes, soit de manière automatique en choisissant le mode <b>intervalle égal</b> ou <b>quantile</b> et le nombre de classes, sous le tableau des valeurs, soit à la main en double-cliquant sur une valeur dans le tableau.</p>
    					<p class="note">Pour en savoir plus sur les méthodes de discrétisation : voir notamment <a class="ext" target="_blank" href="https://blog.m0le.net/2014/09/08/cartographie-numerique-precis-de-discretisation-pour-les-nuls/" >ici</a>.</p>
    					<p>Par exemple, modifiez les classes pour faire apparaître les pixels de valeur inférieure à 100 mètres, comprise entre 100 et 700 mètres et supérieure à 700 mètres :</p>
    					<figure>
    						<a href="illustrations/tous/9_2_style_discret_3classes.png" >
    							<img src="illustrations/tous/9_2_style_discret_3classes.png" alt="Fenêtre Symbologie : 3 classes, valeurs seuil 100, 700 et max" width="550" >
    						</a>
    					</figure>
    					<figure>
    						<a href="illustrations/tous/9_2_style_discret_3classes_res.png" >
    							<img src="illustrations/tous/9_2_style_discret_3classes_res.png" alt="3 classes, valeurs seuil 100, 700 et max : visualisation" width="400" >
    						</a>
    					</figure>
			        </div>
			        <p>En modifiant le style des données, notamment en discrétisant les données et en faisant varier les classes, on peut avoir une meilleure idée du sujet étudié, ici l'élévation de la Jamaïque. C'est une première approche !</p>
			
			<h3><a class="titre" id="IX23">Manipuler les données : extraction de valeurs</a></h3>
			
			    <p>Admettons maintenant que l'étape précédente nous ait permis de décider qu'on souhaite s'intéresser uniquement à la zone inférieure à 100 mètres d'altitude.</p>
			    <p><b>Comment faire pour obtenir un nouveau raster, où les pixels d'élévation inférieure à 100 mètres ont une valeur de 1 et les autres une valeur de 0&nbsp;?</b> Une telle couche pourra servir par exemple de masque, ou bien pour ne garder que les valeurs d'un raster portant sur un autre thème de la zone inférieure à 100 mètres.</p>
			    
			    <div class="manip">
			       <p>Rendez-vous dans la
						<a class="thumbnail_bottom" href="#thumb">boîte à outils &#8594; Analyse raster &#8594; Raster calculator
							<span>
								<img src="illustrations/tous/9_2_rastercalc_menu.png" alt="Menu Raster, Analyse raster, Calculatrice raster" width="370" >
							</span>
						</a>
					:</p>
					<figure>
						<a href="illustrations/tous/9_2_rastercalc_fenetre.png" >
							<img src="illustrations/tous/9_2_rastercalc_fenetre.png" alt='Fenêtre de la calculatrice raster, avec la formule "srtm_jamaique@1" < 100' width="600" >
						</a>
					</figure>
			    </div>
			    
			    <p>Cet outil permet d'effectuer des calculs sur des rasters, par exemple soustraire un raster à un autre. Nous l'utiliserons ici pour obtenir un raster où les pixels d'élévation inférieure à 100 mètres ont une valeur de 1 et les autres une valeur de 0.</p>
			    
			    <div class="manip">
			        <ul>
			            <li class="espace">Dans la partie <b>Couches</b> en haut à gauche, double-cliquez sur <em class="data">srtm_jamaique</em> pour faire apparaître le nom de la couche dans la partie <b>Expression</b> en-dessous</li>
			            <li class="espace">Complétez l'expression en rajoutant à la main <b>&lt; 100</b> : l'expression complète est donc <b>"srtm_jamaique@1" &lt; 100</b></li>
			            <li class="espace">Dans la partie <b>Reference Layer(s)</b>, cliquez sur le bouton <b>...</b> à doite et sélectionnez la couche <em class="data">srtm_jamaique</em>, pour que le raster créé ait la même emprise, résolution et CRS</li>
			        </ul>
			        <p>Exécutez... Le nouveau raster (temporaire) est ajouté.</p>
			    </div>
			    
			    <p>Comment l'expression <b>"srtm_jamaique@1" &lt; 100</b> nous pemet-elle d'obtenir le résultat souhaité&nbsp;? Cette expression est évaluée pour chaque pixel, le résultat est soit vrai (1) soit faux (0).</p>
			    
			    <div class="manip">
			        <p>Contrairement à ce à quoi on aurait pu s'attendre, on peut voir en noir les valeurs supérieure à 100 mètres. Cependant, en interrogeant le raster avec l'outil d'identification on peut voir que les pixels qui avaient une élévation &lt; 100 mètres ont maintenant une valeur de 1, et les autres 0.</p>
			        <p>Il est facile de changer le mode de représentation, par exemple dans les <b>propriétés &#8594; Symbologie &#8594; Dégradé de couleur</b> : choisir <b>Blanc vers noir</b> au lieu de Noir vers blanc.</p>
			        <figure>
						<a href="illustrations/tous/9_2_blancversnoir.png" >
							<img src="illustrations/tous/9_2_blancversnoir.png" alt='propriétés rubrique symbologie : blanc vers noir' width="600" >
						</a>
					</figure>
                    <figure>
						<a href="illustrations/tous/9_2_blancversnoir_res.png" >
							<img src="illustrations/tous/9_2_blancversnoir_res.png" alt='propriétés rubrique symbologie : blanc vers noir' width="400" >
						</a>
					</figure>
			    </div>
			    
			    <p>Cette couche pourra servir par exemple de masque, telle quelle ou bien en la transformant en couche vecteur au moyen de l'outil Polygoniser.</p>
			
			<h3><a class="titre" id="IX24">Exemples d'opérations sur des données d'altitude</a></h3>
			
			    <p>Il existe un certain nombre d'opérations proposées par les logiciels SIG sur les rasters d'altitude, par exemple la création de courbes de niveaux, d'ombrage, de pente... Nous verrons ici 2 exemples, sur les courbes de niveau et le calcul de pente.</p>
			
			    <h4><a class="titre" id="IX24a">Création de courbes de niveau</a></h4>
				
    				<p>Les courbes de niveaux sont des lignes imaginaires joignant tous les points situés à la même altitude. Nous allons créer des courbes de niveau distantes de 100 mètres à partir du MNE de la Jamaïque.</p>
    				
    				<figure>
						<a href="illustrations/tous/9_2_isohypses_exemple.jpg" >
							<img src="illustrations/tous/9_2_isohypses_exemple.jpg" alt="extrait de carte avec courbes de niveaux" width="300" >
						</a>
						<figcaption>Un extrait de carte avec des courbes de niveau (Source : <a class="ext" target="_blank" href="https://commons.wikimedia.org/wiki/File:Cntr-map-1.jpg" >Wikimedia</a>)</figcaption>
					</figure>
    				
    				<div class="manip">
    					<p>Rendez-vous dans la
    						<a class="thumbnail_bottom" href="#thumb">boîte à outils &#8594; GDAL &#8594; Extraction raster &#8594; Contour
    							<span>
    								<img src="illustrations/tous/9_2_contours_menu.png" alt="Emplacement de l'outil Contour dans la boîte à outils" width="600" >
    							</span>
    						</a>
    					:</p>
    					<figure>
    					   <a href="illustrations/tous/9_2_contours_fenetre.png" >
    					       <img src="illustrations/tous/9_2_contours_fenetre.png" alt="Fenêtre de l'outil de création de contours" width="600" >
    					   </a>
    					</figure>
    					<ul>
    						<li class="espace">Couche source : sélectionnez <em class="data">srtm_jamaique</em></li>
    						<li class="espace">Intervalle entre les courbes de niveaux : tapez <b>100</b> pour un intervalle de 100 mètres</li>
    						<li class="espace"><b>Nom de l'attribut :</b> il s'agit du nom du champ qui contiendra l'altitude de la courbe. Vous pouvez laisser la valeur par défaut <b>ELEV</b>, ou bien taper le nom de votre choix</li>
    					</ul>
    					<p>Cliquez sur <b>Exécuter</b> :</p>
    					<figure class="gauche">
    						<a href="illustrations/tous/9_2_courbes_carte.png" >
    							<img src="illustrations/tous/9_2_courbes_carte.png" alt="Visualisation des courbes de niveau" width="600" >
    						</a>
    						<a href="illustrations/tous/9_2_courbes_table.png">
    							<img src="illustrations/tous/9_2_courbes_table.png" alt="Visualisation des courbes de niveau" width="200" >
    						</a>
    					</figure>
    				
    				</div>
    				
    				<p>Une couche de lignes a été créée. Chaque ligne possède en attribut son élévation, qui varie ici de 0 à 2200 mètres.</p>
    				
    					
    				
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
    						<p>Une étape préliminaire avant de projeter le raster : ouvrez les propriétés du raster, rubrique <b>Information</b>, sous-rubrique <b>Bandes</b>, recherchez <b>Aucune valeur de données</b>. Vous devriez avoir -32768, notez cette valeur. C'est celle utilisée pour les pixels &#171; sans valeur &#187; (qui ont donc en réalité la valeur -32768), en-dehors de l'île.</p>
    						<p>Ensuite, pour changer le SCR du raster :
    							<a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; GDAL &#8594; Projections raster &#8594; Projection (warp)
    								<span>
    									<img src="illustrations/tous/9_2_reproj_raster_menu.png" alt="Menu Raster , Projections, Projection..." width="280" >
    								</span>
    							</a>
    						:</p>
    						<figure>
    							<a href="illustrations/tous/9_2_reproj_raster_fenetre.png">
    								<img src="illustrations/tous/9_2_reproj_raster_fenetre.png" alt="Fenêtre de reprojection du raster" width="600" >
    							</a>
    						</figure>
    						<ul>
    							<li class="espace">Couche source : sélectionnez <em class="data">srtm_jamaique</em> dans la liste</li>
    							<li class="espace">SCR cible : cliquez sur le bouton à droite pour rechercher le SCR <b>JAD2001 code EPSG:3448</b></li>
    							<li class="espace">Valeur Nodata : tapez la <a href="09_02_raster.php#IX22b">valeur des pixels sans données</a> : <b>-32768</b></li>
    							<li class="espace">Laissez tous les autres paramètres par défaut, cliquez sur <b>Exécuter</b>.</li>
    						</ul>
    						<p>Patientez... La nouvelle couche est ajoutée, vous pouvez vérifier dans ses propriétés (rubrique Source) que son SCR soit bien le JAD2001.</p>
    						<figure>
    							<a href="illustrations/tous/9_2_scr_ok.png">
    								<img src="illustrations/tous/9_2_scr_ok.png" alt="scr de la nouvelle couche : JAD2001" width="500" >
    							</a>
    						</figure>
    						<p>Supprimez les autres couches, pour ne garder dans le projet que la couche <em class="data">srtm_jamaique_JAD2001</em>.</p>
    					</div>
    				
    				
    				<h4><a class="titre" id="IX24c">Calcul de pente à partir du raster projeté</a></h4>
    				
    					<div class="manip">
    						<p>Rendez-vous dans la 
    							<a class="thumbnail_bottom" href="#thumb">boîte à outils &#8594; GDAL &#8594; Analyse raster &#8594; Pente
    								<span>
    									<img src="illustrations/tous/9_2_pente_menu.png" alt="Menu Raster, Analyse, MNT/DEM (Modèles de terrain)" width="350" >
    								</span>
    							</a>
    						:</p>
    						<figure>
    							<a href="illustrations/tous/9_2_pente_fenetre.png">
    								<img src="illustrations/tous/9_2_pente_fenetre.png" alt="Fenêtre de calcul de pente" width="500" >
    							</a>
    						</figure>
    						<ul>
    							<li class="espace">Couche source : sélectionnez <em class="data">srtm_jamaique_JAD2001</em></li>
    							<li class="espace">Laissez les autres paramètres par défaut (pour plus d'infos sur les méthodes de Zevenberger & Thorne et Horn : <a class="ext" target="_blank" href="http://www.macaulay.ac.uk/LADSS/documents/DEMs-for-spatial-modelling.pdf" >http://www.macaulay.ac.uk/LADSS/documents/DEMs-for-spatial-modelling.pdf</a>, pp. 12 et 13).</li>
    						</ul>
    						<p>Cliquez sur <b>Exécuter</b>, patientez... la couche s'affiche :</p>
    						<figure>
    							<a href="illustrations/tous/9_2_pente_res.png">
    								<img src="illustrations/tous/9_2_pente_res.png" alt="la couche de pentes" width="400" >
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
    					
    					<p>Il existe beaucoup d'autres traitements possibles sur les données raster. Mais pourquoi toujours opposer raster et vecteur&nbsp;? Dans le prochain chapitre, découvrez comment les faire fonctionner main dans la main&nbsp;!</p>
			
		
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
