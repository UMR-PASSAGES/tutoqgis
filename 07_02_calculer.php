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
			<h2>VII.2  Calcul de champs</h2>
				<ul class="listetitres">
					<li><a href="#VII21">Comment fonctionne la calculatrice de champ ?</a></li>
					<li><a href="#VII22">Calcul de géométrie : l'exemple de la surface</a>
						<ul class="listesoustitres">
							<li><a href="#VII22a">Calcul de la surface</a></li>
							<li><a href="#VII22b">Vérification</a></li>
						</ul>
					</li>
					<li><a href="#VII23">Quelques exemples supplémentaires de calculs</a>
						<ul class="listesoustitres">
							<li><a href="#VII23a">Opérations mathématiques : calcul de densité</a></li>
							<li><a href="#VII23b">Opérations sur du texte : extraction</a></li>
							<li><a href="#VII23c">Pour aller plus loin : utiliser une expression conditionnelle avec CASE<</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Il est possible de calculer automatiquement les valeurs d'un champ au moyen de la calculatrice de champ, un peu à la manière d'une formule dans un tableur.</p>

			<h3><a class="titre" id="VII21">Comment fonctionne la calculatrice de champ ?</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_07_Champs.zip">communes_Bretagne_calcul</a></em>. Ouvrez sa table attributaire.</p>
					<p>Passez en <a href="05_02_points.php#V21">mode édition</a>. Cliquez sur l'icône <b>Ouvrir la calculatrice de champs</b> parmi les icônes de la table attributaire :</p>
					<figure>
						<img src="illustrations/tous/7_2_BO_table_calc.png" alt="barre d'outils de la table attributaire, avec icône de la calculatrice de champs entourée en rouge" width="600" >
					</figure>
				</div>
				
				<p>La fenêtre suivante s'ouvre :</p>
				<figure>
					<a href="illustrations/tous/7_2_calc_fenetre.png" >
						<img src="illustrations/tous/7_2_calc_fenetre.png" alt="Fenêtre de la calculatrice de champs" width="620" >
					</a>
				</figure>
				<p><em class="numero">1</em> : Si cette case est cochée, seules les lignes sélectionnées seront modifiées (en grisé si aucune entité n'est sélectionnée).</p>
				<p><em class="numero">2</em> : Cocher cette case pour créer un nouveau champ.</p>
				<p><em class="numero">3</em> : Cocher cette case pour mettre à jour un champ existant.</p>
				<p><em class="numero">4</em> : Les opérateurs les plus couramment utilisés.</p>
				<p><em class="numero">5</em> : Expression servant à calculer les valeurs du champ.</p>
				<p><em class="numero">6</em> : Liste des opérateurs et fonctions disponibles pour le calcul de champ.</p>
				<p><em class="numero">7</em> : Si un opérateur ou une fonction est choisi en 6, l'aide correspondante apparaît dans cette partie.</p>
				<p><em class="numero">8</em> : Ici, une fois l'expression remplie, vous pourrez voir un aperçu du résultat du calcul.</p>
				<p>Comme vous avez pu le constater, le mode de fonctionnement de la calculatrice de champ est assez similaire à celui d'une <a href="06_01_req_attrib.php">requête attributaire</a>. </p>
				<p class="note">Il n'est pas obligatoire de passer en mode édition pour utiliser la calculatrice de champ ; dans ce cas, cliquer sur OK dans la calculatrice enclenche le mode édition.</p>
				
			
			<h3><a class="titre" id="VII22">Calcul de géométrie : l'exemple de la surface</a></h3>
			
				<h4><a class="titre" id="VII22a">Calcul de la surface</a></h4>
			
					<p>Nous allons ici calculer la surface de chaque commune en km<sup>2</sup>.</p>
					<div class="manip">
						<figure>
							<a href="illustrations/tous/7_2_calc_fenetre_surface.png">
								<img src="illustrations/tous/7_2_calc_fenetre_surface.png" alt="Fenêtre de la calculatrice de champs, pour calculer la surface d'une commune en km2" width="100%" >
							</a>
						</figure>
						<ul>
							<li class="espace">Choisissez <b>Créer un nouveau champ</b></li>
							<li class="espace">Nommez le <b>SURF_KM2</b></li>
							<li class="espace">Choisissez le type <b>Nombre décimal</b>. Contrairement au shapefile, avec le format GeoPackage les valeurs sont toujours stockées &#171; telles quelles &#187; et il n'est donc pas possible de définir une longueur (nombre total de chiffres) ou une précision (nombre de chiffres après la virgule)</li>
							<li class="espace">Dans la liste des fonctions, dans la rubrique <b>Géométrie</b>, double-cliquez sur la fonction <b>$area</b> puis rajoutez à la main dans la case expression <b>/ 1000000</b> (par défaut, la surface est calculée en unités de la couche, donc en m² puisque cette couche est projetée en Lambert 93)</li>
							<li class="espace">Au final, l'expression est donc <b>$area / 1000000</b></li>
							<li class="espace">cliquez sur <b>OK</b></li>
						</ul>
					</div>
					<p class="note">Avez-vous noté qu'il est possible de créer des <b>champs virtuels</b> (case à cocher en haut à gauche sous &#171;&nbsp;créer un nouveau champ&#187;&nbsp;) ? Ces champs ne sont pas permanents et ne seront pas sauvegardés (il est donc possible d'en créer sans passer en mode édition).</p>
					<p class="note">Si un champ virtuel est utilisé pour calculer par exemple une surface, et si les polygones sont modifiés, <b>la surface sera automatiquement mise à jour</b>. </p>
						
				<h4><a class="titre" id="VII22b">Vérification</a></h4>
					
					<p>Parfois, il peut arriver de se mélanger dans les unités... Il peut être utile de vérifier les calculs de géométrie. Nous allons voir 2 méthodes pour le faire; cela vous indique aussi comment connaître par exemple la surface d'un polygone donné sans forcément créer et calculer un champ.</p>
					<p>La première méthode consiste à <b>mesurer &#171;&nbsp;à la main&nbsp;&#187; la surface d'une commune et à comparer le résultat avec celui du champ SURF_KM2</b>.</p>
					<div class="manip">
						<p><img class="iconemid" src="illustrations/tous/7_2_mesure_icone.png" alt="icône mesurer une aire" >Vous pouvez vérifier votre calcul au moyen de l'outil <b>Mesurer une aire</b> : </p>
						<figure>
						  <a href="illustrations/tous/7_2_aire_selection.png" >
							<img src="illustrations/tous/7_2_aire_selection.png" alt="Sélection de l'outil mesurer une aire dans la liste" width="280" >
						  </a>
						</figure>
						<p>Sélectionnez une commune, mesurez son aire en faisant un clic droit sur le dernier sommet pour terminer, choisissez dans la table l'option <b>Ne montrer que les entités sélectionnées</b> et comparer l'aire que vous avez mesuré et l'aire du champ SURF_KM2.</p>
						<figure>
							<a href="illustrations/tous/7_2_verif_surf.png" >
								<img src="illustrations/tous/7_2_verif_surf.png" alt="Vérification de la surface au moyen de l'outil mesurer une aire" width="100%" >
							</a>
						</figure>
						<p>Les deux aires devraient être sensiblement égales.</p>
					</div>
					
					<p>La deuxième méthode utilise l'outil <b>Identifier des entités</b>.</p>
					
					<div class="manip">
					   <p><img class="iconemid" src="illustrations/tous/7_2_identifier_icone.png" alt="icône Identifier des entités" >Cliquer sur l'icône <b>Identifier des entités</b> puis sur une commune.</p>
					   <p>Cette commune prend une transparence rouge avec une bordure rouge, et les informations relatives à cette entité apparaissent dans le panneau <b>Résultats de l'identification</b>. On peut y lire les données de la table attributaire pour cette commune, mais également des informations <b>dérivées</b> liées à sa géométrie telles que son périmètre, sa surface...</p>
					   <figure>
							<a href="illustrations/tous/7_2_verif_surf_identifier.png" >
								<img src="illustrations/tous/7_2_verif_surf_identifier.png" alt="Vérification de la surface au moyen de l'outil d'identification" width="100%" >
							</a>
						</figure>
					   <p>Comparez la surface du champ SURF_KM2 et la surface indiquée dans les résultats de l'identification (rubrique Dérivé). Les deux aires devraient être sensiblement égales (attention à convertir les unités).</p>
					</div>
					
					<p>Vous remarquerez qu'on peut lire 2 surfaces dans les résultats de l'identification : <b>la surface cartésienne, et la surface basée sur une ellipsoïde</b>. La première est basée sur des distances en ligne droite, qui ne prennent pas en compte la courbure de la Terre. La deuxième prend en compte la courbure de la Terre en se basant sur l'ellipsoïde indiquée.</p>
					<p>Pour de faibles distances, les 2 résultats seront donc très proches, la différence augmentant avec la distance.</p>
									
				
			
			<h3><a class="titre" id="VII23">Quelques exemples supplémentaires de calculs</a></h3>
			
				<p>La calculatrice de champs offre beaucoup de fonctions que nous ne passerons pas toutes en revue&nbsp;; nous verrons simplement quelques exemples pour vous donner un aperçu des possibilités.</p>

				<h4><a class="titre" id="VII23a">Opérations mathématiques : calcul de densité</a></h4>
				
					<p>L'objectif sera ici de calculer la densité en habitants par km<sup>2</sup> de chaque commune, à partir de la population et la surface.</p>
					<div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">Savez-vous comment calculer la densité à partir de la population et la surface ?</label></p>
							<p class="reponse">La densité se calcule en divisant la population par la surface. Si la population est en nombre d'habitants et la surface en km<sup>2</sup>, alors la densité sera en nombre d'habitants par km<sup>2</sup>.</p>
					</div>
					
					<div class="manip">
						<p>Si ce n'est pas déjà fait, ouvrez la table attributaire de la couche  <em class="data"><a href="donnees/TutoQGIS_07_Champs.zip">communes_Bretagne_calcul</a></em>. Ouvrez la calculatrice de champs :</p>
						<figure>
							<a href="illustrations/tous/7_2_calc_densite.png" >
								<img src="illustrations/tous/7_2_calc_densite.png" alt="Fenêtre de la calculatrice de champ, calcul de la densité" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Choisissez l'option <b>Créer un nouveau champ</b>, nommez-le <b>DENSITE</b>, type <b>Nombre décimal</b></li>
							<li class="espace">Dans la liste des <b>fonctions</b>, rubrique <b>Champs et valeurs</b>, double-cliquez sur <b>POPULATION</b>, le diviseur <b>/</b> puis double-cliquez sur le champ <b>SURF_KM2</b></li>
							<li class="espace">Au final, l'expression est <b> "POPULATION" / "SURF_KM2" </b></li>
							<li class="espace">Cliquez sur <b>OK</b> : le champ densité est ajouté et calculé, en nombre d'habitants par km&#178; :</li>
						</ul>
						<figure>
						  <a href="illustrations/tous/7_2_densite_table.png" >
							<img src="illustrations/tous/7_2_densite_table.png" alt="Table attributaire avec les 3 colonnes population, surface et densité" width="80%" >
						  </a>
						</figure>
					</div>
					
				<h4><a class="titre" id="VII23b">Opérations sur du texte : extraction</a></h4>
				
					<p>La couche <em class="data"><a href="donnees/TutoQGIS_07_Champs.zip">communes_Bretagne_calcul</a></em> comporte une colonne INSEE_COM avec le code INSEE des communes. Ce code INSEE est constitué du code du département (2 chiffres pour la Bretagne) et du code commune (3 chiffres).</p>
					<p>Le but est ici d'<b>extraire le code commune</b> du code INSEE, donc les 3 derniers chiffres de ce dernier. Par exemple, la commune de Dirinon a comme code INSEE 29045 : le nouveau champ CODE_COM aura la valeur 045 pour cette commune.</p>
				
					<div class="manip">
						<p>Si ce n'est pas déjà fait, ouvrez la table attributaire de la couche <em class="data">communes_Bretagne</em>. Ouvrez la calculatrice de champs :</p>
						<figure>
							<a href="illustrations/tous/7_2_calcul_fenetre_right.png" >
								<img src="illustrations/tous/7_2_calcul_fenetre_right.png" alt="Calculatrice de champ : calcul du code commune à partir du code INSEE avec la fonction right" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Vérifiez que la case <b>Ne mettre à jour que les x entités sélectionnées</b> soit décochée, puisque le but est de mettre à jour toutes les lignes de la table</li>
							<li class="espace">Choisissez <b>Créer un nouveau champ</b></li>
							<li class="espace">Nommez-le <b>CODE_COM</b>, type <b>Texte</b>, longueur <b>3</b></li>
							<li class="espace">Dans la liste des fonctions, allez dans la rubrique <b>Chaîne</b> (texte) et cliquez sur la fonction <b>right</b> : vous pouvez lire l'aide à droite. Cette fonction extrait les caractères les plus à droite d'un texte.</li>
							<li class="espace">La fonction right nécessite deux paramètres : le texte d'où seront extraits les caractères (ici, le champ <b>INSEE_COM</b>) et le nombre de caractères à extraire (ici, <b>3</b> puisque le code commune codé sur 3 caractères)</li>
							<li class="espace">L'expression est donc <b>right( "INSEE_COM", 3)</b></li>
							<li class="espace">Cliquez sur <b>OK</b> : le champ CODE_COM est créé et mis à jour :</li>
						</ul>
						<figure>
						  <a href="illustrations/tous/7_2_table_codeinsee.png" >
							<img src="illustrations/tous/7_2_table_codeinsee.png" alt="extrait de la table avec les champs INSEE_CM et CODE_COM" width="80%" >
						  </a>
						</figure>
					</div>
					
				<h4><a class="titre" id="VII23c">Pour aller plus loin : utiliser une expression conditionnelle avec CASE</a></h4>
				
				    <p>Nous allons ici voir un exemple d'expression un peu plus complexe pour écrire dans un nouveau champ le nom du département en fonction de son code.</p>
				    <p>Le but est ici de vous montrer que tout est possible, ou presque ! Il est possible de faire les calculs dans un tableur pour joindre ensuite les données, mais cela nécessite moins d'étapes de tout faire dans QGIS.</p>
				    <p>Pour cette étape, il vous faudra connaître les noms des 4 départements bretons associés à leur code ! Vous pouvez aussi consulter <a href="https://fr.wikipedia.org/wiki/Num%C3%A9rotation_des_d%C3%A9partements_fran%C3%A7ais#/media/Fichier:D%C3%A9partements_de_France_nom+num.svg" >cette carte</a> issue de Wikipedia.</p>
				    
				    <div class="manip">
				        <p>Comme d'habitude, ouvrez la calculatrice de champs.</p>
				        <p>Nous allons créer un nouveau champ nommé <b>NOM_DEP</b> de type <b>texte</b> et de longueur maximale <b>50</b>.</p>
				        <p>Dans la rubrique <b>Conditions</b> de la liste des opérateurs, cliquez sur <b>CASE</b> et lisez l'aide associée à cette fonction dans la partie droite de la fenêtre.</p>
				        <figure>
						  <a href="illustrations/tous/7_2_aide_case.png" >
							<img src="illustrations/tous/7_2_aide_case.png" alt="CASE et la rubrique d'aide associée" width="80%" >
						  </a>
						</figure>
						<p>Cette fonction commence par <b>CASE</b> et se termine par <b>END</b>. Entre les deux, on trouve une série de clauses avec les 2 mots-clés <b>WHEN</b>, pour définir un critère, et <b>THEN</b>, pour définir comment sera calculée la valeur si le critère est rempli. Nous n'utiliserons pas <b>ELSE</b> ici.</p>
						<div class="question">
                    		<input type="checkbox" id="faq-2">
                    		<p><label for="faq-2">A votre avis, combien de clauses WHEN ... THEN ... devra comporter notre expression&nbsp;?</label></p>
                    		<p class="reponse">Nous devrons écrire 4 clauses différentes, une pour chaque département.</p>
                    	</div>
                    	<p>Pour le département du Finistère, nous écrirons par exemple</p>
                    	<p class="code">WHEN "INSEE_DEP" = '29' THEN 'Finistère'</p>
                    	<div class="question">
                    		<input type="checkbox" id="faq-3">
                    		<p><label for="faq-3">Pouvez-vous écrire dans son entier l'expression utilisée pour écrire le nom du département en fonction de son code&nbsp;?</label></p>
                    		<p class="reponse">L'expression sera la suivante : <b>CASE
