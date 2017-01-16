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
			<h2>VII.1  Création et suppression de champs à partir de la table attributaire</h2>
				<ul class="listetitres">
					<li><a href="#VII11">Quels sont les champs présents dans une table ?</a></li>
					<li><a href="#VII12">Créer un nouveau champ</a></li>
					<li><a href="#VII13">Supprimer un champ existant</a></li>
				</ul>
				<br>
				
			<p></p>

			<h3><a class="titre" id="VII11">Quels sont les champs présents dans une table ?</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data">communes_NordPasDeCalais_calcul</em>.</p>
					<p>Pour voir les champs de la table attributaire de cette couche, vous pouvez bien sûr ouvrir la table attributaire, mais vous pouvez également ouvrir les propriétés de la couche, rubrique <b>Champs</b> :</p>
					<figure>
						<a href="illustrations/tous/7_1_proprietes_champs.png" >
							<img src="illustrations/tous/7_1_proprietes_champs.png" alt="fenêtre des propriétés de la couche, rubrique champs" height="360" >
						</a>
					</figure>
					<p>Cette fenêtre vous permet de voir d'un seul coup d'œil la liste des champs, leur type : <b>String</b> (texte), <b>Integer</b> (nombre entier) ou <b>Real</b> (nombre décimal), le mode d'édition (cf. <a href="05_03_donnees_attrib.php#V32" >partie V.3.2</a>)...</p>
				</div>		
			
			
			
			<h3><a class="titre" id="VII12">Créer un nouveau champ</a></h3>
			
				<p>Nous allons ajouter deux champs à la couche <em class="data">communes_NordPasDeCalais_calcul</em>, <b>CODE_DEPT</b> et <b>CODE_REG</b>, destinés à contenir par la suite le code de département et le code de région.</p>
				
				<div class="manip">
					<p>Ouvrez la table attributaire de la couche <em class="data">communes_NordPasDeCalais_calcul</em>. Passez en mode édition pour cette couche (cf. partie <a href="05_02_points.php#V21" >V.2.1</a>).</p>
					<p>Cliquez sur l'icône <b>Nouvelle colonne</b> en haut de la table attributaire :</p>
					<figure>
						<img src="illustrations/tous/7_1_BO_table_ajout.png" alt="barre d'outils de la table attributaire, icône d'ajout de champ entourée en rouge" height="33" >
					</figure>
					<p>La fenêtre suivante s'ouvre :</p>
					<figure>
						<a href="illustrations/tous/7_1_ajout_fenetre.png" >
							<img src="illustrations/tous/7_1_ajout_fenetre.png" alt="fenêtre de création de colonne" height="200" >
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Nom :</b> Tapez <b>CODE_DEPT</b></li>
						<li class="espace"><b>Commentaire :</b> ce champ peut contenir un commentaire, laissez-le vide</li>
						<li class="espace"><b>Type :</b> ce champ peut contenir les valeurs suivantes : texte, nombre entier, nombre décimal et date. Choisissez texte (on pourrait aussi choisir le type nombre entier, mais texte est souvent préférable pour les identifiants)</li>
						<li class="espace"><b>Longueur :</b> Dans le cas d'un champ type texte, cette valeur représente le nombre maximum de caractères que pourra contenir le champ. Tapez 3, pour prévoir le cas des départements d'outre-mer.</li>
					</ul>
					<p>Cliquez sur <b>OK</b> ; le champ est ajouté à la table, rempli pour l'instant de valeurs nulles.</p>
					<figure>
						<a href="illustrations/tous/7_1_table_nouveau_champ.png" >
							<img src="illustrations/tous/7_1_table_nouveau_champ.png" alt="table avec le champ CODE_DEPT vide" height="115" >
						</a>
					</figure>
					<p>Procédez de la même manière pour ajouter un champ <b>CODE_REG</b> :</p>
					<figure>
						<a href="illustrations/tous/7_1_ajout_fenetre_2.png" >
							<img src="illustrations/tous/7_1_ajout_fenetre_2.png" alt="fenêtre de création de colonne" height="200" >
						</a>
					</figure>
					<p>Quittez le mode édition en enregistrant les modifications. Ces champs seront remplis dans la <a href="07_03_calculer.php">partie VII.3</a>.</p>
				</div>
			
			<h3><a class="titre" id="VII13">Supprimer un champ existant</a></h3>
			
				<p>Nous allons supprimer le champ INSEE_COM (ne vous inquiétez pas, nous recréerons un champ code INSEE à partir du code de département et de commune, dans la <a href="07_03_calculer.php">partie VII.3</a>).</p>
				
				<div class="manip">
					<p>Passez à nouveau en mode édition pour la couche <em class="data">communes_NordPasDeCalais_calcul</em>.</p>
					<p>Cliquez sur l'icône <b>Supprimer la colonne</b> en haut de la table attributaire :</p>
					<figure>
						<img src="illustrations/tous/7_1_BO_table_suppression.png" alt="barre d'outils de la table attributaire, icône de suppression de champ entourée en rouge" height="33" >
					</figure>
					<p>La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/7_1_suppression_fenetre.png" >
							<img src="illustrations/tous/7_1_suppression_fenetre.png" alt="fenêtre de suppression de colonne" height="270" >
						</a>
					</figure>
					<p>Sélectionnez le champ <b>INSEE_COM</b> puis cliquez sur <b>OK</b>.</p>
					<p class="note">Notez qu'il est possible de sélectionner plusieurs champs dans cette fenêtre.</p>
					<p>Le champ est supprimé. Quittez le mode édition en enregistrant les modifications.</p>
				</div>
			
				
				<br>
				<a class="prec" href="07_00_champs.php">chapitre précédent</a>
				<a class="suiv" href="07_02_gestionnaire_table.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_7.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
