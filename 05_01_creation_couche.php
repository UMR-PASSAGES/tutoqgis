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
			<h2>V.1  Création d'une couche vide</h2>
				<ul class="listetitres">
					<li><a href="#V11">Choix du type (point, ligne, polygone) et du SCR</a></li>
					<li><a href="#V12">Définition des colonnes de la table attributaire</a>
						<ul class= "listesoustitres">
							<li><a href="#V12a" >Ajout d'une colonne</a></li>
							<li><a href="#V12b" >Suppression d'une colonne</a></li>
						</ul>
					</li>
					<li><a href="#V13">Enregistrement de la couche</a></li>
				</ul>
				<br>
				
			<p>Le but va être ici, à partir d'une carte déjà géoréférencée, de créer une couche de points qui contiendra les écoles et les postes de l'île d'Oahu. On passera donc d'une couche raster (la carte) à une couche vecteur contenant une partie des informations de la carte.</p>
			<p>Ci-dessous, à gauche, la carte originale, et à droite, la carte avec par-dessus la couche vecteur contenant les bâtiments.</p>
			<figure>
				<a href="illustrations/tous/5_1_principe_numerisation.png" >
					<img src="illustrations/tous/5_1_principe_numerisation.png" alt="carte de l'île d'Oahu avant et après numérisation des bâtiments" width="100%">
				</a>
			</figure>
			<p>Il sera ensuite plus facile de manipuler des données vecteurs, pour par exemple compter le nombre d'écoles, et si on a numérisé également les routes travailler sur l'accessibilité des ces écoles...</p>
			<p>Ces écoles et postes sont représentées dans la carte sous forme de points bleus ou rouges :</p>
			<img src="illustrations/tous/5_1_leg_pts.png" alt="extrait de la légende de la carte d'Oahu correspondant aux écoles et postes" width="150">			
			
			<h3><a class="titre" id="V11">Choix du type (point, ligne, polygone) et du SCR</a></h3>
			
				<p>La première étape consiste à créer une couche vierge, qui accueillera les données que nous allons créer.</p>
				<div class="manip">
					<p>Dans QGIS, ouvrez un nouveau projet</p>
					<p><img class="icone" src="illustrations/tous/5_1_nouvellecouche_icone.png" alt="icône nouvelle couche" >Rendez-vous dans le 
						<a class="thumbnail_bottom" href="#thumb">Menu Couche &#8594; Créer une couche &#8594; Nouvelle couche shapefile...
							<span>
								<img src="illustrations/tous/5_1_nouvellecouche_menu.png" alt="Menu Couche, Nouveau, Nouvelle couche shapefile.." height="200" >
							</span>
						</a>					
					ou bien cliquez sur l'icône correspondante (vous pouvez aussi utiliser le raccourci clavier Ctrl+Maj+N).</p>
					
					<p>La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/5_1_nouvellecouche_fenetre.png" >
							<img src="illustrations/tous/5_1_nouvellecouche_fenetre.png" alt="fenêtre de création d'une nouvelle couche" width="450">
						</a>
					</figure>
					<ul>
						<li><b>Type :</b> choisir Point</li>
						<li><b>SCR :</b> afin que cette couche soit dans le même système que la carte, vérifier que le SCR soit bien le WGS84</li>
					</ul>
					<p>Ne cliquez pas encore sur OK...</p>
				</div>
				
			<h3><a class="titre" id="V12">Définition des colonnes de la table attributaire</a></h3>
				
				
				<p>Vous pouvez ensuite choisir les champs que contiendra la table attributaire, c'est-à-dire les colonnes de la table. Trois types de champs sont possibles : texte, entier et décimal (nombre à virgule).</p>
				<p>Ici, nous allons créer une couche avec un seul champ dans la table, qui renseignera le type de bâtiment (ce champ aura donc deux valeurs possibles : école ou poste).</p>
				<p>Il sera toujours possible d'<a href="07_01_creation_suppression.php">ajouter ou de supprimer des champs</a> par la suite !</p>
				
				<h4><a class="titre" id="V12a">Ajout d'une colonne</a></h4>
				
					<div class="manip">
						<p>Pour ajouter une colonne :</p>
						<figure>
							<a href="illustrations/tous/5_1_nouvel_attribut.png" >
								<img src="illustrations/tous/5_1_nouvel_attribut.png" alt="ajout d'un nouvel attribut" width="450">
							</a>
						</figure>
						<ul>
							<li class="espace"><b>Nom :</b> ce sera le nom de la colonne,  tapez par exemple <b>type</b></li>
							<li class="espace"><b>Type :</b> le type de données que contiendra la champ. Ici, <b>données texte</b> permettra de taper du texte dans cette colonne</li>
							<li class="espace"><b>Largeur :</b> pour un champ de type texte, ceci correspond au nombre maximum de caractères que pourra contenir le champ. Les mot "école" et "poste" comportent tous deux 5 caractères : une largeur de 5 suffirait ici. Pour avoir un peu de marge (supposons que l'on veuille par la suite ajouter un 3ème type de bâtiment), choisissons une largeur de <b>10</b>.</li>
						</ul>
						<p>Cliquez ensuite sur le bouton <b>Ajouter à la liste des champs</b> pour créer ce champ.</p>
					</div>
					
				<h4><a class="titre" id="V12b">Suppression d'une colonne</a></h4>
				
					<div class="manip">
						<p>Nous allons supprimer le champ <b>id</b> créé par défaut. Pour cela, sélectionnez la ligne du champ id et cliquez sur le bouton <b>Supprimer le champ</b>.</p>
						<figure>
							<a href="illustrations/tous/5_1_supprimer_champ.png" >
								<img src="illustrations/tous/5_1_supprimer_champ.png" alt="suppression d'un champ" width="450">
							</a>
						</figure>
						<p>Terminez en cliquant sur le bouton <b>OK</b> pour valider vos choix.</p>
					</div>
					
			<h3><a class="titre" id="V13">Enregistrement de la couche</a></h3>
				
				<div class="manip">
					<p>Dans la fenêtre qui apparaît alors, choisissez :</p>
					<ul>
						<li class="espace">l'emplacement (par exemple dossier <b>TutoQGIS_05_Numerisation/donnees</b>)</li>
						<li class="espace">et le nom : <b>batiments_oahu</b> (dans tous les cas le nom de doit comporter que des lettres non accentuées, des chiffres ou le caractère _ )</li>
					</ul>
					<figure>
						<a href="illustrations/tous/5_1_sauv_couche.png" >
							<img src="illustrations/tous/5_1_sauv_couche.png" alt="sauvegarde de la couche" width="580">
						</a>
					</figure>
					<p>Cliquez sur <b>Enregistrer</b> pour créer la couche. Elle est automatiquement ajoutée à QGIS.</p>
					<p>Vous pouvez vérifier son SCR (propriétés de la couche, rubrique Général) :</p>
					<figure>
						<a href="illustrations/tous/5_1_scr.png" >
							<img src="illustrations/tous/5_1_scr.png" alt="vérification du scr de la couche" width="600">
						</a>
					</figure>
					<p>Vous pouvez également ouvrir sa table attributaire, qui ne doit contenir qu'une seule colonne nommée type et aucune ligne.</p>
					<figure>
						<a href="illustrations/tous/5_1_table_vide.png" >
							<img src="illustrations/tous/5_1_table_vide.png" alt="table attributaire vide" width="600">
						</a>
					</figure>
				</div>
				<p>Pour ajouter maintenant des données à cette couche, rendez-vous au chapitre suivant...</p>
				
				<br>
				<a class="prec" href="05_00_numerisation.php">chapitre précédent</a>
				<a class="suiv" href="05_02_points.php">chapitre suivant</a>
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
