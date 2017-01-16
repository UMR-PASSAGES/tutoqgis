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
			<h2>VIII.2  Lier des données en fonction de leur position : jointures spatiales</h2>
				<ul class="listetitres">
					<li><a href="#VIII21">Comment fonctionne une jointure spatiale ?</a></li>
					<li><a href="#VIII22">Deux outils possibles (voire plus...)</a></li>
					<li><a href="#VIII23">Quelques exemples supplémentaires</a>
						<ul class="listesoustitres">
							<li><a href="#VIII23a">Écoles secondaires du Kenya</a></li>
							<li><a href="#VIII23b">Jointure de deux couches de polygones : un comportement étonnant</a></li>
						</ul>
					</li>
				</ul>
				<br>
				

			<h3><a class="titre" id="VIII21">Comment fonctionne une jointure spatiale ?</a></h3>

				<p>Pour faire une jointure, il est possible de se baser sur la <b>position des éléments</b> et non plus sur leurs données attributaires : il s'agit alors d'une jointure spatiale.</p>
				<p>Ce type de jointure ne peut se faire qu'entre deux couches SIG, de type point, ligne ou polygone. Il est possible par exemple de partir d'une couche de polygones et d'une couche point, et de lier à chaque polygone les données attributaires du point contenu par ce polygone.</p>
				<p>Notez bien que comme pour une jointure attributaire, les données qui seront jointes sont toujours les données attributaires.</p>
				<figure>
					<a href="illustrations/tous/8_2_principe_jointure_spatiale.svg" >
						<img src="illustrations/tous/8_2_principe_jointure_spatiale.png" alt="principe d'une jointure spatiale" height="700">
					</a>
				</figure>
				<p>Dans l'exemple ci-dessus, les deux couches de départ sont une couche de département et une couche de chef-lieux. Les données attributaires des chef-lieux (leur nom, code et coordonnées) sont jointes aux départements en se basant sur leur position : <b>chaque département récupère les données du chef-lieu intersectant ce département</b>.</p>
				<p>Il existe plusieurs outils pour cela dans QGIS ; nous utiliserons celui présentant a priori le plus de possibilités.</p>
				
			<h3><a class="titre" id="VIII22">Deux outils possibles (voire plus...)</a></h3>
			
				<p>Comme souvent dans QGIS, il existe plusieurs manières de faire les choses. Deux outils de jointure spatiale vous seront présentés ici ; il en existe d'autres !</p>
				
				<h4><a class="titre" id="VIII22a">En passant par le menu vecteur</a></h4>
					
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS, ajoutez les deux couches <em class="data">depts_france_geofla</em> et <em class="data">cheflieux_france</em>.</p>
						<p>Rendez-vous dans le menu
							<a class="thumbnail_bottom" href="#thumb">Vecteur &#8594; Outils de gestion de données &#8594; Joindre les attributs par localisation
								<span>
									<img src="illustrations/tous/8_2_join_menu.png" alt="Menu Vecteur, Outils de gestion de données, Joindre les attributs par localisation" height="300" >
								</span>
							</a>
						:</p>
						<figure>
							<a href="illustrations/tous/8_2_join_fenetre.png" >
								<img src="illustrations/tous/8_2_join_fenetre.png" alt="fenêtre de jointure spatiale" height="450">
							</a>
						</figure>
						<p>Notez que cet outil ne propose pas le choix de l'opérateur (intersecte, contient, est disjoint...). L'opérateur intersecte sera toujours utilisé.</p>
						<p>Fermez cette fenêtre sans lancer la jointure.</p>
					</div>

				<h4><a class="titre" id="VIII22b">En passant par la boîte à outils Traitement</a></h4>
				
					<div class="manip">
						<p>Si la boîte à outils Traitement n'est pas visible, menu <b>Traitement &#8594; Boîte à outils</b>.</p>
						<p>Dans cette boîte à outils, en <b>mode avancé</b> (liste déroulante en bas de la boîte), rubrique <b>Géotraitements QGIS </b> &#8594; <b>Vector general tools</b> &#8594; <b>Join attributes by location</b> :</p>
						<figure>
							<a href="illustrations/tous/8_3_join_processing.png" >
								<img src="illustrations/tous/8_3_join_processing.png" alt="emplacement de l'outil de jointure spatiale dans la boîte à outils Traitement" height="350">
							</a>
						</figure>
						<figure>
							<a href="illustrations/tous/8_3_join_processing_fenetre.png" >
								<img src="illustrations/tous/8_3_join_processing_fenetre.png" alt="fenêtre de l'outil de jointure spatiale de la boîte à outils Traitement" height="550">
							</a>
						</figure>
						<p>Au contraire de l'outil précédent, il est ici possible de choisir l'opérateur spatial. C'est donc cet outil que nous utiliserons par la suite.</p>
						<p>Essayons, comme dans la <a href="08_02_jointure_spatiale.php#VIII21">partie VIII.2.1</a>, de joindre les données attributaires des chef-lieux aux départements, en fonction de leur position.</p>
						<ul>
							<li class="espace"><b>Indiquez une couche vecteur :</b> choisissez la couche à laquelle joindre les données; ici, les départements.</li>
							<li class="espace"><b>Joindre la couche vecteur :</b> choisissez la couche avec les données à joindre ; ici, les chef-lieux.</li>
							<li class="espace"><b>Prédicat géométrique :</b> les opérateurs intersecte et contient auront ici le même résultat</li>
							<li class="espace"><b>Résumé de l'attribut :</b> cette rubrique permet soit de ne garder que les attributs de la première entité rencontrée, soit de faire des statistiques si plusieurs entités sont rencontrées. Comme il n'y a qu'un seul chef-lieu par département, il est inutile de calculer des statistiques : choisissez la 1ère option.</li>
							<li class="espace"><b>Statistiques pour le résumé :</b> ces informations ne seront prises en compte que si la 2ème option a été choisie dans la liste déroulante du résumé de l'attribut.</li>
							<li class="espace"><b>Joined table :</b> cette option est importante dans le cas où des entités de la couche de départ n'ont pas de correspondance dans la couche à joindre. Dans notre cas, chaque département ayant un chef-lieux, les deux options sont équivalentes.</li>
							<li class="espace"><b>Joined layer :</b> cliquez sur <b>...</b> pour choisir <b>Enregistrer dans un fichier</b> (nommez la future couche <em class="data">depts_join_cheflieux</em> par exemple)</li>
						</ul>
						<p>Cliquez sur <b>OK</b>, patientez... la nouvelle couche est automatiquement ajoutée au projet.</p>
						<p>Ouvrez la table attributaire de la nouvelle couche. Pour chaque département, il est maintenant renseigné le nom et le code du chef-lieu, ainsi que ses coordonnées.</p>
					</div>
					<p class="note">Il existe encore d'autres moyens pour faire une jointure spatiale, notamment en passant par une base de données relationnelle type PostgreSQL avec son extension spatiale PostGIS, ou bien à l'aide du plugin mmqgis...</p>	
			
							
		<h3><a class="titre" id="VIII23">Quelques exemples supplémentaires</a></h3>
		
			<h4><a class="titre" id="VIII23a">Écoles secondaires du Kenya</a></h4>
			
				<p>Le but sera ici, à partir d'une couche du district de Nakuru et d'unecouche de points représentant les écoles secondaires de ce district, de déterminer combien d'école compte chaque zone du district.</p>
				
				<div class="manip">
					<p>Dans un nouveau projet QGIS, ajoutez les couches <em class="data">KEN_adm4_Nakuru</em> et <em class="data">kenya_ecoles_nakuru</em>.</p>
					<p>Choisissez les paramètres de la jointure spatiale :</p>
					<figure>
						<a href="illustrations/tous/8_2_join_fenetre_kenya.png" >
							<img src="illustrations/tous/8_2_join_fenetre_kenya.png" alt="choix des paramètres pour la jointure des écoles aux zones du district de Nakuru" height="550" >
						</a>
					</figure>
					<p>Le nombre d'écoles dans la zone sera automatiquement calculé à partir du moment où vous choisissez l'option <b>Take summary of intersected features</b>. Vous pouvez choisir de ne calculer aucune statistique.</p>
					<p>Choisissez également <b>Keep all records</b> : ainsi, même si une zone ne comporte aucune école, elle ne sera pas supprimée de la couche résultat.</p>
					<p>Lancez la jointure, ajoutez la nouvelle couche.</p>
					<p><img class="icone" src="illustrations/tous/8_2_id_icone.png" alt="icône identifier les entités" >En lisant les informations par exemple de la zone de Bahati, on peut lire que cette zone comporte 22 écoles :</p>
					<figure>
						<a href="illustrations/tous/8_2_bahati_id.png" >
							<img src="illustrations/tous/8_2_bahati_id.png" alt="résultat de l'identification des entités sur la zone de Bahati : 22 écoles" height="320" >
						</a>
					</figure>
				</div>
			
			<h4><a class="titre" id="VIII23b">Jointure de deux couches de polygones : un comportement étonnant</a></h4>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez les couches <em class="data">regions_france_geofla</em> et <em class="data">depts_france_geofla</em>.</p>
					<p>Que se passe-t-il si l'on essaye de trouver par une jointure spatiale le nombre de départements de chaque région ?</p>
					<p>Testez-le, avec les mêmes paramètres que pour les écoles secondaires du Kenya : vous devriez obtenir les nombres de départements suivants par région :</p>
					<figure>
						<a href="illustrations/tous/8_2_reg_join_depts.png" >
							<img src="illustrations/tous/8_2_reg_join_depts.png" alt="nb de départements par région, tel que calculé par une jointure spatiale" height="550" >
						</a>
					</figure>
				</div>
				<p>A part pour la Corse, ces nombres sont erronés; en effet, il semble que la jointure ait pris en compte pour une région non seulement les départements à l'intérieur de la région mais également les départements adjacents.</p>
				<p>Comment cela se fait-il ? Si vous testez une <a href="06_02_req_spatiales.php">requête spatiale</a> pour sélectionnez tous les départements intersectant une région (après avoir sélectionné une région), vous constaterez que les départements limitrophes sont également sélectionnés. L'opérateur d'intersection fonctionne donc ainsi. Bug ou feature ? A vous de voir !</p>
			
				
				<br>
				<a class="prec" href="08_01_jointure_attrib.php">chapitre précédent</a>
				<a class="suiv" href="09_00_analyse_spatiale.php">partie IX : analyse spatiale</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_8.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
