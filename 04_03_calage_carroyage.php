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
			<h2>IV.3  Points de calage : avec un carroyage</h2>
				<ul class="listetitres">
					<li><a href="#IV31">Création du premier point</a></li>
					<li><a href="#IV32">Quelques astuces pour créer les points suivants</a></li>
				</ul>
				<br>
	
			<p>Nous allons créer ici des points de calage, c'est-à-dire attribuer leurs coordonnées à plusieurs points de l'image.</p>
			<p>Pour ce faire, nous utiliserons la <a href="04_01_principe.php#IV12a">première méthode décrite dans la partie IV.1</a> : nous nous baserons sur le carroyage de cette carte pour créer les points de calage (la deuxième méthode sera abordée dans la <a href="04_06_calage_autre_couche.php"> partie IV.6</a>).</p>
			
		
				<h3>Création du premier point<a class="headerlink" id="IV31" href="#IV31"></a></h3>
				
					<div class="manip">
						<p>Lancez QGIS ou créez un nouveau projet, et assurez-vous que le <a href="02_03_couches_projets.php#II31">SCR de ce projet</a> soit le <b>WGS84 EPSG 4326</b>.</p>
						<p><b>Il est inutile d'ajouter la carte d'Oahu à QGIS</b> (si vous le faites néanmoins, profitez-en pour observer qu'en l'absence d'informations de localisation pour cette image, QGIS positionne son coin supérieur gauche aux coordonnées (0,0)).</p>
						<p><img class="icone" src="illustrations/tous/4_3_georeferenceur_icone.png" alt="icône du géoréférenceur" >
						Ouvrez la fenêtre du géoréférenceur :
							<a class="thumbnail_bottom" href="#thumb">Menu Raster &#8594; Géoréférencer...
								<span>
									<img src="illustrations/tous/4_3_georeferenceur_menu.png" alt="Menu Raster, Géoréférencer, Géoréférencer..." height="250" >
								</span>
							</a>
						</p>
						<figure>
							<a href="illustrations/tous/4_3_georeferenceur_fenetre.png" >
								<img src="illustrations/tous/4_3_georeferenceur_fenetre.png" alt="Fenêtre du géoréférenceur" width="600">
							</a>
						</figure>
						<p class="note">Il est possible d'afficher le géoréferenceur comme une fenêtre à part ou ancrée. Pour changer de mode, dans la fenêtre du géoréférenceur, <b>menu Paramètres &#8594; Configurer le géoréférenceur...</b>, cochez ou décochez la case <b>Afficher la fenêtre de géoréférencement dans la fenêtre principale</b>.</p>
						<p><img class="icone" src="illustrations/tous/4_3_ouvrir_raster_icone.png" alt="icône ouvrir un raster du géoréférenceur" >Dans cette fenêtre, ajoutez au géoréférenceur l'image à caler en cliquant sur l'icône <b>Ouvrir un raster</b>, ou bien
							<a class="thumbnail_bottom" href="#thumb">menu Fichier &#8594; Ouvrir raster...
								<span>
									<img src="illustrations/tous/4_3_ouvrir_raster_menu.png" alt="Menu Fichier, ouvrir un raster" height="200" >
								</span>
							</a>
						.</p>
						<p>Sélectionnez la carte de l'île d'Oahu : fichier <em class="data"><a href="donnees/TutoQGIS_04_Georef.zip">Oahu_Hawaiian_Islands_1906.jpg</a></em>.</p>
						<p class="note">Selon votre version de QGIS, une fenêtre peut s'ouvrir pour demander le SCR de l'image ; puisque nous avons décidé de partir du principe que les coordonnées de cette carte était en WGS84, 
							<a class="thumbnail_bottom" href="#thumb">choisissez ce SCR
								<span>
									<img src="illustrations/tous/4_3_choix_scr_wgs84.png" alt="Choix du SCR WGS84 en utilisant le filtre 4326" height="500" >
								</span>
							</a>	
						.</p>
						<p>La carte s'affiche dans la fenêtre du géoréférenceur.</p>
						<p>Il s'agit maintenant de renseigner les coordonnées de plusieurs points, en se basant sur les indications de la carte. Vous pouvez par exemple commencer par le point en haut à gauche :</p>
						<figure>
							<a href="illustrations/tous/4_3_premier_point.png" >
								<img src="illustrations/tous/4_3_premier_point.png" alt="emplacement du premier point de calage à créer" width="300">
							</a>
						</figure>
						<p><img class="icone" src="illustrations/tous/4_3_ajout_point_icone.png" alt="icône d'ajout de point du géoréférenceur" >Vérifiez que l'icône <b>Ajouter un point</b> soit bien sélectionnée et cliquez à l'intersection des deux lignes du carroyage :</p>
						<figure>
							<a href="illustrations/tous/4_3_ajout_point_fenetre.png" >
								<img src="illustrations/tous/4_3_ajout_point_fenetre.png" alt="Fenêtre de saisie des coordonnées d'un point de calage" width="450" >
							</a>
						</figure>
						<div class="question">
							<input type="checkbox" id="faq-3">
							<p><label for="faq-3">Comment saisir les coordonnées de ce point ?</label></p>
							<p class="reponse">Ce point est situé aux coordonnées -158° 15' Est (longitude négative car le point est à l'ouest du méridien de Greeenwich) et 21° 40' Nord (latitude positive car le point est au Nord de l'équateur).</p>
							<p class="reponse">QGIS propose de saisir les coordonnées en degrés minutes secondes sous la forme dd mm ss.ss. Ici, nous avons juste des degrés et des minutes : le point a donc pour coordonnées <b>-158 15</b> Est et <b>21 40</b> Nord.</p>
							<p class="reponse"><a href="illustrations/tous/4_3_ajout_point_fenetre_rempli.png" ><img src="illustrations/tous/4_3_ajout_point_fenetre_rempli.png" alt="Fenêtre de saisie des coordonnées d'un point de calage, coordonnées remplies" width="450" ></a></p>
						</div>
						<p>Depuis la version 3.22, le choix du SCR se fait directement dans cette fenêtre de saisie d'un point. Vérifiez que le SCR sélectionné soit bien le WGS84, puis cliquez sur <b>OK</b>.</p>
					</div>
					
					<p>Le point apparaît sous forme d'une ligne dans la table des points de contrôle, sous la carte dans la fenêtre géoréférenceur :</p>
					<figure>
						<a href="illustrations/tous/4_3_table_points.png" >
							<img src="illustrations/tous/4_3_table_points.png" alt="Table des points de contrôle : premier point" width="600">
						</a>
					</figure>
					<p>Que signifient les différentes colonnes de cette table&nbsp;?</p>
					<ul>
						<li class="espace"><b>Visible :</b> indique si le point sera pris en compte ou non pour le géoréférencement. Permet de ne pas prendre en compte certains points qui semblent apporter trop d'erreurs, tout en les gardant en mémoire.</li>
						<li class="espace"><b>ID :</b> identifiant du point. Peut aider à repérer de quel point il s'agit sur la carte, dans le fenêtre du géoréférenceur comme dans celle de QGIS.</li>
						<li class="espace"><b>Source X et Y :</b> coordonnées du point dans l'image non géoréférencée, c'est-à-dire en considérant que le pixel en haut à gauche de l'image a pour coordonnées 0,0.</li>
						<li class="espace"><b>Destination X et Y :</b> les coordonnées que l'on souhaite faire prendre à ce point, exprimées dans le SCR choisi précédemment. Ces coordonnées sont en degrés décimaux (ici, -158°15' a été converti en -158,25 degrés décimaux).</li>
						<li class="espace"><b>dX (pixels) et dY (pixels) :</b> la différence entre les coordonnées qu'on souhaiterait voir prendre le point (dstX et dstY) et les coordonnées que prendra effectivement le point après le géoréférencement. En effet, en fonction du type de transformation choisi et du nombre de points de calage, il n'est pas toujours possible de faire coïncider exactement les points avec les coordonnées souhaitées.</li>
						<li class="espace"><b>Résidu (pixels) :</b> l'erreur associée à ce point, calculée à partir de dX[pixels] et dY[pixels]. Cette erreur est égale à la racine de la somme des carrés de dX[pixels] et dY[pixels], soit : <br>&#8730; ( dX[pixels] &#178; + dY[pixels] &#178; )</li>
					</ul>
					
					<p>Dans notre table, les colonnes dX[pixels], dY[pixels] et residual[pixels] ne sont pas encore remplies, car nous n'avons pas encore défini le type de <b>transformation</b> à effectuer lors du géoréférencement. Cette notion sera abordée dans la <a href="04_04_parametrage.php">partie suivante</a>. En attendant, continuons à ajouter des points de calage pour en avoir par exemple six.</p>
				

	
				<h3>Quelques astuces pour créer les points suivants<a class="headerlink" id="IV32" href="#IV32"></a></h3>
					
					<div class="manip">
						<p>Procédez de la même manière pour rajouter 5 autres points de calage. Faites en sorte que ces points soient bien répartis sur l'image.</p>
						<p>Pour visualiser les identifiants et/ou les coordonnées des points sur la carte du géoréférenceur : 
							<a class="thumbnail_bottom" href="#thumb">Menu Paramètres &#8594; Configurer le géoréférenceur
								<span>
									<img src="illustrations/tous/4_3_config_georeferenceur_menu.png" alt="Menu Paramètres, Configurer le géoréférenceur" height="80" >
								</span>
							</a>	
						 :</p>
						<figure>
							<a href="illustrations/tous/4_3_config_georeferenceur_fenetre.png" >
								<img src="illustrations/tous/4_3_config_georeferenceur_fenetre.png" alt="Fenêtre de configuration du géoréférenceur" width="400">
							</a>
						</figure>
						<p><img class="icone" src="illustrations/tous/4_3_effacer_point_icone.png" alt="Icône effacer un point du géoréférenceur" >Si vous faites une erreur, vous pouvez supprimer un point en cliquant sur l'icône <b>Effacer un point</b>, puis sur le point à effacer.</p>
						<p><img class="icone" src="illustrations/tous/4_3_deplacer_point_icone.png" alt="Icône déplacer un point du géoréférenceur" >Vous pouvez également déplacer un point déjà créé en cliquant sur l'icône <b>Deplacer les points de contrôle</b>, puis en faisant glisser le point à déplacer.</p>
						<p><img class="icone" src="illustrations/tous/4_3_sauv_points_icone.png" alt="Icône sauvegarder les points de contrôle" >Une fois vos points créés, vous pouvez les sauvegarder au moyen du menu
							<a class="thumbnail_bottom" href="#thumb">Fichier &#8594; Enregistrer les points de contrôle sous...
								<span>
									<img src="illustrations/tous/4_3_sauv_points_menu.png" alt="Menu Projet, Fichier, Enregistrer les points de contrôle sous..." height="170" >
								</span>
							</a>	
						 ou bien en cliquant sur l'icône correspondante.</p>
						 <p>Cette manipulation crée un fichier avec l'extension .POINTS. Par défaut, ce fichier aura le même nom et sera dans le même dossier que l'image que vous êtes en train de caler. Ces points de calage pourront être chargés dans le géoréférenceur au moyen du <b>menu Fichier &#8594; Charger les points de contrôle...</b>.</p>
					</div>
						 
					 <p>Voici à quoi ressemble la fenêtre du géoréférenceur une fois tous les poins de calage correspondant à des intersections du carroyage renseignés :</p>
				 	<figure>
				 		<a href="illustrations/tous/4_3_avec_tous_les_points.png" >
							<img src="illustrations/tous/4_3_avec_tous_les_points.png" alt="Cartes de Oahu avec le maximum de points de calage renseignés" width="600">
						</a>
					</figure>
					 <p>Vous n'êtes pas obligé de renseigner autant de points ! Six suffiront pour notre calage.</p>
					<p>Les points qui serviront à caler notre image sont maintenant créés. Comment faire pour utiliser ces points pour caler notre image ?</p>
				

				<br>
				<a class="prec" href="04_02_preliminaires.php">chapitre précédent</a>
				<a class="suiv" href="04_04_parametrage.php">chapitre suivant</a>
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
