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
			<h2>II.3  Couches et projets : à chacun son système</h2>
				<ul class="listetitres">
					<li><a href="#II31">SCR du projet</a></li>
					<li><a href="#II32">SCR d'une couche</a></li>
					<li><a href="#II33">Projection à la volée</a></li>
				</ul>
				
				
			<h3>SCR du projet<a class="headerlink" id="II31" href="#II31"></a></h3>
					
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/1_4_ouvrir_projet_icone.png" alt="Icône Ouvrir">A partir de QGIS, ouvrez le projet <em class="data"><a href="donnees/TutoQGIS_02_Geodesie.zip">regions_france.qgz</a></em> situé dans le dossier <b>TutoQGIS_02_geodesie/projets</b>.</p>
					<p>Toutes les couches chargées dans ce projet seront <b>affichées</b> dans le SCR du projet. Quel est ce SCR ? Trois manières pour accéder à cette information :</p>
					<ul>
						<li>
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Propriétés...
									<span>
										<img src="illustrations/tous/2_3_proprietes_projet_menu.png" alt="Menu Projet, Propriétés du projet" height="350" >
									</span>
							</a>
						 , rubrique SCR</li>
						<li>Icône <b>SCR actuel</b> tout en bas à droite de la fenêtre de QGIS <img class="iconemid" src="illustrations/tous/2_3_scr_projet_icone.png" alt="icône SCR actuel" ></li>
						<li>raccourci clavier <b>Ctrl+Maj+P &#8594; rubrique SCR</b></li>
					</ul>
				</div>
				
				<p>La fenêtre suivante s'ouvre :</p>
				<figure>
					<a href="illustrations/tous/2_3_scr_projet.png" >
						<img src="illustrations/tous/2_3_scr_projet.png" alt="fenêtre SCR du projet" width="600">
					</a>
				</figure>
				
				<p><em class="numero">1. </em><b>Aucune projection</b> : cette case à cocher permet de visualiser facilement si les différentes couches d'un projet utilisent des SCR différents.</p>
				<p><em class="numero">2. </em><b>Partie "Filtre"</b> : vous pouvez taper ici un code ou un nom pour rechercher un SCR précis.</p>
				<p><em class="numero">3. </em><b>SCR récemment utilisés</b> (cette partie peut être vide). Cette liste permet d'accéder facilement aux SCR que vous utilisez souvent.</p>
				<p><em class="numero">4. </em><b>Liste de tous les SCR disponibles dans QGIS</b>. Ils sont classés selon 3 grandes rubriques : systèmes de coordonnées géographiques, systèmes de coordonnées projetés et systèmes de coordonnées définis par l'utilisateur (soit qu'ils aient été créés par vous-même, soit qu'ils aient été lus par QGIS dans une couche).</p>
				<p><em class="numero">5. </em><b>SCR actuellement utilisé par le projet</b> avec sa définition dans 2 formats, WKT et Proj4, et sa zone d'application (également visible dans la carte à droite)</p>
				
				<p>La rubrique SCR de la fenêtre des propriétés du projet permet donc de modifier le système de coordonnées du projet, ou bien simplement de vérifier quel est ce système, ce que nous nous bornerons à faire pour le moment.</p>
				<div class="manip">			
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">A votre avis, quel est le SCR du projet ?</label></p>
						<p class="reponse">Le projet est en WGS84, comme indiqué dans la partie <em class="numero">5</em> de la fenêtre.</p>
					</div>
				</div>
				
				<p>Notez également que le <a href="02_02_coord.php#II21b">code EPSG</a> du SCR du projet est indiqué tout en bas à droite de la fenêtre de QGIS, dans la <a href="01_02_info_geo.php#I22">barre d'état de QGIS</a>.</p>
				<figure>
					<a href="illustrations/tous/2_3_barre_etat_scr.png" >
						<img src="illustrations/tous/2_3_barre_etat_scr.png" alt="Indication du code du SCR dans la barre d'état" width="640">
					</a>
				</figure>
			
			<h3>SCR d'une couche<a class="headerlink" id="II32" href="#II32"></a></h3>
			
				<div class="manip">
					<p>Nous allons maintenant nous poser la question de savoir dans quel SCR est la couche <em class="data">REGION</em>.</p>
					<p>Ouvrez les propriétés de cette couche (double clic sur le nom de la couche) et allez dans la rubrique <b>Information</b>.</p>			
					<figure>
						<a href="illustrations/tous/2_3_scr_couche.png" >
							<img src="illustrations/tous/2_3_scr_couche.png" alt="Fenêtre Propriétés d'une couche, rubrique Général, lire le SCR" width="600" >
						</a>
						<figcaption>Lire le SCR d'une couche.</figcaption>
					</figure>
				
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">A votre avis, quel est le SCR de la couche <em class="data">REGION</em> ?</label></p>
						<p class="reponse">Cette couche est en RGF93 / Lambert-93, code EPSG 2154.</p>
					</div>
				</div>
			
				<p>Vous avez donc pu constater que notre projet et la couche qui y est présente ont deux SCR différents. Comment cela est-il possible ?</p>		
			
			<h3>Projection à la volée<a class="headerlink" id="II33" href="#II33"></a></h3>
			
				<p>La <b>projection à la volée</b> est une fonctionnalité qui permet d'afficher des couches dans un autre SCR que le leur, le SCR du projet.</p>
				<p>Ainsi, la couche <em class="data">REGION</em> est affichée en WGS84 bien que son SCR soit le RGF93 Lambert93. Il s'agit bien uniquement d'une question d'affichage, le SCR de la couche n'est pas modifié.</p>
				<p>Depuis la version 3 de QGIS, <b>il n'est plus possible de désactive la projection à la volée</b>. <b>Toutes les couches sont donc toujours affichées dans le SCR du projet</b>.</p>
				<p>Il est donc possible de superposer plusieurs couches dans des SCR différents. C'est ce que nous allons vérifier!</p>
				<div class="manip">
    				<p>Ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_02_Geodesie.zip">ne_110m_admin_0_countries.shp</a></em> au projet. Vérifiez son SCR. Les deux couches doivent se superposer correctement (même si elles ont des niveaux de généralisation différents, elles ne présentent pas de décalage l'une par rapport à l'autre).</p>
    			    <figure>
						<a href="illustrations/tous/2_3_superposition_couches.png" >
							<img src="illustrations/tous/2_3_superposition_couches.png" alt="Superposition des 2 couches France et monde" width="600" >
						</a>
					</figure>
    			</div>
				
				<br>
				<a class="prec" href="02_02_coord.php">chapitre précédent</a>
				<a class="suiv" href="02_04_changer_systeme.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_2.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>
	
</div>
</body>
</html>
