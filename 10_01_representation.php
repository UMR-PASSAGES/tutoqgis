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
			<h2>X.1  Représenter des données : différentes méthodes adaptées à différents cas</h2>
				<ul class="listetitres">
					<li><a href="#X11">Représenter des quantités ou des effectifs : carte en symboles proportionnels</a>
						<ul class="listesoustitres">
							<li><a href="#X11a">Créer une couche de points à partir d'une couche de polygones</a>
							<li><a href="#X11b">Faire varier la taille de points en fonction d'un champ</a>
							<li><a href="#X11c">Surface, rayon, Flannery... Pour en savoir plus sur les différentes méthodes</a>
							<li><a href="#X11d">Les plus petits devant ! Modifier l'ordre d'affichage des symboles</a>
						</ul>
					</li>
					<li><a href="#X12">Représenter des variables relatives à des surfaces : cartes choroplèthes</a>
						<ul class="listesoustitres">
							<li><a href="#X12a">Créer un champ de densité de population</a></li>
							<li><a href="#X12b">Faire varier la couleur des communes en fonction du champ densité</a></li>
						</ul>
					</li>
					<li><a href="#X13">Représenter des quantités ou des effectifs : cartes en semis de points</a></li>
				</ul>
				

				<p>Il existe de nombreuses manières de représenter les données. Nous en avons abordées certaines dans les précédentes parties, et nous en verrons quelques unes plus en détail ici. Il en existe beaucoup d'autres&nbsp;!</p>
				
				<p>Le <a href="10_02_mise_en_page.php" >chapitre suivant</a> abordera quant à lui la mise en page proprement dite, dans le module dédié de QGIS, qui permet d'exporter une carte avec légende, titre, échelle...</p>
				<p>A partir d'une couche de communes et leur population, nous allons voir différentes manières de visualiser cette population.</p>
				
				<p><b>Nous ne parlerons pas ici, ou très peu, de sémiologie graphique et du choix du mode de représentation</b>, ce qui a déjà été fait dans de nombreux ouvrages, notamment :</p>
				<ul>
					<li><em>Sémiologie graphique: Les diagrammes - Les réseaux - Les cartes</em> de Jacques Bertin</li>
					<li><em>Manuel de cartographie</em> de Nicolas Lambert et Christine Zanin</li>
					<li><em>Pratiques de la cartographie</em> d'Anne Le Fur</li>
				</ul>
				
				<h3><a class="titre" id="X11">Représenter des quantités ou des effectifs : carte en symboles proportionnels</a></h3>
				
					<p>Les cartes en symbole proportionnels permettent la représentation de quantités ou d'effectifs par des symboles, généralement des cercles. La surface des symboles sera proportionnelle à la quantité ou l'effectif.</p>
					<figure>
						<a href="https://neocarto.hypotheses.org/5064" >
							<img src="illustrations/tous/10_01_exemple_cercleprop.png" alt="Exemple d'une carte en cercles proportionnels sur les ouvriers et cadres en Occitanie" width="100%">
						</a>
						<figcaption>Exemple d'une carte en cercles proportionnels réalisée par Nicolas Lambert et Ronan Ysebaert (2018). Source : <a href="https://neocarto.hypotheses.org/5064">carnet (néo)cartographique</a>.</figcaption>
					</figure>
					
					<h4><a class="titre" id="X11a">Créer une couche de points à partir d'une couche de polygones</a></h4>
					
						<p>Dans QGIS, la visualisation de données sous forme de cercles proportionnels peut se faire directement à partir d'une couche de polygone (c'est alors les centroïdes des polygones qui sont représentés) mais est plus simple à partir d'une couche de points.</p>
						<p><b>A partir de la couche de communes, nous allons créer les centroïdes (barycentres) des communes.</b></p>
						<p>Qu'est-ce que le <a class="ext" target="_blank" href="https://en.wikipedia.org/wiki/Centroid">centroïde</a> d'un polygone ? Il s'agit du centre géométrique de ce polygone. Conctètement, cela correspond au point où une forme en papier du polygone tiendrait en équilibre sur une épingle. Sans entrer dans le détail du calcul des coordonnées d'un centroïde, l'idée est de minimiser la distance au carré de ce centroïde à chacun des sommets du polygone.</p>
						<figure>
							<a href="illustrations/tous/10_01_centroides_principe.png" >
								<img src="illustrations/tous/10_01_centroides_principe.png" alt="Communes et leur centroïde" width="60%">
							</a>
							<figcaption>Exemple de polygones (en gris) et de leurs centroïdes (en rouge).</figcaption>
						</figure>
						
						<div class="manip">
						    <p> Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_10_Representation.zip">COMMUNE.shp</a></em> située dans le dossier <b>TutoQGIS_10_representation/donnees</b>.</p>
							<p>Pour trouver l'outil voulu, tapez <b>centro</b> dans la barre de recherche de la boîte à outils (centro et non centroïde pour que la recherche fonctionne également avec les noms d'outils en anglais).</p>
							<figure>
								<a href="illustrations/tous/10_01_centroides_menu.png" >
									<img src="illustrations/tous/10_01_centroides_menu.png" alt="Boîte à outil, centro dans la barre de recherche" width="90%">
								</a>
							</figure>
							<p>On voit notamment 2 outils dans la rubrique Géométrie vectorielle : <b>Centroïdes</b> et <b>Point dans la surface</b>.</p>
					   </div>
					   
					   <p><b>Les centroïdes peuvent se situer en-dehors des polygones</b>, comme par exemple dans le cas de la commune de Remoiville dans la Meuse&nbsp;:</p>
					   <figure>
							<a href="illustrations/tous/10_01_centroides_dehors.png" >
								<img src="illustrations/tous/10_01_centroides_dehors.png" alt="Exemple d'un polygone biscornu et de son centroïde qui tombe en-dehors" width="60%">
							</a>
						</figure>
						<p>Dans notre utilisation, cela nous est égal que le centroïde soit au centre exact du polygone&nbsp;; par contre, <b>il sera plus lisible qu'il tombe toujours à l'intérieur du polygone</b>. Il existe donc généralement dans les logiciels SIG une variante de l'outil de centroïdes, qui crée des centroïdes parfois imparfaits mais toujours dans les polygones&nbsp;!</p>
						<p>C'est la raison pour laquelle nous allons utiliser ici l'outil <b>Point dans la surface</b> plutôt que l'outil <b>Centroïdes</b>.</p>
					   
					   <div class="manip">
					       <p>Dans la boîte à outils, double-cliquez sur <b>Point dans la surface</b> (rubrique Géométrie vectorielle) :</p>
							<figure>
								<a href="illustrations/tous/10_01_centroides_fenetre.png" >
									<img src="illustrations/tous/10_01_centroides_fenetre.png" alt="Fenêtre de l'outil centroïdes" width="100%">
								</a>
							</figure>
							<ul>
								<li class="espace">Couche source : choisir la couche <em class="data">COMMUNE</em></li>
								<li class="espace">Point cliquez sur le bouton à droite <b>...</b>, allez à l'emplacement où vous voulez créer la couche de centroïdes et donnez-lui un nom : <em class="data">communes_centroides</em> </li>
							</ul>
							<p><b>Exécuter</b>... La couche de centroïdes est ajoutée à QGIS : un point a été créé par commune.</p>
							<figure>
								<a href="illustrations/tous/10_01_centroides_visu.png" >
									<img src="illustrations/tous/10_01_centroides_visu.png" alt="Visualisation des centroïdes sur la carte" width="200">
								</a>
							</figure>
						</div>

					<h4><a class="titre" id="X11b">Faire varier la surface de points en fonction d'un champ</a></h4>
					
						<p>Il est ensuite possible de faire varier la surface des centroïdes des communes en fonction d'un champ, ou d'une expression :</p>

						<div class="manip">
							<p>Couche <em class="data">communes_centroides</em> : <b>Propriétés &#8594; Symbologie &#8594; bouton à droite de Taille &#8594; Assistant...</b> :</p>
							<figure>
								<a href="illustrations/tous/10_01_assistant_taille_acces.png" >
									<img src="illustrations/tous/10_01_assistant_taille_acces.png" alt="Accès à l'Assistant Taille dans la rubrique style des propriétés de la couche" width="100%">
								</a>
							</figure>
                            <figure>
								<a href="illustrations/tous/10_01_assistant_fenetre.png" >
									<img src="illustrations/tous/10_01_assistant_fenetre.png" alt="Fenêtre de l'Assistant Taille" width="90%">
								</a>
							</figure>
						</div>
						
        				<p>Le principe est simple : cet outil lit les valeurs minimum et maximum pour un champ de la table attributaire, et leur fait correspondre une surface minimum et maximum. Les surfaces correspondant aux valeurs intermédiaires sont interpolées.</p>		
						
						<div class="manip">
						    <p><b>Partie Saisie</b> : cette partie concerne les valeurs de la variable utilisée.</p>
						    <ul>
						      <li>Source : il s'agit du champ dont les valeurs seront utilisées, ici <b>POPULATION</b></li>
						      <li>Valeurs depuis... à ... : cliquez sur le bouton Actualiser à droite pour lire automatiquement les valeurs minimum et maximum de population, ici 0 et 2190327</li>
						    </ul>
						    
							<p><b>Partie Sortie</b> : cette partie concerne la manière dont les valeurs seront représentées.</p>
							<ul>
							 <li>Taille depuis... à ... : choisissez ici les surfaces correspondant aux valeurs minimale et maximale. Vous pouvez tester différentes valeurs, le résultat dépendra de l'échelle à laquelle la carte sera lue (France entière, département...)</li>
							 <li>Méthode de calcul : choisissez <b>Surface</b> pour faire varier la surface et non le diamètre des cercles</li>
							</ul>
						</div>

                    <h4><a class="titre" id="X11c">Surface, rayon, Flannery... Pour en savoir plus sur les différentes méthodes</a></h4>

                        <p>Pourquoi faire varier la surface des cercles et non leur rayon&nbsp;? Tout simplement parce qu'ainsi les variations de forme vues par l'&#156;il seront proportionnelles aux variations de la variable représentée. En faisant varier le rayon, l'&#156;il verra un écart plus grand entre une valeur moyenne et une valeur élevée qu'entre une valeur faible et une valeur moyenne, même si la différence est la même.</p>
                        <p>La méthode de <a class="ext" target="_blank" href="http://wiki.gis.com/wiki/index.php/Proportional_symbol_map#Apparent_Magnitude_.28Flannery.29_Scaling">Flannery</a> est une technique utilisée pour compenser le fait que, même si l'oeil lit mieux les variations de surface que de taille, il ne les interprète cependant pas toujours exactement. Même si cette méthode est intéressante, étant donné que la méthode la plus utilisée en cartographie est de faire varier la surface, il n'est pas forcément recommandé de l'utiliser, à moins de bien le préciser sur votre carte.</p>
                        <p>La méthode exponentielle permet de surreprésenter les valeurs extrêmes (en ajustant l'exposant) et peut être utile à des fins d'exploration.</p>
                        <figure>
							<a href="illustrations/tous/10_01_methode_flannery.png" >
								<img src="illustrations/tous/10_01_methode_flannery.png" alt="Légende cercles proportionnels avec la méthode Flannery (valeurs 1000, 100000, 1000000 et 2190327" width="23%">
							</a>
							<a href="illustrations/tous/10_01_methode_surface.png" >
								<img src="illustrations/tous/10_01_methode_surface.png" alt="Légende cercles proportionnels avec la méthode surface (valeurs 1000, 100000, 1000000 et 2190327" width="23%">
							</a>
							<a href="illustrations/tous/10_01_methode_rayon.png" >
								<img src="illustrations/tous/10_01_methode_rayon.png" alt="Légende cercles proportionnels avec la méthode rayon (valeurs 1000, 100000, 1000000 et 2190327" width="23%">
							</a>
							<a href="illustrations/tous/10_01_methode_exponentiel.png" >
								<img src="illustrations/tous/10_01_methode_exponentiel.png" alt="Légende cercles proportionnels avec la méthode exponentiel (valeurs 1000, 100000, 1000000 et 2190327" width="23%">
							</a>
						</figure>
						<p>Si vous ne devez retenir qu'une chose : <b>faites varier la surface de vos cercles, pas leur rayon&nbsp;!</b> Cela permettra une lecture plus juste du phénomène que vous représentez.</p>
						
					<h4><a class="titre" id="X11d">Les plus petits devant&nbsp;! Modifier l'ordre d'affichage des symboles</a></h4>
						
						<p>Comme vous l'avez peut-être remarqué, QGIS affiche les cercles dans l'ordre de la table ; il peut donc arriver que de petits cercles soient masqués par de plus gros cercles.</p>
						<p>Nous allons voir ici comment afficher les cercles par ordre de population, les plus faibles populations par-dessus.</p>
						<figure>
							<a href="illustrations/tous/10_01_ordre_avant.png" >
								<img src="illustrations/tous/10_01_ordre_avant.png" alt="Cercles dessinés dans l'ordre de la table" width="30%">
							</a>
                            <a href="illustrations/tous/10_01_ordre_apres.png" >
								<img src="illustrations/tous/10_01_ordre_apres.png" alt="Cercles dessinés du plus peuplé au moins peuplé" width="30%">
							</a>
							<figcaption>A gauche, cercles dessinés dans l'ordre de la table&nbsp;; à droite, cercles dessinés du plus grand au plus petit.</figcaption>
						</figure>
							
						<div class="manip">
							<p>Dans les propriétés de la couche <em class="data">communes_centroides</em>, <b>Symbologie</b>, tout en bas de la fenêtre, cliquez sur <b>Rendu de couche</b>&nbsp;:</p>
							<figure>
								<a href="illustrations/tous/10_01_ordre_entites.png" >
									<img src="illustrations/tous/10_01_ordre_entites.png" alt="Activer l'ordre de rendu des entités" width="90%">
								</a>
							</figure>
							<p>Cochez la case <b>Contrôle de l'ordre de rendu des entités</b> et cliquez sur le bouton tout à droite&nbsp;:</p>
							<figure>
								<a href="illustrations/tous/10_01_ordre_entites_2.png" >
									<img src="illustrations/tous/10_01_ordre_entites_2.png" alt="Fenêtre de définition de l'ordre de rendu des entités" width="95%">
								</a>
							</figure>
							<p>Choisissez le champ <b>POPULATION</b> et l'ordre <b>Descendant</b> : ainsi, les cercles seront dessinés du plus peuplé au moins peuplé.</p>
						</div>
		  	           <figure>
							<a href="illustrations/tous/10_01_prop_visu.png" >
								<img src="illustrations/tous/10_01_prop_visu.png" alt="Une partie de la carte en cercles proportionnels" width="40%">
							</a>
					   </figure>
						
				<h3><a class="titre" id="X12">Représenter des variables relatives à des surfaces : cartes choroplèthes</a></h3>
					
					<p>Une carte choroplèthe est une carte en aplats de couleurs. Les régions sont colorées selon une mesure statistique telle que la densité de population ou le revenu par habitant. Ce type de carte <a class="ext" target="_blank" href="https://neocarto.hypotheses.org/5717">ne peut donc être utilisé pour représenter des quantités ou des effectifs</a>. Les variables continues doivent être <a class="ext" target="_blank" href="http://www.hypergeo.eu/spip.php?article374">discrétisées</a> pour produire des classes.</p>
					<figure>
						<a href="illustrations/tous/10_01_carte_choroplethe.png" >
							<img src="illustrations/tous/10_01_carte_choroplethe.png" alt="Exemple de carte choroplethe : carte de densité de population par commune, France métropolitaine, discrétisation par quantiles" width="90%">
						</a>
						<figcaption>Exemple de carte choroplethe montrant la densité de population par commune en France métropolitaine, avec une discrétisation par quantiles.</figcaption>
				   </figure>
					
					
					<h4><a class="titre" id="X12a">Créer un champ de densité de population</a></h4>
						<p>La première étape consistera pour nous à créer un champ densité de population, rempli en fonction de la population et de la surface.</p>
						
						<div class="manip">
							<p>Ouvrez la table attributaire de <em class="data">COMMUNE</em>, <a href="05_02_points.php#V21">passez en mode édition</a> et ouvrez la <a href="07_02_calculer.php#VII21">calculatrice de champ</a>.</p>
							<p>Calculez dans un nouveau champ nommé <b>densite</b> de type <b>décimal</b> la densité de population en <b>nombre d'habitants par km²</b>.</p>
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Quelle formule utiliser pour cela ?</label></p>
								<p class="reponse">On peut utiliser <b>$area</b> pour calculer la surface. Les unités de la couche étant des mètres (couche projetée en Lambert 93), il faut diviser $area par 1 000 000 pour obtenir des km<sup>2</sup>.</p>
								<p class="reponse">Au final, la formule est donc : <b>"POPULATION"  / ($area / 1000000)</b></p>
							</div>
							<p>Quittez le mode édition. Vérifiez le contenu du champ densite.</p>
                            <figure>
								<a href="illustrations/tous/10_01_densite_res.png" >
									<img src="illustrations/tous/10_01_densite_res.png" alt="Champ densité dans la table attributaire" width="40%">
								</a>
							    <figcaption>densité des communes classées par code INSEE.</figcaption>
							</figure>
						</div>
						
					<h4><a class="titre" id="X12b">Faire varier la couleur des communes en fonction du champ densité</a></h4>
					
						<p>Maintenant que ce champ est créé et à jour, il est possible de faire varier la couleur des communes en fonction de la densité.</p>
						
						<div class="manip">
							<p>Pour faire varier la couleur des communes en fonction de la densité :</p>
							<p><b>Propriétés de la couche COMMUNE &#8594; rubrique Style</b></p>
							<figure>
								<a href="illustrations/tous/10_01_choroplethe_fenetre.png" >
									<img src="illustrations/tous/10_01_choroplethe_fenetre.png" alt="Choix des paramètres du style pour une carte choroplèthe en 5 classes par la méthode des quantiles" width="600">
								</a>
							</figure>
							<ul>
    							<li class="espace">Sélectionnez le style <b>Gradué</b> pour discrétiser les valeurs</li>
    							<li class="espace">Choisissez la colonne <b>densite</b> créée précédemment</li>
    							<li class="espace">Choisissez éventuellement une palette de couleur</li>
    							<li class="espace">Sélectionnez un <b>mode de discrétisation</b> (quantile, intervalles égaux, Jenks) et un <b>nombre de classes</b></li>
    							<li class="espace">Cliquez sur <b>Classer</b> pour voir apparaître les classes avec les couleurs qui leur sont attribuées</li>
							</ul>
							<p>Appliquez ensuite les changements. Vous pouvez tester différents modes de discrétisation et nombres de classes.</p>
							<p>Pour voir l'effectif de chaque classe, clic droit sur le nom de la couche &#8594; <b>Montrer le décompte des entités</b>.</p>
							<p>Pour un meilleur rendu, vous pouvez supprimer les bordures des communes en cliquant sur <b>Modification...</b> puis sur <b>Remplissage simple &#8594; Style de la bordure &#8594; Pas de ligne</b>.</p>
							<p class="note">Toutefois, même ainsi, les limites restent un peu visibles. Pour ne vraiment plus les voir, il faut rendre visibles ces limites avec une épaisseur fine et leur donner la même couleur que la couleur de remplissage.</p>
						</div>
						<figure>
							<a href="illustrations/tous/10_01_choroplethe_visu.png" >
								<img src="illustrations/tous/10_01_choroplethe_visu.png" alt="Exemple de carte choroplethe : 5 classes, méthode des quantiles, dégradé de bleu" width="400">
							</a>
						</figure>

						
				<h3><a class="titre" id="X13">Représenter des quantités ou des effectifs : cartes en semis de points</a></h3>
					
					<p>Une carte en semis de points permet, à partir d'un maillage surfacique, de représenter des quantités ou effectifs par des points placés aléatoirement au sein de chaque polygone. Le nombre de ces points est proportionnel à la quantité ou l'effectif lié au polygone.</p>
					<figure>
					   <iframe src="https://demographics.virginia.edu/DotMap/" width="90%" height="400" style="border:1px solid darkgrey;"></iframe>
					   <figcaption>Carte en semis de points des Etats-Unis&nbsp;: 1 point représente un personne, sa couleur est fonction de l'origine de cette personne. Cette carte met en lumière la ségrégation qui a lieu notamment dans certains quartiers des grandes villes.</figcaption>
				    </figure>
					
					<p>Ici, nous allons créer ces points aléatoires en fonction du champ POPULATION. On pourrait créer un point par personne, mais le temps de création de la couche de points serait très long, et le résultat serait peu lisible. <b>Nous allons donc créer un point pour 100 personnes.</b></p>
					<p>Il faudra donc diviser la population par 100, et arrondir le résultat à l'entier le plus proche, puisqu'on ne peut créer 1,2 points.</p>
					
					<div class="manip">
						<p>Pour créer les points aléatoires :
							<a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; Création de vecteurs &#8594; Points aléatoires à l'intérieur des polygones
								<span>
									<img src="illustrations/tous/10_01_pts_aleatoires_menu.png" alt="Emplacement de l'outil de points aléatoires à l'intérieur des polygones dans la boîte à outils" width="80%">
								</span>
							</a>
						</p>
						<figure>
							<a href="illustrations/tous/10_01_pts_aleatoires_fenetre.png" >
								<img src="illustrations/tous/10_01_pts_aleatoires_fenetre.png" alt="Fenêtre de création des points aléatoires" width="80%">
							</a>
						</figure>
						<ul>
							<li class="espace">Couche source : <b>COMMUNE</b></li>
							<li class="espace">Stratégie d'échantillonnage : <b>Nombre de points</b>, pour créer un nombre de points directement proportionnel à la population</li>
							<li class="espace">Expression : cliquez sur le bouton à droite, et tapez l'expression suivante : <b>  round("POPULATION"/100)</b>, pour diviser la population par 100 et arrondir le résultat pour obtenir un nombre entier</li>
							<li class="espace">Laissez les autres paramètres par défaut, pour créer une couche temporaire</li>
							<li class="espace"><b>Exécuter</b>, patientez, l'opération est un peu longue... et fermez la fenêtre une fois terminé.</li>
						</ul>
						<p>Ajustez le style de la couche, par exemple à l'échelle du pays :</p>
						<figure>
							<a href="illustrations/tous/10_01_style_pts_aleatoires.png" >
								<img src="illustrations/tous/10_01_style_pts_aleatoires.png" alt="paramètres de représentation de la couche de points" width="90%">
							</a>
						</figure>
					</div>
						<figure>
							<a href="illustrations/tous/10_01_pts_aleatoires_visu.png" >
								<img src="illustrations/tous/10_01_pts_aleatoires_visu.png" alt="Exemple de carte en semis de points" width="400">
							</a>
						</figure>
						
					
					<p>Nous avons vu ici trois manières de représenter une même donnée : la population des communes. Il en existe beaucoup d'autres&nbsp;!</p>
					<p>Dans le chapitre suivant, nous aborderons la <b>mise en page de cartes</b> afin par exemple de pouvoir les intégrer dans un article : ajout d'un titre, d'une légende... et export au format image ou vectoriel. L'export au format vectoriel vous permettra de retravailler la carte dans un logiciel de dessin vectoriel.</p>

				<br>
				<a class="prec" href="10_00_carto.php">chapitre précédent</a>
				<a class="suiv" href="10_02_mise_en_page.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_10.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
