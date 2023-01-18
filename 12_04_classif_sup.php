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
			<h2>XII.4  Classification supervisée</h2>
			
			  <ul class="listetitres">
			   <li><a href="#XII41">Qu'est-ce qu'une classification supervisée ?</a></li>
			   <li><a href="#XII42">Visualisation de l'image</a>
			     <ul class="listesoustitres">
  				    <li><a href="#XII42a">Pixels en RFE (Réflectance au sol en pour 10000)</a></li>
  				    <li><a href="#XII42b">Superficie de l'image</a></li>
  				    <li><a href="#XII42c">Compositions colorées</a></li>
  				  </ul>
			   </li>
			   <li><a href="#XII43">Extraction des signatures spectrales</a></li>
			   <li><a href="#XII44">Classification supervisée avec l'algorithme du maximum de vraisemblance</a></li>
			   <li><a href="#XII45">Interprétation des résultats et mise en page</a></li>
			  </ul>
			  <br>
			 
			  <p>Dans cette partie, nous allons effectuer une classification supervisée, c'est-à-dire se basant sur des données d'entraînement que vous aurez créées. Nous utiliserons pour cela une image Sentinel 2B acquise sur le bassin <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Endor%C3%A9isme">endoréique</a> de <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Okavango">l'Okavango</a>, au Botswana.</p>
			  
			  <h3>Qu'est-ce qu'une classification supervisée ?<a class="headerlink" id="XII41" href="#XII41"></a></h3>
			  
			   <p>Comme une <a href="12_03_classif_nonsup.php#XII31">classification non supervisée</a>, une classification permet le regroupement des pixels d'une image pour aboutir à des catégories, par exemple d'occupation du sol. Mais à la différence de cette dernière, elle se base sur un <b>échantillonnage terrain</b> fait par l'utilisateur.</p>
			   
			   <p>Pour cet échantillonnage, il est possible de se baser sur une campagne de terrain avec des relevés d'occupation du sol, et/ou sur des bases de données autres (Corine Land Cover...).</p>
			   
			   <p>Il existe de nombreux algorithmes de classification supervisée :</p>
			   
			   <ul>
			     <li>Algorithmes bayésiens</li>
			     <li>Machine Learning (SVM, Random Forest, réseaux de neurones...)</li>
			     <li>Deep Learning (nécessite un très grand échantillonnage)</li>
			   </ul>
			   
			   <p>Nous utiliserons ici l'algorithme du <b>maximum de vraisemblance</b>, qui fait partie des algorithmes bayésiens. L'idée est de calculer pour chaque pixel la probabilité qu'il appartienne à chaque classe, avec 2 hypothèses préalables&nbsp;:</p>
			   
			   <ul>
			     <li>un pixel a autant de probabilité d'appartenir à une classe qu'à une autre</li>
			     <li>la distribution des valeurs dans chaque bande est gaussienne, c'est-à-dire qu'elle suit une <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Loi_normale" >loi normale</a>&nbsp;:</li>
			   </ul>
			   
			   <figure>
						<a href="https://fr.wikipedia.org/wiki/Loi_normale#/media/Fichier:Gauss_reduite.svg" >
							<img src="illustrations/12_04_gauss_reduite.svg" alt="Courbe de Gauss ou courbe en cloche" width="300">
						</a>
			   </figure>
			  
			   <p class="keskonfai">2 mots sur les avantages et les inconvénients de ce type de classif par rapport à d'autres types de classif supervisées ?</p>
			  
			  <h3>Visualisation de l'image<a class="headerlink" id="XII42" href="#XII42"></a></h3>
			  
			   <h4>Pixels en RFE (Réflectance au sol en pour 10000)<a class="headerlink" id="XII42a" href="#XII42a"></a></h4>
			   
			     <p class="keskonfai">?</p>
			   
			   <h4>Superficie de l'image<a class="headerlink" id="XII42b" href="#XII42b"></a></h4>
			   
			     <p>Comment obtenir la superficie de l'image étudiée&nbsp;?</p>
			     
			     <p>On peut utiliser l'emprise de la couche pour calculer cette surface.</p>
			     
			     <div class="manip">
			       <p>Ouvrez les propriétés de la couche, rubrique <b>Information</b>.</p>
			       <p>Nous allons d'abord vérifier les unités des coordonnées de la couche, et donc le SCR. Descendez jusqu'à <b>Système de coordonnées de référence (SCR)</b>&nbsp;:</p>
			       <figure>
    						<a href="illustrations/12_04_info_scr.jpg" >
    							<img src="illustrations/12_04_info_scr.jpg" alt="Capture d'écran de la partie sur les SCR dans la partie Information de la fenêtre des propriétés" width="600">
    						</a>
    			   </figure>
    			   <p>Il s'agit d'un SCR projeté utilisant la projection <a href="02_02_coord.php#II22d" >UTM</a>, les coordonnées sont donc métriques.</p>
    			   <p>Remontez maintenant jusqu'à <b>Information du fournisseur</b> pour lire l'emprise de la couche&nbsp;:</p>
    			   <figure>
    						<a href="illustrations/12_04_info_emprise.jpg" >
    							<img src="illustrations/12_04_info_emprise.jpg" alt="Capture d'écran de l'emprise dans la partie Information de la fenêtre des propriétés" width="500">
    						</a>
    			   </figure>
    			   <p>Cette emprise se lit comme ci : xmin, ymin, xmax, ymax.</p>
    			   <p>La couche mesure donc en X :</p>
    			   <code>750000 - 723200 = 26800</code>
    			   <p>Soit 26,8 km, et en Y&nbsp;:</p>
    			   <code>7812800 - 7790200 = 22600</code>
    			   <p>Soit 22,6 km.</p>
    			   <p>La superficie couverte est donc de <code>26,8 * 22,6 = 605,68</code> soit <b>un peu plus de 600 km&#178;</b>.</p>
			     </div>
			     
			     <p>On peut aussi obtenir cette surface avec l'outil de mesure de QGIS, ce sera plus rapide mais un peu moins précis&nbsp;!</p>
			     
			     <div class="manip">
			       <p>Cliquez sur l'outil de mesure et sélectionnez <b>Mesurer une aire</b> si ça n'est pas déjà fait (l'icône de cet outil est différente suivant le type de mesure sélectionnée).</p>
			       <figure>
    						<a href="illustrations/12_04_mesure_aire.jpg" >
    							<img src="illustrations/12_04_mesure_aire.jpg" alt="Capture d'écran de l'outil de mesure et de sa liste déroulante" width="500">
    						</a>
    			   </figure>
    			   <p>Dessinez ensuite le contour de l'image satellite, en cliquant sur chacun de ses 4 angles, avec un clic droit n'importe où pour terminer. Vous pouvez lire la surface de la zone que vous avez délimitée dans la fenêtre de l'outil, en choisissant l'unité kilomètres carrés&nbsp;:</p>
    			   <figure>
    						<a href="illustrations/12_04_mesure_res.jpg" >
    							<img src="illustrations/12_04_mesure_res.jpg" alt="Résultat de la mesure à la main : environ 610 km2" width="400">
    						</a>
    			   </figure>
    			   <p>Cette mesure variera selon les points où vous avez cliqué.</p>
			     </div>
			     
			     <p><b>Notre zone couvre donc environ 23 km par 27 km,soit un peu plus de 600 km&#178;.</b></p>
			  
			   <h4>Compositions colorées<a class="headerlink" id="XII42c" href="#XII42c"></a></h4>
			  
  			   <div class="manip">
  			     <p>Ouvrez un nouveau projet QGIS et ajoutez-y l'image <em class="data"><a href="donnees/TutoQGIS_12_teledetection.zip">SENTINEL2B_20200619-Okavango</a></em>.</p>
  			     <p><a href="03_04_fonds_carte.php#III42a">Ajoutez un fonds OpenStreetMap</a> pour situer l'image.</p>
  			     <figure>
  						<a href="https://fr.wikipedia.org/wiki/Loi_normale#/media/Fichier:Gauss_reduite.svg" >
  							<img src="illustrations/12_04_okavango.jpg" alt="Localisation de l'image satellite dans le Sud de l'Afrique et zoom sur l'image elle-même" width="600">
  						</a>
  					</figure>
  			   </div>
  			   
  			   <p class="keskonfai">Comme pour l'image précédente, seulement 10 bandes ? 321 en vraies couleurs ?</p>
  			   
  			   <div class="manip">			
          	<div class="question">
          		<input type="checkbox" id="faq-1">
          		<p><label for="faq-1">Comment afficher cette image avec une composition colorée en vraie couleur&nbsp;?</label></p>
          		<p class="reponse">Avec les bandes 3, 2 et 1 dans les canaux R, G et B, on obtient cette image en "vraies couleurs"&nbsp:
          		<img src="illustrations/12_04_vraiecouleur.jpg" alt="Composition colorée avec les bandes 3, 2 et 1" width="400"></p>
          	</div>
           </div>	
           
			   
			  
			  <h3>Extraction des signatures spectrales<a class="headerlink" id="XII43" href="#XII43"></a></h3>
			  <h3>Classification supervisée avec l'algorithme du maximum de vraisemblance<a class="headerlink" id="XII44" href="#XII44"></a></h3>
			  <h3>Interprétation des résultats et mise en page<a class="headerlink" id="XII45" href="#XII45"></a></h3>
			 
        <p>Vous êtes arrivé.e au bout de ce tutoriel. Si vous le suivez depuis le début, bravo pour votre patience, et sinon bravo également&nbsp;!</p>				

				<br>
				<a class="prec" href="12_03_classif_nonsup.php">chapitre précédent</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_12.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
