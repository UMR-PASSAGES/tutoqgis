<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">IV.  Géoréférencement</h1>
			<h2>IV.6 Points de calage : en se basant sur une couche de référence</h2>
				<ul class="listetitres">
					<li><a href="#IV61">Ajout d'un fonds OpenStreetMap</a></li>
					<li><a href="#IV62">Zoom sur la zone d'étude avec l'extension Nominatim Locator Filter</a></li>
					<li><a href="#IV63">Création des points de calage</a></li>
				</ul>
				<br>
			
				<p>Comme expliqué <a href="04_01_principe.php#IV12" >au début de cette partie sur le géoréférencement</a>, il est également possible de se baser sur une couche de référence pour géoréférencer une image.</p>
				<p>La manipulation sera la même que décrite dans les précédentes parties, sauf en ce qui concerne la création des points de calage. Seule cette partie sera donc décrite ici.</p>
				<p>L'image que nous allons caler est une carte de Doncaster East, dans la banlieue de Melbourne (source : <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File:Doncaster_east_locality_map.PNG">Wikimedia</a>).</p>
				<figure>
					<a href="illustrations/4_6_doncaster_east.jpg" >
						<img src="illustrations/4_6_doncaster_east.jpg" alt="Carte à caler de Doncaster East (Australie)" width="500">
					</a>
				</figure>
				<p>Pour caler cette carte, nous allons nous baser sur les données <a class="ext" target="_blank" href="http://www.openstreetmap.org/">OpenStreetMap</a>. OpenStreetMap est une base de données cartographique libre ; on décrit souvent ce projet comme un "wikipedia cartographique". Pour en savoir plus, voir aussi <a href="03_05_donnees_osm.php" >ici</a> !</p>
			
				<h3>Ajout d'un fonds OpenStreetMap<a class="headerlink" id="IV61" href="#IV61"></a></h3>
				
				    <p>2 méthodes permettant d'afficher un fonds OpenStreetMap sont décrites <a href="03_04_fonds_carte.php">ici</a>.</p>
				    
				    <div class="manip">
				        <p>Commencez par créer un nouveau projet QGIS, puis vous pouvez par exemple vous rendre dans le panneau Explorateur (s'il n'est pas déjà activé : menu Vue &#8594; Panneaux &#8594; Explorateur), rubrique <b>XYZ Tiles</b>, et double-cliquer sur le fonds <b>OpenStreetMap</b>.</p>
				        <figure>
        					<a href="illustrations/4_6_ajout_OSM.jpg" >
        						<img src="illustrations/4_6_ajout_OSM.jpg" alt="Panneau Explorateur, XYZ Tiles, OpenStreetMap" width="200">
        					</a>
        				</figure>
					
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Dans quel système de coordonnées est la couche OSM ?</label></p>
							<p class="reponse">Le <a href="02_03_couches_projets.php#II32">SCR de le couche</a> est le WGS84 projection Pseudo Mercator, EPSG:3857.</p>
						</div>
						<p>Si vous avez bien créé un nouveau projet avant d'ajouter le fonds OSM, le projet devrait également être en Pseudo-Mercator ; vérifiez que ce soit bien le cas et si besoin <a href="02_04_changer_systeme.php#II41">modifiez le SCR du projet</a>.</p>
						<p>Vous devez voir le SCR 3857 dans la barre en bas de la fenêtre de QGIS :</p>
            <figure>						
  						<a href="illustrations/4_6_scr_projet_3857.jpg" >
  						  <img src="illustrations/4_6_scr_projet_3857.jpg" alt="SCR du projet lisible dans la barre du bas de la fenêtre de QGIS (ici EPSG:3857)" width="620">
  					  </a>
  					</figure>
					</div>
				
				<h3>Zoom sur la zone d'étude avec l'extension Nominatim Locator Filter<a class="headerlink" id="IV62" href="#IV62"></a></h3>
				
				    <p>Nous cherchons ici à zoomer sur la zone qui concerne notre carte, à savoir Doncaster East dans le banlieue de Melbourne, en Australie. Il est bien sûr possible d'utiliser les outils de zoom pour cela, mais nous allons en profiter pour découvrir une autre méthode parfois bien pratique !
					
						<p>En bas à gauche de la fenêtre de QGIS se trouve une barre de recherche. Elle peut être utilisée pour de nombreuses recherches, par exemple pour trouver une couche chargée dans le projet, une entité dans une couche, un algorithme de traitement... mais aussi pour trouver un lieu, à la manière d'OpenStreetMap ou Google Maps.</p>
						
					<div class="manip">
						<p>Dans la barre de recherche, cliquez sur la loupe, sélectionnez <b>Géocodeur Nominatim</b>, ce qui affiche <b>> </b> dans la barre, puis tapez : <b>Doncaster East, Australia </b>.</p>
						<p>Double-cliquez sur la suggestion qui doit normalement apparaître : la carte est maintenant zoomée sur ce lieu.</p>
						<figure>
						  <a href="illustrations/4_6_osm_zoom1.jpg" >
							<img src="illustrations/4_6_osm_zoom1.jpg" alt="Données OSM : Melbourne" width="600">
						  </a>
						</figure>
					</div>
					
					<p>Vous pouvez aussi taper directement <b>> Doncaster East, Asutralia</b> dans la barre de recherche, sans sélectionner au préalable le géocodeur Nominatim. L'espace entre le caractère <b>></b> et le lieu est nécessaire.</p>
					
					<p class="note">Précédemment l'extension <em>Nominatim Locator Filter</em> était nécessaire pour la recherche de noms de lieux, mais depuis la version 3.20 cette fonctionnalité est directement incluse dans QGIS.</p>
					
					<div class="manip">
						<p>Votre carte dans QGIS devrait donc être approximativement centrée sur la zone de la carte à caler (pour vous aider : <a class="ext" target="_blank" href="http://www.openstreetmap.org/relation/2390038#map=13/-37.7776/145.1615" >carte OpenStreetMap de Doncaster Est</a>).</p>
						<figure>
							<a href="illustrations/4_6_osm_doncaster_east.jpg">
								<img src="illustrations/4_6_osm_doncaster_east.jpg" alt="Doncaster East : carte OSM avec zoom sur la zone de la carte à caler" width="250">
							</a>
							<a href="illustrations/4_6_Doncaster_east_locality_map.png">
								<img src="illustrations/4_6_Doncaster_east_locality_map.png" alt="Doncaster East : carte à caler" width="250">
							</a>
						</figure>
					</div>
					
					<p class="note">Savez-vous qu'il existe une version française de cette extension, <a class="ext" target="_blank" href="https://github.com/Oslandia/french_locator_filter" >French locator Filter</a>, basée sur l'API publique <a class="ext" target="_blank" href="https://geo.api.gouv.fr/adresse" >https://geo.api.gouv.fr/adresse</a> ?</p>
					<p>Nous allons maintenant pouvoir procéder à la création des points de calage.</p>
					
				<h3>Création des points de calage<a class="headerlink" id="IV63" href="#IV63"></a></h3>
					
					<div class="manip">
						<p>Ouvrez la fenêtre du géoréférenceur et ajoutez l'image à caler : <em class="data"><a href="donnees/TutoQGIS_04_Georef.zip">Doncaster_east_locality_map.PNG</a></em> située dans le dossier <b>TutoQGIS_04_Georef/donnees</b> (si nécessaire, aidez-vous pour cela <a href="04_03_calage_carroyage.php#IV31">du début de ce chapitre</a>).</p>
						<p class="note">Si QGIS vous demande dans quel SCR est cette image, choisissez le <b>WGS84 / Pseudo-Mercator EPSG:3857</b>.</p>
						<p>Cliquez sur une intersection de routes, par exemple entre Reynolds Road et Blackburn Road. La fenêtre de saisie des coordonnées apparaît : cliquez sur le bouton <b>Depuis le canevas de la carte</b>.</p>
						<figure>
							<a href="illustrations/4_6_depuis_canevas.jpg">
								<img src="illustrations/4_6_depuis_canevas.jpg" alt="fenêtre de saisie des coordonnées" width="500">
							</a>
						</figure>
						<p>Dans la fenêtre de QGIS, cliquez sur cette intersection sur les données OSM : les coordonnées de la fenêtre de saisie sont automatiquement remplies avec les coordonnées du point sur lequel vous venez de cliquer.</p>
						<figure>
							<a href="illustrations/4_6_coord_remplies.jpg">
								<img src="illustrations/4_6_coord_remplies.jpg" alt="les coordonnées sont remplies en fonction du point cliqué dans QGIS" width="500">
							</a>
						</figure>
						<p>Notez également que le SCR du projet est automatiquement sélectionné&nbsp;!</p>
						<p>Cliquez sur <b>OK</b>.</p>
						<figure>
							<a href="illustrations/4_6_point_0.jpg">
								<img src="illustrations/4_6_point_0.jpg" alt="point 0, dans la fenêtre du géoréférenceur et dans celle de QGIS" width="570">
							</a>
							<figcaption>Premier point : à gauche, dans la fenêtre de QGIS (données OSM) et à droite, dans la fenêtre du géoréférenceur.</figcaption>
						</figure>
						<p>Procédez de la même manière pour obtenir au moins six points de calage.</p>
						<p>Si vous avez besoin de <b>vous déplacer dans la fenêtre de QGIS avant de cliquer pour créer le point</b> : vous pouvez laisser la <b>barre d'espace</b> appuyée en bougeant la souris, et zoomer et dézoomer avec la molette, ou bien utiliser le clic-molette pour vous déplacer. Vous pouvez aussi sélectionner l'outil <b>Se déplacer dans la carte</b> (icône de main) ; dans ce cas, revenez ensuite à la fenêtre du géoréférenceur et cliquez à nouveau sur le bouton <b>Depuis le canevas de la carte</b> pour créer le point.</p>
						<p>Ensuite, choisissez les <a href="04_04_parametrage.php">paramètres du géoréférencement</a> : vous pouvez choisir les mêmes que précédemment, mais <b>n'oubliez pas de sélectionner le SCR WGS84 Pseudo-Mercator EPSG:3857 au lieu du WGS84 EPSG:4326</b>.</p>
						<p><a href="04_05_lancement.php">Lancez le calage</a>.</p>
						<p>Une fois le calage terminé, vous pouvez en vérifier la précision en donnant de la transparence à votre image calée (dans les propriétés de la couche, rubrique Transparence) :</p>
						<figure>
							<a href="illustrations/4_6_superposition.jpg">
								<img src="illustrations/4_6_superposition.jpg" alt="Superposition de l'image calée et des données OSM" width="500">
							</a>
						</figure>
					</div>
					<p>L'image est calée, son SCR est WGS84 Pseudo-Mercator (vous pouvez le vérifier en allant dans les propriétés de la couche, rubrique Général). Si vous désirez modifier le SCR de cette couche, comme indiqué dans la <a href="02_04_changer_systeme.php#II42">partie Géodésie : passer d'un système de coordonnées à un autre</a>, utilisez l'outil <b>Reprojeter une couche</b>.</p>
					<p>Vous arrivez au bout de cette partie sur le géoréférencement ! Un des objectifs de cette manip peut être de redessiner la couche calée dans une nouvelle couche vecteur, ce qui fait l'objet de la <a href="05_00_numerisation.php">partie suivante</a>.</p>
				<br>
				<a class="prec" href="04_05_lancement.php">chapitre précédent</a>
				<a class="suiv" href="05_00_numerisation.php">partie V : numérisation</a>
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
