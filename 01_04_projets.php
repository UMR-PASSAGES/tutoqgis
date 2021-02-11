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
			<h2>I.4  Espace de travail (projet QGS)</h2>
				<ul class="listetitres">
					<li><a href="#I31">Qu'est-ce qu'un projet dans un logiciel SIG ?</a></li>
					<li><a href="#I32">Comment un projet appelle-t-il les données ?</a></li>
				</ul>	
			
				<h3>Qu'est-ce qu'un projet dans un logiciel SIG ?<a class="headerlink" id="I31" href="#I31"></a></h3>
				
					<p>Un projet est un espace de travail. Sauvegarder un projet équivaut à sauvegarder le style utilisé pour chaque couche, le zoom... mais pas les données !</p>
					<p><b>Depuis la version 3 de QGIS, le format par défaut pour les projets est le QGZ et non plus le QGS</b>. Un fichier QGZ est en fait un fichier QGS plus d'autres informations compressées dans un seul fichier. Il est toujours possible d'ouvrir et d'enregistrer des projets au format QGS.</p>
					<p>L'intérêt du format QGZ par rapport au format QGS est de stocker plus d'informations directement dans le projet, par exemple les symboles utilisés, les polices, les rampes de couleurs, les emplacements des étiquettes...</p>
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/1_4_ouvrir_projet_icone.png" alt="Icône Ouvrir">
							<a class="thumbnail_bottom" href="#thumb">Ouvrez le projet
								<span>
									<img src="illustrations/tous/1_4_ouvrir_projet_menu.png" alt="Menu Projet, Ouvrir" height="350" >
								</span>
							</a>
							<em class="data"><a href="donnees/TutoQGIS_01_PriseEnMain.zip">senegal.qgz</a></em> situé dans le dossier  <b>TutoQGIS_01_PriseEnMain/projets</b>. Modifiez le zoom et le style des couches.
						</p>
						<p><img class="icone" src="illustrations/tous/1_4_sauvegarder_projet_sous_icone.png" alt="menu projet, sauvegarder sous..." >
							Enregistrez votre projet sous un nouveau nom : clic sur l'icône correspondante, ou bien 
							<a class="thumbnail_bottom" href="#thumb">Menu Projet &#8594; Enregistrer sous...
								<span>
									<img src="illustrations/tous/1_4_sauvegarder_projet_sous.png" alt="Menu Projet, sauvegarder sous" height="350" >
								</span>
							</a>				
						</p>
		
						<p>Enregistrez votre projet dans le répertoire <b>TutoQGIS_01_PriseEnMain/projets</b>, sous le nom <em class="data">senegal_02.qgz</em> . Cette opération crée un fichier au format QGZ.</p>
					</div>				
						<p class="note">Le fichier QGZ est l'équivalent du WOR sous MapInfo et du MXD sous ArcGIS.</p>
					<div class="manip">
						<p>Masquez QGIS, décompressez le fichier QGZ et ouvrez ensuite le fichier QGS au moyen d'un éditeur de texte type bloc-notes : vous pouvez y trouver le chemin des couches chargées dans le projet, la description des couleurs utilisées... Fermez ce fichier.</p>
					</div>
					<p>Il n'est bien sûr pas utile de comprendre en détail le contenu du fichier QGS, mais il est important de noter qu'il ne s'agit que <b>d'un fichier texte, qui va "appeler" les données</b>.</p>
					<p><b>Si vous fournissez à un collègue votre seul fichier QGZ ou QGS, sans les données correspondantes, ce collègue ne pourra pas visualiser les données !</b></p>
				
				
				<h3>Comment un projet appelle-t-il les données ?<a class="headerlink" id="I32" href="#I32"></a></h3>
				
				    <p>Le chemin des couches peut être stocké de deux manières dans le projet : </p>
					<ol>
						<li>soit <b>par rapport</b> à l'emplacement du QGZ ou QGS <b>(en relatif)</b></li>
						<li>soit <b>"en dur"</b>, sous la forme du chemin en entier</li>
					</ol>
					<p>1. Par exemple, <b>../donnees/LA_LOCALITE_P.gpkg</b> signifie qu'il faut remonter d'un dossier par rapport au dossier dans lequel est situé le projet, puis descendre dans le dossier donnees pour y trouver la couche LA_LOCALITE_P.gpkg</p>
					<p>2. Un exemple de chemin "en dur" : <b>D:/Travail/SIG/TutoQGIS_01_PriseEnMain/donnees/LA_LOCALITE_P.gpkg</b></p>
					<p>Dans QGIS, par défaut <b>les chemins sont sauvegardés en relatif</b>, ce qui permet de transmettre à un collègue un dossier avec par exemple un sous-dossier données et un sous-dossier projets.
					<p class="note">Si vous désirez changer ce comportement pour un projet, 
						<a class="thumbnail_top" href="#thumb">Menu Projet &#8594; Propriétés... &#8594; rubrique Général
							<span>
								<img src="illustrations/tous/1_4_proprietes_projet_general.png" alt="Menu Projet, Propriétés du projet, onglet Général" height="500">
							</span>
						</a>
						, changez la propriété <b>Enregistrer les chemins</b> de relatif à absolu.
					</p>
					<p><b>Si vous déplacez des couches et que vous ouvrez ensuite un projet qui utilise ces couches, vous obtiendrez un message d'erreur : le chemin des couches a changé et ne correspond plus à ce qui est indiqué dans le projet !</b></p>
					<p>Il sera néanmoins possible de spécifier à nouveau les emplacements des couches du projet.</p>

				<br>
				<a class="prec" href="01_03_formats.php">chapitre précédent</a>
				<a class="suiv" href="02_00_geodesie.php">partie II : géodésie</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>
			
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_1.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
