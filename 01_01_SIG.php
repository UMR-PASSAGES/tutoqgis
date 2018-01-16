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
			<h2>I.1  Qu'est-ce qu'un SIG ? (un peu de théorie...)</h2>
				<ul class="listetitres">
					<li><a href="#I11">Définitions</a>
						<ul class= "listesoustitres">
							<li><a href="#I11a" >Qu'est-ce que la géomatique ?</a></li>
							<li><a href="#I11b" >Qu'est-ce qu'un Système d'Information Géographique ?</a></li>
						</ul>
					</li>
					<li><a href="#I12">Les données des SIG</a>
						<ul class= "listesoustitres">
							<li><a href="#I12a" >Une organisation par couches</a></li>
							<li><a href="#I12b" >Deux grands types de données : vecteur et raster</a></li>
							<li><a href="#I12c" >Les données vecteur : à chaque géométrie ses attributs (et vice-versa)</a></li>
							<li><a href="#I12d" >Des données sur les données : les métadonnées</a></li>
							<li><a href="#I12e" >A quoi sert un SIG ?</a></li>
						</ul>
					</li>
<!-- 					<li><a href="#I13">Quelques limites des SIG</a></li> -->
				</ul>
				
				
				<h3><a class="titre" id="I11">Définitions</a></h3>
				
					<h4><a class="titre" id="I11a">Qu'est-ce que la géomatique ?</a></h4>
						<p>La géomatique est l'ensemble des techniques de traitement informatique des données géographiques (Journal Officiel, 1994). Elle regroupe donc les outils et méthodes permettant l'acquisition, le stockage, le traitement et la diffusion de données à référence spatiale.</p>
					
					
					<h4><a class="titre" id="I11b">Qu'est-ce qu'un Système d'Information Géographique ?</a></h4>
						<p>C'est un système permettant de gérer des informations localisées géographiquement. Ce système est composé de :</p>
							<ul>
								<li>données</li>
								<li>logiciels</li>
								<li>matériel informatique</li>
								<li>savoir-faire</li>
								<li>utilisateurs</li>
							</ul>
						<p>Par abus de langage, un SIG signifie souvent aujourd'hui le logiciel utilisé dans un SIG.</p>
						
						
				<h3><a class="titre" id="I12">Les données des SIG</a></h3>
				
					<h4><a class="titre" id="I12a">Une organisation par couches</a></h4>
						<p>Les données sont organisées sous forme de couches superposables.</p>
						<figure>
							<a href="illustrations/tous/1_1_couches.svg" >
								<img src="illustrations/tous/1_1_couches.svg" alt="Organisation sous forme de couches" width="400">
							</a>
							<figcaption>Source : pôle ARD, adess (domaine public)</figcaption>
						</figure>
						<div class="manip">
						<p><img class="icone" src="illustrations/tous/1_1_ouvrir_projet_icone.png" alt="icône ouvrir un projet" >Lancez le logiciel QGIS. Ouvrez un projet :
							<br>
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Ouvrir
								<span>
									<img src="illustrations/tous/1_1_ouvrir_projet.png" alt="Menu Projet, Ouvrir" height="500">
								</span>
							</a>
						</p>				
						<p>Sélectionnez le projet <em class="data">senegal.qgs</em> situé dans <b>TutoQIS_01_PriseEnMain/projets</b>, cliquez sur <b>Ouvrir</b>.</p>
						<p>Trois couches de données sont affichées dans QGIS, correspondant aux villes, rivières et régions du Sénégal.</p>
						</div>
						
						
					<h4><a class="titre" id="I12b">Deux grands types de données : vecteur et raster</a></h4>
						<p>On distingue généralement deux types de données : <b>vecteur et raster</b>.</p>
						<figure>
							<a href="illustrations/tous/1_1_vecteur.png" >
							<img src="illustrations/tous/1_1_vecteur.png" alt="Exemple de données vecteur" width="400">
							</a>
							<figcaption >Exemple de données vecteur, l'exemple du Sénégal : régions sous forme de polygones, rivières sous forme de lignes et villes sous forme de points (source : pôle ARD, adess, domaine public).</figcaption>
						</figure>
						<p>Les <b>données vecteurs</b> se définissent uniquement par des coordonnées. On trouvera des données vecteurs de type <b>point</b>, <b>ligne</b> et <b>polygone</b>. Un point sera défini par un couple de coordonnées XY, une ligne ou un polygone par les coordonnées de leurs sommets. Une couche vecteur sera soit de type point, soit de type ligne, soit de type polygone, mais ne pourra contenir de données de deux types différents (sauf dans le cas particuliers de certains formats qui ne seront pas abordés dans ce tutoriel).</p>
						<p>On pourra choisir par exemple de représenter des cours d'eau sous forme de ligne, des villes sous forme de points...</p>
						<p>Les données vecteur sont généralement moins volumineuses que les données raster. Quelques exemples de formats vecteur : SVG, AI, SHP...</p>
		
						<p>Les <b>données raster</b>, ou images, sont constituées de pixels. En zoomant sur un raster, on finit par distinguer les pixels. Chaque pixel possède une valeur correspondant par exemple à sa couleur, ou à son altitude. Un raster est caractérisé par la taille d'un pixel, ou résolution. Exemples de données raster : carte IGN scannée, photographie aérienne, image satellite...</p>
						<figure>
							<a href="illustrations/tous/1_1_raster.png" >
								<img src="illustrations/tous/1_1_raster.png" alt="Données raster" height="300">
							</a>
							<figcaption>Exemple de données raster (source : IGN).</figcaption>
						</figure>
						<p>Quelques exemples de formats raster : JPG, TIFF, PNG...</p>
						
						
					<h4><a class="titre" id="I12c">Les données vecteur : à chaque géométrie ses attributs (et vice-versa)</a></h4>
						<p>On distingue deux composantes dans les données utilisées dans un SIG : spatiale et attributaire. La <b>composante spatiale</b> est constituée de la localisation et la géométrie d'un objet, donc de ses coordonnées. La <b>composante attributaire</b> est constituée des données qui y sont associées. Par exemple, la composante spatiale d'un département sera le polygone représentant ce département, et sa composante attributaire sera son nom, son code, sa population...</p>
						<figure>					
							<a href="illustrations/tous/1_1_spatial_attrib.png" >					
								<img src="illustrations/tous/1_1_spatial_attrib.png" alt="Composantes spatiales et attributaires" height="300">
							</a>
							<figcaption>Données spatiales et attributaires d'une couche SIG (source : données Geofla IGN) </figcaption>
						</figure>
						<p>Le lien entre composante spatiale et attributaire constitue une différence fondamentale avec les logiciels de dessin (DAO) type AutoCAD.</p>
						<div class="manip">
							<p><img class="icone" src="illustrations/tous/1_1_ouvrir_projet_icone.png" alt="icône ouvrir un projet" >Ouvrez le projet 
								<em class="data">depts_france.qgs</em> qui se trouve situé dans le dossier <b>TutoQIS_01_PriseEnMain/projets</b>.
							</p>
							<p><img class="icone" src="illustrations/tous/1_1_ouvrir_table_icone.png" alt="icône ouvrir la table d'attributs" >Ouvrez la table attributaire de la couche de départements :
								<br>
								<a class="thumbnail_bottom" href="#thumb">Clic droit sur le nom de la couche &#8594; Ouvrir la table d'attributs
									<span>
										<img src="illustrations/tous/1_1_ouvrir_table.png" alt="Clic droit sur la couche, ouvrir la table d'attributs" height="320" >
									</span>
								</a>								
							</p>
							<p>Sélectionner un département dans la table attributaire, en cliquant sur le numéro de la ligne. Le département correspondant apparaît dans une couleur différente (jaune par défaut) dans la carte. </p>
							<p><img class="icone" src="illustrations/tous/1_1_zoom_selection_icone.png" alt="icône zoom sur la sélection" > Vous pouvez ensuite cliquer sur l'outil <b>zoom sur la sélection</b> pour zoomer sur ce département.</p>
							<p><img class="icone" src="illustrations/tous/1_1_selection_icone.png" alt="icône outil de sélection" >Vous pouvez maintenant faire l'inverse : sélectionner un département sur la carte, au moyen de l'outil de sélection. La ligne correspondante passe alors en surbrillance dans la table attributaire.</p>
							<p>Vous pouvez choisir <b>Ne montrer que les entités sélectionnées</b> dans la liste déroulante en bas à gauche de la table, pour ne voir que les lignes correspondant aux départements sélectionnés.</p>
							<figure>
								<a href="illustrations/tous/1_1_table_liste_deroulante.png" >
									<img src="illustrations/tous/1_1_table_liste_deroulante.png" alt="Table attributaire : ne montrer que les entités sélectionnées" width="600">
								</a>
							</figure>
							<p class="note">Pour que la fenêtre de la table attributaire soit "ancrée" dans QGIS : menu <b>Préférences &#8594; Options &#8594; Sources de données</b> : cocher la case <b>Ouvrir la table d'attributs dans une fenêtre intégrée</b>. Contrairement à ce qui est écrit, cette modification est prise en compte directement sans besoin de redémarrer QGIS.</p>
						</div>
						
						
					<h4><a class="titre" id="I12d">Des données sur les données : les métadonnées</a></h4>
						<p>Afin de savoir quelles sont les utilisations que l'on peut faire d'une donnée, il est indispensable de posséder des informations sur la manière dont a été fabriquée cette donnée, sa date, ses limites éventuelles d'utilisation... <b>Ces « données sur la donnée » constituent ce qu'on appelle des métadonnées</b>. Elles peuvent se présenter sous diverses formes : un simple fichier texte, une fiche PDF...</p>
						<p class="manip">Vous pouvez voir ici les métadonnées de la couche Corine Land Cover : <a class="ext" target="_blank" href="http://www.geocatalogue.fr/Detail.do?id=7665">www.geocatalogue.fr/Detail.do?id=7665</a></p>
						<p>Il existe aujourd'hui des normes régissant la manière dont sont construites ces métadonnées : nombres de rubriques présentes, choix des rubriques... Ceci permet de construire des catalogues de métadonnées, et facilite <i>in fine</i> l'échange de données entre organismes.</p>
						<p class="manip">La métadonnée ci-dessus est tirée du catalogue de métadonnées de l'IGN, le géocatalogue : <a class="ext" target="_blank" href="http://www.geocatalogue.fr/" >www.geocatalogue.fr</a></p>
						
						
					<h4><a class="titre" id="I12e">A quoi sert un SIG ?</a></h4>
						<p>Un SIG permet de saisir, représenter, interroger, et mettre à jour l’information géographique. Il peut notamment répondre aux questions suivantes : </p>
							<ul>
								<li>où : localisation, étendue</li>
								<li>quoi : quelles informations</li>
								<li>comment : analyse spatiale</li>
								<li>quand : analyse temporelle</li>
								<li>et si... : modélisation</li>
							</ul>
						<p>Les SIG sont utilisés aujourd'hui dans des domaines très variés : géographie, géologie, écologie, urbanisme, archéologie, économie...</p>
						<p>On peut par exemple chercher à répondre à la question : "la taille des parcelles de vignes est-elle corrélée avec la pente et l'altitude de la parcelle, sur une zone donnée ?"</p>
						<p>Les données nécessaires seront une couche contenant les parcelles de vignes, et un <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Mod%C3%A8le_num%C3%A9rique_de_terrain">Modèle Numérique de Terrain (MNT)</a> de la zone d'étude. La résolution du MNT devra être suffisante en comparaison de la taille moyenne des parcelles.</p>
						<p>Le SIG va permettre de croiser les parcelles et le MNT pour aboutir à une couche de parcelles où seront renseignées pour chaque parcelle par exemple sa taille, sa pente moyenne, son altitude moyenne. Ces données pourront être ensuite visualisées dans le SIG, et/ou être le point de départ d'analyses statistiques dans un autre logiciel.</p>
						
						
<!-- 				<h3><a class="titre" id="I13">Quelques limites des SIG</a></h3>
				
					<p>Les limites d'un SIG sont en premier lieu celles de ses données. Leur pertinence, richesse, mise à jour, droits d'auteur... ne permettent pas toujours en effet de réaliser le travail voulu, sans parler de leur coût. Certaines données n'existent tout simplement pas, ce qui peut nécessiter de longues campagnes de terrain.</p>
					<p>La puissance des ordinateurs utilisés peut aussi entrer en jeu. Certains calculs pourront en effet s'avérer impossibles si elle n'est pas suffisante. Enfin, la compétence des utilisateurs est évidemment à prendre en compte.</p>
 -->
				<br>
				<a class="suiv" href="01_02_info_geo.php">chapitre suivant</a>
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
