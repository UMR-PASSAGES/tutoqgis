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
					<li><a href="#IX11">Découper des données par d'autres données</a>
						<ul class="listesoustitres">
							<li><a href="#IX11a">Premier essai...</a>
							<li><a href="#IX11b">...Et correction du problème</a>
						</ul>
					</li>
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
			
				<p>Le but sera ici de découper des cours d'eau pour ne garder que ceux dans notre zone d'étude, en l'occurrence les départements de Côtes d'Armor et d’Île-et-Vilaine.</p>
				
				<h4><a class="titre" id="IX11a">Premier essai...</a></h4>
				
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS. Ajoutez les couches <em class="data">COURS_D_EAU_NTFL2</em> et <em class="data">communes_22_35_osm</em>.</p>
						<p>Le but sera donc de découper les cours d'eau par les communes, pour ne garder que les parties à l'intérieur des communes. Cette opération crée une nouvelle couche.</p>
						<p>Rendez-vous dans le
							<a class="thumbnail_bottom" href="#thumb">Menu Vecteur &#8594; Outils de géotraitement &#8594; Découper
								<span>
									<img src="illustrations/tous/9_1_decouper_menu.png" alt="Menu Vecteur, Outils de géotraitement, Découper" height="300" >
								</span>
							</a>	
						:</p>
						<figure>
							<a href="illustrations/tous/9_1_decouper_fenetre.png" >
								<img src="illustrations/tous/9_1_decouper_fenetre.png" alt="Fenêtre de l'outil découper" height="300" >
							</a>
						</figure>
						<ul>
							<li class="espace"><b>Couche vectorielle de saisie :</b> choisir la couche à découper, en l'occurrence les cours d'eau</li>
							<li class="espace"><b>Couche de découpage :</b> choisir la couche servant de masque de découpe, en l'occurrence les communes</li>
							<li class="espace"><b>Fichier de sortie :</b> cliquez sur <b>Parcourir</b>, choisissez l'endroit où la couche sera créée, et son nom : <em class="data">COURS_D_EAU_dep22_35</em></li>
							<li class="espace">La case <b>Ajouter le résultat au canevas de la carte</b> est présente depuis la version 2.2 de QGIS. Cochez-la si possible.</li>
							<li class="espace">Cliquez sur <b>OK</b></li>
						</ul>
						<p class="note">Les cases <b>Utiliser uniquement les valeurs sélectionnées</b> permettent, comme leur nom l'indique, de ne prendre en compte que certaines entités, que ce soit pour la couche à découper ou le masque de découpe.</p>
						<p>Ajoutez la nouvelle couche si ce n'est pas fait automatiquement.</p>
						<p>Que se passe-t-il ? La nouvelle couche ne semble contenir aucune entité, ce que vous pouvez vérifier en ouvrant la table attributaire. Supprimez cette couche.</p>
					</div>
					
				<h4><a class="titre" id="IX11b">...Et correction du problème</a></h4>	
				
					<p>Comme vous vous rappelez, nous avons vu dans la <a href="02_04_changer_systeme.php#II42" >partie II.4.2</a> que certaines opérations nécessitent que toutes les couches soient dans le même SCR. Est-ce bien le cas ici ?</p>
					
					<div class="manip">
						<div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">Dans quel SCR sont vos deux couches ?</label></p>
							<p class="reponse">La couche <b>COURS_D_EAU_NTFL2</b> est en système NTF, projection Lambert 2 (EPSG 27572), et la couche <b>communes_22_35_osm</b> en système RGF93, projection Lambert 93 (EPSG 2154).</p>
						</div>
						<p>Passez la couche de cours d'eau en <b>RGF93 Lambert 93 (EPSG 2154)</b>, puisqu'il s'agit du système officiel français, le NTF Lambert 2 étant obsolète : nommez la nouvelle couche <em class="data">COURS_D_EAU_RGF93L93</em>. Référez-vous si besoin à la <a href="02_04_changer_systeme.php#II42" >partie II.4.2</a>.</p>
						<p>Supprimez la couche <em class="data">COURS_D_EAU_NTFL2</em>. Vous avez donc dans votre projet deux couches, une de cours d'eau et une de communes, toutes deux dans le même SCR : RGF93 Lambert 93.</p>
						<p>Procédez à nouveau au découpage, avec comme couche de saisie <em class="data">COURS_D_EAU_RGF93L93</em> et comme couche de découpage <em class="data">communes_22_35_osm</em>.
						<p>Nommez la nouvelle couche <em class="data">COURS_D_EAU_dep22_35</em> et sauvegardez-là au même endroit que précédemment, afin de remplacer la couche avec 0 entités.</p>
						<p>Patientez... et ajoutez la nouvelle couche :</p>
						<figure>
							<a href="illustrations/tous/9_1_decoupage_resultat.png" >
								<img src="illustrations/tous/9_1_decoupage_resultat.png" alt="Résultat du découpage" height="300" >
							</a>
							<figcaption>Cours d'eau découpés en bleu, cours d'eau non découpés en rouge.</figcaption>
						</figure>
						<p>Contrairement à une requête spatiale, le découpage modifie les entités en les <b>découpant</b> suivant les limites de la couche de découpage. Une requête se borne à <b>sélectionner</b> par exemple les cours d'eau à l'intérieur des communes, ou intersectant les communes.</p>
						<figure>
							<a href="illustrations/tous/9_1_req_intersect.png" >
								<img src="illustrations/tous/9_1_req_intersect.png" alt="Sélection des cours d'eau intersectant les communes" height="300" >
							</a>
							<figcaption>Sélection des cours d'eau intersectant les communes (en jaune) par une requête spatiale.</figcaption>
						</figure>
					</div>
			
			
			<h3><a class="titre" id="IX12">Création d'une zone tampon autour d'un cours d'eau</a></h3>
			
				<h4><a class="titre" id="IX12a">Qu'est-ce qu'une zone tampon ?</a></h4>
			
					<p>Une zone tampon (aussi appelée « buffer ») est une <b>zone épousant la forme des objets d'une couche, d'une largeur donnée</b>. Si elles sont tracées autour de points, les zones tampons seront des cercles. Autour de lignes et de polygones, ce sera des polygones de forme variable. Une zone tampon peut servir par exemple à modéliser une zone inondable, un périmètre de sécurité, une zone d'achalandage...</p>
					<figure>
						<a href="illustrations/tous/9_1_principe_tampon.svg" >
							<img src="illustrations/tous/9_1_principe_tampon.png" alt="Exemples de zones tampon autour d'un point, d'une ligne et d'un polygone" height="220" >
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
							<img src="illustrations/tous/9_1_selection_trieux.png" alt="le Trieux sélectionné dans la carte" height="300" >
							<img src="illustrations/tous/9_1_selection_trieux_table.png" alt="le Trieux sélectionné dans la table" height="150" >
							<figcaption>Le cours d'eau du Trieux sélectionné</figcaption>
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
							<img src="illustrations/tous/9_1_tampon_fenetre.png" alt="Paramètrage de l'outil zone tampon" height="350" >
						</figure>

						<ul>
							<li class="espace"><b>Couche vectorielle de saisie :</b> il s'agit de la couche autour de laquelle sera créée la ou les zones tampons, donc ici la couche de cours d'eau <em class="data">COURS_D_EAU_dep22_35</em></li>
						</ul>
						<img class="droite" src="illustrations/tous/9_1_tampon_trieux.png" alt="zone tampon autour du trieux" height="400" >
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
							<img src="illustrations/tous/9_1_inters_principe.png" alt="Exemple d'une intersection entre une cercle et un rectangle" height="300" >
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
								<img src="illustrations/tous/9_1_inters_fenetre.png" alt="Paramètrage de l'outil d'intersection" height="300" >
							</a>
						</figure>
						<img class="droite" src="illustrations/tous/9_1_inters_resultat.png" alt="intersection entre zone tampon et communes" height="350" >
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
