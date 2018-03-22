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
				
				
			<h3><a class="titre" id="II31">SCR du projet</a></h3>
					
				<div class="manip">
					<p>A partir de QGIS,
						<a class="thumbnail_bottom" href="#thumb">ouvrez le projet
								<span>
									<img src="illustrations/tous/1_4_ouvrir_projet_menu.png" alt="Menu Projet, Ouvrir" height="300" >
								</span>
						</a>
						<em class="data">regions_france.qgs</em> situé dans le dossier <b>TutoQGIS_02_geodesie/projets</b>.</p>
					<p>Toutes les couches chargées dans ce projet seront <b>affichées</b> dans le SCR du projet. Quel est ce SCR ? Trois manières pour accéder à cette information :</p>
					<ul>
						<li>
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Propriétés du projet...
									<span>
										<img src="illustrations/tous/2_3_proprietes_projet_menu.png" alt="Menu Projet, Propriétés du projet" height="300" >
									</span>
							</a>
						 , rubrique SCR</li>
						<li>Icône <b>statut de la projection</b> tout en bas à droite de la fenêtre de QGIS <img class="iconemid" src="illustrations/tous/2_3_scr_projet_icone.png" alt="icône statut de la projection" ></li>
						<li>raccourci clavier <b>Ctrl+Maj+P &#8594; rubrique SCR</b></li>
					</ul>
				</div>
				
				<p>La fenêtre suivante s'ouvre :</p>
				<figure>
					<a href="illustrations/tous/2_3_scr_projet.png" >
						<img src="illustrations/tous/2_3_scr_projet.png" alt="fenêtre SCR du projet" height="450">
					</a>
				</figure>
				
				<p><em class="numero">1. </em><b>Projection à la volée</b> : cette fonctionnalité sera décrite dans la partie <a href="#II33">Projection à la volée</a>.</p>
				<p><em class="numero">2. </em><b>Partie "recherche"</b> : vous pouvez taper ici un code ou un nom pour rechercher un SCR précis.</p>
				<p><em class="numero">3. </em><b>Liste des derniers SCR utilisés</b> (cette partie peut être vide). Cette liste permet d'accéder facilement aux SCR que vous utilisez souvent.</p>
				<p><em class="numero">4. </em><b>Liste de tous les SCR disponibles dans QGIS</b>. Ils sont classés selon 3 grandes rubriques : systèmes de coordonnées géographiques, systèmes de coordonnées projetés et systèmes de coordonnées définis par l'utilisateur (soit qu'ils aient été créés par vous-même, soit qu'ils aient été lus par QGIS dans une couche).</p>
				<p><em class="numero">5. </em><b>SCR actuellement utilisé par le projet</b></p>
				
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
			
			<h3><a class="titre" id="II32">SCR d'une couche</a></h3>
			
				<div class="manip">
					<p>Nous allons maintenant nous poser la question de savoir dans quel SCR est la couche <em class="data">Reg_France_Geofla_L93.</em></p>
					<p>Ouvrez les propriétés de cette couche (double clic sur le nom de la couche) et allez dans la rubrique <b>Général</b>.</p>			
					<figure>
						<a href="illustrations/tous/2_3_scr_couche.png" >
							<img src="illustrations/tous/2_3_scr_couche.png" alt="Fenêtre Propriétés d'une couche, rubrique Général, lire le SCR" height="440" >
						</a>
						<figcaption>Lire le SCR d'une couche.</figcaption>
					</figure>
				
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">A votre avis, quel est le SCR de la couche <em class="data">Reg_France_Geofla_L93</em> ?</label></p>
						<p class="reponse">Cette couche est en RGF93 / Lambert-93, code EPSG 2154.</p>
					</div>
				</div>
			
				<p>Vous avez donc pu constater que notre projet et la couche qui y est présente ont deux SCR différents. Comment cela est-il possible ?</p>		
			
			<h3><a class="titre" id="II33">Projection à la volée</a></h3>
			
				<p>La <b>projection à la volée</b> est une fonctionnalité qui permet d'afficher des couches dans un autre SCR que le leur, le SCR du projet.</p>
				<p>Ainsi, la couche <em class="data">Reg_France_Geofla_L93</em> est affichée en WGS84 bien que son SCR soit le RGF93 Lambert93. Il s'agit bien uniquement d'une question d'affichage, le SCR de la couche n'est pas modifié.</p>
				<p>A partir du moment où la projection à la volée est activée dans un projet, toutes les couches affichées dans ce projet le seront dans le SCR du projet.</p>
				<p>Il est donc possible de superposer plusieurs couches dans des SCR différents. C'est ce que nous allons vérifier!</p>
				<div class="manip">
    				<p>Ajoutez la couche <em class="data">ne_110m_admin_0_countries.shp</em> au projet. Vérifiez son SCR. Les deux couches doivent se superposer correctement (même si elles ont des niveaux de généralisation différents) ; si ce n'est pas le cas vérifiez que la projection à la volée soit bien activée :</p>
    				<ul>
    				    <li class="espace">consultez le <a href="#II31">SCR du projet</a> : <b>menu Projet &#8594; Propriétés du projet &#8594; rubrique SCR</b></li>
    				    <li class="espace">cochez si nécessaire la case <b>Activer la projection à la volée</b> en haut de la fenêtre.</li>
    				</ul>
    				<p>La projection à la volée peut être activée ou désactivée par défaut :
						<a class="thumbnail_bottom" href="#thumb">Menu Préférences &#8594; Options
							<span>
								<img src="illustrations/tous/2_3_preferences_options_menu.png" alt="Menu Préférences, Options" height="130" >
							</span>
						</a>
						, rubrique SCR :
					</p>
					<figure>
						<a href="illustrations/tous/2_3_proj_volee_defaut.png" >
							<img src="illustrations/tous/2_3_proj_volee_defaut.png" alt="Activer automatiquement la projection à la volée si les couches possèdent des SCR différents" height="500">
						</a>
					</figure>		
					<p>Laissez cochée la case <b>Activer automatiquement la projection à la volée si les couches ont des SCR différents</b>. Ainsi, chaque projet que vous créerez dans QGIS aura automatiquement cette fonctionnalité activée.</p>
				</div>
				<p>Pour vérifier d'un coup d’œil si la projection à la volée est activée, regardez l'icône du statut de la projection tout en bas à droite de la fenêtre de QGIS, dans la barre d'état :</p>
					<ul>
						<li>si la projection est à la volée est activée, l'icône et le code du SCR du projet sont gris foncé, avec les lettre ALV pour &#171; A La Volée &#187; <br><img class="iconeright" src="illustrations/tous/2_3_proj_volee_activee.png" alt="projection à la volée activée" ></li>
						<li>si la projection est à la volée est désactivée, l'icône et le code du SCR sont gris clair <img class="iconeright" src="illustrations/tous/2_3_proj_volee_desactivee.png" alt="projection à la volée désactivée" ></li>
					</ul>
				<p class="note">Attention, si vous ouvrez un projet déjà existant pour lequel la projection à la volée n'est pas activée, elle restera inactive dans ce projet tant que vous ne l'aurez pas activée dans les propriétés du projet puis sauvegardé à nouveau ce projet.</p>
				
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
