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
			<h2>IV.4  Paramétrage du géoréférencement</h2>
				<ul class="listetitres">
					<li><a href="#IV41">Type de transformation, ou comment calculer les nouvelles coordonnées des points ?</a>
						<ul class= "listesoustitres">
							<li><a href="#IV41a" >Qu'est-ce qu'une transformation ?</a></li>
							<li><a href="#IV41b" >Quelques types de transformations</a></li>
							<li><a href="#IV41c" >Choisir une transformation</a></li>
						</ul>
					</li>
					<li><a href="#IV42">Rééchantillonnage, ou comment calculer les valeurs des pixels ?</a></li>
					<li><a href="#IV43">Mode de compression utilisé pour la création de la nouvelle image</a></li>
					<li><a href="#IV44">Raster en sortie et SCR</a>
						<ul class= "listesoustitres">
							<li><a href="#IV44a" >Raster de sortie</a></li>
							<li><a href="#IV44b" >SCR cible</a></li>
						</ul>
					<li><a href="#IV45">Les autres paramètres</a>
					   <ul class= "listesoustitres">
							<li><a href="#IV45a" >Enregistrer les points de contrôle</a></li>
							<li><a href="#IV45b" >Transparence</a></li>
							<li><a href="#IV45c" >Définir la résolution de la cible</a></li>
							<li><a href="#IV45d" >Carte et rapport PDF</a></li>
							<li><a href="#IV45e" >Charger directement le raster dans QGIS</a></li>
						</ul>
					</li>
					<li><a href="#IV46">Une fois tous les paramètres choisis...</a></li>
				</ul>
				<br>
	

				<p>Avant de pouvoir procéder au géoréférencement proprement dit, il va nous falloir définir plusieurs paramètres.</p>
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/4_4_parametres_icone.png" alt="Icône paramètres de transformation du géoréférenceur" >Ces paramètres sont accessibles dans le menu
								<a class="thumbnail_bottom" href="#thumb">Paramètres &#8594; Paramètres de transformation
									<span>
										<img src="illustrations/tous/4_4_parametres_menu.png" alt="Menu Paramètres, Paramètres de transformation" height="90" >
									</span>
								</a>	
							ou bien en cliquant sur l'icône correspondante.</p>
							<figure>
								<a href="illustrations/tous/4_4_parametres_fenetre.png" >
									<img src="illustrations/tous/4_4_parametres_fenetre.png" alt="Fenêtre de saisie des paramètres de transformation" width="430">
								</a>							
							</figure>
				</div>
				<p>Nous allons passer en revue ces différents paramètres.</p>
					
				<h3>Type de transformation, ou comment calculer les nouvelles coordonnées des points ?<a class="headerlink" id="IV41" href="#IV41"></a></h3>
				
					<h4>Qu'est-ce qu'une transformation ?<a class="headerlink" id="IV41a" href="#IV41a"></a></h4>
					
						<p>Lors du calage, l'image subit une transformation, afin de faire coïncider au maximum les points de départ avec les coordonnées spécifiées par l'utilisateur. Une transformation est en fait une formule mathématique transformant les coordonnées de départ vers les coordonnées voulues.</p>
						<p>Il existe divers types de transformations, adaptées à des usages différents. Chaque transformation, si on l'utilise avec un nombre de points de calage supérieur à son minimum, renverra une erreur correspondant à la différence entre les coordonnées "idéales" voulues par l'utilisateur et les coordonnées effectivement calculées lors de la transformation (erreur résiduelle <b>residual[pixels]</b> de la table des points de contrôle, voir plus haut).</p>
						
					<h4>Quelques types de transformations<a class="headerlink" id="IV41b" href="#IV41b"></a></h4>
					
						<p>QGIS permet les transformations suivantes :</p>
						<ul>
							<li class="espace"><b>linéaire</b> (2 points minimum) : type le plus simple, ne déforme pas le raster. Cette transformation est rarement suffisante pour des images scannées.</li>
							<li class="espace"><b>Helmert</b> (2 points minimum) : cas particulier de transformation polynomiale d'ordre 1.</li>
							<li class="espace"><b>transformation polynomiale d'ordre 1</b>, ou transformation affine (3 points minimum) : elle préserve la colinéarité (3 points alignés le resteront) et permet seulement changement d'échelle, translation et rotation.</li>
							<li class="espace"><b>transformation polynomiale d'ordre 2</b> (6 points minimum) : permet une distorsion du raster.</li>
							<li class="espace"><b>transformation polynomiale d'ordre 3</b> (10 points minimum) : le degré de distorsion possible est plus important que pour une transformation d'ordre 2.</li>
							<li class="espace"><b>Thin Plate Spline (TPS)</b> (1 point minimum) : méthode récente, permettant de prendre en compte des déformations locales. Cette transformation est utile lorsqu'on dispose d'originaux de très mauvaise qualité.</li>
							<li class="espace"><b>projective</b> (4 points minimum) : une des transformations les plus complexes, qui ne conserve pas le parallélisme. Un carré sera transformé en quadrilatère.</li>
						</ul>
						
						
					<h4>Choisir une transformation<a class="headerlink" id="IV41c" href="#IV41c"></a></h4>
					
						<p>Quelques éléments vous ont été donnés dans la description des types de transformation pouvant vous aider à choisir l'une ou l'autre transformation. En pratique, le choix est souvent difficile et requiert de tester plusieurs transformations et de les comparer si l'on recherche une bonne précision.</p>
						<p>Ici, nous nous bornerons à choisir une transformation simple et rapide.</p>
						<div class="manip">
							<p>Sélectionnez la transformation <b>polynomiale 1</b> dans la liste déroulante de la fenêtre de paramétrage.</p>
							<figure>
								<a href="illustrations/tous/4_4_type_transfo.png" >
									<img src="illustrations/tous/4_4_type_transfo.png" alt="Choix du type de transformation" width="400">
								</a>							
							</figure>
						</div>					
					
					
				<h3>Rééchantillonnage, ou comment calculer les valeurs des pixels ?<a class="headerlink" id="IV42" href="#IV42"></a></h3>
				
					<p>Si on utilise une transformation qui déforme le raster d'origine (transformation polynomiale d'ordre supérieur à 1, ou transformation de type Spline par exemple), la valeur (couleur) de chaque pixel du nouveau raster sera déterminée par un calcul en se basant sur le raster original.</p>
					<p>Cette valeur sera différente selon la méthode de rééchantillonnage choisie. QGIS, comme d'autres logiciels SIG, propose trois méthodes de rééchantillonnage :</p>
						<figure>
							<a href="illustrations/tous/4_4_resampling.svg" >
								<img src="illustrations/tous/4_4_resampling.png" alt="3 types de rééchantillonnage" width="600">
							</a>							
						</figure>					
					<ul>
						<li class="espace"><b>Plus proche voisin :</b> le nouveau pixel prend la valeur du pixel de l'ancien raster le plus proche. Cette méthode est la plus rapide, et est utilisée principalement pour des données catégorisées (occupation du sol par exemple) puisqu'elle ne crée pas de nouvelles valeurs.</li>
						<li class="espace"><b>Linéaire :</b> la valeur du nouveau pixel est déterminée à partir des valeurs des 4 pixels les plus proches. Cette méthode est utilisée pour des données continues et permet un lissage du raster.</li>
						<li class="espace"><b>Cubique :</b> la valeur du nouveau pixel est déterminée à partir des valeurs des 16 pixels les plus proches. Ceci provoque moins de distorsion géométrique de l'image mais nécessite un temps de calcul relativement long. Par ailleurs, il y a plus de possibilités d'obtenir avec cette méthode de nouvelles valeurs de pixel par rapport aux valeurs de départ.</li>
					</ul>
					<p class="note">Il est aussi possible de choisir les méthodes <b>Cubic Spline</b> et <b>Lanczos</b>, mais au-delà du fait que ce sont des méthodes plus complexes que les précédentes, je ne saurais pas les expliquer et encore moins leurs avantages et inconvénients&nbsp;! A vous de tester...</p>
					<p>Le choix d'une méthode de rééchantillonnage a surtout une influence dans le cas où la taille des pixels est importante par rapport à la taille des objets qui seront étudiés sur l'image, par exemple une photo aérienne où chaque maison est constituée de seulement quelques pixels.</p>
					<p>Dans notre cas (carte scannée avec une bonne résolution), le choix du type de rééchantillonnage influencera peu le résultat.</p>
					
					<div class="manip">
						<p>Ici, nous allons donc choisir la méthode la plus simple et la plus rapide : <b>plus proche voisin</b>.</p>
						<figure>
							<a href="illustrations/tous/4_4_reechantillonnage" >
								<img src="illustrations/tous/4_4_reechantillonnage.png" alt="Choix du type de rééchantillonnage" width="400">
							</a>							
						</figure>	
					</div>
				
				<h3>Mode de compression utilisé pour la création de la nouvelle image<a class="headerlink" id="IV43" href="#IV43"></a></h3>
				
					<p>La compression permet d'obtenir un raster moins volumineux, mais peut provoquer une perte de qualité. Une image compressée peut par ailleurs être illisible par certains logiciels.</p>
					<p>QGIS propose les méthodes suivantes :</p>
					<ul>
						<li class="espace"><b>Aucun :</b> pas de compression</li>
						<li class="espace"><b>LZW :</b> utilisé pour les images au format GIF et TIF. Assez largement utilisé, permet une compression jusqu'au 1:10</li>
						<li class="espace"><b>PACKBITS :</b> offre une compression moindre que la méthode LZW, mais ce format est plus courant</li>
						<li class="espace"><b>DEFLATE :</b> similaire à LZW, mais principalement prise en charge par les logiciels Adobe</li>
					</ul>
					
					<div class="manip">
						<p>Notre image de base étant peu volumineuse, nous allons choisir le type <b>Aucun</b>.</p>
						<figure>
							<a href="illustrations/tous/4_4_compression.png" >
								<img src="illustrations/tous/4_4_compression.png" alt="Choix du type de compression" width="380">
							</a>							
						</figure>	
					</div>
				
				<h3>Raster en sortie et SCR<a class="headerlink" id="IV44" href="#IV44"></a></h3>
				
					<h4>Raster de sortie<a class="headerlink" id="IV44a" href="#IV44a"></a></h4>
					
						<div class="manip">
							<p>Spécifiez ici le nom et l'emplacement de l'image géoréférencée qui sera créée, en cliquant sur l'icône à droite de la ligne <b>Raster de sortie</b>.</p>
							<figure>
								<a href="illustrations/tous/4_4_raster_sortie.png" >
									<img src="illustrations/tous/4_4_raster_sortie.png" alt="Choisir le nom et l'emplacement du raster de sortie" width="440">
								</a>							
							</figure>
							<p>Choisissez à quel endroit vous souhaitez créer cette couche, et donnez-lui un nom, par exemple <b>Oahu_Hawaiian_Islands_1906_pol1_wgs84.tif</b>.</p>
						</div>
						
				
					<h4>SCR cible<a class="headerlink" id="IV44b" href="#IV44b"></a></h4>
						
						<p>Comme décidé en partie <a href="04_02_preliminaires.php#IV22">précédemment</a>, nous allons partir du principe que les coordonnées de cette carte sont exprimées dans un système proche du WGS84.</p>
						<div class="manip">
							<p>Cliquez sur l'icône à droite de la ligne <b>SCR cible</b>, ou bien utilisez la liste déroulante pour choisir directement le SCR.</p>
							<figure>
								<a href="illustrations/tous/4_4_choisir_scr.png" >
									<img src="illustrations/tous/4_4_choisir_scr.png" alt="Choisir le SCR" width="440">
								</a>							
							</figure>
							<p>Choisissez le SCR <b>WGS 84, code EPSG 4326</b>, en vous aidant éventuellement de la partie filtre.</p>
							<figure>
								<a href="illustrations/tous/4_4_choix_scr_fenetre.png" >
									<img src="illustrations/tous/4_4_choix_scr_fenetre.png" alt="Sélection du SCR WGS84" width="430">
								</a>							
							</figure>
						</div>
						
				<h3>Les autres paramètres<a class="headerlink" id="IV45" href="#IV4"></a></h3>

					<h4>Enregistrer les points de contrôle<a class="headerlink" id="IV45a" href="#IV45a"></a></h4>
					
            <p>Si vous n'avez pas déjà enregistré les points de contrôle, ça peut être une bonne idée de cocher cette case afin de sauvegarder votre travail, et de garder trace des points utilisés, pour tester ensuite avec une autre transformation par exemple.</p>					
					
					<h4>Transparence<a class="headerlink" id="IV45b" href="#IV45b"></a></h4>
					
						<p>Employer 0 pour la transparence : cette option est utile principalement pour les photographies aériennes ou satellites et permet de ne pas visualiser les pixels noirs (bords de l'image), ce qui serait gênant dans notre cas.</p>
						<div class="manip">
							<p>Laissez cette case décochée.</p>
							<figure>
								<a href="illustrations/tous/4_4_transparence.png" >
									<img src="illustrations/tous/4_4_transparence.png" alt="employer 0 pour la transparence : la case est décochée" width="400">
								</a>							
							</figure>	
						</div>
	
					<h4>Définir la résolution de la cible<a class="headerlink" id="IV45c" href="#IV45c"></a></h4>	
					
						<div class="manip">
							<p>Laisser cette case décochée pour que l'image créée ait la même résolution que l'image de départ.</p>
							<figure>
								<a href="illustrations/tous/4_4_resolution.png" >
									<img src="illustrations/tous/4_4_resolution.png" alt="résolution de la cible : la case est décochée" width="230">
								</a>							
							</figure>	
						</div>
						
					<h4>Carte et rapport PDF<a class="headerlink" id="IV45d" href="#IV45d"></a></h4>
						
						<p>La carte PDF permettra de visualiser le décalage qu'aura subi chaque point de contrôle. Le rapport PDF comportera notamment les coordonnées et erreurs pour chaque point.</p>
						<div class="manip">
							<p>Cliquez sur les icônes à droite des lignes carte PDF et rapport PDF pour spécifier un nom (à votre convenance) et l'emplacement (par exemple dans le même dossier que l'image de départ) pour la carte et le rapport qui seront créés.</p>
							<figure>
								<a href="illustrations/tous/4_4_carte_rapport_icone.png" >
									<img src="illustrations/tous/4_4_carte_rapport_icone.png" alt="icônes pour choisir le nom et l'emplacement de la carte et du rapport PDF" width="460">
								</a>							
							</figure>
						</div>
						
					<h4>Charger directement le raster dans QGIS<a class="headerlink" id="IV45e" href="#IV45e"></a></h4>
					
						<div class="manip">
							<p>Charger dans QGIS lorsque terminé : cocher cette case pour que le nouveau raster soit chargé automatiquement dans QGIS une fois le géoréférencement effectué.</p>
							<figure>
								<a href="illustrations/tous/4_4_charger_dans_qgis.png" >
									<img src="illustrations/tous/4_4_charger_dans_qgis.png" alt="charger dans qgis : la case est cochée" width="400">
								</a>							
							</figure>	
						</div>

									
				<h3>Une fois tous les paramètres choisis...<a class="headerlink" id="IV46" href="#IV46"></a></h3>
				
					<p>...Cliquez sur OK : les paramètres sont sauvegardés... Mais rien ne semble se passer. Rendez-vous dans la partie suivante pour l'étape finale !</p>						
					

				<br>
				<a class="prec" href="04_03_calage_carroyage.php">chapitre précédent</a>
				<a class="suiv" href="04_05_lancement.php">chapitre suivant</a>
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
