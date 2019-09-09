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
					<li><a href="#VIII22">Joindre des éléments un à un</a></li>
					<li><a href="#VIII23">Quelques exemples supplémentaires</a>
						<ul class="listesoustitres">
							<li><a href="#VIII23a">Écoles secondaires du Kenya</a></li>
							<li><a href="#VIII23b">Jointure de deux couches de polygones : un comportement étonnant</a></li>
						</ul>
					</li>
					<li><a href="#VIII24">Joindre plusieurs éléments à un seul</a></li>
				</ul>
				<br>
				

			<h3><a class="titre" id="VIII21">Comment fonctionne une jointure spatiale ?</a></h3>

				<p>Pour faire une jointure, il est possible de se baser sur la <b>position des éléments</b> et non plus sur leurs données attributaires : il s'agit alors d'une jointure spatiale.</p>
				<p>Ce type de jointure ne peut se faire qu'entre deux couches SIG, de type point, ligne ou polygone. Il est possible par exemple de partir d'une couche de polygones et d'une couche point, et de lier à chaque polygone les données attributaires du point contenu par ce polygone.</p>
				<p>Notez bien que comme pour une jointure attributaire, les données qui seront jointes sont toujours les données attributaires.</p>
				<figure>
					<a href="illustrations/tous/8_2_principe_jointure_spatiale.svg" >
						<img src="illustrations/tous/8_2_principe_jointure_spatiale.svg" alt="principe d'une jointure spatiale" width="620">
					</a>
				</figure>
				<p>Dans l'exemple ci-dessus, les deux couches de départ sont une couche de département et une couche de chefs-lieux. Les données attributaires des chefs-lieux (leur nom, code et coordonnées) sont jointes aux départements en se basant sur leur position : <b>chaque département récupère les données du chef-lieu intersectant ce département</b>.</p>
				<p>Il existe plusieurs outils pour cela dans QGIS ; nous utiliserons celui présentant a priori le plus de possibilités.</p>
				
			<h3><a class="titre" id="VIII22">Joindre des éléments un à un</a></h3>
			
				<p>Voyons tout d'abord le cas où les données correspondent une à une, par exemple pour joindre les données d'un chef-lieu au département qui lui correspond.</p>
				
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez les deux couches shapefile <em class="data">DEPARTEMENT</em> et <em class="data">CHEF_LIEU</em>.</p>
					<figure>
						<a href="illustrations/tous/8_2_cheflieux_depts.png" >
							<img src="illustrations/tous/8_2_cheflieux_depts.png" alt="superposition des chefs-lieux et des départements" width="60%" >
						</a>
					</figure>
                    <p>Ouvrez les tables attributaires des 2 couches : il n'existe pas de champ permettant de faire une jointure attributaire entre les couches (même s'il serait possible de récupérer le code du département à partir du code INSEE, mais nous ferons comme si pour les besoins de l'exercice...).</p>
                    <p>Par contre, <b>chaque chef-lieu est situé dans un département</b>&nbsp;; il est donc possible d'associer les 2 avec un <a href="06_02_req_spatiales.php#VI22">opérateur spatial</a> comme par exemple <b>contient</b>.</p>
                </div>
                
                <p>Le but de l'opération est d'<b>ajouter des colonnes</b> dans la table attributaire de la couche de départements, avec le nom du chef-lieu, son statut etc. Bien sûr, l'inverse est également possible : ajouter dans la table attributaire des chefs-lieux des colonnes avec le nom du département, son code etc.</p>
                
                <div class="manip">
                    <p>Dans la boît à outils de traitements, rubrique <b>Outils généraux pour les vecteurs</b>, double-cliquez sur <b>Joindre les attributs par localisation</b>.</p>
                    <figure>
						<a href="illustrations/tous/8_2_join_emplacement.png" >
							<img src="illustrations/tous/8_2_join_emplacement.png" alt="Emplacement de l'outil de jointure spatiale dans la boît à outils" width="80%" >
						</a>
					</figure>
					 <figure>
						<a href="illustrations/tous/8_2_join_fenetre.png" >
							<img src="illustrations/tous/8_2_join_fenetre.png" alt="Fenêtre de l'outil de jointure spatiale dans la boît à outils" width="100%" >
						</a>
					</figure>
					<ul>
					   <li class="espace">Couche source : sélectionnez la couche <em class="data">DEPARTEMENT</em></li>
					   <li class="espace">Joindre la couche : sélectionnez la couche <em class="data">CHEF_LIEU</em></li>
					   <li class="espace">Prédicat géométrique : vous pouvez choisir <b>intersecte</b>, ou bien <b>contient</b></li>
					   <li class="espace">Champs à ajouter : il est possible de n'ajouter que certains champs de la couche à joindre. Laisser vide pour ajouter tous les champs</li>
					   <li class="espace">Type de jointure : dans la mesure où ici, un chef-lieu correspond exactement à un département, vous pouvez choisir l'une ou l'autre option et le résultat sera le même</li>
					   <li class="espace">Couche issue de la jointure spatiale : laisser la valeur par défaut <b>Créer une couche temporaire</b></li>
					   <li class="espace">Cliquez sur <b>Exécuter</b></li>
					</ul>
					<p>Vous pouvez fermer la fenêtre de l'outil de jointure.</p>
					<p> Une couche temporaire a été ajoutée à QGIS. Ses géométries sont celles de la couche source, ici les départements.</p>
					<p>Ouvrez sa table attributaire : elle contient les attributs des départements et des chefs-lieux.</p>
					<figure>
						<a href="illustrations/tous/8_2_table_apres_jointure.png" >
							<img src="illustrations/tous/8_2_table_apres_jointure.png" alt="Table attributaire de la couche créée par jointure spatiale, avec les données attributaires des départements et des chefs-lieux" width="100%" >
						</a>
					</figure>
                </div>

				
					<p class="note">Il existe d'autres moyens pour faire une jointure spatiale, notamment en passant par une base de données relationnelle type PostgreSQL avec son extension spatiale PostGIS, ou bien à l'aide du plugin mmqgis...</p>	
			
							
    		<h3><a class="titre" id="VIII23">Quelques exemples supplémentaires</a></h3>
		
    			<h4><a class="titre" id="VIII23a">Écoles secondaires du Kenya</a></h4>
    			
    				<p>Le but sera ici, à partir d'une couche du district de Nakuru et d'une couche de points représentant les écoles secondaires de ce district, de déterminer combien d'écoles compte chaque zone du district.</p>
    				
    				<div class="manip">
    					<p>Dans un nouveau projet QGIS, ajoutez les couches <em class="data">KEN_adm4_Nakuru</em> et <em class="data">kenya_ecoles_nakuru</em>.</p>
    					<p>Choisissez les paramètres de la jointure spatiale :</p>
    					<figure>
    						<a href="illustrations/tous/8_2_join_fenetre_kenya.png" >
    							<img src="illustrations/tous/8_2_join_fenetre_kenya.png" alt="choix des paramètres pour la jointure des écoles aux zones du district de Nakuru" width="450" >
    						</a>
    					</figure>
    					<p>Le nombre d'écoles dans la zone sera automatiquement calculé à partir du moment où vous choisissez l'option <b>Take summary of intersected features</b>. Vous pouvez choisir de ne calculer aucune statistique.</p>
    					<p>Choisissez également <b>Keep all records</b> : ainsi, même si une zone ne comporte aucune école, elle ne sera pas supprimée de la couche résultat.</p>
    					<p>Lancez la jointure, ajoutez la nouvelle couche.</p>
    					<p><img class="icone" src="illustrations/tous/8_2_id_icone.png" alt="icône identifier les entités" >En lisant les informations par exemple de la zone de Bahati, on peut lire que cette zone comporte 22 écoles :</p>
    					<figure>
    						<a href="illustrations/tous/8_2_bahati_id.png" >
    							<img src="illustrations/tous/8_2_bahati_id.png" alt="résultat de l'identification des entités sur la zone de Bahati : 22 écoles" width="600" >
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
    							<img src="illustrations/tous/8_2_reg_join_depts.png" alt="nb de départements par région, tel que calculé par une jointure spatiale" width="600" >
    						</a>
    					</figure>
    				</div>
    				<p>A part pour la Corse, ces nombres sont erronés; en effet, il semble que la jointure ait pris en compte pour une région non seulement les départements à l'intérieur de la région mais également les départements adjacents.</p>
    				<p>Comment cela se fait-il ? Si vous testez une <a href="06_02_req_spatiales.php">requête spatiale</a> pour sélectionnez tous les départements intersectant une région (après avoir sélectionné une région), vous constaterez que les départements limitrophes sont également sélectionnés. L'opérateur d'intersection fonctionne donc ainsi. Bug ou feature ? A vous de voir !</p>
    				
    		<h3><a class="titre" id="VIII24">Joindre plusieurs éléments à un seul</a></h3>
			
				
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
