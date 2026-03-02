<?php include('head.inc.php');?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php');?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">VIII.  Lier des données de deux sources différentes&nbsp;: les jointures</h1>
			<h2>VIII.2  Lier des données en fonction de leur position&nbsp;: jointures spatiales</h2>
				<ul class="listetitres">
					<li><a href="#VIII21">Comment fonctionne une jointure spatiale&nbsp;?</a></li>
					<li><a href="#VIII22">Joindre des éléments un à un</a>
						<ul class="listesoustitres">
							<li><a href="#VIII22a">Premier exemple détaillé&nbsp;: quel chef-lieu pour quel département&nbsp;?</a></li>
							<li><a href="#VIII22b">Pour s'entraîner&nbsp;: quel comté pour quel site remarquable&nbsp;?</a></li>
						</ul>
					</li>
					<li><a href="#VIII23">Joindre plusieurs éléments à un seul</a>
					   <ul class="listesoustitres">
							<li><a href="#VIII23a">Compter le nombre de sites par comté</a></li>
							<li><a href="#VIII23b">Calculer la population par département à partir des communes</a></li>
						</ul>
					</li>
				</ul>
				<br>
				

			<h3>Comment fonctionne une jointure spatiale&nbsp;?<a class="headerlink" id="VIII21" href="#VIII21"></a></h3>

				<p>Pour faire une jointure, il est possible de se baser sur la <b>position des éléments</b> et non plus sur leurs données attributaires&nbsp;: il s'agit alors d'une jointure spatiale.</p>
				<p>Ce type de jointure ne peut se faire qu'entre deux couches SIG, de type point, ligne ou polygone. Il est possible par exemple de partir d'une couche de polygones et d'une couche point, et de lier à chaque polygone les données attributaires du point contenu par ce polygone.</p>
				<p>Notez bien que comme pour une jointure attributaire, les données qui seront jointes sont toujours les données attributaires.</p>
				<figure>
					<a href="illustrations/8_2_principe_jointure_spatiale.svg" >
						<img src="illustrations/8_2_principe_jointure_spatiale.svg" alt="principe d'une jointure spatiale" width="620">
					</a>
				</figure>
				<p>Dans l'exemple ci-dessus, les deux couches de départ sont une couche de département et une couche de chefs-lieux. Les données attributaires des chefs-lieux (leur nom, code et coordonnées) sont jointes aux départements en se basant sur leur position&nbsp;: <b>chaque département récupère les données du chef-lieu intersectant ce département</b>.</p>
				<p>Il existe plusieurs outils pour cela dans QGIS&nbsp;; nous utiliserons celui présentant a priori le plus de possibilités.</p>
				
			<h3>Joindre des éléments un à un<a class="headerlink" id="VIII22" href="#VIII22"></a></h3>
			     
			    <h4>Premier exemple détaillé&nbsp;: quel chef-lieu pour quel département&nbsp;?<a class="headerlink" id="VIII22a" href="#VIII22a"></a></h4>
			
    				<p>Voyons tout d'abord le cas où les données correspondent une à une, par exemple pour joindre les données d'un chef-lieu au département qui lui correspond.</p>
    				
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS, ajoutez les deux couches geopackage <em class="data">departement</em> et <em class="data">chef_lieu_de_departement</em>.</p>
    					<figure>
    						<a href="illustrations/8_2_cheflieux_depts.jpg" >
    							<img src="illustrations/8_2_cheflieux_depts.jpg" alt="superposition des chefs-lieux et des départements" width="400" >
    						</a>
    					</figure>
                        <p>Ouvrez les tables attributaires des 2 couches&nbsp;: il n'existe pas de champ permettant de faire une jointure attributaire entre les couches (même s'il serait possible de récupérer le code du département à partir du code INSEE, mais nous ferons comme si pour les besoins de l'exercice...).</p>
                        <p class="note">Si vous avez le choix entre effectuer une jointure attributaire et une jointure spatiale pour le même résultat, choisissez la jointure attributaire&nbsp;: les temps de traitements seront moins longs, et vous vous affranchirez aussi d'éventuels problèmes liés aux géométries, par exemple des erreurs de topologie.</p>
                        <p>Par contre, <b>chaque chef-lieu est situé dans un département</b>&nbsp;; il est donc possible d'associer les 2 avec un <a href="06_02_req_spatiales.php#VI22">opérateur spatial</a> comme par exemple <b>contient</b>.</p>
                    </div>
                    
                    <p>Le but de l'opération est d'<b>ajouter des colonnes</b> dans la table attributaire de la couche de départements, avec le nom du chef-lieu, son code etc. Bien sûr, l'inverse est également possible&nbsp;: ajouter dans la table attributaire des chefs-lieux des colonnes avec le nom du département, son code etc.</p>
                    
                    <div class="manip">
                        <p>Dans la boîte à outils de traitements, rubrique <b>Outils généraux pour les vecteurs</b>, double-cliquez sur <b>Joindre les attributs par localisation</b>.</p>
                        <figure>
    						<a href="illustrations/8_2_join_emplacement.jpg" >
    							<img src="illustrations/8_2_join_emplacement.jpg" alt="Emplacement de l'outil de jointure spatiale dans la boîte à outils" width="350" >
    						</a>
    					</figure>
    					<figure>
    						<a href="illustrations/8_2_join_fenetre.jpg" >
    							<img src="illustrations/8_2_join_fenetre.jpg" alt="Fenêtre de l'outil de jointure spatiale dans la boîte à outils" width="600" >
    						</a>
    					</figure>
    					<ul>
    					   <li class="espace">Couche source&nbsp;: sélectionnez la couche <em class="data">departement</em></li>
    					   <li class="espace">Joindre la couche&nbsp;: sélectionnez la couche <em class="data">chef_lieu_de_departement</em></li>
    					   <li class="espace">Prédicat géométrique&nbsp;: vous pouvez choisir <b>intersecte</b>, ou bien <b>contient</b></li>
    					   <li class="espace">Champs à ajouter&nbsp;: il est possible de n'ajouter que certains champs de la couche à joindre. Laisser vide pour ajouter tous les champs</li>
    					   <li class="espace">Type de jointure&nbsp;: dans la mesure où ici, un chef-lieu correspond exactement à un département, vous pouvez choisir l'une ou l'autre option et le résultat sera le même</li>
    					   <li class="espace">Préfixe de champ joint&nbsp;: laissez vide</li>
    					   <li class="espace">Couche issue de la jointure spatiale&nbsp;: laisser la valeur par défaut <b>Créer une couche temporaire</b></li>
    					   <li class="espace">Cliquez sur <b>Exécuter</b></li>
    					</ul>
    					<p>Vous pouvez fermer la fenêtre de l'outil de jointure.</p>
    					<p> Une couche temporaire a été ajoutée à QGIS. Ses géométries sont celles de la couche source, ici les départements.</p>
    					<p>Ouvrez sa table attributaire&nbsp;: elle contient les attributs des départements et des chefs-lieux.</p>
    					<figure>
    						<a href="illustrations/8_2_table_apres_jointure.jpg" >
    							<img src="illustrations/8_2_table_apres_jointure.jpg" alt="Table attributaire de la couche créée par jointure spatiale, avec les données attributaires des départements et des chefs-lieux" width="600" >
    						</a>
    					</figure>
                    </div>
                    
                <h4>Pour s'entraîner&nbsp;: quel comté pour quel site remarquable&nbsp;?<a class="headerlink" id="VIII22b" href="#VIII22b"></a></h4>
                
                    <div class="manip">
                        <p>Ouvrez un nouveau projet QGIS, ajoutez les couches <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip" >Counties</a></em> et <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip" >Heritage</a></em>, correspondant aux comtés et sites remarquables irlandais.</p>
                        <figure>
    						<a href="illustrations/8_2_irlande_carte.jpg" >
    							<img src="illustrations/8_2_irlande_carte.jpg" alt="Comtés et sites remarquables irlandais" width="300" >
    						</a>
    					</figure>
    					<div class="question">
                    		<input type="checkbox" id="faq-1">
                    		<p><label for="faq-1">Prenez connaissance des données attributaires de ces 2 couches. Comment ajouter aux sites remarquables (données ponctuelles) les données attributaires de leur comté&nbsp;?</label></p>
                    		<p class="reponse">Boîte à outils de traitements &#8594; Outils généraux pour les vecteurs &#8594; Joindre les attributs par localisation, avec en couche source <em class="data">Heritage</em> et en couche à joindre <em class="data">Counties</em>. Une fois la nouvelle couche créée, vérifiez sa géométrie (sites remarquables) et ses données attributaires&nbsp;:</p>
                    		<p class="reponse">
                    		  <a href="illustrations/8_2_heritage_join_counties_res.jpg"><img src="illustrations/8_2_heritage_join_counties_res.jpg" alt="Résultat de la jointure spatiale&nbsp;: points et table attributaire" width="600" ></a>
                    		</p>
                    	</div>
                    </div>

					<p class="note">Il existe d'autres moyens pour faire une jointure spatiale, notamment en passant par une base de données relationnelle type PostgreSQL avec son extension spatiale PostGIS, ou bien à l'aide du plugin mmqgis...</p>	
			
    				
    		<h3>Joindre plusieurs éléments à un seul<a class="headerlink" id="VIII23" href="#VIII23"></a></h3>
    		
    		   <p>Nous avons vu le cas où l'on souhaite joindre des données une à une.</p>
    		   <p>Comment faire maintenant si <b>une entité dans la couche source correspond à plusieurs entités dans la couche à joindre&nbsp;?</b> Par exemple, en reprenant l'exemple des comtés (données surfaciques) et sites remarquables (données ponctuelles) irlandais, on peut vouloir joindre les données des sites aux comtés. Chaque comté contenant plusieurs sites, il y a 2 possibilités pour faire la jointure&nbsp;:</p>
    		   <ul>
    		      <li class="espace">créer autant de comtés que de sites. Les géométries des comtés seront donc en double, triple etc., chacune avec les données attributaire d'un site</li>
    		      <li class="espace">décider d'une méthode <b>d'agrégation</b> pour joindre par exemple à chaque comté la moyenne, le nombre, la concaténation... des champs de la couche de sites. Cette dernière méthode est généralement la plus utile.</li>
    		   </ul>
    		   <p><em>Avant de procéder à la jointure, il est important de bien réfléchir aux questions que l'on voudra poser par la suite aux données&nbsp;: que cherche-t-on à faire&nbsp;? Quelle sera la prochaine étape&nbsp;?</em></p>
    		
        		<h4>Compter le nombre de sites par comté<a class="headerlink" id="VIII23a" href="#VIII23a"></a></h4>
    			
    			    <p>Le but sera ici de compter le nombre de sites remarquables par comté.</p>
    			    
    			    <div class="manip">
        			    <p>Ouvrez un nouveau projet QGIS, ajoutez les couches <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip" >Counties</a></em> et <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip" >Heritage</a></em>, correspondant aux comtés et sites remarquables irlandais.</p>
        			    <p>Boîte à outils de traitement &#8594; Outils généraux pour les vecteurs &#8594; <b>Joindre les attributs par localisation (résumé)</b></p>
        			    <figure>
    						<a href="illustrations/8_2_join_resume_fenetre.jpg" >
    							<img src="illustrations/8_2_join_resume_fenetre.jpg" alt="Fenêtre de l'outil de jointure spatiale (résumé)" width="600" >
    						</a>
    					</figure>
    					<ul>
    					   <li class="espace">Couche source&nbsp;: <em class="data">Counties</em></li>
    					   <li class="espace">Joindre la couche&nbsp;: <em class="data">Heritage</em></li>
    					   <li class="espace">Prédicat géométrique&nbsp;: <b>Intersecte</b>, ou bien <b>Contient</b></li>
    					   <li class="espace">Champs à résumer&nbsp;: cliquez sur le bouton <b>...</b> à droite, et choisissez un champ quelconque, par exemple <b>OBJECTID</b> (tous les champs donneraient le même résultat, dans la mesure où il s'agit juste ici de compter le nombre de sites)</li>
    					   <li class="espace">Résumés à calculer&nbsp;: cliquez sur le bouton <b>...</b> à droite, et cochez <b>compte</b> pour compter le nombre de sites par comté</li>
    					   <li class="espace">Couche issue de la jointure spatiale&nbsp;: laissez la valeur par défaut pour créer une couche temporaire</li>
    					   <li class="espace">Cliquez sur <b>Exécuter</b></li>
    					</ul>
    					<p>La couche créée possède les même géométries que la couche Counties. Ouvrez sa table attributaire.</p>
    					<div class="question">
                    		<input type="checkbox" id="faq-2">
                    		<p><label for="faq-2">Quel est le comté avec le plus de sites&nbsp;? Y a-t-il des comtés qui n'ont pas de sites&nbsp;?</label></p>
                    		<p class="reponse">En cliquant sur la colonne <b>OBJECTID_count</b> (tout à droite), on peut classer les comtés en fonction de leur nombre de sites.</p>
                    		<p class="reponse">Le comté de Galway possède 8 sites remarquables&nbsp;; les comtés de Offaly, Monaghan et Carlow n'en possèdent aucun.</p>
                    		<p class="reponse"><a href="illustrations/8_2_counties_join_heritage_table.jpg" ><img src="illustrations/8_2_counties_join_heritage_table.jpg" alt="Extrait de la table attributaire de la couche résultat, classé par nombre de sites croissant" width="600" ></a></p>
                    	</div>
    			    </div>
    				
    			
    			<h4>Calculer la population par département à partir des communes<a class="headerlink" id="VIII23b" href="#VIII23b"></a></h4>
    			
    			    <p>Nous allons ici partir d'une couche de communes avec un champ population, et d'une couche de départements. <b>L'objectif sera de calculer pour chaque département la population totale, la population moyenne par commune et la population médiane par commune.</b></p>
    			
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS, ajoutez les couches <em class="data">commune</em> et <em class="data">departement</em>.</p>
    					<p>Ouvrez la table attributaire de la couche de communes, vérifiez que le champ <b>population</b> soit bien présent.</p>
    					<p>De manière similaire, vous pouvez constater dans la table attributaire de la couche de départements qu'il n'y a aucune information sur la population.</p>
    					<p>Boîte à outils de traitement &#8594; Outils généraux pour les vecteurs &#8594; <b>Joindre les attributs par localisation (résumé)</b></p>
    					<figure>
    						<a href="illustrations/8_2_join_resume_fenetre_2.jpg" >
    							<img src="illustrations/8_2_join_resume_fenetre_2.jpg" alt="Fenêtre de l'outil de jointure spatiale (résumé)" width="600" >
    						</a>
    					</figure>
    					<ul>
    					   <li class="espace">Couche source&nbsp;: <em class="data">departement</em></li>
    					   <li class="espace">Joindre la couche&nbsp;: <em class="data">population</em></li>
    					   <li class="espace">Prédicat géométrique&nbsp;: choisissez <b>contient</b>. Avec l'opérateur Intersecte, les communes limitrophes seraient également prises en compte, ce qui n'est pas souhaité ici.</li>
    					   <li class="espace">Champs à résumer&nbsp;: cliquez sur le bouton <b>...</b> à droite, et choisissez le champ <b>population</b></li>
    					   <li class="espace">Résumés à calculer&nbsp;: cliquez sur le bouton <b>...</b> à droite, et cochez <b>somme</b>, <b>moyenne</b> et <b>médiane</b> pour calculer ces valeurs pour chaque département.
    						<a href="illustrations/8_2_choix_resumes.jpg" >
    							<img src="illustrations/8_2_choix_resumes.jpg" alt="Fenêtre de choix des opérations d'agrégation&nbsp;: sum, moyenne et median sont cochés" width="320" >
    						</a></li>
    					   <li class="espace">Couche issue de la jointure spatiale&nbsp;: laissez la valeur par défaut pour créer une couche temporaire</li>
    					   <li class="espace">Cliquez sur <b>Exécuter</b>. Attention, le temps de traitement peut être un peu long.</li>
    					</ul>
    					<p>La couche temporaire est ajoutée à QGIS. Ses géométries sont celles des départements. Ouvrez sa table attributaire, vérifiez son contenu&nbsp;: on connaît maintenant pour chaque département la population totale (population_sum), la population communale moyenne (population_mean) et la population communale mediane (population_median).</p>
    				</div>
    				
            <p class="note">Ici, les champs créés sont nommés automatiquement en fonction de leur nom d'origine (population) et de la fonction d'agrégation choisie (sum, mean, median). Il est bien sûr possible de les <a href="07_01_creation_suppression.php#VII13" >renommer</a>&nbsp;!</p>    				
    				
    				<div class="manip">
    					<div class="question">
                    		<input type="checkbox" id="faq-3">
                    		<p><label for="faq-3">Quel est le département le moins peuplé&nbsp;?</label></p>
                    		<p class="reponse">En cliquant sur la colonne <b>population_sum</b>, on peut classer les départements en fonction de leur population. La Lozère est le département le moins peuplé avec une population de 76503 habitants.</p>
                    		<p class="reponse"><a href="illustrations/8_2_depts_pop_communes_table.jpg" ><img src="illustrations/8_2_depts_pop_communes_table.jpg" alt="Extrait de la table attributaire de la couche résultat, du moins peuplé au plus peuplé" width="600" ></a></p>
                    	</div>
    				</div>
    				
                    <p>Il est possible d'utiliser d'autres méthodes pour réaliser les jointures spatiales, par exemple avec le <a class="ext" target="_blank" href="https://michaelminn.com/linux/mmqgis/">plugin mmqgis</a>, ou bien via une <a href="06_04_req_sql.php" >requête SQL</a>.</p>
                    <p>Concernant cette dernière méthode, avec utilisation des couches virtuelles, les temps de traitement sont parfois longs en particulier avec des opérateurs spatiaux. L'utilisation de Postgresql/PostGIS améliore grandement ces temps de traitement, mais ceci sort de l'objet de ce tutoriel&nbsp;!</p>
                    
                    <p class="note">On pourrait aboutir à un résultat similaire avec l'outil <a href="09_04_maillage.php#IX45" >d'agrégation</a>, dans la mesure où il existe un champ indiquant le code du département dans la couche de communes. On peut donc fusionner toutes les communes ayant un même code département et au passage calculer la population moyenne etc. Cette opération sera probablement un peu plus longue dans la mesure où les géométries des départements sont créés à partir des communes, et bien sûr on ne disposera pas dans la couche résultat des champs de la couche de départements (puisqu'on utilise uniquement la couche de communes). Comme souvent il y a plusieurs manières de faire les choses, il faut choisir en fonction des données dont on dispose et du résultat souhaité&nbsp;!</p>

				
		<br>
		<a class="prec" href="08_01_jointure_attrib.php">chapitre précédent</a>
		<a class="suiv" href="09_00_analyse_spatiale.php">partie IX&nbsp;: analyse spatiale</a>
		<br>
		<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php');?>
			<?php include('menus_verticaux_8.inc.php');?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php');?>

</div>
</body>
</html>
