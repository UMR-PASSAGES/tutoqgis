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
			<h2>IX.4  Un exemple d'application&nbsp;: dites-le avec du SQL !</h2>
				<ul class="listetitres">
					<li><a href="#IX51">Création d'une nouvelle base et import des données</a>
					   <ul class="listesoustitres">
					       <li><a href="#IX51a">Création d'une base SpatiaLite</a>
					       <li><a href="#IX51b">Création d'une base PostGIS</a>
					   </ul>
					</li>
					<li><a href="#IX52">Import de données dans SpatiaLite ou PostGIS</a>
					<li><a href="#IX53">Création d'une grille</a></li>
					<li><a href="#IX54">Union et agrégation</a></li>
					<li><a href="#IX55">Pour finir...</a></li>
					<li><a href="#IX56">Évolution temporelle&nbsp;: soustraction de 2 maillages</a></li>
				</ul>
				<br>
				
						 
			   <p>Comment faire pour automatiser les opérations réalisées au <a href="09_04_maillage.php" >chapitre précédent</a>, afin de pouvoir rendre le processus plus reproductible&nbsp;?</p>
			   <p>Une première solution serait d'utiliser un <b>modèle</b>. Nous ne verrons pas ici le pas à pas pour créer le modèle en question, mais vous pouvez essayer vous-même en vous référant <a href="11_03_modeleur.php" >ici</a>&nbsp;!</p>
			
			   <p>Une autre solution pour automatiser ce traitement est d'utiliser des requêtes SQL. Il s'agit d'une partie &#171;&nbsp;pour aller plus loin&nbsp;&#187; et vous pouvez très bien décider de vous arrêter ici&nbsp;! Nous nous appuierons sur <a href="06_04_req_sql.php" >cette partie</a>.</p>
			   
			   <p>Il est possible d'utiliser 2 logiciels différents à partir de QGIS pour lancer des requêtes SQL&nbsp;:</p>
			   <ul>
			     <li class="espace"><b>SQLite et son module spatial SpatiaLite</b> ne nécessitent pas d'installation, mais les fonctions disponibles sont plus limitées que celles de Postgresql/PostGIS</li>
			     <li class="espace"><b>Postgresql et son module spatial PostGIS</b> doivent être installés en plus de QGIS, mais une fois cette opération réalisée beaucoup de possibilités s'offriront à vous&nbsp;!</li>
			   </ul>
               <p>Il n'y a pas une solution meilleure qu'une autre mais elles répondent à des besoins différents.</p>
               <p><b>Pour cet exercice les 2 logiciels peuvent être utilisés.</b> Si vous choisissez Postgresql/PostGIS, l'installation ne sera pas détaillée ici mais on trouve de nombreuses ressources sur internet. La syntaxe étant légèrement différente d'un logiciel à l'autre, les requêtes seront proposées en 2 versions&nbsp;!</p>			
			
			
			   <h3>Création d'une base vide et import des données<a class="headerlink" id="IX51" href="#IX51"></a></h3>
			   
			     <p>La première étape consiste à créer une base de données vides dans le logiciel choisi, et à y importer les données de départ, à savoir la couche Corine Land Cover.</p>
			     <p><b>Si vous choisissez d'utiliser Postgresql/PostGIS, assurez-vous d'avoir installé ces logiciels avant de poursuivre&nbsp;!</b></p>
			     
			     <div class="manip">
			         <p>Commencez par ouvrir un nouveau projet QGIS et chargez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_FR_RGF.shp</a></em> située dans le dossier <b>TutoQGIS_09_AnalyseSpat/donnees</b>.</p>
			     </div>
			     
			     <h4>Création d'une base SpatiaLite<a class="headerlink" id="IX51a" href="#IX51a"></a></h4>
			     
			         <p>Nous allons tout d'abord créer une base SpatiaLite vide.</p>
			         
			         <div class="manip">
			             <p>Dans le panneau <b>Explorateur</b>, faites un clic droit sur <b>SpatiaLite &#8594; Créer une base de données...</b>&nbsp;:</p>
			             <figure>
            			     <a href="illustrations/tous/9_5_creer_sl.png" >
            			         <img src="illustrations/tous/9_5_creer_sl.png" alt="clic droit sur spatialite" width="400">
            			     </a>
            			 </figure>
            			 <p>Naviguez jusqu'au dossier où vous souhaitez créer votre base, et nommez-la par exemple <b>maillage_clc</b>. Elle est maintenant visible dans l'explorateur&nbsp;:</p>
            			 <figure>
            			     <a href="illustrations/tous/9_5_bdd_sl.png" >
            			         <img src="illustrations/tous/9_5_bdd_sl.png" alt="base spatialite créée" width="170">
            			     </a>
            			 </figure>
			         </div>
			         
			         <p>Si vous naviguez dans l'explorateur de fichiers de votre ordinateur jusqu'à votre base de données, vous verrez qu'un fichier SQLite a été créé. Par rapport à un format comme le shapefile, une base de données est comme une boîte qui peut contenir plusieurs jeux de données.</p>
			         <p>Une base SpatiaLite est une base SQLite qui peut gérer des données spatiales grâce au module SpatiaLite. Elle est constituée d'une seule fichier qu'on peut copier d'un dossier à l'autre.</p>
			         <p>Ça n'est pas le cas des logiciels de bases de données &#171;&nbsp;traditionnels&nbsp;&#187; tels que PostgreSQL, qui fonctionnent selon une logique <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Client-serveur">client-serveur</a>&nbsp;: la base est installé sur un serveur, et des utilisateurs peuvent s'y connecter à partir d'autres ordinateurs. Bien sûr il est possible de se servir de son propre ordinateur comme de serveur, et la base ne sera accessible que depuis celui-ci : c'est ce qu'on appelle une base &#171;&nbsp;en local&nbsp;&#187;.</p>
			     
			         
			     <h4>Création d'une base PostGIS<a class="headerlink" id="IX51b" href="#IX51b"></a></h4>
			         
			         <p>...Et c'est ce que nous allons faire ici&nbsp;! Si vous avez décidé de travailler avec SpatiaLite, passez directement à <a href="#IX51c" >l'import des données</a>.</p>
			         <p class="attention">Je pars du principe ici que vous avez déjà installé PostgreSQL et PostGIS, et que vous êtes connecté à un serveur PostgreSQL, local ou distant.</p>
			         <p>QGIS peut uniquement se connecter à une base déjà existante, <b>la création d'une nouvelle base PostgreSQL/PostGIS ne peut se faire dans QGIS</b>.</p>
			         <p>Il existe plusieurs méthodes pour cela, qui sortent un peu de ce tutoriel&nbsp;: cette partie consistera surtout en des renvois vers des tutoriels existants.</p>
			         
			         <p>PostgreSQL en soi ne possède pas d'interface graphique mais fonctionne en lignes de commande. Si ce mot vous fait peur, pas de panique&nbsp;! Il existe plusieurs logiciels qui peuvent servir d'interface graphique à PostgreSQL et vous permettre d'arriver à vos fins en quelques clics.</p>
			         <p>Le plus connu est peut-être <a class="ext" target="_blank" href="https://www.pgadmin.org/">pgAdmin</a>, qui est peut-être déjà installé sur votre ordinateur selon la manière dont vous avez installé PostgreSQL. Vous pouvez également utiliser par exemple <a class="ext" target="_blank" href="https://dbeaver.io/">DBeaver</a>.</p>
			         
			         <p>Pour <b>créer une nouvelle base de données PostgreSQL</b>, en la nommant <b>maillage_clc</b>&nbsp;:</p>
			         <ul>
			             <li><a class="ext" target="_blank" href="https://www.postgresql.org/docs/9.1/manage-ag-createdb.html">en ligne de commande</a> ou <a class="ext" target="_blank" href="https://www.postgresqltutorial.com/postgresql-create-database/">ici</a></li>
			             <li>avec <a class="ext" target="_blank" href="https://www.postgresqltutorial.com/postgresql-create-database/" >pgAdmin</a> en déroulant pour aller à la partie &#171;&nbsp;3) Creating a new database using pgAdmin&nbsp;&#187;</li>
			             <li>avec DBeaver, le principe est le même qu'avec pgAdmin : clic droit sur le serveur postgres &#8594; Créer &#8594; Database</li>
			         </ul>
			         
			         <p>Il faut ensuite <b>donner les 2 extensions postgis et postgis_topology à la base</b> pour pouvoir y mettre des données géographiques. Encore une fois, vous pouvez procéder au choix&nbsp;:</p>
			         <ul>
			             <li><a class="ext" target="_blank" href="https://postgis.net/install/" >en ligne de commande</a> avec ces 2 commandes&nbsp;: <b>CREATE EXTENSION postgis;</b> et <b>CREATE EXTENSION postgis_topology;</b></li>
			             <li>avec pgAdmin, en faisant un clic droit sur la base &#8594; Créer &#8594; Extension puis en choisissant postgis et postgis_topology</li>
			             <li>avec DBeaver, sensiblement de la même manière qu'avec pgAdmin</li>
			         </ul>
			         
			         <p>Votre base PostGIS est créée, il ne reste plus qu'à s'y connecter dans QGIS&nbsp;!</p>
			         
			         <div class="manip">
			             <p><img class="icone" src="illustrations/tous/1_2_gestionnaire_donnees_icone.png" alt="icône du gestionnaire de données" >Menu Couche &#8594; Gestionnaire des sources de données ou bien clic sur l'icône correspondante, rubrique <b>PostgreSQL</b>&nbsp;:</p>
			             <figure>
            			     <a href="illustrations/tous/9_5_nouvelle_connexion_psql.png" >
            			         <img src="illustrations/tous/9_5_nouvelle_connexion_psql.png" alt="création d'une connexion à une base PostGIS" width="600">
            			     </a>
            			 </figure>
            			 <p>Cliquez sur <b>Nouveau</b> pour créer une nouvelle connexion à notre base maillage_clc&nbsp;:</p>
            			 <figure>
            			     <a href="illustrations/tous/9_5_nouvelle_connexion_fenetre_psql.png" >
            			         <img src="illustrations/tous/9_5_nouvelle_connexion_fenetre_psql.png" alt="Fenêtre de création d'une connexion à une base PostGIS" width="600">
            			     </a>
            			 </figure>
            			 <ul>
            			     <li class="espace>">Nom&nbsp;: vous pouvez donner le nom de votre choix à la connexion, mais le plus simple est probablement de lui donner le même nom que la base&nbsp;: <b>maillage_clc</b></li>
            			     <li class="espace">Hôte&nbsp;: tapez <b>localhost</b> si votre base est en local, sinon l'adresse de votre serveur PostgreSQL</li>
            			     <li class="espace">Port&nbsp;: par défaut, le numéro du <a href="" >port</a> est <b>5432</b>, mais il peut être différent selon votre configuration</li>
            			     <li class="espace">Base de données&nbsp;: tapez ici le nom de la base&nbsp;: <b>maillage_clc</b></li>
            			     <li class="espace">Cliquez ensuite sur <b>Tester la connexion</b>&nbsp;: selon votre configuration, il sera nécessaire ou non de rentrer vos identifiants</li>
            			 </ul>
            			 <p>Si le test de connexion est réussi, vous pouvez cliquer sur OK et fermer la fenêtre. Vous pouvez également fermer la fenêtre du gestionaire de sources de données.</p>
            			 <p>Votre base est maintenant visible dans l'explorateur&nbsp;:</p>
            			 <figure>
            			     <a href="illustrations/tous/9_5_bdd_psql.png" >
            			         <img src="illustrations/tous/9_5_bdd_psql.png" alt="Base PostGIS visible dans l'explorateur de fichiers" width="150">
            			     </a>
            			 </figure>
			         </div>
			         <p class="note">Vous remarquerez que cette étape est plus longue et complexe avec PostgreSQL. Néanmoins, une fois ce logiciel configuré et avec un peu d'habitude, il ne vous faudra plus que quelque secondes pour créer une nouvelle base&nbsp;!</p>
			     
			   <h3>Import de données dans SpatiaLite ou PostGIS<a class="headerlink" id="IX51c" href="#IX52"></a></h3>
			   
			     <p>Cette étape est presque équivalente pour les 2 logiciels, en passant par le gestionnaire de base de données de QGIS.</p>
			     
			     <div class="manip">
			         <p><img class="icone" src="illustrations/tous/6_4_dbmanager_icone.png" alt="icône du gestionnaire de bases de données" >Dans QGIS, ouvrez la fenêtre du <b>gestionnaire de bases de données</b>&nbsp;: menu Base de données &#8594; DB Manager... ou bien clic sur l'icône correspondante.</p>
			         <p>Sélectionnez votre base, SpatiaLite...&nbsp;:</p>
			         <figure>
        			     <a href="illustrations/tous/9_5_dbmanager_sl.png" >
        			         <img src="illustrations/tous/9_5_dbmanager_sl.png" alt="Base SpatiaLite sélectionnée dans DB Manager" width="500">
        			     </a>
        			 </figure>
			         <p>...Ou bien PostGIS&nbsp;:</p>
			         <figure>
        			     <a href="illustrations/tous/9_5_dbmanager_psql.png" >
        			         <img src="illustrations/tous/9_5_dbmanager_psql.png" alt="Base PostGIS sélectionnée dans DB Manager" width="500">
        			     </a>
        			 </figure>
        			 <p>Dans les 2 cas, <b>cliquez sur le petit triangle devant le nom de la base</b> pour être sûr d'y être bien connecté.</p>
        			 <p>Cliquez ensuite sur le bouton <b>Import de couche/fichier</b> en haut de la fenêtre du gestionnaire de bases de données&nbsp;:</p>
			     </div>
			   
			   <h3>Création d'une grille<a class="headerlink" id="IX52" href="#IX52"></a></h3>
			   <h3>Union et agrégation<a class="headerlink" id="IX53" href="#IX53"></a></h3>
			   <h3>Pour finir...<a class="headerlink" id="IX54" href="#IX54"></a></h3>
			
			
			   <h3>Évolution temporelle&nbsp;: soustraction de 2 maillages<a class="headerlink" id="IX56" href="#IX56"></a></h3>
			
				
					
		
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
