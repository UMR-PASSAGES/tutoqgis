<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">VI.  Sélectionner des données : les requêtes</h1>
			<h2>VI.3  Combiner des requêtes</h2>
				<ul class="listetitres">
					<li><a href="#VI31">Combiner deux requêtes attributaires</a></li>
					<li><a href="#VI32">Combiner deux requêtes spatiales</a></li>
					<li><a href="#VI33">Combiner requêtes spatiales et attributaires</a></li>
				</ul>
				<br>
				
			<p>Comment faire quand on souhaite combiner plusieurs requêtes, par exemple sélectionner les communes traversées par un cours d'eau et ayant une population de + de 10&nbsp;000 habitants ?</p>
			
			<h3>Combiner deux requêtes attributaires<a class="headerlink" id="VI31" href="#VI31"></a></h3>
			
				<p>Pour combiner deux requêtes attributaires, nous avons vu dans le <a href="06_01_req_attrib.php#VI15" >chapitre sur les requêtes attributaires</a> qu'il est possible d'utiliser les opérateurs AND et OR.</p>
				<p>Il est également possible de faire deux requêtes successives.</p>
				<p>Nous allons ici sélectionner les communes du Morbihan de + de 10&nbsp;000 habitants.</p>
				
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_06_Requetes.zip">communes_bretagne</a></em>.</p>
					<p><img class="iconemid" src="illustrations/6_3_selection_attrib_icone.jpg" alt="icône de sélection attributaire" >Ouvrez la table attributaire de cette couche puis la fenêtre de requête attributaire.</p>
					<p>Sélectionnez tout d'abord les communes de + de 10&nbsp;000 habitants au moyen d'une requête attributaire :</p>
					<p class="code">"population" > 10000</p>
					<figure>
						<a href="illustrations/6_1_popsup10000_res.jpg" >
							<img src="illustrations/6_1_popsup10000_res.jpg" alt="Communes de + de 10 000 habitants sélectionnées" width="400" >
						</a>
					</figure>
					<p>Tapez ensuite la requête suivante, pour sélectionner les communes du Morbihan...</p>
					<p class="code">"code_insee_du_departement" = '56' </p>
					<p>...Mais cette fois-ci, au lieu de cliquer sur &#171;&nbsp;Sélectionner des entités&nbsp;&#187;, cliquez sur le <b>petit triangle à droite</b> et sélectionnez dans la liste <b>Filtrer la sélection courante</b> :</p>
					<figure>
					    <a href="illustrations/6_3_selection_liste.jpg" >
						    <img src="illustrations/6_3_selection_liste.jpg" alt="liste accessible à partir du bouton sélection" width="600" >
						</a>
					</figure>
					<p>Ainsi, cette deuxième requête s'appliquera uniquement aux communes déjà sélectionnées : les communes du Morbihan seront sélectionnées parmi les communes de + de 10&nbsp;000 habitants.</p>
					<figure>
						<a href="illustrations/6_3_sup10000hab_morbihan.jpg" >
							<img src="illustrations/6_3_sup10000hab_morbihan.jpg" alt="Communes de + de 10 000 habitants du département du Morbihan sélectionnées" width="400" >
						</a>
					</figure>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Pouvez-vous au moyen des mêmes 2 requêtes ("POPULATION" > 10000 et "INSEE_DEP" = '56') sélectionner les communes bretonnes de + de 10 000 habitants qui ne sont pas dans le département du Morbihan ?</label></p>
						<p class="reponse">Utilisez cette fois pour la deuxième requête le bouton <b>Supprimer de la sélection actuelle</b> : les communes du Morbihan seront désélectionnées et il ne restera de sélectionnées que les communes de + de 10 000 des autres départements.</p>
					</div>
				</div>
			
			
			
			<h3>Combiner deux requêtes spatiales<a class="headerlink" id="VI32" href="#VI32"></a></h3>
			
				<p>Comment faire maintenant pour combiner deux requêtes spatiales, par exemple pour sélectionner les communes avec éolienne et cours d'eau&nbsp;?</p>
				<p>Attention, le nombre d'entités sélectionnées peut varier légèrement par rapport à ceux indiqués ici si vous chargez des données via des flux WFS et que ces données ont été mises à jour depuis la rédaction de ce tutoriel.</p>
				
				<div class="manip">
				    <p><a href="03_02_donnees_flux.php#III23">Connectez-vous au flux WFS</a> <b>http://services.sandre.eaufrance.fr/geo/zonage</b> et ajoutez la couche <em class="data ">Cours d'eau de plus de 100km - BD Carthage - France entière</em>.</p>
					<p>Ajoutez également au projet la couche <em class="data">Eoliennes implantations en Bretagne</em> issue du flux WFS <b>https://geobretagne.fr/geoserver/dreal_b/wfs</b>.</p>
					<p>A ce stade, votre projet contient donc ces 3 couches :</p>
					<figure>
						<a href="illustrations/6_3_couches_chargees.jpg" >
							<img src="illustrations/6_3_couches_chargees.jpg" alt="projet QGIS avec les 3 couches communes, éoliennes et cours d'eau" width="570" >
						</a>
					</figure>
					<p>Avec l'<a href="06_02_req_spatiales.php#VI21">outil de sélection par localisation</a>, sélectionnez tout d'abord les communes avec éoliennes.</p>
					<figure>
						<a href="illustrations/6_2_select_localisation_fenetre.jpg" >
							<img src="illustrations/6_2_select_localisation_fenetre.jpg" alt="Fenêtre de l'outil de sélection par localisation" width="600" >
						</a>
					</figure>
					<figure>
						<a href="illustrations/6_3_communes_eoliennes.jpg" >
							<img src="illustrations/6_3_communes_eoliennes.jpg" alt="communes avec éoliennes sélectionnées" width="500" >
						</a>
					</figure>
					<p>A ce stade, 256 communes sont sélectionnées.</p>
					<p>Il ne reste plus ensuite qu'à sélectionner les communes intersectant des cours d'eau <b>à partir de cette sélection</b> :</p>
					<figure>
						<a href="illustrations/6_3_communes_eoliennes_coursdeau_fenetre.jpg" >
							<img src="illustrations/6_3_communes_eoliennes_coursdeau_fenetre.jpg" alt="Fenêtre de l'outil de sélection par localisation" width="600" >
						</a>
					</figure>
					<figure>
						<a href="illustrations/6_3_communes_eoliennes_coursdeau.jpg" >
							<img src="illustrations/6_3_communes_eoliennes_coursdeau.jpg" alt="communes avec éoliennes et cours d'eau sélectionnées" width="500" >
						</a>
					</figure>
					<p>Au final, 109 communes contiennent à la fois une éolienne et sont traversées par un cours d'eau de + de 100 km.</p>
				</div>
				<p>Le résultat serait le même en procédant à l'inverse, c'est-à-dire en sélectionnant d'abord les communes traversées par un cours d'eau puis à partir de cette sélection les communes contenant une éolienne.</p>
			
			
			<h3>Combiner requêtes spatiales et attributaires<a class="headerlink" id="VI33" href="#VI33"></a></h3>
			
				<p>Le principe est le même que précédemment. Sélectionnons par exemple les communes de + de 10&nbsp;000 habitants avec éolienne.</p>
				
				<div class="manip">
					<p>Commencez par sélectionner au moyen d'une requête attributaire les communes de + de 10&nbsp;000 habitants : <b>"POPULATION" > 10000</b>.</p>
					<p><b>37 communes</b> sont sélectionnées.</p>
					<p>Ensuite, au moyen d'une requête spatiale, sélectionnez parmi ces communes celles avec une éolienne, avec l'option <b>Sélection au sein de la sélection courante</b> :</p>
					<figure>
						<a href="illustrations/6_3_communes_sup10000_eoliennes_fenetre.jpg" >
							<img src="illustrations/6_3_communes_sup10000_eoliennes_fenetre.jpg" alt="outil de sélection" width="600" >
						</a>
					</figure>
					<p>Au final, <b>2 communes</b> restent sélectionnées : Lamballe-Armor et Pacé.</p>
					<figure>
						<a href="illustrations/6_3_communes_sup10000_eoliennes.jpg" >
							<img src="illustrations/6_3_communes_sup10000_eoliennes.jpg" alt="communes avec éolienne et cours d'eau" width="500" >
						</a>
					</figure>
					<p class="note">Pour connaître le nom des communes sélectionnées, ouvrez la table attributaire de la couche de communes et choisir <b>Ne montrer que les entités sélectionnées</b> dans la liste déroulante en bas à gauche de la table.</p>
				</div>
				
				<p>Il est aussi possible de procéder à l'inverse : sélectionner d'abord les communes avec éoliennes puis parmi celles-ci celles de + de 10&nbsp;000 habitants.</p>
				
				<p>Dans le chapitre suivant, nous verrons comment aller encore plus loin en écrivant directement des requêtes en langage SQL !</p>

				
				<br>
				<a class="prec" href="06_02_req_spatiales.php">chapitre précédent</a>
				<a class="suiv" href="06_04_req_sql.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_6.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
