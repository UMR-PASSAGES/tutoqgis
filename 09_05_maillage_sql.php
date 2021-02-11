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
			<h2>IX.4  Application 2&nbsp;: dites-le avec du SQL !</h2>
				<ul class="listetitres">
					<li><a href="#IX41">Créer un maillage avec les outils QGIS</a>
					   <ul class="listesoustitres">
							<li><a href="#IX41a">Principe</a>
							<li><a href="#IX41b">Création d'une grille</a>
							<li><a href="#IX41c">Union&nbsp;!</a>
							<li><a href="#IX41d">Recalcul de la surface</a>
							<li><a href="#IX41e">Agrégation des données par maille</a>
							<li><a href="#IX41f">Rastérisation</a>
						</ul>
					</li>
					<li><a href="#IX42">Créer un maillage avec un modèle&nbsp;?</a></li>
					<li><a href="#IX43">Créer un maillage avec des requêtes SQL</a></li>
					<li><a href="#IX44">Évolution temporelle&nbsp;: soustraction de 2 maillages</a></li>
				</ul>
				<br>
				
						 
			   <p>Comment faire pour automatiser les opérations réalisées au <a href="09_04_maillage.php" >chapitre précédent</a>, afin de pouvoir rendre le processus plus reproductible&nbsp;?</p>
			   <p>Une première solution serait d'utiliser un <b>modèle</b>. Nous ne verrons pas ici le pas à pas pour créer le modèle en question, mais vous pouvez essayer vous-même en vous référant <a href="11_03_modeleur.php" >ici</a>&nbsp;!</p>
			   <p class="note">Et un jour j'ajouterai le modèle en question en téléchargement...</p>
			
			   <p>Une autre solution pour automatiser ce traitement est d'utiliser des requêtes SQL. Il s'agit d'une partie &#171;&nbsp;pour aller plus loin&nbsp;&#187; et vous pouvez très bien décider de vous arrêter ici&nbsp;! Nous nous appuierons sur <a href="06_04_req_sql.php" >cette partie</a>.</p>
			   
			   <p>Il est possible d'utiliser 2 logiciels différents à partir de QGIS pour lancer des requêtes SQL&nbsp;:</p>
			   <ul>
			     <li class="espace"><b>SQLite et son module spatial SpatiaLite</b> ne nécessitent pas d'installation, mais les fonctions disponibles sont plus limitées que celles de Postgresql/PostGIS</li>
			     <li class="espace"><b>Postgresql et son module spatial PostGIS</b> doivent être installés en plus de QGIS, mais une fois cette opération réalisée beaucoup de possibilités s'offriront à vous&nbsp;!</li>
			   </ul>
               <p>Il n'y a pas une solution meilleure qu'une autre mais elles répondent à des besoins différents.</p>
               <p><b>Pour cet exercice les 2 logiciels peuvent être utilisés.</b> Si vous choisissez Postgresql/PostGIS, l'installation ne sera pas détaillée ici mais on trouve de nombreuses ressources sur internet. La syntaxe étant légèrement différente d'un logiciel à l'autre, les requêtes seront proposées en 2 versions&nbsp;!</p>			
			
			   <h3>Création d'une base SpatiaLite ou PostGIS et import des données<a class="headerlink" id="IX51" href="#IX51"></a></h3>
			   <h3>Création d'une grille<a class="headerlink" id="IX52" href="#IX52"></a></h3>
			   <h3>Union et agrégation<a class="headerlink" id="IX53" href="#IX53"></a></h3>
			   <h3>Pour finir...<a class="headerlink" id="IX54" href="#IX54"></a></h3>
			
			
			   <h3>Évolution temporelle&nbsp;: soustraction de 2 maillages<a class="headerlink" id="IX55" href="#IX55"></a></h3>
			
				
					
		
				<br>
				<a class="prec" href="09_03_vecteur_raster.php">chapitre précédent</a>
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
