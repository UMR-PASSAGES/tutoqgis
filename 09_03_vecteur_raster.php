<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">IX.  Analyse spatiale</h1>
			<h2>IX.3  Analyse spatiale : croisement de données vecteur et raster</h2>
				<ul class="listetitres">
					<li><a href="#IX31">Préparation des données&nbsp;: un seul SCR pour tous</a></li>
					<li><a href="#IX32">Attribuer à chaque point une valeur d'élévation</a></li>
				</ul>
				<br>
				
			<p>Pour compléter ce chapitre, voici un exemple d'analyse mettant en jeu données vecteur et raster : en partant d'une couche de pente, et d'une couche de points représentant des échantillons, nous allons calculer la valeur de la pente pour chacun des échantillons.</p>	
		

			<h3>Préparation des données&nbsp;: un seul SCR pour tous<a class="headerlink" id="IX31" href="#IX31"></a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche <em class="data">srtm_21_09.tif</em>.</p>
					<p>Ajoutez également la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">echantillons_jamaique_JAD2001</a></em> fournie dans le dossier <b>TutoQGIS_09_AnalyseSpat/donnees</b>. Cette couche correspond à la localisation de points d'études imaginaires.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Dans quel(s) SCR sont ces deux couches ?</label></p>
						<p class="reponse">On peut lire le SCR dans les propriétés de la couche, rubrique Source :</p>
						<p class="reponse">srtm_21_09.tif &#8594; WGS84 EPSG:4326</p>
						<p class="reponse">echantillons_jamaique_JAD2001 &#8594; JAD2001 EPSG:3448</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Comment vous-y prendriez-vous pour passer ces deux couches dans le même SCR ?</label></p>
						<p class="reponse">Il est possible soit de changer le SCR du raster, soit de changer le SCR du vecteur. Néanmoins, le temps de calcul est généralement moins long lorsqu'il s'agit de modifier le SCR d'une couche vecteur, en particulier pour une couche de points.</p>
					</div>
					<p><a href="02_04_changer_systeme.php#II42" >Modifiez le SCR de la couche</a> <em class="data">echantillons_jamaique_JAD2001</em> vers le <b>WGS84 EPSG:4326</b>. Nommez la nouvelle couche <em class="data">echantillons_jamaique_WGS84</em>.</p>
					<p>Supprimez de QGIS <em class="data">echantillons_jamaique_JAD2001</em>.</p>
					<p>Votre projet QGIS doit contenir uniquement les 2 couches <em class="data">echantillons_jamaique_WGS84</em> et <em class="data">srtm_21_09</em>. Vérifiez qu'elles sont toutes deux en WGS84.</p>
				</div>
				<p>Nous avons vu qu'il n'est pas toujours nécessaire de travailler avec des couches dans le même SCR, certains outils acceptant de croiser 2 couches dans 2 SCR différents. Cependant, cela reste une bonne pratique et peut éviter des problèmes&nbsp;!</p>
			
			
			<h3>Attribuer à chaque point une valeur d'élévation<a class="headerlink" id="IX32" href="#IX32"></a></h3>
			
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
					   <li class="espace">Couche de points en entrée : <em class="data">echantillons_jamaique_WGS84</em></li>
					   <li class="espace">Raster layer to sample : <em class="data">srtm_21_09</em></li>
					   <li class="espace">Préfixe de la colonne en sortie : vous pouvez taper par exemple <b>elev</b></li>
					   <li class="espace">Laissez l'option de sortie par défaut, pour créer une couche temporaire</li>
					</ul>
			     </div>
			     <p>Ici, notre raster ne possède qu'une seule bande. Certains raster en possèdent plusieurs, c'est le cas par exemple des images satellites qui ont différentes bandes pour le vert, le rouge, l'infrarouge etc.</p>
			     <p>Cet outil ajoutera autant de colonnes à la table de la couche de points que de bandes dans le raster. Ces champs auront en suffixe le numéro de bande (1, 2...), auquel il est donc possible de rajouter un préfixe.</p>
			     <p>Ici, le nouveau champ sera donc nommé elev1.</p>
			     <div class="manip">
					<p>Cliquez sur <b>Exécuter</b>, la couche temporaire est ajoutée et se nomme <b>Sampled Points</b>. Elle possède les mêmes géométries que la couche de points en entrée, et une colonne de plus dans sa table.</p>
					<p>Ouvrez sa table attributaire pour le vérifier : une colonne <b>elev1</b> a été ajoutée, où l'élévation de chaque point est renseignée.</p>
					 <figure>
						<a href="illustrations/9_3_table.jpg" >
							<img src="illustrations/9_3_table.jpg" alt="Table attributaire de la couche créée, avec la colonne elev_1" width="400" >
						</a>
					</figure>
				</div>
				<p>Attention toutefois, la résolution des données d'élévation est de 90 mètres : si les points représentent une location précise par exemple au mètre près, l'élévation que nous leur avons attribué n'aura pas cette précision.</p>
				<p>Nous avons vu ici un exemple très simple montrant qu'on peut croiser données vecteur et raster. Il est également possible de <b>transformer des données vecteur en raster (rastérisation) et inversement (polygonisation)</b>.</p>
				<p>Par exemple, on peut vouloir rasteriser une série de couches vecteurs surfaciques pour pouvoir les additionner facilement, ou bien vectoriser une couche raster représentant des zones pour pouvoir y affecter des données attributaires...</p>
				<p>Chaque type de données a une utilisation différente, mais il est utile de garder à l'esprit que les 2 existent&nbsp;!</p>
					
		
				<br>
				<a class="prec" href="09_02_raster.php">chapitre précédent</a>
				<a class="suiv" href="09_04_maillage.php">chapitre suivant</a>
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
