<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
			<h1>IX.1  Analyse spatiale : quelques exemples d'opérations sur des données vecteur</h1>
				<ul class="listetitres">
					<li><a href="#IX11">Découper des données par d'autres données</a>
					   <ul class="listesoustitres">
							<li><a href="#IX11a">Quel est le principe ?</a></li>
							<li><a href="#IX11b">Découpage, mode d'emploi</a></li>
							<li><a href="#IX11c">Sans oublier de penser aux systèmes de coordonnées...</a></li>
						</ul>
					</li>
					<li><a href="#IX12">Création d'une zone tampon autour d'un cours d'eau</a>
						<ul class="listesoustitres">
							<li><a href="#IX12a">Qu'est-ce qu'une zone tampon ?</a></li>
							<li><a href="#IX12b">Sélection d'un cours d'eau</a></li>
							<li><a href="#IX12c">Création d'une zone tampon autour de la sélection</a></li>
							<li><a href="#IX12d">Pour aller plus loin&nbsp;: détail des autres paramètres</a></li>
						</ul>
					</li>
					<li><a href="#IX13">Données communes entre deux couches : intersection</a>
						<ul class="listesoustitres">
							<li><a href="#IX13a">Qu'est-ce qu'une intersection&nbsp;?</a></li>
							<li><a href="#IX13b">Intersection entre communes et zone tampon</a></li>
							<li><a href="#IX13c">Si on voulait aller plus loin...</a></li>
						</ul>
					</li>
					<li><a href="#IX14">Relancer rapidement un outil à l'aide de l'historique</a></li>
				</ul>
				<br>
				
			<p>Nous aborderons ici quelques traitements possibles sur des données vecteur. Il en existe bien sûr beaucoup d'autres !</p>
			

			<h2>Découper des données par d'autres données<a class="headerlink" id="IX11" href="#IX11"></a></h2>
			
			    <h3>Quel est le principe ?<a class="headerlink" id="IX11a" href="#IX11a"></a></h3>
			
    				<p>Le but sera ici, à partir d'une couche de cours d'eau de la région Pays de la Loire et d'une couche des départements de France métropolitaine, de <b>découper les cours d'eau pour ne garder que ceux dans notre zone d'étude</b>, en l'occurrence le département de la Loire-Atlantique (44).</p>
    				<figure>
    				    <a href="illustrations/9_1_decoupage_principe_1.jpg" >
    						<img src="illustrations/9_1_decoupage_principe_1.jpg" alt="Couches de départ : cours d'eau et départements" width="300" >
    					</a>
    					<a href="illustrations/9_1_decoupage_principe_2.jpg" >
    						<img src="illustrations/9_1_decoupage_principe_2.jpg" alt="Couche résultat : cours d'eau du département de la Loire-Atlantique" width="300" >
    					</a>
    					<figcaption>A gauche, les 2 couches de départ : cours d'eau des Pays de la Loire et départements. A droite, le résultat souhaité : les cours d'eau découpés selon le département de la Loire-Atlantique (44)</figcaption>
    				</figure>
    				
    				<p>Une telle opération est utile pour avoir des données moins lourdes, ce qui diminue les temps de traitement. Par ailleurs, votre travail sera plus clair si vous utilisez des données adaptées à votre zone d'étude.</p>
				
				<h3>Découpage, mode d'emploi<a class="headerlink" id="IX11b" href="#IX11b"></a></h3>
				
    				<div class="manip">
    					<p>Ouvrez un nouveau projet QGIS. Ajoutez les couches <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">DEPARTEMENT</a></em> et <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">gis_osm_waterways_free_1</a></em>.</p>
    					<p>Le but sera donc de découper les cours d'eau par le département 44, pour ne garder que les cours d'eau à l'intérieur de ce département. Cette opération crée une nouvelle couche.</p>
    					<p><img class="icone" src="illustrations/1_1_selection_icone.jpg" alt="menu projet, sauvegarder sous..." >Tout d'abord, sélectionnez le département 44 au moyen de l'outil de sélection :</p>
    					<figure>
    						<a href="illustrations/9_1_selection_44.jpg" >
    							<img src="illustrations/9_1_selection_44.jpg" alt="Département 44 sélectionné (en jaune)" width="300" >
    						</a>
    					</figure>
    					<p>Puis rendez-vous dans la <a class="thumbnail_bottom" href="#thumb">boîte à outils de traitements &#8594; Recouvrement de vecteur &#8594; Couper
                        	<span>
                        		<img src="illustrations/9_1_decouper_emplacement.jpg" alt="Emplacement de l'outil de découpage dans la boîte à outils" height="400" >
                        	</span>
                        </a></p>
    					<figure>
    						<a href="illustrations/9_1_decouper_fenetre.jpg" >
    							<img src="illustrations/9_1_decouper_fenetre.jpg" alt="Fenêtre de l'outil découper" width="600" >
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
    						<a href="illustrations/9_1_decoupage_resultat.jpg" >
    							<img src="illustrations/9_1_decoupage_resultat.jpg" alt="Les 2 couches de départ et la couche résultat en rouge" width="500" >
    						</a>
    					</figure>
                        <p>Vérifiez ses données attributaires : <b>elle contient les mêmes champs que la couche de cours d'eau initiale</b>. Les valeurs des champs ne sont pas recalculées (sauf dans le cas de champs virtuels) : s'il y a un champ longueur, ses valeurs seront donc erronées.</p>
                    </div>
                    
    				<p>Contrairement à une requête spatiale, le découpage modifie les entités en les <b>découpant</b> suivant les limites de la couche de découpage. Une requête se borne à <b>sélectionner</b> par exemple les cours d'eau à l'intérieur d'un département, ou intersectant ce département.</p>
    				<figure>
    				    <a href="illustrations/9_1_selection.jpg" >
    						<img src="illustrations/9_1_selection.jpg" alt="Cours d'eau intersectant un département : il dépasse du département" width="250" >
    					</a>
    					<a href="illustrations/9_1_decoupage.jpg" >
    						<img src="illustrations/9_1_decoupage.jpg" alt="Cours d'eau découpé par un département" width="250" >
    					</a>
    					<figcaption>A gauche, cours d'eau intersectant un département sélectionné par une requête spatiale (en jaune). A droite, cours d'eau découpé par un département (en rouge).</figcaption>
    				</figure>
    				
    			<h3>Sans oublier de penser aux systèmes de coordonnées...<a class="headerlink" id="IX11c" href="#IX11c"></a></h3>
				
				<p>Avez-vous noté que les 2 couches de départ ont <b>2 SCR différents</b>&nbsp;? (WGS84 pour les cours d'eau, RGF93/Lambert 93 pour les départements). Pourtant, le découpage fonctionne correctement. Ce comportement n'existe que depuis la version 3 de QGIS, la version 2.18 retournait dans ce cas une couche vide.</p>
				<p><b>Même si ça n'est plus obligatoire, cela reste une bonne pratique de travailler avec des couches dans le même SCR.</b></p>
			
			
			<h2>Création d'une zone tampon autour d'un cours d'eau<a class="headerlink" id="IX12" href="#IX12"></a></h2>
			
				<h3>Qu'est-ce qu'une zone tampon ?<a class="headerlink" id="IX12a" href="#IX12a"></a></h3>
			
					<p>Une zone tampon (aussi appelée « buffer ») est une <b>zone épousant la forme des objets d'une couche, d'une largeur donnée</b>. Si elles sont tracées autour de points, les zones tampons seront des cercles. Autour de lignes et de polygones, ce sera des polygones de forme variable. Une zone tampon peut servir par exemple à modéliser une zone inondable, un périmètre de sécurité, une zone d'achalandage...</p>
					<figure>
						<a href="illustrations/9_1_principe_tampon.svg" >
							<img src="illustrations/9_1_principe_tampon.jpg" alt="Exemples de zones tampon autour d'un point, d'une ligne et d'un polygone" width="500" >
						</a>
					</figure>
					<p>L'objectif est ici de créer une zone tampon de 100 mètres autour de l'Erdre. Cette zone pourra représenter par exemple une zone inondable, ou bien une zone s'interposant entre rivière et cultures.</p>
				
				<h3>Sélection d'un cours d'eau<a class="headerlink" id="IX12b" href="#IX12b"></a></h3>
				
					<div class="manip">
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Comment faire pour sélectionner le cours d'eau dont le nom est <b>L'Erdre</b> de la couche <em class="data">coursdeau_osm_44</em>&nbsp;?</label></p>
							<p class="reponse">2 méthodes au choix :</p>
							<p class="reponse">1/ Sélectionner à la main dans la table attributaire les lignes où la valeur du champ <b>name</b> est <b>L'Erdre</b> (pour les trouver plus facilement, cliquez sur l'intitulé de colonne <b>name</b> pour classer les lignes par nom)</p>
						    <p class="reponse">2/ <a href="06_01_req_attrib.php">utiliser une requête attributaire</a> : <b>"name"  =  'L\'Erdre'</b>. Attention, le caractère <b>\ (antislash)</b> est nécessaire avant l'apostrophe, pour que ce dernier ne soit pas considéré comme la fin de la chaîne de caractères.</p>
						</div>
						<figure>
						  <a href="illustrations/9_1_selection_erdre.jpg" >
							<img src="illustrations/9_1_selection_erdre.jpg" alt="l'Erdre sélectionné, dans la carte et dans la table" width="400" >
						  </a>
						</figure>
						<p>Ce cours d'eau est donc constitué de plusieurs entités.</p>
					</div>
								
				<h3>Création d'une zone tampon autour de la sélection<a class="headerlink" id="IX12c" href="#IX12c"></a></h3>
				
					<div class="manip">
						<p>Pour créer la zone tampon : <b>Boîte à outils de traitements &#8594; Géométrie vectorielle &#8594; Tampon</b></p>
						<figure>
						  <a href="illustrations/9_1_tampon_degres.jpg" >
							<img src="illustrations/9_1_tampon_degres.jpg" alt="Paramètrage de l'outil zone tampon, où l'on voit que les unités de la couche coursdeau_osm_44 sont les degrés" width="600" >
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
    						<a href="illustrations/9_1_verif_l93.jpg" >
    							<img src="illustrations/9_1_verif_l93.jpg" alt="Propriétés de la couche, rubrique Source : le SCR est le RGF93/Lambert-93" width="450" >
    						</a>
    					</figure>
    				</div>
				    <p>Attention, si le SCR n'est pas le bon, ne le modifiez pas ici&nbsp;! Utilisez l'outil <b>Reprojeter une couche</b> de la boîte à outils. Modifier le SCR et <a href="02_04_changer_systeme.php#II43">redéfinir le SCR</a> sont 2 manipulations différentes.</p>
				    
				    <div class="manip">
				        <p><a href="09_01_vecteur.php#IX12b">Sélectionnez à nouveau l'Erdre</a>.</p>
				        <p>Vous pouvez ensuite créer la zone tampon :</p>
				        <figure>
    						<a href="illustrations/9_1_tampon_fenetre.jpg" >
    							<img src="illustrations/9_1_tampon_fenetre.jpg" alt="Fenêtre de l'outil de zone tampon" width="600" >
    						</a>
    					</figure>
						<ul>
							<li class="espace">Couche source : il s'agit de la couche autour de laquelle sera créée la ou les zones tampons, donc ici la couche de cours d'eau <em class="data">coursdeau_osm_44_L93</em></li>
							<li class="espace">Entité(s) sélectionnée(s) uniquement : <b>cocher cette case</b> afin de ne créer de zone tampon qu'autour de l'Erdre</li>
							<li class="espace">Distance tampon : la couche étant projetée en Lambert 93, son unité est le mètre. Choisissez une distance de <b>100 mètres</b>. Le bouton tout à droite permet de faire varier la largeur de la zone en fonction des valeurs d'un champ ou d'une expression&nbsp;; nous ne l'utiliserons pas ici</li>
							<li class="espace"><b>Regrouper le résultat :</b> cette case permet de fusionner toutes les zones tampon qui seront créées&nbsp;; sinon, une zone tampon est créée par entité de la couche source. Cochez cette case pour cet exercice (cf. image ci-dessous)</li>
							<li class="espace">Mis en tampon : cliquez tout à droite sur le bouton <b>... &#8594; Enregistrer vers un fichier...</b> choisir le nom : <em class="data">Erdre_tampon100m.gpkg</em> par exemple et l'emplacement de la couche qui sera créée</li>
						</ul>
						<figure>
    						<a href="illustrations/9_1_tampon_nonregroupe.jpg" >
    							<img src="illustrations/9_1_tampon_nonregroupe.jpg" alt="Détail du résultat de la zone tampon sans regrouper" width="200" >
    						</a>
    						<a href="illustrations/9_1_tampon_regroupe.jpg" >
    							<img src="illustrations/9_1_tampon_regroupe.jpg" alt="Détail du résultat de la zone tampon en regroupant" width="200" >
    						</a>
    						<figcaption>Détail du résultat de la zone tampon : à gauche sans regrouper, à droite en regroupant.</figcaption>
    					</figure>
						<p>Cliquez sur <b>Exécuter</b>, observez le résultat :</p>
						<figure>
    						<a href="illustrations/9_1_res_tampon_erdre.jpg" >
    							<img src="illustrations/9_1_res_tampon_erdre.jpg" alt="Résultat de la zone tampon" width="400" >
    						</a>
    					</figure>
					</div>
					
				<h3>Pour aller plus loin&nbsp;: détail des autres paramètres<a class="headerlink" id="IX12d" href="#IX12d"></a></h3>
					
					<p>Les autres paramètres de l'outil de zone tampon sont moins fréquemment modifiés et vous pouvez souvent laisser les valeurs par défaut. Voici leur description pour information, que vous pouvez également retrouver dans l'aide (partie droite de la fenêtre de l'outil) ou bien la <a class="ext" target="_blank" href="https://docs.qgis.org/latest/fr/docs/user_manual/processing_algs/qgis/vectorgeometry.html#buffer" >documentation QGIS</a> :</p>
					<ul>
					    <li class="espace"><b>Segments :</b> plus cette valeur est élevée, plus les contours de la zone seront « arrondis ». Il s'agit en fait du nombre de segments utilisés pour représenter un quart de cercle.</li>
    					<li class="espace"><b>Style d'extrémité :</b> il s'agit de la manière dont les zones tampons sont &#171; terminées &#187;. 3 valeurs sont possibles : rond, plat et carré</li>
    				</ul>
					<figure>
						<a href="illustrations/9_1_tampon_extr_rond.jpg" >
							<img src="illustrations/9_1_tampon_extr_rond.jpg" alt="Style d'extrémité rond pour une zone tampon" width="170" >
						</a>
						<a href="illustrations/9_1_tampon_extr_plat.jpg" >
							<img src="illustrations/9_1_tampon_extr_plat.jpg" alt="Style d'extrémité plat pour une zone tampon" width="170" >
						</a>
                        <a href="illustrations/9_1_tampon_extr_rond.jpg" >
							<img src="illustrations/9_1_tampon_extr_carre.jpg" alt="Style d'extrémité carré pour une zone tampon" width="170" >
						</a>
						<figcaption>Différents types d'extrémité pour les zones tampon : de gauche à droite, rond, plat et carré.</figcaption>
					</figure>
					<ul>
    					<li class="espace"><b>Style de jointure :</b> les zones tampons sont créées en &#171; décalant &#187; les sommets d'une entité, ici une ligne. Il existe plusieurs manières de réaliser ce décalage, ce que contrôle ce paramètre. 3 valeurs sont possibles : rond, angle droit et oblique.</li>
    				</ul>
					<figure>
						<a href="illustrations/9_1_tampon_jointure_rond.jpg" >
							<img src="illustrations/9_1_tampon_jointure_rond.jpg" alt="Style de jointure rond pour une zone tampon" width="140" >
						</a>
						<a href="illustrations/9_1_tampon_jointure_angledroit.jpg" >
							<img src="illustrations/9_1_tampon_jointure_angledroit.jpg" alt="Style de jointure angle droit pour une zone tampon" width="140" >
						</a>
                        <a href="illustrations/9_1_tampon_jointure_oblique.jpg" >
							<img src="illustrations/9_1_tampon_jointure_oblique.jpg" alt="Style de jointure oblique pour une zone tampon" width="140" >
						</a>
						<a href="illustrations/9_1_tampon_jointure_tous.jpg" >
							<img src="illustrations/9_1_tampon_jointure_tous.jpg" alt="Comparaison des 3 styles de jointure pour une zone tampon" width="140" >
						</a>
						<figcaption>Différents types de jointure pour les zones tampon : de gauche à droite, rond, angle droit, oblique et superposition des 3.</figcaption>
					</figure>
					<ul>
    					<li class="espace"><b>Limite d'angle droite :</b> ce paramètre n'est utilisé que pour les styles jointure à angle droit. D'après l'aide, il contrôle &#171; la distance maximale de la courbe de décalage &#187;. Personnellement je trouve cette définition peu claire, et d'après mes observations les différences sont minimes (on peut les observer en passant de 1 à 2 par exemple). Ecrivez-moi si vous en savez plus&nbsp;!</li>
    				</ul>
					
			<h2>Données communes entre deux couches : intersection<a class="headerlink" id="IX13" href="#IX13"></a></h2>
			
				<h3>Qu'est-ce qu'une intersection&nbsp;?<a class="headerlink" id="IX13a" href="#IX13a"></a></h3>
				
					<p>L'intersection entre deux couches crée une troisième couche, avec uniquement les parties communes aux deux couches.</p>
					
					<figure>
						<a href="illustrations/9_1_inters_principe.svg" >
							<img src="illustrations/9_1_inters_principe.jpg" alt="Exemple d'une intersection entre une cercle et un rectangle" width="320" >
						</a>
						<figcaption>La zone hachurée correspond à l'intersection entre le rectangle et le cercle.</figcaption>
					</figure>
					
				<h3>Intersection entre communes et zone tampon<a class="headerlink" id="IX13b" href="#IX13b"></a></h3>
				
				    <p>L'idée sera ici de créer la couche d'intersection entre les communes et la zone tampon autour de l'Erdre créée ci-dessus. Ceci pourrait permettre de visualiser par exemple pour chaque commune la partie qui se trouve en zone inondable.</p>
					
					<div class="manip">
					    <p>Ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">COMMUNE_44</a></em> au projet.</p>
						<p><b>Boîte à outils de traitements &#8594; Recouvrement de vecteur &#8594; Intersection</b>
						:</p>
						<figure>
							<a href="illustrations/9_1_inters_fenetre.jpg" >
								<img src="illustrations/9_1_inters_fenetre.jpg" alt="Paramètrage de l'outil d'intersection" width="600" >
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
							<a href="illustrations/9_1_inters_resultat.jpg" >
								<img src="illustrations/9_1_inters_resultat.jpg" alt="Résultat de l'intersection, superposé à la couche de communes" width="400" >
							</a>
						</figure>
						<p>Ouvrez la table attributaire de cette couche : notez que les champs des deux couches sont présents.</p>
					</div>
					
				<h3>Si on voulait aller plus loin...<a class="headerlink" id="IX13c" href="#IX13c"></a></h3>
				
				    <p>A titre d'exemple d'application, comment faire pour obtenir pour chaque commune le pourcentage de sa surface en zone inondable&nbsp;?</p>
				    <p>Plusieurs étapes seraient nécessaires&nbsp;:</p>
				    <ol>
				        <li class="espace">Ajouter un champ Surface à la couche d'intersection, en calculant pour chaque entité sa surface par exemple en hectares</li>
				        <li class="espace">Joindre ce champ Surface à la couche de communes, en effectuant une jointure attributaire sur les codes INSEE</li>
				        <li class="espace">Ajouter un champ à la couche de communes et y calculer le pourcentage en zone inondable, en utilisant le champ Surface joint et la surface de la commune</li>
				    </ol>
				    
				    <p>En combinant les outils vus dans ce tutoriel (et d'autres !), on peut essayer de répondre à des questions sur des données spatiales.</p>
				    
			<h2>Relancer rapidement un outil à l'aide de l'historique<a class="headerlink" id="IX14" href="#IX14"></a></h2>
			
			 <p>Cette astuce est valable pour tous les outils de la boîte à outils, sur les vecteurs, rasters ou autres&nbsp;!</p>
			 
			 <div class="manip">
			   <p>Rendez-vous dans le <b>menu Traitement &#8594; Historique</b>&nbsp;:</p>
			   <figure>
  					<a href="illustrations/9_1_historique.jpg" >
  						<img src="illustrations/9_1_historique.jpg" alt="Fenêtre de l'historique" width="600" >
  					</a>
  				</figure>
  				<p>Dans cette fenêtre, chaque ligne correspond à une fois où vous avez lancé un outil de la boîte à outils, le tout classé par ordre chronologique.</p>
  				<p>Cliquez sur une des lignes&nbsp;: dans la partie basse de la fenêtre, vous pouvez voir la commande Python correspondante, que le logiciel a lancé pour exécuter l'outil (voir partie <a href="11_04_python.php" >XI.4</a>).</p>
  				<p><b>Si vous double-cliquez sur une ligne, la fenêtre de l'outil se lance avec exactement le même paramétrage que celui utilisé cette fois-là.</b> Ce qui est très utile en particulier pour les outils avec beaucoup de paramètres, par exemple quand on fait des tests et qu'on est amené à relancer plusieurs fois un outil.</p>
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
