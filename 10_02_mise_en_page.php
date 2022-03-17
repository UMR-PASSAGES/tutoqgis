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
					<li><a href="#X22">Mise en page&nbsp;: une fenêtre dédiée</a></li>
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
					<li><a href="#X26">Ajouter une échelle</a>
					   <ul class= "listesoustitres">
					       <li><a href="#X26a" >Création de l'échelle</a></li>
					       <li><a href="#X26b" >A chaque échelle son style</a></li>
					   </ul>
					</li>
					<li><a href="#X27">Ajout d'éléments supplémentaires&nbsp;: titre, logo, flèche nord...</a></li>
					<li><a href="#X28">Ajout d'une carte de situation</a></li>
					<li><a href="#X29">Exporter la carte</a></li>
					<li><a href="#X210">Sauvegarder une mise en page</a></li>
				</ul>
				
				<p>Une fois vos données représentées de manière satisfaisante, il peut être utile d'en faire une carte. <b>Cette partie n'a pas pour but d'expliquer les bonnes et mauvaises pratiques en matière de cartographie</b>, mais se bornera à décrire quelques fonctionnalités du mode mise en page de QGIS.</p>
				<p>L'exemple portera ici sur une carte de la densité de population par communes (carte choroplèthe) en France. Mais vous pouvez choisir le sujet de votre choix, avec vos données&nbsp;!</p>
				
				<h3>Préparation de la mise en page<a class="headerlink" id="X21" href="#X21"></a></h3>
				
					<div class="manip">
						<p>Commencez par ajouter toutes les couches dont vous avez besoin, et supprimez toutes les couches inutiles.</p>
						<p>Choisissez le style de chacune des couches.</p>
						<p>N'oubliez pas également de choisir un SCR adapté pour votre projet (projeté si vous souhaitez créer une échelle en mètres par exemple) (cf. <a href="02_04_changer_systeme.php#II41">Modifier le SCR du projet</a>).</p>
						<p>Pour aller plus vite, vous pouvez ouvrir le projet tout fait <a href="donnees/TutoQGIS_10_Representation.zip" >misenpage_densite.qgz</a>. Dans ce cas, nombre des étapes décrites ci-dessous seront déjà réalisées, mais vous pourrez modifier les différents paramètres.</p>
					</div>
						
				<h3>Mise en page&nbsp;: une fenêtre dédiée<a class="headerlink" id="X22" href="#X22"></a></h3>
					
					<p>Le mode mise en page ouvre une fenêtre à part dans QGIS. On peut y ajouter différents éléments&nbsp;: carte, légende, échelle... La carte est liée à celle de la fenêtre principale de QGIS et se met à jour automatiquement.</p>
					<p class="note">Dans la version 2.18 de QGIS, le mode mise en page se nommait &#171;&nbsp;composeur d'impression&nbsp;&#187;.</p>
					
					<div class="manip">
						<p>
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Nouvelle mise en page...
								<span>
									<img src="illustrations/tous/10_02_composeur_menu.png" alt="Menu Projet, Nouvelle mise en page..." width="300">
								</span>
							</a>
						</p>
						<p>Tapez un titre, par exemple densité communes. La fenêtre de mise en page s'ouvre :</p>
						<figure>
							<a href="illustrations/tous/10_02_misenpage_general.png" >
								<img src="illustrations/tous/10_02_misenpage_general.png" alt="Fenêtre de mise en page, avec des numéros pour les différentes parties (menus et outils, carte...)" width="600">
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
					<p><em class="numero">7. </em><b>Onglet Atlas :</b> QGIS possède un mode Atlas, très pratique si vous avez une série de cartes à faire sur des zones différentes. Nous n'aborderons pas son fonctionnement, mais vous pouvez en savoir plus par exemple <a class="ext" target="_blank" href="https://docs.qgis.org/3.16/en/docs/training_manual/forestry/forest_maps.html?highlight=atlas">ici</a>.</p>
					<p><em class="numero">8. </em><b>Barre d'état :</b> vous pouvez lire ici les coordonnées de votre souris dans la page (il ne s'agit pas de coordonnées géographiques, mais de coordonnées en mm par rapport au coin en haut à gauche de la page) et vous pourrez aussi modifier le niveau de zoom sur la page.</p>
					
					
				<h3>Modifier les dimensions de la page<a class="headerlink" id="X23" href="#X23"></a></h3>
				
					<p>La première étape consiste à déterminer les dimensions de la page. Par défaut, il s'agit d'un A4 paysage, mais s'il s'agit d'une figure destinée à être intégrée dans un rapport, vous pouvez très bien choisir une taille personnalisée, par exemple 20 x 20 cm.</p>
					
					<div class="manip">
						<p>Faites un <b>clic droit sur la page &#8594; Propriétés de la page</b>.</p>
						<figure>
							<a href="illustrations/tous/10_02_taille_page.png" >
								<img src="illustrations/tous/10_02_taille_page.png" alt="Fixer la taille de la page dans la mise en page" width="400">
							</a>
						</figure>
						<ul>
						 <li class="espace">Taille : choisissez <b>Personnalisation</b> tout en bas de la liste</li>
						 <li class="espace">Largeur et hauteur : <b>200 mm</b></li>
						</ul>
						
						<p><img class="icone" src="illustrations/tous/10_02_zoom_page_icone.png" alt="icône zoom sur l'emprise totale de la page" >Pour zoomer sur votre page : cliquez sur l'icône <b>Zoom complet</b> (ou <b>menu Vue &#8594; Zoom sur l'emprise totale</b>).</p>
					</div>
						
				<h3>Ajouter une carte<a class="headerlink" id="X24" href="#X24"></a></h3>
						
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_nouvelle_carte_icone.png" alt="icône ajouter une nouvelle carte" >Cliquez ensuite sur l'icône <b>Ajouter Carte</b> (ou <b>menu Ajouter un objet &#8594; Ajouter Carte</b>).</p>
						<p>Dessinez un rectangle n'importe où sur la page, de la taille que vous voulez. Puis rendez-vous dans l'onglet <b>Propriétés de l'objet</b>, rubrique <b>Position et taille</b> (vers le bas de l'onglet).</p>
						<p>Fixez <b>X et Y à 0</b> et la <b>largeur et hauteur à 200 mm</b> pour que la carte coïncide avec la page.</p>
						<figure>
							<a href="illustrations/tous/10_02_position_carte.png" >
								<img src="illustrations/tous/10_02_position_carte.png" alt="Fixer l'emplacement et la taille de la carte sur la page" width="400">
							</a>
						</figure>
					
					</div>
					
						<p><b>La carte ainsi créée est synchronisée avec les données visibles dans QGIS</b> : si vous changer le style d'une des couches dans la fenêtre principale de QGIS et revenez à la mise en page, la carte aura été mise à jour (si besoin en cliquant sur le bouton actualiser).</p>
						
					<div class="manip">
					
						<p><img class="icone" src="illustrations/tous/10_02_deplacer_contenu_icone.png" alt="icône déplacer le contenu de l'objet" >Pour <b>centrer la carte</b> : cliquez sur l'icône <b>Déplacer le contenu de l'objet</b> et faites glisser le contenu de la carte.</p>
						<p>Pour <b>zoomer et dézoomer</b>, 3 méthodes :</p>
						<ul>
						    <li class="espace">pour un zoom &#171;&nbsp;à la louche&nbsp;&#187;, utilisez la <b>molette</b> de la souris après avoir sélectionné l'outil <b>Déplacer le contenu de l'objet</b></li>
						    <li class="espace"><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="Icône de l'outil de sélection du mode mise en page" >pour un zoom plus précis : sélectionnez la carte au moyen de l'<b>outil de sélection</b>, puis <b>modifiez l'échelle</b> dans l'onglet Propriétés de l'objet &#8594; Propriétés principales
    							<a href="illustrations/tous/10_02_zoom.png" >
    								<img src="illustrations/tous/10_02_zoom.png" alt="Fixer l'échelle de la carte" width="450">
    							</a></li>
        					<li class="espace">Synchroniser la carte de la mise en page avec celle de la fenêtre principale de QGIS : cliquez sur la 2ème icône dans la barre d'outils en haut des propriétés de l'objet&nbsp;:
    							<a href="illustrations/tous/10_02_zoom2.png" >
    								<img src="illustrations/tous/10_02_zoom2.png" alt="Fixer l'échelle de la carte sur celle de la fenêtre QGIS" width="270">
    							</a></li>
    					</ul>
        				<p>Il est probable que les 2 cartes ne coïncident pas exactement car elles n'ont pas le même rapport hauteur/largeur. Vous pouvez aussi cliquer sur la 4ème icône pour donner à la carte de votre mise en page la même échelle que dans la fenêtre principale QGIS.</p>
						
					</div>
					
				<h3>Ajouter une légende<a class="headerlink" id="X25" href="#X25"></a></h3>
				
					<p>Il existe de nombreuses possibilités pour paramétrer la légende. Elles ne seront pas toutes passées en revue ici, mais n'hésitez pas à explorer par vous-même !</p>
					
					<h4>Création de la légende<a class="headerlink" id="X25a" href="#X25a"></a></h4>
    					<div class="manip">
    					
    						<p><img class="icone" src="illustrations/tous/10_02_legende_icone.png" alt="icône ajouter légende" >Pour ajouter une <b>légende</b> : icône <b>Ajouter Légende</b>, puis cliquez n’importe où sur la carte.</p>
    						<p>La fenêtre <b>Propriétés de l'élément</b> s'ouvre : cliquez sur OK sans modifiez les paramètres, ce que vous pourrez toujours faire par la suite.</p>
    						<p>La légende reprend celle de la couche dans QGIS&nbsp;: si vous modifiez les étiquettes de la légende dans la propriété de la couche, la légende de la mise en page prendra en compte ces modifications.</p>
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
					
					<h4>Modifier les éléments<a class="headerlink" id="X25b" href="#X25b"></a></h4>
					
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
    					
    					<h4>Ajouter un titre<a class="headerlink" id="X25c" href="#X25c"></a></h4>
    					
    					   <p>Parfois, il peut être utile d'ajouter un titre à la légende&nbsp;; dans d'autre cas, le nom de la couche peut suffire.</p>
    					   <p><b>Dans tous les cas, évitez d'écrire &#171;&nbsp;Légende&nbsp;&#187;</b>, ce qui n'apporte rien à la carte puisqu'on voit bien qu'il s'agit de la légende. Préférez un titre indiquant clairement le sujet de la carte.</p>
                            
                           <div class="manip">
                               <p>Dans les propriétés de la légende  Propriétés principales, vous pouvez taper un titre.</p>
                               <p>Si vous voulez que ce titre soit sur plusieurs lignes, vous pouvez taper un caractère utilisé rarement dans la case <b>Activer le retour à la ligne après</b>. Ce caractère ne sera pas représenté mais provoquera un retour à la ligne.</p>
        				       <figure>
        					       <a href="illustrations/tous/10_02_legende_titre.png" >
        						      <img src="illustrations/tous/10_02_legende_titre.png" alt="Exemple de titre de légende avec un retour à la ligne" width="500">
        					       </a>
        					   </figure>
        					   <p>Le $ provoquera également une retour à la ligne pour les autres objets de la légende (étiquettes, nom de la couche...).</p>
        					</div>
        					
        				<h4>Autres paramètres de la légende<a class="headerlink" id="X25d" href="#X25d"></a></h4>
        				
        				    <p>Il est possible de modifier beaucoup de paramètres de la légende, comme par exemple la police, l'espacement des éléments...</p>
        				    <figure>
    					       <a href="illustrations/tous/10_02_legende_autreparametres.png" >
    						      <img src="illustrations/tous/10_02_legende_autreparametres.png" alt="Dans l'onglet propriétés de l'objet, paramètres de la légende de 'Polices' à 'Variables'" width="200">
    					       </a>
    					   </figure>
    					   <p>Voici quelques uns de ces éléments passés en revue, n'hésitez pas à tester&nbsp;!</p>
    					   <ul>
    					       <li class="espace"><b>Fonts (Polices)</b> : vous pouvez choisir la police, la taille et le style pour le titre, les groupes etc.</li>
    					       <li class="espace"><b>Colonnes</b> : pour une légende sur plusieurs colonnes</li>
    					       <li class="espace"><b>Symbole</b> : pour modifier la taille des symboles de légende</li>
    					       <li class="espace"><b>Espacement</b> : pour augmenter ou diminuer l'espace entre les différents éléments (par exemple sous le titre)</li>
    					       <li class="espace"><b>Cadre</b> : pour encadrer ou non la légende</li>
    					       <li class="espace"><b>Arrière-plan</b> : pour enlever ou choisir la couleur d'arrière-plan. Cette couleur peut avoir de la transparence.</li>
    					   </ul>
    						
    					<p>Un exemple de légende :</p>
    					<figure>
    						<a href="illustrations/tous/10_02_legende_visu.png" >
    							<img src="illustrations/tous/10_02_legende_visu.png" alt="Exemple de légende pour la densité de population" width="250">
    						</a>
    					</figure>
					
					
				<h3>Ajouter une échelle<a class="headerlink" id="X26" href="#X26"></a></h3>
				
				    <p>Pour certaines cartes, une échelle peut aider le lecteur à mieux comprendre le phénomène représenté. <b>Dans d'autres, elle ne sera pas nécessaire</b> (par exemple une carte du monde pour un public déjà familier de ce type de carte).</p>
				    <p>On trouve 2 types d'échelles&nbsp;: <b>numérique</b>, de type 1/25000, ou <b>graphique</b>, avec une barre d'échelle. La barre d'échelle est généralement plus claire, et présente l'avantage d'être toujours valable si votre document est imprimé à une taille différente de l'original. QGIS permet la création de ces 2 types d'échelles.</p>
				    <p>Attention, si vous utilisez une projection ne conservant pas les distances, votre échelle ne sera pas valable partout. Il est dans ce cas d'usage de préciser par exemple &#171;&nbsp;échelle valable à l'équateur&nbsp;&#187;.</p>
				    
				    <h4>Création de l'échelle<a class="headerlink" id="X26a" href="#X26a"></a></h4>
				    
    					<div class="manip">
    						<p><img class="icone" src="illustrations/tous/10_02_echelle_icone.png" alt="icône ajouter une nouvelle échelle graphique" >Pour ajouter une échelle : outil <b>Ajouter Barre d'échelle</b> puis dessinez un rectangle sur la carte.</p>
    						<p>Cliquez sur <b>OK</b> dans la fenêtre des propriétés de l'élément qui s'ouvre ensuite (vous pourrez toujours modifier ces paramètres par la suite).</p>
    						<p>Modifiez ensuite éventuellement la taille du rectangle de l'échelle, en cliquant sur un des bords et en maintenant la souris enfoncée&nbsp;:</p>
    						<figure>
        						<a href="illustrations/tous/10_02_echelle_reduire.png" >
        							<img src="illustrations/tous/10_02_echelle_reduire.png" alt="Réduire la taille de l'échelle en cliquant sur le bord" width="170">
        						</a>
        					</figure>
        				</div>
        				<p>Comme pour la légende, il est possible de régler assez finement les différents paramètres de cette échelle.</p>
        					
        		     <h4>A chaque échelle son style<a class="headerlink" id="X26b" href="#X26b"></a></h4>
    					
    					<div class="manip">
						  <p><img class="icone" src="illustrations/tous/10_02_selection_deplace_icone.png" alt="icône sélectionner/déplacer un objet" >Après avoir sélectionné l'échelle au moyen de l'outil de sélection, vous pouvez en modifier les propriétés dans l'onglet <b>Propriétés de l'objet.</b></p>
						
						  <p>Vous pouvez notamment modifier son style, ce qui vous permet de choisir entre 5 styles d'échelle graphique et un type d'échelle numérique, le style par défaut étant <b>Boîte unique</b>&nbsp;:</p>
    						<figure>
        						<a href="illustrations/tous/10_02_echelle_style.png" >
        							<img src="illustrations/tous/10_02_echelle_style.png" alt="Où modifier le style de l'échelle" width="500">
        						</a>
        					</figure>
        				   <p>Testez les différents styles&nbsp;:</p>
        				   <figure>
        						<a href="illustrations/tous/10_02_echelle_boiteunique.png" >
        							<img src="illustrations/tous/10_02_echelle_boiteunique.png" alt="Echelle style boîte unique" width="90">
        						</a>
        						<a href="illustrations/tous/10_02_echelle_boitedouble.png" >
        							<img src="illustrations/tous/10_02_echelle_boitedouble.png" alt="Echelle style boîte double" width="90">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperemilieu.png" >
        							<img src="illustrations/tous/10_02_echelle_reperemilieu.png" alt="Echelle style repère au milieu de la ligne" width="90">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperedessous.png" >
        							<img src="illustrations/tous/10_02_echelle_reperedessous.png" alt="Echelle style repère au dessous de la ligne" width="90">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_reperedessus.png" >
        							<img src="illustrations/tous/10_02_echelle_reperedessus.png" alt="Echelle style repère au dessus de la ligne" width="90">
        						</a>
                                <a href="illustrations/tous/10_02_echelle_numerique.png" >
        							<img src="illustrations/tous/10_02_echelle_numerique.png" alt="Echelle style numérique" width="90">
        						</a>
        				   </figure>
						</div>
						
						<p>Vous pouvez également modifier les unités de l'échelle, et l'étiquette des unités&nbsp;:</p>
						<figure>
							<a href="illustrations/tous/10_02_echelle_unites.png" >
								<img src="illustrations/tous/10_02_echelle_unites.png" alt="Paramétrer les unités de l'échelle" width="500">
							</a>
						</figure>
    					<p>Ainsi que le nombre de segments, et la hauteur de la barre d'échelle&nbsp;:</p>
    					<figure>
    						<a href="illustrations/tous/10_02_echelle_segments.png" >
    							<img src="illustrations/tous/10_02_echelle_segments.png" alt="Paramétrer le nombre de segments de l'échelle" width="500">
    						</a>
    					</figure>
					   <p>Sans oublier les couleurs, et la police de caractères&nbsp;:</p>
					   <figure>
    						<a href="illustrations/tous/10_02_echelle_police.png" >
    							<img src="illustrations/tous/10_02_echelle_police.png" alt="Paramétrer les couleurs et la taille de l'échelle" width="420">
    						</a>
    					</figure>
    					<p>Et bien d'autres paramètres encore&nbsp;!</p>
					
    					<p>Vous pouvez opter pour un style épuré...</p>
    					<figure>
    						<a href="illustrations/tous/10_02_echelle_visu.png" >
    							<img src="illustrations/tous/10_02_echelle_visu.png" alt="Exemple d'échelle simple" width="200">
    						</a>
    					</figure>
    					<p>...ou bien laisser parler l'artiste qui est en vous&nbsp;:</p>
    					<figure>
    					   <a href="illustrations/tous/10_02_echelle_coupemulet.png" >
    							<img src="illustrations/tous/10_02_echelle_coupemulet.png" alt="Exemple d'échelle simple" width="400">
    						</a>
    					</figure>
    					<p class="note">(Notez bien que je décline toute responsabilité dans ce cas)</p>
						
				
				<h3><a class="titre" id="X27">Ajout d'éléments supplémentaires&nbsp;: titre, logo, flèche nord...<a class="headerlink" id="X27" href="#X27"></a></h3>
				
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_etiquette_icone.png" alt="icône ajouter une étiquette" >Pour ajouter du <b>texte</b>, par exemple un titre, les sources, l'auteur... : outil <b>Ajouter Etiquette</b>.</p>
						<p>Dans les propriétés de cet objet, vous pouvez ensuite modifier le texte, la police, la couleur...</p>
						<p><img class="icone" src="illustrations/tous/10_02_image_icone.png" alt="icône ajouter une image" >Si vous voulez ajouter une image, par exemple un logo : outil <b>Ajouter Image</b> puis dessinez un rectangle sur la page.</p>
						<p>Dans les propriétés principales, choisissez ensuite une image sur votre ordinateur :</p>
						<figure>
							<a href="illustrations/tous/10_02_image_parcourir.png" >
								<img src="illustrations/tous/10_02_image_parcourir.png" alt="Choix d'une image" width="350">
							</a>
						</figure>
					</div>
						<p>Par convention, le Nord est situé en haut de votre carte. Ajouter une flèche Nord si tel est bien le cas n'est donc pas indispensable et peut même alourdir inutilement votre carte. Par ailleurs, suivant la projection que vous utilisez, la flèche Nord peut ne pas être valable pour toute la carte, mais par exemple seulement le long du méridien de référence.</p>
						<p>Peut-être avez-vous néanmoins besoin d'une flèche Nord, par exemple si le Nord n'est pas en haut de votre carte&nbsp;?</p>
					<div class="manip">
						<p>Dans ce cas, utilisez également l'outil <b>Ajouter Image</b> et choisissez comme image un symbole de flèche Nord. Pour cela, vous pouvez regarder dans les groupes SVG <b>arrows</b> ou <b>wind roses</b>.</p>
						<figure>
							<a href="illustrations/tous/10_02_fleche_nord.png" >
								<img src="illustrations/tous/10_02_fleche_nord.png" alt="Choix d'un symbole de fleche nord à partir de la bibliotheque de symboles" width="550">
							</a>
						</figure>
						<p class="note">Il est possible d'ajouter de nouveaux symboles au format SVG à cette bibliothèque, au moyen du bouton <b>...</b> situé au-dessous.</p>
						
					</div>
					
				<h3><a class="titre" id="X28">Ajout d'une carte de situation<a class="headerlink" id="X28" href="#X28"></a></h3>
				
					<p>Vous pouvez également ajouter une deuxième carte à votre page, qui servira par exemple de carte de situation.</p>
					<p>Il est possible de faire figurer dans cette deuxième carte un rectangle correspondant à l'emprise de la première carte.</p>
					<figure>
						<a href="illustrations/tous/10_02_apercu.png" >
							<img src="illustrations/tous/10_02_apercu.png" alt="exemple : une carte de France, avec en haut une petite carte d'Europe et un rectangle correspondant à l'emprise de la carte de France" width="500">
						</a>
					</figure>
					
					<div class="manip">
						<p>Ajoutez une carte, réglez son emprise et son échelle, et allez dans la rubrique <b>Aperçu</b> des propriétés de cette carte, pour visualiser l'emprise de votre première carte dans cette deuxième carte&nbsp;:</p>
						<figure>
							<a href="illustrations/tous/10_02_apercu_reglage.png" >
								<img src="illustrations/tous/10_02_apercu_reglage.png" alt="reglage de l'aperçu pour voir l'emprise de la 1ère carte sur la 2ème" width="350">
							</a>
						</figure>
						<ul>
						  <li class="espace">Cliquez sur le bouton <b>+</b> pour ajouter un aperçu</li>
						  <li class="espace">Choisissez la carte dont vous voulez voir l'emprise dans cette carte. Dans cet exemple, il s'agit de <b>Carte 1</b></li>
						  <li class="espace">Modifiez éventuellement le style de cadre</li>
						</ul>
					</div>
						
					<p>Avec plusieurs cartes, il faut gérer la visibilité des couches dans chacune des cartes.</p>
					
					<div class="manip">
						<p>Pour cela, vous pouvez utiliser cette méthode&nbsp;:</p>
						<ul>
						  <li class="espace">Dans QGIS, créez autant de groupes que de cartes dans votre mise en page (clic droit dans la liste des couches, Ajouter un groupe), ici un groupe <b>carte principale</b> et un groupe <b>carte de situation</b></li>
						  <li class="espace">Dans QGIS, mettez dans chacun des groupes les couches que vous voulez voir figurer dans la mise en page correspondante, quitte à dupliquer certaines couches (clic droit, Dupliquer la couche)</li>
						 </ul>
						 <figure>
                            <img src="illustrations/tous/10_02_groupes_qgis.png" alt="2 groupes de couches dans QGIS" width="300">
                         </figure>
                         <ul>
						  <li class="espace">Toujours dans QGIS, rendez visible uniquement les couches d'un groupe</li>
						  <li class="espace">Dans le mode mise en page, sélectionnez la carte correspondant au groupe visible dans QGIS, et cochez la case <b>Verrouiller les couches</b> dans la rubrique <b>Couches</b> des propriétés de la carte</li>
						 </ul>
						 <figure>
						  <img src="illustrations/tous/10_02_verrouiller_couches.png" alt="case pour verrouiller les couches dans les propriétés de la carte" width="370">
						 </figure>
						 <ul>
						  <li class="espace">Faites de même pour les autres groupes</li>
						</ul>
					</div>
					
				
				<h3>Exporter la carte<a class="headerlink" id="X29" href="#X29"></a></h3>
				
					<p>Vous êtes satisfait de votre carte ? Voici venu le moment de l'exporter !</p>
					<p>Vous pouvez soit l'<b>exporter au format image</b> (PNG, JPG) pour l'intégrer directement dans un rapport par exemple, soit l'<b>exporter au format vectoriel</b> SVG ou PDF pour la retravailler dans un logiciel de dessin type Inkscape ou Adobe Illustrator. Vous pouvez également l'imprimer directement&nbsp;!</p>
					
					<div class="manip">
						<p>Pour <b>exporter au format image</b> : vous pouvez tout d'abord paramétrer la résolution à laquelle votre carte sera exportée : onglet <b>Mise en page</b>, <b>Paramètres d'export :</b></p>
						<figure>
							<a href="illustrations/tous/10_02_export_resolution.png" >
								<img src="illustrations/tous/10_02_export_resolution.png" alt="choix d'une résolution de 300 dpi pour l'export" width="400">
							</a>
						</figure>
						<p class="note">On considère généralement qu'une résolution de 300 dpi est suffisante pour une impression. Pour en savoir plus sur ce qu'est la résolution d'une image : <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29" >http://fr.wikipedia.org/wiki/R%C3%A9solution_%28imagerie_num%C3%A9rique%29</a></p>
						<p><img class="icone" src="illustrations/tous/10_02_export_image_icone.png" alt="icône Exporter comme une image" >Pour ensuite exporter votre mise en page au format image : à partir de la fenêtre de mise en page, <b>menu Mise en page &#8594; Exporter au format image...</b></p>
						<p>De nombreux formats sont disponibles : PNG, JPEG, TIFF...</p>
					</div>
					
					<p>Si vous voulez pouvoir modifier votre carte dans un logiciel de dessin vectoriel, il faut l'exporter dans un format vectoriel, SVG ou PDF.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_export_svg_icone.png" alt="icône Exporter au format SVG" >Pour <b>exporter au format SVG</b> : <b>menu mise en page &#8594; Exporter au format SVG...</b></p>
					</div>
					
					<p>L'export au format SVG peut poser quelques problèmes, en particulier pour gérer la transparence. L'export au format PDF peut parfois être plus pratique pour ensuite retoucher la carte dans un logiciel de dessin.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_export_pdf_icone.png" alt="icône Exporter au format PDF" >Pour <b>exporter au format PDF</b> : <b>menu mise en page &#8594; Exporter au format PDF...</b></p>
					</div>
					
					<p>Vous pouvez également imprimer directement votre carte, par exemple pour tester son rendu.</p>
					
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/10_02_impression_icone.png" alt="icône Imprimer" >Pour <b>imprimer la carte</b> : <b>menu mise en page &#8594; Imprimer...</b> ou bien <b>Ctrl + P</b></p>
					</div>
						
					<p>Un exemple de carte réalisée dans QGIS :</p>
					<figure>
						<a href="illustrations/tous/10_02_carte_exemple.png" >
							<img src="illustrations/tous/10_02_carte_exemple.png" alt="exemple d'une carte de densité de population dans QGIS" width="500">
						</a>
					</figure>
				
				
				<h3>Sauvegarder une mise en page<a class="headerlink" id="X210" href="#X210"></a></h3>
				
					<p>Dans QGIS, les mises en page sont sauvegardées dans les projets QGZ ou QGS. Pour sauvegarder votre mise en page, il vous suffit donc de sauvegarder votre projet.</p>
					
					<div class="manip">
						<p>Dans la fenêtre principale de QGIS, rendez-vous dans le <b>menu Projet &#8594; Enregistrer sous...</b>.</p>
						<p>Choisissez un emplacement : dossier <b>TutoQGIS_10_Representation/projets</b> par exemple, et un nom : <b>carte_densite_01</b> par exemple.</p>
						<p>Un projet peut contenir plusieurs mises en page. Pour renommer, ajouter, supprimer ou dupliquer des mises en page&nbsp;: <b>menu Projet &#8594; Gestionnaire de mise en page...</b>.</p>
						<figure>
							<a href="illustrations/tous/10_02_gestionnaire_misenpage.png" >
								<img src="illustrations/tous/10_02_gestionnaire_misenpage.png" alt="Fenêtre du gestionnaire de mise en page" width="400">
							</a>
						</figure>
					</div>
					
					<p>Vous savez maintenant présenter vos travaux de manière claire, bravo&nbsp;! Le chapitre suivant traitera d'un tout autre sujet, à savoir l'automatisation de tâches dans QGIS...</p>

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
