<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		
		<div class="main">
		  <h1 class="hide_for_pdf">XI.  Automatisation de traitements</h1>
			<h2>XI.2  Exécuter un outil &#171; par lot &#187;</h2>
				
				<p>L'outil de découpage est accessible via la boîte à outils&nbsp;; tous les outils de cette boîte peuvent être exécutés <b>par lot</b>.</p>
				
				<div class="manip">
					<p>Pour lancer l'outil de découpage en mode &#171;&nbsp;par lot&nbsp;&#187;&nbsp;: dans la boîte à outils, <b>clic droit sur Couper &#8594; Exécuter comme processus de lot...</b></p>
					<p>Dans la fenêtre qui s'ouvre, <b>chaque ligne correspond à une instance de l'outil</b>. L'outil sera donc lancé autant de fois qu'il y a de lignes.</p>
					<p><b>Chaque colonne correspond à un paramètre</b> : la 1ère colonne à la couche en entrée, la 2ème à la couche de découpage (masque), la 3ème à la couche qui sera créée.</p>
					<p>Pour remplir chacune des colonnes :</p>
					<ul>
						<li class="espace"><b>Couche source&nbsp;:</b> sur la première ligne, cliquer sur <b>Auto-remplissage…</b> &#8594; <b>Sélectionner à partir des couches chargées</b> et cochez les 4 couches OSM à découper</li>
						<li class="espace">Supprimez ensuite la ligne créée par défaut : il faut la sélectionner en cliquant sur son numéro de ligne (2) puis cliquer sur le bouton <b>Supprimer la/les ligne(s)</b> (signe &#171;&nbsp;-&nbsp;&#187; rouge). Vérifiez que vous avez bien 4 lignes correspondant aux 4 couches building, natural, place et route, en plus de la première ligne <em>Auto-remplissage</em></li>
						<li class="espace"><b>Couche de superposition :</b> sélectionnez <b>Sainte_Radegonde_des_Noyers</b> sur la ligne 2, puis cliquez sur <b>Auto-remplissage… &#8594; Remplir</b></li>
						<li class="espace"><b>Découpé :</b> cliquer sur les <b>…</b> de la ligne 2, rendez-vous dans le dossier où vous voulez créer les nouvelles couches, tapez <b>decoupe_</b> et cliquez sur <b>Enregistrer</b>. Dans la fenêtre qui s'ouvre : choisir 
						<a class="thumbnail_bottom" href="#thumb">Remplir avec les valeurs du paramètre, Couche source
                        	<span>
                        		<img src="illustrations/11_02_remplir_val_parametre.jpg" alt="Fenêtre pour choisir de compléter le nom de chaque couche résultat en fonction de la couche en entrée" width="500" >
                        	</span>
                        </a>, afin que le nom de chaque couche qui sera créée soit complété par le nom de la couche OSM de départ.</li>
					</ul>
					<p>N'oubliez pas de cocher la case <b>Charger les couches</b> pour que les couches résultat soient automatiquement ajoutées à QGIS.</p>
					<p>Au final, vous devez obtenir quelque chose de similaire à ceci (cliquez sur l'image pour la voir en plus grand) :</p>
					<figure>
						<a href="illustrations/11_02_lot_complet.jpg" >
							<img src="illustrations/11_02_lot_complet.jpg" alt="Traitement par lot : fenêtre avec paramètres complétés" width="600">
						</a>
					</figure>
					<p>Cliquer sur <b>Exécuter</b>, patienter… Les 4 couches sont créées et ajoutées à QGIS.</p>
				</div>
				
				<p>Tous les outils de la boîte Traitements sont exécutables par lot.</p>
				<p>Mais comment faire maintenant si on doit répéter plusieurs fois une chaîne de traitement, par exemple découper une couche par une autre puis modifier son SCR&nbsp;?</p>
				
				<br>
				<a class="prec" href="11_01_traitement_de_base.php">chapitre précédent</a>
				<a class="suiv" href="11_03_modeleur.php">chapitre suivant</a>
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
