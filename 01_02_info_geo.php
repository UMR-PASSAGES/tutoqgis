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
					<li><a href="#I23">Propriétés d'une couche vecteur</a>
						<ul class= "listesoustitres">
							<li><a href="#I23a" >Changer la représentation d'une couche</a></li>
							<li><a href="#I23b" >Connaître l'emplacement d'une couche</a></li>
							<li><a href="#I23c" >Filtrer les données</a></li>
						</ul>
					</li>
					<li><a href="#I24">Ajout d'une couche raster</a></li>
					<li><a href="#I25">Propriétés d'une couche raster : modifier le style</a></li>
				</ul>

				
				<h3>Ajout et suppression d'une couche de données vecteur<a class="headerlink" id="I21" href="#I21"></a></h3>
				
				    <h4>Par le menu<a class="headerlink" id="I21a" href="#I21a"></a></h4>
				
    					<div class="manip">
    						<p>Lancez QGIS. Depuis QGIS 3, il existe une interface unique pour ajouter des couches vecteurs, rasters etc. : le gestionnaire des sources de données.</p>
    						<p>Pour ajouter une couche vecteur via cette interface, plusieurs solutions au choix :</p>
							<ul>
								<li>
									<a class="thumbnail_bottom" href="#thumb">Menu couche &#8594; Gestionnaire des sources de données
										<span>
											<img src="illustrations/1_2_ajout_couche_gestionnaire_menu.jpg" alt="Menu Couche, gestionnaire des sources de données" height="120" >
										</span>
									</a>	
								</li>
								<li>cliquer sur l'icône <b>Ouvrir le gestionnaire des sources de données</b><img class="iconemid" src="illustrations/1_2_gestionnaire_donnees_icone.jpg" alt="Icône du gestionnaire des sources de données"></li>
								<li>utiliser le raccourci clavier <b>ctrl + L</b> (minuscule)</li>
							</ul>
    					    <p>Si vous souhaitez retrouver vos habitudes de QGIS 2.18, vous pouvez également procéder ainsi : </p>
					       <ul>
					           <li>
									<a class="thumbnail_bottom" href="#thumb">Menu couche &#8594; Ajouter une couche &#8594; Ajouter une couche vecteur...
										<span>
											<img src="illustrations/1_2_ajout_couche_vecteur_menu.jpg" alt="Menu Couche, ajouter une couche vecteur" height="300" >
										</span>
									</a>	
								</li>
								<li><img class="icone" src="illustrations/1_2_ajout_vecteur_icone.jpg" alt="Icône ajout couche vecteur">Cliquer sur l'icône <b>Ajouter une couche vecteur</b> (il faut activer la barre d'outils <b>Gestion des couches</b> si ce n'est pas déjà fait : menu Vue &#8594; Barres d'outils &#8594; Gestion des couches)</li>
								<li>utiliser le raccourci clavier <b>ctrl + majuscule + v</b></li>
							</ul>
    					   <p>Dans tous les cas, vous arrivez normalement à cette fenêtre :</p>
    						<figure>
    							<a href="illustrations/1_2_ajout_couche_vecteur_gestionnaire.jpg" >
    								<img src="illustrations/1_2_ajout_couche_vecteur_gestionnaire.jpg" alt="Fenêtre du gestionnaire des sources de données, rubrique vecteur" width="600" >
    							</a>
    						</figure>
    						<ul>
    						    <li>Vérifiez que vous êtes bien dans la rubrique <b>Vecteur</b>. Par défaut, le gestionnaire des sources de données s'ouvre dans la dernière rubrique utilisée.</li>
        						<li>Type de source et encodage : laissez les valeurs par défaut. Pour en savoir plus sur ce qu'est l'encodage :
        						<a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Codage_de_caract%C3%A8res" >http://fr.wikipedia.org/wiki/Codage_de_caractères</a></li>
        						<li>Cliquez sur <b>...</b> à gauche de <b>Jeux de données vectorielles</b> et sélectionnez la couche <em class="data"><a href="donnees/TutoQGIS_01_PriseEnMain.zip">DEPARTEMENT_BRETAGNE.shp</a></em> située dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b>.</li>
    						</ul>
    						<p>Cliquez sur <b>Ajouter</b> : vous pouvez voir à l'écran les départements de la région Bretagne. Vous pouvez fermer la fenêtre du gestionnaire de source de données.</p>
    						<p>Pour <b>supprimer cette couche</b> : clic droit sur son nom dans la table des matières,
    						<a class="thumbnail_bottom" href="#thumb">Supprimer la couche...
                            	<span>
                            		<img src="illustrations/1_2_supprimer_couche.jpg" alt="Clic droit sur une couche, supprimer" height="300" >
                            	</span>
                            </a>
                            </p>
    					</div>
    						<p>Cette manipulation enlève seulement la couche de QGIS&#160;; elle reste présente sur votre ordinateur, prête à être ajoutée à nouveau dans QGIS.</p>
    						
    				<h4>Par l'explorateur de fichiers<a class="headerlink" id="I21b" href="#I21b"></a></h4>
    				
    				    <div class="manip">
    					
    						<p>Une autre méthode, peut-être plus pratique, consiste à utiliser l'explorateur de fichiers&#160;: activez-le éventuellement dans le 
    						<a class="thumbnail_bottom" href="#thumb">Menu Vue &#8594; Panneaux &#8594; Panneau Explorateur
                            	<span>
                            		<img src="illustrations/1_2_explorateur_menu.jpg" alt="menu Vue → Panneaux → Explorateur" height="700" >
                            	</span>
                            </a>.</p>
    						<p>Dans ce panneau, naviguez dans l'arborescence de vos fichiers jusqu'au dossier où vous avez téléchargé les données de ce tutoriel. Faites un <b>clic droit sur ce dossier &#8594; Ajouter aux marque-pages</b>.</p>
    						<p>A partir des marque-pages, rendez-vous dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b> et double-cliquez sur la couche <em class="data">DEPARTEMENT_BRETAGNE.shp</em>.</p>
    						<figure>
                            	<a href="illustrations/1_2_explorateur.jpg" >
                            		<img src="illustrations/1_2_explorateur.jpg" alt="Panneau Explorateur" width="330">
                            	</a>
                            </figure>
    					</div>
    					
				<h3>L'interface de QGIS<a class="headerlink" id="I22" href="#I22"></a></h3>
					
					<figure>
						<a href="illustrations/1_2_interface.jpg" >
							<img src="illustrations/1_2_interface.jpg" alt="Interface de QGIS" width="600">
						</a>
					</figure>
					<p>On peut distinguer 6 zones dans QGIS :</p>
					<p><em class="numero">1. </em><b>Menus</b></p>
					<p><em class="numero">2. </em><b>Barres d'outils</b>. On y trouve la même chose que dans les menus, mais sous forme 	d'icônes. Pour savoir que fait un outil, passez la souris au-dessus et lisez l'infobulle. Pour rajouter ou enlever des barres d'outils, clic-droit n'importe où dans cette zone sauf sur un outil désactivé, cocher ou décocher les barres d'outils voulues.</p>
					<p><em class="numero">3. </em><b>Panneau couches</b>, avec la liste des couches chargées, aussi appelé parfois table des matières ou table of contents (TOC). Si plusieurs couches sont présentes, vous pouvez en modifier ici l'ordre d'affichage en les faisant glisser. Pour faire apparaître ou disparaître cette zone : menu <b>Vue &#8594; Panneaux &#8594; Couches</b></p>
					<p><em class="numero">4. </em><b>Zone de visualisation</b>. On peut zoomer ou se déplacer dans cette zone.</p>
					<p><em class="numero">5. </em><b>Panneaux supplémentaires</b>, par exemple le panneau <b>Explorateur</b>. Pour ajouter des panneaux, <b>Menu Vue &#8594; Panneaux</b></p>
					<p><em class="numero">6. </em><b>Barre d'état</b>. On y trouve les coordonnées du point où se trouve la souris, l'échelle...</p>
					<div class="manip">
						<figure>
						  <a href="illustrations/1_2_navigation_bo.jpg" >
							<img src="illustrations/1_2_navigation_bo.jpg" alt="Barre d'outils navigateur de carte">
						  </a>
						</figure>
						<p>Testez les différents boutons de zoom et de déplacement.</p>
						<p>Pouvez-vous déterminer l'effet de chacun d'entre eux ? A noter : on peut aussi zoomer et dézoomer en utilisant la molette de la souris, ainsi que le trackpad.</p>
						<p>Vous pouvez aussi vous déplacer dans la carte (équivalent de l'outil "main") en maintenant la touche espace appuyée, quelque soit l'outil en cours dans QGIS. Le même résultat est obtenu en maintenant la molette de la souris enfoncée (clic molette prolongé).</p>
					</div>
	
	
				<h3>Propriétés d'une couche vecteur<a class="headerlink" id="I23" href="#I23"></a></h3>
						
					<div class="manip">
						<p>Pour accéder aux propriétés de la couche, clic-droit sur le nom de la couche dans la table des matières,
							<a class="thumbnail_bottom" href="#thumb">Propriétés
							<span>
								<img src="illustrations/1_2_proprietes_couche.jpg" alt="Clic-droit sur une couche, propriétés" height="320" >
							</span>
							</a>			
							(ou bien double-clic sur le nom de la couche).</p>
					</div>
					
					<p>Vous avez accès ici à plusieurs propriétés, notamment :</p>
					<ol>
						<li>la manière dont la couche est représentée, dans la rubrique <b>Symbologie</b>. Vous pouvez par exemple changer ici la couleur des départements</li>
						<li>l'emplacement de la couche, dans la rubrique <b>Information</b></li>
					</ol>
					
					<h4>Changer la représentation d'une couche<a class="headerlink" id="I23a" href="#I23a"></a></h4>
					
    					<div class="manip">
    						<p>Dans les propriétés de la couche, rubrique <b>Symbologie</b> :</p>
    						<figure>
    							<a href="illustrations/1_2_style_couche.jpg" >
    								<img src="illustrations/1_2_style_couche.jpg" alt="Onglet Style des propriétés d'une couche" width="600">
    							</a>
    						</figure>
    						<p>Cliquez sur <b>Remplissage simple</b>. </p>
    					</div>
    					<p>Vous pouvez modifier ici notamment :</p>
    					<p><em class="numero">1. </em>La couleur et le style du remplissage (continu, hachures, pas de remplissage...)</p>
    					<p><em class="numero">2. </em>La couleur et le style de la bordure (ligne continue, pas de bordure, pointillés...)</p>
    					
    					<div class="manip">
    						<p>Essayez de donner à votre couche ces différents styles :</p>
    						<figure>
    							<a href="illustrations/1_2_style1.jpg" >
    								<img src="illustrations/1_2_style1.jpg" alt="Surfaces en gris clair, bordures en blanc" width="170">
    							</a>
    							<a href="illustrations/1_2_style2.jpg" >
    								<img src="illustrations/1_2_style2.jpg" alt="Surfaces sans remplissage, bordures épaisses en gris foncé" width="170">
    							</a>
    							<a href="illustrations/1_2_style3.jpg" >
    								<img src="illustrations/1_2_style3.jpg" alt="Surfaces jaunes, pas de bordures" width="170">
    							</a>
    						</figure>
    					</div>
					
					<h4>Connaître l'emplacement d'une couche<a class="headerlink" id="I23b" href="#I23b"></a></h4>
					
						<div class="manip">			
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Dans les propriétés de la couche, rubrique <b>Information</b> : pouvez-vous dire à quel endroit est stockée la couche <em class="data">DEPARTEMENT_BRETAGNE</em> sur votre ordinateur ?</label></p>
								<p class="reponse">
								La couche est stockée à l'endroit indiqué dans la partie <b>Chemin</b>.
								 Cet emplacement varie bien sûr en fonction de l'endroit où vous avez enregistré les données du tutoriel.
							 	<a href="illustrations/1_2_emplacement_couche.jpg">
							 		<img src="illustrations/1_2_emplacement_couche.jpg" alt="Onglet Général des propriétés d'une couche" width="600">
							 	</a>
								</p>
							</div>
						</div>
						<p class="note">Vous pouvez aussi vérifier l'emplacement d'une couche en passant simplement la souris sur son nom dans le panneau des couches !</p>
						
					<h4>Filtrer les données<a class="headerlink" id="I23c" href="#I23c"></a></h4>
					
					   <p>Le logiciel offre également la possibilité de de <b>filtrer les données</b>. Cette opération ne modifie pas les données elles-mêmes, mais seules les données filtrées seront affichées aussi bien sur la carte que dans la table attributaire. Toutes les opérations effectuées sur la couche ne le seront que sur les données filtrées.</p>
					   <p>Ceci est très utile pour masquer temporairement certaines données. Si vous souhaitez vraiment ne travailler que sur une partie des données, il est peut-être plus clair de créer une nouvelle couche contenant uniquement les données étudiées.</p>
					   <p>Ici, nous allons filtrer uniquement le département du Finistère.</p>
					   
					   <div class="manip">
					       <p>Faites un clic droit sur la couche de départements &#8594; <b>Filtrer...</b></p>
					       <figure>
								<a href="illustrations/1_2_filtrer.jpg" >
									<img src="illustrations/1_2_filtrer.jpg" alt="Fenêtre du constructeur de requêtes" width="500">
								</a>
							</figure>
							<p>Nous allons ici construire une requête simple pour sélectionner le département du Finistère. Les requêtes sont vues plus en détail <a href="06_01_req_attrib.php" >ici</a> !</p>
							<ul>
							 <li class="espace">Double-cliquez sur le champ <b>NOM_DEP</b> pour le faire apparaître en bas dans l'expression de filtrage</li>
							 <li class="espace">Cliquez sur l'opérateur <b>LIKE</b></li>
							 <li class="espace">Cliquez sur le bouton <b>Toutes</b> à droite pour voir toutes les valeurs possibles pour le champ NOM_DEP, puis double-cliquez sur <b>FINISTERE</b></li>
							</ul>
							<p>Cliquez ensuite sur le bouton <b>Tester</b> : la requête renvoie un résultat. Cliquez sur <b>OK</b>.</p>
							<figure>
								<a href="illustrations/1_2_filtrer_resultat.jpg" >
									<img src="illustrations/1_2_filtrer_resultat.jpg" alt="couche et table après filtre" width="600">
								</a>
							</figure>
							<p>Seul le département du Finistère est visible dans la carte et la couche. Notez qu'un petit entonnoir à droite du nom de la couche indique qu'un filtre est actif.</p>
							<p>Filtrer ses données est très pratique, mais le risque est d'oublier qu'on ne travaille pas sur toutes les données&nbsp;!</p>
							<p>Pour désactiver le filtre, clic droit sur la couche de départements &#8594; <b>Filtrer...</b>, cliquer sur <b>Effacer</b> puis sur <b>OK</b>.</p>
					   </div>
					   <p class="note">Le filtres est également accessible à partir des propriétés de la couche &#8594; rubrique Source &#8594; bouton Constructeur de requête tout en bas de la fenêtre.</p>
						
						
				<h3>Ajout d'une couche raster<a class="headerlink" id="I24" href="#I24"></a></h3>		
				
					<div class="manip">
						<p>Comme lors de l'ajout d'une couche vecteur, vous avez plusieurs possibilités pour ajouter une couche raster. Par exemple, en utilisant le <b>gestionnaire des sources de données :</b></p>
						<ul>
								<li>menu couche &#8594; Gestionnaire des sources de données</li>
								<li><img class="iconemid" src="illustrations/1_2_gestionnaire_donnees_icone.jpg" alt="Icône du gestionnaire des sources de données">cliquer sur l'icône du gestionnaire des sources de données</li>
								<li>utiliser le raccourci clavier <b>ctrl + L</b></li>
							</ul>
							<figure>
								<a href="illustrations/1_2_ajout_couche_raster_fenetre.jpg" >
									<img src="illustrations/1_2_ajout_couche_raster_fenetre.jpg" alt="Gestionnaire de sources de données rubrique raster" width="600">
								</a>
							</figure>
							<p>Allez dans la rubrique <b>Raster</b> et cliquez sur les <b>...</b> à droite de <b>Jeux de données Raster</b>.</p>
							<figure>
								<a href="illustrations/1_2_ajout_couche_raster.jpg" >
									<img src="illustrations/1_2_ajout_couche_raster.jpg" alt="Interface de QGIS" width="600">
								</a>
							</figure>
							<p>Rendez-vous dans le dossier <b>TutoQGIS_01_PriseEnMain/donnees</b> et sélectionnez la couche <em class="data"><a href="donnees/TutoQGIS_01_PriseEnMain.zip">srtm_bretagne.tif</a></em>.</p>
							<p>Cliquez sur <b>Ouvrir</b>, puis sur <b>Ajouter</b> dans la fenêtre du gestionnaire de données.</p>
							<p>Vous pouvez également double cliquer sur la couche dans l'explorateur de fichiers.</p>
							<figure>
								<a href="illustrations/1_2_srtm.jpg" >
									<img src="illustrations/1_2_srtm.jpg" alt="srtm affiché dans QGIS" width="500" >
								</a>
								<figcaption>Pour obtenir cette représentation, la couche de départements est affichée au-dessus du raster, sans remplissage, avec un contour rouge.</figcaption>
							</figure>
							<p>Pour modifier l'ordre des couches et donc l'ordre dans lequel elles sont affichée, 
    							<a class="thumbnail_bottom" href="#thumb">faites-les glisser dans la liste des couches
                                	<span>
                                		<img src="illustrations/1_2_modifier_ordre_couches.gif" alt="GIF montrant comment faire glisser une couche par-dessus une autre" height="300" >
                                	</span>
                                </a>.
                            </p>
						</div>
						<p>Il s'agit d'un <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain" >modèle d'élévation numérique</a> : chaque pixel possède une valeur correspondant à l'altitude en mètres des éléments présents au sol. Si une forêt est présente, ce sera donc l'altitude du sommet des arbres qui sera mesurée et non l'altitude du sol, idem si des bâtiments sont présents.</p>
						<div class="manip">
							<p><img class="icone" src="illustrations/1_2_informations_icone.jpg" alt="icône identifier les entités" >Après avoir sélectionné la couche <em class="data">srtm_bretagne.tif</em> en cliquant sur son nom dans la table des matières, utilisez l'outil <b>Identifier les entités</b> pour cliquer sur un point du raster et connaître l'altitude de ce point.</p>
							<figure>
								<a href="illustrations/1_2_identifier_fenetre.jpg" >
									<img src="illustrations/1_2_identifier_fenetre.jpg" alt="résultat de l'identification d'un point au hasard du srtm : altitude = 143m" width="500" >
								</a>
							</figure>
							<p>Par exemple, ici, c'est un pixel d'altitude 336 mètres qui a été identifié.</p>
						</div>
					
				
				<h3>Propriétés d'une couche raster : modifier le style<a class="headerlink" id="I25" href="#I25"></a></h3>	
					
					<div class="manip">
						<p>Comme pour accéder aux propriétés d'une couche vecteur, clic-droit sur le nom de la couche dans la table des matières, <b>Propriétés</b> (ou bien double-clic sur le nom de la couche).</p>
						<p>Pour une couche raster, les différentes rubriques des propriétés sont un peu différentes de celles d'une couche vecteur ; on retrouve néanmoins les rubriques <b>Information</b> et <b>Symbologie.</b></p>
						<p>Rendez-vous dans la rubrique <b>Symbologie</b> :</p>
						<figure>
							<a href="illustrations/1_2_style_raster.jpg" >
								<img src="illustrations/1_2_style_raster.jpg" alt="style d'un raster" width="600" >
							</a>
						</figure>
						<p>Pour ce raster, les valeurs minimum sont représentées en noir et les valeurs maximum en blanc&nbsp;: plus l'altitude est élevée, plus le point est clair.</p>
						<p>Vous pouvez modifier les valeurs minimum et maximum, et inverser les couleurs en choisissant <b>Blanc vers noir</b> au lieu de <b>Noir vers blanc</b>. Cliquez à chaque fois sur <b>Appliquer</b> en bas de la fenêtre pour voir le résultat de vos changements.</p>
					</div>
					
					<p class="note">Il est également possible de faire des classes en fonction des valeurs des pixels, en choisissant le <b>type de rendu</b> (en haut de la fenêtre des propriétés rubrique Symbologie) <b>Pseudo-couleur à bande unique</b>.</p>
					
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
