<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
			<h1>V.5  Numériser des polygones</h1>
				<ul class="listetitres">
					<li><a href="#V51">Création d'une couche de polygones</a></li>
					<li><a href="#V52">Ajout d'un polygone</a></li>
					<li><a href="#V53">Découpage d'un polygone</a></li>
					<li><a href="#V54">Frontière commune entre 2 polygones&nbsp;: comment est-elle gérée ?</a></li>
					<li><a href="#V55">Ajout d'un élément en s'appuyant sur un autre : l'accrochage</a></li>
					<li><a href="#V56">Éviter les intersections entre polygones jointifs</a></li>
				</ul>
				<br>
				
			<p>Pour numériser des polygones, les choses se compliquent un peu... Nous n'allons pas ici numériser toutes les zones de l'île, mais passer en revue quelques techniques d'édition de polygones au moyen de quelques exemples.</p>
			
			<p>Il s'agira ici de numériser des zones en fonction de leur type. Comme l'indique la légende, certaines zones peuvent avoir 2 types différents, par exemple réserve forestière et réserve fédérale. La couche que nous allons créer contiendra 2 champs, type1 et type2</p>
			<figure>
			    <a href="illustrations/5_5_oahu_legende.jpg" >
					<img src="illustrations/5_5_oahu_legende.jpg" alt="légende de la carte de l'île d'Oahu" width="450">
				</a>
			</figure>
			<p>Vous voyez ici la carte originale à gauche, et avec superposée la couche de polygones à droite.</p>
			<figure>
				<a href="illustrations/5_5_oahu_avant.jpg" >
					<img src="illustrations/5_5_oahu_avant.jpg" alt="détail de la carte de l'île d'Oahu" width="300">
				</a>
				<a href="illustrations/5_5_oahu_apres.jpg" >
					<img src="illustrations/5_5_oahu_apres.jpg" alt="détail de la carte de l'île d'Oahu avec la couche de polygones superposée" width="300">
				</a>
			</figure>
			<p>L'idée est de numériser le polygone de la réserve forestière, avec des contours bleus sur la carte, puis de le découper pour différencier les zones de cette réserve classées comme &#171; Public lands &#187; (en vert) ou comme &#171; Federal Reservations &#187; (en rose).</p>
				
			<h2>Création d'une couche de polygones<a class="headerlink" id="V51" href="#V51"></a></h2>
				
				<div class="manip">
					<p>Créez une couche de polygones en vous reportant si besoin à la <a href="05_01_creation_couche.php">partie V.1</a>, avec les paramètres suivants&nbsp;:</p>
					<ul>
					    <li class="espace">nom : <em class="data">zones_oahu</em>.</li>
						<li class="espace">type : <b>polygone</b></li>
						<li class="espace">deux champs de type texte, de longueur 80, nommés <b>type1</b> et <b>type2</b> (ils contiendront les types de zone, tels qu'indiqués dans la légende)</li>
					</ul>
					<p>Vérifiez que cette couche soit bien chargée dans votre projet, ainsi que la carte <em class="data"><a href="donnees/TutoQGIS_05_Numerisation.zip">Oahu_Hawaiian_Islands_1906_wgs84.tif</a></em>.</p>
				</div>
				
									
			<h2>Ajout d'un polygone<a class="headerlink" id="V52" href="#V52"></a></h2>
			
				<p>Nous allons commencer par numériser la réserve forestière de l'île (hachurée en rouge dans l'image ci-dessous) :</p>
				<figure>
					<a href="illustrations/5_5_reserve_foret.jpg" >
						<img src="illustrations/5_5_reserve_foret.jpg" alt="réserve forestière de l'île hachurée en rouge" width="420">
					</a>
				</figure>
				
				<div class="manip">
					<p>Passez en mode édition pour votre couche de polygones. Zoomez sur la réserve forestière.</p>
					<figure>
						<a href="illustrations/5_5_zoom_reserve.jpg" >
							<img src="illustrations/5_5_zoom_reserve.jpg" alt="zoom sur la réserve" width="350">
						</a>
					</figure>
					<p><img class="iconemid" src="illustrations/5_5_ajout_icone.jpg" alt="icône ajouter une entité">Cliquez sur l'icône <b>Ajouter une entité polygonale</b> qui a pris la forme d'un polygone.</p>
					<p>Cliquez sur un point du polygone, puis ajoutez d'autres sommets comme pour une ligne. La forme du polygone évolue au fur et à mesure.</p>
					<figure>
						<a href="illustrations/5_5_debut_num.jpg" >
							<img src="illustrations/5_5_debut_num.jpg" alt="numérisation d'un polygone en cours" width="350">
						</a>
					</figure>
					<p>Lorsque le polygone est complet, faites un clic droit n'importe où pour le terminer. Il est inutile de cliquer à nouveau sur le premier sommet !</p>
					<figure>
						<a href="illustrations/5_5_premier_polygone.jpg" >
							<img src="illustrations/5_5_premier_polygone.jpg" alt="numérisation d'un polygone en cours" width="350">
						</a>
					</figure>
					<p>Vous pouvez maintenant remplir les données attributaires pour ce polygone, par exemple en donnant la valeur <b>Forest Reserves</b> en type1, et la valeur <b>None</b> en type2.</p>
				</div>
				
			<h2>Découpage d'un polygone<a class="headerlink" id="V53" href="#V53"></a></h2>
			
				<p>La partie Nord de notre réserve est occupée par des terres publiques (Public Lands) puis par une réserve fédérale (Federal Reservation). Comment diviser notre polygone pour faire apparaître ces zones ?</p>
				
				<div class="manip">
					<p>Vérifiez que la barre d'outils <b>Numérisation avancée</b> soit activée : Numérisation avancée doit être cochée dans le
						<a class="thumbnail_bottom" href="#thumb">Menu Vue &#8594; Barres d'outils
							<span>
								<img src="illustrations/5_5_num_avancee_menu.jpg" alt="Menu Vue, Barres d'outils" height="600" >
							</span>
						</a>
					.</p>
					<p><img class="iconemid" src="illustrations/5_5_decoupe_icone.jpg" alt="icône séparer les entités" >Dans la barre d'outils <b>Numérisation avancée</b>, cliquez sur l'icône <b>Séparer les entités</b>.</p>
					<p class="note">Attention à ne pas confondre cet outil avec celui pour <b>Séparer les parties</b> juste à sa droite !</p>
					<p>Cliquez à l'extérieur du polygone, puis de l'autre côté du polygone en suivant la ligne selon laquelle le découper. Terminez par un clic droit n'importe où. Il est possible de créer des points à l'intérieur du polygone mais il faut terminer par un point à l'extérieur du polygone.</p>
					<figure>
						<a href="illustrations/5_5_decoupe.jpg" >
							<img src="illustrations/5_5_decoupe.jpg" alt="découpe d'un polygone" width="550">
						</a>
					</figure>
					<p>Procédez de la même manière pour découper la bande de terrain public de Waimano, et la petite langue de terre de Aiea.</p>
					<figure>
						<a href="illustrations/5_5_public_lands.jpg" >
							<img src="illustrations/5_5_public_lands.jpg" alt="Sélection de la bande de terrain public de Waimano en réserve forestière" width="330">
						</a>
					</figure>
					<p>Vous pouvez ensuite mettre à jour les données attributaires :</p>
					<figure>
						<a href="illustrations/5_5_attributs_remplis.jpg" >
							<img src="illustrations/5_5_attributs_remplis.jpg" alt="Table attributaire de la couche de polygones" width="270">
						</a>
					</figure>
				</div>

			<h2>Frontière commune entre 2 polygones&nbsp;: comment est-elle gérée ?<a class="headerlink" id="V54" href="#V54"></a></h2>
			
				<div class="manip">
					<p><img class="icone" src="illustrations/5_4_noeud_icone.jpg" alt="icône de l'outil de noeud" >A l'aide de <a href="05_04_lignes.php#V43">l'outil de nœud</a>, déplacez un sommet de la petite langue de terre d'Aiea.</p>
					<figure>
						<a href="illustrations/5_5_deplacement_noeud.jpg" >
							<img src="illustrations/5_5_deplacement_noeud.jpg" alt="déplacement d'un noeud de polygone" width="400">
						</a>
					</figure>
					<p><img class="icone" src="illustrations/1_1_selection_icone.jpg" alt="icône de sélection" >A l'aide de l'outil de sélection, sélectionnez successivement le polygone d'Aiea, et celui qui l'entoure.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Que constatez-vous ?</label></p>
						<p class="reponse">Les deux polygones ne sont plus jointifs. Le déplacement d'un sommet d'un des polygones n'a pas eu d'effet sur le sommet correspondant du deuxième polygone.</p>
					</div>
						<p>Rendez-vous maintenant dans le <b>menu Projet &#8594; Options d'accrochage</b> et <b>activez l'édition topologique</b> en enclenchant le bouton correspondant si ça n'est pas déjà fait.</p>
						<figure>
						  <a href="illustrations/5_5_edition_topologique.jpg" >
						      <img src="illustrations/5_5_edition_topologique.jpg" alt="case d'activation de l'édition topologique cochée" width="600">
						  </a>
						</figure>
						<p>Déplacez à nouveau un sommet d'un des polygones et sélectionnez successivement les deux polygones.</p>
						<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Que constatez-vous ?</label></p>
						<p class="reponse">Les deux polygones sont toujours jointifs. Le déplacement d'un sommet d'un des polygones a provoqué le déplacement du sommet correspondant du deuxième polygone.</p>
					</div>
				</div>
			
			
			<h2>Ajout d'un élément en s'appuyant sur un autre : l'accrochage<a class="headerlink" id="V55" href="#V55"></a></h2>
			
				<p>Pour rajouter un élément qui en touche un autre, il est possible de s'aimanter sur les sommets ou les segments de l'élément déjà existant. Cette propriété n'est bien sûr pas propre seulement aux couches de polygones mais fonctionne aussi pour les couches de lignes et de points.</p>
				<p>Ceci permet de faire en sorte que deux polygones soient parfaitement contigus, sans aucun trou ou superposition.</p>
				<p>Par exemple, comment faire pour rajouter la partie ouest de la bande de Waimano en s'aimantant aux polygones déjà existants ?</p>
				
				<div class="manip">
					<p>Rendez-vous dans le Menu <b>Projet &#8594; Options d'accrochage</b> (cliquez sur l'image pour voir la fenêtre en plus grand) :</p>
					<figure>
						<a href="illustrations/5_5_accrochage_fenetre.jpg" >
							<img src="illustrations/5_5_accrochage_fenetre.jpg" alt="activation de l'accrochage pour la couche de polygones avec une tolérance de 10 pixels" width="600">
						</a>
					</figure>

				  <p><img class="iconemid" src="illustrations/5_5_accrochage_icone.jpg" alt="icône de l'outil d'activation de l'accrochage" >Cliquez sur le bouton <b>Activer l'accrochage</b> tout en haut à gauche de la fenêtre.</p>
				  <p>Choisissez le mode <b>Configuration avancée</b> dans la liste déroulante à droite. La liste des couches présentes dans votre projet QGIS s'affiche.</p>
				  <p>Vous pouvez ici définir à quelle(s) couche(s) le curseur sera aimanté, s'il sera aimanté uniquement par les sommets ou également par les segments, et à quelle distance d'un sommet ou segment l'aimantage prend effet.</p>
					<p>Par exemple, pour être automatiquement aimanté à votre couche de polygone dès que votre curseur approche à moins de 10 pixels d'un sommet de cette couche, cochez la case de <b>zones_oahu</b>, choisissez le mode <b>sommet</b> et fixez la tolérance à <b>10 pixels</b>.</p>
					<p>Fermez la fenêtre des paramètres d'accrochage (ou déplacez-là là où elle ne vous gênera pas).</p>
					<p>Cliquez sur l'icône <b>Ajouter une entité</b>, et approchez-vous d'un sommet d'un polygone déjà créé : votre curseur est aimanté par ce sommet, qui apparaît alors en rose.</p>
					<figure>
						<a href="illustrations/5_5_curseur_aimante.jpg" >
							<img src="illustrations/5_5_curseur_aimante.jpg" alt="Curseur aimanté prenant la forme d'un carré rose" width="250">
						</a>
					</figure>
					<p>Profitez-en pour numériser la partie Est de la bande d'Aiea, de manière à ce que les deux parties soient parfaitement jointives.</p>
					<figure>
						<a href="illustrations/5_5_aiea.jpg" >
							<img src="illustrations/5_5_aiea.jpg" alt="bande d'Aiea numérisée" width="400">
						</a>
					</figure>
				</div>
				
			<h2>Éviter les intersections entre polygones jointifs<a class="headerlink" id="V56" href="#V56"></a></h2>
			
				<p>L'accrochage est une propriété pratique pour quelques sommets, mais si vous souhaitez créer un polygone contigu à une autre sur une longue portion (par exemple le polygone en pointillés bleus sur la carte), cela peut être fastidieux de cliquer un à un sur tous les sommets communs.</p>
				
				<div class="manip">
					<p>Pour éviter cela, rendez-vous à nouveau dans le menu Projet &#8594; Options d'accrochage et cochez la case <b>Éviter le chevauchement</b> pour la couche zones_oahu.</p>
					<figure>
					   <a href="illustrations/5_5_eviter_intersections.jpg" >
					       <img src="illustrations/5_5_eviter_intersections.jpg" alt="cocher la case éviter les intersections" width="600">
					   </a>
					</figure>
					<p>Dans la barre d'outils Accrochage, il faut maintenant sélectionner <b>Suivre la configuration avancée</b> dans la liste déroulante :</p>
					<figure>
					   <a href="illustrations/5_5_suivre_config_avancee.jpg" >
					       <img src="illustrations/5_5_suivre_config_avancee.jpg" alt="sélection de l'option 'suivre la configuration avancée' dans la barre d'outils accrochage" width="480">
					   </a>
					</figure>
					<p class="note">Vous pouvez aussi simplement choisir <b>Eviter le chevauchement sur la couche active</b>, sans modifier la configuration avancée.</p>
					<p>Cliquez sur l'icône <b>Ajouter une entité</b>, et dessinez par exemple le polygone en pointillés bleu correspondant à la surface des terres forestières qui ne sont pas en réserve. Ce polygone est contigu sur une longue portion à des polygones que vous avez déjà créés : ne suivez pas les bords pour cette partie mais contentez-vous de passer au milieu des polygones déjà existants.</p>
					<p>Faites un clic droit pour terminer le polygone : les parties du polygone que vous venez de dessiner qui étaient superposées à des polygones déjà existants ont été automatiquement supprimées.</p>
					<figure>
					   <a href="illustrations/5_5_eviter_intersections_avant.jpg" >
					       <img src="illustrations/5_5_eviter_intersections_avant.jpg" alt="polygone en cours d'édition, avec des débordements sur le polygone voisin" width="300">
					   </a>
					   <a href="illustrations/5_5_eviter_intersections_apres.jpg" >
					       <img src="illustrations/5_5_eviter_intersections_apres.jpg" alt="polygone fini sans débordements" width="300">
					   </a>
					   <figcaption>&#192; gauche, polygone en cours d'édition juste avant le clic droit final, à droite après ce clic droit.</figcaption>
					</figure>
				</div>
				
				<p>Dans le chapitre suivant, découvrez ce qu'est la topologie&nbsp;!</p>		
				

				<br>
				<a class="prec" href="05_04_lignes.php">chapitre précédent</a>
				<a class="suiv" href="05_06_topologie.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_5.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
