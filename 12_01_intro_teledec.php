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
		
			<h2>XII.1  Introduction à la télédétection</h2>
			
			    <ul class="listetitres">
  					<li><a href="#XII11">Données utilisées : image Sentinel-2</a>
  					   <ul class="listesoustitres">
  							<li><a href="#XII11a">Type de satellite et de produit</a></li>
  							<li><a href="#XII11b">Localisation de l'image</a></li>
  						</ul>
  					</li>
  					<li><a href="#XII12">Installation de l'extension SCP</a></li>
  					<li><a href="#XII13">Téléchargement des données avec SCP</a></li>
  					<li><a href="#XII14">Visualisation et présentation des images</a>
  					  <ul class="listesoustitres">
  							<li><a href="#XII14a">Affichage d'une image en niveaux de gris</a></li>
  							<li><a href="#XII14b">Affichage d'une composition colorée</a></li>
  						</ul>
  					</li>
  				</ul>
  				<br>
				
          <p>L'objectif de cette introduction est de voir comment :</p>
          
          <ul>
              <li>importer et ouvrir une image satellitaire de type Sentinel-2 (ESA)</li>
              <li>comprendre les caractéristiques spectrales, spatiales, radiométriques et temporelles associées à une image satellitaire</li>
              <li>interpréter une image satellitaire, extraire de l’information spatiale et spectrale</li>
          </ul>
                
          <h3>Données utilisées : image Sentinel-2<a class="headerlink" id="XII11" href="#XII11"></a></h3>
          
              <p>L'image que nous allons utiliser ici est une <b>image <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/Sentinel-2">Sentinel-2</a> acquise le 17 août 2021</b>. Nous allons commencer par essayer de répondre à 3 questions :</p>
              
              <ul>
                  <li><b>Comment&nbsp;?</b> Quel est le type de satellite, de produit, etc.</li>
                  <li><b>Où&nbsp;?</b> Quelle est la localisation de l'image, le type de référentiel cartographique</li>
                  <li><b>Quand&nbsp;?</b> Quelle est la date de prise de vue, l'heure, l'hémisphère...</li>
              </ul>
              
              <h4>Type de satellite et de produit<a class="headerlink" id="XII11a" href="#XII11a"></a></h4>
              
                  <p>Il s'agit d'une image <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/Sentinel-2">Sentinel-2</a> de <a target="_blank" class="ext" href="https://sentinels.copernicus.eu/web/sentinel/user-guides/sentinel-2-msi/product-types">niveau 1C</a>, qui contient donc les valeurs de <b>réflectance</b> obtenues en haut de l'atmosphère (&#171;&nbsp;Top Of Atmosphere&nbsp;&#187; ou TOA).</p>
                  
                  <table>
                      <caption>Sentinel-2 product types from <a target="_blank" class="ext" href="https://sentinels.copernicus.eu/web/sentinel/user-guides/sentinel-2-msi/product-types">https://sentinels.copernicus.eu</a>, European Space Agency - ESA</caption>
                      <tr>
                          <th class="centre">Name</th>
                          <th class="centre">High-level Description</th>
                          <th class="centre">Production & Distribution</th>
                          <th class="centre">Data Volume</th>
                      </tr>
                      <tr class="white">
                          <td class="centre">Level-1C</td>
                          <td class="centre">Top-of-atmosphere reflectances in cartographic geometry</td>
                          <td class="centre">Systematic generation and on-line distribution</td>
                          <td class="centre">600 MB (each 100x100 km2)</td>
                      </tr>
                      <tr class="white">
                          <td class="centre">Level-2A</td>
                          <td class="centre">Bottom-of-atmosphere reflectance in cartographic geometry</td>
                          <td class="centre">Systematic generation and on-line distribution and generation on user side (using Sentinel-2 Toolbox)</td>
                          <td class="centre">800 MB (each 100x100 km2)</td>
                      </tr>
                  </table>
                  <br>
                  
                  <p class="keskonfai">Demander autorisation à ESA pour reproduire du contenu du site web ,cf. https://sentinels.copernicus.eu/web/sentinel/terms-conditions</p>
                  
                  <div class="theorie">
                      <p class="theorie">Qu'est-ce que la <a target="_blank" class="ext" href="https://fr.wikipedia.org/wiki/R%C3%A9flectance">réflectance</a>&nbsp;? C'est une grandeur physique qui correspond à la lumière réfléchie par un objet géographique. C’est donc un rapport entre l’énergie réfléchie et l’énergie incidente (soleil), il s’exprime en pourcentage.</p>
                      <figure>
          						<a href="illustrations/tous/12_01_reflectance.svg" >
          							<img src="illustrations/tous/12_01_reflectance.png" alt="illustration réflectance : flux incident entre soleil et sol et énergie réfléchie entre sol et satellite" width="420">
          						</a>
          					</figure>
          					<p>Exemple pour une parcelle de maïs en juillet dans le Proche Infra Rouge (PIR) en Bretagne :</p>
          					<p class="code">Réflectance x 100 = 60%</p> 
                  </div>
                  
                  <p>Pour obtenir des valeurs de réflectances en bas de l'atmosphère (&#171;&nbsp;Bottom Of Atmosphere&nbsp;&#187; ou BOA), il faut appliquer un <b>modèle de corrections atmosphériques</b>. Il en existe de nombreux et tous sont imparfaits&nbsp;:</p>
                   
                  <ul>
                      <li>Modèle 6S, ATCOR, MACCS, etc.</li>
                      <li>Modèle DOS (Dark Object Substraction) utilisé dans QGIS et SCP</li>
                      <li>Modèle MAJA (CNES)</li>
                  </ul>
                  <p>L'objectif principal est&nbsp;:</p>
                  <ul>
                      <li>d'estimer la contribution atmosphérique dans les réflectances mesurées</li>
                      <li>de passer des comptes numériques d’une image (CN ou DN pour « Digital Number ») à des valeurs physiques de réflectance</li>
                  </ul>
                  
                  <p class="keskonfai">Mais du coup on n'est pas déjà sur des valeurs de réflectance TOA ?</p>
                    
                
              <h4>Géométrie des images Sentinel-2<a class="headerlink" id="XII11b" href="#XII11b"></a></h4>
                
                <p class="keskonfai">Ca correspond à la question "Où" d'un peu plus haut ?</p>
                <p class="keskonfai">Trouver l'illustration qui va bien : montrer uniquement la grille sentinel-2 ? Les zones UTM aussi ?</p>
                
                <figure>
      						<a href="illustrations/tous/12_01_grille_sentinel.png" >
      							<img src="illustrations/tous/12_01_grille_sentinel.png" alt="grille sentinel sur la France et les pays voisins" width="600">
      						</a>
      						<figcaption>Grille Sentinel, projection UTM : une tuile mesure 100 km de côté, les tuiles se recouvrent légèrement (source grille : <a class="ext" target="_blank" href="https://github.com/justinelliotmeyers/Sentinel-2-Shapefile-Index">https://github.com/justinelliotmeyers/Sentinel-2-Shapefile-Index</a>).</figcaption>
      					</figure>
                
                <p>Les images Sentinel-2 sont des <b>granules ou tuiles de 100 x 100 km</b>. Ces images sont <b>orthorectifiées</b> et projetées dans le système de coordonnées <b><a href="02_02_coord.php#II22d">UTM</a> / WGS84</b> et ont donc des coordonnées métriques.</p>
                <p>Elles ont subi des <b>corrections géométriques</b> très précises qui permettent entre autres de les intégrer dans un SIG, de calculer des surfaces...</p>
                
                <div class="manip">
                    <p>Pour voir où se situe notre image Sentinel-2 <em class="data">Sentinel2_2021_08_17.tif</em>, ajoutez-la à QGIS, avec par exemple un <a href="03_04_fonds_carte.php#III42a">fonds de carte OpenStreetMap</a>&nbsp;:</p>
                    <figure>
          						<a href="illustrations/tous/12_01_localisation_image_zoom.png" >
          							<img src="illustrations/tous/12_01_localisation_image_zoom.png" alt="fonds OSM centré vers Saint-Raphaël, avec affichage de l'image S2A par dessus" width="400">
          						</a>
          					</figure>
          					<p>L'image est située dans le département du Var, près du golfe de Saint-Tropez.</p>
                </div>
                
                <p>Les grandes étapes de traitements d’images satellitaires sont les suivantes&nbsp;:</p>
                <figure>
      						<a href="illustrations/tous/12_01_etapes_traitement.png" >
      							<img src="illustrations/tous/12_01_etapes_traitement.png" alt="5 étapes de traitement des images satellitaires : accès, pré-traitements, visualisation, classification et post-traitements" width="650">
      						</a>
      					</figure>
                
                <p>Nous allons voir dans la suite de ce chapitre les étapes 1 et 3 : téléchargement et visualisation.</p>
          
          <h3>Installation de l'extension SCP<a class="headerlink" id="XII12" href="#XII12"></a></h3>
          
            <p>L'extension QGIS <a class="ext" target="_blank" href="https://fromgistors.blogspot.com/p/semi-automatic-classification-plugin.html">SCP : Semi-Automatic Classification Plugin</a> est développée et maintenue par Luca Congedo. C'est un outil très complet, presque un logiciel dans le logiciel, qui permet la classification supervisée d'images satellitaires, mais aussi leur téléchargement, pré-traitement et post-traitement.</p>
            <p>Cette extension dispose d'un <a class="ext" target="_blank" href="https://readthedocs.org/projects/semiautomaticclassificationmanual-fr/downloads/pdf/latest/" >manuel</a> également très complet, utile notamment en cas de problème lors de l'installation.</p>
            
            <div class="manip">
              <p>Pour installer cette extension&nbsp;: <b>menu Extensions &#8594; Installer/Gérer les extensions</b>&bvsp;:</p>
              <figure>
    						<a href="illustrations/tous/12_01_scp_install.png" >
    							<img src="illustrations/tous/12_01_scp_install.png" alt="installation de l'extension scp" width="600">
    						</a>
    					</figure>
    					<ul>
    					 <li>Rubrique <b>Toutes</b></li>
    					 <li>barre de recherche : taper <b>SCP</b> par exemple</li>
    					 <li>Sélectionner <b>Semi-Automatic Classification Plugin</b> (attention, pas SCP-plugin&nbsp;!)</li>
    					 <li><b>Installer le plugin</b></li>
    					</ul>
    					<p>Un nouveau panneau apparaît dans QGIS. Vous pourrez le désactiver/réactiver à l'aide du menu Vue &#8594; Panneaux &#8594; Menu SCP, ou bien à partir du menu SCP dans la barre de menu QGIS.</p>
    					<p>2 barres d'outils peuvent également être affichées&nbsp;: SCP Working Toolbar et SCP Edit Toolbar (menu Vue &#8594; Barres d'outils pour les activer/désactiver).</p>
            </div>
            
            <figure>
  						<a href="illustrations/tous/12_01_qgis_scp.png" >
  							<img src="illustrations/tous/12_01_qgis_scp.png" alt="fenêtre de QGIS avec le panneau, les 2 barres d'outils et le menu SCP" width="650">
  						</a>
  						<figcaption>Fenêtre de QGIS avec le menu, les 2 barres d'outils et le panneau SCP (cliquer pour agrandir).</figcaption>
  					</figure>
  					
  					
  				<h3>Téléchargement des données avec SCP<a class="headerlink" id="XII13" href="#XII13"></a></h3>
          
            <p>SCP offre la possibilité de télécharger des images gratuites (Sentinel, Landsat,etc.) sans avoir besoin de se rendre sur les géoportails. Pour cela, il faut au préalable avoir un compte sur ces sites (identifiant et mot de passe).</p>
            <p>Il faudra également définir une zone géographique et une période d'acquisition.</p>
            <p>Une fois les images téléchargées, il est possible, toujours dans SCP, d'effectuer des prétraitements atmosphériques sur des images Landsat ou autre (bien vérifier le niveau de prétraitement de vos images téléchargées), de mosaïquer plusieurs images entre elles etc.</p>
            
            <p class="keskonfai">Est-ce qu'on montre ici commment télécharger une image pas à pas ? Puis comment fusionner les bandes ?</p>
              
          <h3>Visualisation et présentation des images<a class="headerlink" id="XII14" href="#XII14"></a></h3> 
                
            <div class="manip">
              <p>Ouvrez un nouveau projet QGIS, ajoutez l'image Sentinel-2 <em class="data"><a href="donnees/TutoQGIS_12_Teledetection">Sentinel2_2021_08_17.tif</a></em>.</p>
            </div>
            
            <p>Cette image est au format <a href="01_03_formats.php#I32" >GeoTIFF</a>, un format d’image standard comprenant des informations de géoréférencement à une image TIFF (projection, système de coordonnées, métadonnées…).</p>
            <p>Un GeoTIFF peut être composée de plusieurs sous-images, c’est le cas pour les images satellitaires dites multispectrales !!!</p>
            
            <div class="manip">
              <p><img class="icone" src="illustrations/tous/12_01_jeu_bandes_icone.png" alt="icône jeu de bandes du plugin SCP" ><b>Menu SCP &#8594; Jeu de bandes</b> ou bien cliquez sur l'icône correspondante dans le panneau SCP&nbsp;:</p>
              <p class="keskonfai">Quel est l'outil de jeu de bandes qui est utilisé ? Dans quel but ?</p>
            </div>
            
            <p>Sentinel-2 est un satellite qui fournit des images composées de 13 bandes spectrales&nbsp;:</p>
            
            <table>
						 <caption>Bandes spectrales de l'instrument MSI à bord de Sentinel-2 (source : <a class="ext" target="_blank" href="https://sentinel.esa.int/web/sentinel/technical-guides/sentinel-2-msi/msi-instrument" >European Spatial Agency</a> et <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Sentinel-2">Wikipedia</a>)</caption>
					   <tr>
				       <th>Bandes Sentinel-2</th>
				       <th>Longueur d'onde centrale (nm)</th>
				       <th>Résolution spatiale (m)</th>
					   </tr>
					   <tr>
  			       <td>Bande 1 - Aérosol côtier</td>
  			       <td>443</td>
  			       <td>60</td>
					   </tr>
					   <tr class="alt">
  			       <td>Bande 2 - Bleu</td>
  			       <td>492</td>
  			       <td>10</td>
					   </tr>
					   <tr>
  			       <td>Bande 3 - Vert</td>
  			       <td>560</td>
  			       <td>10</td>
					   </tr>
             <tr class="alt">
  			       <td>Bande 4 - Rouge</td>
  			       <td>665</td>
  			       <td>10</td>
					   </tr>
             <tr>
  			       <td>Bande 5 - Végétation "red edge"</td>
  			       <td>704</td>
  			       <td>20</td>
					   </tr>
             <tr class="alt">
  			       <td>Bande 6 - Végétation "red edge"</td>
  			       <td>741</td>
  			       <td>20</td>
					   </tr>
             <tr>
  			       <td>Bande 7 - Végétation "red edge"</td>
  			       <td>783</td>
  			       <td>20</td>
					   </tr>
					   <tr class="alt">
  			       <td>Bande 8 - PIR</td>
  			       <td>833</td>
  			       <td>10</td>
					   </tr>
             <tr>
  			       <td>Bande 8A - PIR "étroit"</td>
  			       <td>865</td>
  			       <td>20</td>
					   </tr>
					   <tr class="alt">
  			       <td>Bande 9 - Vapeur d'eau</td>
  			       <td>945</td>
  			       <td>60</td>
					   </tr>
					   <tr>
  			       <td>Bande 10 - SWIR - Cirrus </td>
  			       <td>1374</td>
  			       <td>60</td>
					   </tr>
					   <tr class="alt">
  			       <td>Bande 11 - SWIR</td>
  			       <td>1614</td>
  			       <td>20</td>
					   </tr>
					   <tr>
  			       <td>Bande 12 - SWIR</td>
  			       <td>2202</td>
  			       <td>20</td>
					   </tr>
            </table>
            
            <h4>Affichage d'une image en niveau de gris<a class="headerlink" id="XII14a" href="#XII14a"></a></h4> 
            
              <div class="manip">
                <p>Par défaut, si on charge dans QGIS un raster avec plusieurs bandes, les 3 premières bandes sont affichées dans les canaux rouge, vert et bleu. Si on veut afficher une seule bande spectrale, par exemple celle du rouge (bande 4)&nbsp;:</p>
                <p>Double-cliquez sur le nom de la couche pour aller dans ses <b>propriétés, rubrique Symbologie</b>&nbsp;:</p>
                <figure>
      						<a href="illustrations/tous/12_01_bande_grise_unique.png" >
      							<img src="illustrations/tous/12_01_bande_grise_unique.png" alt="fenêtre des propriétés, rubrique symbologie, rendu = bande grise unique" width="600">
      						</a>
    						</figure>
    						<p>Choisissez le type de rendu <b>Bande grise unique</b> puis la bande à représenter, ici la bande rouge 4.</p>
                <p>Pour rehausse le contraste, on peut ensuite choisir d'exclure les valeurs extrêmes&nbsp;:</p>
                <figure>
      						<a href="illustrations/tous/12_01_minmax.png" >
      							<img src="illustrations/tous/12_01_minmax.png" alt="fenêtre des propriétés, rubrique symbologie, valeurs min-max, borne d'exclusion des valeurs extrêmes 2 et 98%" width="400">
      						</a>
    						</figure>
    						<p>Une fois les changements appliqués, l'image devrait s'afficher comme ceci&nbsp;:</p>
    						<figure>
      						<a href="illustrations/tous/12_01_image_gris.png" >
      							<img src="illustrations/tous/12_01_image_gris.png" alt="Affichage de la bande 4 en niveaux de gris" width="500">
      						</a>
    						</figure>
              </div>
              
              <p>Comment interpréter cet affichage&nbsp;? Les pixels noirs ont des valeurs de réflectance très faibles et les pixels clairs des réflectances plus importantes.</p>
              <p>On peut lire dans les propriétés les valeurs minimum (par défaut, en noir) et maximum (par défaut, en blanc). Entre ces 2 valeurs, la couleur est interpolée entre le noir et le blanc pour aboutir à un gris plus ou moins foncé</p>
              <figure>
                <a href="illustrations/tous/12_01_minmax_valeurs.png" >
    							<img src="illustrations/tous/12_01_minmax_valeurs.png" alt="fenêtre des propriétés, rubrique symbologie, lecture des valeurs min-max" width="650">
    						</a>
  						</figure>
  						<p class="note">Il est possible d'inverser le noir et le blanc en choisissant <b>Blanc vers noir</b> au lieu de <b>Noir vers blanc</b> dans <b>Dégradé de couleur</b>.</p>
              <p>Par exemple, une valeur de pixel de 0,2 correspond à 20% de réflectance.</p>
              
              <div class="manip">
                <p><img class="icone" src="illustrations/tous/1_2_informations_icone.png" alt="icône identifier des entités" >Vous pouvez interroger les valeurs des pixels à l'aide de l'outil <b>Identifier des entités</b>. Cet outil renvoie les valeurs de toutes les bandes du pixel interrogé&nbsp;:</p>
                <figure>
                  <a href="illustrations/tous/12_01_identifier_graphique.png" >
      							<img src="illustrations/tous/12_01_identifier_graphique.png" alt="résultat de l'outil identifier des entités en mode graphique" width="400">
      						</a>
    						</figure>
    						<p>Ici, le résultat est présenté sous forme de graphique, avec un point par bande, le mode par défaut est sous forme d'arborescence. Vous pouvez changer de mode au moyen de la liste déroulante au bas de la fenêtre.</p>
              </div>
              
              <p>Il est également possible dans la fenêtre des propriétés de la couche de voir l'histogramme de fréquence des valeurs de pixel pour une ou plusieurs bandes.</p>
              
              <div class="manip">
                <p>Double-clic sur le nom de la couche pour ouvrir la fenêtre des propriétés, rubrique <b>Histogramme</b>&nbsp;:</p>
                <figure>
                  <a href="illustrations/tous/12_01_histo_preferences.png" >
      							<img src="illustrations/tous/12_01_histo_preferences.png" alt="fenêtre des propriétés, histogramme, choix de la bande" width="600">
      						</a>
    						</figure>
    						<p>Par défaut, toutes les bandes sont affichées. Pour n'afficher qu'une seule bande, cliquer sur le bouton <b>Préférences/Actions</b> et choisir par exemple <b>Afficher la bande sélectionnée</b> puis afficher la bande 04&nbsp;:</p>
    						<figure>
                  <a href="illustrations/tous/12_01_histo_bande4.png" >
      							<img src="illustrations/tous/12_01_histo_bande4.png" alt="fenêtre des propriétés, histogramme, bande 4" width="600">
      						</a>
    						</figure>
    						<p>Vous pouvez zoomer sur le graphique en dessinant un rectangle, et revenir au zoom initial par un clic droit.</p>
    						<p>Il est possible d'exporter ce graphique au format image (JPG, PNG...).</p>
              </div>
              
            <h4>Affichage d'une composition colorée<a class="headerlink" id="XII14b" href="#XII14b"></a></h4>
            
              <p>Dans une <b>composition colorée</b>, on associe aux trois couleurs primaire (synthèse additive), le bleu, le vert et le rouge, trois bandes spectrales d’une image multispectrale.</p>
              <p>Selon le site <a class="ext" target="_blank" href="https://www.123couleurs.fr/">123couleurs</a> : &#171;&nbsp;La <b>synthèse additive</b> correspond aux mélanges de couleurs que l’on obtient quand, en partant de l’absence de lumière (le « NOIR »), on allume ensemble plusieurs sources de lumière colorées. Le terme additif vient du fait que les mélanges résultent d’une addition de lumières colorées.&nbsp;&#187;</p>
				      <figure>
                <a href="https://fr.wikipedia.org/wiki/Synth%C3%A8se_additive#/media/Fichier:Synthese+.svg" >
    							<img src="illustrations/tous/12_01_synthese_additive.svg" alt="schéma de la synthèse additive" width="200">
    						</a>
    						<figcaption>Synthèse additive, source : <a class="ext" target="_blank" href="https://commons.wikimedia.org/wiki/File:Synthese%2B.svg">Wikimedia Commons</a>, auteur Quark67</figcaption>
  						</figure>
  						
  						<p>Dans une <b>composition colorée vraie couleur</b>, il y aura adéquation entre les couleurs utilisées pour l’affichage et les bandes spectrales !</p>
  						
  						<div class="manip">
  						  <p>Ouvrez la fenêtre des propriétés de l'image <em class="data"><a href="donnees/TutoQGIS_12_Teledetection">Sentinel2_2021_08_17.tif</a></em>, rubrique <b>Symbologie</b>&nbsp;:</p>
  						  <figure>
                  <a href="illustrations/tous/12_01_compocol.png" >
      							<img src="illustrations/tous/12_01_compocol.png" alt="choix des bandes rouge, vert et bleu en rendu 'couleur à bandes multiples'" width="600">
      						</a>
    						</figure>
    						<p>Sélectionnez le type de rendu <b>Couleur à bandes multiples</b> si ça n'est pas déjà fait.</p>
    						<p>Pour une composition colorée en vraie couleur, sélectionnez les bandes suivantes&nbsp;:</p>
    						<ul>
    						  <li>Bande rouge &#8594; <b>bande 04</b> : rouge, 665 nm</li>
    						  <li>Bande verte &#8594; <b>bande 03</b> : vert, 560 nm</li>
    						  <li>Bande bleue &#8594; <b>bande 02</b> : bleu, 490 nm</li>
    						</ul>
  						</div>
  						
  						<p class="keskonfai">Ici il y a l'exo "Interpréter une composition colorée : méthode". On fait un truc là-dessus ??</p>
  						
				      <p>Dans une <b>composition colorée fausse couleur</b>, il n'y a pas d'adéquation entre les couleurs utilisées pour l’affichage et les bandes spectrales !</p>
				      <p>Le but peut être par exemple de mieux voir la végétation, des zones brûlées...</p>
				      <p class="keskonfai">Dans l'exemple ci-dessous, le but est bien de voir les zones qui ont brûlées ?</p>
				      
				      <div class="manip">
				        <p>Par exemple, en choisissant les bandes suivantes&nbsp;:</p>
				        <ul>
    						  <li>Bande rouge &#8594; <b>bande 13</b> : moyen infrarouge 2 (SWIR2), 2190 nm</li>
    						  <li>Bande verte &#8594; <b>bande 08</b> : proche infra-rouge, 842 nm</li>
    						  <li>Bande bleue &#8594; <b>bande 04</b> : rouge, 665 nm</li>
    						</ul>
				        <figure>
                  <a href="illustrations/tous/12_01_compocol_2.png" >
      							<img src="illustrations/tous/12_01_compocol_2.png" alt="image avec les bandes 13, 8 et 4 : les zones brûlées sont bien visibles en rouge" width="600">
      						</a>
    						</figure>
				      </div>
				      
				      <p>Dans le chapitre suivant, nous verrons comment aller un peu plus loin pour &#171;&nbsp;faire parler&nbsp;&#187; nos image satellite, à travers la notion de <em>signature spectrale</em>&nbsp;!</p>
				      
				<br>
				<a class="prec" href="12_00_teledetection.php">chapitre précédent</a>
				<a class="suiv" href="12_02_info_spectrale.php">chapitre suivant</a>
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
