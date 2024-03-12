<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">V. Numérisation</h1>
			<h2>V.6  Quelques notions de topologie</h2>
				<ul class="listetitres">
					<li><a href="#V61">Qu'est-ce que la topologie ?</a>
						<ul class="listesoustitres">
							<li><a href="#V61a">Définition et exemples</a></li>
							<li><a href="#V61b">Pourquoi faire attention à la topologie ?</a></li>
						</ul>
					</li>
					<li><a href="#V62">Pour aller plus loin : comment vérifier la topologie d'une couche ?</a>
						<ul class="listesoustitres">
							<li><a href="#V62a">Vérification simple</a></li>
							<li><a href="#V62b">Utilisation du vérificateur de topologie</a></li>
						</ul>
					</li>
					<li><a href="#V63">Corriger les erreurs de topologie : quelques pistes</a>
					   <ul class="listesoustitres">
							<li><a href="#V63a">Corriger les erreurs de topologie manuellement</a></li>
							<li><a href="#V63b">Corriger les erreurs de topologie avec l'outil &#171;&nbsp; réparer les géométries &#187;&nbsp;</a></li>
							<li><a href="#V63c">Corriger les erreurs de topologie avec l'outil v.clean de Grass</a></li>
							<li><a href="#V63d">Cas particulier des erreurs de type &#171;&nbsp;auto-intersection&nbsp;&#187;</a></li>
						</ul>
				    </li>
				</ul>
				<br>
				
			<p>Au cours de la dernière partie notamment, nous avons vu comment éviter que deux polygones soient &#171;&nbsp;presque&nbsp;&#187; jointifs, au moyen de propriétés telles que l'accrochage, ou par l'utilisation d'outils de découpage par exemple. Nous avons également vu comment utiliser le mode d'édition topologique de QGIS.</p>
			<p>Nous allons ici en apprendre un peu plus sur ce qu'est la topologie, et comment vérifier la topologie d'une couche.</p>

			<h3>Qu'est-ce que la topologie ?<a class="headerlink" id="V61" href="#V61"></a></h3>
			
				<h4>Définition et exemples<a class="headerlink" id="V61a" href="#V61a"></a></h4>
				
					<p>La <a class="ext" target="_blank" href="http://www.cnrtl.fr/definition/topologie">topologie</a> est la &#171; partie de la géométrie qui considère uniquement les relations de position &#187; (Aur.-Weil 1981).</p>
					<p>En géomatique, la topologie est utilisée pour décrire les relations entre les géométries des entités. Des règles de topologie peuvent être définies, et les erreurs de topologie détectées.</p>
					<p>Par exemple, on peut décider qu'il ne doit y avoir aucune superposition de polygones dans une couche (les erreurs sont en rouge) :</p>
					<figure>
						<a href="illustrations/5_6_overlap.jpg" >
							<img src="illustrations/5_6_overlap.jpg" alt="deux polygones se superposant en partie" width="300">
						</a>
					</figure>
					<p>Ou bien qu'il ne doit pas y avoir de trous entre les polygones :</p>
					<figure>
						<a href="illustrations/5_6_gap.jpg" >
							<img src="illustrations/5_6_gap.jpg" alt="deux polygones avec un trou entre les deux" width="300">
						</a>
					</figure>
					<p>Les règles de topologie peuvent aussi mettre en jeu plusieurs couches. Par exemple, tous les points d'une couche doivent être dans un polygone d'une autre couche :</p>
					<figure>
						<a href="illustrations/5_6_pts_dans_polygones.jpg" >
							<img src="illustrations/5_6_pts_dans_polygones.jpg" alt="des points dans des polygones sauf deux" width="300">
						</a>
					</figure>
					<p>Il est bien sûr possible de combiner plusieurs règles. Vous trouverez dans le <a class="ext" target="_blank" href="https://docs.qgis.org/testing/en/docs/gentle_gis_introduction/topology.html" >manuel de QGIS</a> la description d'un certain nombre de règles de topologie.</p>

				<h4>Pourquoi faire attention à la topologie ?<a class="headerlink" id="V61b" href="#V61b"></a></h4>
					
					<p>Ne pas respecter les règles de topologie peut poser des problèmes lors de l'utilisation d'outils d'analyse spatiale, qui donneront alors des résultats inattendus.</p>
					
					
			<h3>Pour aller plus loin : comment vérifier la topologie d'une couche ?<a class="headerlink" id="V62" href="#V62"></a></h3>
			
				<p>Cette partie est pour &#171; aller un peu plus loin &#187; : vous pouvez donc passer directement à la partie suivante si vous le désirez !</p>
				<p>Sinon, vous aurez besoin d'un projet QGIS avec une couche de polygones, par exemple <em class="data">zones_oahu</em>.</p>
			
				<h4>Vérification simple<a class="headerlink" id="V62a" href="#V62a"></a></h4>
					
					<div class="manip">
					  <p>Vérifiez d'abord que votre couche de polygones <em class="data">zones_oahu</em> n'est pas en mode édition.</p>
						<p>Pour vérifier rapidement la topologie d'une couche, utilisez l'outil <b>Vérifier la validité</b>, accessible dans la boîte à outils (en tapant <em>valid</em> dans la barre de recherche par exemple)&nbsp;:</p>
						<figure>
							<a href="illustrations/5_6_verif_toolbox.jpg" >
								<img src="illustrations/5_6_verif_toolbox.jpg" alt="accéder à l'outil vérifier la validité dans la toolbox" width="370">
							</a>
						</figure>
						<p class="note">Si la boîte à outils n'est pas visible, allez dans le menu Traitement &#8594; Boîte à outils.</p>
						<figure>
							<a href="illustrations/5_6_verif_fenetre.jpg" >
								<img src="illustrations/5_6_verif_fenetre.jpg" alt="fenêtre de validation de la géométrie" width="600">
							</a>
						</figure>
						<p>Sélectionnez la couche <em class="data">zones_oahu</em> et cliquez sur <b>Exécuter</b>.</p>
						<p>3 couches temporaires sont ajoutées au projet :</p>
						<ul>
						  <li><b>sortie valide</b> liste les entités valide</li>
						  <li><b>sortie invalide</b> liste les entités invalides (avec une ou plusieurs erreurs de topologie</li>
						  <li><b>erreur de sortie</b> liste les erreurs de topologie rencontrées, un point par erreur.</li>
						</ul>
						<p>Si vous n'avez pas d'erreur de topologie dans votre couche, la couche <b>sortie valide</b> contiendra autant d'entités que la couche d'origine, et les couches <b>sortie invalide</b> et <b>erreur de sortie</b> n'en contiendront aucune.</p>
					</div>
				
				<h4>Utilisation du vérificateur de topologie<a class="headerlink" id="V62b" href="#V62b"></a></h4>
				
					<p>Le <b>vérificateur de topologie</b> est un outil plus perfectionné qui permet de spécifier un certain nombre de règles, et de voir les erreurs relatives à ces règles. Il s'agit d'une extension principale, qui ne peut pas être désinstallée.</p>
					
					<div class="manip">
					 <p>Il faut tout d'abord vérifier que cette extension soit activée.</p>
					 <p>Pour cela, rendez-vous dans le <b>menu Extensions &#8594; Installer/Gérer les extensions</b>. Dans la rubrique <b>Installées</b>, vérifiez que la case du <b>Vérificateur de topologie</b> soit bien cochée, et cochez-la si ça n'est pas le cas&nbsp;:</p>
					 <figure>
							<a href="illustrations/5_6_veriftopo_activation.jpg" >
								<img src="illustrations/5_6_veriftopo_activation.jpg" alt="Gestionnaire d'extensions, rubrique 'Installées', avec la ligne du vérificateur de topologie surlignée en rouge, la case est cochée" width="600">
							</a>
						</figure>

						<p>Vous pouvez maintenant accéder au vérificateur de topologie : 
							<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Vérificateur de topologie
								<span>
									<img src="illustrations/5_6_veriftopo_menu.jpg" alt="Menu Vecteur, Vérificateur de topologie" height="200" >
								</span>
							</a>	
						:</p>
						<figure>
							<a href="illustrations/5_6_veriftopo_fenetre.jpg" >
								<img src="illustrations/5_6_veriftopo_fenetre.jpg" alt="fenêtre (intégrée) du vérificateur de topologie" width="400">
							</a>
						</figure>
						<p>Cliquez sur le bouton <b>Configuration</b> pour ajouter ou supprimer des règles de topologie. Nous allons ajouter une règle pour interdire les superpositions de polygones dans la couche <em class="data">zones_oahu</em>.</p>
						<figure>
							<a href="illustrations/5_6_regle_fenetre.jpg" >
								<img src="illustrations/5_6_regle_fenetre.jpg" alt="fenêtre de gestion des règles de topologie" width="430">
							</a>
						</figure>
						<p>Sélectionnez la couche <b>zones_oahu</b> dans la liste déroulante, puis la propriété <b>ne doit pas se superposer</b> et cliquez enfin sur le bouton <b>Ajouter une règle</b>. Cliquez sur <b>OK</b>.</p>
						<p>Pour visualiser les erreurs à cette règle, cliquez sur le bouton <b>Valider tout</b> du vérificateur de topologie.</p>
						<figure>
							<a href="illustrations/5_6_veriftopo_erreurs.jpg" >
								<img src="illustrations/5_6_veriftopo_erreurs.jpg" alt="fenêtre du vérificateur de topologie, pas d'erreurs" width="400">
							</a>
						</figure>
						<p>La liste des éventuelles erreurs apparaît ; il est possible de zoomer sur une erreur en double-cliquant sur la ligne correspondante.</p>
					</div>
					
			<h3>Corriger les erreurs de topologie : quelques pistes<a class="headerlink" id="V63" href="#V63"></a></h3>
					
			    <p>Cette partie n'est pas très étoffée et mériterait un chapitre à part entière ! A venir ?</p>
					
			    <h4>Corriger les erreurs de topologie manuellement<a class="headerlink" id="V63a" href="#V63a"></a></h4>
			
			       <p>Pour corriger les erreurs de topologie d'une couche, vous pouvez procéder &#171; à la main &#187;, en corrigeant les erreurs une à une avec les outils d'édition de QGIS, en utilisant les <b>propriétés d'accrochage</b> et l'<b>outil de noeud</b>. Cliquer sur la ligne correspondant à une erreur dans le vérificateur de topologie zoome sur cette erreur.</p>
			       
			    <h4>Corriger les erreurs de topologie avec l'outil &#171;&nbsp; réparer les géométries &#187;&nbsp;<a class="headerlink" id="V63b" href="#V63b"></a></h4>
			    
			      <p>Il existe un outil <b>Réparer les géométries</b> accessible dans la boîte à outils de traitement. Pour afficher (ou masquer si elle est déjà affichée) cette boîte, <b>menu Traitement &#8594; Boîte à outils</b>. Tapez ensuite <b>réparer</b> dans la partie filtre pour trouver facilement cet outil :</p>
			      <figure>
						<a href="illustrations/5_6_reparer.jpg" >
							<img src="illustrations/5_6_reparer.jpg" alt="accès à l'outil réparer les géométries à partir de la boîte à outils" width="300">
						</a>
					  </figure>
					  <p>Cet outil prend une couche en entrée (la couche contenant des erreurs) et génère une nouvelle couche, normalement sans erreurs de topologie, en sortie.</p>
			    
			    <h4>Corriger les erreurs de topologie avec l'outil v.clean de Grass<a class="headerlink" id="V63c" href="#V63c"></a></h4>
			    
  					<p>Vous pouvez également utiliser l'outil <b>v.clean</b> issu de <b>Grass</b>, toujours dans la boîte à outils de traitements. Tapez <b>clean</b> dans le filtre pour accéder à l'outil <b>v.clean</b>.</p>
  					<figure>
  						<a href="illustrations/5_6_vclean.jpg" >
  							<img src="illustrations/5_6_vclean.jpg" alt="accès à l'outil vclean à partir de la boîte à outils" width="300">
  						</a>
  					</figure>
  					<p>En double-cliquant sur cet outil, une aide est accessible dans l'onglet Help, ou bien ici : <a class="ext" target="_blank" href="https://grass.osgeo.org/grass70/manuals/v.clean.html" >https://grass.osgeo.org/grass70/manuals/v.clean.html</a>. Regardez également <a class="ext" target="_blank" href="http://grasswiki.osgeo.org/wiki/Vector_topology_cleaning" >ici</a> pour plus de documentation.</p>
					
					<h4>Cas particulier des erreurs de type &#171;&nbsp;auto-intersection&nbsp;&#187;<a class="headerlink" id="V63d" href="#V63d"></a></h4>
					
					   <p>Vous rencontrerez peut-être des erreurs de topologie de type &#171;&nbsp;self-intersection&nbsp;&#187; dans une couche de polygones&nbsp;: ces erreurs peuvent généralement être réparées en créant une <a href="09_01_vecteur.php#VIII23b">zone tampon</a> de 0 autour de la couche originale.</p>

				<br>
				<a class="prec" href="05_05_polygones.php">chapitre précédent</a>
				<a class="suiv" href="06_00_requetes.php">partie VI : requêtes</a>
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
