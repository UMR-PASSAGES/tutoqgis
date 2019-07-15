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
			<h2>X.1  Traitement de base pour une seule couche</h2>
				
				<p>Il s'agit ici d'un rappel de la manipulation à effectuer pour découper une couche par une autre ; c'est ce traitement que nous allons ensuite automatiser.</p>
				<div class="manip">
					<p>Lancer QGIS et ouvrir le projet <em class='data'>visualisation.qgs</em> situé dans <b>TutoQGIS_11_automatisation/projets</b>.</p>
					<p>Vérifier que toutes les couches aient bien le même SCR.</p>
					<p>Pour découper la couche de routes par la commune : <b>menu Vecteur &#8594; Outils de géotraitement &#8594; Découper</b></p>
					<figure>
							<a href="illustrations/tous/11_01_decouper_fenetre.png" >
								<img src="illustrations/tous/11_01_decouper_fenetre.png" alt="Fenêtre de l'outil Découper" width="350">
							</a>
					</figure>
					<p>Une nouvelle couche est créée, qui ne contient que les portions de routes à l'intérieur de la commune.</p>
				</div>
				
				<br>
				<a class="prec" href="11_00_automatisation.php">chapitre précédent</a>
				<a class="suiv" href="11_02_par_lot.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

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
