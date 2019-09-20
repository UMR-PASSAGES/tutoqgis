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
					<li><a href="#X22">Mise en page : une fenêtre dédiée</a>
					<li><a href="#X23">Modifier les dimensions de la page</a></li>
					<li><a href="#X24">Ajouter une carte</a></li>
					<li><a href="#X25">Ajouter une légende</a>
					   <ul class= "listesoustitres">
					       <li><a href="#X25a" >Création de la légende</a></li>
					       <li><a href="#X25b" >Modifier les éléments</a></li>
					       <li><a href="#X25c" >Ajouter un titre</a></li>
					       <li><a href="#X25d" >Autres paramètres de la légende</a></li>
					   </ul>
					</li>
					<li><a href="#X26">Ajouter une échelle</a></li>
					<li><a href="#X27">Ajout d'éléments supplémentaires : titre, logo, flèche nord...</a></li>
					<li><a href="#X28">Exporter la carte</a></li>
					<li><a href="#X29">Sauvegarder une mise en page</a></li>
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
						
				<h3><a class="titre" id="X22">Mise en page : une fenêtre dédiée</a></h3>
					
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
						<p>Tapez un titre, par exemple densité communes. La fenêtre de mise en page s'ouvre :</p>
						<figure>
							<a href="illustrations/tous/10_02_misenpage_general.png" >
								<img src="illustrations/tous/10_02_misenpage_general.png" alt="Fenêtre de mise en page, avec des numéros pour les différentes parties (menus et outils, carte...)" width="100%">
							</a>
						</figure>
					</div>
					
					<p>On trouve dans cette fenêtre&nbsp;:</p>
					<p><em class="numero">1. </em><b>Menus et barres d'outils :</b> on retrouve les mêmes outils dans les menus ou via les icônes.</p>
					<p><em class="numero">2. </em><b>Mise en page :</b> cette zone correspond à une page blanche, dont vous pouvez paramétrez notamment les dimensions. Vous pouvez ajouter à cette page des cartes (liées à la fenêtre principale de QGIS), légendes, échelles etc.</p>
					<p><em class="numero">3. </em><b>Onglet Eléments :</b> cet onglet comporte la liste des éléments présents sur la page (carte, légende etc.). Vous pouvez les rendre visibles ou invisibles, verrouillés ou non, et en modifier l'ordre.</p>
					<p><em class="numero">4. </em><b>Onglet Historique :</b> retrouvez ici la liste des dernières opérations que vous avez effectuées, par exemple modifier l'ordre des éléments. En cliquant sur une opération, vous l'effectuez à nouveau.</p>
					<p><em class="numero">5. </em><b>Onglet Mise en page :</b> cet onglet permet notamment de définir une grille d'accrochage, et une résolution pour l'export. Le contenu de cet onglet ne change jamais.</p>
					<p><em class="numero">6. </em><b>Onglet Propriétés de l'objet :</b> cet onglet contient les propriétés de l'objet actuellement sélectionné, son contenu varie donc en fonction du type d'objet : carte, légende, texte...</p>
					<p><em class="numero">7. </em><b>Onglet Atlas :</b> QGIS possède un mode Atlas, très pratique si vous avez une série de cartes à faire sur des zones différentes. Nous n'aborderons pas son fonctionnement, mais vous pouvez en savoir plus par exemple <a class="ext" target="_blank" href="https://docs.qgis.org/2.8/fr/docs/training_manual/forestry/forest_maps.html">ici</a>.</p>
					<p><em class="numero">8. </em><b>Barre d'état :</b> vous pouvez lire ici les coordonnées de votre souris dans la page (il ne s'agit pas de coordonnées géographiques, mais de coordonnées en mm par rapport au coin en haut à gauche de la page) et vous pourrez aussi modifier le niveau de zoom sur la page.</p>
					
					
				<h3><a class="titre" id="X23">Modifier les dimensions de la page</a></h3>
				
					<p>La première étape consiste à déterminer les dimensions de la page. Par défaut, il s'agit d'un A4 paysage, mais s'il s'agit d'une figure destinée à être intégrée dans un rapport, vous pouvez très bien choisir une taille personnalisée, par exemple 20 x 20 cm.</p>
					
					<div class="manip">
						<p>Faites un <b>clic droit sur la page &#8594; Propriétés de la page</b>.</p>
						<figure>
							<a href="illustrations/tous/10_02_taille_page.png" >
								<img src="illustrations/tous/10_02_taille_page.png" alt="Fixer la taille de la page dans le composeur" width="400">
							</a>
						</figure>
						<ul>
						 <li class="espace">Taille : choisissez <b>Personnalisation</b> tout en bas de la liste</li>
						 <li class="espace">Largeur et hauteur : <b>200 mm</b></li>
						</ul>
						
						<p><img class="icone" src="illustrations/tous/10_02_zoom_page_icone.png" alt="icône zoom sur l'emprise totale du composeur" >Pour zoomer sur votre page : cliquez sur l'icône <b>Zoom complet</b> (ou <b>menu Vue &#8594; Zoom sur l'emprise totale</b>).</p>
					</div>
						
				<h3><a class="titre" id="X24">Ajouter une carte</a></h3>
						
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_nouvelle_carte_icone.png" alt="icône ajouter une nouvelle carte" >Cliquez ensuite sur l'icône <b>Ajouter une nouvelle carte à la mise en page</b> (ou <b>menu Ajouter un élément &#8594; Ajouter Carte</b>).</p>
						<p>Dessinez un rectangle n'importe où sur la page, de la taille que vous voulez. Puis rendez-vous dans l'onglet <b>Propriétés de l'objet</b>, rubrique <b>Position et taille</b> (vers le bas de l'onglet).</p>
						<p>Fixez <b>X et Y à 0</b> et la <b>largeur et hauteur à 200 mm</b> pour que la carte coïncide avec la page.</p>
						<figure>
							<a href="illustrations/tous/10_02_position_carte.png" >
								<img src="illustrations/tous/10_02_position_carte.png" alt="Fixer l'emplacement et la taille de la carte sur la page" width="90%">
							</a>
						</figure>
					
					</div>
					
						<p><b>La carte ainsi créée est synchronisée avec les données visibles dans QGIS</b> : si vous changer le style d'une des couches dans la fenêtre principale de QGIS et revenez au composeur, la carte aura été mise à jour (si besoin en cliquant sur le bouton actualiser).</p>
						
					<div class="manip">
					
						<p><img class="icone" src="illustrations/tous/10_02_deplacer_contenu_icone.png" alt="icône déplacer le contenu de l'objet" >Pour <b>centrer la carte</b> : cliquez sur l'icône <b>Déplacer le contenu de l'objet</b> et faites glisser le contenu de la carte.</p>
						<p>Pour <b>zoomer et dézoomer</b>, 2 méthodes :</p>
						<ul>
						    <li class="espace">pour un zoom &#171;&nbsp;à la louche&nbsp;&#187;, utilisez la <b>molette</b> de la souris après avoir sélectionné l'outil <b>Déplacer le contenu de l'objet</b></li>
						    <li class="espace"><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="Icône de l'outil de sélection du mode mise en page" >pour un zoom plus précis : sélectionnez la carte au moyen de l'<b>outil de sélection</b>, puis <b>modifiez l'échelle</b> dans l'onglet Propriétés de l'objet &#8594; Propriétés principales</li>
						<figure>
							<a href="illustrations/tous/10_02_zoom.png" >
								<img src="illustrations/tous/10_02_zoom.png" alt="Fixer l'échelle de la carte" width="90%">
							</a>
						</figure>
						
					</div>
					
				<h3><a class="titre" id="X25">Ajouter une légende</a></h3>
				
					<p>Il existe de nombreuses possibilités pour paramétrer la légende. Elles ne seront pas toutes passées en revue ici, mais n'hésitez pas à explorer par vous-même !</p>
					
					<h4><a class="titre" id="X25a">Création de la légende</a></h4>
    					<div class="manip">
    					
    						<p><img class="icone" src="illustrations/tous/10_02_legende_icone.png" alt="icône ajouter une nouvelle légende" >Pour ajouter une <b>légende</b> : icône <b>Ajouter une nouvelle légende à la mise en page</b>, puis cliquez n’importe où sur la carte.</p>
    						<p>La fenêtre <b>Propriétés de l'élément</b> s'ouvre : cliquez sur OK sans modifiez les paramètres, ce que vous pourrez toujours faire par la suite.</p>
    						<p>La légende reprend celle de la couche dans QGIS&nbsp;: si vous modifiez les étiquettes de la légende dans la propriété de la couche, la légende du composeur prendra en compte ces modifications.</p>
    						<p>Dans la fenêtre principale de QGIS, ouvrez les propriétés de la couche, rubrique Style. Vous pouvez&nbsp;:</p>
    						<ul>
    							<li class="espace"><b>Modifier les bornes des classes</b> en double-cliquant sur une ligne dans la colonne valeur</li>
    							<li class="espace"><b>Modifier l'étiquette des classes</b> en double-cliquant sur une ligne dans la colonne étiquette</li>
    						</ul>
    						<figure>
    							<a href="illustrations/tous/10_02_style_etiquettes.png" >
    								<img src="illustrations/tous/10_02_style_etiquettes.png" alt="Modifier les bornes des classes et leurs étiquettes dans les propriétés de la couche" width="600">
    							</a>
    						</figure>
    						<p><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="icône sélectionner/déplacer un objet" >Revenez ensuite dans la mise en page, les changements que vous avez effectués sont visibles dans la légende puisque la case <b>Mise à jour auto</b> est cochée par défaut.</p>
    					</div>
					
					<h4><a class="titre" id="X25b">Modifier les éléments</a></h4>
					
					    <p>Comment faire maintenant si vous désirez encore modifier les éléments de la légende&nbsp;?</p>
    					<p>La case <b>Mise à jour auto</b> permet de prendre en compte directement les changements effectués dans la fenêtre principale de QGIS.</p>
    					<p>Cette case présente néanmoins l'inconvénient de ne pas vous donner la main sur la légende&nbsp;; si vous la décochez, vous pourrez changer l'ordre des couches, en ajouter et en supprimer... grâce aux icônes situées sous la légende, et mettre à jour leur légende s'il y a eu modification dans QGIS en cliquant sur le bouton <b>Tout mettre à jour</b>.</p>
    					
    					<div class="manip">
    					   <p>Cliquez sur votre légende avec l'outil <b>Sélectionner / Déplacer un objet</b>.</p>
    					   <p>Décochez la case <b>Mise à jour auto</b>. Les outils sous la légende sont maintenant activés&nbsp;:</p>
    						<figure>
    							<a href="illustrations/tous/10_02_objets_legende.png" >
    								<img src="illustrations/tous/10_02_objets_legende.png" alt="Rubrique objets de légende dans les propriétés de la légende" width="500">
    							</a>
    						</figure>
    						<p>Vous pouvez maintenant, au moyen de ces outils&nbsp;:</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_ordre_icone.png" alt="2 icônes pour monter ou descendre les éléménts de la légende" ><b>Modifier l'ordre</b> des éléments dans la légende : utile pour mettre les éléments plus importants en premier</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_groupe_icone.png" alt="icône pour créer des groupes dans la légende" ><b>Créer des groupes</b>, pour hiérarchiser l'information</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_plus_icone.png" alt="icône pour ajouter des éléments dans la légende" ><b>Ajouter des couches</b> présentes dans QGIS et non visibles dans la légende</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_moins_icone.png" alt="icône pour supprimer des éléments de la légende" ><b>Supprimer des couches</b> de la légende, par exemple ici la couche <em class="data">ne_10m_land</em>, qui n'apporte rien à la compréhension de la carte en étant présente dans la légende</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_texte_icone.png" alt="icône pour modifier le texte des éléments de la légende" ><b>Modifier le texte</b> des éléments, si vous ne l'avez pas déjà fait dans QGIS, par exemple densité de population à la place de COMMUNE</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_compter_icone.png" alt="icône pour compter le nombre d'entités dans la légende" ><b>Afficher le nombre d'entités</b> dans une couche et éventuellement dans chaque classe, après avoir sélectionné une couche</p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_filtrecarte_icone.png" alt="icône pour filtrer les éléments de la légende en fonction de la carte" ><b>Filtrer la légende en fonction de ce qui est visible sur la carte</b></p>
    					    <p><img class="icone" src="illustrations/tous/10_02_legende_filtrexpression_icone.png" alt="icône pour filtrer les éléments de la légende en fonction d'une expression" ><b>Filtrer la légende en fonction d'une expression</b></p>
    					</div>
    					
    					<h4><a class="titre" id="X25c">Ajouter un titre</a></h4>
    					
    					   <p>Parfois, il peut être utile d'ajouter un titre à la légende&nbsp;; dans d'autre cas, le nom de la couche peut suffire.</p>
    					   <p><b>Dans tous les cas, évitez d'écrire &#171;&nbsp;Légende&nbsp;&#187;</b>, ce qui n'apporte rien à la carte puisqu'on voit bien qu'il s'agit de la légende. Préférez un titre indiquant clairement le sujet de la carte.</p>
                            
                           <div class="manip">
                               <p>Dans les propriétés de la légende  Propriétés principales, vous pouvez taper un titre.</p>
                               <p>Si vous voulez que ce titre soit sur plusieurs lignes, vous pouvez taper un caractère utilisé rarement dans la case <b>Activer le retour à la ligne après</b>. Ce caractère ne sera pas représenté mais provoquera un retour à la ligne.</p>
        				       <figure>
        					       <a href="illustrations/tous/10_02_legende_titre.png" >
        						      <img src="illustrations/tous/10_02_legende_titre.png" alt="Exemple de titre de légende avec un retour à la ligne" width="90%">
        					       </a>
        					   </figure>
        					   <p>Le $ provoquera également une retour à la ligne pour les autres objets de la légende (étiquettes, nom de la couche...).</p>
        					</div>
        					
        				<h4><a class="titre" id="X25d">Autres paramètres de la légende</a></h4>
        				
        				    <p>Il est possible de modifier beaucoup de paramètres de la légende, comme par exemple la police, l'espacement des éléments...</p>
        				    <figure>
    					       <a href="illustrations/tous/10_02_legende_autreparametres.png" >
    						      <img src="illustrations/tous/10_02_legende_autreparametres.png" alt="Dans l'onglet propriétés de l'objet, paramètres de la légende de 'Polices' à 'Variables'" width="90%">
    					       </a>
    					   </figure>
    					   <p>Voici quelques uns de ces éléments passés en revue, n'hésitez pas à tester&nbsp;!</p>
    					   <ul>
    					       <li class="espace"><b>Fonts (Polices)</b> : vous pouvez choisir la police, la taille et le style pour le titre, les groupes etc.</li>
    					       <li class="espace"><b>Colonnes</b> : pour une légende sur plusieurs colonnes</li>
    					       <li class="espace"><b>Symbole</b> : pour modifier la taille des symboles de légende</li>
    					       <li class="espace"><b>Espacement</b> : pour augmenter ou diminuer l'espace entre les différents éléments (par exemple sous le titre)</li>
    					       <li class="espace"><b>cadre</b> : pour encadrer ou non la légende</li>
    					       <li class="espace"><b>Arrière-plan</b> : pour enlever ou choisir la couleur d'arrière-plan. Cette couleur peut avoir de la transparence.</li>
    					   </ul>
    						
    					<p>Un exemple de légende :</p>
    					<figure>
    						<a href="illustrations/tous/10_02_legende_visu.png" >
    							<img src="illustrations/tous/10_02_legende_visu.png" alt="Exemple de légende pour la densité de population" width="90%">
    						</a>
    					</figure>
					
					
				<h3><a class="titre" id="X26">Ajouter une échelle</a></h3>
				
				    <p>Pour certaines cartes, une échelle peut aider le lecteur à mieux comprendre le phénomène représenté. <b>Dans d'autres, elle ne sera pas nécessaire</b> (par exemple une carte du monde pour un public déjà familier de ce type de carte).</p>
				    <p>On trouve 2 types d'échelles&nbsp;: <b>numérique</b>, de type 1/25000, ou <b>graphique</b>, avec une barre d'échelle. La barre d'échelle est généralement plus claire, et présente l'avantage d'être toujours valable si votre document est imprimé à une taille différente de l'original. QGIS permet la création de ces 2 types d'échelles.</p>
				    <p>Attention, si vous utilisez une projection ne conservant pas les distances, votre échelle ne sera pas valable partout. Il est dans ce cas d'usage de préciser par exemple &#171;&nbsp;échelle valable à l'équateur&nbsp;&#187;.</p>
				    
				    <h4><a class="titre" id="X26a">Création de l'échelle</a></h4>
				    
    					<div class="manip">
    						<p><img class="icone" src="illustrations/tous/10_02_echelle_icone.png" alt="icône ajouter une nouvelle échelle graphique" >Pour ajouter une échelle : outil <b>Ajouter une nouvelle échelle graphique à la mise en page</b> puis cliquez sur la carte.</p>
    						<p>Cliquez sur <b>OK</b> dans la fenêtre des propriétés de l'élément qui s'ouvre ensuite (vous pourrez toujours modifier ces paramètres par la suite).</p>
    						<p>Modifiez ensuite éventuellement la taille du rectangle de l'échelle, en cliquant sur un des bords et en maintenant la souris enfoncée&nbsp;:</p>
    						<figure>
        						<a href="illustrations/tous/10_02_echelle_reduire.png" >
        							<img src="illustrations/tous/10_02_echelle_reduire.png" alt="Réduire la taille de l'échelle en cliquant sur le bord" width="100%">
        						</a>
        					</figure>
        				</div>
        				<p>Comme pour la légende, il est possible de régler assez finement les différents paramètres de cette échelle.</p>
        					
        		     <h4><a class="titre" id="X26b">A chaque échelle son style</a></h4>
    					
    					<div class="manip">
						  <p><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="icône sélectionner/déplacer un objet" >Après avoir sélectionné l'échelle au moyen de l'outil de sélection, vous pouvez en modifier les propriétés dans l'onglet <b>Propriétés de l'objet.</b></p>
						
						  <p>Vous pouvez notamment modifier son style, ce qui vous permet de choisir entre 5 styles d'échelle graphique et un type d'échelle numérique, le style par défaut étant <b>Boîte unique</b>&nbsp;:</p>
    						<figure>
        						<a href="illustrations/tous/10_02_echelle_style.png" >
        							<img src="illustrations/tous/10_02_echelle_style.png" alt="Où modifier le style de l'échelle" width="90%">
        						</a>
        					</figure>
        				   <p>Testez les différents styles&nbsp;:</p>
        				   <figure>
        						<a href="illustrations/tous/10_02_echelle_boiteunique.png" >
        							<img src="illustrations/tous/10_02_echelle_boiteunique.png" alt="Echelle style boîte unique" width="16%">
        						</a>
        						<a href="illustrations/tous/10_02_echelle_boitedouble.png" >
        							<img src="illustrations/tous/10_02_echelle_boitedouble.png" alt="Echelle style boîte double" width="16%">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperemilieu.png" >
        							<img src="illustrations/tous/10_02_echelle_reperemilieu.png" alt="Echelle style repère au milieu de la ligne" width="16%">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperedessous.png" >
        							<img src="illustrations/tous/10_02_echelle_reperedessous.png" alt="Echelle style repère au dessous de la ligne" width="16%">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperedessus.png" >
        							<img src="illustrations/tous/10_02_echelle_reperedessus.png" alt="Echelle style repère au dessus de la ligne" width="16%">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_numerique.png" >
        							<img src="illustrations/tous/10_02_echelle_numerique.png" alt="Echelle style numérique" width="16%">
        						</a>
        				   </figure>
						
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
						
				
				<h3><a class="titre" id="X27">Ajout d'éléments supplémentaires : titre, logo, flèche nord...</a></h3>
				
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
				
				<h3><a class="titre" id="X28">Exporter la carte</a></h3>
				
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
				
				<h3><a class="titre" id="X29">Sauvegarder une mise en page</a></h3>
				
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
