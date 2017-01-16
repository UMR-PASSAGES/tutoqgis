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
			<h1>III.  Recherche et ajout de données</h1>
			<p>Vous avez maintenant vos premières bases sous SIG, et les systèmes de coordonnées n'ont plus de secrets pour vous... Il est temps de s'attaquer à une question cruciale en SIG : comment trouver des données ?</p>
			<p>Selon votre problématique et votre zone d'étude, les réponses seront bien sûr très différentes. Nous vous fournirons ici quelques pistes, à vous d'aller plus loin !</p>
			<p>Notions abordées :</p>
				<ul>
					<li>télécharger des données sur internet</li>
					<li>flux WMS et WFS</li>
					<li>données XY</li>
				</ul>
			<p>Les données pour cette partie ainsi qu'une version PDF du tutoriel sont accessibles dans la rubrique <a href="telechargement.php"> téléchargement</a>.</p>
			
			<br>
			<a class="suiv" href="03_01_donnees_internet.php">démarrer</a>
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_3.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
