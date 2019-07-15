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
				<p><a href="donnees/TutoQGIS_Donnees.zip">Toutes les données</a></p>
				<p><a href="donnees/TutoQGIS_01_PriseEnMain.zip">Données de la partie I : prise en main</a></p>
				<p><a href="donnees/TutoQGIS_02_Geodesie.zip">Données de la partie II : géodésie</a></p>
				<p><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">Données de la partie III : recherche et ajout de données</a></p>
				<p><a href="donnees/TutoQGIS_04_Georef.zip">Données de la partie IV : géoréférencement</a></p>
				<p><a href="donnees/TutoQGIS_05_Numerisation.zip">Données de la partie V : numérisation</a></p>
				<p><a href="donnees/TutoQGIS_06_Requetes.zip">Données de la partie VI : requêtes</a></p>
				<p><a href="donnees/TutoQGIS_07_Champs.zip">Données de la partie VII : calcul de champs</a></p>
				<p><a href="donnees/TutoQGIS_08_Jointures.zip">Données de la partie VIII : jointures</a></p>
				<p><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">Données de la partie IX : analyse spatiale</a></p>
				<p><a href="donnees/TutoQGIS_10_Representation.zip">Données de la partie X : représentation et mise en page</a></p>
				<p><a href="donnees/TutoQGIS_11_Automatisation.zip">Données de la partie XI : automatisation de traitements</a></p>
				
			<h2>Téléchargement du tutoriel au format PDF</h2>
				<p>Vous pouvez télécharger ici des PDF correspondant à la version en ligne du tutoriel QGIS. Ces PDF ont été générés grâce à l'outil <a class="ext" target="_blank" href="http://wkhtmltopdf.org/">wkhtmltopdf</a>.</p>
				<p>Attention, ces PDF étant des exports de la version en ligne, les mises à jour sont moins régulières et toutes les fonctionnalités ne seront pas affichées.</p>
				<p><a href="exports_pdf/tutoqgis.pdf">Tout le tutoriel au format PDF</a></p>
				<p><a href="exports_pdf/tuto01.pdf">PDF de la partie I : prise en main</a></p>
				<p><a href="exports_pdf/tuto02.pdf">PDF de la partie II : géodésie</a></p>
				<p><a href="exports_pdf/tuto03.pdf">PDF de la partie III : recherche et ajout de données</a></p>
				<p><a href="exports_pdf/tuto04.pdf">PDF de la partie IV : géoréférencement</a></p>
				<p><a href="exports_pdf/tuto05.pdf">PDF de la partie V : numérisation</a></p>
				<p><a href="exports_pdf/tuto06.pdf">PDF de la partie VI : requêtes</a> </p>
				<p><a href="exports_pdf/tuto07.pdf">PDF de la partie VII : calcul de champs</a></p>
				<p><a href="exports_pdf/tuto08.pdf">PDF de la partie VIII : jointures</a> </p>
				<p><a href="exports_pdf/tuto09.pdf">PDF de la partie IX : analyse spatiale</a></p>
				<p><a href="exports_pdf/tuto10.pdf">PDF de la partie X : représentation et mise en page</a></p>
				<p><a href="exports_pdf/tuto11.pdf">PDF de la partie XI : automatisation de traitements</a></p>

			
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
