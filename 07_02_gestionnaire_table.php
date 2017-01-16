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
			<h2>VII.2  Une extension pratique : le gestionnaire de table</h2>
				<ul class="listetitres">
					<li><a href="#VII21">Installation de l'extension du gestionnaire de table</a></li>
					<li><a href="#VII22">Gérer les champs avec le gestionnaire de table</a></li>
				</ul>
				<br>
				

			<h3><a class="titre" id="VII21">Installation de l'extension du gestionnaire de table</a></h3>
			
				<p>L'extension <b>Gestionnaire de table</b> (Table Manager) permet de créer et supprimer des champs, ainsi que de renommer et changer l'ordre des champs, ce qui n'est pas possible directement dans la table attributaire.</p>
				<p>Comment installer cette extension ?</p>
				
				<div class="manip">
					<p>Rendez-vous dans le
						<a class="thumbnail_bottom" href="#thumb">Menu Extensions &#8594; Installer/Gérer les extensions
							<span>
								<img src="illustrations/tous/7_2_extensions_menu.png" alt="Menu Extensions, Installer/Gérer les extensions" height="100" >
							</span>
						</a>	
					:</p>
					<img src="illustrations/tous/7_2_install_gest.png" alt="Installation du gestionnaire de table" height="400" >
					<ul>
						<li>Vérifiez que vous êtes dans la rubrique <b>Tout</b></li>
						<li>Tapez <b>table</b> dans la partie <b>Rechercher</b></li>
						<li>Cliquez sur <b>Table Manager</b> dans la liste des extensions</li>
						<li>Puis sur <b>Installer l'extension</b> en bas à droite de la fenêtre</li>
					</ul>
					<p>Table Manager est maintenant visible dans la liste des extensions installées. Fermez la fenêtre.</p>
				</div>
			
			<h3><a class="titre" id="VII22">Gérer les champs avec le gestionnaire de table</a></h3>
				
				<div class="manip">
					<p>Sélectionnez la couche <em class="data">communes_NordPasDeCalais_calcul</em> dans la table des matières.</p>
					<p><img class="icone" src="illustrations/tous/7_2_gest_icone.png" alt="icône du gestionnaire de table" >Lancez le gestionnaire de table : soit via l'icône de la barre d'outils Vecteur, soit via le
						<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Table Manager &#8594; Gestionnaire de table
							<span>
								<img src="illustrations/tous/7_2_gest_menu.png" alt="Menu Vecteur, Table Manager, Gestionnaire de table" height="200" >
							</span>
						</a>	 
					.</p>
					<figure>
						<a href="illustrations/tous/7_2_gest_fenetre.png" >
							<img src="illustrations/tous/7_2_gest_fenetre.png" alt="Fenêtre du gestionnaire de table" height="400" >
						</a>
					</figure>
				</div>
				<p>Le gestionnaire de table permet la création de nouveaux champs via le bouton <b>Insérer</b>. Une fois un champ sélectionné dans la liste, il est possible de le <b>supprimer</b>, <b>renommer</b> ou de <b>changer sa position</b> par rapport aux autres champs.</p>
				<p>A tout moment, l'onglet <b>Aperçu de la table</b> permet de prévisualiser la table une fois vos changements effectués.</p>
				<p>Pour sauvegarder vos modifications, deux possibilités : le bouton <b>Enregistrer</b> sauvegarde directement les modifications, le bouton <b>Enregistrer sous...</b> crée une nouvelle couche.</p>
				<div class="manip">				
					<p>Nous allons simplement modifier l'ordre des champs pour remonter CODE_DEPT et CODE_REG&nbsp;: sélectionnez CODE_REG et cliquez sur <b>Vers le haut</b> jusqu'à ce que le champ soit en deuxième position, derrière ID_GEOFLA. Faites également remonter CODE_DEPT en troisième position.</p>
					<p>Cliquez sur <b>Enregistrer</b> : une fenêtre apparaît vous demandant si vous souhaitez conserver ou non le style de la couche. Choisissez <b>Oui</b> ou <b>Non</b>, au choix (<b>Oui</b> conservera le style actuel de la couche, <b>Non</b> générera un nouveau style au hasard).</p>
				</div>
				

				
				
				<br>
				<a class="prec" href="07_01_creation_suppression.php">chapitre précédent</a>
				<a class="suiv" href="07_03_calculer.php">chapitre suivant</a>
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
