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
			<h2>VI.1  Sélectionner des éléments en fonction de leurs données attributaires : requêtes attributaires</h2>
				<ul class="listetitres">
					<li><a href="#VI11">Faire une requête simple</a></li>
					<li><a href="#VI12">Créer une nouvelle couche à partir d'une sélection</a></li>
					<li><a href="#VI13">Désélectionner des entités</a></li>
					<li><a href="#VI14">Quelques opérateurs</a></li>
					<li><a href="#VI15">Combiner plusieurs critères</a></li>
					<li><a href="#VI16">Quelques exemples à tester</a></li>
				</ul>
				<br>
				
			<p>Nous allons voir ici comment utiliser les données de la table attributaire pour sélectionner des éléments d'une couche, par exemple comment sélectionner les départements dans le nom commence par &#171; A &#187; .</p>
			<p>Beaucoup d'opérateurs sont disponibles pour les requêtes attributaires; nous ne les passerons pas tous en revue mais allons simplement utiliser quelques-uns des plus courants.</p>
			<p>Pour une description de tous les opérateurs et fonctions possibles : voir le <a class="ext" target="_blank" href="https://docs.qgis.org/3.4/fr/docs/user_manual/working_with_vector/expression.html#vector-expressions" >manuel de QGIS</a>.</p>

			<h3><a class="titre" id="VI11">Faire une requête simple</a></h3>

				<div class="manip">
					<p>Ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_06_Requetes.zip">DEPARTEMENT</a></em> située dans le dossier <b>TutoQGIS_06_Requetes/donnees</b>.</p>
					<p>Ouvrez la table attributaire de cette couche.</p>
				</div>
					<p>Pour sélectionner le département du Nord (59), vous pouvez cliquez sur le numéro de la ligne correspondante ou bien directement sur ce département sur la carte. Vous pouvez aussi utiliser une requête attributaire.</p>
				<div class="manip">
					<p>Dans la barre d'outils située en haut de la table attributaire, cliquez sur l'icône <b>Sélectionner les entités en utilisant une expression</b>.</p>
					<img src="illustrations/tous/6_1_BO_icone_selection.png" alt="barre d'outils de la table attributaire avec icône sélection entourée en rouge" width="600">
					<p class="note">Cette icône est aussi accessible dans la barre d'outils <b>attributs</b>, à condition que vous ayez au préalable sélectionné la couche dans la table des matières.</p>
					<p>La fenêtre de requête attributaire s'ouvre :</p>
					<figure>
						<a href="illustrations/tous/6_1_selection_fenetre.png" >
							<img src="illustrations/tous/6_1_selection_fenetre.png" alt="fenêtre de sélection, avec une requête simple" width="80%">
						</a>
					</figure>
					<p>Pour faire une requête simple, par exemple pour sélectionner le département du Nord :</p>
						<ul>
							<li class="espace">Cliquez sur <b>Champs et valeurs</b> dans la colonne du milieu : la liste des champs de la table apparaît</li>
							<li class="espace">Double-cliquez sur le champ <b>NOM_DEPT</b> pour le faire apparaître dans la case <b>Expression</b> à gauche de la fenêtre (notez les guillemets doubles)</li>
							<li class="espace">Cliquez sur l'opérateur <b>=</b></li>
							<li class="espace">Cliquez sur le bouton <b>Toutes</b> pour voir dans la case <b>Valeurs</b> la liste des valeurs uniques du champ sélectionné (ici, NOM_DEPT)</li>
							<li class="espace">Double-cliquez sur la valeur <b>'NORD'</b> (notez les guillemets simples)</li>
							<li class="espace">A ce stade, la case <b>Expression</b> doit contenir  : <b>"NOM_DEPT" = 'NORD'</b></li>
							<li class="espace">Cliquez sur le bouton <b>Sélection</b> en bas de la fenêtre</li>
						</ul>
					<p class="note">Il est également possible de taper la requête &#171; à la main &#187; directement dans la case Expression. Attention dans ce cas à bien respecter la syntaxe utilisée par QGIS : par exemple, les noms de champs sont entourés de guillemets doubles et les chaînes de caractères de guillemets simples.</p>
					<p>La fenêtre de requête attributaire ne se ferme pas automatiquement ; vous pouvez ou la fermer en cliquant sur le bouton <b>Fermer</b> ou bien simplement la déplacer pour vérifier sur la carte le résultat de votre sélection.</p>
					<figure>
						<a href="illustrations/tous/6_1_selection_nord.png" >
							<img src="illustrations/tous/6_1_selection_nord.png" alt="carte avec le département du Nord sélectionné" width="300">
						</a>
					</figure>
					<p>Vous pouvez lire le nombre d'éléments sélectionnés en haut de la table attributaire, ou encore en bas à gauche de la fenêtre de QGIS, dans la barre d'état :</p>
					<figure>
					    <a href="illustrations/tous/6_1_nb_selectionnes.png" >
						    <img src="illustrations/tous/6_1_nb_selectionnes.png" alt="ligne indiquant le nombre d'éléments sélectionnés, en haut de la table et dans la barre d'état" width="550">
						</a>
					</figure>
				</div>
				<p>Vous venez d'effectuer une requête attributaire simple. Il est important de comprendre qu'une requête ne modifie pas les données, elle les sélectionne simplement.</p>
				<p>Bien sûr, il est plus intéressant d'utiliser les requêtes pour sélectionner plusieurs éléments en même temps!</p>
								<p class="note">Pourquoi pour cette requête l'aperçu du résultat (en bas à gauche de la fenêtre de sélection) est-il égal à 0 ? Cette expression est traitée pour chaque ligne de la table et est évaluée par vrai ou faux, 0 ou 1 pour l'ordinateur. L'aperçu donne un des résultats trouvés, ici le 0.</p>
				
			<h3><a class="titre" id="VI12">Créer une nouvelle couche à partir d'une sélection</a></h3>
				
				<p>Il est possible de créer une nouvelle couche shapefile à partir d'une sélection.</p>
				<div class="manip">
					<p>Votre département du Nord étant toujours sélectionné, faites un clic droit sur la couche de départements &#8594; <b>Exporter &#8594; Sauvegarder les entités sélectionnées sous...</b></p>
					<figure>
						<a href="illustrations/tous/6_1_sauv_selection_fenetre.png" >
							<img src="illustrations/tous/6_1_sauv_selection_fenetre.png" alt="fenêtre pour sauvegarder la sélection" width="90%">
						</a>
					</figure>
					<ul>
						<li class="espace">Choisissez le format <b>GeoPackage</b></li>
						<li class="espace">Cliquez sur <b>...</b> pour choisir à quel endroit sera sauvegardée la nouvelle couche, et sous quel nom, <em class="data">dept59</em> par exemple</li>
						<li class="espace">Vérifiez que la case <b>N'enregistrer que les entités sélectionnées</b> soit cochée.</p></li>
						<li class="espace">et cliquez sur <b>OK</b></li>
					</ul>
					<p>La nouvelle couche est automatiquement ajoutée à QGIS. Elle ne contient qu'un seul département, celui du Nord.</p>
				</div>
			
			<h3><a class="titre" id="VI13">Désélectionner des entités</a></h3>
			
			 <p>Par défaut, une nouvelle requête attributaire "part de zéro", en ne tenant pas compte des entités déjà sélectionnées (pour au contraire tenir compte d'une requête précédente, cf. <a href="06_03_req_combinees.php#VI31" >partie VI.3.1 : Combiner deux requêtes attributaires</a>).</p>
			 <p>Néanmoins, pour plus de clarté, il peut être utile de désélectionner des entités.</p>
			 
			 <div class="manip">
					<p><img class="icone" src="illustrations/tous/6_3_deselection_icone.png" alt="icône de désélection" >Pour désélectionner toutes les entités dans toutes les couches : cliquez sur le bouton <b>Désélectionner toutes les entités</b> de la barre d'outils Attributs.</p>
					<p><img class="icone" src="illustrations/tous/6_3_deselection_table_icone.png" alt="icône de désélection pour une couche (table)" >Pour désélectionner les entités d'une seule couche : ouvrez la table attributaire de cette couche. Dans la barre d'outils en haut de la table cliquez sur l'outil <b>Tout désélectionner</b>.</p>
				</ul>
				
				<p>Attention, ces deux outils ont la même icône, mais ils ne sont pas situés au même endroit !</p>
			 </div>
			 
			<h3><a class="titre" id="VI14">Quelques opérateurs</a></h3>
			
				<p>Dans l'exemple ci-dessus, nous avons utilisé l'opérateur <b>=</b> pour notre requête. Il en existe d'autre, comme par exemple les opérateurs mathématiques inférieur à et supérieur à, multiplier, diviser...</p>
				<div class="manip">
					<p>Ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_06_Requetes.zip">communes_Bretagne</a></em> située dans le dossier <b>TutoQGIS_06_Requetes/donnees</b>.</p>
					<p>Fermez la table attributaire de la couche de départements et ouvrez celle de la couche de communes. Cette table comporte une colonne <b>POPULATION</b> avec la population de chaque commune en nombre d'habitants.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Pouvez-vous dire rapidement quelle est la commune la plus peuplée ?</label></p>
						<p class="reponse">En cliquant une première fois sur le nom de colonne POPULATION pour classer la population par ordre croissant, puis une deuxième fois pour la classer par ordre décroissant, on peut lire que la commune de Rennes est la plus peuplée avec 216&nbsp;268 habitants.</p>
					</div>
					<p><img class="icone" src="illustrations/tous/6_1_selection_attr_icone.png" alt="icône de sélection de la table attributaire" >Nous allons faire une requête pour sélectionner les communes de + de 10 000 habitants. Ouvrez la fenêtre de requête pour la couche de communes :</p>
					<figure>
						<a href="illustrations/tous/6_1_popsup10000.png" >
							<img src="illustrations/tous/6_1_popsup10000.png" alt="fenêtre de sélection avec une requête pour les communes de population supérieure à 10" width="600">
						</a>
					</figure>
						<ul>
							<li class="espace">Cliquez sur <b>Champs et valeurs</b> pour voir la liste des champs, puis double-cliquez sur le champ <b>POPULATION</b></li>
							<li class="espace">Dans la case <b>Expression</b>, tapez <b>> 100000</b></li>
						</ul>
					<p>Il est également possible d'aller chercher l'opérateur <b>></b> dans la liste des opérateurs, dans la colonne de gauche. Il faut ensuite taper la valeur 10 à la main.</p>
					<p>Une fois votre requête tapée : <b>"POPULATION" > 10000</b>, cliquez sur le bouton <b>Sélectionner des entités</b> pour voir le résultat :</p>
					<figure>
						<a href="illustrations/tous/6_1_popsup10000_res.png" >
							<img src="illustrations/tous/6_1_popsup10000_res.png" alt="résultat de la requête pour les communes de population supérieure à 10" width="450">
						</a>
					</figure>
				</div>

				<p>Les opérateurs qu'on voit en haut à gauche de la fenêtre de sélection (=, +, - ...) ne représentent qu'une petite partie des opérateurs disponibles ; vous pouvez tous les retrouver dans la catégorie <b>Opérateurs</b> de la colonne du milieu. En cliquant sur un opérateur, vous pouvez lire l'aide dans la partie de droite :</p>
				<figure>
					<a href="illustrations/tous/6_1_liste_operateurs.png" >
						<img src="illustrations/tous/6_1_liste_operateurs.png" alt="liste des opérateurs avec aide pour l'opérateur <>" width="500">
					</a>
				</figure>
				<p>Parmi ces opérateurs se trouvent par exemple <b>LIKE</b> et <b>ILIKE</b>. L'opérateur <b>LIKE</b> permet de comparer une chaîne de caractère à une autre chaîne qui peut utiliser le caractère joker <b>%</b>.</p>
				<p>Ce caractère peut remplacer un ou plusieurs caractères : par exemple, 'A%' peut correspondre à Ardèche, Allier...</p>
				<p>Sélectionnons les communes dont le nom commence par 'PLOU' !</p>
				
				<div class="manip">
					<p>Ouvrez la fenêtre de sélection pour la couche de communes. Écrivez la requête suivante : <b>"NOM_COM_M" like 'PLOU%'</b> (soit en la tapant à la main soit en double-cliquant sur les différents éléments).</p>
					<figure>
						<a href="illustrations/tous/6_1_res_plou.png" >
							<img src="illustrations/tous/6_1_res_plou.png" alt="communes dont le nom commence par PLOU" width="450">
						</a>
					</figure>
				</div>
				
				<p>Notez que, pour du texte, si le caractère % n'est pas utilisé, les opérateurs <b>=</b> et <b>LIKE</b> sont équivalents.</p>
				<p>L'opérateur <b>ILIKE</b> est équivalent à <b>LIKE</b> mais ne tient pas compte de la casse (majuscules ou minuscules).</p>
				
				<p><img class="iconemid" src="illustrations/tous/6_3_deselection_icone.png" alt="icône de désélection" >Entre deux requêtes, pour être sûr de repartir à zéro, utiliser l'outil <b>tout désélectionner</b>.</p>
			
			<h3><a class="titre" id="VI15">Combiner plusieurs critères</a></h3>
			
				<p>Comment faire s'il l'on veut sélectionner par exemple les communes de + de 10 000 habitants dont le nom commence par 'PLOU' ?</p>
				<p>Il s'agit ici de combiner deux critères. Deux opérateurs permettent cela : <b>AND</b> (et) et <b>OR</b> (ou).</p>
				<ul>
					<li>Avec l'opérateur <b>AND</b>, <b>tous les critères</b> doivent être remplis</li>
					<li>Avec l'opérateur <b>OR</b>, il suffit <b>qu'un seul des critères</b> soit rempli</li>
				</ul>
				
				<div class="manip">
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Quelle requête utiliser pour sélectionner les communes de plus de 10 000 habitants dont le nom commence par PLOU ?</label></p>
						<p class="reponse">"NOM_COM_M" like 'PLOU%' and "POPULATION" > 10000 : cette requête sélectionne 3 communes.</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-3">
						<p><label for="faq-3">Quelle requête utiliser pour sélectionner les communes de Brest et Plouzané ?</label></p>
						<p class="reponse">"NOM_COM_M" LIKE 'BREST' OR  "NOM_COM_M" LIKE 'PLOUZANE' : cette requête sélectionne 2 communes. L'opérateur OR doit être utilisé car les communes ne peuvent satisfaire qu'un seul des critères à la fois (une commune ne peut s'appeler Brest et Plouzané en même temps).</p>
						<p class="reponse">Une autre possibilité, moins lourde, consiste à utiliser l'opérateur <b>IN</b> : "NOM_COMM_M"  IN ('BREST', 'PLOUZANE')</p>
					</div>
				</div>
			
			<h3><a class="titre" id="VI16">Quelques exemples à tester</a></h3>
			
				<p>Pouvez-vous sélectionner ? ...</p>
				<p>(plusieurs requêtes sont parfois possibles pour un même résultat)</p>
				
				<div class="manip">
					<div class="question">
						<input type="checkbox" id="faq-4">
						<p><label for="faq-4">La commune de Pouldreuzic ?</label></p>
						<p class="reponse"> "NOM_COM_M" like 'POULDREUZIC' : une commune sélectionnée</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-5">
						<p><label for="faq-5">La commune du département des Côtes d'Armor (22) ?</label></p>
						<p class="reponse">"INSEE_DEP"  =  '22' : 348 communes sélectionnées</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-6">
						<p><label for="faq-6">Les communes dont le nom contient 'SAINT' ?</label></p>
						<p class="reponse"> "NOM_COM_M" like '%SAINT%' : 189 communes sélectionnées</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-8">
						<p><label for="faq-8">Les communes dont le nom commence par 'PLOU' et se termine par 'EC' ?</label></p>
						<p class="reponse"> "NOM_COM_M" like 'PLOU%' AND  "NOM_COM_M" like '%EC' : 5 communes sélectionnées</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-9">
						<p><label for="faq-9">Les communes dont la population est comprise entre 10 000 et 50 000 habitants inclus ?</label></p>
						<p class="reponse">"POPULATION" >= 10000 AND  "POPULATION"  <= 50000 : 32 communes sélectionnées</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-10">
						<p><label for="faq-10">Les communes du département du Morbihan (56), dont le nom contient ou 'PLOU' ou 'EC', et dont la population est inférieure ou égale à 10 000 habitants ?</label></p>
						<p class="reponse">"INSEE_DEP" LIKE '56' AND ( "NOM_COM_M" LIKE '%PLOU%' OR "NOM_COM_M" LIKE '%EC%') AND  "POPULATION"  <= 10000 : 12 communes sélectionnées</p>
					</div>
				</div>
				
				<p>Nous avons vu ici comment sélectionner des entités en fonction de leurs données attributaires. Au chapitre suivant, nous verrons comment sélectionner des entités en fonction de leur position par rapport aux entités d'une autre couche&nbsp;!</p>
			
				
				<br>
				<a class="prec" href="06_00_requetes.php">chapitre précédent</a>
				<a class="suiv" href="06_02_req_spatiales.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_6.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
