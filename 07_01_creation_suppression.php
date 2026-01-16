<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">VII.  Créer, supprimer, renommer et calculer des champs</h1>
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
					<li><a href="#VII13">Pour aller plus loin : refactoriser les champs</a></li>
				</ul>
				<br>
				
			<p>Nous verrons ici comment ajouter et supprimer des champs dans la table attributaire d'une couche existante, et comment modifier l'ordre des champs.</p>

			<h3>Quels sont les champs présents dans une table&nbsp;?<a class="headerlink" id="VII11" href="#VII11"></a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_07_Champs.zip">communes_bretagne_calcul</a></em> (dossier <b>TutoQGIS_07_Champs</b>).</p>
					<p>Pour voir les champs de la table attributaire de cette couche, vous pouvez bien sûr ouvrir la table attributaire, mais vous pouvez également ouvrir les propriétés de la couche, rubrique <b>Champs</b> :</p>
					<figure>
						<a href="illustrations/7_1_proprietes_champs.jpg" >
							<img src="illustrations/7_1_proprietes_champs.jpg" alt="fenêtre des propriétés de la couche, rubrique champs" width="600" >
						</a>
					</figure>
					<p>Cette fenêtre vous permet de voir d'un seul coup d'œil la liste des champs, leur nom et leur type&nbsp;: <b>String</b> (texte), <b>Integer</b> (nombre entier) ou <b>Real</b> (nombre décimal)...</p>
				</div>		
			
			
			
			<h3>Créer et supprimer un champ à partir de la table attributaire<a class="headerlink" id="VII12" href="#VII12"></a></h3>
			
			    <h4>Créer un champ<a class="headerlink" id="VII12a" href="#VII12a"></a></h4>
			
    				<p>Nous allons ajouter un champs à la couche <em class="data">communes_bretagne_calcul</em>, nommé <b>NOM_DEPT</b>, destiné à contenir le nom du département de la commune.</p>
    				
    				<div class="manip">
    					<p>Ouvrez la table attributaire de la couche <em class="data">communes_bretagne_calcul</em>.</p>
    					<p><img class="icone" src="illustrations/7_1_edition_icone.jpg" alt="icône passer en mode édition" ><a href="05_02_points.php#V21">Passez en mode édition</a> pour cette couche.</p>
    					<p>Cliquez sur l'icône <b>Ajouter un champ</b> en haut de la table attributaire :</p>
    					<figure>
    						<img src="illustrations/7_1_BO_table_ajout.jpg" alt="barre d'outils de la table attributaire, icône d'ajout de champ entourée en rouge" width="600" >
    					</figure>
    					<p>La fenêtre suivante s'ouvre :</p>
    					<figure>
    						<a href="illustrations/7_1_ajout_fenetre.jpg" >
    							<img src="illustrations/7_1_ajout_fenetre.jpg" alt="fenêtre de création de colonne" width="400" >
    						</a>
    					</figure>
    					<ul>
    						<li class="espace"><b>Nom :</b> Tapez <b>nom_dept</b></li>
    						<li class="espace"><b>Type :</b> choisissez texte puisque nous voulons y mettre les noms des départements</li>
    						<li class="espace"><b>Longueur :</b> Dans le cas d'un champ type texte, cette valeur représente le nombre maximum de caractères que pourra contenir le champ. Tapez 50, ce qui devrait suffire.</li>
    					</ul>
    					<p>Cliquez sur <b>OK</b> ; le champ est ajouté à la table, rempli pour l'instant de valeurs nulles.</p>
    					<figure>
    						<a href="illustrations/7_1_table_nouveau_champ.jpg" >
    							<img src="illustrations/7_1_table_nouveau_champ.jpg" alt="table avec le champ CODE_DEPT vide" width="600" >
    						</a>
    					</figure>
    					<p>Quittez le mode édition en enregistrant les modifications.</p>
    				</div>
			
			     <h4>Modifier les valeurs d'un champ manuellement<a class="headerlink" id="VII12b" href="#VII12b"></a></h4>
			     
			         <p>Il est maintenant possible de taper du texte pour remplir le champ NOM_DEPT que nous venons de créer.</p>
			         <div class="manip">
			             <p><img class="icone" src="illustrations/7_1_edition_icone.jpg" alt="icône passer en mode édition" >Passez à nouveau en mode édition pour la couche <em class="data">communes_bretagne_calcul</em>.</p>
			             <p>Ouvrez sa table attributaire si ce n'est pas déjà fait.</p>
			             <p>Double-cliquez dans une case du champ <b>nom_dept</b> :</p>
			             <figure>
    						<a href="illustrations/7_1_table_modifier.jpg" >
    							<img src="illustrations/7_1_table_modifier.jpg" alt="double clic dans une case du champ CODE_DEPT vide" width="100" >
    						</a>
    					 </figure>
    					 <p>Et tapez-y la valeur correspondante (en vous aidant du champ <em>code_insee_du_departement</em> qui contient le <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Liste_des_d%C3%A9partements_fran%C3%A7ais#Liste_des_d%C3%A9partements">code du département</a>), terminez en appuyant sur la touche entrée&nbsp;:</p>
    					 <p>Vous pouvez tapez ainsi quelques valeurs.</p>
			         </div>
			         
			         <p>Vous remarquerez qu'il serait très long de remplir ainsi toutes les lignes de la table. Nous verrons dans le <a href="07_02_calculer.php#VII23c">chapitre suivant</a> comment remplir automatiquement un champ en fonction des valeurs d'un autre (ici, remplir le nom du département en fonction du code du département).</p>
			         
			         <div class="manip">
    					 <p>Quittez le mode édition en enregistrant les modifications.</p>
    			     </div>
			     
			     
			     <h4>Supprimer un champ existant<a class="headerlink" id="VII12c" href="#VII12c"></a></h4>
			
    				<p>Nous allons <b>supprimer le champ nom_dept</b> que vous venez de créer (nous créerons un autre champ nom_dept dans le <a href="07_02_calculer.php">chapitre suivant</a> que nous remplirons automatiquement).</p>
    				
    				<div class="manip">
    					<p>Passez à nouveau en mode édition pour la couche <em class="data">communes_bretagne_calcul</em>.</p>
    					<p>Cliquez sur l'icône <b>Supprimer la colonne</b> en haut de la table attributaire :</p>
    					<figure>
    						<img src="illustrations/7_1_BO_table_suppression.jpg" alt="barre d'outils de la table attributaire, icône de suppression de champ entourée en rouge" width="600" >
    					</figure>
    					<p>La fenêtre suivante apparaît :</p>
    					<figure>
    						<a href="illustrations/7_1_suppression_fenetre.jpg" >
    							<img src="illustrations/7_1_suppression_fenetre.jpg" alt="fenêtre de suppression de colonne" width="260" >
    						</a>
    					</figure>
    					<p>Sélectionnez le champ <b>nom_dept</b> puis cliquez sur <b>OK</b>.</p>
    					<p class="note">Notez qu'il est possible de sélectionner plusieurs champs dans cette fenêtre.</p>
    					<p>Le champ est supprimé. Quittez le mode édition en enregistrant les modifications.</p>
    				</div>
			
			    <h3>Pour aller plus loin : refactoriser les champs<a class="headerlink" id="VII13" href="#VII13"></a></h3>
			    
			       <p>Sous le nom un peu barbare de &#171; refactoriser &#187; se cache la possibilité de <b>renommer les champs</b>, ainsi que d'en <b>modifier l'ordre et le type</b> (texte, nombre...). Cet outil offre également la possibilité de créer ou supprimer des champs.</p>
			       <p>Notez que la couche en entrée ne sera pas directement modifiée, une nouvelle couche sera créée.</p>
			       <p>Nous n'utiliserons pas cet outil, mais vous trouverez ici une brève description de son fonctionnement.</p>
			       
			       
    		       <p>Pour accéder à l'outil : <b>boîte à outils Traitement  &#8594; Table vecteur &#8594; Refactoriser les champs</b>.</p>
		           <figure>
    				   <a href="illustrations/7_1_outil_refactoriser.jpg" >
    				       <img src="illustrations/7_1_outil_refactoriser.jpg" alt="Outil refactoriser dans la boîte à outils Traitement" width="350" >
    				   </a>
				   </figure>
 			          			    
				   <figure>
				    <a href="illustrations/7_1_refactoriser_fenetre.jpg" >
					 <img src="illustrations/7_1_refactoriser_fenetre.jpg" alt="Fenêtre de l'outil refactoriser" width="620" >
					</a>
				   </figure>
    					 
    				 <p>Pour <b>modifier l'ordre des champs</b>, sélectionnez un champ en cliquant sur le numéro de sa ligne, puis utilisez les boutons flèche haut et bas à droite de la fenêtre.
			         
			         <p>Pour <b>renommer un champ</b>, double-cliquez sur son nom (colonne Nom du champ) et tapez un nouveau nom. De même, vous pouvez changer son <b>type</b>, sa <b>longueur</b> et <b>précision</b>, et <b>recalculer ses valeurs</b> au moyen d'une expression (comme avec la <a href="07_02_calculer.php">calculatrice de champ</a>).</p>
			         
			         <p>Il est également possible <b>d'ajouter et supprimer un champ</b>, ainsi que <b>d'annuler toutes les modifications en cours</b>.</p>
			         
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
