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
			<h2>V.2  Ajout de points dans une couche</h2>
				<ul class="listetitres">
					<li><a href="#V21">Rendre une couche éditable</a></li>
					<li><a href="#V22">Ajout d'un point</a></li>
					<li><a href="#V23">Modification d'un point</a>
						<ul class= "listesoustitres">
							<li><a href="#V23a" >Déplacement</a></li>
							<li><a href="#V23b" >Modification des données attributaires</a></li>
						</ul>
					</li>
					<li><a href="#V24">Quitter le mode édition</a></li>
				</ul>
				<br>
				
			<p>Nous allons ajouter à la couche créée dans le chapitre précédent les points correspondant aux postes et aux école de la carte de l'île d'Oahu.</p>
			<div class="manip">
				<p>Créez un nouveau projet QGIS, et ajoutez-y :</p>
				<ul>
					<li class="espace">la carte géoréférencée <em class="data"><a href="donnees/TutoQGIS_05_Numerisation.zip">Oahu_Hawaiian_Islands_1906_wgs84.tif</a></em> située dans le dossier <b>TutoQGIS_05_Numerisation/donnees</b></li>
					<li class="espace">la couche vide créée dans le chapitre précédent : <em class="data">batiments_oahu.shp</em></li>
				</ul>
			</div>
			
			<h3><a class="titre" id="V21">Rendre une couche éditable</a></h3>
			
				<p>Par défaut, toutes les couches ajoutées dans QGIS sont &#171; verrouillées &#187; donc non modifiables (modifier le style ne modifie pas les données mais seulement leur représentation).</p>
				<p>Pour rendre une couche éditable, que ce soit pour modifier les données de la table attributaire ou la géométrie d'un élément, il faut donc passer en mode édition. Nous allons faire cette manipulation pour la couche <em class="data">batiments_oahu</em> afin de pouvoir y ajouter des points.</p>
				<div class="manip">
					<p>Vérifiez tout d'abord que votre couche de bâtiments soit <b>au-dessus</b> de la carte.</p>
					<p>Pour passer en mode édition :
						<a class="thumbnail_bottom" href="#thumb">Clic droit sur le nom de la couche &#8594; Basculer en mode édition
							<span>
								<img src="illustrations/tous/5_2_edition_clicdroit.png" alt="Clic droit sur le nom de la couche, basculer en mode édition" height="320" >
							</span>
						</a>	
					</p>
					<p>ou bien :</p>
					<p><img class="icone" src="illustrations/tous/5_2_edition_icone.png" alt="icône basculer en mode édition">sélectionnez la couche dans la table des matières puis cliquez sur l'icône <b>Basculer en mode édition</b></p>
					<p>ou encore :</p>
					<p>sélectionnez la couche dans la table des matières puis
						<a class="thumbnail_bottom" href="#thumb">Menu Couche &#8594; Basculer en mode édition
							<span>
								<img src="illustrations/tous/5_2_edition_menu.png" alt="Menu Couche, Basculer en mode édition" height="500" >
							</span>
						</a>
					.</p>
				</div>
				<p>Certains outils de la barre d'outil d'édition deviennent actifs, et dans la table des matières un symbole de crayon apparaît à gauche du nom de la couche :</p>
				<img src="illustrations/tous/5_2_couche_editable.png" alt="symbole de crayon à gauche d'une couche éditable" width="170">
				<p>La couche est maintenant modifiable.</p>
				<p>Dans QGIS, le passage en mode édition est géré &#171; par couches &#187; : certaines couches peuvent être éditables et d'autres non. Il est facile de voir dans la tables des matières quelle couche est éditable.</p>
				<p><b>De manière générale, il vaut mieux quitter le mode édition dès que vous n'en avez plus besoin, et limiter le nombre de couches éditables.</b></p>
				<p>Les couches raster ne sont jamais modifiables : si vous sélectionnez la carte de l'île d'Oahu, le passage en mode édition n'est pas possible pour cette couche.</p>
			
			<h3><a class="titre" id="V22">Ajout d'un point</a></h3>
			
				<div class="manip">
					<p>Commencez par repérer une école ou une poste, représentées respectivement par un point bleu ou rouge, par exemple la poste de la baie de Kaneohe :</p>
					<figure>
						<a href="illustrations/tous/5_2_ecole_kaneohe.png" >
							<img src="illustrations/tous/5_2_ecole_kaneohe.png" alt="zoom sur l'école de Kaneohe" width="430">
						</a>
					</figure>
					<p><img class="icone" src="illustrations/tous/5_2_ajout_icone.png" alt="icône d'ajout d'une entité" >Assurez-vous que votre couche de bâtiments soit bien sélectionnée dans la table des matières, puis cliquez sur l'icône <b>Ajouter une entité</b>.</p>
					<p>Cliquez sur l'école ou la poste que vous avez choisie; une fenêtre s'ouvre vous demandant de renseigner les attributs pour ce point. Laissez <b>Génération automatique</b> pour le champ fid, et renseignez le type de bâtiment : <b>poste</b>. Cliquez sur <b>OK</b>.</p>
					<p class="note">Si cette fenêtre ne s'ouvre pas, menu Préférences &#8594; Options &#8594; rubrique Numérisation : décochez la case &#171; Supprimer la fenêtre de saisie des attributs lors de la création de chaque nouvelle entité &#187; (tout en haut).</p>
					<figure>
						<a href="illustrations/tous/5_2_remplissage_type.png" >
							<img src="illustrations/tous/5_2_remplissage_type.png" alt="remplir l'attribut type par 'école' par exemple" width="400" >
						</a>
					</figure>
					<p>Le point s'affiche sur la carte, avec le style de la couche (ici un rond turquoise) :</p>
					<figure>
						<a href="illustrations/tous/5_2_ecole_kaneohe_pt.png" >
							<img src="illustrations/tous/5_2_ecole_kaneohe_pt.png" alt="point de l'école de Kaneohe" width="430">
						</a>
					</figure>
					<p>Si vous ouvrez la table attributaire de la couche, vous pouvez voir une ligne correspondant au point que vous venez de créer.</p>
					<p>Ajoutez d'autres points pour les écoles et postes de l'île.</p>
					<figure>
						<a href="illustrations/tous/5_2_tous_les_points.png" >
							<img src="illustrations/tous/5_2_tous_les_points.png" alt="Carte avec toutes les écoles et postes numérisées" width="500">
						</a>
					</figure>
					<p><img class="icone" src="illustrations/tous/5_2_sauv_icone.png" alt="icône sauvegarder les modifications" >N'oubliez pas de sauvegarder vos modifications en sélectionnant la couche puis en cliquant sur l’icône <b>sauvegarder les modifications</b>.</p>
					<p>Vous pouvez <a href="01_02_info_geo.php#I23a">modifier le style</a> des points dans les propriétés de la couche, rubrique Symbologie.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Comment faire pour représenter les données comme dans la légende de la carte, les écoles sous forme de rond bleu et les postes de rond rouge ?</label></p>
						<p class="reponse"><img src="illustrations/tous/5_2_style_categ.png" alt="fenêtre des propriétés de la couche, style catégorisé" width="600" ></p>
						<p class="reponse">Choisissez le style <b>catégorisé</b> sur la colonne <b>type</b>, cliquez sur <b>classer</b> puis double cliquez sur chacun des symboles pour les modifier à votre convenance. Le troisième symbole sera utilisé si certains points ne sont ni des écoles ni des postes. Cliquez sur <b>OK</b> pour valider et fermer la fenêtre.</p>
					</div>
				</div>
				
			
			<h3><a class="titre" id="V23">Modification d'un point</a></h3>
				
				<p>Il peut arriver bien sûr de vouloir modifier un point déjà existant, soit que vous vouliez le déplacer, soit que vous souhaitiez modifier ses données attributaires.</p>
				
				<h4><a class="titre" id="V23a">Déplacement</a></h4>
				
					<p>Imaginons qu'un de vos points soit mal placé et que vous vouliez le déplacer.</p>
					<div class="manip">
						<p>La couche doit être en mode édition.</p>
						<p>Il faut également <b>activer la barre d'outils de numérisation avancée</b> : clic droit sur n'importe quel barre d'outils (sauf sur un outil désactivé) et cochez si ça n'est pas déjà le cas la case Barre d'outils de numérisation avancée. Vous pouvez également passer par le menu Vue &#8594; Barres d'outils.</p>
						<p><img class="icone" src="illustrations/tous/5_2_deplacer_icone.png" alt="icône déplacer l'entité" >Sélectionnez votre couche de bâtiments dans la table des matières, puis cliquez sur l'icône <b>Déplacer l'entité</b>.</p>
						<p>Le curseur prend la forme d'une croix. Cliquez sur le point à déplacer, puis cliquez sur l'endroit où vous souhaitez déplacer ce point.</p>
					</div>
				
				<h4><a class="titre" id="V23b">Modification des données attributaires</a></h4>
				
					<p>Que faire dans le cas où vous voulez modifier les données attributaires d'un point, par exemple le passer de poste à école?</p>
					
					<div class="manip">
						<p>La couche doit être en mode édition.</p>
						<p>Ouvrez la table attributaire de la couche.</p>
						<p>Double-cliquez sur la case de la table à modifier. Vous pouvez ensuite modifier le texte de cette case.</p>
						<figure>
                        	<a href="illustrations/tous/5_2_modif_donnees_attributaires.png" >
                        		<img src="illustrations/tous/5_2_modif_donnees_attributaires.png" alt="Modification de données attributaires" width="110">
                        	</a>
                        </figure>
					</div>
					
			<h3><a class="titre" id="V24">Quitter le mode édition</a></h3>
			
				<p>Une fois vos ajouts et modifications terminés, il est important de quitter le mode édition, pour plusieurs raisons :</p>
				<ul>
					<li>éviter de faire des modifications par erreur</li>
					<li>sauvegarder les modifications effectuées</li>
					<li>certains outils SIG ne peuvent fonctionner sur une couche en cours d'édition</li>
				</ul>
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/5_2_edition_icone.png" alt="icône basculer en mode édition">Sélectionnez votre couche dans la table des matières et cliquez sur l'icône <b>basculer en mode édition</b>.</p>
					<figure>
					   <a href="illustrations/tous/5_2_quitter_edition.png">
					       <img src="illustrations/tous/5_2_quitter_edition.png" alt="Fenêtre arrêter l'édition" width="480" >
					   </a>
					</figure>
					<p>Une fenêtre apparaît pour vous demander si vous souhaitez :</p>
					<ul>
						<li><b>Fermer sans enregistrer :</b> quitte le mode édition sans sauvegarder vos modifications</li>
						<li><b>Annuler :</b> ne quitte pas le mode édition</li>
						<li><b>Enregistrer :</b> quitte le mode édition en enregistrant vos modifications.</li>
					</ul>
					<p>Cliquez sur <b>Enregistrer</b>.</p>
					<p>L'icône de crayon à côté de nom de la couche disparaît :</p>
					<figure>
					   <a href="illustrations/tous/5_2_quitter_edition_couche.png" >
						  <img src="illustrations/tous/5_2_quitter_edition_couche.png" alt="nom de la couche, en mode édition (icône crayon) et hors mode édition" width="400">
					   </a>
					</figure>
				</div>
				
				<p>Le chapitre suivant vous permettra d'en savoir plus sur les modes de saisie des données attributaires, en créant une liste de choix avec les 2 valeurs école et poste.</p>
				<p>Vous pouvez bien sûr décider de filer directement au chapitre d'après sur la <a href="05_04_lignes.php" >numérisation des lignes</a>&nbsp;!</p>

				
				<br>
				<a class="prec" href="05_01_creation_couche.php">chapitre précédent</a>
				<a class="suiv" href="05_03_donnees_attrib.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_5.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
