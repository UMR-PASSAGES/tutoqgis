<?php include('head.inc.php');?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php');?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">IX.  Analyse spatiale</h1>
			<h2>Croiser vecteur et raster</h2>
				<ul class="listetitres">
					<li><a href="#IX31">Récupérer des informations d'un raster vers un vecteur</a>
					   <ul class="listesoustitres">
				       <li><a href="#IX31a">Attribuer à des point les données d'un raster</a></li>
				       <li><a href="#IX31b">Attribuer à des polygones les données d'un raster</a></li>
					   </ul>
					</li>
					<li><a href="#IX32">Raster vers vecteur&nbsp;: polygonisation</a></li>
				</ul>
				<br>
				
			<p>Pour compléter ce chapitre, voici des exemples de manipulations mettant en jeu données vecteur et raster&nbsp;: en partant d'une couche d'élévation, et d'une couche de points représentant des échantillons, nous allons calculer la valeur de l'élévation pour chacun des échantillons. Si on utilise une couche de polygones au lieu d'une couche de points, on peut récupérer pour chaque polygone une valeur moyenne d'élévation par exemple.</p>
			<p>Il est aussi possible de passer d'un type à l'autre&nbsp;: nous verrons transformer une couche raster en une couche vecteur, le cas inverse étant traité <a href="09_04_maillage.php#IX46">un peu plus loin</a>.</p>	
		

			<h3>Récupérer des informations d'un raster vers un vecteur<a class="headerlink" id="IX31" href="#IX31"></a></h3>
			
			  <p>L'idée est ici de croiser des données raster et vecteur, pour récupérer dans le vecteur les valeurs du raster.</p>
			
  			<h4>Attribuer à des point les données d'un raster<a class="headerlink" id="IX31a" href="#IX31a"></a></h4>
  			
  				<div class="manip">
  					<p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche <em class="data">srtm_21_09.tif</em>.</p>
  					<p>Ajoutez également la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">echantillons_jamaique_JAD2001</a></em> fournie dans le dossier <b>TutoQGIS_09_AnalyseSpat/donnees</b>. Cette couche correspond à la localisation de points d'études imaginaires.</p>
  					<div class="question">
  						<input type="checkbox" id="faq-1">
  						<p><label for="faq-1">Dans quel(s) SCR sont ces deux couches&nbsp;?</label></p>
  						<p class="reponse">On peut lire le SCR dans les propriétés de la couche, rubrique Source&nbsp;:</p>
  						<p class="reponse">srtm_21_09.tif &#8594; WGS84 EPSG:4326</p>
  						<p class="reponse">echantillons_jamaique_JAD2001 &#8594; JAD2001 EPSG:3448</p>
  					</div>
  					<div class="question">
  						<input type="checkbox" id="faq-2">
  						<p><label for="faq-2">Comment vous-y prendriez-vous pour passer ces deux couches dans le même SCR&nbsp;?</label></p>
  						<p class="reponse">Il est possible soit de changer le SCR du raster, soit de changer le SCR du vecteur. Le temps de calcul est généralement moins long lorsqu'il s'agit de modifier le SCR d'une couche vecteur, en particulier pour une couche de points. Cependant utiliser un SCR projeté comme le JAD2001 est plus pratique pour calculer des distances ou des surfaces. De plus, le JAD2001 est un système local donc plus précis que le WGS84. C'est donc celui-ci que nous allons utiliser ici (mais vous pourriez également faire l'exercice en passant la couche de points en WGS84).</p>
  					</div>
  					<p><a href="09_02_raster.php#IX24b" >Modifiez le SCR de la couche raster </a> <em class="data">srtm_21_09.tif</em> vers le <b>JAD2001 EPSG:3448</b>, au moyen de l'outil <b>Projection (warp)</b> disponible dans la Boîte à outils &#8594; GDAL &#8594; Projections raster. Nommez la nouvelle couche <em class="data">srtl_21_09_JAD2001</em>.</p>
  					<p>Supprimez la couche <em class="data">srtm_21_09</em>.</p>
  					<p>Votre projet QGIS doit contenir uniquement les 2 couches <em class="data">echantillons_jamaique_JAD2001</em> et <em class="data">srtm_21_09_JAD2001</em>. Vérifiez qu'elles soient toutes deux en JAD2001 EPSG:3448.</p>
  					<figure>
  						<a href="illustrations/9_3_2couches_JAD2001.jpg" >
  							<img src="illustrations/9_3_2couches_JAD2001.jpg" alt="Liste des couches&nbsp;: seules les 2 couches echantillons_jamaique_JAD2001 et srtm_21_09_JAD2001 sont présentes" width="300" >
  						</a>
  					</figure>
  				</div>
  				<p>Nous avons vu qu'il n'est pas toujours nécessaire de travailler avec des couches dans le même SCR, certains outils acceptant de croiser 2 couches dans 2 SCR différents. Cependant, cela reste une bonne pratique et peut éviter des problèmes&nbsp;!</p>
  			
  				<p>Comment faire pour donner à chacun des points sa valeur d'élévation&nbsp;? Il faut pour cela attribuer à chaque point la valeur du pixel qui le recouvre.</p>
  				<p>Une recherche dans la boîte à outils, rubrique Analyse Raster, permet de découvrir l'outil <b>Prélèvement des valeurs rasters vers ponctuels</b> qui semble correspondre à ce que l'on cherche.</p>
  				
  				<div class="manip">
  				    <p>
  				        <a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; Analyse raster &#8594; Prélèvement des valeurs rasters vers ponctuels
                  	<span>
                  		<img src="illustrations/9_3_prelev_raster_emplacement.jpg" alt="Emplacement de l'outil Prélever des valeurs raster dans la boîte à outils" width="350" >
                  	</span>
                  </a>
  				    </p>
  				    <figure>
  						<a href="illustrations/9_3_prelev_raster_fenetre.jpg" >
  							<img src="illustrations/9_3_prelev_raster_fenetre.jpg" alt="Fenêtre de l'outil de prélèvement des valeurs raster" width="600" >
  						</a>
  					</figure>
  					<ul>
  					   <li class="espace">Couche de points en entrée&nbsp;: <em class="data">echantillons_jamaique_JAD2001</em></li>
  					   <li class="espace">Raster layer to sample&nbsp;: <em class="data">srtm_21_09_JAD2001</em></li>
  					   <li class="espace">Préfixe de la colonne en sortie&nbsp;: vous pouvez taper par exemple <b>elev</b></li>
  					   <li class="espace">Laissez l'option de sortie par défaut, pour créer une couche temporaire</li>
  					</ul>
  			     </div>
  			     <p>Ici, notre raster ne possède qu'une seule bande. Certains raster en possèdent plusieurs, c'est le cas par exemple des images satellites qui ont différentes bandes pour le vert, le rouge, l'infrarouge etc.</p>
  			     <p>Cet outil ajoutera autant de colonnes à la table de la couche de points que de bandes dans le raster. Ces champs auront en suffixe le numéro de bande (1, 2...), auquel il est donc possible de rajouter un préfixe.</p>
  			     <p>Ici, le nouveau champ sera donc nommé elev1.</p>
  			     <div class="manip">
  					<p>Cliquez sur <b>Exécuter</b>, la couche temporaire est ajoutée et se nomme <b>Échantillonné</b>. Elle possède les mêmes géométries que la couche de points en entrée, et une colonne de plus dans sa table.</p>
  					<p>Ouvrez sa table attributaire pour le vérifier&nbsp;: une colonne <b>elev1</b> a été ajoutée, où l'élévation de chaque point est renseignée.</p>
  					 <figure>
  						<a href="illustrations/9_3_table.jpg" >
  							<img src="illustrations/9_3_table.jpg" alt="Table attributaire de la couche créée, avec la colonne elev_1" width="400" >
  						</a>
  					</figure>
  				</div>
  				<p>Attention toutefois, la résolution des données d'élévation est de 90 mètres&nbsp;: si les points représentent une location précise par exemple au mètre près, l'élévation que nous leur avons attribué n'aura pas cette précision.</p>
  				<p>Nous avons vu ici un exemple très simple montrant qu'on peut croiser données vecteur et raster. Nous allons maintenant faire une manip équivalente mais en utilisant une couche de polygones au lieu d'une couche de points.</p>
  				
  			<h4>Attribuer à des polygones les données d'un raster<a class="headerlink" id="IX31b" href="#IX31b"></a></h4>
  				
  				<p>Chaque polygone recouvrant a priori plusieurs pixels, il faudra définir une fonction d'agrégation si on veut récupérer pour chaque polygone les données d'un raster. Par exemple, on peut récupérer la valeur moyenne du raster sur l'ensemble du polygone, ou bien sa médiane, son minimum ou maximum...</p>
  				
  				<p>Nous allons commencer par créer une couche de polygones, et pour cela nous allons faire une zone tampon autour de notre couche de points.</p>
  				
  				<div class="manip">
  				  <p>Lancez l'outil <a href="09_01_vecteur.php#IX12">Tampon</a> de la boîte à outils (rubrique Géométrie vectorielle).</p>
            <figure>
  						<a href="illustrations/9_3_tampon_fenetre.jpg" >
  							<img src="illustrations/9_3_tampon_fenetre.jpg" alt="Fenêtre de l'outil Tampon&nbsp;: zone tampon de 1000m autour des points de echantillons_jamaique_JAD2001" width="600" >
  						</a>
  					 </figure>
  					 <ul>
  					   <li>Couche source&nbsp;: la couche de points <em class="data">echantillons_jamaique_JAD2001</em></li>
  					   <li>Distance&nbsp;: 1000 pour avoir des cercles de rayon 1km (notez que si la couche avait été en WGS84 l'unité aurait été le degré, ce qui est moins pratique)</li>
  					 </ul>
  					 <p>Le résultat devrait ressemble à ça&nbsp;:</p>
  					 <figure>
  						<a href="illustrations/9_3_resultat_tampon.jpg" >
  							<img src="illustrations/9_3_resultat_tampon.jpg" alt="Résultat de l'outil tampon&nbsp;: cercles de 1km autour des points" width="600" >
  						</a>
  					 </figure>
  					 <p>Il ne reste plus qu'à croiser cette couche de polygones avec le raster d'élévation.</p>
  					 <p>
  					   <a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; Analyse raster &#8594; Statistiques de zone&nbsp;:
              	<span>
              		<img src="illustrations/9_3_stats_zone_emplacement.jpg" alt="Outil de statistiques de zone dans la boîte à outils" height="250" >
              	</span>
                </a>
             </p>
             <figure>
  						<a href="illustrations/9_3_stats_zone.jpg" >
  							<img src="illustrations/9_3_stats_zone.jpg" alt="Fenêtre de l'outil de statistiques de zone" width="600" >
  						</a>
  					 </figure>
  					 <ul>
  					   <li>Couche source&nbsp;: <b>Mis en tampon</b> (couche temporaire créée précédemment</li>
  					   <li>Couche raster&nbsp;: le raster d'élévation <em class="data">srtm_21_09.tif</em></li>
  					   <li>Préfixe de la colonne en sortie&nbsp;: <b>elev_</b></li>
  					   <li>Statistiques à calculer&nbsp;: cliquez sur <b>...</b> et sélectionnez par exemple moyenne, médiane, min et max</li>
  					 </ul>
  					 <p>La couche en sortie a les mêmes géométries que la couche de polygones en entrée mais possède des colonnes en plus dans la table attributaire&nbsp;:</p>
  					 <figure>
  						<a href="illustrations/9_3_stats_zone_res.jpg" >
  							<img src="illustrations/9_3_stats_zone_res.jpg" alt="Table attributaire de la couche créée par l'outil de statistiques de zone" width="550" >
  						</a>
  					 </figure>
  				</div>
  				<p>On connait maintenant pour chaque polygone son élévation moyenne, médiane, minimum et maximum.</p>
  				
			<h3>Raster vers vecteur&nbsp;: polygonisation<a class="headerlink" id="IX32" href="#IX32"></a></h3>
  				
  			 <p>Ici, nous allons partir du résultat de la classification de <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Lidar">données LIDAR</a> au format raster GeoTiff, et polygoniser ces données. Cette opération pourra servir par exemple à faire des calculs sur la surface des différents types d'occupation du sol, les croiser avec d'autres données vecteur, cartographier plus facilement ces données...</p>
  			 
  			 <div class="manip">
           <p>Dans un nouveau projet QGIS, ajoutez la couche raster <em class="data">classif_lidar_prairies_rennes.tif</em>. Les pixels ont une valeur allant de 1 à 7&nbsp;; on peut voir à quoi correspondent ces valeurs dans les <a class="ext" target="_blank" href="https://geobretagne.fr/datahub/dataset/1f00268b-8510-4cdf-99f7-75b8d921ad71" >métadonnées de la couche</a>. Il n'y a pas de correspondance directe entre les chiffres de 1 à 7 et les types d'occupation du sol, mais la carte permet de faire le lien&nbsp;:</p>
           <figure>
						<a target="_blank" href="https://geobretagne.fr/datahub/dataset/1f00268b-8510-4cdf-99f7-75b8d921ad71" >
							<img src="illustrations/9_3_carte_lidar_rennes.jpg" alt="Carte de l'occupation du sol des prairies de Rennes produite par classification objet de données LIDAR" width="600" >
						</a>
					 </figure> 
					 <p>L'opération pour convertir cette couche raster en couche vecteur de polygones est simple&nbsp;:
					   <a class="thumbnail_bottom" href="#thumb">Boîte à outils &#8594; GDAL &#8594; Conversion raster &#8594; Polygoniser (raster vers vecteur)
              	<span>
              		<img src="illustrations/9_3_polygoniser_emplacement.jpg" alt="Emplacement de l'outil polygoniser dans la boîte à outils" height="200" >
              	</span>
              </a>
					 </p> 
					 
					 <figure>
						<a target="_blank" href="illustrations/9_3_polygoniser_fenetre.jpg" >
							<img src="illustrations/9_3_polygoniser_fenetre.jpg" alt="Fenêtre de l'outil de polygonisation" width="600" >
						</a>
					 </figure>
					 <ul>
					   <li>Couche source&nbsp;: le raster <em class="data">classif_lidar_prairies_rennes.tif</em></li>
					   <li>Nom du champ à créer&nbsp;: ce champ contiendra les valeurs du raster, ici des entiers de 1 à 7. Vous pouvez le nommer par exemple <b>OS</b> pour occupation du sol</li>
					 </ul>
					 <p>Cliquez sur <b>Exécuter</b>, patientez...</p>
					 <p>Les résultat doit ressembler à ça, avec un style catégorisé sur le champ OS (couleurs aléatoires)&nbsp;:</p>
					 <figure>
						<a target="_blank" href="illustrations/9_3_polygonisation_resultat.jpg" >
							<img src="illustrations/9_3_polygonisation_resultat.jpg" alt="Résultat de la classification&nbsp;: couche de polygones" width="600" >
						</a>
					 </figure>
  			 </div>
  			 
  			 <p>Si l'on veut récupérer les descriptions de chaque type d'occupation du sol, en se basant sur la carte contenue dans les métadonnées, il va falloir créer un nouveau champ et le remplir en fonction du champ OS. La fonction <em>CASE</em> sera utile pour cela.</p>
  			 
  			 <div class="manip">
  			   <p><img class="icone" src="illustrations/9_3_calc_champs_icone.jpg" alt="icône calculatrice de champs" >Ouvrez la table attributaire de la couche de polygones et cliquez sur la calculatrice de champs.</p>
  			   <figure>
						<a target="_blank" href="illustrations/9_3_calc_champs_case.jpg" >
							<img src="illustrations/9_3_calc_champs_case.jpg" alt="Calculatrice de champs avec expression utilisant CASE" width="600" >
						</a>
					 </figure>
					 <p>Ici on crée un champ <b>libelle_OS</b> de type <b>texte</b>.</p>
  			   <p>La fonction <a href="07_02_calculer.php#VII23c" >CASE</a> peut être utilisée pour le remplir en fonction des valeurs du champ <em>OS</em>&nbsp;:</p>
  			   <p class="code">CASE 
  WHEN  "OS" = 1 THEN 'Batiments'
  WHEN  "OS" = 2 THEN 'Surfaces artificialisées'
  WHEN  "OS" = 3 THEN 'Routes'
  WHEN  "OS" = 4 THEN 'Surfaces en eau'
  WHEN  "OS" = 5 THEN 'Strate herbacée'
  WHEN  "OS" = 6 THEN 'Strate arbustive'
  WHEN  "OS" = 7 THEN 'Strate arborée'
END</p>
           <p>Avec un style catégorisé sur ce nouveau champ&nbsp;:</p>
           <figure>
						<a target="_blank" href="illustrations/9_3_polygonisation_style.jpg" >
							<img src="illustrations/9_3_polygonisation_style.jpg" alt="Couche de polygones avec un style catégorisé sur le champ libelle_OS et les couleurs qui vont bien" width="600" >
						</a>
					 </figure>  
  			 </div>
  			 
  			 <p>Il est maintenant possible par exemple de créer une zone tampon autour d'un des types d'occupation du sol, comparer les bâtiments avec ceux de la BD TOPO IGN...</p>
		     
		     <p>L'opération inverse, passer d'une couche vecteur à une couche raster, est également possible et sera vue <a href="09_04_maillage.php#IX46">un peu plus loin</a>. Ces deux types de données ont chacun leurs avantages et inconvénients, et dans certains cas il est utile de savoir passer de l'un à l'autre&nbsp;!</p>
		     
		     <p>Dans le chapitre suivant, vous pourrez voir un exemple d'application mettant en jeu différents géotraitements.</p>
		
				<br>
				<a class="prec" href="09_02_raster.php">chapitre précédent</a>
				<a class="suiv" href="09_04_maillage.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php');?>
			<?php include('menus_verticaux_9.inc.php');?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php');?>

</div>
</body>
</html>
