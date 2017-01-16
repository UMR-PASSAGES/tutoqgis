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
		
			<h2>XI.1  Géodésie : exercices</h2>
			
			<div class="manip">
			
				<p>Créez un nouveau projet. Chargez les couches <em class="data">communes33_IGN.shp</em> et <em class="data">France_RGF93.shp</em>.</p>
				<div class="question">
					<input type="checkbox" id="faq-1">
					<p><label for="faq-1">Quel est le système de chacune de ces couches ?</label></p>
					<p class="reponse">La couche <em class="data">communes33_IGN.shp</em> est dans le système NTF projection Lambert Zone II (code EPSG 27572) et la couche <em class="data">France_RGF93.shp</em> dans le système RGF93 projection Lambert 93 (code EPSG 2154).</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-2">
					<p><label for="faq-2">Faites en sorte qu'elles se superposent correctement, sans changer le système des couches.</label></p>
					<p class="reponse">Si besoin, activez la projection à la volée, et modifiez l'ordre des couches.</p>
				</div>
	
				<div class="question">
					<input type="checkbox" id="faq-3">
					<p><label for="faq-3">Passez ensuite ces deux couches dans le même système de coordonnées et la même projection, ainsi que le projet.</label></p>
					<p class="reponse">Si l'on choisit le SCR RGF93/Lambert93 : clic droit sur la couche de communes, sauvegarder sous... en sélectionnant le SCR RGF93/Lambert93. Puis pour le projet : clic droit sur la couche <em class="data">France_RGF93.shp</em>, définir le SCR du projet depuis cette couche.</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-4">
					<p><label for="faq-4">Ajoutez la couche <em class="data">Monde_FAO.shp</em>. Quel est le système de cette couche ?</label></p>
					<p class="reponse">WGS84, code EPSG 4326</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-5">
					<p><label for="faq-5">Choisissez un système qui vous permettra de travailler avec les 3 couches <em class="data">communes33_IGN.shp</em>, <em class="data">France_RGF93.shp</em> et <em class="data">Monde_FAO.shp</em>. Passez ensuite les 3 couches dans ce système, ainsi que le projet.</label></p>
					<p class="reponse">Ni le NTF/Lambert zone II ni le RGF93/Lambert 93 ne permettront de travailler avec la couche <em class="data">Monde_FAO.shp</em> car ce sont des systèmes locaux adaptés à la France. Il faut donc choisir le WGS84, et procéder de la même manière que pour la troisième question.</p>
				</div>
				
				<div class="question">
					<input type="checkbox" id="faq-6">
					<p><label for="faq-6">Ajoutez la couche <em class="data">regions.shp</em>. Parviendrez-vous à ce que cette couche se superpose correctement aux autres couches ? (+ difficile!)</label></p>
					<p class="reponse">Le SCR de la couche de régions est mal défini. Il faut essayer d'autres SCR jusqu'à obtenir une superposition correcte; le bon SCR est le RGF93/Lambert93 (menu vecteur, outils de gestion de données, définir la projection courante).</p>
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
