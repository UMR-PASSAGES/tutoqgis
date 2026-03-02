<?php include('head.inc.php');?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php');?>
	
	<div id="container_main_sidebar">

		
		<div class="main">
		  <h1 class="hide_for_pdf">X.  Représenter des données et les mettre en page</h1>
			<h2>X.2  Mettre en page une carte</h2>
				<ul class="listetitres">
					<li><a href="#X21">Préparation de la mise en page</a></li>
					<li><a href="#X22">Sauvegarder une mise en page</a></li>
					<li><a href="#X23">Mise en page&nbsp;: une fenêtre dédiée</a></li>
					<li><a href="#X24">Modifier les dimensions de la page</a></li>
					<li><a href="#X25">Ajouter une carte</a></li>
					<li><a href="#X26">Ajouter une légende</a>
					   <ul class= "listesoustitres">
					       <li><a href="#X26a" >Création de la légende</a></li>
					       <li><a href="#X26b" >Modifier les éléments</a></li>
					       <li><a href="#X26c" >Ajouter un titre</a></li>
					       <li><a href="#X26d" >Autres paramètres de la légende</a></li>
					   </ul>
					</li>
					<li><a href="#X27">Ajouter une échelle</a>
					   <ul class= "listesoustitres">
					       <li><a href="#X27a" >Création de l'échelle</a></li>
					       <li><a href="#X27b" >A chaque échelle son style</a></li>
					   </ul>
					</li>
					<li><a href="#X28">Ajout d'éléments supplémentaires&nbsp;: titre, logo, flèche nord...</a></li>
					<li><a href="#X29">Ajout d'une carte de situation</a></li>
					<li><a href="#X210">Exporter la carte</a></li>
				</ul>
				
				<p>Une fois vos données représentées de manière satisfaisante, il peut être utile d'en faire une carte. <b>Cette partie n'a pas pour but d'expliquer les bonnes et mauvaises pratiques en matière de cartographie</b>, mais se bornera à décrire quelques fonctionnalités du mode mise en page de QGIS.</p>
				<p>L'exemple portera ici sur une carte de la densité de population par communes (carte choroplèthe) en région Normandie. Mais vous pouvez choisir le sujet de votre choix, avec vos données&nbsp;!</p>
				
				<h3>Préparation de la mise en page<a class="headerlink" id="X21" href="#X21"></a></h3>
				
					<p>Le principe est de commencer par ajouter toutes les couches dont vous avez besoin, et supprimez toutes les couches inutiles.</p>
					<div class="manip">
					 <p>Dans un nouveau projet QGIS, ajoutez la couche <em class="data"><a href="donnees/TutoQGIS_10_Representation.zip">commune.gpkg</a></em>.</p>
					 <p>Puis <a href="01_02_info_geo.php#I23c">filtrez</a> la couche pour ne garder que les communes de Normandie (ou de la région de votre choix&nbsp;!). Le code région de Normandie est 28, comme vous pouvez le vérifier en cliquant sur une commune normande avec l'outil <em>Identifier des entités</em>.</p>
					 <p>Afin d'éviter un effet &#171;&nbsp;île&nbsp;&#187; où la Normandie flotte dans le vide, chargez également la couche <em class="data"><a href="donnees/TutoQGIS_10_Representation.zip">region.gpkg</a></em>, qui jouera le rôle de fond de carte.</p>
					</div>
					
					<p>Il faut ensuite définir le style de chacune des couches.</p>
					<div class="manip">
					 <p>Pour la couche commune, le but est de représenter la densité de population par une carte choroplèthe. Pour cela vous devrez déterminer dans la symbologue de la couche&nbsp;:</p>
					 <ul>
					   <li class="espace">le type de symbologie&nbsp;: <b>Gradué</b> pour pouvoir faire des classes</li>
					   <li class="espace">la variable à représenter&nbsp;: soit en <a href="10_01_representation.php#X12a">créant un champ densité</a> au préalable, soit directement avec l'expression <b> "population" / ($area/1000000)</b></li>
					   <li class="espace">le mode de discrétisation, par exemple par <b>quantiles</b> (effectifs égaux)</li>
					   <li class="espace">un nombre de classes, ici <b>7</b></li>
					   <li class="espace">une palette de couleur, ici le dégradé <b>PuRd</b> (Purple-Red)</li>
					   <li class="espace">enfin, pour des raisons d'esthétisme et de lisibilité, on va <a href="10_01_representation.php#X12b">masquer les bordures</a> des communes avec l'expression <em>@symbol_color</em></li>
					 </ul>
					 <p>Ce qui donne à peu près ceci&nbsp;:</p>
					 <figure>
							<a href="illustrations/10_02_style_communes.jpg" >
								<img src="illustrations/10_02_style_communes.jpg" alt="Style des couches avec tous les paramètres listés ci-dessus" width="600">
							</a>
						</figure>
						<p>Concernant les régions, l'idée est choisir un fond neutre, par exemple gris clair.</p>
						<p>Voici un exemple de rendu&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_rendu_style.jpg" >
								<img src="illustrations/10_02_rendu_style.jpg" alt="communes avec densité de pop en aplat de couleur et régions en gris clair" width="500">
							</a>
						</figure>
					</div>
					
					<p>Ne pas oublier de choisir un SCR adapté pour votre projet (projeté si vous souhaitez créer une échelle en mètres par exemple) (cf. <a href="02_04_changer_systeme.php#II41">Modifier le SCR du projet</a>).</p>
					
					<div class="manip">
					 <p>Vérifiez le SCR de vos 2 couches&nbsp;; normalement le projet doit être dans le même SCR, c'est-à-dire le <b>RGF93/Lambert93 code EPSG 2154</b>.</p>
					 <p>Dans la mesure où il s'agit d'un SCR projeté et du système officiel en France métropolitaine, ce choix est adapté.</p>
					</div>
					
								
				<h3>Sauvegarder une mise en page<a class="headerlink" id="X22" href="#X22"></a></h3>
				
					<p>Dans QGIS, les mises en page sont sauvegardées dans les projets QGZ. Pour sauvegarder votre mise en page, il vous suffira donc de sauvegarder votre projet.</p>
					
					<div class="manip">
						<p>Dans la fenêtre principale de QGIS, rendez-vous dans le <b>menu Projet &#8594; Enregistrer sous...</b>.</p>
						<p>Choisissez un emplacement&nbsp;: dossier <b>TutoQGIS_10_Representation/projets</b> par exemple, et un nom&nbsp;: <b>carte_densite_01</b> par exemple.</p>
						<p>Un projet peut contenir plusieurs mises en page. Pour renommer, ajouter, supprimer ou dupliquer des mises en page&nbsp;: <b>menu Projet &#8594; Gestionnaire de mise en page...</b>.</p>
						<figure>
							<a href="illustrations/10_02_gestionnaire_misenpage.jpg" >
								<img src="illustrations/10_02_gestionnaire_misenpage.jpg" alt="Fenêtre du gestionnaire de mise en page" width="400">
							</a>
						</figure>
					</div>
					
					<p>Jusqu'ici nous n'avons que rarement sauvegardé le projet, en cas de problème relancer QGIS et ajouter à nouveau les quelques couches utilisées ne prend pas beaucoup de temps.</p>
					<p>Par contre, dans le cas d'une mise en page, la sauvegarde devient essentielle&nbsp;! <b>Pensez donc à régulièrement sauvegarder votre projet.</b></p>
					
						
				<h3>Mise en page&nbsp;: une fenêtre dédiée<a class="headerlink" id="X23" href="#X23"></a></h3>
					
					<p>Le mode mise en page ouvre une fenêtre à part dans QGIS. On peut y ajouter différents éléments&nbsp;: carte, légende, échelle... La carte est liée à celle de la fenêtre principale de QGIS et se met à jour automatiquement.</p>
					
					<div class="manip">
						<p>Créez une nouvelle mise en page&nbsp;: <b>menu Projet &#8594; Nouvelle mise en page...</b> Tapez un titre, par exemple densité communes.</p>
						<p>La fenêtre de mise en page s'ouvre&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_misenpage_general.jpg" >
								<img src="illustrations/10_02_misenpage_general.jpg" alt="Fenêtre de mise en page, avec des numéros pour les différentes parties (menus et outils, carte...)" width="600">
							</a>
						</figure>
					</div>
					
					<p>On trouve dans cette fenêtre&nbsp;:</p>
					<p><em class="numero">1. </em><b>Mise en page&nbsp;:</b> cette zone correspond à une page blanche, dont vous pouvez paramétrez notamment les dimensions. Vous pouvez ajouter à cette page des cartes (liées à la fenêtre principale de QGIS), légendes, échelles etc.</p>
					<p><em class="numero">2. </em><b>Menus et barres d'outils&nbsp;:</b> on retrouve les mêmes outils dans les menus ou via les icônes.</p>
					<p><em class="numero">3. </em><b>Onglets Eléments et Historique&nbsp;:</b></p>
					 <ul>
					   <li><b>Éléments</b> comporte la liste des éléments présents sur la page (carte, légende etc.). Vous pouvez les rendre visibles ou invisibles, verrouillés ou non, et en modifier l'ordre.</li>
					   <li>dans <b>l'historique</b>, vous pouvez retrouvez la liste des dernières opérations que vous avez effectuées, par exemple modifier l'ordre des éléments. En cliquant sur une opération, vous l'effectuez à nouveau.</li>
					 </ul>
					<p><em class="numero">4. </em>Plusieurs onglets sont disponibles ici&nbsp;:</p>
					<ul>
					 <li><b>Mise en page&nbsp;:</b> cet onglet permet notamment de définir une grille d'accrochage, et une résolution pour l'export. Le contenu de cet onglet ne change jamais.</li>
					 <li><b>Propriétés de l'objet&nbsp;:</b> cet onglet contient les propriétés de l'objet actuellement sélectionné, son contenu varie donc en fonction du type d'objet&nbsp;: carte, légende, texte...</li>
					 <li><b>Guides</b>&nbsp;: ici, vous pouvez définir des lignes de référence pour y aligner les objets. Nous n'utiliserons pas cette fonctionnalité, mais <a class="ext" target="_blank" href="https://docs.qgis.org/latest/fr/docs/user_manual/print_composer/overview_composer.html#the-guides-panel" >lisez la documentation</a> pour en savoir plus&nbsp;!</li>
					 <li><b>Atlas&nbsp;:</b> QGIS possède un mode Atlas, très pratique si vous avez une série de cartes à faire sur des zones différentes. Nous n'aborderons pas son fonctionnement, mais vous pouvez en savoir plus par exemple <a class="ext" target="_blank" href="https://docs.qgis.org/latest/fr/docs/training_manual/forestry/forest_maps.html?highlight=atlas">ici</a>.</li>
					</ul>
					<p><em class="numero">5. </em><b>Barre d'état&nbsp;:</b> vous pouvez lire ici les coordonnées de votre souris dans la page (il ne s'agit pas de coordonnées géographiques, mais de coordonnées en mm par rapport au coin en haut à gauche de la page) et vous pourrez aussi modifier le niveau de zoom sur la page.</p>
					
					
				<h3>Modifier les dimensions de la page<a class="headerlink" id="X24" href="#X24"></a></h3>
				
					<p>La première étape consiste à déterminer les dimensions de la page. Par défaut, il s'agit d'un A4 paysage, mais s'il s'agit d'une figure destinée à être intégrée dans un rapport, vous pouvez très bien choisir une taille personnalisée.</p>
					<p>Ici, vue la forme de la région Normandie, nous allons choisir une taille allongée pour essayer d'optimiser l'espace (en prévoyant un peu de place pour la légende).</p>
					
					<div class="manip">
						<p>Faites un <b>clic droit sur la page &#8594; Propriétés de la page</b>.</p>
						<figure>
							<a href="illustrations/10_02_taille_page.jpg" >
								<img src="illustrations/10_02_taille_page.jpg" alt="Fixer la taille de la page dans la mise en page" width="370">
							</a>
						</figure>
						<ul>
						 <li class="espace">Largeur&nbsp;: <b>230 mm</b></li>
						 <li class="espace">Hauteur&nbsp;: <b>160 mm</b></li>
						</ul>
						
						<p><img class="icone" src="illustrations/10_02_zoom_page_icone.jpg" alt="icône zoom sur l'emprise totale de la page" >Pour zoomer sur votre page&nbsp;: cliquez sur l'icône <b>Zoom complet</b> (ou <b>menu Vue &#8594; Zoom sur l'emprise totale</b>).</p>
					</div>
						
				<h3>Ajouter une carte<a class="headerlink" id="X25" href="#X25"></a></h3>
						
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_nouvelle_carte_icone.jpg" alt="icône ajouter une nouvelle carte" >Cliquez ensuite sur l'icône <b>Ajouter Carte</b> (ou <b>menu Ajouter un objet &#8594; Ajouter Carte</b>).</p>
						<p>Dessinez un rectangle n'importe où sur la page, de la taille que vous voulez. Puis rendez-vous dans l'onglet <b>Propriétés de l'objet</b>, rubrique <b>Position et taille</b> (vers le bas de l'onglet).</p>
						<p>Fixez <b>X et Y à 0</b> et la <b>largeur et hauteur à 200 mm</b> pour que la carte coïncide avec la page.</p>
						<figure>
							<a href="illustrations/10_02_position_carte.jpg" >
								<img src="illustrations/10_02_position_carte.jpg" alt="Fixer l'emplacement et la taille de la carte sur la page" width="400">
							</a>
						</figure>
					
					</div>
					
					<p><b>La carte ainsi créée est synchronisée avec les données visibles dans QGIS</b>&nbsp;: si vous changer le style d'une des couches dans la fenêtre principale de QGIS et revenez à la mise en page, la carte aura été mise à jour (si besoin en cliquant sur le bouton actualiser).</p>
						
					<div class="manip">
					
						<p><img class="icone" src="illustrations/10_02_deplacer_contenu_icone.jpg" alt="icône déplacer le contenu de l'objet" >Pour <b>centrer la carte</b>&nbsp;: cliquez sur l'icône <b>Déplacer le contenu de l'objet</b> et faites glisser le contenu de la carte.</p>
						<p>Pour <b>zoomer et dézoomer</b>, 3 méthodes&nbsp;:</p>
						<ul>
						    <li class="espace">pour un zoom &#171;&nbsp;à la louche&nbsp;&#187;, utilisez la <b>molette</b> de la souris après avoir sélectionné l'outil <b>Déplacer le contenu de l'objet</b></li>
						    <li class="espace"><img class="icone" src="illustrations/10_02_selection_deplace_icone.jpg" alt="Icône de l'outil de sélection du mode mise en page" >pour un zoom plus précis&nbsp;: sélectionnez la carte au moyen de l'<b>outil de sélection</b>, puis <b>modifiez l'échelle</b> dans l'onglet Propriétés de l'objet &#8594; Propriétés principales
    							<a href="illustrations/10_02_zoom.jpg" >
    								<img src="illustrations/10_02_zoom.jpg" alt="Fixer l'échelle de la carte" width="450">
    							</a></li>
        					<li class="espace">Synchroniser la carte de la mise en page avec celle de la fenêtre principale de QGIS&nbsp;: cliquez sur la 2ème icône dans la barre d'outils en haut des propriétés de l'objet&nbsp;:
    							<a href="illustrations/10_02_zoom2.jpg" >
    								<img src="illustrations/10_02_zoom2.jpg" alt="Fixer l'échelle de la carte sur celle de la fenêtre QGIS" width="270">
    							</a></li>
    					</ul>
        			<p>Il est probable que les 2 cartes ne coïncident pas exactement car elles n'ont pas le même rapport hauteur/largeur. Vous pouvez aussi cliquer sur la 4ème icône pour donner à la carte de votre mise en page la même échelle que dans la fenêtre principale QGIS.</p>
        			<p><b>Ici, pour la Normandie et avec une taille de page de 23cm par 16cm, c'est une échelle de 1&nbsp;400&nbsp;000 qui a été utilisée.</b></p>
						
					</div>
					
				<h3>Ajouter une légende<a class="headerlink" id="X26" href="#X26"></a></h3>
				
					<p>Il existe de nombreuses possibilités pour paramétrer la légende. Elles ne seront pas toutes passées en revue ici, mais n'hésitez pas à explorer par vous-même&nbsp;!</p>
					
					<h4>Création de la légende<a class="headerlink" id="X26a" href="#X26a"></a></h4>
    					<div class="manip">
    					
    						<p><img class="icone" src="illustrations/10_02_legende_icone.jpg" alt="icône ajouter légende" >Pour ajouter une <b>légende</b> : icône <b>Ajouter Légende</b>, puis cliquez n’importe où sur la carte.</p>
    						<p>La fenêtre <b>Propriétés du nouvel objet</b> s'ouvre&nbsp;: cliquez sur OK sans modifiez les paramètres, ce que vous pourrez toujours faire par la suite.</p>
    						<p>La légende reprend celle des couches dans QGIS&nbsp;: si vous modifiez les étiquettes de la légende dans la propriété de la couche, la légende de la mise en page prendra en compte ces modifications.</p>
    						<p>Dans la fenêtre principale de QGIS, ouvrez les propriétés de la couche, rubrique Style. Vous pouvez&nbsp;:</p>
    						<ul>
    							<li class="espace"><b>Modifier les bornes des classes</b> en double-cliquant sur une ligne dans la colonne <b>Valeurs</b></li>
    							<li class="espace"><b>Modifier l'étiquette des classes</b> en double-cliquant sur une ligne dans la colonne <b>Légende</b></li>
    							<li class="espace">Définir la <b>précision</b> utilisée pour la légende, c'est-à-dire le nombre de chiffres après la virgule</li>
    						</ul>
    						<figure>
    							<a href="illustrations/10_02_style_etiquettes.jpg" >
    								<img src="illustrations/10_02_style_etiquettes.jpg" alt="Modifier les bornes des classes et leurs étiquettes dans les propriétés de la couche" width="550">
    							</a>
    						</figure>
    						<p><img class="icone" src="illustrations/10_02_selection_deplace_icone.jpg" alt="icône sélectionner/déplacer un objet" >Revenez ensuite dans la mise en page, les changements que vous avez effectués sont visibles dans la légende puisque la case <b>Mise à jour auto</b> est cochée par défaut.</p>
    					</div>
    					
    					<p class="note">Si vous avez <a href="" >masqué la bordure des communes avec l'expression <em>@symbol_color</em></a>, pour qu'elle ne soit pas non plus visible dans la légende, il faut lui donner une couleur blanche ou transparente dans le symbole par défaut...</p>
					
					<h4>Modifier les éléments<a class="headerlink" id="X26b" href="#X26b"></a></h4>
					
					    <p>Comment faire maintenant si vous désirez encore modifier les éléments de la légende&nbsp;?</p>
    					<p>La case <b>Mise à jour auto</b> permet de prendre en compte directement les changements effectués dans la fenêtre principale de QGIS.</p>
    					<p>Cette case présente néanmoins l'inconvénient de ne pas vous donner la main sur la légende&nbsp;; si vous la décochez, vous pourrez changer l'ordre des couches, en ajouter et en supprimer... grâce aux icônes situées sous la légende, et mettre à jour leur légende s'il y a eu modification dans QGIS en cliquant sur le bouton <b>Tout mettre à jour</b>.</p>
    					
    					<div class="manip">
    					   <p>Cliquez sur votre légende avec l'outil <b>Sélectionner / Déplacer un objet</b>.</p>
    					   <p>Décochez la case <b>Mise à jour auto</b>. Les outils sous la légende sont maintenant activés&nbsp;:</p>
    						<figure>
    							<a href="illustrations/10_02_objets_legende.jpg" >
    								<img src="illustrations/10_02_objets_legende.jpg" alt="Rubrique objets de légende dans les propriétés de la légende" width="500">
    							</a>
    						</figure>
    						<p>Vous pouvez maintenant, au moyen de ces outils&nbsp;:</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_pli_icone.jpg" alt="2 icônes pour monter ou descendre les éléménts de la légende" ><b>Plier ou déplier</b> les éléments dans la légende&nbsp;: pratique pour y voir plus clair si vous avez beaucoup d'éléments</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_ordre_icone.jpg" alt="2 icônes pour monter ou descendre les éléménts de la légende" ><b>Modifier l'ordre</b> des éléments dans la légende&nbsp;: utile pour mettre les éléments plus importants en premier</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_groupe_icone.jpg" alt="icône pour créer des groupes dans la légende" ><b>Créer des groupes</b>, pour hiérarchiser l'information</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_plus_icone.jpg" alt="icône pour ajouter des éléments dans la légende" ><b>Ajouter des couches</b> présentes dans QGIS et non visibles dans la légende</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_moins_icone.jpg" alt="icône pour supprimer des éléments de la légende" ><b>Supprimer des couches</b> de la légende, par exemple ici la couche <em class="data">region</em>, qui n'apporte rien à la compréhension de la carte en étant présente dans la légende</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_texte_icone.jpg" alt="icône pour modifier le texte des éléments de la légende" ><b>Modifier le texte</b> des éléments, si vous ne l'avez pas déjà fait dans QGIS, par exemple <em>discrétisation par quantiles</em> à la place de <em>commune</em></p>
    					    <p><img class="icone" src="illustrations/10_02_legende_compter_icone.jpg" alt="icône pour compter le nombre d'entités dans la légende" ><b>Afficher le nombre d'entités</b> dans une couche et éventuellement dans chaque classe, après avoir sélectionné une couche</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_expression_icone.jpg" alt="icône pour utiliser une expression pour définir le texte de légende" ><b>Utiliser une expression</b> pour définir le texte à afficher, c'est une fonctionnalité un peu plus avancée que nous ne verrons pas ici mais vous pouvez <a class="ext" target="_blank" href="https://docs.qgis.org/latest/fr/docs/user_manual/print_composer/composer_items/composer_legend.html#legend-items-data-defined" >lire la documentation</a> pour en savoir plus&nbsp;!</p>
    					    <p><img class="icone" src="illustrations/10_02_legende_filtrexpression_icone.jpg" alt="icône pour filtrer les éléments de la légende en fonction d'une expression" ><b>Filtrer la légende en fonction d'une expression</b></p>
    					    <p><b>Ne montrer que les entités à l'intérieur de la carte liée</b> (case à cocher)&nbsp;: vous pouvez tester cette fonctionnalité en déplaçant le contenu de la carte pour ne voir qu'un petit bout de la Normandie par exemple&nbsp;; les classes non représentées ne seront plus visibles dans la légende. Si vous déplacez le contenu de la carte pour ne voir que du blanc (pas de données), la légende sera vide.</p>
    					</div>
    					
    					<h4>Ajouter un titre<a class="headerlink" id="X26c" href="#X26c"></a></h4>
    					
    					   <p>Parfois, il peut être utile d'ajouter un titre à la légende&nbsp;; dans d'autre cas, le nom de la couche peut suffire.</p>
    					   <p><b>Dans tous les cas, évitez d'écrire &#171;&nbsp;Légende&nbsp;&#187;</b>, ce qui n'apporte rien à la carte puisqu'on voit bien qu'il s'agit de la légende. Préférez un titre indiquant clairement le sujet de la carte.</p>
                            
                           <div class="manip">
                               <p>Dans les propriétés de la légende  Propriétés principales, vous pouvez taper un titre.</p>
                               <p>Si vous voulez que ce titre soit sur plusieurs lignes, vous pouvez taper un caractère utilisé rarement dans la case <b>Activer le retour à la ligne après</b>. Ce caractère ne sera pas représenté mais provoquera un retour à la ligne.</p>
        				       <figure>
        					       <a href="illustrations/10_02_legende_titre.jpg" >
        						      <img src="illustrations/10_02_legende_titre.jpg" alt="Exemple de titre de légende avec un retour à la ligne" width="500">
        					       </a>
        					   </figure>
        					   <p>Le $ provoquera également une retour à la ligne pour les autres objets de la légende (étiquettes, nom de la couche...).</p>
        					</div>
        					
        				<h4>Autres paramètres de la légende<a class="headerlink" id="X26d" href="#X26d"></a></h4>
        				
        				    <p>Il est possible de modifier beaucoup de paramètres de la légende, comme par exemple la police, l'espacement des éléments...</p>
        				    <figure>
    					       <a href="illustrations/10_02_legende_autreparametres.jpg" >
    						      <img src="illustrations/10_02_legende_autreparametres.jpg" alt="Dans l'onglet propriétés de l'objet, paramètres de la légende de 'Polices' à 'Variables'" width="200">
    					       </a>
    					   </figure>
    					   <p>Voici quelques uns de ces éléments passés en revue, n'hésitez pas à tester&nbsp;!</p>
    					   <ul>
    					       <li class="espace"><b>Fonts (Polices)</b>&nbsp;: vous pouvez choisir la police, la taille et le style pour le titre, les groupes etc.</li>
    					       <li class="espace"><b>Colonnes</b>&nbsp;: pour une légende sur plusieurs colonnes</li>
    					       <li class="espace"><b>Symbole</b>&nbsp;: pour modifier la taille des symboles de légende</li>
    					       <li class="espace"><b>Espacement</b>&nbsp;: pour augmenter ou diminuer l'espace entre les différents éléments (par exemple sous le titre)</li>
    					       <li class="espace"><b>Cadre</b>&nbsp;: pour encadrer ou non la légende</li>
    					       <li class="espace"><b>Arrière-plan</b>&nbsp;: pour enlever ou choisir la couleur d'arrière-plan. Cette couleur peut avoir de la transparence.</li>
    					   </ul>
    						
    					<p>Un exemple de légende&nbsp;:</p>
    					<figure>
    						<a href="illustrations/10_02_legende_visu.jpg" >
    							<img src="illustrations/10_02_legende_visu.jpg" alt="Exemple de légende pour la densité de population" width="200">
    						</a>
    					</figure>
					
					
				<h3>Ajouter une échelle<a class="headerlink" id="X27" href="#X27"></a></h3>
				
				    <p>Pour certaines cartes, une échelle peut aider le lecteur à mieux comprendre le phénomène représenté. <b>Dans d'autres, elle ne sera pas nécessaire</b> (par exemple une carte du monde pour un public déjà familier de ce type de carte).</p>
				    <p>On trouve 2 types d'échelles&nbsp;: <b>numérique</b>, de type 1/25000, ou <b>graphique</b>, avec une barre d'échelle. La barre d'échelle est généralement plus claire, et présente l'avantage d'être toujours valable si votre document est imprimé à une taille différente de l'original. QGIS permet la création de ces 2 types d'échelles.</p>
				    <p>Attention, si vous utilisez une projection ne conservant pas les distances et que vous voulez tout de même afficher une échelle, celle-ci ne sera pas valable partout. Il est dans ce cas d'usage de préciser par exemple &#171;&nbsp;échelle valable à l'équateur&nbsp;&#187;.</p>
				    
				    <h4>Création de l'échelle<a class="headerlink" id="X27a" href="#X27a"></a></h4>
				    
    					<div class="manip">
    						<p><img class="icone" src="illustrations/10_02_echelle_icone.jpg" alt="icône ajouter une nouvelle échelle graphique" >Pour ajouter une échelle : outil <b>Ajouter Barre d'échelle</b> puis dessinez un rectangle sur la carte.</p>
    						<p>Cliquez sur <b>OK</b> dans la fenêtre des propriétés de l'élément qui s'ouvre ensuite (vous pourrez toujours modifier ces paramètres par la suite).</p>
    						<p>Modifiez ensuite éventuellement la taille du rectangle de l'échelle, en cliquant sur un des bords et en maintenant la souris enfoncée&nbsp;:</p>
    						<figure>
        						<a href="illustrations/10_02_echelle_reduire.jpg" >
        							<img src="illustrations/10_02_echelle_reduire.jpg" alt="Réduire la taille de l'échelle en cliquant sur le bord" width="170">
        						</a>
        					</figure>
        				</div>
        				<p>Comme pour la légende, il est possible de régler assez finement les différents paramètres de cette échelle.</p>
        					
        		 <h4>A chaque échelle son style<a class="headerlink" id="X27b" href="#X27b"></a></h4>
    					
    					<div class="manip">
						  <p><img class="icone" src="illustrations/10_02_selection_deplace_icone.jpg" alt="icône sélectionner/déplacer un objet" >Après avoir sélectionné l'échelle au moyen de l'outil de sélection, vous pouvez en modifier les propriétés dans l'onglet <b>Propriétés de l'objet.</b></p>
						
						  <p>Vous pouvez notamment modifier son style, ce qui vous permet de choisir entre 5 styles d'échelle graphique et un type d'échelle numérique, le style par défaut étant <b>Boîte unique</b>&nbsp;:</p>
    						<figure>
        						<a href="illustrations/10_02_echelle_style.jpg" >
        							<img src="illustrations/10_02_echelle_style.jpg" alt="Où modifier le style de l'échelle" width="500">
        						</a>
        					</figure>
        				   <p>Testez les différents styles&nbsp;:</p>
        				   <figure>
        						<a href="illustrations/10_02_echelle_boiteunique.jpg" >
        							<img src="illustrations/10_02_echelle_boiteunique.jpg" alt="Echelle style boîte unique" width="90">
        						</a>
        						<a href="illustrations/10_02_echelle_boitedouble.jpg" >
        							<img src="illustrations/10_02_echelle_boitedouble.jpg" alt="Echelle style boîte double" width="90">
        						</a>
                                <a href="illustrations/10_02_echelle_reperemilieu.jpg" >
        							<img src="illustrations/10_02_echelle_reperemilieu.jpg" alt="Echelle style repère au milieu de la ligne" width="90">
        						</a>
                                <a href="illustrations/10_02_echelle_reperedessous.jpg" >
        							<img src="illustrations/10_02_echelle_reperedessous.jpg" alt="Echelle style repère au dessous de la ligne" width="90">
        						</a>
                                <a href="illustrations/10_02_echelle_reperedessus.jpg" >
        							<img src="illustrations/10_02_echelle_reperedessus.jpg" alt="Echelle style repère au dessus de la ligne" width="90">
        						</a>
                                <a href="illustrations/10_02_echelle_numerique.jpg" >
        							<img src="illustrations/10_02_echelle_numerique.jpg" alt="Echelle style numérique" width="90">
        						</a>
        				   </figure>
						</div>
						
						<p>Vous pouvez également modifier les unités de l'échelle, et l'étiquette des unités&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_echelle_unites.jpg" >
								<img src="illustrations/10_02_echelle_unites.jpg" alt="Paramétrer les unités de l'échelle" width="500">
							</a>
						</figure>
    					<p>Ainsi que le nombre de segments, et la hauteur de la barre d'échelle&nbsp;:</p>
    					<figure>
    						<a href="illustrations/10_02_echelle_segments.jpg" >
    							<img src="illustrations/10_02_echelle_segments.jpg" alt="Paramétrer le nombre de segments de l'échelle" width="500">
    						</a>
    					</figure>
					   <p>Sans oublier les couleurs, et la police de caractères&nbsp;:</p>
					   <figure>
    						<a href="illustrations/10_02_echelle_police.jpg" >
    							<img src="illustrations/10_02_echelle_police.jpg" alt="Paramétrer les couleurs et la taille de l'échelle" width="420">
    						</a>
    					</figure>
    					<p>Et bien d'autres paramètres encore&nbsp;!</p>
					
    					<p>Vous pouvez opter pour un style épuré...</p>
    					<figure>
    						<a href="illustrations/10_02_echelle_visu.jpg" >
    							<img src="illustrations/10_02_echelle_visu.jpg" alt="Exemple d'échelle simple" width="200">
    						</a>
    					</figure>
    					<p>...ou bien laisser parler l'artiste qui est en vous&nbsp;:</p>
    					<figure>
    					   <a href="illustrations/10_02_echelle_coupemulet.jpg" >
    							<img src="illustrations/10_02_echelle_coupemulet.jpg" alt="Exemple d'échelle simple" width="400">
    						</a>
    					</figure>
    					<p class="note">(Notez bien que je décline toute responsabilité dans ce cas)</p>
						
				
				<h3>Ajout d'éléments supplémentaires&nbsp;: titre, logo, flèche nord...<a class="headerlink" id="X28" href="#X28"></a></h3>
				
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_etiquette_icone.jpg" alt="icône ajouter une étiquette" >Pour ajouter du <b>texte</b>, par exemple un titre, les sources, l'auteur... : outil <b>Ajouter Etiquette</b>.</p>
						<p>Dans les propriétés de cet objet, vous pouvez ensuite modifier le texte, la police, la couleur...</p>
						<p><img class="icone" src="illustrations/10_02_image_icone.jpg" alt="icône ajouter une image" >Si vous voulez ajouter une image, par exemple un logo&nbsp;: outil <b>Ajouter Image</b> puis dessinez un rectangle sur la page.</p>
						<p>Dans les propriétés principales, choisissez ensuite une image sur votre ordinateur. Attention, il faut choisir <b>image raster</b> si votre image est au format JPG, PNG... ou bien <b>image SVG</b> si elle est au format vectoriel SVG.</p>
						<p>Pour une image raster&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_ajout_image_raster.jpg" >
								<img src="illustrations/10_02_ajout_image_raster.jpg" alt="Choix d'une image raster" width="450">
							</a>
						</figure>
						<p>Pour une image SVG&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_ajout_image_svg.jpg" >
								<img src="illustrations/10_02_ajout_image_svg.jpg" alt="Choix d'une image vecteur" width="450">
							</a>
						</figure>
					</div>
						<p>Par convention, le Nord est situé en haut de votre carte. Ajouter une flèche Nord si tel est bien le cas n'est donc pas indispensable et peut même alourdir inutilement votre carte. Par ailleurs, suivant la projection utilisée, la flèche Nord peut ne pas être valable pour toute la carte, mais par exemple seulement le long du méridien de référence.</p>
						<p>Peut-être avez-vous néanmoins besoin d'une flèche Nord, par exemple si le Nord n'est pas en haut de votre carte&nbsp;?</p>
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_nord_icone.jpg" alt="icône ajouter une flèche nord" >Dans ce cas, utilisez l'outil <b>Ajouter flèche du Nord</b>, qui est en fait un raccourci pour ajouter une image avec un symbole de flèche Nord. Différents symboles SVG sont disponibles dans les rubriques <b>arrows</b> ou <b>wind roses</b>.</p>
						<figure>
							<a href="illustrations/10_02_fleche_nord.jpg" >
								<img src="illustrations/10_02_fleche_nord.jpg" alt="Choix d'un symbole de fleche nord à partir de la bibliotheque de symboles" width="550">
							</a>
						</figure>
						<p class="note">Il est possible d'ajouter de nouveaux symboles au format SVG à cette bibliothèque, au moyen du bouton <b>...</b> situé au-dessous.</p>
						<p>Pour que cette flèche Nord soit synchronisée avec la carte, si la carte présente une rotation, descendez jusqu'à la rubrique rotation et cochez <b>Synchroniser avec la carte</b>&nbsp;:</p>
						<figure>
							<a href="illustrations/10_02_nord_rotation.jpg" >
								<img src="illustrations/10_02_nord_rotation.jpg" alt="Synchronisation de la rotation de la flèche nord avec la carte" width="500">
							</a>
						</figure>
						<p>Si la carte présente une rotation (à spécifier dans ses propriétés, toujours dans la mise en page), la flèche aura cette même rotation.</p>
					</div>
					
				<h3>Ajout d'une carte de situation<a class="headerlink" id="X29" href="#X29"></a></h3>
				
					<p>Vous pouvez également ajouter une deuxième carte à votre page, qui servira par exemple de carte de situation.</p>
					<p>Il est possible de faire figurer dans cette deuxième carte un rectangle correspondant à l'emprise de la première carte (qui sera mis à jour automatiquement si cette emprise change).</p>
					<figure>
						<a href="illustrations/10_02_apercu.jpg" >
							<img src="illustrations/10_02_apercu.jpg" alt="exemple&nbsp;: une carte de France, avec en haut une petite carte d'Europe et un rectangle correspondant à l'emprise de la carte de France" width="500">
						</a>
						<figcaption>En bas à droite, une carte de situation avec un rectangle correspondant à l'emprise de la carte principale.</figcaption>
					</figure>

          <p>Pour cela, nous allons ajouter une couche de pays qui éviter l'effet &#171;&nbsp;île&nbsp;&#187; qu'on aurait en utilisant la couche de régions.</p>
					
					<div class="manip">
					 <p>Comme les cartes mises en page sont liées à la fenêtre principale de QGIS, si nous ajoutons une nouvelle couche la carte sera modifiée. Pour éviter cela, dans la fenêtre de mise en page, sélectionnez la carte et cochez la case <b>Verrouiller les couches</b> dans l'onglet <b>Propriétés de l'objet</b>&nbsp;:</p>
					 <figure>
					  <img src="illustrations/10_02_verrouiller_couches.jpg" alt="case pour verrouiller les couches dans les propriétés de la carte" width="370">
					 </figure>
					 <p>Vous pouvez maintenant ajouter la couche <em class="data"><a href="donnees/TutoQGIS_10_Representation.zip">ne_50m_admin_0_countries.shp</a></em></p>
					 <p>Décochez les autres couches et choisissez un style pour la couche de pays (par exemple gris).</p>

					 <p>Dans la mise en page, ajoutez une carte, réglez son emprise et son échelle, et verrouillez également les couches pour cette carte.<p>
					 <p>Allez ensuite dans la rubrique <b>Aperçu</b> des propriétés de cette carte, pour visualiser l'emprise de votre première carte dans cette deuxième carte&nbsp;:</p>
					 <figure>
						<a href="illustrations/10_02_apercu_reglage.jpg" >
							<img src="illustrations/10_02_apercu_reglage.jpg" alt="reglage de l'aperçu pour voir l'emprise de la 1ère carte sur la 2ème" width="350">
						</a>
					 </figure>
					 <ul>
					  <li class="espace">Cliquez sur le bouton <b>+</b> pour ajouter un aperçu</li>
					  <li class="espace">Choisissez la carte dont vous voulez voir l'emprise dans cette carte. Dans cet exemple, il s'agit de <b>Carte 1</b></li>
					  <li class="espace">Modifiez éventuellement le style de cadre</li>
					 </ul>
				 </div>
				 
				 <p>L'emprise de la carte principale est maintenant visible dans la carte de situation&nbsp;; vous pouvez vérifier que si cette emprise change, le rectangle est automatiquement mis à jour.</p>
						
				<p>Dans une mise en page avec plusieurs cartes et plusieurs couches pour chaque carte, il est facile de s'emmêler. Pour éviter ça, vous pouvez procéder ainsi&nbsp;:</p>
					
				<ul>
				  <li class="espace">Dans QGIS, créez autant de groupes que de cartes dans votre mise en page (clic droit dans la liste des couches &#8594; Ajouter un groupe), par exemple un groupe <b>carte principale</b> et un groupe <b>carte de situation</b></li>
				  <li class="espace">Dans QGIS, mettez dans chacun des groupes les couches que vous voulez voir figurer dans la mise en page correspondante, quitte à dupliquer certaines couches (clic droit &#8594; Dupliquer la couche)</li>
				  <li class="espace">Toujours dans QGIS, rendez visible uniquement les couches d'un groupe</li>
				  <li class="espace">Dans le mode mise en page, sélectionnez la carte correspondant au groupe visible dans QGIS, et <b>verrouillez les couches</b> pour cette carte</li>
				  <li class="espace">Faites de même pour les autres groupes</li>
				</ul>
					
				
				<h3>Exporter la carte<a class="headerlink" id="X210" href="#X210"></a></h3>
				
					<p>Vous êtes satisfait de votre carte&nbsp;? Voici venu le moment de l'exporter&nbsp;!</p>
					<p>Vous pouvez soit l'<b>exporter au format image</b> (PNG, JPG) pour l'intégrer directement dans un rapport par exemple, soit l'<b>exporter au format vectoriel</b> SVG ou PDF pour la retravailler dans un logiciel de dessin type Inkscape ou Adobe Illustrator. Vous pouvez également l'imprimer directement&nbsp;!</p>
					
					<div class="manip">
						<p>Pour <b>exporter au format image</b>&nbsp;: vous pouvez tout d'abord paramétrer la résolution à laquelle votre carte sera exportée&nbsp;: onglet <b>Mise en page</b>, <b>Paramètres d'export&nbsp;:</b></p>
						<figure>
							<a href="illustrations/10_02_export_resolution.jpg" >
								<img src="illustrations/10_02_export_resolution.jpg" alt="choix d'une résolution de 300 dpi pour l'export" width="400">
							</a>
						</figure>
						<p class="note">On considère généralement qu'une résolution de 300 dpi est suffisante pour une impression. Pour en savoir plus sur ce qu'est la résolution d'une image&nbsp;: <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29" >http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29</a></p>
						<p><img class="icone" src="illustrations/10_02_export_image_icone.jpg" alt="icône Exporter comme une image" >Pour ensuite exporter votre mise en page au format image : à partir de la fenêtre de mise en page, <b>menu Mise en page &#8594; Exporter au format image...</b></p>
						<p>De nombreux formats sont disponibles : PNG, JPEG, TIFF...</p>
					</div>
					
					<p>Si vous voulez pouvoir modifier votre carte dans un logiciel de dessin vectoriel, il faut l'exporter dans un format vectoriel, SVG ou PDF.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_export_svg_icone.jpg" alt="icône Exporter au format SVG" >Pour <b>exporter au format SVG</b> : <b>menu mise en page &#8594; Exporter au format SVG...</b></p>
					</div>
					
					<p>L'export au format SVG peut poser quelques problèmes, en particulier pour gérer la transparence. L'export au format PDF peut parfois être plus pratique pour ensuite retoucher la carte dans un logiciel de dessin.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_export_pdf_icone.jpg" alt="icône Exporter au format PDF" >Pour <b>exporter au format PDF</b> : <b>menu mise en page &#8594; Exporter au format PDF...</b></p>
					</div>
					
					<p>Vous pouvez également imprimer directement votre carte, par exemple pour tester son rendu.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/10_02_impression_icone.jpg" alt="icône Imprimer" >Pour <b>imprimer la carte</b> : <b>menu mise en page &#8594; Imprimer...</b> ou bien <b>Ctrl + P</b></p>
					</div>
						
					<p>Voici un exemple de carte (mais ça n'est pas un modèle&nbsp;!)&nbsp;:</p>
				  <figure>
						<a href="illustrations/10_02_exemple_carte.jpg" >
							<img src="illustrations/10_02_exemple_carte.jpg" alt="Exemple de carte de la densité de pop des communes normandes" width="600">
						</a>
					</figure>
          <p class="note">Vous pouvez retrouver cet exemple en ouvrant le projet <b>misenpage_densite.qgz</b> disponible avec les données (dans le dossier <b>projets</b>).</p>					
				

					
					<p>Vous savez maintenant présenter vos travaux de manière claire, bravo&nbsp;! Le chapitre suivant traitera d'un tout autre sujet, à savoir l'automatisation de tâches dans QGIS...</p>

				<br>
				<a class="prec" href="10_01_representation.php">chapitre précédent</a>
				<a class="suiv" href="11_00_automatisation.php">partie XI&nbsp;: automatisation de traitements</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php');?>
			<?php include('menus_verticaux_10.inc.php');?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php');?>

</div>
</body>
</html>
