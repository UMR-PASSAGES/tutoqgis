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
			<h1>XI.  Automatisation de traitements</h1>
			<p>Cette onzième partie vous permettra d'aller plus loin dans votre utilisation de QGIS. Le but est ici de voir comment automatiser des traitements sous QGIS : par exemple, au lieu de découper une couche par une autre au moyen de l'outil découper, vous avez 30 couches à découper par une même autre.</p>
			<p>Nous allons utiliser 3 méthodes différentes pour cela.</p>
			<p>Notions abordées :</p>
				<ul>
					<li>Exécution d'un outil "par lot"</li>
					<li>Modeleur de traitement (graphical modeler)</li>
					<li>script Python</li>
				</ul>
			<p>Les données pour cette partie ainsi qu'une version PDF du tutoriel sont accessibles dans la rubrique <a href="telechargement.php"> téléchargement</a>.</p>
			<br>
			<a class="suiv" href="11_01_traitement_de_base.php">démarrer</a>
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_11.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
