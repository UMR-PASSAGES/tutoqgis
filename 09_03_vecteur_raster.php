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
			<h2>IX.3  Analyse spatiale : croisement de données vecteur et raster</h2>
				<ul class="listetitres">
					<li><a href="#IX31">Préparation des données : un seul SCR pour tous</a></li>
					<li><a href="#IX32">Trouver l'outil : installation d'une extension</a></li>
					<li><a href="#IX33">Calcul de pente pour chacun des points d'une couche</a></li>
				</ul>
				<br>
				
			<p>Pour compléter ce chapitre, voici un exemple d'analyse mettant en jeu données vecteur et raster : en partant d'une couche de pente, et d'une couche de points représentant des échantillons, nous allons calculer la valeur de la pente pour chacun des échantillons.</p>	
		

			<h3><a class="titre" id="IX31">Préparation des données : un seul SCR pour tous</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS, ajoutez-y la couche créée en <a href="09_02_raster.php#IX23" >IX.2.3</a> <em class="data">pente_jamaique_JAD2001.tif</em>.</p>
					<p>Ajoutez également la couche <em class="data">echantillons_jam</em> fournie dans le dossier <b>TutoQGIS_09_AnalyseSpat/donnees</b>.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Dans quel(s) SCR sont ces deux couches ?</label></p>
						<p class="reponse">La couche <em class="data">pente_jamaique_JAD2001.tif</em> est en <b>JAD2001 EPSG:3448</b> et la couche <em class="data">echantillons_jam</em> en <b>WGS84 EPSG:4326</b>.</p>
					</div>
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Comment vous-y prendriez-vous pour passer ces deux couches dans le même SCR ?</label></p>
						<p class="reponse">Il est possible soit de changer le SCR du raster, soit de changer le SCR du vecteur. Néanmoins, le temps de calcul est généralement moins long lorsqu'il s'agit de modifier le SCR d'une couche vecteur, en particulier pour une couche de points.</p>
					</div>
					<p>Sauvegardez la couche <em class="data">echantillons_jam</em> avec le SCR <b>JAD2001 EPSG:3448</b>, sous le nom <em class="data">echantillons_jam_JAD2001</em>. Référez-vous si nécessaire à la <a href="02_04_changer_systeme.php#II42" >partie II.4.2</a>. Ajoutez cette couche à QGIS.</p>
				</div>
			
			
			<h3><a class="titre" id="IX32">Trouver l'outil : installation d'une extension</a></h3>
			
				<p>Comment faire pour donner à chacun des points sa valeur de pente ?</p>
				<p>Il ne semble pas y avoir d'outil correspondant dans les menus vecteur et raster de QGIS. L'étape suivante est donc de faire une recherche parmi les extensions disponibles (ou bien dans un moteur de recherche, avec par exemple &#171; qgis raster point value &#187; comme mots clés).</p>
				
				<div class="manip">
					<p>Rendez-vous dans le menu <b>Extension &#8594; Installer/gérer les extensions</b> :</p>
					<figure>
						<a href="illustrations/tous/9_3_install_ext.png">
							<img src="illustrations/tous/9_3_install_ext.png" alt="installation de l'extension point sampling tool" height="380" >
						</a>
					</figure>
					<p>Dans la rubrique <b>En obtenir plus</b>, tapez <b>sampling</b> dans la partie filtre : plusieurs extensions sont trouvées. Lisez leurs descriptifs ; <b>Point sampling tool</b> semble correspondre à notre besoin. Installez cette extension.</p>
					<p>Fermez la fenêtre du gestionnaire d'extensions.</p>
				</div>
					
			<h3><a class="titre" id="IX33">Calcul de pente pour chacun des points d'une couche</a></h3>		
					
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/9_3_PST_icone.png" alt="icône Point sampling tool" >Point sampling tool est accessible soit via l'icône correspondante, soit via le menu
						<a class="thumbnail_bottom" href="#thumb">Extension &#8594; Analyses &#8594; Point sampling tool
							<span>
								<img src="illustrations/tous/9_3_PST_menu.png" alt="Extension, Analyses, Point sampling tool" height="120" >
							</span>
						</a>
					.</p>
					
					<p><b>Onglet General :</b></p>
					<figure>
						<a href="illustrations/tous/9_3_PST_fenetre_01.png">
							<img src="illustrations/tous/9_3_PST_fenetre_01.png" alt="Fenêtre de point sampling tool, onglet general" height="450" >
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Layer containing sampling points :</b> vérifiez que <em class="data">echantillons_jam_2001</em> soit bien sélectionnée dans la liste</li>
						<li class="espace"><b>Layer with fields/bands to get values from :</b> il s'agit des couches dans les attributs seront repris dans la nouvelle couche. Faites bien attention à sélectionner <b>les deux couches</b>, pour garder à la fois les identifiants des points et leur pente</li>
						<li class="espace"><b>Output point vector layer :</b> cliquez sur <b>Parcourir</b>, sélectionnez l'emplacement où la couche de points sera créée, tapez son nom : <em class="data">echantillons_jam_pente_JAD2001</em></li>
						<li class="espace"><b>Add created layer to the TOC :</b> vérifiez que cette case soit cochée pour ajouter directement la couche créée à QGIS</li>
					</ul>
					
					<p>Avant de cliquer sur OK, passez à <b>l'onglet Champs :</b></p>
					<figure>
						<a href="illustrations/tous/9_3_PST_fenetre_02.png">
							<img src="illustrations/tous/9_3_PST_fenetre_02.png" alt="Fenêtre de point sampling tool, onglet champs" height="450" >
						</a>
					</figure>
					<p>Si vous avez bien sélectionné les deux couches dans l'onglet général, vous voyez ici les champs de ces deux couches : id pour les points, et la pente pour le raster. Vous pouvez renommer les champs qui seront créés : renommez par exemple <b>pente_jama</b> en <b>pente</b>.</p>
					<p>Pour terminer, cliquez sur <b>OK</b>, fermez la fenêtre de l'extension.</p>
					
					<p>Vérifiez que la nouvelle couche contienne bien les mêmes 22 points qu'<em class="data">echantillons_jam_2001</em>.</p>
					<p>Ouvrez sa table attributaire : les 2 champs <b>id</b> et <b>pente</b> sont présents. La pente est renseignée pour chacun des points.</p>
					<figure>
						<a href="illustrations/tous/9_3_points_pente_table.png">
							<img src="illustrations/tous/9_3_points_pente_table.png" alt="table attributaire de la couche créée avec Point sampling tool, avec les 2 champs id et pente" height="400" >
						</a>
					</figure>
				</div>
		
				<br>
				<a class="prec" href="09_02_raster.php">chapitre précédent</a>
				<a class="suiv" href="10_00_carto.php">partie X : représentation et mise en page</a>
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
