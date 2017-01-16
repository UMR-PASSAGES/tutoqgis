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
		
			<h2>XI.2  Manipuler des données vecteur : exercices</h2>
			
			<div class="manip">
			
				<p>Ouvrez un nouveau projet QGIS. Ajoutez les couches <em class="data">COURD01_FR_WGS84.shp</em> et <em class="data">communes64_RGF93L93.shp</em>.</p>
				<div class="question">
					<input type="checkbox" id="faq-1">
					<p><label for="faq-1">Découpez les cours d'eau par les communes pour ne garder que les cours d'eau à l'intérieur des communes. Vérifiez le résultat obtenu.</label></p>
					<p class="reponse">Passez les deux couches dans le même SCR (<a href="02_04_changer_systeme.php#II42">Modifier le SCR d'une couche</a>). Supprimez l'ancienne couche. Utilisez ensuite <a href="09_01_vecteur.php#IX11a">l'outil de découpage</a>.</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-2">
					<p><label for="faq-2">Sélectionnez le cours d'eau dont le toponyme est « la Nive ». Créez une zone tampon d'1 km autour de ce cours d'eau.</label></p>
					<p class="reponse">Reportez-vous à la partie <a href="09_01_vecteur.php#IX12">Création d'une zone tampon</a>.</p>
				</div>
	
				<div class="question">
					<input type="checkbox" id="faq-3">
					<p><label for="faq-3">Ajoutez un champ surface à la couche communes, dans lequel vous calculerez la surface de chaque commune en km².</label></p>
					<p class="reponse">Reportez-vous à la partie <a href="07_03_calculer.php#VII32a">Calcul de la surface</a>.</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-4">
					<p><label for="faq-4">Intersectez la couche de communes avec la zone tampon.</label></p>
					<p class="reponse">Reportez-vous à la partie <a href="09_01_vecteur.php#IX13b">Intersection</a>. Attention, les deux couches doivent être dans le même SCR !</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-5">
					<p><label for="faq-5">Pour chaque commune, calculez le pourcentage de cette commune dans la zone tampon.</label></p>
					<p class="reponse">Dans la couche résultat de l'intersection, créez un nouveau champ et remplissez-le avec la formule ($area / 1000000) / $le_champ_surface_calculé_précédemment * 100. Pour joindre ce résultat à la couche de communes, reportez-vous à la partie <a href="08_01_jointure_attrib.php#VIII12">Jointure attributaire</a></p>
				</div>
			
			</div>
			
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
