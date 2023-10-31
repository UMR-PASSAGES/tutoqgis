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
			<h1>VIII.1  Lier des données en fonction de leurs attributs : jointures attributaires</h1>
				<ul class="listetitres">
					<li><a href="#VIII11">Comment fonctionne une jointure attributaire ? </a></li>
					<li><a href="#VIII12">Application : population au Bhoutan</a></li>
					<li><a href="#VIII13">Quelques exemples supplémentaires</a>
						<ul class="listesoustitres">
							<li><a href="#VIII13a">Jointure d'une couche et d'une table : recensement de la population au Kenya</a></li>
							<li><a href="#VIII13b">Jointure de deux couches : licences sportives et catégories socio-professionnelles en France</a></li>
						</ul>
					</li>
					<li><a href="#VIII14">Si une entité correspond à plusieurs entités de la couche à joindre</a>
					   <ul class="listesoustitres">
							<li><a href="#VIII14a">Pour bien comprendre le problème</a></li>
							<li><a href="#VIII14b">Agréger les données en 2 étapes</a></li>
							<li><a href="#VIII14c">Pour aller plus loin : une deuxième méthode avec une requête SQL</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
			<p></p>

			<h2>Comment fonctionne une jointure attributaire ?<a class="headerlink" id="VIII11" href="#VIII11"></a></h2>
			
				<p>Dans un logiciel SIG, une jointure attributaire consiste à lier à une couche des données provenant d'une table ou d'une autre couche. On se base pour cela sur les données attributaires.</p>
				<p>Un champ de la couche de départ et un champ de la table contenant les données à joindre servent de <b>champs clé</b>. Ces champs doivent être de même type (texte, nombre) et contenir les mêmes données. Le logiciel se base sur le contenu de ces champs pour déterminer quel élément de la table est lié à quel élément de la couche.</p>
				<figure>
					<a href="illustrations/8_1_principe_jointure_attrib.svg" >
						<img src="illustrations/8_1_principe_jointure_attrib.jpg" alt="principe d'une jointure attributaire" width="620">
					</a>
				</figure>
				<p>Dans l'illustration ci-dessus, les données de départ sont :</p>
				<ul>
					<li class="espace">une couche de polygone avec les régions du Bhoutan. La table attributaire comporte le nom et le code de chaque région, mais pas leur population.</li>
					<li class="espace">un tableau avec le code de chaque région et sa population en 1995</li>
				</ul>
				<p>Les données de la table sont jointes aux données du shapefile, en se basant sur le code région : champ <b>CODEREGION</b> pour le shapefile et champ <b>REG_CODE</b> pour le tableau.</p>
				<p>Au final, on obtient une couche shapefile des régions du Bhoutan, <b>avec en données attributaires les données de la couche de départ et les données du tableau</b>, donc la population.</p>
				<p>Il arrive qu'un élément de la couche de départ corresponde à plusieurs éléments de la table. Différentes stratégies sont alors possibles selon les logiciels et le type de champ : ne prendre en compte que les données du premier élément lié, calculer la moyenne des données...</p>

				
				
			<h2>Application : population au Bhoutan<a class="headerlink" id="VIII12" href="#VIII12"></a></h2>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS et ajoutez-y la couche des régions du <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Bhoutan" >Bhoutan</a> <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">regions_bhutan.shp</a></em>.</p>
					<p>Ajoutez également au projet la table <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">pop_bhutan.csv</a></em> : pour cela, procédez comme pour <a href="03_03_donnees_XY.php">ajouter une couche de texte délimité</a> en choisissant l'option <b>Pas de géométrie</b> :</p>
					<figure>
						<a href="illustrations/8_1_ajout_csv.jpg" >
							<img src="illustrations/8_1_ajout_csv.jpg" alt="ajout d'un csv : choisir tous les fichiers comme format" width="600">
						</a>
					</figure>
					<p>Vous pouvez également ajouter ce fichier via le <a href="01_02_info_geo.php#I21b">panneau Explorateur</a> ou en procédant comme pour une couche vecteur.</p>
					<p>Cependant la méthode présentée ici permet de <b>détecter automatiquement les types des champs</b> (texte, entier...). En passant par une autre méthode, tous les champs seront considérés comme du texte.</p>
					<p class="note">Le <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Comma-separated_values">format CSV</a> est un format texte contenant des colonnes séparées par un caractère délimiteur, habituellement la virgule, le point-virgule ou la tabulation.</p>
					<p>Vous devez donc avoir dans QGIS ces deux données (notez l'icône de tableau pour le CSV) :</p>
					<figure>
						<img src="illustrations/8_1_donnees_chargees.jpg" alt="la table et la couche dans la table des matières" width="180">
					</figure>
					<p>Ouvrez les deux tables attributaires.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">&#192; votre avis, pour pouvoir effectuer une jointure entre les 2 tables, quels seront les 2 champs clés ?</label></p>
						<p class="reponse">Le champ clé pour regions_bhutan est <b>CODEREGION</b> et le champ clé pour pop_bhutan est <b>REG_CODE</b>.</p>
					</div>
					<p>Allez dans les propriétés de la couche <em class="data">regions_bhutan</em>, rubrique <b>Jointure</b> :</p>
					<figure>
						<a href="illustrations/8_1_proprietes_jointure.jpg" >
							<img src="illustrations/8_1_proprietes_jointure.jpg" alt="rubrique jointure des propriétés de la couche" width="600">
						</a>
					</figure>
					<p>Cliquez sur le symbole <img class="iconemid" src="illustrations/8_1_plus.jpg" alt="symbole + d'ajout de jointure" > pour ajouter une jointure :</p>
					<figure>
						<a href="illustrations/8_1_jointure_fenetre.jpg" >
							<img src="illustrations/8_1_jointure_fenetre.jpg" alt="création d'une jointure : choix de la couche à joindre et des champs clés" width="400">
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Joindre la couche :</b> choisissez la couche qui sera jointe, ici le CSV <em class="data">pop_bhutan</em></li>
						<li class="espace"><b>Champs de jointure :</b> choisissez le champs clé dans le CSV, à savoir <b>REG_CODE</b></li>
						<li class="espace"><b>Champs dans la couche cible :</b> choisissez le champs clé dans la couche région, à savoir <b>CODEREGION</b></li>
						<li class="espace"><b>Mettre la couche jointe en cache dans la mémoire virtuelle :</b> si cette case est cochée, l'affichage de la table sera plus rapide, mais les données ne seront pas mises à jour si des modifications sont effectuées dans la couche jointe</li>
						<li class="espace"><b>champs joints :</b> ici, nous voulons joindre tous les champs donc vous pouvez laisser cette case décochée</li>
						<li class="espace"><b>Préfixe de nom de champ personnalisé :</b> les champs joints peuvent avoir le préfixe de votre choix, pour bien les différencier des champs originaux ou issus d'autres jointures. Choisissez un préfixe court, par exemple <b>tab_</b></li>
					</ul>
					<p>Cliquez sur <b>OK</b> pour créer la jointure : la ligne correspondante apparaît dans la fenêtre des propriétés. Vous pouvez fermer la fenêtre des propriétés.</p>
					<p>Ouvrez la table attributaire de la couche  <em class="data">regions_bhutan.shp</em> : les données de la table ont été ajoutées (champ tab_POPEST95).</p>
					<figure>
						<a href="illustrations/8_1_jointure_res.jpg">
							<img src="illustrations/8_1_jointure_res.jpg" alt="table attributaire de la couche regions_bhutan une fois les données de populations jointes" width="450">
						</a>
					</figure>
				</div>
				<p>Cependant, la couche n'a pas été modifiée, la jointure n'est que temporaire. Pour sauvegarder définitivement la jointure, il faut sauvegarder la couche sous un autre nom (clic droit sur le nom de la couche &#8594; Exporter &#8594; Sauvegarder les entités sous).</p>
			
			
			<h2>Quelques exemples supplémentaires<a class="headerlink" id="VIII13" href="#VIII13"></a></h2>
			
				<h3>Jointure d'une couche et d'une table : recensement de la population au Kenya<a class="headerlink" id="VIII13a" href="#VIII13a"></a></h3>
				
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS. Ajoutez-y la couche <em class="data">gadm36_KEN_1</em> de la base GeoPackage <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">gadm36_KEN.gpkg</a></em> et le fichier CSV <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">County_Population_2009</a></em>.</p>
						<p>La couche <em class="data">gadm36_KEN_1</em> correspond à des sous-régions administratives du Kenya, et le tableau <em  class="data">County_Population_2009</em> contient les populations correspondantes.</p>
						<p class="note">Notez que <em class="data">gadm36_KEN.gpkg</em> contient plusieurs couches correspondant aux différents niveaux administratifs. En passant par l'explorateur de données, vous pouvez &#171; ouvrir &#187; la base pour ajouter directement la couche de votre choix. En utilisant le gestionnaire des sources, vous choisissez les couches à ajouter après avoir cliqué sur le bouton Ajouter.</p>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Ouvrez les deux tables attributaires. A votre avis, sur quels champs faire la jointure ? Quel problème va se poser ?</label></p>
							<p class="reponse">Il est possible de faire la jointure en utilisant le nom du County : champ <b>NAME_1</b> pour  <em class="data">KEN_adm1</em> et champ <b>County</b> pour <em class="data">County_Population_2009.csv</em>.</p>
							<p class="reponse">Cependant, les noms sont en minuscules dans la couche et en majuscule dans le CSV. Il faut donc créer et calculer un nouveau champ dans la couche GeoPackage, rempli à l'aide de la formule  <b>upper("NAME_1")</b>.</p>
							<p class="reponse">Par ailleurs, le champ étant un nom et non un code, il est possible que des lignes ne soient pas jointes si les noms sont orthographiés de manière légèrement différente.</p>
						</div>
						<p>Faites la jointure.</p>
						<div class="question">
							<input type="checkbox" id="faq-3">
							<p><label for="faq-3">Combien de lignes n'ont pas été jointes ? Pourquoi ?</label></p>
							<p class="reponse">Deux counties n'ont pas de données jointes : <b>ELGEYO-MARAKWET</b> et <b>THARAKA-NITHI</b>, orthographiés sans tirets dans le fichier CSV.</p>
						</div>
						<p>Pour que tous les enregistrements soient joints, vous pouvez modifier à la main les noms des counties qui posent problème, soit dans la couche GeoPackage soit dans le fichier CSV (ces opérations peuvent être effectuées dans QGIS).</p>
					</div>
				
				
				<h3>Jointure de deux couches : licences sportives et catégories socio-professionnelles en France<a class="headerlink" id="VIII13b" href="#VIII13b"></a></h3>
				
					<div class="manip">
						<p>Ouvrez un nouveau projet QGIS. Ajoutez-y les couches <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">depts_licences_sportives_2016-2017</a></em> et <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">depts_CSP_2016</a></em>.</p>
						<p>La couche <em class="data">depts_licences_sportives_2016-2017</em> correspond aux nombres de licences pour différents sports par département, et la couche <em class="data">depts_CSP_2016</em> aux % des différentes catégories socio-professionnelles par département.</p>
						<div class="question">
							<input type="checkbox" id="faq-4">
							<p><label for="faq-4">Ouvrez les deux tables attributaires. A votre avis, sur quels champs faire la jointure ?</label></p>
							<p class="reponse">Il est possible de faire la jointure sur les champs <b>INSEE_DEP</b>, ou <b>NOM_DEP</b>, ou bien <b>NOM_DEPT</b>. C'est généralement un bon réflexe de faire si possible la jointure sur des identifiants (INSEE_DEP) plutôt que des noms (NOM_DEP) au cas où ceux-ci seraient orthographiés différemment dans les 2 fichiers.</p>
						</div>
						<p>Joignez les données attributaires d'une couche à l'autre couche.</p>
					</div>
					<p>On peut ensuite explorer la relation entre catégories socio-professionnelles et sports pratiqués, par exemple en utilisant l'extension <a href="10_01_representation.php#X14b">Plotly</a> pour visualiser le nombre de licences de golf en fonction de la part de cadres et professions intellectuelles supérieures :</p>
					<figure>
						<a href="illustrations/8_1_golf_cadres.jpg">
							<img src="illustrations/8_1_golf_cadres.jpg" alt="graphique du nombre de licences de golf en fonction du % de cadres, réalisé avec Plotly" width="550">
						</a>
					</figure>


            <h2>Si une entité correspond à plusieurs entités de la couche à joindre<a class="headerlink" id="VIII14" href="#VIII14"></a></h2>
            
                <h3>Pour bien comprendre le problème<a class="headerlink" id="VIII14a" href="#VIII14a"></a></h3>
                
                    <div class="manip">
                        <p>Ouvrez un nouveau projet QGIS. Ajoutez-y la couche GeoPackage <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">communes_oise</a></em> et le fichier CSV <em class="data"><a href="donnees/TutoQGIS_08_Jointures.zip">L_MONUMENT_HISTO_S_060</a></em> qui correspond à l'ensemble des monuments historiques classés et inscrits dans le département de l'Oise.</p>
                        <div class="question">
                    		<input type="checkbox" id="faq-5">
                    		<p><label for="faq-5">Explorez ces données : pouvez-vous joindre les données du fichier CSV à la couche de communes&nbsp;? Grâce à quels champs&nbsp;?</label></p>
                    		<p class="reponse">Il est possible de joindre les couches en se basant sur le code INSEE : champ INSEE_COM pour la couche de communes et INSEE pour le tableau des monuments historiques.</p>
                    	</div>
                        <p>Faites la jointure.</p>
                        <div class="question">
                    		<input type="checkbox" id="faq-6">
                    		<p><label for="faq-6">Combien y a-t-il de communes&nbsp;? De monuments historiques&nbsp;?</label></p>
                    		<p class="reponse">La couche de communes contient 679 entités, le CSV 700 lignes.</p>
                    	</div>
                    	<div class="question">
                    		<input type="checkbox" id="faq-7">
                    		<p><label for="faq-7">Comment la jointure a-t-elle géré cela&nbsp;?</label></p>
                    		<p class="reponse">A chaque commune ont été joints les attributs du 1er monument ayant le même code INSEE rencontré dans le CSV. Si une commune possède plusieurs monuments, les données d'un seul ont été jointes.</p>
                    	</div>
                    </div>
                    <p>Certaines communes ont plusieurs monuments historiques, d'autres n'en ont aucun. Comment faire la jointure dans ce cas&nbsp;?</p>
                    <p>Il existe plusieurs possibilités, il faut ici bien se poser la question de ce que l'on veut.</p>
                    <p>Ici, si l'on travaille à l'échelle de la commune, les informations sur les monuments devront être agrégées à la commune. On peut par exemple avoir pour chaque commune le nombre de monuments présents.</p>
                    <p>On peut également concaténer du texte, c'est-à-dire avoir dans un champ par exemple tous les intitulés des monuments présents séparés par des virgules. Cependant, cette manière d'organiser les informations n'est pas forcément la plus pratique pour exploiter les données par la suite.</p>
                    <p class="note">Il importe de bien réfléchir aux questions qu'on veut pouvoir poser à ses données et à les structurer en conséquence, ce qui sort de l'objectif de ce tutoriel. Pour cela, vous pouvez discuter avec quelqu'un ayant l'habitude de travailler avec des bases de données, de préférence spatiales&nbsp;!</p>
                    <p>Nous allons ici ajouter à la couche de communes un champ contenant le nombre de monuments.</p>
                
                <h3>Agréger les données en 2 étapes<a class="headerlink" id="VIII14b" href="#VIII14b"></a></h3>                
                
                    <p>Une première possibilité consiste à procéder en 2 étapes :</p>
                    <ul>
                        <li>A partir du CSV, créer un tableau avec le nombre de monuments par communes</li>
                        <li>Joindre ce tableau à la couche de communes</li>
                    </ul>
                
                    <div class="manip">
                        <p>Dans la boîte à outils, rubrique <b>Analyse vectorielle</b>, double-cliquez sur l'outil <b>Statistiques par catégories</b>.</p>
                        <figure>
                        	<a href="illustrations/8_1_stats_cats_emplacement.jpg" >
                        		<img src="illustrations/8_1_stats_cats_emplacement.jpg" alt="Emplacement dans la boîte à outils de Statistiques par catégories" width="370">
                        	</a>
                        </figure>
                    </div>
                    <p>Cet outil permet de calculer des statistiques (nombre, moyenne etc.) sur des champs d'une table attributaire.</p>
                    <p>Par exemple, on peut savoir pour chaque type de monument (église, château...) les dates d'inscription min et max, et le nombre de dates d'inscription différentes. Ainsi, on compte 240 églises correspondant à 162 dates d'inscription différentes, entre le 01/01/1840 et le 27/10/2016.</p>
                    <p>Nous allons ici utiliser cet outil de manière très simple, pour compter le nombre de monuments par commune :</p>
                    <div class="manip">
                        <figure>
                        	<a href="illustrations/8_1_stats_cats_fenetre.jpg" >
                        		<img src="illustrations/8_1_stats_cats_fenetre.jpg" alt="Outil Statistiques par catégories" width="500">
                        	</a>
                        </figure>
                        <ul>
                            <li>Couche vectorielle en entrée : choisir la couche de monuments <em class="data">L_MONUMENT_HISTO_S_060</em></li>
                            <li>Champ pour calculer les statistiques : laisser vide puisqu'on veut simplement compter les monuments</li>
                            <li>Champs avec catégories : cliquez sur <b>...</b> et cocher le champ <b>INSEE</b> pour compter le nombre de monuments par code INSEE. On pourrait ici choisir commune mais ce sera moins sûr pour faire la jointure par la suite</li>
                            <li>Cliquez sur <b>Exécuter</b>, l'outil va créer une couche temporaire. Vous pouvez ensuite fermer la fenêtre.</li>
                        </ul>
                        <p>Ouvrez la table attributaire de cette couche temporaire :</p>
                        <figure>
                        	<a href="illustrations/8_1_stats_cats_res.jpg" >
                        		<img src="illustrations/8_1_stats_cats_res.jpg" alt="tableau résultat de Statistiques par catégories" width="230">
                        	</a>
                        </figure>
                        <p>Chaque ligne correspond à une commune (un code INSEE) et le champ count indique combien cette commune contient de monuments.</p>
                        <p>Il ne reste plus qu'à joindre ce tableau à la couche de communes ! Ceci vous permet par exemple de créer une <a href="10_01_representation.php#X11b" >carte en cercles proportionnels</a> du nombre de monuments par communes :</p>
                        <figure>
                        	<a href="illustrations/8_1_carte_monuments_communes.jpg" >
                        		<img src="illustrations/8_1_carte_monuments_communes.jpg" alt="carte en cercles proportionnels du nombre de monuments par commune" width="400">
                        	</a>
                        </figure>
                    </div>
                    
                <h3>Pour aller plus loin : une deuxième méthode avec une requête SQL<a class="headerlink" id="VIII14c" href="#VIII14c"></a></h3>
                
                    <p>Cette autre méthode fait ici appel à une requête SQL. Une <a href="06_04_req_sql.php">partie spécifique</a> étant dédiée à ces requêtes, voici sans plus de détails une requête répondant à notre question. Pour mieux comprendre cette méthode, si vous n'êtes pas familier du SQL, merci donc de vous reporter <a href="06_04_req_sql.php">ici</a> avant d'aller plus loin&nbsp;!</p>
                    <p>Vous pouvez bien sûr sauter cette étape et passer directement au <a href="08_02_jointure_spatiale.php">chapitre suivant sur les jointures spatiales</a>.</p>
                    
                    <div class="manip">
                        <p><img class="icone" src="illustrations/6_4_dbmanager_icone.jpg" alt="icône gestionnaire de bases de données">Ouvrez la fenêtre du gestionnaire de bases de données : menu <b>Base de données &#8594; DB Manager...</b>, ou bien cliquez sur l'icône correspondante dans la barre d'outils Base de données.</p>
                        <p>Dans l'arborescence située dans la partie gauche de la fenêtre, allez dans <b>Couches virtuelle</b> &#8594; <b>Couches du projet</b> : vous devriez voir vos couches chargées dans QGIS.</p>
                        <p><img class="icone" src="illustrations/6_4_fenetre_sql_icone.jpg" alt="icône de la fenêtre SQL" >Cliquez ensuite sur l'icône <b>Fenêtre SQL</b>, ou bien menu <b>Base de données</b> &#8594; <b>Fenêtre SQL</b>.</p>
                        <figure>
                        	<a href="illustrations/8_1_requete_sql.jpg" >
                        		<img src="illustrations/8_1_requete_sql.jpg" alt=" dans le gestionnaire de bases de données, requête SQL pour compter le nombre de nombre de monuments par commune" width="600">
                        	</a>
                        </figure>
                        <p>Tapez la requête suivante :</p>
                        <p class="code">SELECT c.INSEE_COM, c.NOM_COM, count(m.INSEE) as nb_monuments, c.geometry<br>FROM communes_oise as c, L_MONUMENT_HISTO_S_060 as m<br>WHERE c.INSEE_COM = m.INSEE<br>GROUP BY c.INSEE_COM, c.NOM_COM, c.geometry</p>
                        <p>Vérifiez le résultat : chaque ligne correspond à une commune, avec pour chacune le nombre de monuments.</p>
                        <p>Cochez la case <b>Charger en tant que nouvelle couche</b>.</p>
                        <p>Choisissez la colonne avec des valeurs uniques : <b>INSEE_COM</b>, et la colonne de géométrie : <b>geometry</b>.</p>
                        <p>Donnez un nom à la couche qui sera créée, <b>communes_monuments</b> par exemple, et cliquez sur le bouton <b>Charger</b>.</p>
                        <p>Le résultat est équivalent à celui obtenu avec la première méthode, mis à part le fait que les communes sans monuments n'existent pas dans la nouvelle couche.</p>
                        <p>Une autre requête utilisant <b>left join</b> permet de les conserver :</p>
                        <p class="code">SELECT c.INSEE_COM, c.NOM_COM, count(m.INSEE) as nb_monuments, c.geometry<br>FROM communes_oise as c<br>LEFT JOIN L_MONUMENT_HISTO_S_060 as m<br>ON c.INSEE_COM = m.INSEE<br>GROUP BY c.INSEE_COM, c.NOM_COM, c.geometry</p>
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
