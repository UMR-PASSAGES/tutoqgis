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
			<h2>IX.4  Un exemple d'application&nbsp;: créer un maillage</h2>
				<ul class="listetitres">
					<li><a href="#IX41">Principe</a></li>
					<li><a href="#IX42">Création d'une grille</a></li>
					<li><a href="#IX43">Union&nbsp;!</a></li>
					<li><a href="#IX44">Recalcul de la surface</a></li>
					<li><a href="#IX45">Agrégation des données par maille</a></li>
					<li><a href="#IX46">Rastérisation</a></li>
				</ul>
				<br>
				
    			<p>Pour finir cette partie sur l'analyse spatiale, voici un exemple d'application mettant en jeu plusieurs notions. Il s'agira ici, à partir de données <a class="ext" target="_blank" href="https://www.statistiques.developpement-durable.gouv.fr/corine-land-cover-0">Corine Land Cover</a> d'occupation du sol, de <b>créer un maillage sous forme de grille à l'échelle de la France métropolitaine, avec pour chaque case de cette grille la surface en vignes</b>.</p>
    			<p>Les mailles sont beaucoup utilisées dans différents domaines, par exemple pour étudier la répartition des espèces en écologie. Cette méthode permet de créer des représentations facilement comparables, et de travailler à différentes échelles en faisant varier la taille des mailles.</p>
    			<p>Nous verrons d'abord comment réaliser cela avec les outils QGIS, puis dans le <a href="09_05_maillage_sql.php">chapitre suivant</a> comment automatiser cette tâche avec le langage SQL, afin de pouvoir facilement reproduire ce traitement sur d'autres données, avec une autre taille de grille...</p>
    			<p>...Et pour tirer partie de cette automatisation, nous finirons en <a href="09_05_maillage_sql.php#IX56">soustrayant 2 maillages</a> afin de voir l'évolution de la surface en vignes entre 2 dates.</p>
    		
    		    <figure>
    				<a href="illustrations/tous/9_4_apercu_resultatfinal.png" >
    					<img src="illustrations/tous/9_4_apercu_resultatfinal.png" alt="maillage 10km surface en vignes 5 classes intervalles égaux" width="400">
    				</a>
    				<figcaption>Un exemple de résultat avec une taille de maille de 10km</figcaption>
    			</figure>
    			
    			<p class="attention">Pour ce chapitre et le suivant, vous pouvez soit télécharger les données <a class="ext" target="_blank" href="https://www.statistiques.developpement-durable.gouv.fr/corine-land-cover-0" >Corine Land Cover</a>&nbsp;: <a class="ext" target="_blank" href="http://www.donnees.statistiques.developpement-durable.gouv.fr/donneesCLC/CLC/millesime/CLC00_FR_RGF_SHP.zip" >Données Métropole 2000</a> puis les filtrer pour ne garder que les vignes, comme détaillé dans le tutoriel, ou bien utiliser les <a href="telechargement.php">données en téléchargement</a> déjà filtrées (pour un téléchargement moins lourd).</p>
    
    			
    		    <h3>Principe<a class="headerlink" id="IX41" href="#IX41"></a></h3>
    			
        		 <p>Pour bien comprendre la manip, nous allons commencer par créer un maillage en utilisant les outils QGIS.</p>
        		 <p>Nous partirons des données Corine Land Cover (CLC) d'occupation du sol, en filtrant les données pour ne garder que celles correspondant au vignoble&nbsp;:
        		 <figure>
        		     <a href="illustrations/tous/9_4_principe_depart.png" >
        		         <img src="illustrations/tous/9_4_principe_depart.png" alt="données Corine Land Cover France métro vignes" width="250">
        		     </a>
        		 </figure>
        		 <p>Nous passerons ensuite par 4 étapes&nbsp;:
        		 <ol>
        		     <li><b>Créer une grille</b> sur l'emprise de la couche de départ, avec une taille de maille définie, par exemple 50 km</li>
        		     <li>Réaliser une <b>union</b> entre la couche d'occupation du sol et la grille, pour découper les données par les cases de la grille</li>
        		     <li><b>Agréger</b> les données par maille, en calculant pour chaque maille la surface totale en vignes</li>
        		     <li><b>Rastériser</b> le résultat, ce qui sera utile pour par exemple soustraire 2 maillages l'un à l'autre</li>
        		 </ol>
        		 
        		 <p>Avec une grille de résolution 50 km&nbsp;:</p>
        		 <table class="table_images">
        		     <tr>
        		         <td><a href="illustrations/tous/9_4_principe_grille.png" ><img src="illustrations/tous/9_4_principe_grille.png" alt="grille maille 50km france métropolitaine" width="150"></a>1. Grille</td>
        		         <td><a href="illustrations/tous/9_4_principe_union.png" ><img src="illustrations/tous/9_4_principe_union.png" alt="résultat de l'union grille-données CLC vignes" width="150"></a>2. Union</td>
        		         <td><a href="illustrations/tous/9_4_principe_agreg.png" ><img src="illustrations/tous/9_4_principe_agreg.png" alt="résultat de l'agrégation par maille de la surface en vignes avec discrétisation" width="150"></a>3. Agrégation</td>
        		         <td><a href="illustrations/tous/9_4_principe_raster.png" ><img src="illustrations/tous/9_4_principe_raster.png" alt="résultat de la rastérisation avec discrétisation" width="150"></a>4. Rastérisation</td>
        		     </tr>
        		 </table>
        		 
        		 <p>Si ça n'est pas clair, ne vous inquiétez pas, tout devrait s'éclaircir par la pratique&nbsp;!</p>
        			 
        	   <h3>Créer une grille<a class="headerlink" id="IX42" href="#IX42"></a></h3>
        		  
    		      <p>Première étape : créer une grille. Elle devra avoir la même emprise que la couche de départ, et pour que les temps de calcul soient raisonnables nous utiliserons une taille de maille de 50 km.</p>
    		      
    		      <div class="manip">
    		          <p>Ouvrez un nouveau projet QGIS, chargez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_FR_RGF.shp</a></em> située dans le dossier <b>TutoQGIS_09_AnalyseSpat/donnees</b>.</p>
    		          <p>Vous pouvez également chargez la couche de pays <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">ne_50m_admin_0_countries</a></em> qui nous aidera à nous repérer.</p>
    		          <p>Pour comprendre les données CLC, ouvrez la table attributaire, qui comporte 3 champs&nbsp;:</p>
    		          <ul>
    		              <li class="espace"><b>CODE_00</b> correspond au type d'occupation du sol. Pour connaître la signification des codes, lisez le fichier <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC_nomenclature.xls</a></em> dans le dossier <b>TutoQGIS_09_AnalyseSpat/metadonnees</b>.</li>
    		              <li class="espace"><b>AREA_HA</b> correspond à la surface en hectares (1 ha = 10&nbsp;000 m&#178;)</li>
    		              <li class="espace">et <b>ID</b> est un champ d'identifiant unique</li>
    		          </ul>
                      <div class="question">
                    		<input type="checkbox" id="faq-1">
                    		<p><label for="faq-1">Quel est le CRS de cette couche&nbsp;? (réflexe !!!)</label></p>
                    		<p class="reponse">Le SCR de cette couche est <b>IGNF:LAMB93</b> équivalent au RGF93/Lambert93 code EPSG 2154.</p>
                      </div>
    		          <p>Laissons de côté ces données pour le moment, et créons la grille. Pour cela, ouvrez la boîte à outils et faites une recherche sur le mot <b>grille</b>&nbsp;:</p>
    		          <figure>
        			     <a href="illustrations/tous/9_4_toolbox_grille.png" >
        			         <img src="illustrations/tous/9_4_toolbox_grille.png" alt="Recherche du mot grille dans la boîte à outils et emplacement de l'outil 'créer une grille'" width="450">
        			     </a>
        			 </figure>
        			 <p>Double-cliquez sur l'outil <b>Créer une grille</b> dans la rubrique <b>Création de vecteurs</b>.</p>
        			 <figure>
        			     <a href="illustrations/tous/9_4_grille_fenetre.png" >
        			         <img src="illustrations/tous/9_4_grille_fenetre.png" alt="Paramétrage de l'outil 'créer une grille'" width="600">
        			     </a>
        			 </figure>
        			 <ul>
        			     <li class="espace"><b>Type de grille</b>&nbsp;: choisir <b>rectangle</b> (et notez au passage qu'on peut également créer des mailles hexagonales)</li>
        			     <li class="espace"><b>Étendue de la grille</b>&nbsp;: cliquez sur le bouton <b>...</b> tout à droite &#8594; <b>Calculer depuis la couche</b> &#8594; <b>CLC00_FR_RGF</b></li>
        			     <li class="espace"><b>Espacement horizontal et vertical</b>&nbsp;: puisque nous voulons une taille de maille de 50 km et que nos données sont dans un SCR projeté, donc en mètres, tapez <b>50&nbsp;000</b> pour ces 2 paramètres</li>
        			     <li class="espace"><b>Grille</b>&nbsp;: cliquez sur le bouton <b>...</b> à droite pour spécifier l'emplacement et le nom de la grille qui sera créée &#8594; Enregistrer vers un fichier ou dans un GeoPackage, et nommez-la par exemple <b>grille_CLC_50km</b></li>
        			 </ul>
        			 <p>Ciquez sur <b>Exécuter</b>&nbsp;: la grille est automatiquement ajoutée à QGIS.</p>
        			 <figure>
        			     <a href="illustrations/tous/9_4_grille_resultat.png" >
        			         <img src="illustrations/tous/9_4_grille_resultat.png" alt="grille superposée aux données CLC et au fond NaturalEarth" width="400">
        			     </a>
        			 </figure>
        			 <p>Ouvrez la table attributaire de la grille&nbsp;:</p>
        			 <figure>
        			     <a href="illustrations/tous/9_4_grille_table.png" >
        			         <img src="illustrations/tous/9_4_grille_table.png" alt="Extrait de la table attributaire de la grille" width="500">
        			     </a>
        			 </figure>
        			 <p>La table comporte un champ d'identifiant unique, et 4 champs correspondant aux coordonnées minimales et maximales de chaque case. Les cases sont numérotées de haut en bas et de gauche à droite.</p>
    		      </div>
    		      
    		      <p>Notre but est de récupérer pour chaque case la surface en vigne correspondante. Nous allons voir maintenant que pour cela, l'union fait la force&nbsp;! (et l'agrégation aussi).</p>
    			
    		   <h3>Union&nbsp;!<a class="headerlink" id="IX43" href="#IX43"></a></h3>
    			 
    		     <p>Qu'est-ce que l'union&nbsp;? Il s'agit d'une opération du même type que l'intersection, mettant en jeu 2 couches. A la différence de l'intersection où seules les parties communes aux 2 couches sont gardées, on récupère après une union les parties communes mais aussi les parties présentes dans une seule des couches.</p>
    		     <p>La couche résultat est une couche &#171;&nbsp;à plat&nbsp;&#187;, sans superposition.</p>
    		     <figure>
    		         <a href="illustrations/tous/9_4_union_principe.svg" >
    			         <img src="illustrations/tous/9_4_union_principe.png" alt="Explication union : couches en entrée et couche résultat" width="600">
    			     </a>
    			     <figcaption>Union : couche en entrée 1, couche en entrée 2 et couche résultat : elle contient 3 polygones distincts, sans superposition.</figcaption>
    		     </figure>
    		     
    		     <p>Notre but sera ici de faire une union entre la grille et les données CLC sur la vigne. La première étape sera de ne garder que les données CLC qui nous intéressent.</p>
    		     <p class="attention">Cette étape n'est pas nécessaire si vous utilisez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_221_FR_RGF</a></em> disponible en téléchargement.</p>
    		     <p>Il existe plusieurs possibilités pour cela, on pourrait par exemple sélectionner les vignes avec une requête attributaire puis exporter la sélection pour en faire une nouvelle couche.</p>
    		     <p>Pour changer un peu, nous allons ici <a href="01_02_info_geo.php#I23c" >filtrer</a> les données, ce qui permet de n'afficher que les données répondant à un critère, à la fois dans la table et sur la carte.</p>
    		     <p class="note">Quelle que soit la méthode choisie, l'important est de garder les données originales, pour pouvoir y revenir en cas de besoin&nbsp;!</p>
    		     
    		     <div class="manip">
    		         <p>Il faut d'abord rechercher quel est le code correspondant au vignoble&nbsp;: ouvrez le fichier <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC_nomenclature.xls</a></em> dans le dossier <b>TutoQGIS_09_AnalyseSpat/metadonnees</b>.</p>
    		         <p>Recherchez le code correspondant au vignoble&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_code_vignoble.png" >
        			         <img src="illustrations/tous/9_4_code_vignoble.png" alt="fichier tableur avec le code 2210 pour le vignoble" width="500">
        			     </a>
    			     </figure>
    			     <p>Il s'agit du code <b>2210</b>.</p>
    		         <p>Clic-droit sur la couche <em class="data">CLC00_FR_RGF</em> &#8594; <b>Filtrer...</b>&nbsp;:</p>
    		         <p>Utilisez l'expression <b>"CODE_00" = '221'</b> pour ne garder que les entités ayant pour valeur 221 pour le champ CODE_00, qui correspondent donc aux vignes.</p>
    		         <p class="note">Si besoin référez-vous <a href="01_02_info_geo.php#I23c" >ici</a>&nbsp;!</p>
    		     </div>
    		     
    		     <p>A ce stade, votre projet doit donc ressembler à ceci&nbsp;:</p>
    		     <figure>
    		         <a href="illustrations/tous/9_4_couches.png" >
    			         <img src="illustrations/tous/9_4_couches.png" alt="projet QGIS avec les 3 couches CLC vignes, grille et fonds Natural Eartg" width="500">
    			     </a>
    		     </figure>
    		     
    		     
    		     <div class="manip">
    		         <p>Nous pouvons maintenant procéder à l'union. Comme d'habitude, pour trouver l'outil adéquat, utilisez la barre de recherche de la boîte à outils avec le mot <b>union</b>&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_union_toolbox.png" >
        			         <img src="illustrations/tous/9_4_union_toolbox.png" alt="Emplacement de l'outil Union dans la boîte à outils" width="330">
        			     </a>
    			     </figure>
    		         <p>Double-cliquez sur <b>Union</b> dans la rubrique <b>Recouvrement de vecteur</b>&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_union_fenetre.png" >
        			         <img src="illustrations/tous/9_4_union_fenetre.png" alt="Paramétrage de l'outil d'union" width="600">
        			     </a>
    			     </figure>
    			     <ul>
    			         <li class="espace">Couche source et couche de superposition&nbsp;: choisissez <b>grille_CLC_50km</b> et <b>CLC00_FR_RGF</b>. Il est possible de choisir l'une ou l'autre des couches en premier, seul l'ordre des champs changera dans la table attributaire.</li>
    			         <li class="espace">Union&nbsp;: cliquez sur le bouton <b>...</b> à droite, et enregistrez le résultat au format shapefile ou GeoPackage. Nommez-le par exemple <b>union_grille50km_CLC</b>.</li>
    			     </ul>
    			     <p><b>Exécuter</b>, patientez...</p>
    			     <p>Vous pouvez vérifiez dans le résultat que l'union a bien été exécuté, les vignobles ayant été découpés selon les cases de la grille&nbsp;:</p>
    			     <figure>
    			         <a href="illustrations/tous/9_4_union_resultat.png" >
        			         <img src="illustrations/tous/9_4_union_resultat.png" alt="aperçu de la couche d'union avec sélection d'un polygone de vignes" width="250">
        			     </a>
    			     </figure>
    			     <p>Ouvrez la table attributaire&nbsp;:</p>
    			     <figure>
    			         <a href="illustrations/tous/9_4_union_table.png" >
        			         <img src="illustrations/tous/9_4_union_table.png" alt="aperçu de la table attributaire de la couche d'union" width="600">
        			     </a>
    			     </figure>
    			     <p>Les champs des 2 couches en entrée sont présents.</p>
    			  </div>
        			  
        	   <h3>Recalcul de la surface<a class="headerlink" id="IX44" href="#IX44"></a></h3>
        			     
    		     <p>Notre but étant de calculer la surface en vigne par maille, nous allons mettre à jour le champ AREA_HA. En effet, les valeurs contenues dans ce champ correspondent à la surface des polygones avant découpage et ne sont donc pas à jour.</p>
    		     <p>Il faut donc recalculer la surface de chaque polygone, et mettre une surface nulle pour les polygones ne correspondant pas à la vigne (sélectionné en jaune ci-dessous par exemple)&nbsp;:</p>
    		     <figure>
    		         <a href="illustrations/tous/9_4_non_vigne.png" >
    			         <img src="illustrations/tous/9_4_non_vigne.png" alt="polygone 'de fond' sélectionné en jaune" width="600">
    			     </a>
    		     </figure>
    		     <p>Ces polygones étaient présent uniquement dans la couche de grille, ils n'ont donc pas reçu d'attributs de la couche de vignes&nbsp;: <b>les champs ID_2, CODE_00 et AREA_HA ont une valeur nulle</b>.</p>
    		     
    		     <p class="note">Il serait possible de sauter cette étape et de recalculer la surface à partir de l'outil d'agrégation. Mais pour plus de clarté nous séparerons les 2 étapes&nbsp;!</p>
    		     
    		     <div class="manip">
    		         <p>Passez en <a href="05_02_points.php#V21">mode édition</a> pour la couche d'union, et ouvrez la <a href="07_02_calculer.php">calculatrice de champ</a> à partir de la table attributaire&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_recalc_fenetre.png" >
        			         <img src="illustrations/tous/9_4_recalc_fenetre.png" alt="fenêtre de la calculatrice de champ avec la formule pour recalculer la surface" width="600">
        			     </a>
    			     </figure>
    			     <ul>
    			         <li class="espace">Vérifiez que la case <b>Ne mettre à jour que les entités sélectionnées</b> tout en haut soit décochée (elle est désactivée si aucune entité n'est sélectionnée)</li>
    			         <li class="espace">Cochez la case <b>Mise à jour d'un champ existant</b> en haut à droite...</li>
    			         <li class="espace">et choisissez le champ en question dans la liste en-dessous&nbsp;: <b>AREA_HA</b></li>
    			         <li class="espace">Nous allons utiliser une fonction conditionnelle pour ne calculer la surface que pour les polygones de vignes, c'est-à-dire dont la valeur pour le champ AREA_HA n'est pas nulle. Nous utiliserons donc la fonction <b>if</b> (rubrique Conditions) dont vous pouvez lire l'aide.</li>
    			         <li class="espace">L'expression est donc la suivante : <b> if("AREA_HA" is not null, $area/10000, 0)</b>. Cela signifie que si le champ AREA_HA n'a pas de valeur nulle, il sera recalculé selon l'expression <b>$area/10000</b>, c'est-à-dire la surface en hectares, et sinon il prendra la valeur zéro.</li>
    		         </ul>
    		         <p>Cliquez sur <b>OK</b>, vérifiez le résultat dans la table attributaire, et <a href="05_02_points.php#V24">quittez le mode édition</a> en enregistrant les modifications.</p>
    		     </div>
    		     
    		     <p>Il ne nous reste plus qu'à agréger cette surface par maille&nbsp;!</p>
    			     
    			 
    		   <h3>Agrégation des données par maille<a class="headerlink" id="IX45" href="#IX45"></a></h3>
    			 
    		     <p>Cette opération consiste à <b>additionner les surfaces en vignes par maille pour récupérer la surface totale en vigne pour chaque maille</b>. La couche résultat aura donc la même géométrie que la grille, mais avec en attribut pour chaque case la surface en vigne.</p>
    		     <p>Pour le logiciel, cette opération correspond à <b>fusionner toutes les entités ayant la même valeur pour le champ id</b> (identifiant de la maille) en <b>récupérant pour les entités fusionnées la somme des valeurs du champ AREA_HA</b> (surface en vignes).</p>
    		     
    		     <div class="manip">
    		         <p>L'outil permettant cela se nomme <b>agrégation</b>&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_agreg_toolbox.png" >
        			         <img src="illustrations/tous/9_4_agreg_toolbox.png" alt="emplacement de l'outil d'agrégation dans la boîte à outils" width="300">
        			     </a>
    			     </figure>
    			     <figure>
    			         <a href="illustrations/tous/9_4_agreg_fenetre.png" >
        			         <img src="illustrations/tous/9_4_agreg_fenetre.png" alt="Paramétrage de l'outil d'agrégation" width="600">
        			     </a>
    			     </figure>
    			     <ul>
    			         <li class="espace">Couche source : votre couche d'union</li>
    			         <li class="espace">Grouper par expression : les entités ayant la même valeur pour le champ choisi ici seront fusionnées, choisir le champ <b>id</b> correspondant à l'identifiant unique des cases de la grille</li>
    			         <li class="espace">Agrégats : on peut définir dans cette partie quels champs garder, et pour ceux-ci quelle fonction d'agrégation utiliser. On peut par exemple&nbsp;:
    			             <ul>
    			                 <li>supprimer les champs <b>left, top, right, bottom</b> issus de la grille, et <b>ID_2 et CODE_00</b> issus de la couche CLC, puisqu'ils ne nous seront pas utiles</li>
    			                 <li>garder le champ <b>id</b> (identifiant de la grille), avec la fonction d'agrégation <b>first value</b>&nbsp;: l'entité fusionnée aura la première valeur rencontrée pour ce champ (sachant que de toute manière toutes les valeurs seront égales puisqu'on fusionne selon ce champ)</li>
    			                 <li>garder le champ <b>AREA_HA</b> puisque c'est notre but, avec la fonction d'agrégation <b>sum</b> pour faire la somme de toutes les valeurs rencontrées pour une même case. Au passage, on en profite pour le renomme <b>VIGNE_HA</b> et en faire un champ de type <b>entier</b>, puisque les virgules à cette échelle n'auront pas vraiment de sens.</li>
    			             </ul>
    			         </li>
    			         <li class="espace">Agrégé&nbsp;: comme d'habitude, cliquez sur <b>...</b> tout à droite pour spécifier le nom et l'emplacement du résultat, au format GeoPackage ou shapefile.</li>
    			     </ul>
    			     <p><b>Exécuter</b>, patientez... et admirez le résultat :</p>
    			     <figure>
    			         <a href="illustrations/tous/9_4_agreg_resultat.png" >
        			         <img src="illustrations/tous/9_4_agreg_resultat.png" alt="Couche d'agrégation" width="350">
        			     </a>
    			     </figure>
    			     <p>La couche a la même géométrie que notre grille, avec un champ supplémentaire indiquant pour chaque case la surface en vignes correspondante.</p>
    			     <p class="note">Selon que votre couche est au format GeoPackage ou non, un champ fid sera présent ou non.</p>
    			     <p>En modifiant le style de cette couche, on peut avoir un aperçu de la répartition des vignes en France, par exemple avec un style gradué et 7 classes selon une discrétisation de Jenks&nbsp;, et en filtrant pour ne garder que les valeurs différentes de zéro&nbsp;:</p>
    			     <figure>
    			         <a href="illustrations/tous/9_4_agreg_discretisation.png" >
        			         <img src="illustrations/tous/9_4_agreg_discretisation.png" alt="discrétisation en 7 classes de la surface en vigne (Jenks) sur les valeurs non nulles" width="350">
        			     </a>
    			     </figure>
    		     </div>
    		     
    		     <p>Bien sûr, le résultat serait différent avec une autre taille de maille. La répartition n'est pas la même selon l'échelle à laquelle on travaille.</p>
    			 
    			 
    		   <h3>Rastérisation<a class="headerlink" id="IX46" href="#IX46"></a></h3>
    			 
    		     <p>On pourrait s'arrêter là... Mais nous allons faire une étape de plus, pour transformer notre couche de vecteur en couche raster, où 1 maille = 1 pixel.</p>
    		     <p>Pourquoi cette opération&nbsp;? Les données raster sont moins lourdes, et nous n'aurons pas de perte de précision puisque chaque maille correspondra à un pixel. Nous pourrons ensuite très facilement faire des opérations telles que soustraire 2 maillages pour 2 années différentes afin de voir l'évolution entre ces 2 années.</p>
    		     <p>Un autre avantage, plus minime, est au niveau de la représentation&nbsp;: sur une couche vecteur, même avec aucun contour, ceux-ci sont toujours légèrement visibles, ce qui n'est pas le cas avec un raster.</p>
    		     
    		     <div class="manip">
    		         <p>Nous allons utiliser l'outil <b>rasteriser (vecteur vers raster)</b> de la boîte à outils&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_raster_toolbox.png" >
        			         <img src="illustrations/tous/9_4_raster_toolbox.png" alt="emplacement de l'outil gdal rasteriser (vecteur vers raster) dans la boîte à outils" width="300">
        			     </a>
    			     </figure>
                    <figure>
    			         <a href="illustrations/tous/9_4_raster_fenetre.png" >
        			         <img src="illustrations/tous/9_4_raster_fenetre.png" alt="paramétrage de l'outil gdal rasteriser (vecteur vers raster)" width="550">
        			     </a>
    			     </figure>
    			     <ul>
    			         <li class="espace">Couche source&nbsp;: il s'agit de la couche à rastériser, ici notre couche issue de l'agrégation</li>
    			         <li class="espace">Champ à utiliser pour la valeur fixe à créer&nbsp;: choisissez ici le champ qui sera utilisé pour déterminer les valeurs des pixesls, donc <b>VIGNE_HA</b></li>
    			         <li class="espace">Unité du raster résultat&nbsp;: nous allons spécifier non pas un nombre de pixels en largeur et hauteur pour le futur raster, mais une taille de pixels en mètres, choisir donc <b>Unités géoréférencées</b></li>
    			         <li class="espace">Largeur/Résolution horizontale et Hauteur/Résolution verticale : tapez la largeur et hauteur de chaque pixel en mètres, soit <b>50&nbsp;000</b> puisque notre grille a une résolution de 50 km</li>
    			         <li class="espace">emprise du résultat&nbsp;: cliquez sur les <b>...</b> à droite pour spécifier une couche modèle pour l'emprise du futur raster, par exemple la grille en entrée, ou la couche d'agrégation</li>
    			         <li class="espace">Rastérisé&nbsp;: spécifiez un nom et un emplacement pour le raster, ainsi que son format&nbsp;: <b>TIF</b></li>
    			     </ul>
    			     <p>Par défaut, les valeurs égales à 0 ne sont pas représentées&nbsp;:</p>
    			     <figure>
    			         <a href="illustrations/tous/9_4_raster_resultat1.png" >
        			         <img src="illustrations/tous/9_4_raster_resultat1.png" alt="Raster résultat avec le style par défaut" width="300">
        			     </a>
    			     </figure>
    		     </div>
    		     
    		     <p>Ce comportement peut être modifié en allant dans les propriétés de la couche &#8594; Transparence et en décochant la case <b>Aucune valeur de données</b>.</p>
    		     
    		     <div class="manip">
    		         <p>Pour afficher la répartition des vignes, modifiez le style de la couche en choisissant le type de rendu <b>pseudo-couleur à bande unique</b>, par exemple avec une représentation en couleur continue&nbsp;:</p>
    		         <figure>
    			         <a href="illustrations/tous/9_4_couleur_continue.png" >
        			         <img src="illustrations/tous/9_4_couleur_continue.png" alt="Style du raster pour une représentation en couleur continue" width="600">
        			     </a>
    			     </figure>
    			     <figure>
    			         <a href="illustrations/tous/9_4_raster_resultat2.png" >
        			         <img src="illustrations/tous/9_4_raster_resultat2.png" alt="Raster résultat en couleur continue" width="300">
        			     </a>
    			     </figure>
    		     </div>
    		     
    		     <p>Avec cette représentation utilisant une interpolation linéaire, contrairement à ce que la fenêtre pourrait laisser croire, il n'y a pas de classes : chaque valeur correspond à une couleur unique, en étirant les couleurs de début et de fin du dégradé pour les faire correspondre aux valeurs minimales et maximales.</p>
    		     
    		     <p>Bravo&nbsp;! Vous êtes arrivés au résultat final&nbsp;!</p>
    		     
    		     <p>Vous aurez remarqué que nous avons dû procéder en plusieurs étapes, avec pour chaque étape différents paramètres à spécifier. Si nous voulons relancer cette opération pour une autre couche en entrée, il va nous falloir tout recommencer. A moins que&nbsp;?</p>
		 
				
				<br>
				<a class="prec" href="09_03_vecteur_raster.php">chapitre précédent</a>
				<a class="suiv" href="09_05_maillage_sql.php">à moins que</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_9.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
