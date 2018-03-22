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
			<h2>I.2  Manipuler de l'information géographique</h2>
				<ul class="listetitres">
					<li><a href="#I21">Ajout et suppression d'une couche de données vecteur</a>
					   <ul class= "listesoustitres">
							<li><a href="#I21a" >Par le menu</a></li>
							<li><a href="#I21b" >Par l'explorateur de fichiers</a></li>
						</ul>
					</li>
					<li><a href="#I22">L'interface de QGIS</a></li>
					<li><a href="#I23">Propriétés d'une couche</a>
						<ul class= "listesoustitres">
							<li><a href="#I23a" >Changer la représentation d'une couche</a></li>
							<li><a href="#I23b" >Connaître l'emplacement d'une couche</a></li>
						</ul>
					</li>
					<li><a href="#I24">Ajout d'une couche raster</a>
					<li><a href="#I25">Propriétés d'une couche raster : modifier le style</a>
				</ul>

				
				<h3><a class="titre" id="I21">Ajout d'une couche de données vecteur</a></h3>
				
				    <h4><a class="titre" id="I21a">Par le menu</a></h4>
				
    					<div class="manip">
    						<p>Lancez QGIS. Pour ajouter une couche vecteur, plusieurs solutions :</p>
    							<ul>
    								<li>
    									<a class="thumbnail_bottom" href="#thumb">Menu couche &#8594; Ajouter une couche &#8594; Ajouter une couche vecteur...
    										<span>
    											<img src="illustrations/tous/1_2_ajout_couche_vecteur_menu.png" alt="Menu Couche, ajouter une couche vecteur" height="300" >
    										</span>
    									</a>	
    								</li>
    								<li>cliquer sur l'icône <b>Ajouter une couche vecteur</b><img class="iconemid" src="illustrations/tous/1_2_ajout_vecteur_icone.png" alt="Icône ajout couche vecteur"></li>
    								<li>utiliser le raccourci clavier <b>ctrl + majuscule + v</b></li>
    							</ul>
    					
    						<figure>
    							<a href="illustrations/tous/1_2_ajout_couche_vecteur.png" >
    								<img src="illustrations/tous/1_2_ajout_couche_vecteur.png" alt="Fenêtre ajout couche vecteur" height="200" style="padding-left:10px;">
    							</a>
    						</figure>
    						<p>Type de source et encodage : laissez les valeurs par défaut. Pour en savoir plus sur ce qu'est l'encodage :
    						<a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Codage_de_caract%C3%A8res" >http://fr.wikipedia.org/wiki/Codage_de_caractères</a></p>
    						<p>Cliquez sur <b>Parcourir</b> et sélectionnez la couche <em class="data">depts_bretagne_geofla.shp</em> située dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b>.</p>
    						<p>Cliquez sur <b>Ouvrir</b> : vous pouvez voir à l'écran les départements de la région Bretagne.</p>
    						<p>Pour <b>supprimer cette couche</b> : clic droit sur son nom dans la table des matières,
    						<a class="thumbnail_bottom" href="#thumb">Supprimer
                            	<span>
                            		<img src="illustrations/tous/1_2_supprimer_couche.png" alt="Clic droit sur une couche, supprimer" height="300" >
                            	</span>
                            </a>
                            </p>
    					</div>
    						<p>Cette manipulation enlève seulement la couche de QGIS&#160;; elle reste présente sur votre ordinateur, prête à être ajoutée à nouveau dans QGIS.</p>
    						
    				<h4><a class="titre" id="I21b">Par l'explorateur de fichiers</a></h4>
    				
    				    <div class="manip">
    					
    						<p>Une autre méthode, peut-être plus pratique, consiste à utiliser l'explorateur de fichiers&#160;: activez-le éventuellement dans le menu
    						<a class="thumbnail_bottom" href="#thumb">Menu Vue &#8594; Panneaux &#8594; Explorateur
                            	<span>
                            		<img src="illustrations/tous/1_2_explorateur_menu.png" alt="menu Vue → Panneaux → Explorateur" height="700" >
                            	</span>
                            </a>.</p>
    						<p>Dans ce panneau, naviguez dans l'arborescence de vos fichiers jusqu'au dossier où vous avez téléchargé les données de ce tutoriel. Faites un <b>clic droit sur ce dossier &#8594; Ajouter en Favori</b>. A partir des favoris, rendez-vous maintenant dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b> et double-cliquez sur la couche <em class="data">depts_bretagne_geofla.shp</em>.</p>
    						<figure>
                            	<a href="illustrations/tous/1_2_explorateur.png" >
                            		<img src="illustrations/tous/1_2_explorateur.png" alt="Panneau Explorateur" height="300">
                            	</a>
                            </figure>
    					</div>
	
				<h3><a class="titre" id="I22">L'interface de QGIS</a></h3>
					
					<figure>
						<a href="illustrations/tous/1_2_interface.svg" >
							<img src="illustrations/tous/1_2_interface.png" alt="Interface de QGIS" height="400">
						</a>
					</figure>
					<p>On peut distinguer 6 zones dans QGIS :</p>
					<p><em class="numero">1. </em><b>Menus</b></p>
					<p><em class="numero">2. </em><b>Barres d'outils</b>. On y trouve la même chose que dans les menus, mais sous forme 	d'icônes. Pour savoir que fait un outil, passez la souris au-dessus et lisez l'infobulle. Pour rajouter ou enlever des barres d'outils, clic-droit n'importe où dans cette zone sauf sur un outil désactivé, cocher ou décocher les barres d'outils voulues.</p>
					<p><em class="numero">3. </em>Liste des couches chargées, aussi appelée <b>table des matières</b> ou <b>table of contents</b> (TOC). Si plusieurs couches sont présentes, vous pouvez en modifier ici l'ordre d'affichage. Pour faire apparaître ou disparaître cette zone : menu <b>Vue &#8594; Panneaux &#8594; Couches</b></p>
					<p><em class="numero">4. </em><b>Zone de visualisation</b>. On peut zoomer ou se déplacer dans cette zone.</p>
					<p><em class="numero">5. </em><b>Panneaux supplémentaires</b>, par exemple le panneau <b>Explorateur</b>. Pour ajouter des panneaux, <b>Menu Vue &#8594; Panneaux</b></p>
					<p><em class="numero">6. </em><b>Barre d'état</b>. On y trouve les coordonnées du point où se trouve la souris, l'échelle...</p>
					<div class="manip">
						<figure>
						  <a href="illustrations/tous/1_2_navigation_bo.png" >
							<img src="illustrations/tous/1_2_navigation_bo.png" alt="Barre d'outils navigateur de carte">
						  </a>
						</figure>
						<p>Testez les différents boutons de zoom et de déplacement.</p>
						<p>Pouvez-vous déterminer l'effet de chacun d'entre eux ? A noter : on peut aussi zoomer et dézoomer en utilisant la molette de la souris, ainsi que le trackpad.</p>
						<p>Vous pouvez aussi vous déplacer dans la carte (équivalent de l'outil "main") en maintenant la touche espace appuyée, quelque soit l'outil en cours dans QGIS. Le même résultat est obtenu en maintenant la molette de la souris enfoncée (clic molette prolongé).</p>
					</div>
	
	
				<h3><a class="titre" id="I23">Propriétés d'une couche vecteur</a></h3>
						
					<div class="manip">
						<p>Pour accéder aux propriétés de la couche, clic-droit sur le nom de la couche dans la table des matières,
							<a class="thumbnail_bottom" href="#thumb">Propriétés
							<span>
								<img src="illustrations/tous/1_2_proprietes_couche.png" alt="Clic-droit sur une couche, propriétés" height="320" >
							</span>
							</a>			
							(ou bien double-clic sur le nom de la couche).</p>
					</div>
					
					<p>Vous avez accès ici à plusieurs propriétés, notamment :</p>
					<ol>
						<li>la manière dont la couche est représentée, dans la rubrique <b>Style</b>. Vous pouvez par exemple changer ici la couleur des départements</li>
						<li>l'emplacement de la couche, dans la rubrique <b>Général</b></li>
					</ol>
					
					<h4><a class="titre" id="I23a">Changer la représentation d'une couche</a></h4>
					
					<div class="manip">
						<p>Dans les propriétés de la couche, rubrique <b>Style</b> :</p>
						<figure>
							<a href="illustrations/tous/1_2_style_couche.png" >
								<img src="illustrations/tous/1_2_style_couche.png" alt="Onglet Style des propriétés d'une couche" height="310">
							</a>
						</figure>
						<p>Cliquez sur <b>Remplissage simple</b>. </p>
					</div>
					
					<p><em class="numero">1. </em>Dans la partie <b>Couleurs</b>, vous pouvez modifier la couleur du fond et de la bordure des départements.</p>
					<p><em class="numero">2. </em>Vous pouvez également modifier le <b>style de remplissage</b> : plein, vide, hachures... ainsi que le <b>style de la bordure</b> : ligne continue, pas de bordure, pointillés...</p>
					<p><em class="numero">3. </em>La <b>largeur de la bordure</b> peut aussi être modifiée.</p>
					
					<div class="manip">
						<p>Essayez de donner à votre couche ces différents styles :</p>
						<figure>
							<a href="illustrations/tous/1_2_style1.png" >
								<img src="illustrations/tous/1_2_style1.png" alt="Surfaces en gris clair, bordures en blanc" height="150">
							</a>
							<a href="illustrations/tous/1_2_style2.png" >
								<img src="illustrations/tous/1_2_style2.png" alt="Surfaces sans remplissage, bordures épaisses en gris foncé" height="150">
							</a>
							<a href="illustrations/tous/1_2_style3.png" >
								<img src="illustrations/tous/1_2_style3.png" alt="Surfaces jaunes, pas de bordures" height="150">
							</a>
						</figure>
					</div>
					
					<h4><a class="titre" id="I23b">Connaître l'emplacement d'une couche</a></h4>
					
						<div class="manip">			
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Dans les propriétés de la couche, rubrique <b>Général</b> : pouvez-vous dire à quel endroit est stockée la couche <em class="data">depts_bretagne_geofla</em> sur votre ordinateur ?</label></p>
								<p class="reponse">
								La couche est stockée à l'endroit indiqué dans la partie <b>Source de la couche</b>.
								 Cet emplacement varie bien sûr en fonction de l'endroit où vous avez enregistré les données du tutoriel.
							 	<a href="illustrations/tous/1_2_emplacement_couche.png">
							 		<img src="illustrations/tous/1_2_emplacement_couche.png" alt="Onglet Général des propriétés d'une couche" height="450">
							 	</a>
								</p>
							</div>
						</div>
						
						
				<h3><a class="titre" id="I24">Ajout d'une couche raster</a></h3>		
				
					<div class="manip">
						<p>Comme lors de l'ajout d'une couche vecteur, vous avez plusieurs possibilités pour ajouter une couche raster :</p>
						<ul>
								<li>
									<a class="thumbnail_bottom" href="#thumb">Menu couche &#8594; Ajouter une couche &#8594; Ajouter une couche raster...
										<span>
											<img src="illustrations/tous/1_2_ajout_couche_raster_menu.png" alt="Menu Couche, ajouter une couche raster" height="300" >
										</span>
									</a>	
								</li>
								<li>cliquer sur l'icône <b>Ajouter une couche raster</b><img class="iconemid" src="illustrations/tous/1_2_ajout_raster_icone.png" alt="Icône ajout couche raster"></li>
								<li>utiliser le raccourci clavier <b>ctrl + majuscule + r</b></li>
							</ul>
							<figure>
								<a href="illustrations/tous/1_2_ajout_couche_raster.png" >
									<img src="illustrations/tous/1_2_ajout_couche_raster.png" alt="Interface de QGIS" height="400">
								</a>
							</figure>
							<p>Rendez-vous dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b> et sélectionnez la couche <em class="data">srtm_bretagne.tif</em>.</p>
							<p>Cliquez sur <b>Ouvrir</b> : la couche s'affiche.</p>
							<p>Vous pouvez également double cliquer sur la couche dans l'explorateur de fichiers.</p>
							<figure>
								<a href="illustrations/tous/1_2_srtm.png" >
									<img src="illustrations/tous/1_2_srtm.png" alt="srtm affiché dans QGIS" height="500" >
								</a>
							</figure>
						</div>
						<p>Il s'agit d'un <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain" >modèle d'élévation numérique</a> : chaque pixel possède une valeur correspondant à l'altitude en mètres des éléments présents au sol. Si une forêt est présente, ce sera donc l'altitude du sommet des arbres qui sera mesurée et non l'altitude du sol, idem si des bâtiments sont présents.</p>
						<div class="manip">
							<p><img class="icone" src="illustrations/tous/1_2_informations_icone.png" alt="icône identifier les entités" >Après avoir sélectionné la couche <em class="data">srtm_bretagne.tif</em> en cliquant sur son nom dans la table des matières, utilisez l'outil <b>Identifier les entités</b> pour cliquer sur un point du raster et connaître l'altitude de ce point.</p>
							<figure>
								<a href="illustrations/tous/1_2_identifier_fenetre.png" >
									<img src="illustrations/tous/1_2_identifier_fenetre.png" alt="résultat de l'identification d'un point au hasard du srtm : altitude = 143m" height="230" >
								</a>
							</figure>
							<p>Par exemple, ici, c'est un point d'altitude 336 mètres qui a été identifié.</p>
						</div>
					
				
				<h3><a class="titre" id="I25">Propriétés d'une couche raster : modifier le style</a></h3>	
					
					<div class="manip">
						<p>Comme pour accéder aux propriétés d'une couche vecteur, clic-droit sur le nom de la couche dans la table des matières, <b>Propriétés</b> (ou bien double-clic sur le nom de la couche).</p>
						<p>Pour une couche raster, les différentes rubriques des propriétés sont un peu différentes de celles d'une couche vecteur ; on retrouve néanmoins les rubriques <b>Général</b> et <b>Style.</b></p>
						<p>Rendez-vous dans la rubrique <b>Style</b> :</p>
						<figure>
							<a href="illustrations/tous/1_2_style_raster.png" >
								<img src="illustrations/tous/1_2_style_raster.png" alt="style d'un raster" width="600" >
							</a>
						</figure>
						<p>Pour ce raster, les valeurs minimum sont représentées en blanc et les valeurs maximum en noir : plus l'altitude est élevée, plus le point est foncé.</p>
						<p>Vous pouvez modifier les valeurs minimum et maximum, et inverser les couleurs en choisissant <b>Noir vers blanc</b> au lieu de <b>Blanc vers noir</b>. Cliquez à chaque fois sur <b>Appliquer</b> en bas de la fenêtre pour voir le résultat de vos changements.</p>
					</div>
					
				<br>
				<a class="prec" href="01_01_SIG.php">chapitre précédent</a>
				<a class="suiv" href="01_03_formats.php">chapitre suivant</a>
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
