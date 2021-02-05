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
							<li><a href="#IX11a">Quel est le principe&nbsp;?</a>
							<li><a href="#IX11b">Découpage, mode d'emploi</a>
							<li><a href="#IX11c">Sans oublier de penser aux systèmes de coordonnées...</a>
						</ul>
					</li>
					<li><a href="#IX12">Création d'une zone tampon autour d'un cours d'eau</a>
						<ul class="listesoustitres">
							<li><a href="#IX12a">Qu'est-ce qu'une zone tampon ?</a>
							<li><a href="#IX12b">Sélection d'un cours d'eau</a>
							<li><a href="#IX12c">Création d'une zone tampon autour de la sélection</a>
							<li><a href="#IX12d">Pour aller plus loin : détail des autres paramètres</a>
						</ul>
					</li>
					<li><a href="#IX13">Données communes entre deux couches : intersection</a>
						<ul class="listesoustitres">
							<li><a href="#IX13a">Qu'est-ce qu'une intersection ?</a>
							<li><a href="#IX13b">Intersection entre communes et zone tampon</a>
							<li><a href="#IX13c">Si on voulait aller plus loin...</a>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Nous aborderons ici quelques traitements possibles sur des données vecteur. Il en existe bien sûr beaucoup d'autres !</p>
			

			<h3><a class="titre" id="IX11">Découper des données par d'autres données</a></h3>
			
			    <h4><a class="titre" id="IX11a">Quel est le principe&nbsp;?</a></h4>
			
    				<p>Le but sera ici, à partir d'une couche de cours d'eau de la région Pays de la Loire et d'une couche des départements de France métropolitaine, de <b>découper les cours d'eau pour ne garder que ceux dans notre zone d'étude</b>, en l'occurrence le département de la Loire-Atlantique (44).</p>
    				<figure>
    				    <a href="illustrations/tous/9_1_decoupage_principe_1.png" >
    						<img src="illustrations/tous/9_1_decoupage_principe_1.png" alt="Couches de départ : cours d'eau et départements" width="300" >
    					</a>
    					<a href="illustrations/tous/9_1_decoupage_principe_2.png" >
    						<img src="illustrations/tous/9_1_decoupage_principe_2.png" alt="Couche résultat : cours d'eau du département de la Loire-Atlantique" width="300" >
    					</a>
    					<figcaption>A gauche, les 2 couches de départ : cours d'eau des Pays de la Loire et départements. A droite, le résultat souhaité : les cours d'eau découpés selon le département de la Loire-Atlantique (44)</figcaption>
    				</figure>
    				
    				<p>Une telle opération est utile pour avoir des données moins lourdes, ce qui diminue les temps de traitement. Par ailleurs, votre travail sera plus clair si vous utilisez des données adaptées à votre zone d'étude.</p>
				
				<h4><a class="titre" id="IX11b">Découpage, mode d'emploi</a></h4>
				
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS. Ajoutez les couches <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">DEPARTEMENT</a></em> et <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">gis_osm_waterways_free_1</a></em>.</p>
    					<p>Le but sera donc de découper les cours d'eau par le département 44, pour ne garder que les cours d'eau à l'intérieur de ce département. Cette opération crée une nouvelle couche.</p>
    					<p><img class="icone" src="illustrations/tous/1_1_selection_icone.png" alt="menu projet, sauvegarder sous..." >Tout d'abord, sélectionnez le département 44 au moyen de l'outil de sélection :</p>
    					<figure>
    						<a href="illustrations/tous/9_1_selection_44.png" >
    							<img src="illustrations/tous/9_1_selection_44.png" alt="Département 44 sélectionné (en jaune)" width="300" >
    						</a>
    					</figure>
    					<p>Puis rendez-vous dans la <a class="thumbnail_bottom" href="#thumb">boîte à outils de traitements &#8594; Recouvrement de vecteur &#8594; Couper
                        	<span>
                        		<img src="illustrations/tous/9_1_decouper_emplacement.png" alt="Emplacement de l'outil de découpage dans la boîte à outils" height="400" >
                        	</span>
                        </a></p>
    					<figure>
    						<a href="illustrations/tous/9_1_decouper_fenetre.png" >
    							<img src="illustrations/tous/9_1_decouper_fenetre.png" alt="Fenêtre de l'outil découper" width="600" >
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
    							<img src="illustrations/tous/9_1_decoupage_resultat.png" alt="Les 2 couches de départ et la couche résultat en rouge" width="500" >
    						</a>
    					</figure>
                        <p>Vérifiez ses données attributaires : <b>elle contient les mêmes champs que la couche de cours d'eau initiale</b>. Les valeurs des champs ne sont pas recalculées (sauf dans le cas de champs virtuels) : s'il y a un champ longueur, ses valeurs seront donc erronées.</p>
                    </div>
                    
    				<p>Contrairement à une requête spatiale, le découpage modifie les entités en les <b>découpant</b> suivant les limites de la couche de découpage. Une requête se borne à <b>sélectionner</b> par exemple les cours d'eau à l'intérieur d'un département, ou intersectant ce département.</p>
    				<figure>
    				    <a href="illustrations/tous/9_1_selection.png" >
    						<img src="illustrations/tous/9_1_selection.png" alt="Cours d'eau intersectant un département : il dépasse du département" width="250" >
    					</a>
    					<a href="illustrations/tous/9_1_decoupage.png" >
    						<img src="illustrations/tous/9_1_decoupage.png" alt="Cours d'eau découpé par un département" width="250" >
    					</a>
    					<figcaption>A gauche, cours d'eau intersectant un département sélectionné par une requête spatiale (en jaune). A droite, cours d'eau découpé par un département (en rouge).</figcaption>
    				</figure>
    				
    			<h4><a class="titre" id="IX11c">Sans oublier de penser aux systèmes de coordonnées...</a></h4>
				
				<p>Avez-vous noté que les 2 couches de départ ont <b>2 SCR différents</b>&nbsp;? (WGS84 pour les cours d'eau, RGF93/Lambert 93 pour les départements). Pourtant, le découpage fonctionne correctement. Ce comportement n'existe que depuis la version 3 de QGIS, la version 2.18 retournait dans ce cas une couche vide.</p>
				<p><b>Même si ça n'est plus obligatoire, cela reste une bonne pratique de travailler avec des couches dans le même SCR.</b></p>
			
			
			<h3><a class="titre" id="IX12">Création d'une zone tampon autour d'un cours d'eau</a></h3>
			
				<h4><a class="titre" id="IX12a">Qu'est-ce qu'une zone tampon ?</a></h4>
			
					<p>Une zone tampon (aussi appelée « buffer ») est une <b>zone épousant la forme des objets d'une couche, d'une largeur donnée</b>. Si elles sont tracées autour de points, les zones tampons seront des cercles. Autour de lignes et de polygones, ce sera des polygones de forme variable. Une zone tampon peut servir par exemple à modéliser une zone inondable, un périmètre de sécurité, une zone d'achalandage...</p>
					<figure>
						<a href="illustrations/tous/9_1_principe_tampon.svg" >
							<img src="illustrations/tous/9_1_principe_tampon.png" alt="Exemples de zones tampon autour d'un point, d'une ligne et d'un polygone" width="500" >
						</a>
					</figure>
					<p>L'objectif est ici de créer une zone tampon de 100 mètres autour de l'Erdre. Cette zone pourra représenter par exemple une zone inondable, ou bien une zone s'interposant entre rivière et cultures.</p>
				
				<h4><a class="titre" id="IX12b">Sélection d'un cours d'eau</a></h4>
				
					<div class="manip">
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Comment faire pour sélectionner le cours d'eau dont le nom est <b>L'Erdre</b> de la couche <em class="data">coursdeau_osm_44</em>&nbsp;?</label></p>
							<p class="reponse">2 méthodes au choix :</p>
							<p class="reponse">1/ Sélectionner à la main dans la table attributaire les lignes où la valeur du champ <b>name</b> est <b>L'Erdre</b> (pour les trouver plus facilement, cliquez sur l'intitulé de colonne <b>name</b> pour classer les lignes par nom)</p>
						    <p class="reponse">2/ <a href="06_01_req_attrib.php">utiliser une requête attributaire</a> : <b>"name"  =  'L\'Erdre'</b>. Attention, le caractère <b>\ (antislash)</b> est nécessaire avant l'apostrophe, pour que ce dernier ne soit pas considéré comme la fin de la chaîne de caractères.</p>
						</div>
						<figure>
						  <a href="illustrations/tous/9_1_selection_erdre.png" >
							<img src="illustrations/tous/9_1_selection_erdre.png" alt="l'Erdre sélectionné, dans la carte et dans la table" width="400" >
						  </a>
						</figure>
						<p>Ce cours d'eau est donc constitué de plusieurs entités.</p>
					</div>
								
				<h4><a class="titre" id="IX12c">Création d'une zone tampon autour de la sélection</a></h4>
				
					<div class="manip">
						<p>Pour créer la zone tampon : <b>Boîte à outils de traitements &#8594; Géométrie vectorielle &#8594; Tampon</b></p>
						<figure>
						  <a href="illustrations/tous/9_1_tampon_degres.png" >
							<img src="illustrations/tous/9_1_tampon_degres.png" alt="Paramètrage de l'outil zone tampon, où l'on voit que les unités de la couche coursdeau_osm_44 sont les degrés" width="600" >
						  </a>
						</figure>
                        <p>Sélectionnez la couche source : <em class="data">coursdeau_osm_44</em>. En-dessous, la distance permet de paramétrer la taille de la zone tampon.</p>
                        <p>Vous pouvez voir que <b>les unités de taille sont les degrés&nbsp;!</b> En effet, notre couche de cours d'eau étant en WGS84, il s'agit des unités de cette couche.</p>
                    </div>
                    
                    <p>Avant d'aller plus loin, il nous faudra donc <b>projeter notre couche</b> pour pouvoir fixer une taille en mètres. Nous utiliserons pour cela le système officiel français, à savoir le <b>RGF93/Lambert-93 (code EPSG 2154)</b>.</p>
                    
                    <div class="manip">
                        <p>Fermez la fenêtre de l'outil de zone tampon <b>sans créer la zone tampon</b>.</p>
                        <p><a href="02_04_changer_systeme.php#II42">Modifiez le SCR</a> de la couche <em class="data">coursdeau_osm_44</em>, pour passer du WGS84 vers le <b>RGF93/Lambert-93 (code EPSG 2154)</b> grâce à l'outil <b>Reprojeter une couche</b> (Outils généraux pour les vecteurs) de la boîte à outils.</p>
                        <p>Nommez la nouvelle couche <em class="data">coursdeau_osm_44_L93</em>.</p>
                    	<p>Vérifiez dans les propriétés de cette nouvelle couche, rubrique <b>Source</b>, que son SCR soit bien le Lambert 93 :</p>
                    	<figure>
    						<a href="illustrations/tous/9_1_verif_l93.png" >
    							<img src="illustrations/tous/9_1_verif_l93.png" alt="Propriétés de la couche, rubrique Source : le SCR est le RGF93/Lambert-93" width="450" >
    						</a>
    					</figure>
    				</div>
				    <p>Attention, si le SCR n'est pas le bon, ne le modifiez pas ici&nbsp;! Utilisez l'outil <b>Reprojeter une couche</b> de la boîte à outils. Modifier le SCR et <a href="02_04_changer_systeme.php#II43">redéfinir le SCR</a> sont 2 manipulations différentes.</p>
				    
				    <div class="manip">
				        <p><a href="09_01_vecteur.php#IX12b">Sélectionnez à nouveau l'Erdre</a>.</p>
				        <p>Vous pouvez ensuite créer la zone tampon :</p>
				        <figure>
    						<a href="illustrations/tous/9_1_tampon_fenetre.png" >
    							<img src="illustrations/tous/9_1_tampon_fenetre.png" alt="Fenêtre de l'outil de zone tampon" width="600" >
    						</a>
    					</figure>
						<ul>
							<li class="espace">Couche source :</b> il s'agit de la couche autour de laquelle sera créée la ou les zones tampons, donc ici la couche de cours d'eau <em class="data">coursdeau_osm_44_L93</em></li>
							<li class="espace">Entité(s) sélectionnée(s) uniquement : <b>cocher cette case</b> afin de ne créer de zone tampon qu'autour de l'Erdre</li>
							<li class="espace">Distance tampon : la couche étant projetée en Lambert 93, son unité est le mètre. Choisissez une distance de <b>100 mètres</b>. Le bouton tout à droite permet de faire varier la largeur de la zone en fonction des valeurs d'un champ ou d'une expression&nbsp;; nous ne l'utiliserons pas ici</li>
							<li class="espace"><b>Regrouper le résultat :</b> cette case permet de fusionner toutes les zones tampon qui seront créées&nbsp;; sinon, une zone tampon est créée par entité de la couche source. Cochez cette case pour cet exercice</li>
							<figure>
        						<a href="illustrations/tous/9_1_tampon_nonregroupe.png" >
        							<img src="illustrations/tous/9_1_tampon_nonregroupe.png" alt="Détail du résultat de la zone tampon sans regrouper" width="200" >
        						</a>
        						<a href="illustrations/tous/9_1_tampon_regroupe.png" >
        							<img src="illustrations/tous/9_1_tampon_regroupe.png" alt="Détail du résultat de la zone tampon en regroupant" width="200" >
        						</a>
        						<figcaption>Détail du résultat de la zone tampon : à gauche sans regrouper, à droite en regroupant.</figcaption>
        					</figure>
							<li class="espace">Mis en tampon : cliquez tout à droite sur le bouton <b>... &#8594; Enregistrer vers un fichier...</b> choisir le nom : <em class="data">Erdre_tampon100m.gpkg</em> par exemple et l'emplacement de la couche qui sera créée</li>
						</ul>
						<p>Cliquez sur <b>Exécuter</b>, observez le résultat :</p>
						<figure>
    						<a href="illustrations/tous/9_1_res_tampon_erdre.png" >
    							<img src="illustrations/tous/9_1_res_tampon_erdre.png" alt="Résultat de la zone tampon" width="400" >
    						</a>
    					</figure>
					</div>
					
				<h4><a class="titre" id="IX12d">Pour aller plus loin : détail des autres paramètres</a></h4>
					
					<p>Les autres paramètres de l'outil de zone tampon sont moins fréquemment modifiés et vous pouvez souvent laisser les valeurs par défaut. Voici leur description pour information, que vous pouvez également retrouver dans l'aide (partie droite de la fenêtre de l'outil) ou bien la <a class="ext" target="_blank" href="https://docs.qgis.org/3.4/en/docs/user_manual/processing_algs/qgis/vectorgeometry.html?highlight=buffer#buffer" >documentation QGIS</a> :</p>
					<ul>
					    <li class="espace"><b>Segments :</b> plus cette valeur est élevée, plus les contours de la zone seront « arrondis ». Il s'agit en fait du nombre de segments utilisés pour représenter un quart de cercle.</li>
    					<li class="espace"><b>Style d'extrémité :</b> il s'agit de la manière dont les zones tampons sont &#171; terminées &#187;. 3 valeurs sont possibles : rond, plat et carré</li>
    					<figure>
    						<a href="illustrations/tous/9_1_tampon_extr_rond.png" >
    							<img src="illustrations/tous/9_1_tampon_extr_rond.png" alt="Style d'extrémité rond pour une zone tampon" width="170" >
    						</a>
    						<a href="illustrations/tous/9_1_tampon_extr_plat.png" >
    							<img src="illustrations/tous/9_1_tampon_extr_plat.png" alt="Style d'extrémité plat pour une zone tampon" width="170" >
    						</a>
    <a href="illustrations/tous/9_1_tampon_extr_rond.png" >
    							<img src="illustrations/tous/9_1_tampon_extr_carre.png" alt="Style d'extrémité carré pour une zone tampon" width="170" >
    						</a>
    						<figcaption>Différents types d'extrémité pour les zones tampon : de gauche à droite, rond, plat et carré.</figcaption>
    					</figure>
    					<li class="espace"><b>Style de jointure :</b> les zones tampons sont créées en &#171; décalant &#187; les sommets d'une entité, ici une ligne. Il existe plusieurs manières de réaliser ce décalage, ce que contrôle ce paramètre. 3 valeurs sont possibles : rond, angle droit et oblique.</li>
    					<figure>
    						<a href="illustrations/tous/9_1_tampon_jointure_rond.png" >
    							<img src="illustrations/tous/9_1_tampon_jointure_rond.png" alt="Style de jointure rond pour une zone tampon" width="140" >
    						</a>
    						<a href="illustrations/tous/9_1_tampon_jointure_angledroit.png" >
    							<img src="illustrations/tous/9_1_tampon_jointure_angledroit.png" alt="Style de jointure angle droit pour une zone tampon" width="140" >
    						</a>
                            <a href="illustrations/tous/9_1_tampon_jointure_oblique.png" >
    							<img src="illustrations/tous/9_1_tampon_jointure_oblique.png" alt="Style de jointure oblique pour une zone tampon" width="140" >
    						</a>
    						<a href="illustrations/tous/9_1_tampon_jointure_tous.png" >
    							<img src="illustrations/tous/9_1_tampon_jointure_tous.png" alt="Comparaison des 3 styles de jointure pour une zone tampon" width="140" >
    						</a>
    						<figcaption>Différents types de jointure pour les zones tampon : de gauche à droite, rond, angle droit, oblique et superposition des 3.</figcaption>
    					</figure>
    					<li class="espace"><b>Limite d'angle droite :</b> ce paramètre n'est utilisé que pour les styles jointure à angle droit. D'après l'aide, il contrôle &#171; la distance maximale de la courbe de décalage &#187;. Personnellement je trouve cette définition peu claire, et d'après mes observations les différences sont minimes (on peut les observer en passant de 1 à 2 par exemple). Ecrivez-moi si vous en savez plus&nbsp;!</li>
    				</ul>
					
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
				
				    <p>L'idée sera ici de créer la couche d'intersection entre les communes et la zone tampon autour de l'Erdre créée ci-dessus. Ceci pourrait permettre de visualiser par exemple pour chaque commune la partie qui se trouve en zone inondable.</p>
					
					<div class="manip">
					    <p>Ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">COMMUNE_44</a></em> au projet.</p>
						<p><b>Boîte à outils de traitements &#8594; Recouvrement de vecteur &#8594; Intersection</b>
						:</p>
						<figure>
							<a href="illustrations/tous/9_1_inters_fenetre.png" >
								<img src="illustrations/tous/9_1_inters_fenetre.png" alt="Paramètrage de l'outil d'intersection" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Couche source : choisir la couche <em class="data">COMMUNE_44</em>. Ne pas cocher la case &#171; Entités sélectionnées uniquement &#187; puisqu'il s'agit d'intersecter toutes les communes</li>
							<li class="espace">Couche de superposition : choisir la couche <em class="data">Erdre_tampon_100m</em>. Idem, ne pas cocher la case &#171; Entités sélectionnées uniquement &#187;</li>
							<li class="espace">Champs d'entrée à conserver : cette option permet de choisir les champs de la couche source à conserver. Ici, nous garderons tous les champs et nous n'utiliserons donc pas ce paramètre</li>
							<li class="espace">Champs à conserver : cette option permet de choisir les champs de la couche de superposition. Ici, nous garderons tous les champs et nous n'utiliserons donc pas ce paramètre</li>
							<li class="espace">Intersection : cliquez tout à droite sur le bouton <b>... &#8594; Enregistrer vers un fichier...</b> choisir le nom : <em class="data">inters_communes_tampon.gpkg</em> par exemple et l'emplacement de la couche qui sera créée</li>
						</ul>
						
						<p>Cliquez sur <b>Exécuter</b>, observez le résultat&nbsp;:</p>
						<figure>
							<a href="illustrations/tous/9_1_inters_resultat.png" >
								<img src="illustrations/tous/9_1_inters_resultat.png" alt="Résultat de l'intersection, superposé à la couche de communes" width="400" >
							</a>
						</figure>
						<p>Ouvrez la table attributaire de cette couche : notez que les champs des deux couches sont présents.</p>
					</div>
					
				<h4><a class="titre" id="IX13c">Si on voulait aller plus loin...</a></h4>
				
				    <p>A titre d'exemple d'application, comment faire pour obtenir pour chaque commune le pourcentage de sa surface en zone inondable&nbsp;?</p>
				    <p>Plusieurs étapes seraient nécessaires&nbsp;:</p>
				    <ol>
				        <li class="espace">Ajouter un champ Surface à la couche d'intersection, en calculant pour chaque entité sa surface par exemple en hectares</li>
				        <li class="espace">Joindre ce champ Surface à la couche de communes, en effectuant une jointure attributaire sur les codes INSEE</li>
				        <li class="espace">Ajouter un champ à la couche de communes et y calculer le pourcentage en zone inondable, en utilisant le champ Surface joint et la surface de la commune</li>
				    </ol>
				    
				    <p>En combinant les outils vus dans ce tutoriel (et d'autres !), on peut essayer de répondre à des questions sur des données spatiales.</p>
						

				
				
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
