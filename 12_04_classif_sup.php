<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		
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
			  
			   <p>Cet algorithme de type probabiliste bien adapté aux images satellitaires permet d'associer une probabilité d'appartenance d'un pixel à une classe. La prise de décision se fait par la valeur maximale de probabilité et permet d'associer une carte de confiance dans la prédiction.</p>
			   
			   <p>Le choix d'un algorithme de classification demeure complexe puisqu'il dépend du type de données, de l'échantillonnage dont on dispose et surtout du paysage étudié.</p>
			  
			  <h3>Visualisation de l'image<a class="headerlink" id="XII42" href="#XII42"></a></h3>
			  
			   <h4>Pixels en RFE (Réflectance au sol en pour 10000)<a class="headerlink" id="XII42a" href="#XII42a"></a></h4>
			   
			    <p class="keskonfai">A faire !</p>
			    
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
			     
			     <p>On peut aussi obtenir cette surface avec l'outil de mesure de QGIS, ce sera plus rapide mais moins précis&nbsp;!</p>
			     
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
  			   
  			   <p>En allant dans les propriétés de la couche, rubrique Information, vous pouvez voir que cette image n'a que 10 bandes, contrairement à ce que nous avons pu voir sur les images Sentinel-2 <a href="12_01_intro_teledec.php#XII14" >ici</a>. Les bandes B1 (aérosol côtier), B9 (vapeur d'eau) et B10 (SWIR Cirrus) ne sont pas présentes, ce qui nous donne la correspondance suivante&nbsp;:</p>
  					
  					<table>
                <caption>Correspondance entre numéro de bande visible dans QGIS et bande Sentinel-2</caption>
                <tr>
                    <th class="centre">Numéro de bande</th>
                    <th class="centre">Bande Sentinel-2</th>
                </tr>
                <tr>
                    <td class="centre">Bande 01</td>
                    <td class="centre">B2 (Bleu)</td>
                </tr>
                <tr class="alt">
                    <td class="centre">Bande 02</td>
                    <td class="centre">B3 (Vert)</td>
                </tr>
                <tr>
                    <td class="centre">Bande 03</td>
                    <td class="centre">B4 (Rouge)</td>
                </tr>
                <tr class="alt">
                    <td class="centre">Bande 04</td>
                    <td class="centre">B5 (Rededge)</td>
                </tr>
                <tr>
                    <td class="centre">Bande 05</td>
                    <td class="centre">B6 (Rededge)</td>
                </tr>
                <tr class="alt">
                    <td class="centre">Bande 06</td>
                    <td class="centre">B7 (Rededge)</td>
                </tr>
                <tr>
                    <td class="centre">Bande 07</td>
                    <td class="centre">B8 (PIR 10mètres)</td>
                </tr>
                <tr class="alt">
                    <td class="centre">Bande 08</td>
                    <td class="centre">B8A (PIR20 mètres)</td>
                </tr>
                <tr>
                    <td class="centre">Bande 09</td>
                    <td class="centre">B11 (MIR1)</td>
                </tr>
                <tr class="alt">
                    <td class="centre">Bande 10</td>
                    <td class="centre">B12 (MIR2)</td>
                </tr>
            </table>
            
           <br>
  			   <div class="manip">			
          	<div class="question">
          		<input type="checkbox" id="faq-1">
          		<p><label for="faq-1">Comment afficher cette image avec une composition colorée en vraie couleur&nbsp;?</label></p>
          		<p class="reponse">Avec les bandes 3, 2 et 1 dans les canaux R, G et B, on obtient cette image en "vraies couleurs"&nbsp:
          		<img src="illustrations/12_04_vraiecouleur.jpg" alt="Composition colorée avec les bandes 3, 2 et 1" width="400"></p>
          	</div>
           </div>
           
           <div class="manip">			
          	<div class="question">
          		<input type="checkbox" id="faq-2">
          		<p><label for="faq-2">Quelles autres compositions colorées pouvez-vous faire avec cette image&nbsp;?</label></p>
          		<p class="reponse">A compléter !</p>
          	</div>
           </div>	
           
			  <h3>Extraction des signatures spectrales<a class="headerlink" id="XII43" href="#XII43"></a></h3>
			  
			   <p>Pour effectuer une classification supervisée, il nous faut des données d'entraînement, donc des <a href="12_02_info_spectrale.php#XII21">ROI</a>. Ces ROI nous serviront également à lire les signatures spectrales de nos futures classes d'occupation du sol.</p>
			   
			   <p>Nous utiliserons les 4 classes suivantes&nbsp;:</p>
			   
			     <ul>
			       <li>surface en eau</li>
			       <li>végétation arborée</li>
			       <li>végétation rase</li>
			       <li>surface en sol nu</li>
			     </ul>
			     
  			    <div class="manip">
  			     <p><a href="12_02_info_spectrale.php#XII21a">Définissez tout d'abord le jeu de bandes</a> dans SCP.</p>
  			     <p><a href="12_02_info_spectrale.php#XII21b">Créez ensuite les ROI</a>, en prenant entre 5 et 10 polygones par classe.</p>
  			     <p>Pour digitaliser plusieurs polygones dans une même macro-classe, il faut cliquer après chaque polygone sur l'icône <b>Sauver les ROI temporaires dans les données d'entraînement</b> (en bas à droite du panneau SCP)&nbsp;:</p>
  			     <figure>
    						<a href="illustrations/12_04_enregistrer_roi.jpg" >
    							<img src="illustrations/12_04_enregistrer_roi.jpg" alt="Bas du panneau SCP avec l'icône de sauvegarde entourée en rouge et la case signature décochée" width="350">
    						</a>
    					</figure>
    					<p>Pour gagner du temps pendant la saisie, vous pouvez décocher la case <b>Signature</b> pour ne pas calculer les signatures spectrales à chaque sauvegarde.</p>
    					<p><img class="icone" src="illustrations/12_04_calcul_signature_icone.jpg" alt="bouton de calcul de signature" >Et dans ce cas, vous pouvez calculer ces signatures en une seule fois une fois tous les ROI créés, en les sélectionnant puis en cliquant sur le bouton <b>calculer les signatures pour les éléments surlignés</b>.</p>
    					<p>Il est ensuite possible de calculer une signature globale pour chaque classe.</p>
    					<p><img class="icone" src="illustrations/12_04_fusion_signatures_icone.jpg" alt="bouton de fusion de signature" >Pour cela, sélectionnez tous les éléments d'une même classe puis cliquez sur le bouton <b>Fusionner les signatures spectrales surlignées</b>.</p>
  			    
  			    <p><img class="icone" src="illustrations/12_04_graphique_icone.jpg" alt="bouton d'ajout des signatures au graphique" >Il ne vous reste plus ensuite qu'à ajouter les signatures de chaque classe au graphique, à l'aide du bouton <b>Ajouter les signatures spectrales surlignées au graphique</b>&nbsp;:</p>
  			    <figure>
  						<a href="illustrations/12_04_signatures_spectrales.jpg" >
  							<img src="illustrations/12_04_signatures_spectrales.jpg" alt="Graphique des signatures spectrales des 4 classes, en X les longueurs d'ondes et en Y le nombre de pixels" width="600">
  						</a>
  					</figure>
  					<p class="note">Vous remarquerez que les 2 lignes du tableau correspondant à la végétation rase et au sol nu sont surlignées en orange&nbsp;: cela signifie que ces 2 classes se recouvrent partiellement.</p>
  				</div>
				
				  <p>Nous allons maintenant pouvoir faire une classification basée sur ces ROI&nbsp;!</p>
				  
				  <p class="keskonfai">Penser à ajouter dans les données en téléchargement une couche de ROI exemple.</p>
			   
			  <h3>Classification supervisée avec l'algorithme du maximum de vraisemblance<a class="headerlink" id="XII44" href="#XII44"></a></h3>
			  
			   <p>Ici, nous allons utiliser l'algorithme du maximum de vraisemblance pour regrouper les pixels en catégories, en se basant sur les ROI que nous venons de dessiner.</p>
			   
			   <div class="manip">
			     <p><img class="icone" src="illustrations/12_04_traitement_bande_icone.jpg" alt="Icône de l'outil de traitement de bandes" >Pour accéder à l'outil de classification supervisée, cliquez sur l'icône <b>Traitement de bande</b> puis <b>Classification</b> dans la barre d'outils sur la gauche du panneau SCP, ou bien <b>Menu SCP &#8594; Traitement de bande &#8594; Classification</b> (cliquer pour voir en plus grand)&nbsp;:</p>
			     
			     <figure>
  						<a href="illustrations/12_04_classif_fenetre.jpg" >
  							<img src="illustrations/12_04_classif_fenetre.jpg" alt="Fenêtre de l'outil de classification, avec les options : utiliser MC ID, algorithme max de vraisemblance, rapport de classification" width="600">
  						</a>
  					</figure>
  					
  					<ul>
  					 <li class="espace">Sélectionner un jeu de bande : a priori il y a un seul jeu de bandes dans notre projet, laisser 1</li>
  					 <li class="espace">Utiliser : sélectionnez <b>MC ID</b> pour obtenir dans l'image finale autant de catégories que de macro-classes, c-est-à-dire de classes d'occupation du sol (en choisissant C ID nous aurions autant de catégories que de polygones)</li>
  					 <li class="espace">Algorithme : sélectionnez <b>maximum de vraisemblance</b> et laissez le seuil à 0. Si le seuil est défini, avec une valeur entre 0 et 100, les pixels ayant une probabilité inférieure à ce seuil d'appartenir à une classe seront exclus de la classification</li>
  					 <li class="espace">Classification d'occupation des sols : ne sélectionnez aucune valeur. Il s'agit d'un autre algorithme de classification qui peut être utilisé seul ou bien combiné à celui choisi au-dessus. Pour plus d'infos voir <a class="ext" target="_blank" href="https://semiautomaticclassificationmanual.readthedocs.io/fr/latest/classificationTab.html#land-cover-signature-classification" >la documentation (Land Cover Signature Classification)</a>&nbsp;!</li>
  					 <li class="espace">Sortie de la classification&nbsp;: il est possible ici de spécifier un style ou un masque pour l'image en sortie, créer un fichier vecteur de sortie en plus du geotiff, créer un <b>rapport de classification</b> qui indiquera pour chaque classe le nombre et le pourcentage de pixels concernés, ainsi que la surface. Ici, <b>vous pouvez ne cocher que la case du rapport de classification</b>.</li>
  					 <li class="espace">En cochant la case <em>sauvegarder les fichiers temporaires</em>, vous obtiendrez également un raster pour chacun des ROI utilisés, plus un raster &#171;&nbsp;général&nbsp;&#187;&nbsp;; voir <a class="ext" target="_blank" href="https://semiautomaticclassificationmanual.readthedocs.io/fr/latest/classificationTab.html#classification-output-1" >la documentation (Save algorithm files)</a> pour plus d'informations.</li>
  					</ul>
  					
  					<p>Cliquez sur le bouton <b>Lancer</b>. Choisissez un emplacement et un nom pour le fichier geotiff qui sera créé.</p>
  					<p class="note">Il est possible que le fichier créé n'ait pas d'extension dans son nom&nbsp;; dans ce cas, ajoutez-lui l'extension <em>.tif</em> manuellement dans votre explorateur de fichier, pour qu'il soit bien reconnu comme un fichier geotiff.</p>
			   </div>
			   
			   <p>L'image correspondant au résultat de la classification est chargée dans QGIS. Dans cette image, chaque pixel a une valeur correspondant à une des classes utilisées. Ici, ces valeurs vont de 1 à 4 car nous avons basé notre classification sur 4 macro-classes.</p>
			   
			   <div class="manip">
			     <p>Pour mieux voir ce résultat, il est possible de <b>modifier le style</b> de cette couche. Rendez-vous dans ses propriétés &#8594; Symbologie&nbsp;: vous pouvez modifier la <b>couleur</b> de chaque classe et son <b>étiquette</b> en double-cliquant dessus (oui, il est possible de mettre des caractères accentués dans les étiquettes&nbsp;!)&nbsp;:</p>
			     <figure>
  						<a href="illustrations/12_04_classif_res_style.jpg" >
  							<img src="illustrations/12_04_classif_res_style.jpg" alt="Fenêtre des propriétés du geotiff créé avec la classification, rubrique style, avec des couleurs 'classiques' : bleu pour l'eau, vert foncé pour la végétation arborée, vert clair pour la végétation rase, jaune pour le sol nu, et des étiquettes correspondant aux noms des classes." width="500">
  						</a>
  					</figure>
  					<p>pour un résultat qui doit ressemble à ceci (ce résultat dépendra de vos ROI&nbsp;!)&nbsp;:</p>
  					<figure>
  						<a href="illustrations/12_04_classif_res.jpg" >
  							<img src="illustrations/12_04_classif_res.jpg" alt="Résultat de la classification, avec l'eau en bleu, la végétation arborée en vert foncé, la végétation rase en vert clair et le sol nu en jaune" width="600">
  						</a>
  					</figure>
  					<p class="keskonfai">Alors là, j'ai un truc assez différent du cours, j'ai dû mal choisir mes ROI !!</p>
  					<p>Vous pouvez également ouvrir le rapport de classification avec un tableur, ce fichier CSV a été créé au même endroit que l'image avec le suffixe <em>_report</em> (le délimiteur est la tabulation)&nbsp;:</p>
  					<figure>
  						<a href="illustrations/12_04_rapport_classif.jpg" >
  							<img src="illustrations/12_04_rapport_classif.jpg" alt="Rapport de classification : tableau avec 4 colonnes Class, PixelSum, Percentage % et Area [metre^2], et 4 lignes pour les 4 classes" width="400">
  						</a>
  					</figure>
  					<p>On peut y lire par exemple que la classe 3 (végétation rase) rassemble un peu plus de 35% des pixels de l'image. Bien sûr, vos résultats seront sûrement un peu différents&nbsp;!</p>
			   </div>
			  
			  <h3>Interprétation des résultats et mise en page<a class="headerlink" id="XII45" href="#XII45"></a></h3>
			  
			   <p class="keskonfai">A faire !!</p>
			  
			  <br>
        <p>Vous êtes arrivé.e au bout de ce tutoriel. Si vous le suivez depuis le début, bravo pour votre patience, et sinon bravo également&nbsp;!</p>
        <div class="question">
      		<input type="checkbox" id="faq-3">
      		<p><label for="faq-3">C'est le bon moment pour une petite chorégraphie&nbsp;:</label></p>
      		<p class="reponse"><img src="https://media.giphy.com/media/DhstvI3zZ598Nb1rFf/giphy-downsized.gif"></p>
      	</div></p>	
		    
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
