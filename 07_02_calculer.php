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
							<li><a href="#VII23b">Opérations sur du texte : extraction des codes et noms de régions et départements</a></li>
							<li><a href="#VII23c">Opérations sur du texte : concaténation</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p>Il est possible de calculer automatiquement les valeurs d'un champ au moyen de la calculatrice de champ, un peu à la manière d'une requête attributaire.</p>

			<h3><a class="titre" id="VII21">Comment fonctionne la calculatrice de champ ?</a></h3>
			
				<div class="manip">
					<p>Toujours dans le même projet QGIS, avec uniquement la couche <em class="data">communes_NordPasDeCalais_calcul</em>, ouvrez sa table attributaire.</p>
					<p>Passez en mode édition. Cliquez sur l'icône <b>Ouvrir la calculatrice de champs</b> parmi les icônes de la table attributaire :</p>
					<figure>
						<img src="illustrations/tous/7_2_BO_table_calc.png" alt="barre d'outils de la table attributaire, avec icône de la calculatrice de champs entourée en rouge" width="450" >
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
			
					<p>Nous allons ici calculer la surface de chaque département en km<sup>2</sup>.</p>
					<div class="manip">
						<figure>
							<a href="illustrations/tous/7_2_calc_fenetre_surface.png">
								<img src="illustrations/tous/7_2_calc_fenetre_surface.png" alt="Fenêtre de la calculatrice de champs, pour calculer la surface d'un département en km2" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Choisissez <b>Créer un nouveau champ</b>, nommez le <b>SURF_KM2</b>, choisissez le type décimal, une <b>longueur de 10</b> et une <b>précision de 2</b> (2 chiffres après la virgule)</li>
							<li class="espace">Dans la liste des fonctions, dans la rubrique <b>géométrie</b>, double-cliquez sur la fonction <b>$area</b> puis rajoutez dans la case expression <b>/ 1000000</b> (par défaut, la surface est calculée en unités de la couche, donc en m² puisque cette couche est projetée en Lambert 93)</li>
							<li class="espace">Au final, l'expression est donc <b>$area / 1000000</b></li>
							<li class="espace">cliquez sur <b>OK</b></li>
						</ul>
					</div>
					<p class="note">Avez-vous noté qu'il est possible de créer des <b>champs virtuels</b> ? Ces champs ne sont pas permanents et ne seront pas sauvegardés (il est donc possible d'en créer sans passer en mode édition). Si un champ virtuel est utilisé pour calculer par exemple une surface, et si les polygones sont modifiés, la surface sera automatiquement mise à jour. </p>
						
				<h4><a class="titre" id="VII22b">Vérification</a></h4>
						
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
								<img src="illustrations/tous/7_2_verif_surf.png" alt="Vérification de la surface au moyen de l'outil mesurer une aire" width="600" >
							</a>
						</figure>
					</div>
						<p>Les deux aires devraient être sensiblement égales.</p>
									
				
			
			<h3><a class="titre" id="VII23">Quelques exemples supplémentaires de calculs</a></h3>
			
				<p>La calculatrice de champs offre beaucoup de fonctions que nous ne passerons pas toutes en revue ; nous verrons simplement quelques exemples pour vous donner un aperçu des possibilités.</p>

				<h4><a class="titre" id="VII23a">Opérations mathématiques : calcul de densité</a></h4>
				
					<p>L'objectif sera ici de calculer la densité en habitants par km<sup>2</sup> de chaque commune, à partir de la population et la surface.</p>
					<div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">Savez-vous comment calculer la densité à partir de la population et la surface ?</label></p>
							<p class="reponse">La densité se calcule en divisant la population par la surface. Si la population est en nombre d'habitants et la surface en km<sup>2</sup>, alors la densité sera en nombre d'habitants par km<sup>2</sup>.</p>
					</div>
					
					<div class="manip">
						<p>Si ce n'est pas déjà fait, ouvrez la table attributaire de la couche <em class="data">communes_NordPasDeCalais_calcul</em>. Ouvrez la calculatrice de champs :</p>
						<figure>
							<a href="illustrations/tous/7_2_calc_densite.png" >
								<img src="illustrations/tous/7_2_calc_densite.png" alt="Fenêtre de la calculatrice de champ, calcul de la densité" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Choisissez l'option <b>Créer un nouveau champ</b>, nommez-le <b>DENSITE</b>, type <b>Nombre décimal</b>, Longueur <b>10</b> et précision <b>2</b></li>
							<li class="espace">Dans la liste des <b>fonctions</b>, rubrique <b>Champs et valeurs</b>, double-cliquez sur <b>POPULATION</b>, ajoutez <b>* 1000</b> à la main dans le cadre <b>Expression</b> puisque la population est en milliers d'habitants, le diviseur <b>/</b> puis double-cliquez sur le champ <b>SURF_KM2</b></li>
							<li class="espace">Au final, l'expression est <b> "POPULATION"  * 1000 / "SURF_KM2" </b></li>
							<li class="espace">Cliquez sur <b>OK</b> : le champ densité est ajouté et calculé :</li>
						</ul>
						<figure>
						  <a href="illustrations/tous/7_2_densite_table.png" >
							<img src="illustrations/tous/7_2_densite_table.png" alt="Table attributaire avec les 3 colonnes population, surface et densité" width="280" >
						  </a>
						</figure>
					</div>
					
				<h4><a class="titre" id="VII23b">Opérations sur du texte : extraction des codes et noms de régions et départements</a></h4>
				
					<p>La couche <em class="data">communes_NordPasDeCalais_calcul</em> comporte deux champs DEPT et REGION remplis par exemple par <b>59 - NORD</b> pour le département et <b>31 - NORD-PAS-DE-CALAIS</b> pour la région.</p>
					<p>Le but est ici d'extraire le code de la région et du département à partir de ces deux champs. Nous avons déjà créé les champs CODE_DEPT et CODE_REG <a href="07_01_creation_suppression.php#VII12">précédemment</a>, il ne reste plus qu'à les remplir !</p>
				
					<div class="manip">
						<p>Si ce n'est pas déjà fait, ouvrez la table attributaire de la couche <em class="data">communes_NordPasDeCalais_calcul</em>. Ouvrez la calculatrice de champs :</p>
						<figure>
							<a href="illustrations/tous/7_2_calc_codedept.png" >
								<img src="illustrations/tous/7_2_calc_codedept.png" alt="Calculatrice de champ : calcul du code du département" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Vérifiez que la case <b>Ne mettre à jour que les x entités sélectionnées</b> soit décochée, puisque le but est de mettre à jour toutes les lignes de la table</li>
							<li class="espace">Choisissez <b>Champ de mise à jour existant</b> puis <b>CODE_DEPT</b> dans la liste déroulante, puisqu'il ne s'agit pas de créer un nouveau champ</li>
							<li class="espace">Dans la liste des fonctions, allez dans la rubrique <b>Chaîne</b> (texte) et cliquez sur la fonction <b>left</b> : vous pouvez lire l'aide à droite. Cette fonction extrait les caractères les plus à gauche d'un texte.</li>
							<li class="espace">La fonction left nécessite deux paramètres : le texte d'où seront extraits les caractères (ici, le champ <b>DEPT</b>) et le nombre de caractères à extraire (ici, <b>2</b> puisque le code de département est  codé sur 2 caractères)</li>
							<li class="espace">L'expression est donc <b>left( "DEPT", 2)</b></li>
							<li class="espace">Cliquez sur <b>OK</b> : le champ CODE_DEPT est mis à jour :</li>
						</ul>
						<figure>
						  <a href="illustrations/tous/7_2_table_codedept.png" >
							<img src="illustrations/tous/7_2_table_codedept.png" alt="extrait de la table avec les champs DEPT et CODE_DEPT" width="250" >
						  </a>
						</figure>
					</div>
					
					<p>Comment faire pour maintenant extraire le nom du département du champ DEPT ?</p>
					<p>La fonction <b>right</b> permet d'extraire les caractères les plus à droite d'un texte. Le problème est que le nom du département étant variable, le nombre de caractères à extraire l'est aussi.</p>
					<p>Mais il est possible de calculer ce nombre de caractères à extraire en fonction de la longueur totale du texte : en effet, ce nombre sera toujours égal à la <b>longueur totale - 5</b>. Cinq correspond au nombre de caractères qui ne font pas partie du nom de département, soit les 2 chiffres du code département, un espace, un tiret et un espace (&#171; 59 -  &#187; par exemple).</p>
					<p>L'expression est donc :</p>
					<p><b> right ( "DEPT" , length ( "DEPT") - 5 )</b></p>
					<p><b>length ( "DEPT") - 5</b> étant le nombre de caractères à extraire du champ DEPT.</p>
						
					<div class="manip">
						<p>Au final, les paramètres de la calculatrice de champs sont donc les suivants :</p>
						<figure>
							<a href="illustrations/tous/7_2_calc_nomdept.png" >
								<img src="illustrations/tous/7_2_calc_nomdept.png" alt="Calculatrice de champ : calcul du nom du département" width="600" >
							</a>
						</figure>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Pouvez-vous de la même manière extraire les codes et noms de région ? Y a-t-il plusieurs manières de procéder ?</label></p>
							<p class="reponse">Pour le code région, il faut mettre à jour le champ CODE_REG avec l'expression <b>left( "REGION", 2)</b>. Pour le nom de région, il faut créer un nouveau champ NOM_REG et le remplir en utilisant l'expression <b>right ( "REGION" , length ( "REGION") - 5 )</b>.</p>
							<p class="reponse">Bien sûr, vous pouvez faire plus simple et utiliser les expressions <b>'31'</b> pour le code, et <b>'NORD-PAS-DE-CALAIS'</b> pour la région, puisque toutes les communes appartiennent ici à la même région !</p>
						</div>
					</div>
					
				<h4><a class="titre" id="VII23c">Opérations sur du texte : concaténation</a></h4>
				
					<p>Le but sera ici de recréer le code INSEE des communes, à partir du code de département et du code de commune. Par exemple, la commune de Winnezeele a pour code département <b>59</b> et pour code commune <b>662</b> : son code INSEE est <b>59662</b>.</p>
					
					<div class="manip">
						<p>Ouvrez la calculatrice de champ :</p>
						<figure>
							<a href="illustrations/tous/7_2_calc_codeinsee.png" >
								<img src="illustrations/tous/7_2_calc_codeinsee.png" alt="Calculatrice de champ : calcul du code INSEE" width="600" >
							</a>
						</figure>
						<ul>
							<li class="espace">Créez un nouveau champ, nommé <b>CODE_INSEE</b>, de type <b>Texte</b> et de longueur <b>10</b></li>
							<li class="espace">Dans la liste des champs, double-cliquez sur <b>CODE_DEPT</b> (créé précédemment), puis cliquez sur l'opérateur de concaténation de chaîne <b>||</b>, et double-cliquez pour terminer sur le champ <b>CODE_COMM</b></li>
							<li class="espace">L'aperçu du réultat doit être par exemple <b>59662</b></li>
							<li class="espace">Cliquez sur <b>OK</b>. Le champ CODE_INSEE est créé et mis à jour :</li>
						</ul>
						<figure>
						  <a href="illustrations/tous/7_2_codeinsee_table.png" >
							<img src="illustrations/tous/7_2_codeinsee_table.png" alt="Table attributaire avec les 3 colonnes CODE_DEPT, CODE_COMM et CODE_INSEE" width="250" >
						  </a>
						</figure>
						<p class="note">Il est aussi possible d'utiliser la formule <b>concat ( "CODE_DEPT",  "CODE_COMM" )</b>, pour le même résultat.</p>
					</div>
					
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