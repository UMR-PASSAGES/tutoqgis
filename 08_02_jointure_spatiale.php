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
					<li><a href="#VIII22">Joindre des éléments un à un</a>
						<ul class="listesoustitres">
							<li><a href="#VIII22a">Premier exemple détaillé : quel chef-lieu pour quel département ?</a></li>
							<li><a href="#VIII22b">Pour s'entraîner : quel comté pour quel site remarquable ?</a></li>
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
				

			<h3>Comment fonctionne une jointure spatiale ?<a class="headerlink" id="VIII21" href="#VIII21"></a></h3>

				<p>Pour faire une jointure, il est possible de se baser sur la <b>position des éléments</b> et non plus sur leurs données attributaires : il s'agit alors d'une jointure spatiale.</p>
				<p>Ce type de jointure ne peut se faire qu'entre deux couches SIG, de type point, ligne ou polygone. Il est possible par exemple de partir d'une couche de polygones et d'une couche point, et de lier à chaque polygone les données attributaires du point contenu par ce polygone.</p>
				<p>Notez bien que comme pour une jointure attributaire, les données qui seront jointes sont toujours les données attributaires.</p>
				<figure>
					<a href="illustrations/8_2_principe_jointure_spatiale.svg" >
						<img src="illustrations/8_2_principe_jointure_spatiale.svg" alt="principe d'une jointure spatiale" width="620">
					</a>
				</figure>
				<p>Dans l'exemple ci-dessus, les deux couches de départ sont une couche de département et une couche de chefs-lieux. Les données attributaires des chefs-lieux (leur nom, code et coordonnées) sont jointes aux départements en se basant sur leur position : <b>chaque département récupère les données du chef-lieu intersectant ce département</b>.</p>
				<p>Il existe plusieurs outils pour cela dans QGIS ; nous utiliserons celui présentant a priori le plus de possibilités.</p>
				
			<h3>Joindre des éléments un à un<a class="headerlink" id="VIII22" href="#VIII22"></a></h3>
			     
			    <h4>Premier exemple détaillé : quel chef-lieu pour quel département ?<a class="headerlink" id="VIII22a" href="#VIII22a"></a></h4>
			
    				<p>Voyons tout d'abord le cas où les données correspondent une à une, par exemple pour joindre les données d'un chef-lieu au département qui lui correspond.</p>
    				
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS, ajoutez les deux couches shapefile <em class="data">DEPARTEMENT</em> et <em class="data">CHEF_LIEU</em>.</p>
    					<figure>
    						<a href="illustrations/8_2_cheflieux_depts.jpg" >
    							<img src="illustrations/8_2_cheflieux_depts.jpg" alt="superposition des chefs-lieux et des départements" width="400" >
    						</a>
    					</figure>
                        <p>Ouvrez les tables attributaires des 2 couches : il n'existe pas de champ permettant de faire une jointure attributaire entre les couches (même s'il serait possible de récupérer le code du département à partir du code INSEE, mais nous ferons comme si pour les besoins de l'exercice...).</p>
                        <p class="note">Si vous avez le choix entre effectuer une jointure attributaire et une jointure spatiale pour le même résultat, choisissez la jointure attributaire : les temps de traitements seront moins longs, et vous vous affranchirez aussi d'éventuels problèmes liés aux géométries, par exemple des erreurs de topologie.</p>
                        <p>Par contre, <b>chaque chef-lieu est situé dans un département</b>&nbsp;; il est donc possible d'associer les 2 avec un <a href="06_02_req_spatiales.php#VI22">opérateur spatial</a> comme par exemple <b>contient</b>.</p>
                    </div>
                    
                    <p>Le but de l'opération est d'<b>ajouter des colonnes</b> dans la table attributaire de la couche de départements, avec le nom du chef-lieu, son statut etc. Bien sûr, l'inverse est également possible : ajouter dans la table attributaire des chefs-lieux des colonnes avec le nom du département, son code etc.</p>
                    
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
    						<a href="illustrations/8_2_table_apres_jointure.jpg" >
    							<img src="illustrations/8_2_table_apres_jointure.jpg" alt="Table attributaire de la couche créée par jointure spatiale, avec les données attributaires des départements et des chefs-lieux" width="600" >
    						</a>
    					</figure>
                    </div>
                    
                <h4>Pour s'entraîner : quel comté pour quel site remarquable ?<a class="headerlink" id="VIII22b" href="#VIII22b"></a></h4>
                
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
                    		<p class="reponse">Boîte à outils de traitements &#8594; Outils généraux pour les vecteurs &#8594; Joindre les attributs par localisation, avec en couche source <em class="data">Heritage</em> et en couche à joindre <em class="data">Counties</em>. Une fois la nouvelle couche créée, vérifiez sa géométrie (sites remarquables) et ses données attributaires :</p>
                    		<p class="reponse">
                    		  <a href="illustrations/8_2_heritage_join_counties_res.jpg"><img src="illustrations/8_2_heritage_join_counties_res.jpg" alt="Résultat de la jointure spatiale : points et table attributaire" width="600" ></a>
                    		</p>
                    	</div>
                    </div>

					<p class="note">Il existe d'autres moyens pour faire une jointure spatiale, notamment en passant par une base de données relationnelle type PostgreSQL avec son extension spatiale PostGIS, ou bien à l'aide du plugin mmqgis...</p>	
			
							
    				
    		<h3>Joindre plusieurs éléments à un seul<a class="headerlink" id="VIII23" href="#VIII23"></a></h3>
    		
    		   <p>Nous avons vu le cas où l'on souhaite joindre des données une à une.</p>
    		   <p>Comment faire maintenant si <b>une entité dans la couche source correspond à plusieurs entités dans la couche à joindre&nbsp;?</b> Par exemple, en reprenant l'exemple des comtés (données surfaciques) et sites remarquables (données ponctuelles) irlandais, on peut vouloir joindre les données des sites aux comtés. Chaque comté contenant plusieurs sites, il y a 2 possibilités pour faire la jointure :</p>
    		   <ul>
    		      <li class="espace">créer autant de comtés que de sites. Les géométries des comtés seront donc en double, triple etc., chacune avec les données attributaire d'un site</li>
    		      <li class="espace">décider d'une méthode <b>d'agrégation</b> pour joindre par exemple à chaque comté la moyenne, le nombre, la concaténation... des champs de la couche de sites. Cette dernière méthode est généralement la plus utile.</li>
    		   </ul>
    		   <p><em>Avant de procéder à la jointure, il est important de bien réfléchir aux questions que l'on voudra poser par la suite aux données : que cherche-t-on à faire&nbsp;? Quelle sera la prochaine étape&nbsp;?</em></p>
    		
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
    					   <li class="espace">Couche source : <em class="data">Counties</em></li>
    					   <li class="espace">Joindre la couche : <em class="data">Heritage</em></li>
    					   <li class="espace">Prédicat géométrique : <b>Intersecte</b>, ou bien <b>Contient</b></li>
    					   <li class="espace">Champs à résumer : cliquez sur le bouton <b>...</b> à droite, et choisissez un champ d'identifiant unique, ici <b>OBJECTID</b> (NAMN1 donnerait le même résultat, dans la mesure où chaque site a un nom différent)</li>
    					   <li class="espace">Résumés à calculer : cliquez sur le bouton <b>...</b> à droite, et cochez <b>compte</b> pour compter le nombre de sites par comté</li>
    					   <li class="espace">Couche issue de la jointure spatiale : laissez la valeur par défaut pour créer une couche temporaire</li>
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
    			
    			    <p>Nous allons ici partir d'une couche de communes avec un champ population, et d'une couche de départements. L'objectif sera de calculer pour chaque département la population totale, la population moyenne par commune et la population médiane par commune.</p>
    			
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS, ajoutez les couches <em class="data">COMMUNE</em> et <em class="data">DEPARTEMENT</em>.</p>
    					<p>Ouvrez la table attributaire de la couche de communes, vérifiez que le champ <b>POPULATION</b> soit bien présent.</p>
    					<p>Boîte à outils de traitement &#8594; Outils généraux pour les vecteurs &#8594; <b>Joindre les attributs par localisation (résumé)</b></p>
    					<figure>
    						<a href="illustrations/8_2_join_resume_fenetre_2.jpg" >
    							<img src="illustrations/8_2_join_resume_fenetre_2.jpg" alt="Fenêtre de l'outil de jointure spatiale (résumé)" width="600" >
    						</a>
    					</figure>
    					<ul>
    					   <li class="espace">Couche source : <em class="data">DEPARTEMENT</em></li>
    					   <li class="espace">Joindre la couche : <em class="data">COMMUNE</em></li>
    					   <li class="espace">Prédicat géométrique : choisissez <b>contient</b>. Avec l'opérateur Intersecte, les communes limitrophes seraient également prises en compte, ce qui n'est pas souhaité ici.</li>
    					   <li class="espace">Champs à résumer : cliquez sur le bouton <b>...</b> à droite, et choisissez le champ <b>POPULATION</b></li>
    					   <li class="espace">Résumés à calculer : cliquez sur le bouton <b>...</b> à droite, et cochez <b>somme</b>, <b>moyenne</b> et <b>médiane</b> pour calculer ces valeurs pour chaque département.
    						<a href="illustrations/8_2_choix_resumes.jpg" >
    							<img src="illustrations/8_2_choix_resumes.jpg" alt="Fenêtre de choix des opérations d'agrégation : sum, moyenne et median sont cochés" width="320" >
    						</a></li>
    					   <li class="espace">Couche issue de la jointure spatiale : laissez la valeur par défaut pour créer une couche temporaire</li>
    					   <li class="espace">Cliquez sur <b>Exécuter</b>. Attention, le temps de traitement peut être un peu long.</li>
    					</ul>
    					<p>La couche temporaire est ajoutée à QGIS. Ses géométries sont celles des départements. Ouvrez sa table attributaire, vérifiez son contenu : on connaît maintenant pour chaque département la population totale (POPULATION_sum), la population communale moyenne (POPULATION_mean) et la population communale mediane (POPULATION_median).</p>
    					<div class="question">
                    		<input type="checkbox" id="faq-3">
                    		<p><label for="faq-3">Quel est le département le moins peuplé&nbsp;?</label></p>
                    		<p class="reponse">En cliquant sur la colonne <b>POPULATION_sum</b>, on peut classer les départements en fonction de leur population. La Lozère est le département le moins peuplé avec une population de 76422 habitants.</p>
                    		<p class="reponse"><a href="illustrations/8_2_depts_pop_communes_table.jpg" ><img src="illustrations/8_2_depts_pop_communes_table.jpg" alt="Extrait de la table attributaire de la couche résultat, du moins peuplé au plus peuplé" width="600" ></a></p>
                    	</div>
    				</div>
    				
                    <p>Il est possible d'utiliser d'autres méthodes pour réaliser les jointures spatiales, par exemple avec le plugin mmqgis, ou bien via une <a href="06_04_req_sql.php" >requête SQL</a>.</p>
                    <p>Concernant cette dernière méthode, avec utilisation des couches virtuelles, les temps de traitement sont parfois longs en particulier avec des opérateurs spatiaux. L'utilisation de Postgresql/PostGIS améliore grandement ces temps de traitement, mais ceci sort de l'objet de ce tutoriel&nbsp;!</p>

				
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
