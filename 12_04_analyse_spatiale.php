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
		
			<h2>XI.4  Analyse spatiale : exercices</h2>
			
			<div class="manip">
			
				<p>Vous disposez des couches :</p>
				<ul>
					<li class="espace"><em class="data">srtm_aqui.tif</em> : modèle d'élévation de l'Aquitaine</li>
					<li class="espace"><em class="data">routes_primaires_64.shp</em> : routes principales des Pyrénées-Atlantique</li>
					<li class="espace"><em class="data">chef_lieux_64.shp</em> : chef-lieux des communes des Pyrénées-Atlantique</li>
					<li class="espace"><em class="data">Natura2000_DO_Aquitaine.shp</em> : zones Natura 2000, Directive Oiseaux, pour l'Aquitaine</li>
				</ul>
				<br>
				<p>Pouvez-vous déterminer dans quelle zone pourra être implantée une nouvelle station de ski, sachant que cette station :</p>
				<ul>
					<li class="espace">doit être à moins de 5 Km à vol d'oiseau d'une route</li>
					<li class="espace">doit être à moins de 10 Km à vol d'oiseau d'un chef-lieu d'importance 4 ou moins (ce qui correspond à une ville de + de 1000 habitants)</li>
					<li class="espace">ne doit pas être en zone Natura 2000</li>
					<li class="espace">doit être implantée à une élévation supérieure à 1500 mètres ?</li>
				</ul>
			
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
