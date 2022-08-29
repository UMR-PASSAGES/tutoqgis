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
			<h2>IX.5  Un exemple d'application&nbsp;: dites-le avec du SQL !</h2>
				<ul class="listetitres">
					<li><a href="#IX51">Création d'une nouvelle base SpatiaLite ou PostGIS</a>
					   <ul class="listesoustitres">
					       <li><a href="#IX51a">Création d'une base SpatiaLite</a></li>
					       <li><a href="#IX51b">Création d'une base PostGIS</a></li>
					   </ul>
					</li>
					<li><a href="#IX52">Import de données dans SpatiaLite ou PostGIS</a></li>
					<li><a href="#IX53">Lancer une requête simple</a></li>
					<li><a href="#IX54">Création d'une grille</a>
					   <ul class="listesoustitres">
					       <li><a href="#IX54a">Créer une grille avec SpatiaLite</a></li>
					       <li><a href="#IX54b">Créer une grille avec PostGIS</a></li>
					   </ul>
					</li>
					<li><a href="#IX55">Union et agrégation</a></li>
					<li><a href="#IX56">Évolution temporelle&nbsp;: soustraction de 2 maillages</a>
					   <ul class="listesoustitres">
					       <li><a href="#IX56a">Relancer l'opération sur les données Corine Land Cover 2012</a></li>
					       <li><a href="#IX56b">Soustraire les 2 maillages 2012 et 2000</a></li>
					   </ul>
					</li>
				</ul>
				<br>
				
						 
			   <p>Comment faire pour automatiser les opérations réalisées au <a href="09_04_maillage.php" >chapitre précédent</a>, afin de pouvoir rendre le processus plus reproductible&nbsp;?</p>
			   <p>Une première solution serait d'utiliser un <b>modèle</b>. Nous ne verrons pas ici le pas à pas pour créer le modèle en question, mais vous pouvez essayer vous-même en vous référant <a href="11_03_modeleur.php" >ici</a>&nbsp;!</p>
			
			   <p>Une autre solution pour automatiser ce traitement est d'utiliser des requêtes SQL. Il s'agit d'une partie &#171;&nbsp;pour aller plus loin&nbsp;&#187;, d'un niveau plus avancé, et vous pouvez très bien décider de vous arrêter ici. Nous nous appuierons sur <a href="06_04_req_sql.php" >cette partie</a>.</p>
			   
			   <p>Il est possible d'utiliser 2 logiciels différents à partir de QGIS pour lancer des requêtes SQL&nbsp;:</p>
			   <ul>
			     <li class="espace"><b>SQLite et son module spatial SpatiaLite</b> ne nécessitent pas d'installation, mais les fonctions disponibles sont plus limitées que celles de Postgresql/PostGIS</li>
			     <li class="espace"><b>Postgresql et son module spatial PostGIS</b> doivent être installés en plus de QGIS, mais une fois cette opération réalisée beaucoup de possibilités s'offriront à vous&nbsp;!</li>
			   </ul>
               <p>Il n'y a pas une solution meilleure qu'une autre mais elles répondent à des besoins différents.</p>
               <p><b>Pour cet exercice les 2 logiciels peuvent être utilisés.</b> Si vous choisissez Postgresql/PostGIS, l'installation ne sera pas détaillée ici mais on trouve de nombreuses ressources sur internet. La syntaxe étant légèrement différente d'un logiciel à l'autre, les requêtes seront proposées en 2 versions.</p>			
			   
			   <p class="attention">Pour ce chapitre, vous pouvez soit télécharger les données <a class="ext" target="_blank" href="https://www.statistiques.developpement-durable.gouv.fr/corine-land-cover-0" >Corine Land Cover</a>&nbsp;: <a class="ext" target="_blank" href="http://www.donnees.statistiques.developpement-durable.gouv.fr/donneesCLC/CLC/millesime/CLC00_FR_RGF_SHP.zip" >Données Métropole 2000</a> et <a class="ext" target="_blank" href="http://www.donnees.statistiques.developpement-durable.gouv.fr/donneesCLC/CLC/millesime/CLC12_FR_RGF_SHP.zip" >Données Métropole 2012</a> puis les filtrer pour ne garder que les vignes, comme détaillé dans le tutoriel, ou bien utiliser les <a href="telechargement.php">données en téléchargement</a> déjà filtrées (pour un téléchargement moins lourd).</p>
			
			   <h3>Création d'une nouvelle base SpatiaLite ou PostGIS<a class="headerlink" id="IX51" href="#IX51"></a></h3>
			   
			     <p>La première étape consiste à créer une base de données vides dans le logiciel choisi, et à y importer les données de départ, à savoir la couche Corine Land Cover.</p>
			     <p><b>Si vous choisissez d'utiliser Postgresql/PostGIS, assurez-vous d'avoir installé ces logiciels avant de poursuivre&nbsp;!</b></p>
			     
			     <div class="manip">
			         <p>Commencez par ouvrir un nouveau projet QGIS et chargez la couche <a class="ext" target="_blank" href="http://www.donnees.statistiques.developpement-durable.gouv.fr/donneesCLC/CLC/millesime/CLC00_FR_RGF_SHP.zip">CLC00_FR_RGF</a> ou bien <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_221_FR_RGF</a></em> (données déjà filtrées pour ne garder que les vignes).</p>
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
			         <p>Une dernière étape consiste à créer un <b>schéma</b> nommé tutoqgis dans cette base. Un schéma correspond à un sous-dossier dans la base de données. Le schéma par défaut se nomme <b>public</b> mais c'est une bonne pratique de créer vos propres schémas.</p>
			         <div class="manip">
			             <p>Rien de compliqué : toujours dans l'explorateur, clic droit sur votre base &#8594; <b>Nouveau schéma...</b></p>
			             <figure>
            			     <a href="illustrations/tous/9_5_creer_schema.png" >
            			         <img src="illustrations/tous/9_5_creer_schema.png" alt="clic droit sur la base, créer schéma" width="300">
            			     </a>
            			 </figure>
            			 <p>Nommez-le par exemple <b>tutoqgis</b>. Votre base doit donc contenir 3 schémas : tutoqgis, public et topology.</p>
            			 <figure>
            			     <a href="illustrations/tous/9_5_creer_schema_res.png" >
            			         <img src="illustrations/tous/9_5_creer_schema_res.png" alt="base maillage_clc avec ses 3 schémas" width="150">
            			     </a>
            			 </figure>
            			 <p>On peut aussi créer le schéma à partir du gestionnaire de bases de données.</p>
			         </div>
			         <p class="note">Vous remarquerez que cette étape est plus longue et complexe avec PostgreSQL. Néanmoins, une fois ce logiciel configuré et avec un peu d'habitude, il ne vous faudra plus que quelque secondes pour créer une nouvelle base&nbsp;!</p>
			     
			   <h3>Import de données dans SpatiaLite ou PostGIS<a class="headerlink" id="IX52" href="#IX52"></a></h3>
			   
			     <p>Cette étape est presque équivalente pour les 2 logiciels, en passant par le gestionnaire de base de données de QGIS.</p>
			     <p>Avant d'importer les données, nous allons sélectionner dans la couche Corine Land Cover les entités correspondant au vignoble, pour n'importer que celles-ci. Cette étape pourrait tout à fait être effectuée une fois les données importées dans la base, mais comme cela le temps d'import dans SpatiaLite ou PostGIS sera plus court.</p>
			     
			     <div class="manip">
			         <p class="attention">Cette sélection n'est pas nécessaire si vous utilisez la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_221_FR_RGF</a></em> disponible en téléchargement.</p>
			         <p>Utilisez une <a href="06_01_req_attrib.php" >requête attributaire</a> sur la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_FR_RGF</a></em>  pour ne sélectionner que les vignes :  <b>"CODE_00"  = '221'</b> (en jaune ci-dessous).</p>
			         <figure>
        			     <a href="illustrations/tous/9_5_selection_vignes.png" >
        			         <img src="illustrations/tous/9_5_selection_vignes.png" alt="Couche CLC, vignes sélectionnées en jaune" width="250">
        			     </a>
        			 </figure>
			     </div>
			     
			     <p>Il ne reste plus qu'à importer les entités sélectionnes, dans SpatiaLite ou PostGIS selon votre choix.</p>
			     
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
        			 <figure>
        			     <a href="illustrations/tous/9_5_import_spatialite.png" >
        			         <img src="illustrations/tous/9_5_import_spatialite.png" alt="Import de données dans SpatiaLite" width="300">
        			     </a>
        			     <a href="illustrations/tous/9_5_import_postgis.png" >
        			         <img src="illustrations/tous/9_5_import_postgis.png" alt="Import de données dans PostGIS" width="300">
        			     </a>
        			     <figcaption>Import de données : à gauche dans SpatiaLite, à droite dans PostGIS.</figcaption>
        			 </figure>
        			 <ul>
        			     <li class="espace">Source : choisir la couche <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC00_FR_RGF</a></em></li>
        			     <li class="espace">N'oubliez pas de cocher la case <b>Importer uniquement les entités sélectionnées</b> pour n'importer que les vignes que vous avez préalablement sélectionnées</li>
        			     <li class="espace">Table en sortie : pour PostGIS, sélectionnez le schéma <b>tutoqgis</b>, et dans tous les cas nommez la future table SpatiaLite ou PostGIS <b>clc00_vignes</b> (il est plus pratique d'éviter les majuscules)</li>
        			     <li class="espace"><a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Cl%C3%A9_primaire">clé primaire</a> : il s'agit d'un champ d'identifiant unique qui sera créé, nommez-le <b>gid</b> par exemple</li>
        			     <li class="espace">SCR cible : le SCR original IGNF:LAMB93 n'est pas reconnu par SpatiaLite ou PostGIS : sélectionnez son équivalent <b>RGF93/Lambert93 EPSG 2154</b></li>
        			     <li class="espace">Vous pouvez également cocher la case <b>créer un index spatial</b>, ce qui accélérera certaines opérations spatiales (mais il peut être créé par la suite)</li>
        			 </ul>
        			 <p><img class="icone" src="illustrations/tous/9_5_actualiser_bdd_icone.png" alt="icône actualiser du gestionnaire de bdd" >Cliquez sur <b>OK</b>, patientez... Il faut éventuellement actualiser la base pour que la nouvelle couche soit visible&nbsp;:</p>
        			 <figure>
        			     <a href="illustrations/tous/9_5_import_spatialite_res.png" >
        			         <img src="illustrations/tous/9_5_import_spatialite_res.png" alt="couche importée dans SpatiaLite" width="220">
        			     </a>
        			     <a href="illustrations/tous/9_5_import_postgis_res.png" >
        			         <img src="illustrations/tous/9_5_import_postgis_res.png" alt="Couche importée dans PostGIS" width="210">
        			     </a>
        			 </figure>
			     </div>
			     
			     <p>Bravo&nbsp;! Vous disposez maintenant d'une base de données avec une couche de données.</p>
			     
			     <div class="manip">
    			     <p>Pour chaque couche PostGIS ou SpatiaLite, on peut accéder à partir du gestionnaire de bases de données à 3 onglet : info, table et aperçu.</p>
    			     <figure>
            			     <a href="illustrations/tous/9_5_info_couche.png" >
            			         <img src="illustrations/tous/9_5_info_couche.png" alt="3 onglets info, table et aperçu dans le gestionnaire de bdd" width="400">
            			     </a>
            	     </figure>
            	     <p>L'onglet <b>info</b> vous permet de voir le nombre d'entités (4215), le type de géométrie (multipolygone), le SCR (RGF93 Lambert93 EPSG 2154), la liste des champs...</p>
            	     <p>Les onglets <b>table</b> et <b>aperçu</b> permettent un aperçu des données attributaires et spatiales : cliquez sur chacun d'eux.</p>
            	     <p>Double-cliquez sur la couche dans la partie gauche du gestionnaire de bases de données pour l'ajouter à QGIS. Vous pouvez maintenant l'utiliser comme n'importe quelle couche shapefile ou GeoPackage.</p>
        	     </div>
        	     
        	     <p>Nous allons pouvoir rentrer dans le vif du sujet&nbsp;!</p>
			   
			   
			   <h3>Lancer une requête simple<a class="headerlink" id="IX53" href="#IX53"></a></h3>
			   
			     <p>A ce stade, si vous n'avez aucune notion de SQL, je vous conseille de d'abord suivre <a href="06_04_req_sql.php" >cette partie</a> sur les requêtes SQL.</p>
			     <p>Nous allons ici lancer une requête simple dans SpatiaLite ou PostGIS, en guise d'introduction.</p>
			     
			     <div class="manip">
			         <p>Sélectionnez votre base dans le gestionnaire de bases de données.</p>
		             <p><img class="icone" src="illustrations/tous/9_5_requete_icone.png" alt="icône 'Fenêtre SQL' du gestionnaire de BDD" >Cliquez ensuite sur l'icône <b>Fenêtre SQL</b> (ou menu Base de données &#8594; Fenêtre SQL)&nbsp;: un nouvel onglet s'ouvre.</p>
		             <figure>
        			     <a href="illustrations/tous/9_5_requete_fenetre.png" >
        			         <img src="illustrations/tous/9_5_requete_fenetre.png" alt="Fenêtre du gestionnaire de bdd avec l'onglet requête" width="600">
        			     </a>
        	         </figure>
        	      </div>
        	      
    	         <p>Remarquez que cet onglet porte le nom de votre base : il ne sera pas possible d'y lancer une requête concernant une autre base (mais on peut très bien ouvrir plusieurs onglets de requête).</p>
    	         <p>L'onglet comporte 2 parties&nbsp;:</p>
    	         <ol>
    	           <li>en haut, vous pouvez taper une requête</li>
    	           <li>en bas, vous pourrez visualiser le résultat de cette requête.</li>
    	         </ol>
    	         <p>Pour tester cet outil, nous allons sélectionner les polygones ayant une surface inférieure à 25 hectares.</p>
    	         
    	         <div class="manip">
    	           <p>Tapez la requête suivante (pour une base SpatiaLite ou PostGIS)&nbsp;:</p>
    	           <p class="code">SELECT * FROM clc00_vignes WHERE area_ha < 25</p>
    	           <p>Puis cliquez sur le bouton <b>Exécuter</b>&nbsp;: les 10 lignes correspondant à des polygones de surface < 25 hectares s'affichent.</p>
    	           <figure>
    			     <a href="illustrations/tous/9_5_requete_exemple.png" >
    			         <img src="illustrations/tous/9_5_requete_exemple.png" alt="Requête exemple et son résultat" width="600">
    			     </a>
    	           </figure>
    	         </div>
    	         <p class="note">Les différents mots clés (select, from, where...) peuvent être écrits indifféremment en minuscules ou majuscules. De même, la requête peut être écrite en une seule ligne ou bien avec des retours à la ligne.</p>
    	         
			    <p>Si l'on détaille cette requête ligne par ligne :</p>
		        <p class="code">SELECT *</p>
		        <p>signifie que nous allons sélectionner (<b>select</b>) toutes (la mention <b>*</b>) les colonnes de la table attributaire, ainsi que la géométrie, qui est considérée comme une colonne nommée geom, comme vous pouvez le vérifier dans l'onglet <b>Info</b>.</p>
		        <p class="code">FROM clc00_vignes</p>
		        <p>signifie que nous allons sélectionner les colonnes de la couche <em class="data">clc00_vignes</em>.</p>
		        <p class="code">WHERE area_ha < 25</p>
		        <p>applique un critère à la requête : seules seront sélectionnées les lignes répondant à ce critère, c'est-à-dire dont la valeur pour le champ area_ha est inférieure à 25.</p>
		        
		        <p>Ici, la requête ne crée pas de nouvelles couches mais renvoie les lignes sélectionnées. Comment faire pour créer une nouvelle couche à partir de cette sélection ?</p>
		        
		        <div class="manip">
		          <p>Dans PostGIS, il suffira d'ajouter devant cette requête <b>CREATE TABLE nouvelle_table AS</b> : la requête complète sera donc</p>
		          <p class="code">CREATE TABLE tutoqgis.inf25ha AS
SELECT * FROM clc00_vignes
WHERE area_ha < 25</p>
		          <p>pour créer une nouvelle couche nommée inf25ha dans le schéma tutoqgis par exemple.</p>
		          <p>Cliquez sur <b>Exécuter</b> : aucun résultat n'est renvoyé mais une nouvelle couche est ajoutée à la base, visible après l'avoir actualisée.</p>
		          <figure>
    			     <a href="illustrations/tous/9_5_requete_exemple2.png" >
    			         <img src="illustrations/tous/9_5_requete_exemple2.png" alt="Requête de création de table" width="600">
    			     </a>
    	          </figure>
		        </div>
		        
		        <p>Pour SpatiaLite, les choses sont se compliquent un petit peu&nbsp;: la même requête renvoie bien une table avec les mêmes colonnes, mais la colonne <b>geom</b> n'est pas reconnue comme colonne de géométrie. Il s'agit d'une simple table sans composante géographique.</p>
		        <p>Vous pouvez d'ailleurs le voir dans l'illustration ci-dessus&nbsp;: l'icône de inf25ha dans la base SpatiaLite est celle d'une table, alors que c'est un polygone dans la base PostGIS.</p>
		        
		        <div class="manip">
		          <p>Il faudra donc lancer une deuxième requête pour que la colonne <b>geom</b> soit bien reconnue comme colonne de géométrie dans SpatiaLite&nbsp;:</p>
		          <p class="code">SELECT RecoverGeometryColumn('inf25ha', 'geom', 2154, 'MULTIPOLYGON', 'XY');</p>
		          <figure>
    			     <a href="illustrations/tous/9_5_recovergeom.png" >
    			         <img src="illustrations/tous/9_5_recovergeom.png" alt="Requête RecevoerGeometryColumn" width="600">
    			     </a>
    	          </figure>
    	          <p>Après avoir cliqué sur le bouton <b>Exécuter</b>, cette requête doit renvoyer la valeur <b>1</b> indiquant que tout s'est bien passé. Après avoir cliqué sur le bouton <b>Actualiser</b> en haut à gauche, inf25ha a une icône de polygone et est maintenant une couche géographique.</p>
		        </div>
		        
		        <p>Pour expliquer cette requête&nbsp;: <a class="ext" target="_blank" href="http://www.gaia-gis.it/gaia-sins/spatialite-sql-5.0.0.html">RecoverGeometryColumn</a> est la fonction permettant de transformer une colonne ordinaire en colonne de géométrie (sous réserve bien sûr que son contenu corresponde bien à des géométries). Cette fonction prend plusieurs arguments&nbsp;:</p>
		        <ul>
		          <li><b>inf25ha</b> est le nom de la couche</li>
		          <li><b>geom</b> est le nom de la colonne de géométrie</li>
		          <li><b>2154</b> est le code EPSG du SCR de la couche</li>
		          <li><b>'MULTIPOLYGON'</b> est le type de géométries de la couche (ici, c'est le même type que la couche clc00_vignes qui a servi a créer inf25ha)</li>
		          <li><b>'XY'</b> correspond à la dimension de la couche</li>
		        </ul>
		        
		        <p>Une autre différence entre PostGIS et SpatiaLite&nbsp;: dans PostGIS, il est possible de lancer plusieurs requêtes à la suite les unes des autres, pourvu que chaque requête se termine par un point-virgule. Dans SpatiaLite, il faut lancer les requêtes une à une, en cliquant sur le bouton Exécuter entre chaque.</p>
		        
		        <p>Nous allons maintenant utiliser des requêtes plus complexes pour créer une grille&nbsp;!</p>
   
			   
			   <h3>Création d'une grille<a class="headerlink" id="IX54" href="#IX54"></a></h3>
			   
			     <p>Notre première étape consiste à créer une grille ayant la même étendue que notre couche <b>clc00_vignes</b>, avec une maille de 50km. C'est l'équivalent de <a href="09_04_maillage.php#IX42" >cette étape</a> réalisée au chapitre précédent.</p>
			     
			     <p>Il existe dans SpatiaLite une fonction spécifique pour créer une grille&nbsp;; la fonction équivalente n'est accessible dans PostGIS qu'à partir de la version 3.1. A moins de disposer de cette version, il faudra donc utiliser une fonction &#171;&nbsp;fait maison&nbsp;&#187;.</p>
			     
			     <h4>Créer une grille avec SpatiaLite<a class="headerlink" id="IX54a" href="#IX54a"></a></h4>
			     
			         <p>Dans SpatiaLite, nous allons pouvoir utiliser la fonction ST_SquareGrid. 4 étapes seront nécessaires&nbsp;:</p>
			         <ol>
			             <li>Création d'une table vide</li>
			             <li>Ajout d'une colonne de géométrie à cette table</li>
			             <li>Mise à jour de cette colonne pour créer une grille avec une seule entité multiparties</li>
			             <li>Séparation de l'entité multiparties pour que 1 case = 1 polygone</li>
			         </ol>
			         
			         <div class="manip">
			             <p>Pour créer une table vide avec une clé primaire id, la requête est la suivante&nbsp;:</p>
			             <p class="code">CREATE TABLE grid00 (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT);
			             <p>Après avoir exécuté cette requête et actualisé la base, la table grid00 est visible. Elle ne comporte aucune ligne et une seule colonne <b>id</b>.</p>
			             <p>Il faut ensuite lui ajouter une colonne de géométrie de type multipolygone&nbsp;:</p>
			             <p class="code">SELECT AddGeometryColumn('grid00','geom',2154,'MULTIPOLYGON','XY');</p>
			             <p>La table est maintenant une couche de polygones avec une colonne de géométrie <b>geom</b>. Elle ne contient encore aucune entité, ce que vous pouvez vérifier dans les onglets table et aperçu.</p>
			             <p>Il ne reste plus qu'à mettre à jour la géométrie avec la fonction <a class="ext" target="_blank" href="http://www.gaia-gis.it/gaia-sins/spatialite-sql-5.0.0.html" >ST_SquareGrid</a>&nbsp;:</p>
			             <p class="code">INSERT INTO grid00 (geom) SELECT ST_SquareGrid(Extent(v.geom), 50000) AS geom FROM clc00_vignes AS v</p>
			             <p>Cette dernière requête créer une grille avec la même étendue que clc00_vignes, et une maille de 50 km. La fonction <b>ST_SquareGrid</b> prend 2 arguments :</p>
			             <ul>
			                 <li>une géométrie correspondant à l'étendue de la grille, ici l'étendue de clc00_vignes récupérée au moyen de la fonction <b>Extent</b></li>
			                 <li>la taille de maille dans le SCR de la couche, ici 50&nbsp;000 mètres</li>
			             </ul>
			             <p>Notez également que pour simplifier la requête, la couche clc00_vignes est appelée v&nbsp;: <b>clc00_vignes AS v</b>. On peut donc y faire référence dans le reste de la requête par la lettre v sans taper son nom complet.</p>
			             <p>Vous pouvez ajouter cette couche à QGIS en double-cliquant sur son nom&nbsp;:</p>
			             <figure>
            			     <a href="illustrations/tous/9_5_grille_res.png" >
            			         <img src="illustrations/tous/9_5_grille_res.png" alt="Grille superposée aux vignes" width="300">
            			     </a>
            	          </figure>
			             <p>Cependant, cette couche ne contient qu'une seule entité multi-partie : vous ne pouvez pas sélectionner une seule case. Une dernière requête est donc nécessaire&nbsp;:</p>
			             <p class="code">SELECT ElementaryGeometries('grid00', 'geom', 'grid00_sp','gid','fid') as geom FROM grid00</p>
			             <p>Ici, nous utilisons la fonction <b>ElementaryGeometries</b> pour passer d'une couche de multipolygones à une couche de polygone. Cette fonction utilise les arguments suivants&nbsp;:</p>
			             <ul>
			                 <li>le nom de la couche multipartie, ici <b>grid00</b></li>
			                 <li>le nom de la colonne de géométrie de la couche en entrée, ici <b>geom</b></li>
			                 <li>le nom de la nouvelle couche qui sera créée, ici <b>grid00_sp</b> (pour <b>s</b>ingle <b>p</b>art)</li>
			                 <li>l'identifiant de la couche en entrée, ici <b>gid</b></li>
			                 <li>l'identifiant de la couche en sortie (à créer), ici <b>fid</b></li>
			             </ul>
			             <p>La couche <em class="data">grid00_sp</em> comporte maintenant autant d'entités que de cases et est de type POLYGON. Il est possible de sélectionner une seule case.</p>
			         </div>
			     
			     
			     <h4>Créer une grille avec PostGIS<a class="headerlink" id="IX54b" href="#IX54b"></a></h4>
			     
			         <p>Malheureusement, la fonction ST_SquareGrid permettant la génération d'une grille avec PostGIS n'est accessible qu'à partir de la version 3.1. A moins de disposer de cette version, il faudra donc utiliser notre propre fonction&nbsp;!</p>
			         
			         <p>Une <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Routine_(informatique)">fonction</a> est un bout de code pouvant être &#171;&nbsp;appelé&nbsp;&#187;. C'est en quelque sorte un raccourci qui permet d'éviter de taper une série d'instructions, en tapant seulement le nom de cette série d'instructions.</p>
			         <p>Les fonctions peuvent prendre des arguments en entrée&nbsp;: par exemple, une couche, une taille de maille... Et peuvent renvoyer un résultat un sortie, par exemple une grille.</p>
			         <p>Nous allons ici utiliser <a class="ext" target="_blank" href="https://gis.stackexchange.com/a/23541/175131" >cette fonction</a> créée par Alexander Palamarchuk pour générer une grille.</p>
			         
			         <div class="manip">
			             <p>Dans la fenêtre du gestionnaire de bases de données, après avoir sélectionné la base PostGIS, ouvrez un nouvel onglet de requête (menu Base de données &#8594; Fenêtre SQL).</p>
			             <p>Copiez et coller le code suivant dans cet onglet, issu de <a class="ext" target="_blank" href="https://gis.stackexchange.com/a/23541/175131">ce post sur StackExchange</a> (la seule modification est celle du code EPSG du SCR&nbsp;: 2154 au lieu de 28408)&nbsp;:</p>
			             <p class="code">CREATE OR REPLACE FUNCTION public.makegrid_2d (
 bound_polygon public.geometry,
  grid_step integer,
  metric_srid integer = 2154 --metric SRID
)
RETURNS public.geometry AS
$body$
DECLARE
  BoundM public.geometry; --Bound polygon transformed to the metric projection (with metric_srid SRID)
  Xmin DOUBLE PRECISION;
  Xmax DOUBLE PRECISION;
  Ymax DOUBLE PRECISION;
  X DOUBLE PRECISION;
  Y DOUBLE PRECISION;
  sectors public.geometry[];
  i INTEGER;
BEGIN
  BoundM := ST_Transform($1, $3); --From WGS84 (SRID 4326) to the metric projection, to operate with step in meters
  Xmin := ST_XMin(BoundM);
  Xmax := ST_XMax(BoundM);
  Ymax := ST_YMax(BoundM);

  Y := ST_YMin(BoundM); --current sector's corner coordinate
  i := -1;
   &#60;&#60;yloop&#62;&#62;
  LOOP
    IF (Y >= Ymax) THEN  --Better if generating polygons exceeds the bound for one step. You always can crop the result. But if not you may get not quite correct data for outbound polygons (e.g. if you calculate frequency per sector)
        EXIT;
    END IF;

    X := Xmin;
     &#60;&#60;xloop&#62;&#62;
    LOOP
      IF (X >= Xmax) THEN
          EXIT;
      END IF;

      i := i + 1;
      sectors[i] := ST_GeomFromText('POLYGON(('||X||' '||Y||', '||(X+$2)||' '||Y||', '||(X+$2)||' '||(Y+$2)||', '||X||' '||(Y+$2)||', '||X||' '||Y||'))', $3);

      X := X + $2;
    END LOOP xloop;
    Y := Y + $2;
  END LOOP yloop;

  RETURN ST_Transform(ST_Collect(sectors), ST_SRID($1));
END;
$body$
LANGUAGE 'plpgsql';</p>
                        <p>Cliquez sur <b>Exécuter</b> : aucun résultat n'est renvoyé.</p>
                    </div>
                    
                    <p>La fonction <b>makegrid_2d</b> est maintenant accessible dans PostGIS&nbsp;: vous n'aurez plus besoin de retaper ce code.</p>
                    <p>Il ne reste plus qu'à appeler cette fonction avec en entrée&nbsp:</p>
                    <ul>
                        <li>l'étendue de la grille, c'est-à-dire l'étendue de <em class="data">clc00_vignes</em></li>
                        <li>la taille de maille, soit 50&nbsp;000 mètres</li>
                    </ul>
                    
                    <div class="manip">
                        <p>Lancez la requête suivante&nbsp;:</p>
                        <p class="code">CREATE TABLE tutoqgis.grid00 as
SELECT row_number() over () as gid, geom FROM 
(SELECT (ST_Dump(makegrid_2d(
(select st_setsrid(st_extent(geom), 2154) from tutoqgis.clc00_vignes), 
50000)
)).geom AS geom) AS q_grid;</p>
                    </div>
                    
                    <p>Quelques explications, cette fois-ci nous prendrons cette requête non plus ligne par ligne, mais fonction par fonction...</p>
                    <p class="note">Une petite astuce&nbsp;: en cliquant sur une parenthèse ouvrante ou fermante dans l'onglet de requête du gestionnaire de bases de données, cette parenthèse et son alter ego sont surlignées en vert, ce qui permet de mieux comprendre l'emboîtement des fonctions.</p>
                    <p class="code">create table tutoqgis.grid00 as</p>
                    <p>Cette première ligne veut simplement dire que cette requête va créer une nouvelle table nommée <b>grid00</b> dans le schéma <b>tutoqgis</b>.</p>
                    <p class="code">SELECT row_number() over () as gid, geom FROM (SELECT...) AS q_grid</p>
                    <p>Cette nouvelle table contiendra 2 colonnes&nbsp;: une colonne <b>gid</b> d'identifiant unique, créée avec la fonction <a class="ext" target="_blank" href="https://www.postgresql.org/docs/current/functions-window.html" >row_number()</a>, et une colonne de géométrie <b>geom</b>. Comme la table est créée à partir d'un deuxième <b>SELECT</b>, il faut donner un nom (alias) à cette sous-requête, ici <b>q_grid</b>.</p>
                    <p class="note">Vous pouvez essayer de relancer la requête en omettant la partie <b>AS q_grid</b>, vous obtiendrez un message d'erreur vous indiquant que la sous-requête doit avoir un alias&nbsp;: ERROR:  subquery in FROM must have an alias.</p>
                    <p class="code">(SELECT (ST_Dump(...)).geom AS geom</p>
                    <p>La sous-requête utilise la fonction <a class="ext" target="_blank" href="https://postgis.net/docs/ST_Dump.html">ST_Dump</a>, qui permet de créer des entités à une seule partie. Pour récupérer une géométrie en retour avec cette fonction, on a ajouté <b>.geom</b>, et pour nommer cette géométrie geom <b>AS geom</b>.</p>
                    <p class="code">makegrid_2d(..., ...)</p>
                    <p>La fonction <b>ST_Dump</b> prend un seul paramètre en entrée correspondant à une géométrie. Ici, cette géométrie sera celle renvoyée en sortie par la fonction <b>st_makegrid</b> créée précédemment, qui prend elle en entrée 2 arguments, séparés par une virgule.</p>
                    <p class="code">SELECT ST_SetSRID(ST_Extent(geom), 2154) FROM tutoqgis.clc00_vignes</p>
                    <p>Le premier argument de la fonction <b>makegrid_2d</b> correspond à une étendue. On utilise pour la créer la fonction <a class="ext" target="_blank" href="https://postgis.net/docs/ST_Extent.html" >ST_Extent</a> sur la couche <b>clc00_vignes</b>. Il faut également attribuer un système de coordonnées (SRID dans la jargon PostGIS) à cette étendue, ce qui est fait avec la fonction <a class="ext" target="_blank" href="https://postgis.net/docs/ST_SetSRID.html" >St_SetSRID</a>, qui utilise 2 paramètres&nbsp;: le résultat de <b>ST_Extent</b>, et le code EPSG <b>2154</b> (RGF93 Lambert 93).</p>
                    <p class="note">Si vous testez la requête sans utiliser la fonction ST_SetSRID, en remplaçant la partie ci-dessus par &#171;&nbsp;select st_extent(geom) from tutoqgis.clc00_vignes&nbsp;&#187;, vous obtiendrez un message d'erreur vous indiquant que la géométrie en entrée n'a pas de système de coordonnées&nbsp;: ERROR:  ST_Transform: Input geometry has unknown (0) SRID</p>
                    <p class="code">50000</p>
                    <p><b>50000</b> est le deuxième paramètre utilisé par la fonction <b>makegrid_2d</b>, qui correspond à la longueur du côté d'une maille dans le SCR utilisé (ici Lambert 93, donc en mètres).</p>
                    
                     <div class="manip">   
                        <p>Actualisez la base&nbsp;: la couche grid00 est visible, on peut l'ajouter à QGIS, mais son type de géométrie n'est pas reconnu. Pour cela, une dernière requête&nbsp;:</p>
                        <p class="code">Select populate_geometry_columns()</p>
                        <figure>
        			     <a href="illustrations/tous/9_5_grille_postgis_res.png" >
        			         <img src="illustrations/tous/9_5_grille_postgis_res.png" alt="Fenêtre du gestionnaire de bdd avec aperçu de la grille PostGIS" width="600">
        			     </a>
        	            </figure>
        	         </div>
        	         
        	         <p>A ce stade, si vous avez suivi le <a href="09_04_maillage.php#IX42" >chapitre précédent</a> et créé une grille avec l'outil <b>Créer une grille</b> de QGIS, l'opération paraît bien plus compliquée en SQL. Avec un peu de chance la partie suivante vous donnera l'impression inverse&nbsp;!</p>
                    
			     
			   <h3>Union et agrégation<a class="headerlink" id="IX55" href="#IX55"></a></h3>
			   
			     <p>Nous allons maintenant donner à chaque case de cette grille une valeur correspondant à sa surface en vignes, à partir de la couche <em class="data">clc00_vignes</em>.</p>
			     <p>Cette opération regroupe les 3 parties du chapitre précédent&nbsp;: <a href="09_04_maillage.php#IX43" >union</a>, <a href="09_04_maillage.php#IX44" >recalcul de la surface</a> et <a href="09_04_maillage.php#IX45" >agrégation des données par maille</a> (je vous avais bien dit que le SQL avait des avantages).</p>
			     <p>Comme d'habitude, à vous de choisir votre logiciel préféré pour cette opération, qui nécessite donc 2 couches : une grille, et une couche de polygones.</p>
			     
		         <div class="manip">
		             <p>La requête est la même pour SpatiaLite et PostGIS, il faut juste ajouter le nom du schéma <b>tutoqgis</b> pour PostGIS, et exécuter la requête sur <b>grid00_sp</b> et non <b>grid00</b> pour SpatiaLite.</p>
		             <p>SpatiaLite&nbsp;:</p>
		             <p class="code">CREATE TABLE grid00_surf AS
SELECT g.gid, g.geom, sum(ST_Area(ST_Intersection(v.geom, g.geom)))/10000 AS surf
FROM grid00_sp AS g, clc00_vignes AS v
WHERE ST_Intersects(g.geom, v.geom)
GROUP BY g.gid, g.geom
ORDER BY g.gid</p>

		             <p>PostGIS&nbsp;:</p>
		             <p class="code">CREATE TABLE tutoqgis.grid00_surf AS
SELECT g.gid, g.geom, sum(ST_Area(ST_Intersection(v.geom, g.geom)))/10000 AS surf
FROM tutoqgis.grid00 AS g, tutoqgis.clc00_vignes AS v
WHERE ST_Intersects(g.geom, v.geom)
GROUP BY g.gid, g.geom
ORDER BY g.gid</p>
                    <p>Exécutez cette requête dans SpatiaLite ou PostGIS.</p>
		         </div>
		         
		         <p>Comment fonctionne cette requête&nbsp;? Prenons ses lignes une à une, mais dans le désordre (ici il s'agit de la requête PostGIS, mais les explications sont les mêmes pour SpatiaLite)&nbsp;:</p>
		         <p class="code">CREATE TABLE tutoqgis.grid00_surf AS</p>
		         <p>Pas de souci ici, il s'agit de créer une table nommée <b>grid00_surf</b> dans le schéma <b>tutoqgis</b>. On passe 2 lignes plus loin&nbsp;!</p>
		         <p class="code">FROM tutoqgis.grid00 AS g, tutoqgis.clc00_vignes AS v</p>
		         <p>Comme prévu, cette requête va utiliser les 2 couches <b>grid00</b> et <b>clc00_vignes</b>, toutes 2 dans le schéma <b>tutoqgis</b>. Dans le reste de la requête, on se référera à ces tables par leur alias&nbsp;: <b>g</b> pour la grille, <b>v</b> pour les vignes. On remonte à la ligne du dessus...</p>
		         <p class="note">Si on veut relancer cette requête sur d'autres couches, grâce à l'alias il n'y aura besoin de modifier les noms des couches qu'à un seul endroit&nbsp;!</p>
		         <p class="code">SELECT g.gid, g.geom, sum(ST_Area(ST_Intersection(v.geom, g.geom)))/10000 AS surf</p>
		         <p>La couche créée va comporter 3 colonnes&nbsp;:</p>
		         <ul>
		             <li>La colonne d'identifiant unique <b>gid</b></li>
		             <li>Une colonne de géométrie, identique à celle de la couche <b>grid00</b></li>
		             <li>Une colonne nommée <b>surf</b>, correspondant à la somme (fonction <a class="ext" target="_blank" href="https://sql.sh/fonctions/agregation/sum">SUM</a>) des surfaces du résultat de l'intersection entre la grille et les vignes (fonction <a class="ext" target="_blank" href="http://www.postgis.fr/chrome/site/docs/workshop-foss4g/doc/geometry_returning.html#st-intersection" >ST_Intersection</a>). On divise cette somme par 10&nbsp;000 pour obtenir non plus des surfaces en mètres mais en hectares.</li>
		         </ul>
		         <p>On descend 2 lignes plus bas...</p>
		         <p class="code">GROUP BY g.gid, g.geom</p>
		         <p>La clause <a class="ext" target="_blank" href="https://sql.sh/cours/group-by" >GROUP BY</a> permet de regrouper toutes les entités ayant la même valeur de géométrie et d'identifant. Elle implique d'utiliser une fonction d'agrégation pour les colonnes autres que <b>geom</b> et <b>gid</b>. Ici, c'est la fonction d'agrégation <b>SUM</b> qui est utilisée dans la deuxième ligne de la requête pour créer la colonne <b>surf</b>.</p>
		         <p>La requête pourrait être lancée telle quelle. Pour qu'elle soit moins longue à s'exécuter, on a rajouté la ligne</p>
		         <p class="code">WHERE ST_Intersects(g.geom, v.geom)</p>
		         <p>qui permet de ne prendre en compte que les cases de la grille qui sont superposées avec des vignes. Avec ce critère, la table créée ne contient donc que ces cases. Vous pouvez tester en supprimant cette ligne, le résultat sera un peu plus long à créer.</p>
		         <p class="code">ORDER BY g.gid</p>
		         <p>Enfin, cette dernière ligne, optionnelle, permet de choisir l'ordre des lignes dans la table, ici un ordre croissant sur le champ gid.</p>
		         
		         <p>Si vous utilisez SpatiaLite, il reste une requête pour que la colonne géométrie soit reconnue en tant que telle.</p>
		         <div class="manip">
		          <p>Exécutez cette requête sur votre base SpatiaLite&nbsp;:</p>
		          <p class="code">SELECT RecoverGeometryColumn('grid00_surf', 'geom', 2154, 'POLYGON', 'XY');</p>
		          <p>Elle doit renvoyer la valeur <b>1</b>.</p>
		         </div>
		         
		         <p>On peut maintenant visualiser le résultat, que vous ayiez utilisé SpatiaLite ou PostGIS.</p>
		         
		         <div class="manip">
		          <p>Ajoutez la couche créée à QGIS. Vous pouvez par exemple lui attribuer un style gradué pour visualiser la présence de vignes&nbsp;:</p>
                    <figure>
    			     <a href="illustrations/tous/9_5_vignes_jenks7.png" >
    			         <img src="illustrations/tous/9_5_vignes_jenks7.png" alt="Surface en vignes par maille de 50km, discrétisation Jenks 7 classes" width="400">
    			     </a>
    	            </figure>
    	          </div>
			         
			     <p>Avec 5 ou 6 lignes de SQL, vous avez accompli l'équivalent de 3 outils QGIS et de beaucoup de clics&nbsp;!</p>
			     <p>Et surtout, il sera très facile de relancer toute cette opération sur d'autres données, comme nous allons le faire ci-dessous.</p>
			     
			   
			   <h3>Évolution temporelle&nbsp;: soustraction de 2 maillages<a class="headerlink" id="IX56" href="#IX56"></a></h3>
			   
			     <h4>Relancer l'opération sur les données Corine Land Cover 2012<a class="headerlink" id="IX56a" href="#IX56a"></a></h4>
			     
			         <p>Nous avons jusqu'ici travaillé sur les données Corine Land Cover 2000. Nous allons maintenant utiliser les données équivalentes pour l'année 2012, ce qui nous permettra de visualiser l'évolution entre ces 2 années.</p>
			         <p>Nous allons donc relancer l'opération précédente (union et agrégation) sur la couche CLC 2012.</p>
			         
			         <div class="manip">
			             <p>Ajoutez à QGIS la couche <a class="ext" target="_blank" href="http://www.donnees.statistiques.developpement-durable.gouv.fr/donneesCLC/CLC/millesime/CLC12_FR_RGF_SHP.zip">CLC12_FR_RGF</a> ou <em class="data"><a href="donnees/TutoQGIS_09_AnalyseSpat.zip">CLC12_221_FR_RGF</a></em>. Sélectionnez éventuellement les vignes ("CODE_12" = '221') et <a href="09_05_maillage_sql.php#IX52">importez-les</a> dans votre base SpatiaLite ou PostGIS sous le nom <b>clc12_vignes.</b></p>
			             <p>Il faut ensuite relancer les mêmes requêtes que précédemment, en remplaçant les noms des couches&nbsp;:</p>
			             <ul>
			                 <li><b>clc00_vignes</b> par <b>clc12_vignes</b></li>
			                 <li><b>grid00</b> par <b>grid12</b></li>
			                 <li><b>grid00_sp</b> par <b>grid12_sp</b> (pour SpatiaLite)</li>
			                 <li><b>grid00_surf</b> par <b>grid12_surf</b></li>
			             </ul>
			             <p>Attention, pour que les 2 grilles 2000 et 2012 se superposent exactement, nous allons créer la grille 2012 avec la même étendue que la couche clc00_vignes et non clc12_vignes (ce qui est possible car il n'existe pas de nouvelles vignes en 2012 hors emprise de la couche 2000).</p>
			             <p>Pour SpatiaLite&nbsp;:</p>
			             <p class="code">CREATE TABLE grid12 (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT);</p>
			             <p class="code">SELECT AddGeometryColumn('grid12','geom',2154,'MULTIPOLYGON','XY');</p>
			             <p class="code">INSERT INTO grid12 (geom) SELECT ST_SquareGrid(Extent(v.geom), 50000) AS geom
FROM clc00_vignes AS v;</p>
                         <p class="code">SELECT ElementaryGeometries('grid12', 'geom', 'grid12_sp','gid','fid') as geom
FROM grid12;</p>
                         <p class="code">CREATE TABLE grid12_surf AS
SELECT g.gid, g.geom, sum(ST_Area(ST_Intersection(v.geom, g.geom)))/10000 AS surf
FROM grid12_sp AS g, clc12_vignes AS v
WHERE ST_Intersects(g.geom, v.geom)
GROUP BY g.gid, g.geom
ORDER BY g.gid;</p>
                         <p class="code">SELECT RecoverGeometryColumn('grid12_surf', 'geom', 2154, 'POLYGON', 'XY');</p>
                         
                         <p>Pour PostGIS&nbsp;:</p>
                         <p class="code">CREATE TABLE tutoqgis.grid12 as
SELECT row_number() over () as gid, geom FROM 
(SELECT (ST_Dump(makegrid_2d(
(select st_setsrid(st_extent(geom), 2154) from tutoqgis.clc00_vignes), 
50000)
)).geom AS geom) AS q_grid;</p>
                         <p class="code">Select populate_geometry_columns();</p>
                         <p class="code">CREATE TABLE tutoqgis.grid12_surf AS
SELECT g.gid, g.geom, sum(ST_Area(ST_Intersection(v.geom, g.geom)))/10000 AS surf
FROM tutoqgis.grid12 AS g, tutoqgis.clc12_vignes AS v
WHERE ST_Intersects(g.geom, v.geom)
GROUP BY g.gid, g.geom
ORDER BY g.gid;</p>
			         </div>
			         
			         <p>Rapide, non&nbsp;? Quand vous travaillez avec des requêtes SQL, une pratique peut être de copier les requêtes dans un fichier texte. Ainsi vous en gardez la mémoire, et si vous avez besoin de les relancer sur d'autres données, il vous suffira de faire un rechercher-remplacer sur les noms des couches, puis de recopier ces requêtes dans le gestionnaire de bases de données QGIS.</p>
			         <p>Il est possible en SQL d'ajouter des <a class="ext" target="_blank" href="https://sql.sh/cours/commentaires">commentaires</a>, non pris en compte : la ligne doit alors être précédée par 2 tirets. Ceci vous permet d'expliquer vos requêtes, ce qui est toujours utile quand on reprend un travail quelques semaines/mois/années plus tard, ou pour vos collègues.</p>
			     
			     
			     <h4>Soustraire les 2 maillages 2012 et 2000<a class="headerlink" id="IX56b" href="#IX56b"></a></h4>
			     
			         <p>En guise de dernière application pour ce chapitre, nous allons voir 2 manières de visualiser l'évolution de la surface en vignes entre 2000 et 2012&nbsp;:</p>
			         <ul>
			             <li>Avec des requêtes SQL</li>
			             <li>En mode raster</li>
			         </ul>
			         <p>On pourrait aussi travailler en mode raster avec des requêtes SQL&nbsp;! Mais ce chapitre est déjà bien rempli.</p>
			         
			         <p>L'idée est donc de soustraire pour chaque case de grille les données 2000 aux données 2012, afin de visualiser une évolution, négative ou positive.</p>
			         
			         <p>Si on utilise le langage SQL, on va pouvoir faire une <a href="08_01_jointure_attrib.php" >jointure attributaire</a> sur le champ gid entre les 2 couches <em class="data">grid00_surf</em> et <em class="data">gri12_surf</em>.</p>
			         <p>La requête sera la même pour SpatiaLite et PostGIS, il faut simplement ajouter le nom du schéma <b>tutoqgis</b> devant le nom des tables pour PostGIS, et mettre à jour la colonne de géométrie pour SpatiaLite.</p>
			         
			         <div class="manip">
			             <p>SpatiaLite&nbsp;:</p>
			             <p class="code">CREATE TABLE evol_00_12 AS
SELECT g1.gid, (g2.surf - g1.surf) AS diff_surf, g1.geom
FROM grid00_surf AS g1, grid12_surf AS g2
WHERE g1.gid = g2.gid;</p>
                         <p class="code">SELECT RecoverGeometryColumn('evol_00_12', 'geom', 2154, 'POLYGON', 'XY');</p>
                         
                         <p>PostGIS&nbsp;:</p>
                         <p class="code">CREATE TABLE tutoqgis.evol_00_12 AS
SELECT g1.gid, (g2.surf - g1.surf) AS diff_surf, g1.geom
FROM tutoqgis.grid00_surf AS g1, tutoqgis.grid12_surf AS g2
WHERE g1.gid = g2.gid;</p>
			         </div>
			         
			         <p>Cette requête crée une couche <b>evol_00_12</b> avec 3 colonnes&nbsp;:</p>
			         <ul>
			             <li><b>gid</b>, ici en récupérant le champ gid de la couche grid00 (mais on aurait très bien pu remplacer g1.gid par g2.gid, le résultat serait le même)</li>
			             <li>une colonne <b>diff_surf</b> correspondant à la différence de surface en vignes entre 2012 et 2000</li>
			             <li>la géométrie <b>geom</b>, idem on aurait pu remplacer g1.geom par g2.geom</li>
			         </ul>
			         <p>La ligne</p>
			         <p class="code">WHERE g1.gid = g2.gid</p>
			         <p>est celle qui fait la jointure entre les 2 couches, sur le champ <b>gid</b>.</p>
			         
			         <div class="manip">
			             <p>Pour visualiser cette évolution, ajoutez la couche à QGIS, avec un style gradué&nbsp;:</p>
			             <figure>
        			         <a href="illustrations/tous/9_5_evol_gradue.png" >
        			             <img src="illustrations/tous/9_5_evol_gradue.png" alt="Paramétrage du style gradué avec une gamme de couleur divergente et une classification symmétrique" width="600">
        			         </a>
        	            </figure>
        	            <ul>
        	               <li class="espace">Style <b>gradué</b>...</li>
        	               <li class="espace">...sur le champ <b>diff_surf</b></li>
        	               <li class="espace">Sélectionnez une palette de couleur divergente, pour représenter d'une couleur les diminutions et d'une autre les augmentations</li>
        	               <li class="espace">Choissisez une discrétisation par intervalles égaux</li>
        	               <li class="espace">Cliquez sur le bouton <b>Classer</b></li>
        	               <li class="espace">Cochez la case <b>Classification symétrique</b>, pour représenter avec la même intensité de couleur des variations positives et négatives de même ampleur, avec comme valeur du milieu <b>0</b></li>
        	            </ul>
        	            <figure>
        			         <a href="illustrations/tous/9_5_evol_res.png" >
        			             <img src="illustrations/tous/9_5_evol_res.png" alt="Exemple de représentation de l'évolution de la surface en vigne, gamme de couleur divergente, intervalles égaux, 5 classes" width="400">
        			         </a>
        	            </figure>
        	            <p>Une taille de maille différente donnerait un résultat différent&nbsp;!</p>
			         </div>
			         
			         <p>Une autre manière de faire pour cette opération est de convertir les 2 maillages en rasters, et de soustraire ces rasters l'un à l'autre.</p>

			         <div class="manip">
			             <p>Ouvrez un nouveau projet QGIS, ajoutez-y vos 2 couches SpatiaLite ou PostGIS <em class="data">grid00_surf</em> et <em class="data">grid12_surf</em>.</p>
			             <p>Dans la boîte à outils, cherchez l'outil GDAL <b>Rasteriser (vecteur vers raster)</b>&nbsp;:</p>
			             <figure>
        			         <a href="illustrations/tous/9_5_rasteriser_emplacement.png" >
        			             <img src="illustrations/tous/9_5_rasteriser_emplacement.png" alt="Recherche par filtre de l'outil rasteriser dans la toolbox" width="320">
        			         </a>
        	            </figure>
        	            <p>Double-cliquez sur cet outil&nbsp;:</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_rasteriser_fenetre.png" >
        			             <img src="illustrations/tous/9_5_rasteriser_fenetre.png" alt="Paramétrage de l'outil rasteriser pour la couche grid00_surf" width="500">
        			         </a>
        	            </figure>
        	            <ul>
        	               <li class="espace">Couche source&nbsp;: sélectionnez la couche <b>grid00_surf</b></li>
        	               <li class="espace">Champ à utiliser&nbsp;: sélectionnez le champ <b>surf</b>, chaque pixel du raster aura ainsi la valeur correspondante de ce champ</li>
        	               <li class="espace">Unité du raster résultat&nbsp;: afin de pouvoir fixer la taille du pixel en mètres et non le nombre de pixel du raster résultat, sélectionnez <b>Unités géoréférencées</b></li>
        	               <li class="espace">Largeur/Résolution horizontale et verticale&nbsp;: tapez <b>50&nbsp;000</b> pour une taille de pixel de 50 km, identique à celle du maillage d'origine</li>
        	               <li class="espace">Emprise du résultat&nbsp;: cliquez sur les <b>...</b> à droite et sélectionnez la couche <b>grid00_surf</b>, pour que le futur raster ait la même étendue que le maillage d'origine</li>
        	               <li class="espace">Vous pouvez choisir de créer un fichier temporaire ou bien d'enregistrer le résultat sur votre ordinateur.</li>
        	            </ul>
        	            <p>Lancez la rastérisation... La couche résultat est automatiquement ajoutée à QGIS, et se superpose avec la couche grid00_surf&nbsp;:</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_rasteriser_res.png" >
        			             <img src="illustrations/tous/9_5_rasteriser_res.png" alt="Résultat de la rastérisation, superposé à la couche d'origine" width="550">
        			         </a>
        	            </figure>
        	            <p>Si vous avez créé une couche temporaire, renommez-la par exemple <b>rast00</b> (en la sélectionnant puis en appuyant sur la touche F2) afin de ne pas la confondre avec le deuxième raster sur 2012 par la suite.</p>
        	            <p>Effectuez la même opération sur la couche <b>grid12_surf</b> pour créer un deuxième raster. Si c'est une couche temporaire, renommez-la par exemple <b>rast12</b>.</p>
        	            <p>Il ne reste plus qu'à soustraire ces 2 rasters au moyen de la calculatrice raster.</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_rastercalc_emplacement.png" >
        			             <img src="illustrations/tous/9_5_rastercalc_emplacement.png" alt="Emplacement de l'outil Raster calculator dans la toolbox" width="320">
        			         </a>
        	            </figure>
        	            <figure>
        			         <a href="illustrations/tous/9_5_rastercalc_fenetre.png" >
        			             <img src="illustrations/tous/9_5_rastercalc_fenetre.png" alt="Paramétrage de l'outil Raster calculator" width="600">
        			         </a>
        	            </figure>
        	            <ul>
        	               <li class="espace">Expression&nbsp;: double-cliquez sur la couche <b>rast12</b>, tapez le signe <b>-</b> (ou cliquez sur ce signe dans les opérateur), puis double-cliquez sur la couche <b>rast00</b>. L'expression finale est <b>"rast12@1" - "rast00@1"</b></li>
        	               <li class="espace">Reference layer&nbsp;: cliquez sur les <b>...</b> tout à droite, et sélectionnez l'une ou l'autre couche <b>rast00</b> ou <b>rast12</b>&nbsp;: la couche créée aura la même emprise, résolution et SCR que cette couche de référence</li>
        	               <li class="espace">Output&nbsp;: vous pouvez soit créer une couche temporaire, soit enregistrer cette couche sur votre ordinateur</li>
        	            </ul>
        	            <p>Par défaut, le résultat s'affiche en niveau de gris&nbsp;:</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_evol_raster1.png" >
        			             <img src="illustrations/tous/9_5_evol_raster1.png" alt="Résultat de la différence des 2 rasters : style par défaut bande grise unique" width="400">
        			         </a>
        	            </figure>
        	            <p>Pour une représentation similaire à celle obtenue plus haut, il faut paramétrer le style de ce raster (cliquez sur l'image pour la voir en plus grand)&nbsp;:</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_evolraster_discretisation.png" >
        			             <img src="illustrations/tous/9_5_evolraster_discretisation.png" alt="Paramétrage du style pour obtenir une discrétisation en 5 classes avec gamme de couleur divergente" width="600">
        			         </a>
        	            </figure>
        	            <ul>
        	               <li class="espace">Type de rendu&nbsp;: <b>pseudo-couleur à bande unique</b></li>
        	               <li class="espace">Interpolation&nbsp;: <b>discrète</b></li>
        	               <li class="espace">Palette de couleur&nbsp;: choisissez une gamme de couleur divergente, pour représenter d'une couleur les diminutions, et d'une autre les augmentations</li>
        	               <li class="espace">Cliquez ensuite sur <b>Classer</b> pour créer 5 classes</li>
        	               <li class="espace">Valeurs de classes&nbsp;: ici, pas de possibilité de spécifier une discrétisation symétrique autour de 0. Le plus simple est donc de recopier les limites de classes obtenues plus haut pour la couche vecteur. Attention, il s'agit des bornes supérieures des classes&nbsp;!</li>
        	            </ul>
        	            <p>Au final, le résultat est identique à celui obtenu en mode vecteur&nbsp;:</p>
        	            <figure>
        			         <a href="illustrations/tous/9_5_evolraster_res.png" >
        			             <img src="illustrations/tous/9_5_evolraster_res.png" alt="Résultat de la discrétisation en 5 classes, du rose au vert" width="400">
        			         </a>
        	            </figure>
			         </div>
			         
			         <p>Bravo, vous êtes arrivés au bout de ce chapitre&nbsp;! Vous pouvez vous reposer avec le suivant sur les modes de représentation et la mise en page de cartes.</p>
			
				
				<br>
				<a class="prec" href="09_04_maillage.php">chapitre précédent</a>
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
