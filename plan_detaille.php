<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>

	<div id="container_main_sidebar">
		
		<div class="main">
		
			<h2>Plan détaillé</h2>
			
				<ol class="withroman">
				
					<li class="plandet"><a href="01_00_prise_en_main.php">Prise en main</a>
						<ol class="witharabic">
							<li><a href="01_01_SIG.php">Qu'est-ce qu'un SIG?</a></li>
							<li><a href="01_02_info_geo.php">Manipuler de l'information géographique</a></li>
							<li><a href="01_03_formats.php">Formats de données SIG</a></li>
							<li><a href="01_04_projets.php">Espace de travail (projet QGS)</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="02_00_geodesie.php">Géodésie</a>
						<ol class="witharabic">
							<li><a href="02_01_intro.php">Introduction à la géodésie</a>
							<li><a href="02_02_coord.php">Des coordonnées, oui mais dans quel système?</a></li>
							<li><a href="02_03_couches_projets.php">Couches et projets : à chacun son système</a></li>
							<li><a href="02_04_changer_systeme.php">Passer d'un système de coordonnées à un autre</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="03_00_recherche_ajout.php">Recherche et ajout de données</a>
						<ol class="witharabic">
							<li><a href="03_01_donnees_internet.php">Recherche de données SIG sur internet</a></li>
							<li><a href="03_02_donnees_flux.php">Ajout de données via des flux</a></li>
							<li><a href="03_03_donnees_XY.php">Ajout de données ponctuelles à partir d'un fichier texte</a></li>
							<li><a href="03_04_fonds_carte.php">Ajout d'un fonds de carte en ligne</a></li>
							<li><a href="03_05_donnees_osm.php">QGIS et OpenStreetMap</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="04_00_georeferencement.php">Géoréférencement</a>
						<ol class="witharabic">
							<li><a href="04_01_principe.php">Principe</a></li>
							<li><a href="04_02_preliminaires.php">Préliminaires</a></li>
							<li><a href="04_03_calage_carroyage.php">Avec un carroyage</a></li>
							<li><a href="04_04_parametrage.php">Paramétrage du géoréférenceur</a></li>
							<li><a href="04_05_lancement.php">Lancer le géoréférencement</a></li>
							<li><a href="04_06_calage_autre_couche.php">Avec une couche de référence</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="05_00_numerisation.php">Numérisation</a>
						<ol class="witharabic">
							<li><a href="05_01_creation_couche.php">Création d'une couche vide</a></li>
							<li><a href="05_02_points.php">Ajout de points</a></li>
							<li><a href="05_03_donnees_attrib.php">Données attributaires</a></li>
							<li><a href="05_04_lignes.php">Numériser des lignes</a></li>
							<li><a href="05_05_polygones.php">Numériser des polygones</a></li>
							<li><a href="05_06_topologie.php">Quelques notions de topologie</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="06_00_requetes.php">Requêtes</a>
						<ol class="witharabic">
							<li><a href="06_01_req_attrib.php">Requêtes attributaires</a></li>
							<li><a href="06_02_req_spatiales.php">Requêtes spatiales</a></li>
							<li><a href="06_03_req_combinees.php">Combiner des requêtes</a></li>
							<li><a href="06_04_req_sql.php">Requêtes SQL</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="07_00_champs.php">Calcul de champs</a>
						<ol class="witharabic">
							<li><a href="07_01_creation_suppression.php">Créer et supprimer des champs</a></li>
							<li><a href="07_02_calculer.php">Calcul de champ</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="08_00_jointures.php">Jointures</a>
						<ol class="witharabic">
							<li><a href="08_01_jointure_attrib.php">Jointures attributaires</a></li>
							<li><a href="08_02_jointure_spatiale.php">Jointures spatiales</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="09_00_analyse_spatiale.php">Analyse spatiale</a>
						<ol class="witharabic">
							<li><a href="09_01_vecteur.php">Opérations sur données vecteur</a></li>
							<li><a href="09_02_raster.php">Opérations sur données raster</a></li>
							<li><a href="09_03_vecteur_raster.php">Croiser vecteur et raster</a></li>
							<li><a href="09_04_maillage.php">Créer un maillage</a></li>
							<li><a href="09_05_maillage_sql.php">Dites-le avec du SQL !</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="10_00_carto.php">Représentation et mise en page</a>
						<ol class="witharabic">
							<li><a href="10_01_representation.php">Représentation</a></li>
							<li><a href="10_02_mise_en_page.php">Mise en page</a></li>
						</ol>
					</li>
					
					<li class="plandet"><a href="11_00_automatisation.php">Automatisation de traitements</a>
						<ol class="witharabic">
							<li><a href="11_01_traitement_de_base.php">Traitement de base</a></li>
							<li><a href="11_02_par_lot.php">Exécution d'un outil par lot</a></li>
							<li><a href="11_03_modeleur.php">Construire et utiliser un modèle</a></li>
							<li><a href="11_04_python.php">Comprendre et lancer un script Python</a></li>
						</ol>
					</li>
					
				</ol>

		
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux.inc.php'); ?>
		</div>	
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>



</div>
</body>
</html>