WHEN  "INSEE_DEP" = '29' THEN 'Finistère'
WHEN  "INSEE_DEP" = '22' THEN 'Côtes-d\'Armor'
WHEN  "INSEE_DEP" = '35' THEN 'Ille-et-Vilaine'
WHEN  "INSEE_DEP" = '56' THEN 'Morbihan' 
END</b></p>
                            <p class="reponse">Attention, il y a un piège&nbsp;! Pour que l'apostrophe de &#171; Côtes-d'Armor &#187; ne soit pas considéré comme celui de fin de la chaîne de caractères, il faut &#171; l'échapper &#187; avec le caractère antislash <b>\</b>.</p>
                    	</div>
                    	<p>Au final, la calculatrice doit être paramétrée comme suit :</p>
                    	<figure>
						  <a href="illustrations/tous/7_2_calc_case.png" >
							<img src="illustrations/tous/7_2_calc_case.png" alt="calculatrice de champ avec une expression utilisant CASE" width="100%" >
						  </a>
						</figure>
						<p>Et le résultat :</p>
						<figure>
						  <a href="illustrations/tous/7_2_table_nomdep.png" >
							<img src="illustrations/tous/7_2_table_nomdep.png" alt="Extrait de la table avec le code et le nom du département" width="80%" >
						  </a>
						</figure>

				    </div>
				    
				    <p>Avez-vous remarqué qu'il existe dans la liste des opérateurs une rubrique <b>Récent</b> vous permettant de retrouver en un clic les expressions que vous avez déjà utilisées dans la calculatrice de champs&nbsp;?<p>
					
					
					
				<br>
				<a class="prec" href="07_01_creation_suppression.php">chapitre précédent</a>
				<a class="suiv" href="08_00_jointures.php">partie VIII : jointures</a>
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