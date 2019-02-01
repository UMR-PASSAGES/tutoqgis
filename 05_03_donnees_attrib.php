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
			<h2>V.3  Saisie des données attributaires : en savoir plus</h2>
				<ul class="listetitres">
					<li><a href="#V31">Saisir les données : à la création de l'entité ou dans la table</a></li>
					<li><a href="#V32">Pour une saisie plus facile : les outils d'édition</a></li>
				</ul>
				<br>
				
			<p>Cette partie est tout à fait optionnelle pour suivre la suite du chapitre. Elle pourra néanmoins vous faire gagner du temps si vous vous apprêtez à saisir des données sous QGIS...</p>

			
			<h3><a class="titre" id="V31">Saisir les données : à la création de l'entité ou dans la table</a></h3>
			
				<p>Vous avez remarqué que la saisie des données attributaires se fait dans une fenêtre qui apparaît directement après avoir créé une entité.</p>
				<p>Il est possible de modifier ce comportement :</p>
				<div class="manip">
					<p>Rendez-vous dans le menu
						<a class="thumbnail_bottom" href="#thumb">Menu Préférences &#8594; Options
							<span>
								<img src="illustrations/tous/5_3_options_menu.png" alt="Menu Préférences, Options" height="150" >
							</span>
						</a>	 
					:</p>
					<figure>
						<a href="illustrations/tous/5_3_options_fenetre.png" >
							<img src="illustrations/tous/5_3_options_fenetre.png" alt="Fenêtre Options, rubrique numérisation" width="600">
						</a>
					</figure>
					<p>Dans la rubrique <b>Numérisation</b>, cochez la case <b>Supprimer la fenêtre de saisie des attributs lors de la création de chaque entité</b>. Cliquez sur <b>OK</b> pour valider et fermer la fenêtre.</p>
					<p>Créez un nouveau point dans la couche de bâtiments : aucune fenêtre ne s'affiche. Si vous ouvrez la table attributaire, vous pouvez voir que le point créé a un type NULL (valeur par défaut).</p>
				</div>
				<p>Il est ensuite possible de rentrer les données attributaires directement dans la table. La <a href="07_03_calculer.php">calculatrice de champ</a> offre la possibilité de remplir plusieurs cases avec une requête.</p>

			<h3><a class="titre" id="V32">Pour une saisie plus facile : les outils d'édition</a></h3>
			
				<p>Il est possible de définir des règles pour la saisie d'attributs : vous pouvez par exemple saisir vos données en choisissant une valeur dans une liste déroulante.</p>
				
				<div class="manip">
					<p>Ouvrez les propriétés de la couche <em class="data">batiments_oahu</em> créée en <a href="05_01_creation_couche.php">V.1</a> , rubrique <b>Champs</b>.</p>
					<figure>
						<a href="illustrations/tous/5_3_champs_fenetre.png" >
							<img src="illustrations/tous/5_3_champs_fenetre.png" alt="fenêtre des propriétés de la couche, rubrique champs" width="600">
						</a>
					</figure>
					<p>Cliquez sur <b>Edition de texte</b>.</p>
				</div>
				
				<p>Cette fenêtre propose différents outils pour faciliter la saisie. Le mode <b>Edition de texte</b> est le mode par défaut que vous avez utilisé jusqu'ici.</p>
				<p>Par exemple, il est possible de faciliter la saisie de date à l'aide d'un calendrier, de voir un champ sous forme de case à cocher, de créer des listes déroulantes...</p>
				<p>Sans passer en revue tous les outils possibles, nous nous bornerons à créer une <b>liste déroulante</b> avec les deux valeurs &#171; ecole &#187; et &#171; poste &#187; .</p>
				
				<div class="manip">
					<figure>
						<a href="illustrations/tous/5_3_liste_valeurs.png">
							<img src="illustrations/tous/5_3_liste_valeurs.png" alt="fenêtre de choix de l'outil d'édition" width="600">
						</a>
					</figure>
					<p>Cliquez sur <b>Liste de valeurs</b> dans la colonne de gauche.</p>
					<p>Ajoutez les valeurs <b>ecole</b> et <b>poste</b> dans la colonne <b>Valeur</b> du tableau (vous pouvez laisser la colonne Description vide).</p>
					<p>Cliquez sur <b>OK</b>.</p>
					<p>Passez en mode édition si ce n'est pas déjà fait. Ouvrez la table attributaire.</p>
					<p>Double-cliquez dans une case : une liste déroulante avec les deux valeurs poste et école apparaît.</p>
					<figure>
						<a href="illustrations/tous/5_3_liste.png">
							<img src="illustrations/tous/5_3_liste.png" alt="la liste qui apparaît quand on clique sur une case" width="160">
						</a>
					</figure>
				</div>
				
				<p>Notez que cette liste déroulante sera également utilisable dans la fenêtre de saisie des attributs, si la case <b>Supprimer les fenêtres d'avertissement lors de la création de chaque entité</b> des options de numérisation est décochée (cf. plus haut).</p>
				<figure>
				    <a href="illustrations/tous/5_3_liste_fenetre.png" >
				        <img src="illustrations/tous/5_3_liste_fenetre.png" alt="la fenêtre de saisie des attributs, avec la liste déroulante" width="370">
				    </a>
				</figure>
				<p>Pour en savoir plus, les différents outils d'édition sont décrits dans le <a class="ext" target="_blank" href="http://docs.qgis.org/2.8/fr/docs/user_manual/working_with_vector/vector_properties.html#fields-menu" >manuel QGIS</a>.</p>
				
				<br>
				<a class="prec" href="05_02_points.php">chapitre précédent</a>
				<a class="suiv" href="05_04_lignes.php">chapitre suivant</a>
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
