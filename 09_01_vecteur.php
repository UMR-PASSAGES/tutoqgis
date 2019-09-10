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
			<h2>IX.1  Analyse spatiale : quelques exemples d'opérations sur des données vecteur</h2>
				<ul class="listetitres">
					<li><a href="#IX11">Découper des données par d'autres données</a></li>
					<li><a href="#IX12">Création d'une zone tampon autour d'un cours d'eau</a>
						<ul class="listesoustitres">
							<li><a href="#IX12a">Qu'est-ce qu'une zone tampon ?</a>
							<li><a href="#IX12b">Sélection d'un cours d'eau</a>
							<li><a href="#IX12c">Création d'une zone tampon autour de la sélection</a>
						</ul>
					</li>
					<li><a href="#IX13">Données communes entre deux couches : intersection</a>
						<ul class="listesoustitres">
							<li><a href="#IX13a">Qu'est-ce qu'une intersection ?</a>
							<li><a href="#IX13b">Intersection entre communes et zone tampon</a>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Nous aborderons ici quelques traitements possibles sur des données vecteur. Il en existe bien sûr beaucoup d'autres !</p>
			

			<h3><a class="titre" id="IX11">Découper des données par d'autres données</a></h3>
			
				<p>Le but sera ici, à partir d'une couche de cours d'eau de la région Pays de la Loire et d'une couche des départements de France métropolitaine, de <b>découper les cours d'eau pour ne garder que ceux dans notre zone d'étude</b>, en l'occurrence le département de la Loire-Atlantique (44).</p>
				<figure>
				    <a href="illustrations/tous/9_1_decoupage_principe_1.png" >
						<img src="illustrations/tous/9_1_decoupage_principe_1.png" alt="Couches de départ : cours d'eau et départements" width="48%" >
					</a>
					<a href="illustrations/tous/9_1_decoupage_principe_2.png" >
						<img src="illustrations/tous/9_1_decoupage_principe_2.png" alt="Couche résultat : cours d'eau du département de la Loire-Atlantique" width="48%" >
					</a>
					<figcaption>A gauche, les 2 couches de départ : cours d'eau des Pays de la Loire et départements. A droite, le résultat souhaité : les cours d'eau découpés selon le département de la Loire-Atlantique (44)</figcaption>
				</figure>
				
				<p>Une telle opération est utile pour avoir des données moins lourdes, ce qui diminue les temps de traitement. Par ailleurs, votre travail sera plus clair si vous utilisez des données adaptées à votre zone d'étude.</p>
				
				
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS. Ajoutez les couches <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">DEPARTEMENT</a></em> et <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">gis_osm_waterways_free_1</a></em>.</p>
					<p>Le but sera donc de découper les cours d'eau par le département 44, pour ne garder que les cours d'eau à l'intérieur de ce département. Cette opération crée une nouvelle couche.</p>
					<p><img class="icone" src="illustrations/tous/1_1_selection_icone.png" alt="menu projet, sauvegarder sous..." >Tout d'abord, sélectionnez le département 44 au moyen de l'outil de sélection :</p>
					<figure>
						<a href="illustrations/tous/9_1_selection_44.png" >
							<img src="illustrations/tous/9_1_selection_44.png" alt="Département 44 sélectionné (en jaune)" width="50%" >
						</a>
					</figure>
					<p>Puis rendez-vous dans la <a class="thumbnail_bottom" href="#thumb">boîte à outils de traitements &#8594; Recouvrement de vecteur &#8594; Couper
                    	<span>
                    		<img src="illustrations/tous/9_1_decouper_emplacement.png" alt="Emplacement de l'outil de découpage dans la boîte à outils" height="80%" >
                    	</span>
                    </a></p>
					<figure>
						<a href="illustrations/tous/9_1_decouper_fenetre.png" >
							<img src="illustrations/tous/9_1_decouper_fenetre.png" alt="Fenêtre de l'outil découper" width="100%" >
						</a>
					</figure>
					<ul>
						<li class="espace">Couche source : choisir la couche à découper, en l'occurrence les cours d'eau : <em class="data">gis_osm_waterways_free_1</em></li>
						<li class="espace">Couche de superposition : choisir la couche servant de masque de découpe, en l'occurrence <em class="data">DEPARTEMENT</em></li>
						<li class="espace">Entité(s) sélectionnée(s) uniquement : <b>cochez cette case</b> pour ne garder que les cours d'eau à l'intérieur du département sélectionné, et non à l'intérieur de tous les départements</li>
						<li class="espace">Découpé : cliquez sur <b>...</b>, sélectionnez l'option <b>Enregistrer vers un fichier</b>, et choisissez l'endroit où la couche sera créée, et son nom : <em class="data">coursdeau_osm_44</em> (au format GeoPackage)</li>
						<li class="espace">Cliquez sur <b>Exécuter</b></li>
					</ul>
					<p>Patientez... La nouvelle couche est ajoutée :</p>
				    <figure>
						<a href="illustrations/tous/9_1_decoupage_resultat.png" >
							<img src="illustrations/tous/9_1_decoupage_resultat.png" alt="Les 2 couches de départ et la couche résultat en rouge" width="90%" >
						</a>
					</figure>
                    <p>Vérifiez ses données attributaires : <b>elle contient les mêmes champs que la couche de cours d'eau initiale</b>. Les valeurs des champs ne sont pas recalculées (sauf dans le cas de champs virtuels) : s'il y a un champ longueur, ses valeurs seront donc erronées.</p>
                </div>
                
				<p>Contrairement à une requête spatiale, le découpage modifie les entités en les <b>découpant</b> suivant les limites de la couche de découpage. Une requête se borne à <b>sélectionner</b> par exemple les cours d'eau à l'intérieur d'un département, ou intersectant ce département.</p>
				
				<p>Avez-vous noté que les 2 couches de départ ont <b>2 SCR différents</b>&nbsp;? (WGS84 pour les cours d'eau, RGF93/Lambert 93 pour les départements). Pourtant, le découpage fonctionne correctement. Ce comportement n'existe que depuis la version 3 de QGIS, la version 2.18 retournait dans ce cas une couche vide.</p>
				<p><b>Même si ça n'est plus obligatoire, cela reste une bonne pratique de travailler avec des couches dans le même SCR.</b></p>
				
				<div class="manip">
				    <div class="question">
                		<input type="checkbox" id="faq-1">
                		<p><label for="faq-1">Quel SCR commun utiliser pour cette opération&nbsp;?</label></p>
                		<p class="reponse">Le WGS84 (code EPSG 4326) et le RGF93 Lambert 93 (code EPSG 2154) sont tous deux techniquement possibles. Cependant, la zone d'étude étant un département français, il est plus logique de travailler en Lambert 93.</p>
                	</div>
                	<div class="question">
                		<input type="checkbox" id="faq-2">
                		<p><label for="faq-2">Quelles opérations effectuer pour découper les cours d'eau par le département 44 en n'utilisant qu'un seul SCR&nbsp;?</label></p>
                		<p class="reponse">1/ Modifiez le SCR de la couche de cours d'eau en Lambert 93 (code EPSG 2154) grâce à l'outil <b>Reprojeter une couche</b> (Outils généraux pour les vecteurs) de la boîte à outils.</p>
                		<p class="reponse">2/ Effectuez le découpage comme précédemment, sans oublier de choisir en entrée la couche de cours d'eau projetée en Lambert 93 et de sélectionner au préalable le département 44.</p>
                	</div>
				</div>

			
			
			<h3><a class="titre" id="IX12">Création d'une zone tampon autour d'un cours d'eau</a></h3>
			
				<h4><a class="titre" id="IX12a">Qu'est-ce qu'une zone tampon ?</a></h4>
			
					<p>Une zone tampon (aussi appelée « buffer ») est une <b>zone épousant la forme des objets d'une couche, d'une largeur donnée</b>. Si elles sont tracées autour de points, les zones tampons seront des cercles. Autour de lignes et de polygones, ce sera des polygones de forme variable. Une zone tampon peut servir par exemple à modéliser une zone inondable, un périmètre de sécurité, une zone d'achalandage...</p>
					<figure>
						<a href="illustrations/tous/9_1_principe_tampon.svg" >
							<img src="illustrations/tous/9_1_principe_tampon.png" alt="Exemples de zones tampon autour d'un point, d'une ligne et d'un polygone" width="500" >
						</a>
					</figure>
					<p>L'objectif est ici de créer une zone tampon d'1 km autour du cours d'eau du Trieux. Cette zone pourra représenter par exemple une zone inondable, ou bien une zone s'interposant entre rivière et cultures.</p>
				
				<h4><a class="titre" id="IX12b">Sélection d'un cours d'eau</a></h4>
				
					<div class="manip">
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Comment faire pour sélectionner le cours d'eau dont le toponyme est &#171; le Trieux &#187; ?</label></p>
							<p class="reponse">Vous pouvez soit cliquer sur le numéro de la ligne où le toponyme est &#171; le Trieux &#187; (pour la trouver plus facilement, cliquez sur l'intitulé de colonne <b>Toponyme</b> pour classer les lignes par toponyme), soit <a href="06_01_req_attrib.php">utiliser une requête attributaire</a> : <b>"Toponyme"  =  'le Trieux'</b>.</p>
						</div>
						<figure>
						  <a href="illustrations/tous/9_1_selection_trieux.png" >
							<img src="illustrations/tous/9_1_selection_trieux.png" alt="le Trieux sélectionné dans la carte" width="370" >
						  </a>
						  <a href="illustrations/tous/9_1_selection_trieux_table.png" >
							<img src="illustrations/tous/9_1_selection_trieux_table.png" alt="le Trieux sélectionné dans la table" width="300" >
						  </a>
						</figure>
					</div>
								
				<h4><a class="titre" id="IX12c">Création d'une zone tampon autour de la sélection</a></h4>
				
					<div class="manip">
						<p>Pour créer la zone tampon :
							<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Outils de géotraitement  &#8594; Tampon(s)
								<span>
									<img src="illustrations/tous/9_1_tampon_menu.png" alt="Menu Vecteur, Outils de géotraitement, Tampon(s)" height="350" >
								</span>
							</a>	
						:</p>
						<figure>
						  <a href="illustrations/tous/9_1_tampon_fenetre.png" >
							<img src="illustrations/tous/9_1_tampon_fenetre.png" alt="Paramètrage de l'outil zone tampon" width="460" >
						  </a>
						</figure>

						<ul>
							<li class="espace"><b>Couche vectorielle de saisie :</b> il s'agit de la couche autour de laquelle sera créée la ou les zones tampons, donc ici la couche de cours d'eau <em class="data">COURS_D_EAU_dep22_35</em></li>
						</ul>
						<img class="droite" src="illustrations/tous/9_1_tampon_trieux.png" alt="zone tampon autour du trieux" width="150" >
						<ul>
							<li class="espace"><b>Utiliser uniquement les valeurs sélectionnées :</b> vérifier que cette case soit bien cochée (elle l'est par défaut à partir du moment où une sélection existe dans la couche), afin de ne créer de zone tampon qu'autour du Trieux</li>
							<li class="espace"><b>Segments pour l'approximation :</b> plus cette valeur est élevée, plus les contours de la zone seront « arrondis ». Une valeur de <b>10</b> sera suffisante dans notre cas</li>
							<li class="espace"><b>Distance tampon :</b> la couche étant projetée en Lambert 93, son unité est le mètre. Taper donc <b>1000</b> pour obtenir une zone d'une largeur de 1km. L'option <b>Champ de distance tampon</b> permet quant à elle de faire varier la largeur de la zone en fonction des valeurs d'un champ ; nous ne l'utiliserons pas ici</li>
							<li class="espace"><b>Union des résultats du tampon :</b> cette case permet de fusionner toutes les zones tampon qui seront créées. Dans la mesure où une seule zone sera créée ici, la cocher ou décocher ne changera rien au résultat</li>
							<li class="espace"><b>Fichier de sortie :</b> cliquez sur <b>Parcourir</b>, choisir le nom : <em class="data">Trieux_Tampon1km_RGF93L93</em> par exemple) et l'emplacement de la couche qui sera créée</li>
						</ul>
						<p>Cliquez sur <b>OK</b>, ajoutez la nouvelle couche : vous devez obtenir un résultat similaire à celui de l'illustration ci-dessus.</p>
						
					</div>
					
					
			<h3><a class="titre" id="IX13">Données communes entre deux couches : intersection</a></h3>
			
				<h4><a class="titre" id="IX13a">Qu'est-ce qu'une intersection ?</a></h4>
				
					<p>L'intersection entre deux couches crée une troisième couche, avec uniquement les parties communes aux deux couches.</p>
					
					<figure>
						<a href="illustrations/tous/9_1_inters_principe.svg" >
							<img src="illustrations/tous/9_1_inters_principe.png" alt="Exemple d'une intersection entre une cercle et un rectangle" width="320" >
						</a>
						<figcaption>La zone hachurée correspond à l'intersection entre le rectangle et le cercle.</figcaption>
					</figure>
					
				<h4><a class="titre" id="IX13b">Intersection entre communes et zone tampon</a></h4>
					
					<div class="manip">
						<p>Rendez-vous dans le 
							<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Outils de géotraitement  &#8594; Intersection
								<span>
									<img src="illustrations/tous/9_1_inters_menu.png" alt="Menu Vecteur, Outils de géotraitement, Intersection" height="350" >
								</span>
							</a>	
						:</p>
						<figure>
							<a href="illustrations/tous/9_1_inters_fenetre.png" >
								<img src="illustrations/tous/9_1_inters_fenetre.png" alt="Paramètrage de l'outil d'intersection" width="470" >
							</a>
						</figure>
						<img class="droite" src="illustrations/tous/9_1_inters_resultat.png" alt="intersection entre zone tampon et communes" width="100" >
						<ul>
							<li class="espace"><b>Couche vectorielle de saisie :</b> choisir la couche de communes. Ne pas cocher la case &#171; Utiliser uniquement les entités sélectionnées &#187; puisqu'il s'agit d'intersecter toutes les communes</li>
							<li class="espace"><b>Couche d'intersection :</b> choisir la couche contenant la zone tampon. Idem, ne pas cocher la case &#171; Utiliser uniquement les entités sélectionnées &#187;</li>
							<li class="espace"><b>Fichier de sortie :</b> cliquez sur <b>Parcourir</b>, choisir le nom (<em class="data">intersection_communes_tampon</em> par exemple) et l'emplacement de la couche qui sera créée</li>
						</ul>
						
						<p>Cliquez sur <b>OK</b>, ajoutez la couche.</p>
						<p>Vous devez obtenir une couche similaire à celle de l'illustration.</p>
						<p>Ouvrez la table attributaire de cette couche : notez que les champs des deux couches sont présents.</p>
					</div>
						

				
				
			<br>
			<a class="prec" href="09_00_analyse_spatiale.php">chapitre précédent</a>
			<a class="suiv" href="09_02_raster.php">chapitre suivant</a>
			<br>
			<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_9.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
