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
			<h2>VI.3  Combiner des requêtes</h2>
				<ul class="listetitres">
					<li><a href="#VI31">Combiner deux requêtes attributaires</a></li>
					<li><a href="#VI32">Combiner deux requêtes spatiales</a></li>
					<li><a href="#VI33">Combiner requêtes spatiales et attributaires</a></li>
				</ul>
				<br>
				
			<p>Comment faire quand on souhaite combiner plusieurs requêtes, par exemple sélectionner les communes traversées par un cours d'eau et ayant une population de + de 10 000 habitants ?</p>
			
			<h3><a class="titre" id="VI31">Combiner deux requêtes attributaires</a></h3>
			
				<p>Pour combiner deux requêtes attributaires (par exemple les communes de + de 10 000 habitants du département du Pas-de-Calais), nous avons vu dans la <a href="06_01_req_attrib.php#VI14" >partie VI.1.4</a> qu'il est possible d'utiliser les opérateurs AND et OR.</p>
				<p>Il est également possible de faire deux requêtes successives.</p>
				
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche <em class="data">communes_NordPasDeCalais</em>.</p>
					<p><img class="iconemid" src="illustrations/tous/6_3_selection_attrib_icone.png" alt="icône de sélection attributaire" >Ouvrez la table attributaire de cette couche puis la fenêtre de requête attributaire.</p>
					<p>Sélectionnez tout d'abord les communes de + de 10 000 habitants au moyen d'une requête attributaire :</p>
					<p> "POPULATION" > 10</p>
					<figure>
						<a href="illustrations/tous/6_3_sup10000hab.png" >
							<img src="illustrations/tous/6_3_sup10000hab.png" alt="Communes de + de 10 000 habitants sélectionnées" width="400" >
						</a>
					</figure>
					<p>Tapez ensuite la requête suivante, pour sélectionner les communes du Pas-de-Calais...</p>
					<p> "NOM_DEPT"  =  'PAS-DE-CALAIS' </p>
					<p>...Mais cette fois-ci, au lieu de cliquer sur <b>Sélection</b>, sélectionnez dans la liste <b>Sélectionner depuis la sélection</b> :</p>
					<figure>
						<img src="illustrations/tous/6_3_selection_liste.png" alt="liste accessible à partir du bouton sélection" width="270" >
					</figure>
					<p>Ainsi, cette deuxième requête s'appliquera uniquement aux communes déjà sélectionnées : les communes du Pas-de-Calais seront sélectionnées parmi les communes de + de 10 000 habitants.</p>
					<figure>
						<a href="illustrations/tous/6_3_sup10000hab_NPDC.png" >
							<img src="illustrations/tous/6_3_sup10000hab_NPDC.png" alt="Communes de + de 10 000 habitants et du département du Pas-de-Calais sélectionnées" width="400" >
						</a>
					</figure>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Pouvez-vous au moyen des mêmes 2 requêtes ("POPULATION" > 10 et "NOM_DEPT"  =  'PAS-DE-CALAIS') sélectionner les communes de + de 10 000 habitants du département du Nord ?</label></p>
						<p class="reponse">Utilisez cette fois pour la deuxième requête le bouton <b>Enlever de la sélection</b> : les communes du Pas-de-Calais seront désélectionnées et il ne restera de sélectionnées que les communes de + de 10 000 habitants du Nord.</p>
					</div>
				</div>
			
			
			
			<h3><a class="titre" id="VI32">Combiner deux requêtes spatiales</a></h3>
			
				<p>Comment faire maintenant pour combiner deux requêtes spatiales, par exemple pour sélectionner les communes avec installation et cours d'eau ?</p>
				
				<div class="manip">
					<p>Connectez-vous au flux WFS <b>http://ws.carmen.developpement-durable.gouv.fr/WFS/24/profil_env?</b> et ajoutez la couche <em class="data">Installations de traitement de déchêts</em>.</p>
					<p>Connectez-vous au flux WFS <b>http://services.sandre.eaufrance.fr/geo/zonage</b> et ajoutez la couche <em class="data ">CoursEau1</em> correspondant aux cours d'eau de + de 100 km.</p>
					<p>Menu <b>Vecteur &#8594; Requête spatiale &#8594; Requête spatiale</b> : sélectionnez les
						<a class="thumbnail_bottom" href="#thumb">communes avec installation(s)
							<span>
								<img src="illustrations/tous/6_2_req_spatial_fenetre.png" alt="Fenêtre de requête spatiale : sélection des communes avec installation" height="400" >
							</span>
						</a>
					.</p>
					<figure>
						<a href="illustrations/tous/6_3_communes_installations.png" >
							<img src="illustrations/tous/6_3_communes_installations.png" alt="communes avec installation(s)) sélectionnées" width="450" >
						</a>
					</figure>
					<p>Une fois cette requête effectuée, la case <b>selected geometries</b> (74 dans notre cas) est automatiquement cochée. En laissant cette case cochée, la requête suivante ne portera que sur les communes avec installation. Il ne vous reste donc plus qu'à sélectionner les communes avec cours d'eau :</p>
					<figure>
						<a href="illustrations/tous/6_3_communes_inters_CE.png" >
							<img src="illustrations/tous/6_3_communes_inters_CE.png" alt="Fenêtre de requête spatiale : sélection à partir des communes avec installation des communes avec cours d'eau" width="330" >
						</a>
					</figure>
					<p>Au final, les 40 communes sélectionnées sont donc celles avec installation et cours d'eau :</p>
					<figure>
						<a href="illustrations/tous/6_3_communes_installations_CE.png" >
							<img src="illustrations/tous/6_3_communes_installations_CE.png" alt="communes avec installation et cours d'eau sélectionnées" width="420" >
						</a>
					</figure>
				</div>
			
			
			<h3><a class="titre" id="VI33">Combiner requêtes spatiales et attributaires</a></h3>
			
				<p>Le principe est le même que précédemment. Sélectionnons par exemple les communes de moins de 100 habitants avec installation.</p>
				
				<div class="manip">
					<p>Commencez par sélectionner au moyen d'une requête attributaire les communes de moins de 100 habitants : <b>"POPULATION" &lt; 0.1</b>. Onze communes sont sélectionnées.</p>
					<p>Ensuite, au moyen d'une requête spatiale, sélectionnez parmi ces communes celles avec installation :</p>
					<figure>
						<a href="illustrations/tous/6_3_communes_inf100hab_installation.png" >
							<img src="illustrations/tous/6_3_communes_inf100hab_installation.png" alt="communes avec installation et cours d'eau sélectionnées" width="300" >
						</a>
					</figure>
					<p>Au final, une seule commune reste sélectionnée : Riencourt-Les-Bapaumes dans le Pas-de-Calais.</p>
				</div>
				
				<p>Il est aussi possible de procéder à l'inverse : sélectionner d'abord les communes avec installations puis parmi celles-ci celles de moins de 100 habitants.</p>
				
				<div class="manip">
					<p><img class="iconemid" src="illustrations/tous/6_3_deselection_icone.png" alt="icône de désélection" >Désélectionnez toutes les communes.</p>
					<p>Au moyen d'une requête spatiale, sélectionnez toutes les communes avec installation : 74 communes sont sélectionnées.</p>
					<p>Il ne reste plus ensuite qu'à sélectionner en utilisant l'option <b>Depuis la sélection</b> les communes de moins de 100 habitants : la commune de Riencourt reste la seule sélectionnée.</p>
				</div>
			
				
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
