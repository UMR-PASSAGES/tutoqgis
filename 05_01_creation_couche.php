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
					<li><a href="#V11">Création d'une couche vide</a></li>
					<li><a href="#V12">Vérification</a></li>
				</ul>
				<br>
				
			<p>Le but va être ici, à partir d'une carte déjà géoréférencée, de créer une couche de points qui contiendra les écoles et les postes de l'île d'Oahu. On passera donc d'une couche raster (la carte) à une couche vecteur contenant une partie des informations de la carte.</p>
			<p>Ci-dessous, à gauche, la carte originale, et à droite, la carte avec par-dessus la couche vecteur contenant les bâtiments.</p>
			<figure>
				<a href="illustrations/tous/5_1_principe_numerisation.png" >
					<img src="illustrations/tous/5_1_principe_numerisation.png" alt="carte de l'île d'Oahu avant et après numérisation des bâtiments" width="650">
				</a>
			</figure>
			<p>Il sera ensuite plus facile de manipuler des données vecteurs, pour par exemple visualiser la répartition spatiale des écoles, et si on a numérisé également les routes travailler sur l'accessibilité des ces écoles...</p>
			<p>Ces écoles et postes sont représentées dans la carte sous forme de points bleus ou rouges :</p>
			<figure>
			    <img src="illustrations/tous/5_1_leg_pts.png" alt="extrait de la légende de la carte d'Oahu correspondant aux écoles et postes" width="150" >
			    <img src="illustrations/tous/5_1_ex_pts.png" alt="extrait de la carte d'Oahu avec écoles et postes" width="200">
			</figure>
			
			<h3>Création d'une couche vide<a class="headerlink" id="V11" href="#V11"></a></h3>
			
				<p>La première étape consiste à créer une couche vierge, qui accueillera les données que nous allons créer.</p>
				<div class="manip">
					<p>Dans QGIS, ouvrez un nouveau projet.</p>
					<p><img class="icone" src="illustrations/tous/5_1_nouvellecouche_icone.png" alt="icône nouvelle couche" >Rendez-vous dans le 
						<a class="thumbnail_bottom" href="#thumb">Menu Couche &#8594; Créer une couche &#8594; Nouvelle couche GeoPackage...
							<span>
								<img src="illustrations/tous/5_1_nouvellecouche_menu.png" alt="Menu Couche, Nouvelle couche GeoPackage.." height="200" >
							</span>
						</a>					
					ou bien cliquez sur l'icône correspondante (vous pouvez aussi utiliser le raccourci clavier Ctrl+Maj+N).</p>
					
					<p>La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/5_1_nouvellecouche_fenetre.png" >
							<img src="illustrations/tous/5_1_nouvellecouche_fenetre.png" alt="fenêtre de création d'une nouvelle couche" width="500">
						</a>
					</figure>
					<ul>
						<li><b>Base de données :</b> un fichier GeoPackage étant en réalité une base de données, il s'agit ici de dire quelle base sera utilisée, existante ou non. Nous considérerons ici que un fichier GeoPackage = une couche, et nous allons donc créer une nouvelle base que nous utiliserons de la même manière qu'un fichier shapefile (sans utiliser la possibilité offerte par ce format de stocker plusieurs couches dans un seul fichier) : cliquer sur le bouton <b>...</b> et spécifiez le nom et l'emplacement de la couche qui sera créée</li>
						<li><b>Nom de la table :</b> ce champ est rempli automatiquement en fonction du nom spécifié ci-dessus</li>
						<li><b>Type de géométrie :</b> Point</li>
						<li><b>SCR :</b> afin que cette couche soit dans le même système que la carte, vérifier que le SCR soit bien le WGS84</li>
					</ul>
					<p>La partie suivante de la fenêtre va nous permettre de spécifier les colonnes qui seront présentes dans la table attributaire. Il sera toujours possible par la suite de supprimer ou d'ajouter de nouvelles colonnes.</p>
					<ul>
					   <li><b>Nom</b> : tapez <b>type</b> : un champ nommé type contiendra les valeurs école ou poste</li>
					   <li><b>Type</b> : choisissez <b>Donnée texte</b> car ce champ contiendra du texte et non des nombres</li>
					   <li><b>Longueur maximale :</b> pour un champ de type texte, ceci correspond au nombre maximum de caractères que pourra contenir le champ. Les mot "école" et "poste" comportent tous deux 5 caractères : une largeur de 5 suffirait ici. Pour avoir un peu de marge (supposons que l'on veuille par la suite ajouter un 3ème type de bâtiment), choisissons une largeur de <b>10</b>.</li>
					   <li>cliquez sur le bouton <b>Ajouter à la liste des champs</b>...</li>
					</ul>
					<p>...Et enfin sur <b>OK</b>.</p>
					<p>La couche est automatiquement ajoutée à QGIS.</p>
				</div>
				
			<h3>Vérification<a class="headerlink" id="V12" href="#V12"></a></h3>
				
			    <div class="manip">
			        <p>Allez dans les propriétés de la couche, rubrique <b>Information</b> :</p>
			        <figure>
						<a href="illustrations/tous/5_1_informations.png" >
							<img src="illustrations/tous/5_1_informations.png" alt="informations sur la couche (emplacement, SCR...)" width="530">
						</a>
				   </figure>
				   <p>Vous pouvez vérifier ici l'emplacement de votre couche (<b>chemin</b>), son <b>SCR</b>, le <b>nombre d'entités</b> qu'elle contient (à ce stade, 0).</p>
				   <p>Ouvrez la table attributaire :</p>
				   <figure>
						<a href="illustrations/tous/5_1_table_vide.png" >
							<img src="illustrations/tous/5_1_table_vide.png" alt="table attributaire de la couche batiments_oahu" width="570">
						</a>
				   </figure>
				   <p>Cette table ne contient aucune ligne, ce qui est normal car la couche ne contient aucune entité.</p>
				   <p>Par contre, elle contient 2 champs, <b>fid</b> et <b>type</b>, alors qu'on se serait attendu à ne voir que le champ type.</p>
			    </div>
			 
			    <p><b>A quoi correspond ce champ fid ?</b> Le GeoPackage étant une base de données, une colonne d'identifiant unique (<a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Cl%C3%A9_primaire">clé primaire</a>) est créée automatiquement lors de la création de la couche, afin d'identifier de manière unique chaque entité.</p>
			    <p>Cette colonne sera remplie automatiquement, mais néanmoins modifiable par l'utilisateur (vous&nbsp;!). Si 2 entités ont la même valeur pour ce champ fid, un message d'erreur sera affiché et il ne sera pas possible d'enregistrer les modifications. Le plus simple est donc de laisser le logiciel gérer ce champ.</p>
			    <p>Dans le chapitre suivant, nous allons ajouter des points à cette couche.</p>
				   
				
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
