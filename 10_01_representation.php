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
				

				<p>Il existe de nombreuses manières de représenter les données, nous en verrons seulement quelques unes ici.</p>
				<p>A partir d'une couche de communes et leur population, nous allons voir différentes manières de visualiser cette population.</p>
				<p class="manip"> Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data">COMMUNE.SHP</em> située dans le dossier <b>TutoQGIS_10_representation/donnees</b>.</p>
				
				<h3><a class="titre" id="X11">Représenter des quantités ou des effectifs : carte en symboles proportionnels</a></h3>
				
					<p>Les cartes en symbole proportionnels permettent la représentation de quantités ou d'effectifs par des symboles, généralement des cercles. La surface des symboles sera proportionnelle à la quantité ou l'effectif.</p>
					
					<h4><a class="titre" id="X11a">Créer une couche de points à partir d'une couche de polygones</a></h4>
					
						<p>Dans QGIS, la visualisation de données sous forme de cercles proportionnels nécessite une couche de points. A partir de la couche de communes, nous allons créer les centroïdes (barycentres) des communes.</p>
						
						<div class="manip">
							<p>
								<a class="thumbnail_bottom" href="#thumb">Menu Vecteurs &#8594; Outils de géométrie &#8594; Centroïdes de polygones
									<span>
										<img src="illustrations/tous/10_01_centroides_menu.png" alt="Menu Vecteurs, Outils de géométrie, Centroïdes de polygones" height="400">
									</span>
								</a>
							</p>
							<figure>
								<a href="illustrations/tous/10_01_centroides_fenetre.png" >
									<img src="illustrations/tous/10_01_centroides_fenetre.png" alt="Fenêtre de l'outil centroïdes" width="350">
								</a>
							</figure>
							<ul>
								<li class="espace"><b>Couche vecteur de polygones en entrée :</b> choisir la couche <em class="data">COMMUNE</em></li>
								<li class="espace"><b>Fichier de points en sortie :</b> cliquez sur <b>Parcourir</b>, allez à l'emplacement où vous voulez créer la couche de centroïdes et donnez-lui un nom : <em class="data">communes_centroides</em> </li>
								<li class="espace">Cliquez sur <b>OK</b></li>
							</ul>
							<p>La couche de centroïdes est ajoutée à QGIS : un point a été créé par commune.</p>
							<figure>
								<a href="illustrations/tous/10_01_centroides_visu.png" >
									<img src="illustrations/tous/10_01_centroides_visu.png" alt="Visualisation des centroïdes sur la carte" width="200">
								</a>
							</figure>
						</div>

					<h4><a class="titre" id="X11b">Faire varier la taille de points en fonction d'un champ</a></h4>
					
						<p>Il est ensuite possible de faire varier la taille des centroïdes des communes en fonction d'un champ, ou d'une expression :</p>

						<div class="manip">
							<p>Ouvrez les <b>propriétés de la couche de communes &#8594; rubrique Style &#8594; bouton à droite de Taille &#8594; Assistant Taille...</b> :</p>
							<figure>
								<a href="illustrations/tous/10_1_assistant_taille_acces.png" >
									<img src="illustrations/tous/10_1_assistant_taille_acces.png" alt="Accès à l'Assistant Taille dans la rubrique style des propriétés de la couche" width="620">
								</a>
							</figure>
							<p>Choisissez le champ : POPULATION et la méthode de calcul : Surface.</p>
                            <figure>
								<a href="illustrations/tous/10_1_assistant_taille_fenetre.png" >
									<img src="illustrations/tous/10_1_assistant_taille_fenetre.png" alt="Fenêtre de l'Assistant Taille" width="530">
								</a>
							</figure>
							<p>Vous pouvez jouer sur les différents paramètre pour obtenir une visualisation correcte de la population à l'échelle d'un département ou d'une région (à l'échelle du pays, cela nécessiterait d'agréger les cercles entre eux pour un meilleur rendu). Vous avez à votre disposition la couche <em class="data">DEPARTEMENT</em>.</p>
							<p>Comme vous l'avez peut-être remarqué, QGIS affiche les cercles dans l'ordre de la table ; il peut donc arriver que de petits cercles soient masqués par de plus gros cercles.</p>
							<p>Pour corriger cela : <b>Propriétés de la couche de centroïdes &#8594; rubrique Style</b>, cochez la case <b>Contrôle de l'ordre de rendu des entités</b> tout en bas de la fenêtre.</p>
							<figure>
								<a href="illustrations/tous/10_01_ordre_entites.png" >
									<img src="illustrations/tous/10_01_ordre_entites.png" alt="Activer l'ordre de rendu des entités" width="530">
								</a>
							</figure>
							<p><img class="icone" src="illustrations/tous/10_01_ordre_entites_icone.png" alt="Bouton Ordre des entités" >Cliquez ensuite sur le bouton à droite de cette case, choisissez le champ <b>POPULATION</b> et l'ordre <b>descendant</b>.</p>
							<figure>
								<a href="illustrations/tous/10_01_ordre_entites_2.png" >
									<img src="illustrations/tous/10_01_ordre_entites_2.png" alt="Fenêtre de définition de l'ordre de rendu des entités" width="530">
								</a>
							</figure>
							<p>Ainsi, les points seront dessinés en commençant par ceux avec les plus importantes populations, qui seront donc recouverts par les points avec des valeurs de population plus faibles.</p>
						</div>
		  	           <figure>
							<a href="illustrations/tous/10_01_prop_visu.png" >
								<img src="illustrations/tous/10_01_prop_visu.png" alt="Une partie de la carte en cercles proportionnels" width="300">
							</a>
						</figure>
						
				<h3><a class="titre" id="X12">Représenter des variables relatives à des surfaces : cartes choroplèthes</a></h3>
					
					<p>Une carte choroplèthe est une carte en aplats de couleurs. Les régions sont colorées selon une mesure statistique telle que la densité de population ou le revenu par habitant. Ce type de carte ne peut donc être utilisé pour représenter des quantités ou des effectifs. Les variables continues doivent être discrétisées pour produire des classes.</p>
					
					<h4><a class="titre" id="X12a">Créer un champ de densité de population</a></h4>
						<p>La première étape consistera pour nous à créer un champ densité de population, rempli en fonction de la population et la surface.</p>
						
						<div class="manip">
							<p>Ouvrez la table attributaire de <em class="data">COMMUNE</em>, passez en mode édition et ouvrez la <a href="07_02_calculer.php#VII21">calculatrice de champ</a>.</p>
							<p>Calculez dans un nouveau champ nommé <b>densite</b> de type <b>décimal</b> la densité de population en <b>nombre d'habitants par km²</b>.</p>
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Sachant que la population est exprimée en milliers d'habitants et la superficie en hectares, quelle formule utiliser pour cela ?</label></p>
								<p class="reponse">Par exemple <b>( "POPULATION"  * 1000 )  /  ( "SUPERFICIE" / 100 )</b>, ou encore <b>( "POPULATION"  * 1000 )  /  ( $area / 1000000 )</b></p>
							</div>
							<p>Quittez le mode édition.</p>
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
							<p>Sélectionnez le style <b>Gradué</b> en fonction de la colonne <b>densite</b>.</p>
							<p>Choisissez un nombre de classes et une méthode de discrétisation.</p>
							<p>Cliquez sur <b>Classer</b> et appliquez les changements.</p>
							<p>Pour un meilleur rendu, vous pouvez supprimer les bordures des communes en cliquant sur <b>Modification...</b> puis sur <b>Remplissage simple &#8594; Style de la bordure &#8594; Pas de ligne</b>.</p>
							<p>Pour voir l'effectif de chaque classe, clic droit sur le nom de la couche &#8594; <b>Montrer le décompte des entités</b>.</p>
							<p>Testez différents modes de discrétisation et nombres de classes.</p>
						</div>
						<figure>
							<a href="illustrations/tous/10_01_choroplethe_visu.png" >
								<img src="illustrations/tous/10_01_choroplethe_visu.png" alt="Exemple de carte choroplethe : 5 classes, méthode des quantiles, dégradé de bleu" width="400">
							</a>
						</figure>

						
				<h3><a class="titre" id="X13">Représenter des quantités ou des effectifs : cartes en semis de points</a></h3>
					
					<p>Une carte en semis de points permet, à partir d'un maillage surfacique, de représenter des quantités ou effectifs par des points placés aléatoirement au sein de chaque polygone. Le nombre de ces points est proportionnel à la quantité ou l'effectif lié au polygone.</p>
					<p>Nous allons créer ces points aléatoires en fonction du champ POPULATION. Ce champ étant décimal avec un chiffre après la virgule, nous allons le multiplier par 10 pour obtenir des nombres entiers (il n'est pas possible de créer 0,7 points dans un polygone...).</p>
					
					<div class="manip">
						<p>Ajoutez un champ nommé <b>POP10</b>, de type <b>entier</b>, égal à 10 fois le champ POPULATION. N'oubliez pas de quitter le mode édition une fois l'opération terminée.
						<p>Pour créer les points aléatoires :</p>
						<p>
							<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Outils de recherche &#8594; Points aléatoires
								<span>
									<img src="illustrations/tous/10_01_pts_aleatoires_menu.png" alt="menu Vecteur, Outils de recherche, Points aléatoires " height="275">
								</span>
							</a>
						</p>
						<figure>
							<a href="illustrations/tous/10_01_pts_aleatoires_fenetre.png" >
								<img src="illustrations/tous/10_01_pts_aleatoires_fenetre.png" alt="Fenêtre de création des points aléatoires" width="400">
							</a>
						</figure>
						<ul>
							<li class="espace">Couche en entrée : <b>COMMUNE</b></li>
							<li class="espace">Taille d'échantillon : utiliser la valeur du champ <b>POP10</b></li>
							<li class="espace">Fichier de sortie : cliquez sur <b>Parcourir</b>, sélectionnez l'emplacement et tapez le nom de la couche qui sera créée : <b>points_aleatoires_communes</b> par exemple</li>
							<li class="espace">Ajouter le résultat au canevas de la carte</li>
							<li class="espace"><b>OK</b>, patientez, l'opération est un peu longue... et fermez la fenêtre une fois terminé.</li>
						</ul>
						<p>Ajustez le style de la couche, par exemple à l'échelle du pays :</p>
						<figure>
							<a href="illustrations/tous/10_01_style_pts_aleatoires.png" >
								<img src="illustrations/tous/10_01_style_pts_aleatoires.png" alt="paramètres de représentation de la couche de points" width="610">
							</a>
						</figure>
					</div>
						<figure>
							<a href="illustrations/tous/10_01_pts_aleatoires_visu.png" >
								<img src="illustrations/tous/10_01_pts_aleatoires_visu.png" alt="Exemple de carte en semis de points" width="400">
							</a>
						</figure>
						
					
					<p>Nous avons vu ici trois manières de représenter une même donnée : la population des communes. Il en existe beaucoup d'autres. Il est difficile de terminer cette partie sans citer au moins trois références pour ceux qui souhaitent en savoir plus sur la sémiologie graphique :</p>
					<ul>
						<li><em>Sémiologie graphique: Les diagrammes - Les réseaux - Les cartes</em> de Jacques Bertin</li>
						<li><em>Manuel de cartographie</em> de Nicolas Lambert et Christine Zanin</li>
						<li><em>Pratiques de la cartographie</em> d'Anne Le Fur</li>
					</ul>
					<p>Dans le chapitre suivant, nous aborderons la mise en page de cartes afin par exemple de pouvoir les intégrer dans un article : ajout d'un titre, d'une légende... et export au format image ou vectoriel. L'export au format vectoriel vous permettra de retravailler la carte dans un logiciel de dessin vectoriel.</p>

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
