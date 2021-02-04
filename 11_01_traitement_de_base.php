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
			<h2>XI.1  Traitement de base pour une seule couche</h2>
				
				<p>Nous allons (re)voir ici une manipulation simple&nbsp;: comment <a href="09_01_vecteur.php#IX11">découper une couche par une autre</a>.</p>
				<p>Nous verrons dans les chapitres suivants comment <b>automatiser ce traitement</b>, pour par exemple découper rapidement 10 couches par une autre.</p>
				
				<div class="manip">
					<p>Lancer QGIS et ouvrir le projet <em class='data'><a href="donnees/TutoQGIS_11_Automatisation.zip">decoupe.qgz</a></em> situé dans <b>TutoQGIS_11_automatisation/projets</b>.</p>
					<p>Ce projet contient une couche correspondant aux limites communales de la commune de Sainte-Radégonde, ainsi que 4 autres couches de lieux, routes, espaces naturels et bâtiments.</p>
					<figure>
							<a href="illustrations/tous/11_01_projet.png" >
								<img src="illustrations/tous/11_01_projet.png" alt="Aperçu du projet decoupe.qgz" width="100%">
							</a>
					</figure>
					<div class="question">
                		<input type="checkbox" id="faq-1">
                		<p><label for="faq-1">Vérifier que toutes les couches aient bien le même SCR. Quel est ce SCR&nbsp;?</label></p>
                		<p class="reponse">En allant dans les propriétés de chaque couche, rubrique Source, on peut constater qu'elles sont toutes en RGF93/Lambert 93, code EPSG 2154.</p>
                	</div>
                	
					<p>Pour découper la couche de routes par la commune :
					   <a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; Recouvrement de vecteur &#8594; Couper
                        	<span>
                        		<img src="illustrations/tous/11_01_couper_menu.png" alt="Emplacement de l'outil Couper dans la boîte à outils" width="100%" >
                        	</span>
                        </a> 
					</p>
					<figure>
							<a href="illustrations/tous/11_01_decouper_fenetre.png" >
								<img src="illustrations/tous/11_01_decouper_fenetre.png" alt="Fenêtre de l'outil Couper" width="100%">
							</a>
					</figure>
					<p>Une nouvelle couche temporaire est créée, qui ne contient que les portions de routes à l'intérieur de la commune.</p>
				</div>
				
				<p>Comment faire maintenant pour découper les 4 couches par la commune, sans répéter 4 fois cette opération&nbsp;?</p>
				
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
