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
			<h2>VII.1  Manipulation de champs</h2>
				<ul class="listetitres">
					<li><a href="#VII11">Quels sont les champs présents dans une table&nbsp;?</a></li>
					<li><a href="#VII12">Créer et supprimer un champ à partir de la table attributaire</a>
					   <ul class="listesoustitres">
							<li><a href="#VII12a">Créer un champ</a></li>
							<li><a href="#VII12b">Modifier les valeurs d'un champ manuellement</a></li>
							<li><a href="#VII12c">Supprimer un champ existant</a></li>
						</ul>
					</li>
					<li><a href="#VII13">Pour aller plus loin : refactoriser les champs</a>
					   <ul class="listesoustitres">
							<li><a href="#VII13a">Accéder à l'outil de refactorisation de champs</a></li>
							<li><a href="#VII13b">Modifier l'ordre des champs</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Nous verrons ici comment ajouter et supprimer des champs dans la table attributaire d'une couche existante, et comment modifier l'ordre des champs.</p>

			<h3><a class="titre" id="VII11">Quels sont les champs présents dans une table ?</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_07_Champs.zip">communes_Bretagne_calcul</a></em>.</p>
					<p>Pour voir les champs de la table attributaire de cette couche, vous pouvez bien sûr ouvrir la table attributaire, mais vous pouvez également ouvrir les propriétés de la couche, rubrique <b>Champs source</b> :</p>
					<figure>
						<a href="illustrations/tous/7_1_proprietes_champs.png" >
							<img src="illustrations/tous/7_1_proprietes_champs.png" alt="fenêtre des propriétés de la couche, rubrique champs" width="600" >
						</a>
					</figure>
					<p>Cette fenêtre vous permet de voir d'un seul coup d'œil la liste des champs, leur type : <b>String</b> (texte), <b>Integer</b> (nombre entier) ou <b>Real</b> (nombre décimal), le <a href="05_03_donnees_attrib.php#V32">mode d'édition</a> ...</p>
				</div>		
			
			
			
			<h3><a class="titre" id="VII12">Créer et supprimer un champ à partir de la table attributaire</a></h3>
			
			    <h4><a class="titre" id="VII12a">Créer un champ</a></h4>
			
    				<p>Nous allons ajouter un champs à la couche <em class="data">communes_Bretagne_calcul</em>, nommé <b>NOM_DEPT</b>, destiné à contenir le nom du département de la commune.</p>
    				
    				<div class="manip">
    					<p>Ouvrez la table attributaire de la couche <em class="data">communes_Bretagne_calcul</em>. <a href="05_02_points.php#V21">Passez en mode édition</a> pour cette couche.</p>
    					<p>Cliquez sur l'icône <b>Ajouter un champ</b> en haut de la table attributaire :</p>
    					<figure>
    						<img src="illustrations/tous/7_1_BO_table_ajout.png" alt="barre d'outils de la table attributaire, icône d'ajout de champ entourée en rouge" width="600" >
    					</figure>
    					<p>La fenêtre suivante s'ouvre :</p>
    					<figure>
    						<a href="illustrations/tous/7_1_ajout_fenetre.png" >
    							<img src="illustrations/tous/7_1_ajout_fenetre.png" alt="fenêtre de création de colonne" width="400" >
    						</a>
    					</figure>
    					<ul>
    						<li class="espace"><b>Nom :</b> Tapez <b>NOM_DEPT</b></li>
    						<li class="espace"><b>Commentaire :</b> ce champ peut contenir un commentaire, laissez-le vide</li>
    						<li class="espace"><b>Type :</b> ce champ peut contenir les valeurs suivantes : texte, nombre entier, nombre décimal et date. Choisissez texte puisque nous voulons y mettre les noms des départements</li>
    						<li class="espace"><b>Longueur :</b> Dans le cas d'un champ type texte, cette valeur représente le nombre maximum de caractères que pourra contenir le champ. Tapez 50, ce qui devrait suffire.</li>
    					</ul>
    					<p>Cliquez sur <b>OK</b> ; le champ est ajouté à la table, rempli pour l'instant de valeurs nulles.</p>
    					<figure>
    						<a href="illustrations/tous/7_1_table_nouveau_champ.png" >
    							<img src="illustrations/tous/7_1_table_nouveau_champ.png" alt="table avec le champ CODE_DEPT vide" width="600" >
    						</a>
    					</figure>
    					<p>Quittez le mode édition en enregistrant les modifications.</p>
    				</div>
			
			     <h4><a class="titre" id="VII12b">Modifier les valeurs d'un champ manuellement</a></h4>
			     
			         <p>Il est maintenant possible de taper du texte pour remplir le champ NOM_DEPT que nous venons de créer.</p>
			         <div class="manip">
			             <p>Passez à nouveau en mode édition pour la couche <em class="data">communes_Bretagne_calcul</em>.</p>
			             <p>Ouvrez sa table attributaire si ce n'est pas déjà fait.</p>
			         </div>
			     
			     
			     <h4><a class="titre" id="VII12c">Supprimer un champ existant</a></h4>
			
    				<p>Nous allons supprimer le champ INSEE_COM (ne vous inquiétez pas, nous recréerons un champ code INSEE à partir du code de département et de commune, dans la partie <a href="07_02_calculer.php">Calcul de champ</a>).</p>
    				
    				<div class="manip">
    					<p>Passez à nouveau en mode édition pour la couche <em class="data">communes_Bretagne_calcul</em>.</p>
    					<p>Cliquez sur l'icône <b>Supprimer la colonne</b> en haut de la table attributaire :</p>
    					<figure>
    						<img src="illustrations/tous/7_1_BO_table_suppression.png" alt="barre d'outils de la table attributaire, icône de suppression de champ entourée en rouge" width="600" >
    					</figure>
    					<p>La fenêtre suivante apparaît :</p>
    					<figure>
    						<a href="illustrations/tous/7_1_suppression_fenetre.png" >
    							<img src="illustrations/tous/7_1_suppression_fenetre.png" alt="fenêtre de suppression de colonne" width="240" >
    						</a>
    					</figure>
    					<p>Sélectionnez le champ <b>INSEE_COM</b> puis cliquez sur <b>OK</b>.</p>
    					<p class="note">Notez qu'il est possible de sélectionner plusieurs champs dans cette fenêtre.</p>
    					<p>Le champ est supprimé. Quittez le mode édition en enregistrant les modifications.</p>
    				</div>
			
			    <h3><a class="titre" id="VII13">Pour aller plus loin : refactoriser les champs</a></h3>
			    
			       <p>Sous le nom un peu barbare de &#171; refactoriser &#187; se cache la possibilité de <b>renommer les champs</b>, ainsi que d'en <b>modifier l'ordre et le type</b> (texte, nombre...). Cet outil offre également la possibilité de créer ou supprimer des champs.</p>
			       <p>Notez que la couche en entrée ne sera pas directement modifiée, une nouvelle couche sera créée.</p>
			       
			       <h4><a class="titre" id="VII13a">Accéder à l'outil de refactorisation de champs</a></h4>
			       
			         <p>Cet outil est disponible dans la <b>boîte à outils Traitement</b>.</p>
			         
			         <div class="manip">
			             <p>Si vous ne voyez pas cette boîte à outils : <b>menu Traitement &#8594; Boîte à outils</b>, ou bien <b>menu Vue &#8594; Panneaux &#8594; Boîte à outils de traitements</b>.</p>
			             <p>Dans la boîte à outils : <b>Table vecteur &#8594; Refactoriser les champs</b> :</p>
			             <figure>
    						<a href="illustrations/tous/7_1_outil_refactoriser.png" >
    							<img src="illustrations/tous/7_1_outil_refactoriser.png" alt="Outil refactoriser dans la boîte à outils Traitement" width="350" >
    						</a>
    					 </figure>
    					 
 			       <h4><a class="titre" id="VII13b">Modifier l'ordre des champs</a></h4>
 			          			    
    					 <p>Double-cliquez sur cet outil. Nous allons simplement <b>modifier l'ordre des champs</b> pour remonter CODE_DEPT et CODE_REG créés précédemment.</p>
    					 <figure>
    						<a href="illustrations/tous/7_1_refactoriser_fenetre.png" >
    							<img src="illustrations/tous/7_1_refactoriser_fenetre.png" alt="Fenêtre de l'outil refactoriser" width="600" >
    						</a>
    					 </figure>
    					 <ul>
    					   <li class="espace">Vérifiez que la couche <em class="data">communes_Bretagne_calcul</em> soit bien sélectionnée en entrée</li>
    					   <li class="espace">Cliquez sur le champ <b>CODE_DEPT</b> puis sur le bouton de flèche vers le haut à droite de la liste des champs, pour le faire remonter en cinquième position</li>
    					   <li class="espace">Procédez de même pour que le champ <b>CODE_REG</b> soit en sixième position</li>
    					   <li class="espace">Laissez <b>Créer une couche temporaire</b> afin de créer en sortie une couche temporaire</li>
    					   <li class="espace">Cliquez enfin sur <b>Exécuter</b> et fermez la fenêtre de l'outil une fois le traitement fini.</li>
    					 </ul>
    					 <p>Ouvrez la table attributaire de la couche temporaire <b>Couche refactorisée</b> : l'ordre des champs a bien été modifié.
			         </div>
			         
			         <p>En double-cliquant dans la case <b>Nom du champ</b> d'un champ, vous pouvez le <b>renommer</b>. De même, vous pouvez changer son <b>type</b>, sa <b>longueur</b> et <b>précision</b>, et <b>recalculer ses valeurs</b> au moyen d'une expression (comme avec la <a href="07_02_calculer.php">calculatrice de champ</a>).</p>
			         <p>Les boutons à droite de la liste de champ permettent, de haut en bas : l'<b>ajout</b> et la <b>suppression</b> d'un champ, <b>déplacer</b> un champ vers le haut ou vers le bas, et <b>annuler toutes les modifications en cours</b>.</p>
			         
			         <p>Dans le chapitre suivant, nous verrons comment calculer automatiquement les valeurs d'un champ au moyen d'une formule, à l'aide de la calculatrice de champ&nbsp;!</p>
				
				<br>
				<a class="prec" href="07_00_champs.php">chapitre précédent</a>
				<a class="suiv" href="07_02_calculer.php">chapitre suivant</a>
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
