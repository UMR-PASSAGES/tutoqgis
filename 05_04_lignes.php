<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">V. Numérisation</h1>
			<h2>V.4  Numériser des lignes</h2>
				<ul class="listetitres">
					<li><a href="#V41">Création d'une couche de lignes</a></li>
					<li><a href="#V42">Ajout d'une ligne</a>
						<ul class="listesoustitres">
							<li><a href="#V42a">Première ligne</a></li>
							<li><a href="#V42b">Quelques astuces</a></li>
						</ul>
					</li>
					<li><a href="#V43">Modification du tracé d'une ligne</a></li>
				</ul>
				<br>
				
			<p>Nous avons vu précédemment comment numériser des points. Comment procéder quand le but est de numériser des lignes ? Nous allons numériser des fleuves de la carte de l'île d'Oahu.</p>

			
			<h3>Création d'une couche de lignes<a class="headerlink" id="V41" href="#V41"></a></h3>
				
				<div class="manip">
					<p>Reportez-vous à la <a href="05_01_creation_couche.php">partie V.1</a> pour créer une couche de ligne, en lui donnant :</p>
					<ul>
  					    <li>le nom <em class="data">fleuves_oahu</em>.</li>
						<li>le type de géométrie <b>polyligne</b></li>
						<li>un seul champ de type texte, de longueur 80, nommé <b>nom</b> (il contiendra le nom des fleuves)</li>
					</ul>
					<p>Vérifiez que cette couche soit bien chargée dans votre projet, ainsi que la carte <em class="data"><a href="donnees/TutoQGIS_05_Numerisation.zip">Oahu_Hawaiian_Islands_1906_wgs84.tif</a></em>.</p>
				</div>
			
			<h3>Ajout d'une ligne<a class="headerlink" id="V42" href="#V42"></a></h3>
			
				<h4>Première ligne<a class="headerlink" id="V42a" href="#V42a"></a></h4>
				
    				<div class="manip">
    					<p>Zoomez sur un fleuve, par exemple dans l'ouest de l'île, dans la région de Makaha :</p>
    					<figure>
    						<a href="illustrations/5_4_makaha.jpg" >
    							<img class="noshadow" src="illustrations/5_4_makaha.jpg" alt="zoom sur Makaha" width="232">
    						</a>
    						<a href="illustrations/5_4_makaha_zoom.jpg" >
    							<img class="noshadow" src="illustrations/5_4_makaha_zoom.jpg" alt="zoom sur la rivière de Makaha" width="266">
    						</a>
    					</figure>
    					<p>Passez en mode édition pour votre couche de fleuves.</p>
    					<p><img class="icone" src="illustrations/5_4_ajout_icone.jpg" alt="icône ajouter une entité linéaire">Cliquez sur l'icône <b>Ajouter une entité linéaire</b>. Attention, elle ressemble beaucoup à l'icône pour créer une nouvelle couche shapefile&nbsp;!</p>
    					<p class="note">Vous remarquerez que cette icône varie en fonction du type de couche éditée : point, ligne ou polygone.</p>
    					<p>Cliquez sur le début du fleuve pour créer un premier sommet, puis rajoutez d'autres points à votre ligne. Pour terminer, faites un clic-droit n'importe où (ce clic ne sera pas pris en compte mais termine la saisie).</p>
    					<figure>
    						<a href="illustrations/5_4_fleuve.jpg" >
    							<img src="illustrations/5_4_fleuve.jpg" alt="fleuve numérisé" width="500">
    						</a>
    					</figure>
    				</div>
				
				<h4>Quelques astuces<a class="headerlink" id="V42b" href="#V42b"></a></h4>
				
					<ul>
					<li class="espace">Si pendant la numérisation vous avez des <b>difficultés à voir votre ligne</b> : menu Préférences &#8594; Options &#8594; rubrique Numérisation : réglez l'épaisseur de la ligne, par exemple 2, et la couleur. Pour la 
					<a class="thumbnail_bottom" href="#thumb">couleur
						<span>
							<img src="illustrations/5_4_num_style_couleur.jpg" alt="choix de la couleur de numérisation" height="400" >
						</span>
					</a>
					, n'oubliez pas de mettre le canal alpha, c'est-à-dire la transparence, à 255 pour éliminer toute transparence (une fois la ligne terminée, elle prend le style spécifié dans les propriétés de la couche)</li>
					<li class="espace"><b>Supprimer le dernier point créé :</b> touche suppr ou retour arrière (backspace)</li>
					<li class="espace"><b>Se déplacer tout en numérisant :</b> utilisez les flèches du clavier, ou bien maintenez la molette de la souris ou la touche espace enfoncée et bougez la souris</li>
					<li class="espace"><b>Abandonner la ligne en cours :</b> terminez-la avec un clic droit, puis si les fenêtres de saisie d'attributs sont activées cliquez sur annuler, sinon utilisez ctrl + z</li>
					</ul>
			
			<h3>Modification du tracé d'une ligne<a class="headerlink" id="V43" href="#V43"></a></h3>
			
				<p>Il est possible de modifier le tracé d'une ligne existante en déplaçant des sommets, en en rajoutant ou supprimant.</p>
				
				<div class="manip">
					<p><img class="icone" src="illustrations/5_4_noeud_icone.jpg" alt="icône outil de noeud">Vérifiez que vous êtes bien en mode édition pour la couche de fleuves. Sélectionnez-la dans la table des matières, puis cliquez sur l'icône <b>Outil de nœud</b>.</p>
					<p>Survolez une ligne existante : les sommets prennent la forme de ronds rouges.</p>
					<figure>
						<a href="illustrations/5_4_fleuve_noeud.jpg" >
							<img src="illustrations/5_4_fleuve_noeud.jpg" alt="ligne avec les noeuds visibles sous forme de carrés rouges" width="500" >
						</a>
					</figure>
					<p>Si vous survolez un sommet, il devient plus gros. Vous pouvez alors :</p>
					<ul>
						<li class="espace"><b>le déplacer</b> en cliquant une première fois sur le sommet puis en cliquant à l'emplacement de votre choix</li>
						<li class="espace"><b>le supprimer </b> en cliquant une première fois sur le sommet puis en appuyant sur la touche suppr</li>
						<li class="espace"><b>rajouter un sommet :</b> double-cliquez sur la ligne à l'endroit où vous voulez créer un sommet puis cliquez là où vous désirez placer ce sommet.</li>
					</ul>
					<p>Une fois vos modifications terminées, n'oubliez pas de <b>quitter le mode édition en enregistrant vos modifications</b>.</p>
				</div>
				
				<p>Rendez-vous au chapitre suivant pour numériser des polygones !</p>
	

				<br>
				<a class="prec" href="05_03_donnees_attrib.php">chapitre précédent</a>
				<a class="suiv" href="05_05_polygones.php">chapitre suivant</a>
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
