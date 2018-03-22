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
			<h1>V.  Numérisation</h1>
			<p>La numérisation consiste à « dessiner » par exemple les contours de parcelles en se basant sur une couche déjà existante, ordinairement un raster. On obtient ainsi une couche vecteur, plus facilement exploitable. Le principe est le même que lorsqu'on superpose une feuille de papier calque à une carte pour y dessiner les éléments qui nous intéressent. Il est ensuite possible de lier des données attributaires à cette couche.</p>
			<p>Dans ce chapitre, nous allons numériser des données de la carte de l'île d'Oahu (Hawaii) de 1902 (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File%3A1902_Land_Office_Map_of_the_Island_of_Oahu%2C_Hawaii_(_Honolulu_)_-_Geographicus_-_OhauHawaii-lo-1902.jpg">Wikimedia</a> ) géoréférencée dans le chapitre précédent. Si vous ne l'avez pas géoréférencée, pas de problème : elle est inclue dans les données du chapitre.</p>
			<p>Notions abordées :</p>
				<ul>
					<li>Création d'une couche vide</li>
					<li>Numérisation de points, lignes et polygones</li>
					<li>Remplir les données attributaires</li>
					<li>Notions de topologie</li>
				</ul>
			<p>Les données pour cette partie ainsi qu'une version PDF du tutoriel sont accessibles dans la rubrique <a href="telechargement.php"> téléchargement</a>.</p>
			
			<br>
			<a class="suiv" href="05_01_creation_couche.php">démarrer</a>
				
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_5.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
