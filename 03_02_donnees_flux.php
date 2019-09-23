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
			<h2>III.2  Ajout de données via des flux</h2>
				<ul class="listetitres">
					<li><a href="#III21">Qu'est-ce qu'un flux WMS ou WFS?</a></li>
					<li><a href="#III22">Ajout de données via un flux WMS : carte géologique</a></li>
					<li><a href="#III23">Ajout de données via un flux WFS : cours d'eau</a></li>
					<li><a href="#III24">Avantages et inconvénients des flux</a></li>
				</ul>
	
			
			<h3><a class="titre" id="III21">Qu'est-ce qu'un flux WMS ou WFS?</a></h3>
			
				<p>Il est possible de visualiser directement dans un SIG des données accessibles sur un serveur, sans devoir préalablement les télécharger sur votre ordinateur. Ceci se fait via des flux. Les deux types de flux les plus courant permettant ceci sont les <b>flux WMS (Web Map Service)</b> et <b>WFS (Web Feature Service)</b>.</p>
				<ul>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Map_Service">flux WMS</a> vont vous permettre d'afficher des couches raster, non modifiables.</li>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Feature_Service">flux WFS</a> vous permettront d'afficher des couches vecteur, non directement modifiables mais que vous pourrez ensuite télécharger au format shapefile.</li>
				</ul>			
				
			
			<h3><a class="titre" id="III22">Ajout de données via un flux WMS : carte géologique</a></h3>
				
				<div class="manip">
					<p>Lancez QGIS si ce n'est pas déjà fait, ou bien créez un nouveau projet.</p>
					<p><img class="icone" src="illustrations/tous/1_2_gestionnaire_donnees_icone.png" alt="icône gestionnaire de source de données" > Ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">DEPARTEMENT_CREUSE.gpkg</a></em> que vous trouverez dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
					<p>Donnez au projet le même SCR que la couche  <em class="data">DEPARTEMENT_CREUSE.shp</em>.</p>
				</div>
				<p>Nous allons maintenant ajouter au projet la carte géologique de la France au 1/1 000 000è via un flux WMS.</p>
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/1_2_gestionnaire_donnees_icone.png" alt="icône gestionnaire de source de données" >Cliquez sur l'icône du gestionnaire des sources de données, allez dans la rubrique <b>WMS/WMTS</b> :</p>
					<figure>
						<a href="illustrations/tous/3_2_ajout_wms_fenetre.png" >
							<img src="illustrations/tous/3_2_ajout_wms_fenetre.png" alt="Fenêtre ajout couche WMS" width="580">
						</a>
					</figure>
					<p>Cliquez sur le bouton <b>Nouveau</b> pour créer une nouvelle connexion. La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/3_2_wms_nouveau.png" >
							<img src="illustrations/tous/3_2_wms_nouveau.png" alt="Fenêtre de création d'une nouvelle connexion WMS" width="80%">
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Nom :</b> tapez le nom de votre choix, par exemple BRGM</li>
						<li class="espace"><b>URL :</b> tapez l’URL suivante, qui correspond à l'adresse du serveur WMS du BRGM : http://geoservices.brgm.fr/geologie</li>
					</ul>
					<p>Laissez les autres paramètres tels quels et cliquez sur <b>OK</b>. Vous voilà à nouveau dans la fenêtre d'ajout d'une couche WMS :</p>
					<ul>
						<li class="espace">Après avoir vérifié que votre connexion est bien sélectionnée dans la liste déroulante en haut de la fenêtre, cliquez sur <b>Connexion</b></li>
						<figure>
						<a href="illustrations/tous/3_2_wms_connexion.png">
							<img src="illustrations/tous/3_2_wms_connexion.png" alt="Fenêtre ajout d'une couche WMS, connexion au serveur du BRGM et choix de la couche à ajouter" width="500" >
						</a>
					    </figure>
						<li class="espace">Rendez-vous dans la rubrique <b>0 GEOSERVICES_GEOLOGIE &#8594; 1 GEOLOGIE</b> et sélectionnez la couche correspondant à la <b>carte géologique image de la France au 1/1 000 000</b> (million).</li>
						<li class="espace">Vérifiez que les SCR de cette couche soit bien <b>RGF93 / Lambert-93 (code EPSG 2154)</b> afin que la couche ait le même SCR que notre projet</li>
						<li class="espace">Cliquez sur <b>Ajouter</b>, patientez...</li>
						<li class="espace">Modifiez éventuellement votre <b>niveau de zoom</b> : cette carte étant au 1/1 000 000, la couche n'est visible qu'autour de cette échelle (vous pouvez lire l'échelle en cours dans la barre en bas de la fenêtre de QGIS)</li>
					</ul>
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/tous/3_2_superposition_creuse_geol.png" >
							<img src="illustrations/tous/3_2_superposition_creuse_geol.png" alt="superposition du département de la Creuse et de la carte géologique" width="300" >
						</a>
					</figure>
					<p>Il peut être nécessaire de changer l'ordre des couches en les faisant glisser dans la table des matières, et de <a href="01_02_info_geo.php#I23a">modifier le style</a> de la couche du département de la Creuse (ici, pas de remplissage et une bordure blanche).</p>
				</div>
				
				<p class="note">Pour aller plus loin : le niveau de zoom auquel une couche est visible est parfois indiqué dans le résumé ; sinon, il est possible d'interroger le serveur qui propose les couches, en allant par exemple ici à l'URL <a class="ext" target="_blank" href="http://geoservices.brgm.fr/geologie?service=wms&request=GetCapabilities" >http://geoservices.brgm.fr/geologie?service=wms&request=GetCapabilities</a> dans un navigateur internet, puis en recherchant les balises <b>MinScaleDenominator</b> et <b>MaxScaleDenominator</b> pour la couche choisie. Pour en savoir plus, rendez-vous sur le <a class="ext" target="_blank" href="https://georezo.net/wiki/main/standards/wms" >wiki du GeoRezo</a>.</p>
				
				<p>Ici, l'adresse du serveur WMS vous était fournie ; si vous cherchez des adresses de flux, deux solutions : une recherche internet, ou bien l'onglet <b>Recherche de serveurs</b> de la fenêtre d'ajout d'une couche WMS :</p>
				<figure>
					<a href="illustrations/tous/3_2_recherche_serveur_wms.png" >
						<img src="illustrations/tous/3_2_recherche_serveur_wms.png" alt="Onglet recherche de serveurs de la fenêtre d'ajout d'une couche WMS" width="550" >
					</a>
				</figure>
				<p>Dans cette fenêtre, vous pouvez taper du texte dans la partie <b>Recherche</b>, voir la liste des serveurs contenant ce texte, et ajouter une ligne de cette liste à la liste de vos connexions visible dans l'onglet <b>Couche</b>, grâce au bouton <b>Ajoutez les lignes sélectionnées à la liste des serveurs WMS</b>.</p>
				<p>La nouvelle connexion sera alors accessible dans l'onglet <b>Couches</b>, aux côtés de la connexion BRGM créée précédemment.</p>
			
			
			<h3><a class="titre" id="III23">Ajout de données via un flux WFS : cours d'eau</a></h3>
			
				<p>Le but va être ici d'ajouter les cours d'eau de la <a class="ext" target="_blank" href="http://professionnels.ign.fr/bdcarthage">BD Carthage</a> du Sandre (Service d'Administration Nationale des Données et Référentiels sur l'Eau).</p>
				
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/1_2_gestionnaire_donnees_icone.png" alt="icône gestionnaire de source de données" >Cliquez sur l'icône du gestionnaire des sources de données, rubrique <b>WFS</b> :</p>
					<figure>
						<a href="illustrations/tous/3_2_ajout_wfs_fenetre.png" >
							<img src="illustrations/tous/3_2_ajout_wfs_fenetre.png" alt="Fenêtre ajout couche WFS" width="480">
						</a>
					</figure>
					<p>Cliquez sur le bouton <b>Nouveau</b> pour créer une nouvelle connexion. La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/3_2_wfs_nouveau.png" >
							<img src="illustrations/tous/3_2_wfs_nouveau.png" alt="Fenêtre de création d'une nouvelle connexion WFS" width="75%">
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Nom :</b> tapez le nom de votre choix, par exemple BD Carthage</li>
						<li class="espace"><b>URL :</b> tapez l’URL suivante, qui correspond à l'adresse du serveur WFS du Sandre : http://services.sandre.eaufrance.fr/geo/zonage</li>
					</ul>
					<p>Laissez les autres paramètres tels quels et cliquez sur <b>OK</b>. Vous voilà à nouveau dans la fenêtre d'ajout d'une couche WFS :</p>
					<figure>
						<a href="illustrations/tous/3_2_wfs_connexion.png" >
							<img src="illustrations/tous/3_2_wfs_connexion.png" alt="Fenêtre ajout d'une couche WFS, connexion au serveur du Sandre et choix de la couche à ajouter" width="90%" >
						</a>
					</figure>
					<ul>
						<li class="espace">Après avoir vérifier que votre connexion est bien sélectionnée dans la liste déroulante en haut de la fenêtre, cliquez sur <b>Connexion</b></li>
						<li class="espace">Sélectionnez la couche correspondant aux <b>cours d'eau métropole de plus de 100km (CoursEau1) (il faut descendre un peu dans la liste des couches proposées)</b></li>
						<li class="espace">Vérifiez que le SCR soit bien le Lambert 93 RGF93 (code EPSG 2154) afin que toutes nos couches aient le même SCR</li>
						<li class="espace">Cliquez sur <b>Ajouter</b></li>
					</ul>
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/tous/3_2_superposition_creuse_courdo.png" >
							<img src="illustrations/tous/3_2_superposition_creuse_courdo.png" alt="superposition du département de la Creuse et des cours d'eau de plus de 100km" width="300" >
						</a>
					</figure>
					<p>Il peut être nécessaire de changer l'ordre des couches en les faisant glisser dans la table des matières, et de <a href="01_02_info_geo.php#I23a">modifier le style</a> de la couche du département de la Creuse. Vu qu'il s'agit ici d'un flux WFS et non WMS, il est également possible de modifier le style des cours d'eau. La carte géologique étant une couche WMS, on ne peut modifier son style mais il est possible de lui donner une transparence afin de l'atténuer.</p>
				</div>
				<p>De même, s'agissant d'un flux WFS, il est possible de sauvegarder les cours d'eau au format shapefile : clic droit sur la couche, Exporter, Sauvegarder les entités sous...</p>
	
			<h3><a class="titre" id="III24">Avantages et inconvénients des flux</a></h3>
				
				<p>Un inconvénient d'utiliser des flux est le temps de chargement et la nécessité d'avoir une connexion internet.</p>
				<p>Cependant, ils vous assurent de toujours visualiser la dernière mise à jour des données, vous évitent d'encombrer vos ordinateurs et vous permettent de transmettre des projets QGS à des collègues en étant sûr que ceux-ci puissent en visualiser les données (s'ils sont connectés à internet).</p>
				<p>En résumé, c'est probablement l'usage que vous ferez des données qui vous fera opter pour l'une ou l'autre solution.</p>
	
				<br>
				<a class="prec" href="03_01_donnees_internet.php">chapitre précédent</a>
				<a class="suiv" href="03_03_donnees_XY.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>						
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_3.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
