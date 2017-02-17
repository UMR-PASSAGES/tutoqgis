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
			<h2>V.6  Quelques notions de topologie</h2>
				<ul class="listetitres">
					<li><a href="#V61">Qu'est-ce que la topologie ?</a>
						<ul class="listesoustitres">
							<li><a href="#V61a">Définition et exemples</a></li>
							<li><a href="#V61b">Pourquoi faire attention la topologie ?</a></li>
						</ul>
					</li>
					<li><a href="#V62">Pour aller plus loin : comment vérifier la topologie d'une couche ?</a>
						<ul class="listesoustitres">
							<li><a href="#V62a">Vérification simple</a></li>
							<li><a href="#V62b">Utilisation du vérificateur de topologie</a></li>
						</ul>
					</li>
					<li><a href="#V63">Corriger les erreurs de topologie : quelques pistes</a>
				</ul>
				<br>
				
			<p>Au cours de la dernière partie notamment, nous avons vu comment éviter que deux polygones soient "presque" jointifs, au moyen de propriétés telles que l'accrochage, ou par l'utilisation d'outils de découpage par exemple. Nous avons également vu comment utiliser le mode d'édition topologique de QGIS.</p>
			<p>Nous allons ici en apprendre un peu plus sur ce qu'est la topologie, et comment vérifier la topologie d'une couche.</p>

			
			<h3><a class="titre" id="V61">Qu'est-ce que la topologie ?</a></h3>
			
				<h4><a class="titre" id="V61a">Définition et exemples</a></h4>
				
					<p>La <a class="ext" target="_blank" href="http://www.cnrtl.fr/definition/topologie">topologie</a> est la &#171; partie de la géométrie qui considère uniquement les relations de position &#187; (Aur.-Weil 1981).</p>
					<p>En géomatique, la topologie est utilisée pour décrire les relations entre les géométries des entités. Des règles de topologie peuvent être définies, et les erreurs de topologie détectées.</p>
					<p>Par exemple, on peut décider qu'il ne doit y avoir aucune superposition de polygones dans une couche :</p>
					<figure>
						<a href="illustrations/tous/5_6_overlap.png" >
							<img src="illustrations/tous/5_6_overlap.png" alt="deux polygones se superposant en partie" height="150">
						</a>
					</figure>
					<p>Ou bien qu'il ne doit pas y avoir de trous entre les polygones :</p>
					<figure>
						<a href="illustrations/tous/5_6_gap.png" >
							<img src="illustrations/tous/5_6_gap.png" alt="deux polygones avec un trou entre les deux" height="150">
						</a>
					</figure>
					<p>Les règles de topologie peuvent aussi mettre en jeu plusieurs couches. Par exemple, tous les points d'une couche doivent être dans un polygone d'une autre couche :</p>
					<figure>
						<a href="illustrations/tous/5_6_pts_dans_polygones.png" >
							<img src="illustrations/tous/5_6_pts_dans_polygones.png" alt="des points dans des polygones sauf deux" height="200">
						</a>
					</figure>
					<p>Il est bien sûr possible de combiner plusieurs règles. Vous trouverez dans le <a class="ext" target="_blank" href="http://docs.qgis.org/2.0/fr/docs/user_manual/plugins/plugins_topology_checker.html" >manuel de QGIS</a> la description d'un certain nombre de règles de topologie.</p>
					<p>Pour en savoir plus, vous pouvez également consulter cet <a class="ext" target="blank" href="http://www.portailsig.org/content/grass-gis-geometries-topologies-et-consequences-pratiques-vecteurs-rasters-volumes" >article du portail SIG</a>.</p>

				<h4><a class="titre" id="V61b">Pourquoi faire attention à la topologie ?</a></h4>
					
					<p>Ne pas respecter les règles de topologie peut poser des problèmes lors de l'utilisation d'outils d'analyse spatiale, qui donneront alors des résultats inattendus.</p>
					
					
			<h3><a class="titre" id="V62">Pour aller plus loin : comment vérifier la topologie d'une couche ?</a></h3>
			
				<p>Cette partie est pour &#171; aller un peu plus loin &#187; : vous pouvez donc passer directement à la partie suivante si vous le désirez !</p>
			
				<h4><a class="titre" id="V62a">Vérification simple</a></h4>
					
					<div class="manip">
						<p>Pour vérifier rapidement la topologie d'une couche, rendez-vous dans le menu
							<a class="thumbnail_bottom" href="#thumb">Vecteur &#8594; Outils de géométrie &#8594; Vérifier la validité de la géométrie
								<span>
									<img src="illustrations/tous/5_6_verif_menu.png" alt="Menu Vecteur, Outils de géométrie, vérifier la validité de la géométrie" height="400" >
								</span>
							</a>	
						:</p>
						<figure>
							<a href="illustrations/tous/5_6_verif_fenetre.png" >
								<img src="illustrations/tous/5_6_verif_fenetre.png" alt="fenêtre de validation de la géométrie" height="400">
							</a>
						</figure>
						<p>Sélectionnez la couche <em class="data">zones_oahu</em> et cliquez sur <b>OK</b> : les éventuelles erreurs sont listées, un double clic sur une erreur zoome dessus.</p>
					</div>
				
				<h4><a class="titre" id="V62b">Utilisation du vérificateur de topologie</a></h4>
				
					<p>Le vérificateur de topologie est un outil plus perfectionné qui permet de spécifier un certains nombre de règles, et de de voir les erreurs à ces règles.</p>
				
					<div class="manip">
						<p>Pour accéder au vérificateur de topologie : 
							<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Vérificateur de topologie &#8594; Vérificateur de topologie
								<span>
									<img src="illustrations/tous/5_6_veriftopo_menu.png" alt="Menu Vecteur, Vérificateur de topologie, Vérificateur de topologie" height="300" >
								</span>
							</a>	
						:</p>
						<figure>
							<a href="illustrations/tous/5_6_veriftopo_fenetre.png" >
								<img src="illustrations/tous/5_6_veriftopo_fenetre.png" alt="fenêtre (intégrée) du vérificateur de topologie" height="220">
							</a>
						</figure>
						<p>Cliquez sur le bouton <b>Configuration</b> pour ajouter ou supprimer des règles de topologie. Nous allons ajouter une règle pour interdire les superpositions de polygones dans la couche <em class="data">zones_oahu</em>.</p>
						<figure>
							<a href="illustrations/tous/5_6_regle_fenetre.png" >
								<img src="illustrations/tous/5_6_regle_fenetre.png" alt="fenêtre de gestion des règles de topologie" height="250">
							</a>
						</figure>
						<p>Sélectionnez la couche <b>zones_oahu</b> dans la liste déroulante, puis la propriété <b>ne doit pas se superposer</b> et cliquez enfin sur le bouton <b>Ajouter une règle</b>. Cliquez sur <b>OK</b>.</p>
						<p>Pour visualiser les erreurs à cette règle, cliquez sur le bouton <b>Valider tout</b> du vérificateur de topologie.</p>
						<figure>
							<a href="illustrations/tous/5_6_veriftopo_erreurs.png" >
								<img src="illustrations/tous/5_6_veriftopo_erreurs.png" alt="fenêtre du vérificateur de topologie, pas d'erreurs" height="220">
							</a>
						</figure>
						<p>La liste des éventuelles erreurs apparaît ; il est possible de zoomer sur une erreur en double-cliquant sur la ligne correspondante.</p>
					</div>
					
					<h3><a class="titre" id="V63">Corriger les erreurs de topologie : quelques pistes</a></h3>
					
						<p>Pour corriger les erreurs de topologie d'une couche, vous pouvez procéder &#171; à la main &#187; , en corrigeant les erreurs une à une avec les outils d'édition de QGIS. Cliquer sur la ligne correspondant à une erreur dans le vérificateur de topologie zoome sur cette erreur.</p>
						<p>Si vous avez un grand nombre d'erreurs à corriger, vous pouvez aussi utiliser des outils de correction automatique, notamment ceux de grass. Ces outils sont disponibles dans QGIS via la 
						<a class="thumbnail_bottom" href="#thumb">boîte à outils du menu Traitements
							<span>
								<img src="illustrations/tous/5_6_traitements_menu.png" alt="boîte à outils du menu Traitements" height="125" >
							</span>
						</a>. Tapez <b>clean</b> dans le filtre pour accéder à l'outil <b>v.clean</b>.</p>
						<p>En double-cliquant sur cet outil, une aide est accessible dans l'onglet Help, ou bien ici : <a class="ext" target="_blank" href="https://grass.osgeo.org/grass70/manuals/v.clean.html" >https://grass.osgeo.org/grass70/manuals/v.clean.html</a>. Regardez également <a class="ext" target="_blank" href="http://grasswiki.osgeo.org/wiki/Vector_topology_cleaning" >ici</a> pour plus de documentation.</p>

				<br>
				<a class="prec" href="05_05_polygones.php">chapitre précédent</a>
				<a class="suiv" href="06_00_requetes.php">partie VI : requêtes</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_5.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
