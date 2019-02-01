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
			<h2>VIII.1  Lier des données en fonction de leurs attributs : jointures attributaires</h2>
				<ul class="listetitres">
					<li><a href="#VIII11">Comment fonctionne une jointure attributaire ? </a></li>
					<li><a href="#VIII12">Application : population au Bhoutan</a></li>
					<li><a href="#VIII13">Quelques exemples supplémentaires</a>
						<ul class="listesoustitres">
							<li><a href="#VIII13a">Jointure d'une couche et d'une table : recensement de la population au Kenya</a></li>
							<li><a href="#VIII13b">Jointure de deux couches : entrées de cinéma et célibat en France</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p></p>

			<h3><a class="titre" id="VIII11">Comment fonctionne une jointure attributaire ?</a></h3>
			
				<p>Dans un logiciel SIG, une jointure attributaire consiste à lier à une couche des données provenant d'une table ou d'une autre couche. On se base pour cela sur les données attributaires.</p>
				<p>Un champ de la couche de départ et un champ de la table contenant les données à joindre servent de <b>champs clé</b>. Ces champs doivent être de même type (texte, nombre) et contenir les mêmes données. Le logiciel se base sur le contenu de ces champs pour déterminer quel élément de la table est lié à quel élément de la couche.</p>
				<figure>
					<a href="illustrations/tous/8_1_principe_jointure_attrib.svg" >
						<img src="illustrations/tous/8_1_principe_jointure_attrib.png" alt="principe d'une jointure attributaire" width="620">
					</a>
				</figure>
				<p>Dans l'illustration ci-dessus, les données de départ sont :</p>
				<ul>
					<li class="espace">une couche de polygone avec les régions du bhoutan. La table attributaire comporte le nom et le code de chaque région, mais pas leur population.</li>
					<li class="espace">un tableau avec le code de chaque région et sa population en 1995</li>
				</ul>
				<p>Les données de la table sont jointes aux données du shapefile, en se basant sur le code région : champ <b>CODEREGION</b> pour le shapefile et champ <b>REG_CODE</b> pour le tableau.</p>
				<p>Au final, on obtient une couche shapefile des régions du Bhoutan, <b>avec en données attributaires les données de la couche de départ et les données du tableau</b>, donc la population.</p>
				<p>Il arrive qu'un élément de la couche de départ corresponde à plusieurs éléments de la table. Différentes stratégies sont alors possibles selon les logiciels et le type de champ : ne prendre en compte que les données du premier élément lié, calculer la moyenne des données...</p>

				
				
			<h3><a class="titre" id="VIII12">Application : population au Bhoutan</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS et ajoutez-y la couche des régions du <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Bhoutan" >Bhoutan</a> <em class="data">regions_bhutan.shp</em>.</p>
					<p>Ajoutez également au projet la table <em class="data">pop_bhutan.csv</em> : pour cela, procédez comme pour ajouter une couche shapefile mais choisissez <b>Tous les fichiers</b> comme format de fichier :</p>
					<figure>
						<a href="illustrations/tous/8_1_ajout_csv.png" >
							<img src="illustrations/tous/8_1_ajout_csv.png" alt="ajout d'un csv : choisir tous les fichiers comme format" width="550">
						</a>
					</figure>
					<p>Vous pouvez également ajouter ce fichier via le <a href="01_02_info_geo.php#I21b">panneau Explorateur</a>.</p>
					<p class="note">Le <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Comma-separated_values">format CSV</a> est un format texte contenant des colonnes séparées par un caractère délimiteur, habituellement la virgule, le point-virgule ou la tabulation.</p>
					<p>Vous devez donc avoir dans QGIS ces deux données (notez l'icône de tableau pour le CSV) :</p>
					<figure>
						<img src="illustrations/tous/8_1_donnees_chargees.png" alt="la table et la couche dans la table des matières" width="180">
					</figure>
					<p>Ouvrez les deux tables attributaires.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">A votre avis, pour pouvoir effectuer une jointure entre les 2 tables, quels seront les 2 champs clés ?</label></p>
						<p class="reponse">Le champ clé pour regions_bhutan est <b>CODEREGION</b> et le champ clé pour pop_bhutan est <b>REG_CODE</b>.</p>
					</div>
					<p>Allez dans les propriétés de la couche <em class="data">regions_bhutan</em>, rubrique <b>Jointure</b> :</p>
					<figure>
						<a href="illustrations/tous/8_1_proprietes_jointure.png" >
							<img src="illustrations/tous/8_1_proprietes_jointure.png" alt="rubrique jointure des propriétés de la couche" width="600">
						</a>
					</figure>
					<p>Cliquez sur le symbole <img class="iconemid" src="illustrations/tous/8_1_plus.png" alt="symbole + d'ajout de jointure" > pour ajouter une jointure :</p>
					<figure>
						<a href="illustrations/tous/8_1_jointure_fenetre.png" >
							<img src="illustrations/tous/8_1_jointure_fenetre.png" alt="création d'une jointure : choix de la couche à joindre et des champs clés" width="500">
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Joindre la couche :</b> choisissez la couche qui sera jointe, ici le CSV <em class="data">pop_bhutan</em></li>
						<li class="espace"><b>Champs de jointure des couches jointe et cible :</b> choisissez les deux champs clés qui permettront de trouver les correspondances d'une table à l'autre</li>
						<li class="espace"><b>Mettre la couche jointe en cache dans la mémoire virtuelle :</b> si cette case est cochée, l'affichage de la table sera plus rapide, mais les données ne seront pas mises à jour si des modifications sont effectuées dans la couche jointe</li>
						<li class="espace"><b>Choisir les champs à joindre :</b> ici, nous voulons joindre tous les champs donc vous pouvez laisser cette case décochée</li>
						<li class="espace"><b>Personnaliser le préfixe du champ :</b> les champs joints peuvent avoir le préfixe de votre choix, pour bien les différencier des champs originaux ou issus d'autres jointures. Choisissez un préfixe court, par exemple <b>tab_</b></li>
					</ul>
					<p>Cliquez sur <b>OK</b> pour créer la jointure : la ligne correspondante apparaît dans la fenêtre des propriétés.</p>
					<p>Ouvrez la table attributaire de la couche  <em class="data">regions_bhutan.shp</em> : les données de la table ont été ajoutées (champ tab_POPEST95).</p>
					<figure>
						<a href="illustrations/tous/8_1_jointure_res.png">
							<img src="illustrations/tous/8_1_jointure_res.png" alt="table attributaire de la couche regions_bhutan une fois les données de populations jointes" width="450">
						</a>
					</figure>
				</div>
				<p>Cependant, la couche n'a pas été modifiée, la jointure n'est que temporaire. Pour sauvegarder définitivement la jointure, il faut sauvegarder la couche sous un autre nom.</p>
			
			
			<h3><a class="titre" id="VIII13">Quelques exemples supplémentaires</a></h3>
			
				<h4><a class="titre" id="VIII13a">Jointure d'une couche et d'une table : recensement de la population au Kenya</a></h4>
				
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS. Ajoutez-y la couche <em class="data">KEN_adm2.shp</em> et le fichier CSV <em class="data">County_Urbanization-2009</em>.</p>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Ouvrez les deux tables attributaires. A votre avis, sur quels champs faire la jointure ? Quels problèmes cela pourrait-il poser ?</label></p>
							<p class="reponse">Il est possible de faire la jointure en utilisant le nom du district : champ <b>NAME_2</b> pour  <em class="data">KEN_adm2</em> et champ <b>County</b> pour <em class="data">County_Urbanization-2009.csv</em>.</p>
							<p class="reponse">Le champ étant un nom et non un code, il est possible que des lignes ne soient pas jointes si les noms sont orthographiées de manière légèrement différente.</p>
						</div>
						<p>Faites la jointure.</p>
						<div class="question">
							<input type="checkbox" id="faq-3">
							<p><label for="faq-3">Combien de lignes n'ont pas été jointes ? Pourquoi ?</label></p>
							<p class="reponse">Quatre districts n'ont pas de données jointes : <b>Trans-Nzoia</b>, orthographié "Trans Nzoia" dans le fichier CSV, <b>Elgeyo-Marakwet</b>, orthographié "Elgeyo Marakwet" dans le fichier CSV, <b>Nithi</b>, orthographié "Tharaka Nithi" dans le fichier CSV et <b>Kwale</b>, orthographié "Kwale " (avec un espace à la fin) dans le fichier CSV.</p>
						</div>
						<p>Pour que tous les enregistrements soit joints, vous pouvez modifier à la main les noms des districts qui posent problème dans le fichier CSV, en l'ouvrant avec un éditeur de texte, et refaire la jointure.</p>
					</div>
				
				
				<h4><a class="titre" id="VIII13b">Jointure de deux couches : entrées de cinéma et célibat en France</a></h4>
				
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS. Ajoutez-y les couches <em class="data">depts_celib15ansplus_2009</em> et <em class="data">depts_entrees_cinema_2011</em>.</p>
						<div class="question">
							<input type="checkbox" id="faq-4">
							<p><label for="faq-4">Ouvrez les deux tables attributaires. A votre avis, sur quels champs faire la jointure ? Quels problèmes cela pourrait-il poser ?</label></p>
							<p class="reponse">Il est possible de faire la jointure sur les champs <b>ID_GEOGLA</b>, ou <b>CODE_DEPT</b>, ou bien <b>NOM_DEPT</b>. Evitez le champ NOM_DEPT, au cas où les noms de départements soient orthographiés de manière différente dans les deux couches (accents, majuscules).</p>
						</div>
						<p>Joignez les données attributaires d'une couche à l'autre couche.</p>
					</div>


				
				<br>
				<a class="prec" href="08_00_jointures.php">chapitre précédent</a>
				<a class="suiv" href="08_02_jointure_spatiale.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_8.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
