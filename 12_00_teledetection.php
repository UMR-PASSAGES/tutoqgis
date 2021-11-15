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
			<h1>XII.  Télédétection</h1>
			<p>Cette douzième partie aborde la télédétection.</p>
			<p>Notions abordées :</p>
				<ul>
					<li>Caractéristiques spectrales, spatiales, radiométriques et temporelles associées à une image satellitaire</li>
					<li>Interprétation d'une image satellitaire, extraction de l’information spatiale et spectrale</li>
					<li>Extraction des signatures spectrales d’objets géographiques sur une image satellitaire</li>
					<li>Extraction et analyse des indices spectraux NDVI (Normalized Diference Vegetation Indes) et NBR (Normalized Burn Ratio)</li>
					<li>Métadonnées d'une image satellitaire</li>
					<li>Classification non supervisée</li>
					<li>Classification supervisée avec échantillonnage terrain au moyen de différents algorithmes : bayésiens, machine learning (SVM, Random Forest, réseaux de neurones...) et Deep Learning</li>
				</ul>
			<p>Les données pour cette partie ainsi qu'une version PDF du tutoriel sont accessibles dans la rubrique <a href="telechargement.php"> téléchargement</a>.</p>
			<br>
			<a class="suiv" href="12_01_intro_teledec.php">démarrer</a>
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_12.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
