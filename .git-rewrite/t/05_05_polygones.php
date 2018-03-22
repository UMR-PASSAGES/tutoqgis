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
			<h2>V.5  Numériser des polygones</h2>
				<ul class="listetitres">
					<li><a href="#V51">Création d'une couche de polygones</a></li>
					<li><a href="#V52">Ajout d'un polygone</a></li>
					<li><a href="#V53">Découpage d'un polygone</a></li>
					<li><a href="#V54">Frontière commune entre 2 polygones : comment est-elle gérée ?</a></li>
					<li><a href="#V55">Ajout d'un élément en s'appuyant sur un autre : l'accrochage</a></li>
					<li><a href="#V56">Éviter les intersections entre polygones jointifs</a></li>
				</ul>
				<br>
				
			<p>Pour numériser des polygones, les choses se compliquent un peu... Nous n'allons pas ici numériser toutes les zones de l'île, mais passer en revue quelques techniques d'édition de polygones au moyen de quelques exemples.</p>
				
			<h3><a class="titre" id="V51">Création d'une couche de polygones</a></h3>
				
				<div class="manip">
					<p>Reportez-vous à la <a href="05_01_creation_couche.php">partie V.1</a> pour créer une couche de polygones, en choisissant cette fois :</p>
					<ul>
						<li class="espace">le type <b>polygone</b></li>
						<li class="espace">deux champs de type texte, de longueur 80, nommés <b>type1</b> et <b>type2</b> (ils contiendront les types de zone, tels qu'indiqués dans la légende)</li>
						<li class="espace">nommez cette couche <em class="data">zones_oahu</em>.</li>
					</ul>
					<p>Vérifiez que cette couche soit bien chargée dans votre projet, ainsi que la carte <em class="data">Oahu_Hawaiian_Islands_1906_wgs84.tif</em></p>
				</div>
				
									
			<h3><a class="titre" id="V52">Ajout d'un polygone</a></h3>
			
				<p>Nous allons commencer par numériser la réserve forestière de l'île :</p>
				<figure>
					<a href="illustrations/tous/5_5_reserve_foret.png" >
						<img src="illustrations/tous/5_5_reserve_foret.png" alt="réserve forestière de l'île hachurée en rouge" height="300">
					</a>
				</figure>
				
				<div class="manip">
					<p>Passez en mode édition pour votre couche de polygones. Zoomez sur la réserve forestière.</p>
					<figure>
						<a href="illustrations/tous/5_5_zoom_reserve.png" >
							<img src="illustrations/tous/5_5_zoom_reserve.png" alt="zoom sur la réserve" height="300">
						</a>
					</figure>
					<p><img class="iconemid" src="illustrations/tous/5_5_ajout_icone.png" alt="icône ajouter une entité">Cliquez sur l'icône <b>Ajouter une entité</b> qui a pris la forme d'un polygone.</p>
					<p>Cliquez sur un point du polygone, puis ajoutez d'autres sommets comme pour une ligne. La forme du polygone évolue au fur et à mesure.</p>
					<figure>
						<a href="illustrations/tous/5_5_debut_num.png" >
							<img src="illustrations/tous/5_5_debut_num.png" alt="numérisation d'un polygone en cours" height="150">
						</a>
					</figure>
					<p>Lorsque le polygone est complet, faites un clic droit n'importe où pour le terminer. Il est inutile de cliquer à nouveau sur le premier sommet !</p>
					<figure>
						<a href="illustrations/tous/5_5_premier_polygone.png" >
							<img src="illustrations/tous/5_5_premier_polygone.png" alt="numérisation d'un polygone en cours" height="300">
						</a>
					</figure>
					<p>Vous pouvez maintenant remplir les données attributaires pour ce polygone, par exemple en donnant la valeur "Forest Reserves" en type1, et aucune valeur en type2.</p>
				</div>
				
			<h3><a class="titre" id="V53">Découpage d'un polygone</a></h3>
			
				<p>La partie Nord de notre réserve est occupée par des terres publiques (Public Lands) puis par une réserve fédérale (Federal Reservation). Comment diviser notre polygone pour faire apparaître ces zones ?</p>
				
				<div class="manip">
					<p>Vérifiez que la barre d'outils <b>Numérisation avancée</b> soit activée : Numérisation avancée doit être cochée dans le
						<a class="thumbnail_bottom" href="#thumb">Menu Vue &#8594; Barres d'outils
							<span>
								<img src="illustrations/tous/5_5_num_avancee_menu.png" alt="Menu Vue, Barres d'outils" height="600" >
							</span>
						</a>
					.</p>
					<p><img class="iconemid" src="illustrations/tous/5_5_decoupe_icone.png" alt="icône séparer les entités" >Dans la barre d'outils <b>Numérisation avancée</b>, cliquez sur l'icône <b>Séparer les entités</b>.</p>
					<p>Cliquez à l'extérieur du polygone, puis de l'autre côté du polygone en suivant la ligne selon laquelle le découper. Terminez par un clic droit n'importe où. Il est possible de créer des points à l'intérieur du polygone mais il faut terminer par un point à l'extérieur du polygone.</p>
					<figure>
						<a href="illustrations/tous/5_5_decoupe.png" >
							<img src="illustrations/tous/5_5_decoupe.png" alt="découpe d'un polygone" height="300">
						</a>
					</figure>
					<p>Procédez de la même manière pour découper la bande de terrain public de Waimano, et la petite langue de terre de Aiea.</p>
					<figure>
						<a href="illustrations/tous/5_5_public_lands.png" >
							<img src="illustrations/tous/5_5_public_lands.png" alt="Sélection de la bande de terrain public de Waimano en réserve forestière" height="300">
						</a>
					</figure>
				</div>

			<h3><a class="titre" id="V54">Frontière commune entre 2 polygones : comment est-elle gérée ?</a></h3>
			
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/5_4_noeud_icone.png" alt="icône de l'outil de noeud" >A l'aide <b>l'outil de nœud</b> (cf. <a href="05_04_lignes.php#V43" >partie V.4.3</a>), déplacez un sommet de la petite langue de terre d'Aiea.</p>
					<figure>
						<a href="illustrations/tous/5_5_deplacement_noeud.png" >
							<img src="illustrations/tous/5_5_deplacement_noeud.png" alt="déplacement d'un noeud de polygone" height="250">
						</a>
					</figure>
					<p><img class="icone" src="illustrations/tous/1_1_selection_icone.png" alt="icône de sélection" >A l'aide de l'outil de sélection, sélectionnez successivement le polygone d'Aiea, et celui qui l'entoure.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Que constatez-vous ?</label></p>
						<p class="reponse">Les deux polygones ne sont plus jointifs. Le déplacement d'un sommet d'un des polygones n'a pas eu d'effet sur le sommet correspondant du deuxième polygone.</p>
					</div>
						<p>Rendez-vous maintenant dans le 
							<a class="thumbnail_bottom" href="#thumb">Menu Préférences &#8594; Options d'accrochage
								<span>
									<img src="illustrations/tous/5_5_accrochage_menu.png" alt="Menu Préférences, Options d'accrochage" height="150" >
								</span>
							</a>	
						et cochez la case <b>Activer l'édition topologique</b> en bas à gauche de la fenêtre.</p>
						<img src="illustrations/tous/5_5_edition_topologique.png" alt="case d'activation de l'édition topologique cochée" height="30">
						<p>Déplacez à nouveau un sommet d'un des polygones et sélectionnez successivement les deux polygones.</p>
						<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Que constatez-vous ?</label></p>
						<p class="reponse">Les deux polygones sont toujours jointifs. Le déplacement d'un sommet d'un des polygones a provoqué le déplacement du sommet correspondant du deuxième polygone.</p>
					</div>
				</div>
			
			
			<h3><a class="titre" id="V55">Ajout d'un élément en s'appuyant sur un autre : l'accrochage</a></h3>
			
				<p>Pour rajouter un élément qui en touche un autre, il est possible de s'aimanter sur les sommets ou les segments de l'élément déjà existant. Cette propriété n'est bien sûr pas propre seulement aux couches de polygones mais fonctionne aussi pour les couches de lignes et de points.</p>
				<p>Ceci permet de faire en sorte que deux polygones soient parfaitement contigus, sans aucun trou ou superposition.</p>
				<p>Par exemple, comment faire pour rajouter la partie Ouest de la bande de Waimano en s'aimantant aux polygones déjà existants ?</p>
				
				<div class="manip">
					<p>Rendez-vous dans le Menu <b>Préférences &#8594; Options d'accrochage</b> :</p>
					<figure>
						<a href="illustrations/tous/5_5_accrochage_fenetre.png" >
							<img src="illustrations/tous/5_5_accrochage_fenetre.png" alt="activation de l'accrochage pour la couche de polygones avec une tolérance de 10 pixels" height="210">
						</a>
					</figure>
				</div>
				
				<p>Cette fenêtre permet de définir à quelle(s) couche(s) le curseur sera aimanté, s'il sera aimanté uniquement par les sommets ou également par les segments, et à quelle distance d'un sommet ou segment l'aimantage prend effet.</p>
				
				<div class="manip">
					<p>Par exemple, pour être automatiquement aimanté à votre couche de polygone dès que votre curseur approche à moins de 10 pixels d'un sommet de cette couche, en mode d'accrochage <b>avancé</b>, cochez la case de <b>zones_oahu</b>, choisissez le mode <b>sur un sommet</b> et fixez la tolérance à <b>10 pixels</b>.</p>
					<p>Cliquez sur l'icône <b>Ajouter une entité</b>, et approchez-vous d'un sommet d'un polygone déjà créé : votre curseur est aimanté par ce sommet, qui apparaît alors en rose.</p>
					<p>Profitez-en pour numériser la partie Est de la bande d'Aiea, de manière à ce que les deux parties soient parfaitement jointives.</p>
				</div>
				
			<h3><a class="titre" id="V56">Éviter les intersections entre polygones jointifs</a></h3>
			
				<p>L'accrochage est une propriété pratique pour quelques sommets, mais si vous souhaitez créer un polygone contigu à une autre sur une longue portion (par exemple le polygone en pointillés bleus sur la carte), cela peut être fastidieux de cliquer un à un sur tous les sommets communs.</p>
				
				<div class="manip">
					<p>Pour éviter cela, rendez-vous à nouveau dans le menu Préférences &#8594; Options d'accrochage et cochez la case <b>Éviter les intersections</b> pour la couche zones_oahu.</p>
					<img src="illustrations/tous/5_5_eviter_intersections.png" alt="cocher la case éviter les intersections" height="30">
					<p>Cliquez sur l'icône <b>Ajouter une entité</b>, et dessinez un par exemple le polygone en pointillés bleu correspondant à la surface des terres forestières qui ne sont pas en réserve. Ce polygone est contigu sur une longue portion à des polygones que vous avez déjà créés : ne suivez pas les bords pour cette partie mais contentez-vous de passer au milieu des polygones déjà existants.</p>
					<p>Faites un clic droit pour terminer le polygone : les parties du polygone que vous venez de dessiner qui étaient superposées à des polygones déjà existants ont été automatiquement supprimées.</p>
				</div>				
				

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
