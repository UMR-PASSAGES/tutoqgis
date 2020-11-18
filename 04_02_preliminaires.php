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
			<h2>IV.2  Géoréférencement : les préliminaires</h2>
				<ul class="listetitres">
					<li><a href="#IV21">Objectif</a></li>
					<li><a href="#IV22">Découverte de l'image à caler</a></li>
				</ul>
				<br>
				
			<h3><a class="titre" id="IV21">Objectif</a></h3>
	
    			<p>Notre but sera ici de caler une carte de l'île d'Oahu (Hawaii) de 1902 (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File%3A1902_Land_Office_Map_of_the_Island_of_Oahu%2C_Hawaii_(_Honolulu_)_-_Geographicus_-_OhauHawaii-lo-1902.jpg">Wikimedia</a>).</p>
    			<figure>
    				<a href="illustrations/tous/4_2_carte_oahu.jpg" >
    					<img src="illustrations/tous/4_2_carte_oahu.jpg" alt="carte à caler de l'île d'Oahu" width="80%">
    				</a>
    			</figure>
    			<p>Une fois cette carte calée, vous pourrez la superposer à d'autres données dans QGIS.</p>
    			<p>La première étape consiste à prendre connaissance de cette carte, et à vérifier que le module de géoréférencement de QGIS soit activé.</p>
			
			<h3><a class="titre" id="IV22">Découverte de l'image à caler</a></h3>			
			
				<p>Où se situe l'île d'Oahu? Rendez-vous par exemple sur Wikipedia pour le savoir : <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Oahu" >http://fr.wikipedia.org/wiki/Oahu</a>.</p>
				<div class="question">
					<input type="checkbox" id="faq-1">
					<p><label for="faq-1">Quelles sont les coordonnées de l'île d'Oahu&nbsp;? Dans quel SCR sont mesurées ces coordonnées&nbsp;?</label></p>
					<p class="reponse">L'île est située approximativement aux coordonnées 21° 28' Nord et 157° 59' Ouest (SCR WGS84).</p>
				</div>
				
				<p>A partir de l'explorateur de fichiers de votre ordinateur, ouvrez l'image <em class="data"><a href="donnees/TutoQGIS_04_Georef.zip">Oahu_Hawaiian_Islands_1906.jpg</a></em> située dans le dossier <b>TutoQGIS_04_Georef/donnees</b>.</p>
				<div class="question">
					<input type="checkbox" id="faq-2">
					<p><label for="faq-2">Pouvez-vous dire dans quel système sont mesurées les coordonnées de cette carte&nbsp;?</label></p>
					<p class="reponse">Aucune mention d'un SCR n'est faite sur cette carte. Nous pouvons néanmoins être sûr qu'il s'agit d'un système géographique (non projeté) puisque les coordonnées sont exprimées en degrés.</p>
					<p class="reponse">Connaître quel système a été utilisé ici nécessiterait des recherches, en se basant sur la date de la carte et la zone couverte. Nous allons supposer ici, pour les besoins de l'exercice, que les coordonnées sont en WGS84 (ce qui n'est évidemment pas le cas, ce système datant de 1984). Nous vérifierons que ce choix nous donne une précision acceptable.</p>
				</div>
				
				<br>
				<a class="prec" href="04_01_principe.php">chapitre précédent</a>
				<a class="suiv" href="04_03_calage_carroyage.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>				
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_4.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
