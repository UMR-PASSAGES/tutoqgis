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
			<h2>XI.3  Construire et utiliser un modèle</h2>
				<ul class="listetitres">
					<li><a href="#XI31">Création d'un modèle</a>
						<ul class="listesoustitres">
							<li><a href="#XI31a">Création du premier paramètre en entrée : couche à découper</a>
							<li><a href="#XI31b">Création du deuxième paramètre en entrée : masque de découpe</a></li>
							<li><a href="#XI31c">Création du premier algorithme : découpage</a></li>
							<li><a href="#XI31d">Création du second algorithme : modification du SCR</a></li>
						</ul>
					</li>
					<li><a href="#XI32">Enregistrement et édition du modèle</a></li>
					<li><a href="#XI33">Application</a>
						<ul class="listesoustitres">
							<li><a href="#XI33a">Découpage et reprojection d'une couche</a></li>
							<li><a href="#XI33b">Découpage et reprojection de plusieurs couches (utilisation &#171; par lot &#187;)</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
				<p>Les modèles sont surtout utiles pour chaîner plusieurs traitements. Par exemple, imaginons que notre but soit non seulement de découper une couche par une autre, mais ensuite de changer le SCR de la couche découpée pour la passer en WGS84 par exemple. Il est possible de créer un modèle enchaînant les deux outils.</p>
				<div class="manip">
					<p>Dans la boîte à outils Traitements, rubrique <b>Modèles</b> puis <b>Outils</b>, double-cliquez sur <b>Créer un nouveau modèle</b>.</p>
					<figure>
						<a href="illustrations/tous/11_03_creer_modele.png" >
							<img src="illustrations/tous/11_03_creer_modele.png" alt="Emplacement de l'outil de création de modèles dans la boîte à outils Traitements" width="350">
						</a>
					</figure>
				</div>
				<p>La fenêtre qui s'ouvre comporte une partie à gauche avec 2 onglets, Entrées et Algorithmes, qui vont vous servir à créer le modèle, et une partie vide à droite où votre modèle sera représenté.</p>
				<p>Notre modèle comportera 2 paramètres en entrée : une couche vecteur qui sera découpée et une couche vecteur qui servira de masque de découpe. L'outil de découpage va utiliser ces deux paramètres en entrée pour créer une nouvelle couche temporaire. Cette couche temporaire sera utilisée comme paramètre d'entrée pour l'outil de reprojection, qui produira la couche finale.</p>
				
				<h3><a class="titre" id="XI31">Création d'un modèle</a></h3>
					<h4><a class="titre" id="XI31a">Création du premier paramètre en entrée : couche à découper</a></h4>
					
						<div class="manip">
							<p>Dans l'onglet <b>Entrées</b>, double-cliquez sur <b>Vector layer</b> :</p>
							<figure>
							<a href="illustrations/tous/11_03_modeleur_fenetre.png" >
								<img src="illustrations/tous/11_03_modeleur_fenetre.png" alt="Fenêtre du modeleur de traitement" width="600">
							</a>
							</figure>
							<figure>
							<a href="illustrations/tous/11_03_def_parametre_fenetre.png" >
								<img src="illustrations/tous/11_03_def_parametre_fenetre.png" alt="Fenêtre de définition d'un paramètre" width="250">
							</a>
							</figure>
							<ul>
								<li>Nom du paramètre : <b>input layer</b></li>
								<li>Type de forme : <b>N'importe lequel</b>, puisque cette couche peut aussi bien être de type point, ligne ou polygone</li>
								<li>Requis : <b>oui</b>, ce paramètre est obligatoire</li>
							</ul>	
						</div>
						<p>Le paramètre est ajouté au modèle sous forme d'une boîte violette. Vous pouvez éditer ses caractéristiques en cliquant sur l'icône de crayon de cette boîte.</p>
						
						
					<h4><a class="titre" id="XI31b">Création du deuxième paramètre en entrée : masque de découpe</a></h4>
						
						<div class="manip">
							<p>Dans l'onglet Entrées, double-cliquez à nouveau sur Vector layer :</p>
							<figure>
								<a href="illustrations/tous/11_03_def_parametre2_fenetre.png" >
									<img src="illustrations/tous/11_03_def_parametre2_fenetre.png" alt="Fenêtre de définition d'un paramètre" width="250">
								</a>
								</figure>
							<ul>
								<li>Nom du paramètre : <b>mask layer</b></li>
								<li>Type de forme : <b>polygone</b></li>
								<li>Requis : <b>oui</b>, ce paramètre est obligatoire</li>
							</ul>
						</div>
					
					<h4><a class="titre" id="XI31c">Création du premier algorithme : découpage</a></h4>
						
						<div class="manip">
							<p>Dans l'onglet Algorithmes, double-cliquez sur l'outil <b>Couper</b> (Géotraitements QGIS &#8594; Outils de recouvrement de vecteur(s) &#8594; Couper) :</p>
							<figure>
								<a href="illustrations/tous/11_03_modeleur_fenetre_algos.png" >
									<img src="illustrations/tous/11_03_modeleur_fenetre_algos.png" alt="Fenêtre du modeleur, onglet algorithmes" width="600">
								</a>
							</figure>
							<figure>
								<a href="illustrations/tous/11_03_def_algo_fenetre.png" >
									<img src="illustrations/tous/11_03_def_algo_fenetre.png" alt="Fenêtre de définition d'un algo" width="500">
								</a>
							</figure>
							<ul>
								<li>Description : <b>Clip</b></li>
								<li>Couche en entrée : <b>input layer</b></li>
								<li>Couche de découpage : <b>mask layer</b></li>
								<li>Découpé&#60;OutputVector&#62; : ne rentrez rien dans cette partie, pour que la couche créée soit temporaire</li>
							</ul>
						</div>
						<p>L'algorithme apparaît sous forme d'une boîte blanche ; de même, vous pouvez éditer ses caractéristiques en cliquant sur l'icône de crayon de cette boîte.</p>
						
					
					<h4><a class="titre" id="XI31d">Création du second algorithme : modification du SCR</a></h4>
						
						<div class="manip">
							<p>Toujours dans la fenêtre du modeleur de traitement, onglet Algorithmes, double-cliquez sur l'outil <b>Reproject layer</b>
							<a class="thumbnail_bottom" href="#thumb">(Géotraitements QGIS &#8594; Outils généraux de vecteur &#8594; Reprojeter une couche)
                            	<span>
                            		<img src="illustrations/tous/11_03_reprojeter.png" alt="Emplacement de l'outil 'Reprojeter une couche'" height="420" >
                            	</span>
                            </a>  :</p>
							<figure>
								<a href="illustrations/tous/11_03_def_algo2_fenetre.png" >
									<img src="illustrations/tous/11_03_def_algo2_fenetre.png" alt="Fenêtre de définition d'un algo" width="500">
								</a>
							</figure>
							<ul>
								<li>Description : <b>Reproject layer</b></li>
								<li>Couche en entrée : <b>'Découpé' créé par l'algorithme 'Clip'</b></li>
								<li>Target CRS : laissez EPSG:4326, ce qui correspond au WGS84</li>
								<li>Reprojected&#60;OutputVector&#62; : <b>result</b></li>
							</ul>
						</div>
				
				<h3><a class="titre" id="XI32">Enregistrement et édition du modèle</a></h3>
				
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/tous/11_03_modele_fini_fenetre.png" >
							<img src="illustrations/tous/11_03_modele_fini_fenetre.png" alt="Fenêtre du modeleur avec le modèle terminé" width="600">
						</a>
					</figure>
					<div class="manip">
						<p>Pour <b>sauvegarder ce modèle</b>, tapez d'abord son nom en haut à gauche de la partie droite de la fenêtre (<b>clip and project</b> par exemple) et le nom de son groupe en haut à droite de la partie droite de la fenêtre (<b>tests</b> par exemple).</p>
						<p><img class="icone" src="illustrations/tous/11_03_enregistrer_modele_icone.png" alt="icône Enregistrer" >Cliquez ensuite sur l'icône <b>Enregistrer</b> et sauvegardez le modèle dans le répertoire par défaut : processing/models dans le dossier qgis. Notez que les modèles ont l'extension <em>.model</em>.</p>
						<p>Pour <b>éditer un modèle</b> à partir de la boîte à outils de traitements, clic droit sur son nom, <b>Editer modèle</b>.</p>
						<figure>
							<a href="illustrations/tous/11_03_editer_modele.png" >
								<img src="illustrations/tous/11_03_editer_modele.png" alt="Editer un modèle à partir de la boîte à outils Traitements" width="400">
							</a>
						</figure>
					</div>
				
				<h3><a class="titre" id="XI33">Application</a></h3>
				
					<h4><a class="titre" id="XI33a">Découpage et reprojection d'une couche</a></h4>
					
						<p>L'objectif est de découper une couche de routes par une commune, pour ne garder que les routes à l'intérieur de cette commune, la couche obtenue devant être en WGS84.</p>
						<div class="manip">
							<p> Ajoutez à QGIS les couches <em class='data'>OSM_routes</em> et <em class="data">SAINTE_RADEGONDE</em> situées dans le dossier <b>TutoQGIS_11_Automatisation/donnees</b>.</p>
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Dans quel SCR sont ces deux couches ?</label></p>
								<p class="reponse">Les 2 couches sont en RGF93 Lambert 93, code EPSG 2154 (cf. <a href="02_03_couches_projets.php#II32">partie II.3.2 : SCR d'une couche</a> )</b>.</p>
							</div>
							<p><b>Lancer le modèle clip and project</b> : vous pouvez soit cliquer sur l'icône d'engrenages du modeleur de traitement si ce modèle est en cours d'édition, soit à partir de la boîte à outils traitements : 
    							<a class="thumbnail_bottom" href="#thumb">Modèles &#8594; tests &#8594; clip and project
                                	<span>
                                		<img src="illustrations/tous/11_03_lancer_modele.png" alt="Boîte à outils de Traitement, modèle Clip and Project" height="300" >
                                	</span>
                                </a>
                            </p>
							<figure>
								<a href="illustrations/tous/11_03_test_modele.png" >
									<img src="illustrations/tous/11_03_test_modele.png" alt="fenêtre du modele clip and project, paramètres remplis" width="450">
								</a>
							</figure>
							<ul>
								<li class="espace">input layer : <em class="data">OSM_routes</em></li>
								<li class="espace">mask layer : <em class="data">SAINTE_RADEGONDE</em></li>
								<li class="espace">result : cliquez sur les <b>...</b>, choisir <b>Enregistrer dans un fichier...</b>, choisir l'emplacement et nommez la future couche <em class="data">OSM_route_radegonde_wgs84</em></li>
								<li class="espace">cochez la case <b>Ouvrir le fichier en sortie après l'exécution de l'algorithme</b> pour que la couche soit automatiquement ajoutée à QGIS</li>
							</ul>
							Vérifiez le SCR de la couche obtenue, ainsi que son contenu : elle ne doit comporter que les routes à l'intérieur de la commune de Sainte-Radégonde (en gris foncé dans la figure ci-dessous).
							<figure>
								<a href="illustrations/tous/11_03_resultat_decoupe.png" >
									<img src="illustrations/tous/11_03_resultat_decoupe.png" alt="résultat de la découpe : les 2 couches de route et la couche de commune" width="350">
								</a>
							</figure>
						</div>
						
					<h4><a class="titre" id="XI33b">Découpage et reprojection de plusieurs couches (utilisation &#171; par lot &#187;)</a></h4>
				
						<p>Le but est ici de découper et reprojeter plusieurs couches, sans avoir à lancer plusieurs fois le modèle.</p>
						<div class="manip">
							<p>A partir de la boîte à outils de traitements, clic droit sur le modèle clip and project, <b>Exécuter par lot</b>. Remplissez les différents paramètres, en vous aidant éventuellement de la <a href="11_02_par_lot.php">partie XI.2</a>.</p>
							<figure>
								<a href="illustrations/tous/11_03_test_modele_lot.png" >
									<img src="illustrations/tous/11_03_test_modele_lot.png" alt="remplissage des paramètres de l'outil clip and project en mode par lot" width="620">
								</a>
							</figure>
							<p>Vérifiez les couches obtenues.</p>
						</div>
				<br>
				<a class="prec" href="11_02_par_lot.php">chapitre précédent</a>
				<a class="suiv" href="11_04_python.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_11.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
