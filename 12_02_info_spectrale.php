<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		
		<div class="main">
		  <h1 class="hide_for_pdf">XII.  Télédétection</h1>
			<h2>XII.2  Extraction de l'information spectrale</h2>
				
				<ul class="listetitres">
  					<li><a href="#XII21">Extraction de signature spectrale</a>
  					 <ul class="listesoustitres">
  					   <li><a href="#XII21a">Définition du jeu de bandes en entrée dans l'extension SCP</a></li>
  					   <li><a href="#XII21b">Création des polygones d'entraînement (ROI)</a></li>
  					   <li><a href="#XII21c">Affichage des signatures spectrales</a></li>
  					 </ul>
  					</li>
  					<li><a href="#XII22">Interprétation de signature spectrale</a></li>
  					<li><a href="#XII23">Extraction et analyse d'indices spectraux</a>
  					  <ul class="listesoustitres">
  							<li><a href="#XII23a">Indice de végétation NDVI</a></li>
  							<li><a href="#XII23b">Interprétation du NDVI</a></li>
  							<li><a href="#XII23c">Normalized Burn Ratio (NBR)</a></li>
  							<li><a href="#XII23d">Interprétation du NBR</a></li>
  						</ul>
  					</li>
  				</ul>
  				<br>
  				
  				<p>Les objectifs de ce chapitre sont les suivants&nbsp;:</p>
  				
  				<ul>
  				  <li>Extraire les <b>signatures spectrales</b> d’objets géographiques sur une image satellitaire</li>
  				  <li><b>Interprétez</b> vos signatures spectrales</li>
  				  <li>Extraire et analyser des <b>indices spectraux</b> : <b>NDVI</b> (Normalized Difference Vegetation Index) et <b>NBR</b> (Normalized Burn Ratio)</li>
  				</ul>
  				
  				<h3>Extraction de signature spectrale<a class="headerlink" id="XII21" href="#XII21"></a></h3>
  				
  				  <h4>Ajout de l'image via l'extension SCP<a class="headerlink" id="XII21a" href="#XII21a"></a></h4>
  				
  				  <div class="manip">
  				    <p>Ouvrez un nouveau projet QGIS.</p>
  				    <p><img class="icone" src="illustrations/12_01_jeu_bandes_icone.jpg" alt="icône bandset de l'extension SCP" >Cliquez sur l'icône <b>band set</b> du panneau SCP (ou bien menu SCP &#8594; Band set).</p>
  				    <p><img class="icone" src="illustrations/12_02_openfile_icone.jpg" alt="icône 'open a file' du plugin SCP" >Dans la fenêtre de définition du jeu de bandes, cliquez sur l'icône en haut à droite pour ajouter une image, et sélectionnez l'image <em class="data"><a href="donnees/TutoQGIS_12_teledetection.zip">Sentinel2_2021_08_17.tif</a></em>.</p>
  				    <p>Dans la liste déroulante <b>Wavelength</b> en bas de la fenêtre, sélectionnez <b>Sentinel-2</b> pour que les longueurs d'onde soient bien reconnues.</p>
  				    <p><img class="icone" src="illustrations/12_02_rgb_icone.jpg" alt="icône 'RGB composite' du plugin SCP" >Enfin, sélectionnez le jeu de bande puis cliquez sur l'icône en bas <b>RGB composite</b> pour afficher l'image dans QGIS.</p>
  				    <p class="note">Ces étapes sont décrites plus en détail <a href="12_01_intro_teledec.php#XII14" >au chapitre précédent</a>&nbsp;! Pour en savoir plus sur cette image, voir également au <a href="12_01_intro_teledec.php" >chapitre précédent</a>.</p>
  				  </div>
  				  
  				  <p>L'extension SCP est maintenant paramétrée pour travailler sur notre image, qui est reconnue comme une image Sentinel-2.
  				  
  				  <p>Nous allons ici digitaliser (dessiner) des polygones dans des zones avec différents types d'occupation du sol (eau, urbain, forêt...), afin de voir ensuite la signature spectrale de chacune de ces classes.</p>
  				  <p>Ces polygones sont souvent nommés <b>ROI</b> en télédétection pour &#171;&nbsp;Region Of Interest&nbsp;&#187;.</p>
  				  
      				<div class="manip">
      					<p>La dernière chose à faire avant de commencer à dessiner les polygones d'entraînement est de choisir une <a href="12_01_intro_teledec.php#XII15b">composition colorée</a> permettant de bien voir les différentes catégories d'occupation du sol. Ici, afin de bien voir la végétation, les zones brûlées et les feux, nous allons afficher les <b>bandes 13, 8 et 4</b> (propriétés de la couche &#8594; symbologie)&nbsp;:</p>
      					<figure>
                  	<a href="illustrations/12_02_compocol_13_8_4.jpg" >
                		<img src="illustrations/12_02_compocol_13_8_4.jpg" alt="Composition colorée 13-8-4 de l'image Sentinel 2 : la végétation est en vert, les zones brûlées en rouge" width="600">
                	</a>
                </figure>
    				  </div>
    				  
    				  <p>Nous allons pouvoir dessiner nos ROI&nbsp;!</p>
    				  
    				<h4>Création des polygones d'entraînement (ROI)<a class="headerlink" id="XII21b" href="#XII21b"></a></h4>
    				
    				  <p>Nous allons créer ici une couche de polygones d'entraînement. Si vous désirez sauter cette étape, ou bien comparer vos résultats, vous trouverez également en téléchargement la couche de ROI "prête à l'emploi" <em class="data"><a href="donnees/TutoQGIS_12_teledetection.zip">ROI_S2_2021_08_17.scpx</a></em>.</p>
  				    
  				    <p>Attention, <b>les couches de ROI ont l'extension SCP avec la version 7 de l'extension SCP, et l'extention SCPX avec la version 8</b>. Dans les données du tutoriel, vous trouverez les 2 versions.</p>
  				    
    				  <div class="manip">
    				    <p>Dans le panneau SCP (s'il n'est pas visible, menu Vue &#8594; Panneaux &#8594; Menu SCP), cliquez sur l'onglet vertical <b>Training input</b>&nbsp;:</p>
    				    <figure>
      						<a href="illustrations/12_02_entree_rois.jpg" >
      							<img src="illustrations/12_02_entree_rois.jpg" alt="onglet 'entrée données d'entrainement' du panneau SCP" width="350">
      						</a>
      					</figure>
      					<p><img class="icone" src="illustrations/12_02_ouvrir_roi_icone.jpg" alt="icône ouvrir un jeu d'entrainement dans le panneau SCP" >Cliquez sur l'icône <b>Créer une nouvelle donnée d'entraînement</b> en haut du panneau SCP. Choisir l'emplacement et le nom de la couche SCP qui sera créée et qui contiendra les ROIs.</p>
      					<p>Cette couche est ajoutée à QGIS (ici, elle se nomme <b>ROI_S2_2021_08_17</b>)&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_couche_rois.jpg" >
      							<img src="illustrations/12_02_couche_rois.jpg" alt="liste des couches dans QGIS, avec l'image sentinel-2 et la couche scp" width="250">
      						</a>
      					</figure>
      					<p class="note">Cette couche semble une couche temporaire (icône grise à côté de son nom), mais il s'agit bien d'une couche sauvegardée sur votre disque, comme vous pouvez vous en assurer dans votre explorateur de fichiers. Elle possède l'extension .scp avec la version 7 de SCP ou .scpx avec la version 8 de SCP.</p>
    				  </div>
    				  
    				  <p>Nous allons maintenant ajouter des polygones dans cette couche&nbsp;!</p>
    				  
    				  <div class="manip">
    				    <p>Tout d’abord, dans le bas du panneau SCP, écrire le type d’objet géographique que l’on souhaite digitaliser, par exemple :</p>
    				    <ul>
      					 <li>Nom de MC : Surface en eau</li>
      					 <li>Nom de C : Eau</li>
      					</ul>
    				    <figure>
      						<a href="illustrations/12_02_noms_rois.jpg" >
      							<img src="illustrations/12_02_noms_rois.jpg" alt="Nom de MC et Nom de C remplis par 'Surface en eau' et 'Eau'" width="350">
      						</a>
      					</figure>
      					<p>MC signifie <em>Macro-Classe</em>, et C <em>Classe</em> : une macro-classe peut regrouper plusieurs classes (par exemple, on pourrait avoir une macro-classe <em>surface en eau</em> et 2 classes <em>eau douce</em> et <em>mer</em>).</p>
      					<p>Il ne reste plus maintenant qu'à digitaliser un polygone correspondant à cette classe.</p>
      					<p><img class="icone" src="illustrations/12_02_create_roi_icon.jpg" alt="icône de création de ROI">Cliquez sur l'icône <b>Create a ROI polygon</b> dans la barre d'outil <b>SCP working toolbar</b>.</p>
      					<p class="note">Si vous ne voyez pas cette barre d'outils, menu Vue &#8594; Barres d'outils &#8594; SCP Working Toolbar.</p>
      					<figure>
      						<a href="illustrations/12_02_working_toolbar.jpg" >
      							<img src="illustrations/12_02_working_toolbar.jpg" alt="SCP working toolbar avec l'outil de création de ROIs entouré en rouge" width="500">
      						</a>
      					</figure>
      					<p>Le curseur est maintenant une croix. Dans QGIS, zoomez sur une zone avec de l'eau et dessinez un polygone contenant uniquement de l'eau, en faisant un clic droit pour terminer (contrairement à la numérisation dans QGIS, le clic droit final est pris en compte)&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_roi_eau.jpg" >
      							<img src="illustrations/12_02_roi_eau.jpg" alt="ROI temporaire eau, orange transparent" width="400">
      						</a>
      					</figure>
      					<p>Ce ROI est temporaire&nbsp;; s'il ne vous convient pas, dessinez-en simplement un autre et le premier sera supprimé.</p>
      					<p>Une fois satisfait-e de votre ROI, cliquez sur le bouton en bas à droite du panneau SCP <b>Sauvez les ROI temporaires dans les données d'entraînement</b>&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_sauver_roi_icone.jpg" >
      							<img src="illustrations/12_02_sauver_roi_icone.jpg" alt="bas du panneau SCP avec l'icône pour sauver les ROIs entourée en rouge" width="350">
      						</a>
      					</figure>
      					<p class="note">Si le calcul de la signature est trop long, vous pouvez décocher la case <b>Signature</b> pour les calculer ultérieurement.</p>
      					<p>Patientez... Le ROI est ajouté dans le haut du panneau SCP&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_roi_ajoute.jpg" >
      							<img src="illustrations/12_02_roi_ajoute.jpg" alt="haut du panneau SCP avec le 1er ROI visible" width="350">
      						</a>
      					</figure>
      					<p>Il a aussi changé d'aspect dans la fenêtre de QGIS&nbsp;:</p>
                <figure>
      						<a href="illustrations/12_02_roi_definitif.jpg" >
      							<img src="illustrations/12_02_roi_definitif.jpg" alt="fenêtre de QGIS : ROI sauvegardé, en noir avec contour en pointillés blancs" width="400">
      						</a>
      					</figure>
    				  </div>
    				  
    				  <p>Une couleur par défaut lui est attribuée. Cependant, dans la fenêtre de QGIS, il est représenté en noir avec un contour en pointillés blanc. En fait, il est représenté suivant le style de la couche de signatures spectrales, que vous pouvez modifier comme pour n'importe quelle couche (double clic sur son nom &#8594; Symbologie). Les couleurs du panneau SCP seront quant à elles utilisées pour les graphiques, comme nous allons le voir très bientôt&nbsp;!</p>
    				  
    				  <div class="manip">
    				    <p>De la même manière, digitalisez un polygone pour chacune des macro-classes suivantes&nbsp;:</p>
    				    <ul>
    				      <li>Surface bâtie</li>
    				      <li>Surface en forêt</li>
    				      <li>Surface en culture</li>
    				      <li>Surface brulée</li>
    				      <li>Feux</li>
    				    </ul>
    				    <p class="note">N'oubliez pas d'incrémenter l'ID de la macro-classe (MC ID) à chaque nouveau polygone&nbsp;! Sinon, il est possible de le faire par la suite en double-cliquant sur la case à modifier, puis en tapant un chiffre. L'ID de la classe (C ID) peut rester à 1, nous ne créerons à chaque fois qu'une seule classe par macro-classe.</p>
    				    
    				    <p class="note">Pensez à sauvegarder après chaque polygone, si vous décochez "signature" la sauvegarde sera plus rapide&nbsp;!</p>
    				    
    				    <p>Au final, votre panneau SCP doit ressembler à ceci&nbsp;:</p>
    				    <figure>
      						<a href="illustrations/12_02_liste_rois.jpg" >
      							<img src="illustrations/12_02_liste_rois.jpg" alt="panneau SCP avec les 6 ROIs correspondant aux 6 classes définies + haut" width="450">
      						</a>
      					</figure>
      					<p>Vous pouvez modifier les couleurs attribuées aux macro-classes et classes en double-cliquant sur le carré de couleur.</p>
      				</div>
  
     					<p>Nous allons maintenant afficher les signatures spectrales de nos ROIs.</p>
     					
     				<h4>Affichage des signatures spectrales<a class="headerlink" id="XII21c" href="#XII21c"></a></h4>
    				
      				<div class="manip">
      				  <p><img class="icone" src="illustrations/12_02_signature_spectrale_icone.jpg" alt="icône d'ajout des singatures spectrales au graphique"> Sélectionnez par exemple un polygone par classe, puis cliquez sur l'icône <b>Ajouter les signatures spectrales surlignées au graphique</b> dans la partie gauche du panneau&nbsp;:</p>
      				  <figure>
      						<a href="illustrations/12_02_selection_rois.jpg" >
      							<img src="illustrations/12_02_selection_rois.jpg" alt="panneau SCP avec les 6 classes sélectionnées et le bouton de signature spectrale entouré en rouge" width="450">
      						</a>
      					</figure>
      					<p>La fenêtre suivante s'ouvre (cliquez si vous voulez la voir en plus grand)&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_graphique_signatures.jpg" >
      							<img src="illustrations/12_02_graphique_signatures.jpg" alt="Fenêtre du graphique des signatures spectrales, pour chacune des 6 classes" width="600">
      						</a>
      					</figure>
      					<p>La signature spectrale de chacune des 6 classes est représentée sous forme d'un graphique, de la couleur spécifiée dans le panneau SCP. Testez les différentes possibilités, par exemple&nbsp;:</p>
      					<ul>
      					 <li>cochez/décochez une ligne dans le tableau en haut de la fenêtre pour afficher/masquer une courbe</li>
      					 <li>cochez/décochez la case <em>étendue des valeurs du graphique</em> ou <em>Plot value range</em> en bas de la fenêtre pour voir l'amplitude des signatures spectrales</li>
      					</ul>
    				  </div>
    				  
    				  <p>Tous vos polygones sont sauvegardés dans la couche au format SCP <em class="data">ROI_S2_2021_08_17</em> (ou le nom que vous lui avez donné). Il est possible de charger une couche SCP au moyen du bouton <b>Ouvrir un fichier de données d'entraînement</b>.</p>
    				  <figure>
    						<a href="illustrations/12_02_charger_rois.jpg" >
    							<img src="illustrations/12_02_charger_rois.jpg" alt="haut du panneau SCP, onglet 'entrée données d'entraînement', avec le bouton 'ouvrir un fichier de données d'entraînement' entouré en rouge" width="420">
    						</a>
    					</figure>
    					
    					<p>Vous pouvez par exemple charger la couche de polygones d'entraînement <em class="data"><a href="donnees/TutoQGIS_12_teledetection.zip">ROI_S2_2021_08_17.scpx</a></em>.</p>
  				  
  				<h3>Interprétation de signature spectrale<a class="headerlink" id="XII22" href="#XII22"></a></h3>
  				
  				  <p>Les signatures spectrales sont représentées sur un graphique avec en abscisse les bandes spectrales (ici les 13 bandes spectrales de Sentinel-2) et en ordonnée les valeurs de pixels (en réflectance au sol entre 0 et 1 ou 0 et 100%). Nous représentons ici les signatures spectrales de 6 classes d’occupation des sols :</p>
  				  <ol>
              <li>surface en eau</li>
              <li>surface bâtie</li>
              <li>surface en forêt</li>
              <li>surface en culture</li>
              <li>surface brûlée</li>
              <li>feux</li>
            </ol>

  				  <p>Pour chaque bande, on représente la moyenne de valeurs de pixels extrait pour chaque ROI (Region of Interest). Ainsi, pour les <b>surfaces en eau</b>, représentée par une courbe bleue sur le graphique, nous avons des valeurs moyennes de réflectance très faibles quelle que soit la longueur d’onde, la signature spectrale de l’eau correspond ainsi à une ligne décroissante (plus forte valeur de réflectance dans le bleu et les plus faibles dans l’infrarouge).</p>
  				  <p>La signature spectrale des <b>cultures</b> est typique de celle de la végétation caractérisée par une forte activité chlorophyllienne (culture certainement irriguée car l’image a été prise durant l’été dans le sud de la France) qui se traduit par de fortes réflectances dans le PIR (entre 30 et 35%).</p>
  				  <p>Les <b>surfaces brûlées</b>, ici en rouge sur le graphique, sont caractérisés par des valeurs homogènes (autour de 10 % de réflectance) du bleu jusqu’au PIR (bande 9). En revanche, les valeurs de réflectance dans les bandes 12 et 13 (Infrarouge moyen) sont plus importantes (autour de 20 – 25 %), typique d’une réflectance d’une surface brûlée. Comme pour les autres classes d’occupation des sols, les bandes d’absorption de l’eau (Bande 10 et 11) sont caractérisées par de très faibles valeurs de réflectance, elles sont utilisées pour les corrections atmosphériques (cf. Lien CNES pour plus d’informations sur les modèles de correction atmosphérique).</p>
  				  <p>Concernant les <b>feux</b>, les valeurs de réflectance dans l’infrarouge moyen sont très importantes, certains pixels dans la bande 13 saturent à 1, soit 100 % de réflectance. Cette bande spectrale apparaît ainsi particulièrement pertinente pour la détection et la localisation des feux en cours.</p>
  				
  				<h3>Extraction et analyse d'indices spectraux<a class="headerlink" id="XII23" href="#XII23"></a></h3>
  				
  				  <h4>Indice de végétation NDVI<a class="headerlink" id="XII23a" href="#XII23a"></a></h4>
  				  
  				    <p>L'indice de végétation ou <a class="ext" target="_blank" href="https://en.wikipedia.org/wiki/Normalized_difference_vegetation_index">NDVI (Normalized Difference Vegetation Index)</a> permet de mesurer et spatialiser le taux de couverture de la végétation au sol ainsi que son activité chlorophyllienne.</p>
  				    <p>Il se calcule à partir des bandes Proche Infra-Rouge (PIR) et Rouge (R) de la manière suivante&nbsp;:</p>
  				    <p class="code">NDVI = (PIR - R) / (PIR + R)</p>
  				    <p>Ici, nous allons calculer cet indice de 2 manières différentes : avec l'extension SCP, et avec la calculatrice raster de QGIS.</p>
  				    
  				    <p>Voici tout d'abord comment calculer le NDVI avec SCP&nbsp;:</p>
  				    
  				    <div class="manip">
  				      <p>Ouvrez un nouveau projet QGIS, chargez la couche <em class="data"><a href="donnees/TutoQGIS_12_teledetection.zip">Sentinel2_2021_08_17.tif</a></em> <a href="12_02_info_spectrale.php#XII21a">en utilisant l'extension SCP</a> (définition du jeu de bandes).</p>
      					
      					<p>Vous pouvez maintenant aller dans la partie <b>Calcul de bande (Band calc)</b> de SCP, les bandes de notre raster seront listées dans le tableau en haut de la fenêtre. Si ça n'est pas le cas, utilisez le bouton <b>Actualiser</b> à droite de la liste des bandes.</p>
      					<figure>
      						<a href="illustrations/12_02_calcul_bandes.jpg" >
      							<img src="illustrations/12_02_calcul_bandes.jpg" alt="SCP, calcul de bandes, liste des bandes en haut de la fenêtre entourée de rouge" width="600">
      						</a>
      					</figure>
  				    </div>
  				    
  				    <p>Contrairement à ce qu'on aurait pu penser, il n'y a pas 13 bandes dans ce tableau mais 60&nbsp;! Pourquoi&nbsp;? Sont listées dans cet outil&nbsp;:</p>
  				    <ul>
  				      <li>les 13 bandes du jeu de bandes 1, sous la forme bandset1b1, bandset2b2 etc. (lignes 1 à 13)</li>
  				      <li>les 13 bandes du jeu de bande actuel (donc identiques à celles ci-dessus), sous la forme bandset#b1, bandset#b2 etc. (lignes 14 à 26)</li>
  				      <li>bandset#b*&nbsp;: toutes les bandes du jeu de bande actuel (toutes les bandes de l'image Sentinel-2) (ligne 27)</li>
  				      <li>à nouveau les 13 bandes du jeu de bande actuel, sous la forme bandset#b1, bandset#b2 etc. (lignes 28 à 40)</li>
  				      <li>si les longueurs d'onde sont bien renseignées pour le jeu de bande, un moyen rapide d'accéder aux bandes bleu, vert, rouge, PIR et SWIR (#BLUE#, #GREEN#...) (lignes 41 à 46)</li>
  				      <li>bandset1b*&nbsp;: toutes les bandes du jeu de bande 1, ici équivalent à bandset#b* (ligne 47)</li>
  				      <li>à nouveau les 13 bandes du jeu de bandes 1, sous la forme bandset1b1, bandset2b2 etc. (lignes 48 à 60)</li>
  				    </ul>
  				    <p class="note">Certains items sont répétés, pouquoi ? Mystère !</p>
  				    <p>Certaines de ces &#171;&nbsp;bandes&nbsp;&#187; sont donc en réalité des listes de bandes et pourront être utilisées dans des expressions acceptant ces listes.</p>
  				    <p><b>Ici, nous utiliserons uniquement les 13 premiers éléments de la liste correspondant aux 13 bandes de notre image&nbsp;!</b></p>
  				    
  				    <div class="manip">
      						<a href="illustrations/12_02_scp_ndvi.jpg" >
      							<img class="droite" src="illustrations/12_02_scp_ndvi.jpg" alt="SCP, calcul de bandes, partie Fonctions : NDVI" width="230">
      						</a>
      					<p>Dans la partie <b>Fonctions</b> à droite de la fenêtre, descendez pour arriver jusqu'à la rubrique <b>Indices</b> et double-cliquez sur <b>NDVI</b>.</p>
      					<p>La formule suivante s'affiche dans la partie <b>Expression</b>&nbsp;:</p>
      					<p class="code">( "#NIR#" - "#RED#" ) / ( "#NIR#" + "#RED#" ) @NDVI</p>
      					<p>Dans cette formule, <b>@NDVI</b> sera le nom de la couche temporaire qui sera créée. Si vous désirez enregistrer cette couche, il faut enlever cette partie&nbsp;:</p>
      					<p class="code">( "#NIR#" - "#RED#" ) / ( "#NIR#" + "#RED#" )</p>
      					<p>Vous pouvez également choisir de taper la formule du NDVI &#171;&nbsp;à la main&nbsp;&#187; en double-cliquant sur les bandes dans la partie haute de la fenêtre&nbsp;:</p>
      					<p class="code">("bandset1b8"-"bandset1b4")/ ("bandset1b8"+"bandset1b4") @NDVI</p>
      					<p class="note">Le résultat sera le même en utilisant <em>bandset#b8</em> et <em>bandset#b4</em> à la place de <em>bandset1b8</em> et <em>bandset1b4</em>...</p>
      					<p><img class="icone" src="illustrations/12_02_ndvi_lancer_icone.jpg" alt="bouton Lancer en bas à droite du panneau SCP" >Pour lancer le calcul du NDVI, cliquez sur le bouton <b>Lancer</b> en bas à droite de la fenêtre.</p>
      					
      					<p>Une nouvelle fenêtre s'ouvre pour vous demander l'emplacement où enregistrer la couche qui sera créee. <b>Attention, si votre formule se termine par @NDVI par exemple, la couche ne sera en réalité pas enregistrée, seule une couche temporaire sera générée&nbsp;!</b></p>
      					<p>Patientez... Le nouveau raster est ajouté à QGIS&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_resultat.jpg" >
      							<img src="illustrations/12_02_ndvi_resultat.jpg" alt="image NDVI" width="500">
      						</a>
      					</figure>
      				</div>
      				
      				<p>Bravo, vous venez de calculer un indice de végétation avec l'extension SCP&nbsp;!</p>
  				    
  				    <p>On peut également calculer le NDVI sans utiliser l'extension SCP, directement dans QGIS, à l'aide de la <b>calculatrice raster</b>.</p>
  				    
  				    <div class="manip">
  				      <p>Dans la boîte à outils &#8594; Analyse raster &#8594; Raster Calculator&nbsp;:</p>
  				      <figure>
      						<a href="illustrations/12_02_ndvi_rastercalc.jpg" >
      							<img src="illustrations/12_02_ndvi_rastercalc.jpg" alt="calcul du NDVI dans la calculatrice raster" width="600">
      						</a>
      					</figure>
      					<ul>
      					 <li class="espace">Dans <b>Expressions prédéfinies</b>, sélectionnez <b>NDVI</b> puis cliquez sur <b>Ajouter...</b> pour sélectionner les bandes rouges et proche infra-rouges</li>
      					 <li class="espace">Dans la case <b>Expression</b>, la formule est maintenant la suivante : <em>(Sentinel2_2021_08_17@8 - Sentinel2_2021_08_17@4) / (Sentinel2_2021_08_17@8 + Sentinel2_2021_08_17@4)</em></li>
      					 <li class="espace">Dans <b>Reference layer(s)</b>, cliquez sur les <b>...</b> à droite et sélectionnez l'image Sentinel, pour que la couche NDVI en sortie aie la même emprise, résolution et SCR</li>
      					 <li class="espace">Dans <b>Output</b> en bas de la fenêtre, laissez la valeur par défaut <b>Enregistrer dans un fichier temporaire</b></li>
      					</ul>
      					<p>Exécutez... La couche temporaire est ajoutée à QGIS, elle est similaire à celle créée avec SCP.</p>
  				    </div>
      					
      					
      			<h4>Interprétation du NDVI<a class="headerlink" id="XII23b" href="#XII23b"></a></h4>
      			
      			   <p>Le NDVI est un indice normalisé développé en 1973 par <a class="ext" target="_blank" href="https://ntrs.nasa.gov/citations/19740022614">Rouse <i>et al.</i> (1973)</a> qui vise à étudier et spatialiser la végétation que l’on peut détecter sur une image satellitaire. Pour rappel, il est calculé de la façon suivante :</p>
      			   
                <p class="code">NDVI = (Bande du Proche Infrarouge – Bande du Rouge) / (Bande du Proche Infrarouge + Bande du Rouge)</p>
      			
      			   <p>Les valeurs du NDVI en sortie sont donc comprises entre – 1 et +1, elles peuvent être interprétées de la façon suivante (à nuancer bien évidemment selon la date de prise de vue des images, du cycle phénologique de la végétation étudiée, etc.) :</p>
      			   <ul>
                <li><b>valeurs entre -1 et 0 :</b> pixels caractérisés par une valeur de réflectance dans l’image de la bande spectrale du rouge supérieure à la valeur de réflectance de la bande spectrale du Proche Infrarouge, cela concerne essentiellement les surfaces en eau et certains types de surfaces en sol nu (sable, certains types de bâti) </li>
                <li><b>valeurs autour de 0 (entre 0 et 0.2):</b> pixels caractérisés par une valeur de réflectance dans l’image de la bande spectrale du rouge égale (ou presque) à celle de la bande spectrale du Proche Infrarouge, cela concerne essentiellement les surfaces en sol nu avec peu de végétation</li>
                <li><b>valeurs supérieures à 0.2 :</b> pixels caractérisés par une valeur de réflectance dans l’image de la bande spectrale du rouge supérieure à la valeur de réflectance de labande spectrale du Proche Infrarouge, cela concerne essentiellement les surfaces en eau et certains types de surfaces en sol nu (sable, certains types de bâti)</li>
               </ul>
      					
      					<p>Dans les propriétés de la couche, on peut voir l'histogramme des valeurs du NDVI&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_histogramme.jpg" >
      							<img src="illustrations/12_02_ndvi_histogramme.jpg" alt="image NDVI" width="650">
      						</a>
      					</figure>
      					
      					<p>Sur cet histogramme de l’image NDVI, nous pouvons identifier 3 modes :</p>
      					<ul>
      					 <li>le premier mode avec des valeurs de pixels compris entre -0.2 et 0 correspondant aux <b>surfaces en eau</b></li>
      					 <li>le second mode avec des valeurs entre 0 et 0.2 correspond aux <b>surfaces avec pas ou peu de végétation</b> (surfaces brûlées, sol nu, surfaces bâties…)</li>
      					 <li>le troisième avec des valeurs entre 0.2 et 1 caractérise le <b>gradient de la présence de végétation</b> (0.2 correspondant aux pixels avec un faible taux de couverture de végétation et 0.9, une valeur de NDVI correspondant à un fort taux de couverture de la végétation au sol et une forte activité chlorophyllienne.</li>
      					</ul>
      					
      					<p>Une carte permet de spatialiser ce NDVI. Pour mieux le visualiser, on peut utiliser une gamme de couleur allant du rouge au vert, en choisissant le type de rendu <b>Pseudo-couleur à bande unique</b>&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_style.jpg" >
      							<img src="illustrations/12_02_ndvi_style.jpg" alt="style pseudo-couleur de -1 à 1 avec la galle RdYlGn pour le NDVI" width="500">
      						</a>
      					</figure>
      					
      					<p>Ce qui permet d'observer&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_rdylgn.jpg" >
      							<img src="illustrations/12_02_ndvi_rdylgn.jpg" alt="image NDVI du rouge (-1) au vert (1)" width="650">
      						</a>
      					</figure>
      					<p>Les teintes en orange foncé correspondent aux surfaces en eau, on remarque également au sud-est de l’image la plage qui ressort en rouge. Au centre de l’image, les surfaces brûlées sont bien identifiables. Les surfaces en vert clair et foncé correspondent aux pixels avec des taux de végétation plus ou moins forts. </p>
      					
  				    
  				  <h4>Normalized Burn Ratio (NBR)<a class="headerlink" id="XII23c" href="#XII23c"></a></h4>
  				  
  				    <p>L'<a class="ext" target="_blank" href="https://un-spider.org/advisory-support/recommended-practices/recommended-practice-burn-severity/in-detail/normalized-burn-ratio">indice normalisé des surfaces brûlées</a> (Normalized Burn Ratio ou NBR) est un indice normalisé qui vise à étudier et spatialiser les feux que l’on peut détecter sur une image satellitaire.</p>
  				    <p>De la même manière que le NDVI, c'est un ratio basé sur 2 bandes, mais cette fois il s'agit des bandes <b>Proche Infra-Rouge (PIR)</b> et <b>Infra-Rouge Court (SWIR)</b> :</p>
  				    <p class="code">NBR = (NIR - SWIR) / (NIR + SWIR)</p>
  				    
  				    <figure>
      						<a href="illustrations/12_02_nbr.jpg" >
      							<img src="illustrations/12_02_nbr.jpg" alt="graphique NBR, réflectance en fonction de la longueur d'onde" width="500">
      						</a>
      						<figcaption>Source: U.S. Forest service.</figcaption>
      					</figure>
  				    
  				    <p><em>Comme indiqué sur le site <a class="ext" target="_blank" href="https://un-spider.org/advisory-support/recommended-practices/recommended-practice-burn-severity/in-detail/normalized-burn-ratio" >UN-SPIDER Knowledge Portal</a></em>&nbsp;:</p>
  				    
  				    <p>Cet indice est basé sur le fait que la végétation saine a une forte réflectance dans le PIR et une faible réflectance dans le SWIR, à l'inverse de la végétation brûlée.</p>
  				    
  				    <p>Comme pour le NDVI, les valeurs du NBR varient de -1 à 1. Une valeur élevée indique une végétation saine, une valeur faible indique du sol nu et des zones récemment brûlées.</p>
  				    
  				    <div class="manip">
  				      <p>De la même manière que vous avez calculé le NDVI, à vous de <b>calculer le NBR</b>, avec l'extension SCP et/ou avec la calculatrice raster&nbsp;!</p>
  				      <p>Vous devez obtenir un résultat similaire à ceci&nbsp;:</p>
  				      <figure>
      						<a href="illustrations/12_02_nbr_resultat.jpg" >
      							<img src="illustrations/12_02_nbr_resultat.jpg" alt="image NBR" width="500">
      						</a>
      						<figcaption>Ici, les valeurs élevées sont représentées en blanc et les valeurs faibles en noir.</figcaption>
      					</figure>
  				    </div>
  				    
  				  <h4>Interprétation du NBR<a class="headerlink" id="XII23d" href="#XII23d"></a></h4>
  				  
  				    <p>Pour rappel&nbsp;:</p>
  				    <p class="code">NBR = (NIR - SWIR) / (NIR + SWIR)</p>
  				    <p>Les valeurs du NBR en sortie sont donc comprises entre – 1 et +1, elles peuvent être interprétées de la façon suivante&nbsp;:</p>
  				    <ul>
  				      <li class="espace"><b>valeurs entre -1 et -0.7</b>&nbsp;: pixels caractérisés par une valeur de réflectance dans l’image de la bande spectrale l’Infrarouge Moyen supérieure à la valeur de réflectance de la bande spectrale du Proche Infrarouge, cela concerne essentiellement les feux en cours caractérisés par des valeurs de réflectance très fortes dans l’IRM (2.2 µm) et très faibles dans le PIR</li>
  				      <li class="espace"><b>valeurs entre -0.7 et -0.3</b>&nbsp;: pixels caractérisant les surfaces brûlées</li>
  				      <li class="espace"><b>valeurs supérieures à -0.3</b>&nbsp;: pixels correspondant à des surfaces non brulées</li>
  				    </ul>
  				    
  				    <figure>
    						<a href="illustrations/12_02_nbr_rdylgn.jpg" >
    							<img src="illustrations/12_02_nbr_rdylgn.jpg" alt="image NBR du rouge (-1) au vert (1)" width="650">
    						</a>
    					</figure>
  				    
  				    <p>Ici, les teintes en rouge correspondent aux feux en cours à l’heure de prise de vue, ce qui s’avère une source d’information très utile pour les acteurs impliqués dans la gestion des forêts. Les teintes en orange correspondent aux surfaces brûlées qui sont localisées au centre de l’image.</p>
  				    
  				    <p>Dans le chapitre suivant, nous verrons comment <b>classifier</b> une image pour obtenir des catégories d'occupation du sol, de manière non supervisée.</p>


				<br>
				<a class="prec" href="12_01_intro_teledec.php">chapitre précédent</a>
				<a class="suiv" href="12_03_classif_nonsup.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>b1
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
