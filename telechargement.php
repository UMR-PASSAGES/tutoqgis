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
			<h2>Téléchargement des données</h2>
				<p>Les données nécessaires au tutoriel sont des données libres d'accès.</p>
				<p>Chaque dossier contient :</p>
				<ul>
					<li class="espace">un sous-dossier <b>donnees</b>, avec les données elles-mêmes</li>
					<li class="espace">éventuellement un sous-dossier <b>projets</b> contenant des projets QGIS</li>
					<li class="espace">un sous-dossier <b>liste_donnees</b>, avec la liste des données, le nom de l'organisme qui les a produites, son site internet, et si possible le lien vers les <a href="01_01_SIG.php#I12d" >métadonnées</a>, ou à défaut le nom du fichier de métadonnées</li>
					<li class="espace">un sous-dossier <b>metadonnees</b>, avec les fichier de métadonnées. Si toutes les métadonnées sont disponibles en ligne, ce sous-dossier n'existe pas.</li>
				</ul>
				<p>Vous pouvez télécharger ici :</p>
				<p><a download href="donnees/TutoQGIS_Donnees.zip">Toutes les données (282,4 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_01_PriseEnMain.zip">Données de la partie I : prise en main (13,1 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_02_Geodesie.zip">Données de la partie II : géodésie (2,8 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_03_RechercheDonnees.zip">Données de la partie III : recherche et ajout de données (47,6 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_04_Georef.zip">Données de la partie IV : géoréférencement (7,7 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_05_Numerisation.zip">Données de la partie V : numérisation (20,3 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_06_Requetes.zip">Données de la partie VI : requêtes (9,6 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_07_Champs.zip">Données de la partie VII : calcul de champs (6,3 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_08_Jointures.zip">Données de la partie VIII : jointures (85,5 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_09_AnalyseSpat.zip">Données de la partie IX : analyse spatiale (29,8 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_10_Representation.zip">Données de la partie X : représentation et mise en page (59,7 Mo)</a></p>
				<p><a download href="donnees/TutoQGIS_11_Automatisation.zip">Données de la partie XI : automatisation de traitements (0,6 Mo)</a></p>
				
			<h2>Téléchargement du tutoriel au format PDF</h2>
				<p>Vous pouvez télécharger ici des PDF correspondant à la version en ligne du tutoriel QGIS. Ces PDF ont été générés grâce à l'outil <a class="ext" target="_blank" href="http://wkhtmltopdf.org/">wkhtmltopdf</a>.</p>
				<p>Attention, ces PDF étant des exports de la version en ligne, les mises à jour sont moins régulières et toutes les fonctionnalités ne seront pas affichées.</p>
				<p><a download href="exports_pdf/tutoqgis.pdf">Tout le tutoriel au format PDF (38,9 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_01_priseenmain.pdf">PDF de la partie I : prise en main (3 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_02_geodesie.pdf">PDF de la partie II : géodésie (2,3 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_03_recherche_donnees.pdf">PDF de la partie III : recherche et ajout de données (5 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_04_georeferencement.pdf">PDF de la partie IV : géoréférencement (5,2 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_05_numerisation.pdf">PDF de la partie V : numérisation (5,5 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_06_requetes.pdf">PDF de la partie VI : requêtes (3,3 Mo)</a> </p>
				<p><a download href="exports_pdf/tutoqgis_07_calcul_champs.pdf">PDF de la partie VII : calcul de champs (1,6 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_08_jointures.pdf">PDF de la partie VIII : jointures (2,3 Mo)</a> </p>
				<p><a download href="exports_pdf/tutoqgis_09_analyse_spatiale.pdf">PDF de la partie IX : analyse spatiale (6,4 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_10_miseenpage.pdf">PDF de la partie X : représentation et mise en page (4,5 Mo)</a></p>
				<p><a download href="exports_pdf/tutoqgis_11_automatisation.pdf">PDF de la partie XI : automatisation de traitements (1,4 Mo)</a></p>

			    <br>
			    
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
