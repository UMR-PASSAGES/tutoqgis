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
  							<li><a href="#XII23b">Normalized Burn Ratio (NBR)</a></li>
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
  				
  				  <div class="manip">
  				    <p>Ouvrez un nouveau projet QGIS. Ajoutez-y la couche raster <em class="data"><a href="donnees/TutoQGIS_12_Teledetection">Sentinel2_2021_08_17.tif</a></em>.</p>
  				    <p class="note">Pour en savoir plus sur cette image, voir le <a href="12_01_intro_teledec.php" >chapitre précédent</a>&nbsp;!</p>
  				  </div>
  				  
  				  <p>Nous allons ici digitaliser (dessiner) des polygones dans des zones avec différents types d'occupation du sol (eau, urbain, forêt...), afin de voir ensuite la signature spectrale de chacune de ces classes.</p>
  				  <p>Ces polygones sont souvent nommés <b>ROI</b> en télédétection pour &#171;&nbsp;Region Of Interest&nbsp;&#187;.</p>
  				  
  				  <h4>Définition du jeu de bandes en entrée dans l'extension SCP<a class="headerlink" id="XII21a" href="#XII21a"></a></h4>
  				  
    				  <p>Il faut tout d'abord définir l'image satellite en entrée pour l'extension SCP.</p>
    				  
    				  <div class="manip">
    				    <p><img class="icone" src="illustrations/12_01_jeu_bandes_icone.jpg" alt="icône jeu de bandes du plugin SCP" ><b>Menu SCP &#8594; Jeu de bandes</b> ou bien cliquez sur l'icône correspondante dans le panneau SCP&nbsp;:</p>
    				    <figure>
      						<a href="illustrations/12_02_jeu_bandes.jpg" >
      							<img src="illustrations/12_02_jeu_bandes.jpg" alt="Choix du jeu de bandes dans le plugin SCP" width="600">
      						</a>
      					</figure>
      					<ul>
      					 <li class="espace">Sélectionnez l'image <em class="data">Sentinel2_2021_08_17.tif</em> dans la liste déroulante en haut de la fenêtre (si vous ne la voyez pas, rafraîchissez la liste au moyen du bouton à droite)</li>
      					 <li class="espace">En bas de la fenêtre, dans la liste <b>Wavelength quick settings</b>, sélectionnez <b>Sentinel-2</b>.</li>
      					</ul>
      					<p>Il est inutile de cliquer sur le bouton <em>Run</em>. Vous pouvez maintenant fermer cette fenêtre.</p>
      				</div>
      				
      				<p>L'extension SCP est maintenant paramétrée pour travailler sur notre image, qui est reconnue comme une image Sentinel-2.
      				
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
      					<p class="note">Cette couche semble une couche temporaire (icône grise à côté de son nom), mais il s'agit bien d'une couche sauvegardée sur votre disque, comme vous pouvez vous en assurer dans votre explorateur de fichiers. Elle possède l'extension .scp (v7) ou .scpx (v8) propre à l'extension QGIS SCP.</p>
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
    					
    					<p>Vous pouvez par exemple charger la couche de polygones d'entraînement <em class="data">ROI_S2_2021_08_17.scpx</em>.</p>
  				  
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
  				      <p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_12_Teledetection">Sentinel2_2021_08_17.tif</a></em>.</p>
  				      <p>Il faut d'abord si ça n'est pas déjà fait définir le <b>jeu de bandes</b> pour SCP : Menu SCP &#8594; Jeu de bande :</p>
  				      <figure>
      						<a href="illustrations/12_02_bandset.jpg" >
      							<img src="illustrations/12_02_bandset.jpg" alt="SCP, jeu de bandes" width="600">
      						</a>
      					</figure>
      					<ul>
      					 <li>Cliquez éventuellement sur le bouton <b>actualiser la liste</b> pour voir apparaître le nom de l'image dans la liste déroulante</li>
      					 <li>Sélectionnez l'image dans la liste déroulante</li>
      					 <li>En bas de la fenêtre, choisissez <b>Sentinel-2</b> pour le paramétrage rapide des longueurs d'onde</li>
      					</ul>
      					
      					<p>Vous pouvez maintenant aller dans la partie <b>Calcul de bande</b> de SCP, les bandes de notre raster seront listées dans le tableau en haut de la fenêtre. Si ça n'est pas le cas, utilisez le bouton <b>Actualiser</b> à droite de la liste des bandes.</p>
      					<figure>
      						<a href="illustrations/12_02_calcul_bandes.jpg" >
      							<img src="illustrations/12_02_calcul_bandes.jpg" alt="SCP, calcul de bandes, liste des bandes en haut de la fenêtre entourée de rouge" width="600">
      						</a>
      					</figure>
  				    </div>
  				    
  				    <p>Contrairement à ce qu'on aurait pu penser, il n'y a pas 13 bandes dans ce tableau mais 40&nbsp;! Pourquoi&nbsp;? Sont listées dans cet outil&nbsp;:</p>
  				    <ul>
  				      <li>Les 13 bandes du jeu de bandes actuel, sous la forme bandset#b1, bandset#b2 etc. (raster1 à raster13)</li>
  				      <li>Les 13 bandes du jeu de bande 1 (donc identiques à celles ci-dessus), sous la forme bandset1b1, bandset2b2 etc. (raster14 à raster26)</li>
  				      <li>bandset1b* (raster27) : toutes les bandes du jeu de bande 1 (toutes les bandes de l'image Sentinel-2)</li>
  				      <li>bandset*b1, bandset*b2 etc. (raster28 à raster40) : toutes les bandes 1 de tous les jeux de bandes, toutes les bandes 2 de tous les jeux de bandes etc. (ici nous n'avons qu'un seul jeu de bandes, donc il s'agit encore des 13 mêmes bandes)</li>
  				    </ul>
  				    <p>Certaines de ces &#171;&nbsp;bandes&nbsp;&#187; sont donc en réalité des listes de bandes et pourront être utilisées dans des expressions acceptant ces listes.</p>
  				    <p><b>Ici, nous utiliserons uniquement les 13 premiers éléments de la liste correspondant aux 13 bandes de notre image&nbsp;!</b></p>
  				    
  				    <div class="manip">
      						<a href="illustrations/12_02_scp_ndvi.jpg" >
      							<img class="droite" src="illustrations/12_02_scp_ndvi.jpg" alt="SCP, calcul de bandes, partie Fonctions : NDVI" width="250">
      						</a>
      					<p>Dans la partie <b>Fonctions</b> à droite de la fenêtre, descendez pour arriver jusqu'à la rubrique <b>Indices</b> et double-cliquez sur <b>NDVI</b>.</p>
      					<p>La formule suivante s'affiche dans la partie <b>Expression</b>&nbsp;:</p>
      					<p class="code">( "#NIR#" - "#RED#" ) / ( "#NIR#" + "#RED#" ) @NDVI</p>
      					<p class="note">Dans cette formule, <b>@NDVI</b> sera le nom de la couche qui sera créée.</p>
      					<p>Vous pouvez également choisir de taper la formule du NDVI &#171;&nbsp;à la main&nbsp;&#187; en double-cliquant sur les bandes dans la partie haute de la fenêtre&nbsp;:</p>
      					<p class="code">("raster8" - "raster4") / ("raster8" + "raster4") @NDVI</p>
      					<p class="note">Le résultat sera le même en utilisant <em>bandset#b8</em> et <em>bandset#b4</em>, ou bien <em>bandset1b8</em> et <em>bandset1b4</em>...</p>
      					<p><img class="icone" src="illustrations/12_02_ndvi_lancer_icone.jpg" alt="bouton Lancer en bas à droite du panneau SCP" >Pour lancer le calcul du NDVI, cliquez sur le bouton <b>Lancer</b> en bas à droite de la fenêtre.</p>
      					<p>Une nouvelle fenêtre s'ouvre pour vous demander l'emplacement où enregistrer la couche qui sera créee (son nom est défini par le texte à droite de l'arobase dans la formule, ici ce sera NDVI).</p>
      					<p>Patientez... Le nouveau raster est ajouté à QGIS&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_resultat.jpg" >
      							<img src="illustrations/12_02_ndvi_resultat.jpg" alt="image NDVI" width="500">
      						</a>
      					</figure>
      					
      					<p>Dans les propriétés de la couche, on peut voir l'histogramme des valeurs du NDVI&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_histogramme.jpg" >
      							<img src="illustrations/12_02_ndvi_histogramme.jpg" alt="image NDVI" width="500">
      						</a>
      					</figure>
      					
      					<p>Pour mieux visualiser ce NDVI, on peut utiliser une gamme de couleur allant du rouge au vert, en choisissant le type de rendu <b>Pseudo-couleur à bande unique</b>&nbsp;:</p>
      					<figure>
      						<a href="illustrations/12_02_ndvi_style.jpg" >
      							<img src="illustrations/12_02_ndvi_style.jpg" alt="style pseudo-couleur de -1 à 1 avec la galle RdYlGn pour le NDVI" width="500">
      						</a>
      					</figure>
      					
      					<p>Ce qui permet d'observer&nbsp;:</p>
      					<ul>
      					 <li><b>en rouge-orange les valeurs inférieures à 0&nbsp;: ce sont les surfaces non couvertes par les végétaux (eau, nuages...)</b>, les valeurs des pixels sont plus grandes dans le rouge que dans le proche infra-rouge</li>
      					 <li><b>en jaune les valeurs autour de 0 correspondant au sol nu</b> : les valeurs des pixels sont à peu près les mêmes dans le rouge et dans le proche infra-rouge</li>
      					 <li><b>en vert les valeurs supérieures à 0 correspondant aux zones avec de la végétation</b>, un vert plus foncé traduisant un couvert plus dense : les pixels ont une valeur plus forte dans le proche infra-rouge que dans le rouge.</li>
      					</ul>
      					
      					<p class="keskonfai">TODO : interprétation NDVI à compléter/modifier ?</p>
      					
      					<figure>
      						<a href="illustrations/12_02_ndvi_rdylgn.jpg" >
      							<img src="illustrations/12_02_ndvi_rdylgn.jpg" alt="image NDVI du rouge (-1) au vert (1)" width="500">
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
  				    
  				    <p class="keskonfai">TODO : calcul NDVI pour les surfaces en eau, forêt etc.</p>
  				  
  				  <h4>Normalized Burn Ratio (NBR)<a class="headerlink" id="XII23b" href="#XII23b"></a></h4>
  				  
  				    <p>L'<a class="ext" target="_blank" href="https://un-spider.org/advisory-support/recommended-practices/recommended-practice-burn-severity/in-detail/normalized-burn-ratio">indice normalisé des surfaces brûlées</a> (Normalized Burn Ratio ou NBR) est utilisé pour identifier les surfaces brûlées et donner une mesure de l'intensité des feux.</p>
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
  				    
  				    <p class="keskonfai">TODO : analyse et interprétation NBR</p>

				
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
