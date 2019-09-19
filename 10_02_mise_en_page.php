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
			<h2>X.2  Mettre en page une carte</h2>
				<ul class="listetitres">
					<li><a href="#X21">Préparation de la mise en page</a></li>
					<li><a href="#X22">Mise en page : le composeur d'impression</a>
						<ul class="listesoustitres">
							<li><a href="#X22a">Créer une carte sur une page au format de votre choix</a></li>
							<li><a href="#X22b">Paramétrer la légende</a></li>
							<li><a href="#X22c">Paramétrer l'échelle</a></li>
							<li><a href="#X22d">Ajout d'éléments supplémentaires : titre, logo, flèche nord...</a></li>
							<li><a href="#X22e">Exporter la carte</a></li>
						</ul>
					</li>
					<li><a href="#X23">Sauvegarder une mise en page</a></li>
				</ul>
				
				<p>Une fois vos données représentées de manière satisfaisante, il peut être utile d'en faire une carte. <b>Cette partie n'a pas pour but d'expliquer les bonnes et mauvaises pratiques en matière de cartographie</b>, mais se bornera à décrire quelques fonctionnalités du mode mise en page de QGIS.</p>
				<p>L'exemple portera ici sur une carte de la densité de population par communes (carte choroplèthe) en France. Mais vous pouvez choisir le sujet de votre choix, avec vos données&nbsp;!</p>
				
				<h3><a class="titre" id="X21">Préparation de la mise en page</a></h3>
				
					<div class="manip">
						<p>Commencez par ajouter toutes les couches dont vous avez besoin, et supprimez toutes les couches inutiles.</p>
						<p>Choisissez le style de chacune des couches.</p>
						<p>N'oubliez pas également de choisir un SCR adapté pour votre projet (projeté si vous souhaitez créer une échelle en mètres par exemple) (cf. <a href="02_04_changer_systeme.php#II41">Modifier le SCR du projet</a>).</p>
						<p>Pour aller plus vite, vous pouvez ouvrir le projet tout fait <a href="donnees/TutoQGIS_10_Representation.zip" >misenpage_densite.qgz</a>. Dans ce cas, nombre des étapes décrites ci-dessous seront déjà réalisées, mais vous pourrez modifier les différents paramètres.</p>
					</div>
						
				<h3><a class="titre" id="X22">Mise en page : le composeur d'impression</a></h3>
					
					<p>Le mode mise en page ouvre une fenêtre à part dans QGIS. On peut y ajouter différents éléments&nbsp;: carte, légende, échelle... La carte est liée à celle de la fenêtre principale de QGIS et se met à jour automatiquement.</p>
					<p class="note">Dans la version 2.18 de QGIS, le mode mise en page se nommait &#171;&nbsp;composeur d'impression&nbsp;&#187;.</p>
					
					<div class="manip">
						<p>
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Nouvelle mise en page...
								<span>
									<img src="illustrations/tous/10_02_composeur_menu.png" alt="Menu Projet, Nouvelle mise en page..." width="100%">
								</span>
							</a>
						</p>
						<p>Tapez un titre, par exemple densité communes.</p>
					</div>
					
					<p>Le principe du composeur d'impression est simple :</p>
					<ul>
					   <li>l'onglet <b>Mise en page</b> permet de fixer les paramètres de la page (format A4, paysage ou portrait...)</li>
					   <li>l'onglet <b>Propriétés de l'objet</b> permet de fixer les paramètres de l'objet actuellement sélectionné.</li>
					</ul>
					
					<h4><a class="titre" id="X22a">Créer une carte sur une page au format de votre choix</a></h4>
					
						<p>La première étape consiste à déterminer les dimensions de la page dans l'onglet composition. S'il s'agit d'une figure destinée à être intégrée dans un rapport, vous pouvez très bien choisir une taille personnalisée, par exemple 15 x 15 cm.</p>
						
						<div class="manip">
							<p>Dans l'onglet <b>Composition &#8594; Options du papier</b>, choisissez <b>Personnalisation</b> au lieu de A4. Fixez ensuite la largeur et la hauteur à 150 mm.</p>
						
							<figure>
								<a href="illustrations/tous/10_02_taille_page.png" >
									<img src="illustrations/tous/10_02_taille_page.png" alt="Fixer la taille de la page dans le composeur" width="400">
								</a>
							</figure>
							<p><img class="icone" src="illustrations/tous/10_02_zoom_page_icone.png" alt="icône zoom sur l'emprise totale du composeur" >Pour zoomer sur votre page : cliquez sur l'icône <b>Zoom sur l'emprise totale</b> (ou <b>menu Vue &#8594; Zoom sur l'emprise totale</b>).</p>							
							<p><img class="icone" src="illustrations/tous/10_02_nouvelle_carte_icone.png" alt="icône ajouter une nouvelle carte" >Cliquez ensuite sur l'icône <b>Ajouter une nouvelle carte</b> (ou <b>menu Mise en page &#8594; Ajouter une carte</b>).</p>
							<p>Dessinez un rectangle n'importe où sur la page, de la taille que vous voulez. Puis rendez-vous dans l'onglet <b>Propriétés de l'objet</b>, rubrique <b>Position et taille</b>, et fixez <b>X et Y à 0</b> et la <b>largeur et hauteur à 150 mm</b> pour que la carte coïncide avec la page.</p>
							<figure>
								<a href="illustrations/tous/10_02_position_carte.png" >
									<img src="illustrations/tous/10_02_position_carte.png" alt="Fixer l'emplacement et la taille de la carte sur la page" width="400">
								</a>
							</figure>
						
						</div>
						
							<p><b>La carte ainsi créée est synchronisée avec les données visibles dans QGIS</b> : si vous changer le style d'une des couches dans la fenêtre principale de QGIS et revenez au composeur, la carte aura été mise à jour (si besoin en cliquant sur le bouton actualiser).</p>
							
						<div class="manip">
						
							<p><img class="icone" src="illustrations/tous/10_02_deplacer_contenu_icone.png" alt="icône déplacer le contenu de l'objet" >Pour <b>centrer la carte</b> : cliquez sur l'icône <b>Déplacer le contenu de l'objet</b> et faites glisser le contenu de la carte.</p>
							<p>Pour <b>zoomer et dézoomer</b> : modifiez l'échelle dans les propriétés de la carte, ou bien utilisez la molette de la souris après avoir sélectionner l'outil <b>Déplacer le contenu de l'objet</b>.</p>
							<figure>
								<a href="illustrations/tous/10_02_zoom.png" >
									<img src="illustrations/tous/10_02_zoom.png" alt="Fixer l'échelle de la carte" width="400">
								</a>
							</figure>
							
						</div>
						
					<h4><a class="titre" id="X22b">Paramétrer la légende</a></h4>
					
						<p>Il existe de nombreuses possibilités pour paramétrer la légende. Elles ne seront pas toutes passées en revue ici, mais n'hésitez pas à explorer par vous-même !</p>
						<div class="manip">
						
							<p><img class="icone" src="illustrations/tous/10_02_legende_icone.png" alt="icône ajouter une nouvelle légende" >Pour ajouter une <b>légende</b> : icône <b>Ajouter une nouvelle légende</b>, puis cliquez n’importe où sur la carte.</p>
							<p>La légende reprend celle de la couche dans QGIS : si vous modifiez les étiquettes de la légende dans la propriété de la couche, la légende du composeur prendra en compte ces modifications.</p>
							<p>Dans la fenêtre principale de QGIS, ouvrez les propriétés de la couche, rubrique Style. Vous pouvez :</p>
							<ul>
								<li class="espace"><b>Modifier les bornes des classes</b> en double-cliquant sur une ligne dans la colonne valeur</li>
								<li class="espace"><b>Modifier l'étiquette des classes</b> en double-cliquant sur une ligne dans la colonne étiquette</li>
							</ul>
							<figure>
								<a href="illustrations/tous/10_02_style_etiquettes.png" >
									<img src="illustrations/tous/10_02_style_etiquettes.png" alt="Modifier les bornes des classes et leurs étiquettes dans les propriétés de la couche" width="600">
								</a>
							</figure>
							<p><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="icône sélectionner/déplacer un objet" >Revenez ensuite dans le composeur et cliquez sur votre légende avec l'outil <b>Sélectionner / Déplacer un objet</b>.</p>
							<p>Ces modifications seront directement prises en compte dans la légende si la case <b>Mise à jour auto</b> est cochée. Cette case présente néanmoins l'inconvénient de ne pas vous donner la main sur la légende ; si vous la décochez, vous pourrez changer l'ordre des couches, en ajouter et en supprimer... grâce aux icônes situées sous la légende, et mettre à jour leur légende en cliquant sur le bouton <b>Tout mettre à jour</b>.</p>
							<figure>
								<a href="illustrations/tous/10_02_objets_legende.png" >
									<img src="illustrations/tous/10_02_objets_legende.png" alt="Rubrique objets de légende dans les propriétés de la légende" width="500">
								</a>
							</figure>
							<p><img class="icone" src="illustrations/tous/10_02_legende_edition_icone.png" alt="icône d'édition des objets de légende" >Vous pouvez également <b>modifier les étiquettes directement dans la légende</b>, en cliquant sur une ligne puis sur le bouton d'édition.</p>

							<p>Voici une dernière astuce (à vous d'en trouver d'autres !) pour faire un <b>retour à la ligne</b>, dans le titre par exemple. Dans la case <b>Activer le retour à la ligne après</b>, tapez un caractère dont vous ne vous servez habituellement pas, par exemple <b>$</b>. Ce caractère ne sera pas représenté mais provoquera un retour à la ligne.</p>
							<p>Dans la case <b>Titre</b>, tapez le titre souhaité pour votre légende, avec un <b>$</b> quand vous souhaitez passer à la ligne : <b>Densité population$nb habitants / km²</b> par exemple.</p>
							<figure>
								<a href="illustrations/tous/10_02_titre_legende.png" >
									<img src="illustrations/tous/10_02_titre_legende.png" alt="Exemple de titre de légende avec un retour à la ligne" width="450">
								</a>
							</figure>
							<p class="note">Le $ provoquera également une retour à la ligne pour les autres objets de la légende (étiquettes, nom de la couche...).</p>
							<p>N'hésitez pas à explorer les autres rubriques des propriétés de la légende.</p>
							
						</div>
							
						<p>Un exemple de légende :</p>
						<figure>
							<a href="illustrations/tous/10_02_legende_visu.png" >
								<img src="illustrations/tous/10_02_legende_visu.png" alt="Exemple de légende pour la densité de population" width="400">
							</a>
						</figure>
						
						
					<h4><a class="titre" id="X22c">Paramétrer l'échelle</a></h4>
					
						<div class="manip">
							<p><img class="icone" src="illustrations/tous/10_02_echelle_icone.png" alt="icône ajouter une nouvelle échelle graphique" >Pour ajouter une échelle : outil <b>Ajouter une nouvelle échelle graphique</b> puis cliquez sur la carte.</p>
							<p>Comme pour la légende, il est possible de régler assez finement les différents paramètres de cette échelle.</p>
							<p>Par exemple, si vous voulez une échelle en Km, indiquez d'abord l'unité des de votre projet : le mètre (votre projet doit utiliser un SCR projeté), puis tapez 1000 dans la case <b>Multiplicateur des unités de l'étiquette</b>.</p>
							<figure>
								<a href="illustrations/tous/10_02_echelle_unites.png" >
									<img src="illustrations/tous/10_02_echelle_unites.png" alt="Paramétrer les unités de l'échelle" width="380">
								</a>
							</figure>
						<p>Vous pouvez également régler le nombre de segments de l'échelle, et la largeur du trait :</p>
						<figure>
							<a href="illustrations/tous/10_02_echelle_segments.png" >
								<img src="illustrations/tous/10_02_echelle_segments.png" alt="Paramétrer le nombre de segments de l'échelle" width="380">
							</a>
						</figure>
						<p>Différents styles d'échelle peuvent être choisis dans la rubrique <b>Propriétés principales</b> de l'échelle :</p>
						<figure>
							<a href="illustrations/tous/10_02_echelle_style.png" >
								<img src="illustrations/tous/10_02_echelle_style.png" alt="Paramétrer le nombre de segments de l'échelle" width="350">
							</a>
						</figure>
					</div>
						<p>Voici quelques exemples d'échelle :</p>
						<figure>
							<a href="illustrations/tous/10_02_echelle_visu.png" >
								<img src="illustrations/tous/10_02_echelle_visu.png" alt="Exemple d'échelle simple" width="175">
							</a>
							<a href="illustrations/tous/10_02_echelle_visu_2.png" >
								<img src="illustrations/tous/10_02_echelle_visu_2.png" alt="Exemple d'échelle simple" width="175">
							</a>
							<a href="illustrations/tous/10_02_echelle_visu_3.png" >
								<img src="illustrations/tous/10_02_echelle_visu_3.png" alt="Exemple d'échelle simple" width="175">
							</a>
						</figure>
							
					
					<h4><a class="titre" id="X22d">Ajout d'éléments supplémentaires : titre, logo, flèche nord...</a></h4>
					
						<div class="manip">
							<p><img class="icone" src="illustrations/tous/10_02_etiquette_icone.png" alt="icône ajouter une étiquette" >Pour ajouter du <b>texte</b>, par exemple un titre, les sources, l'auteur... : outil <b>Ajouter une nouvelle étiquette</b>.</p>
							<p>Dans les propriétés de cet objet, vous pouvez ensuite modifier le texte, la police, la couleur...</p>
							<p><img class="icone" src="illustrations/tous/10_02_image_icone.png" alt="icône ajouter une image" >Si vous voulez ajouter une image, par exemple un logo : outil <b>Ajouter une image</b> puis dessinez un rectangle sur la page.</p>
							<p>Dans les propriétés principales, choisissez ensuite une image sur votre ordinateur :</p>
							<figure>
								<a href="illustrations/tous/10_02_image_parcourir.png" >
									<img src="illustrations/tous/10_02_image_parcourir.png" alt="Choix d'une image" width="350">
								</a>
							</figure>
						</div>
							<p>Par convention, le Nord est situé en haut de votre carte. Ajouter une flèche Nord si tel est bien le cas n'est donc pas indispensable et peut même alourdir inutilement votre carte et donc nuire à sa lisibilité.</p>
							<p>Peut-être avez-vous néanmoins besoin d'une flèche Nord, par exemple si le Nord n'est pas en haut de votre carte ?</p>
						<div class="manip">
							<p>Dans ce cas, utilisez également l'outil <b>Ajouter une image</b> et choisissez comme image un symbole de flèche Nord. Pour cela, vous pouvez utiliser la bibliothèque de symboles de QGIS, dans la rubrique <b>Rechercher dans les répertoires</b>.</p>
							<figure>
								<a href="illustrations/tous/10_02_fleche_nord.png" >
									<img src="illustrations/tous/10_02_fleche_nord.png" alt="Choix d'un symbole de fleche nord à partir de la bibliotheque de symboles" width="350">
								</a>
							</figure>
							<p class="note">Il est possible d'ajouter de nouveaux symboles au format SVG à cette bibliothèque, au moyen du bouton <b>Ajouter...</b></p>
							<p>Pour synchroniser votre flèche Nord avec votre carte, afin que cette flèche indique toujours le Nord : cocher la case <b>Synchroniser avec la carte</b> dans la rubrique <b>Image rotation</b>.</p>
							<figure>
								<a href="illustrations/tous/10_02_fleche_synchro.png" >
									<img src="illustrations/tous/10_02_fleche_synchro.png" alt="synchroniser la fleche nord avec la carte" width="350">
								</a>
							</figure>
							<p class="note">Pour régler la rotation de la carte, dans les propriétés principales de la carte (toujours dans le composeur), réglez le paramètre <b>Rotation de la carte</b>.</p>
						</div>
						<p>Vous pouvez également ajouter une deuxième carte à votre page, qui servira par exemple de carte de situation.</p>
						<div class="manip">
							<p>Ajouter une carte, réglez son emprise et son échelle, et allez dans la rubrique <b>Aperçu</b> des propriétés de cette carte, pour visualiser l'emprise de votre première carte :</p>
							<figure>
								<a href="illustrations/tous/10_02_apercu_reglage.png" >
									<img src="illustrations/tous/10_02_apercu_reglage.png" alt="reglage de l'aperçu pour voir l'emprise de la 1ère carte sur la 2ème" width="350">
								</a>
							</figure>
							<p class="note">Il peut être nécessaire de choisir les bonnes couches pour une des cartes dans QGIS, mettre à jour cette carte dans le composeur puis cocher la case <b>Verrouiller les couches pour cette carte</b> avant de faire la même chose pour l'autre carte.</p>
							<p class="note">De manière générale, si vous avez plusieurs cartes, la manière la plus facile de les gérer est peut-être de créer un groupe de couches par carte dans QGIS, quitte à dupliquer certaines couches.</p>
						</div>
						<figure>
							<a href="illustrations/tous/10_02_apercu.png" >
								<img src="illustrations/tous/10_02_apercu.png" alt="exemple : une carte de France, avec en haut une petite carte d'Europe et un rectangle correspondant à l'emprise de la carte de France" width="350">
							</a>
						</figure>
					
					<h4><a class="titre" id="X22e">Exporter la carte</a></h4>
					
						<p>Vous êtes satisfait de votre carte ? Voici venu le moment de l'exporter !</p>
						<p>Vous pouvez soit l'<b>exporter au format image</b> (PNG, JPG) pour l'intégrer directement dans un rapport par exemple, soit l'<b>exporter au format vectoriel</b> SVG ou PDF pour la retravailler dans un logiciel de dessin type Inkscape ou Adobe Illustrator. Vous pouvez également l'imprimer directement !</p>
						
						<div class="manip">
							<p>Pour <b>exporter au format image</b> : vous pouvez tout d'abord paramétrer la résolution à laquelle votre carte sera exportée : onglet <b>Composition</b>, <b>Paramètres d'export :</b></p>
							<figure>
								<a href="illustrations/tous/10_02_export_resolution.png" >
									<img src="illustrations/tous/10_02_export_resolution.png" alt="choix d'une résolution de 300 dpi pour l'export" width="400">
								</a>
							</figure>
							<p class="note">On considère généralement qu'une résolution de 300 dpi est suffisante pour une impression. Pour en savoir plus sur ce qu'est la résolution d'une image : <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29" >http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29</a></p>
							<p><img class="icone" src="illustrations/tous/10_02_export_image_icone.png" alt="icône Exporter comme une image" >Pour ensuite exporter votre mise en page au format image : à partir du composeur, <b>menu Composeur &#8594; Exporter comme image...</b></p>
							<p>De nombreux formats sont disponibles : PNG, JPEG, TIFF, EPS...</p>
							<p><img class="icone" src="illustrations/tous/10_02_export_svg_icone.png" alt="icône Exporter au format SVG" >Pour <b>exporter au format SVG</b> : à partir du composeur, <b>menu Composeur &#8594; Exporter au format SVG...</b></p>
							<p><img class="icone" src="illustrations/tous/10_02_impression_icone.png" alt="icône Imprimer" >Pour <b>imprimer la carte</b> : à partir du composeur, <b>menu Composeur &#8594; Imprimer...</b> ou bien <b>Ctrl + P</b></p>
						</div>
							<p>L'export au format SVG peut poser quelques problèmes, en particulier pour gérer la transparence. L'export au format PDF peut parfois être plus pratique pour ensuite retoucher la carte dans un logiciel de dessin.</p>
					
							<p>Un exemple de carte réalisée dans QGIS :</p>
							<figure>
								<a href="illustrations/tous/10_02_carte_exemple.png" >
									<img src="illustrations/tous/10_02_carte_exemple.png" alt="exemple d'une carte de densité de population dans QGIS" width="400">
								</a>
							</figure>
							
							<p>A noter également, l'existence d'un module permettant la <b>génération d'atlas</b> (il s'agit du troisième onglet dans le composeur d'impression). Ce module est décrit dans le <a class="ext" target="_blank" href="http://documentation.qgis.org/2.8/fr/docs/user_manual/print_composer/print_composer.html#atlas-generation">manuel QGIS</a>, ou bien <a class="ext" target="_blank" href="http://nyalldawson.net/2013/04/a-neat-trick-in-qgis-2-0-images-in-atlas-prints/">ici</a> (en anglais).</p>
				
				<h3><a class="titre" id="X23">Sauvegarder une mise en page</a></h3>
				
					<p>Dans QGIS, les mises en page sont sauvegardées dans les projets QGS. Pour sauvegarder votre mise en page, il vous suffit donc de sauvegarder votre projet.</p>
					
					<div class="manip">
						<p>Dans la fenêtre principale de QGIS, rendez-vous dans le <b>menu Projet &#8594; Sauvegarder sous...</b>.</p>
						<p>Choisissez un emplacement : dossier <b>TutoQGIS_10_Representation/projets</b> par exemple, et un nom : <b>carte_densite_01</b> par exemple.</p>
					</div>

				<br>
				<a class="prec" href="10_01_representation.php">chapitre précédent</a>
				<a class="suiv" href="11_00_automatisation.php">partie XI : automatisation de traitements</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_10.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
