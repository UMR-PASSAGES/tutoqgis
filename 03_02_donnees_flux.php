<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
			<h2>III.2  Ajout de données via des flux</h2>
				<ul class="listetitres">
					<li><a href="#III21">Qu'est-ce qu'un flux WMS ou WFS ?</a></li>
					<li><a href="#III22">Ajout de données via un flux WMS : carte géologique</a></li>
					<li><a href="#III23">Ajout de données via un flux WFS : cours d'eau</a></li>
					<li><a href="#III24">Ajout de données WMS ou WFS via le panneau explorateur</a></li>
					<li><a href="#III25">Avantages et inconvénients des flux</a></li>
					<li><a href="#III26">Quelques adresses de flux WMS et WFS</a></li>
				</ul>
	
			
			<h3>Qu'est-ce qu'un flux WMS ou WFS ?<a class="headerlink" id="III21" href="#III21"></a></h3>
			
				<p>Il est possible de visualiser directement dans un SIG des données accessibles sur un serveur, sans devoir préalablement les télécharger sur votre ordinateur. Ceci se fait via des flux. Les deux types de flux les plus courant permettant ceci sont les <b>flux WMS (Web Map Service)</b> et <b>WFS (Web Feature Service)</b>.</p>
				<ul>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Map_Service">flux WMS</a> vont vous permettre d'afficher des couches raster, non modifiables.</li>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Feature_Service">flux WFS</a> vous permettront d'afficher des couches vecteur, non directement modifiables mais que vous pourrez ensuite télécharger au format shapefile.</li>
				</ul>			
				
			
			<h3>Ajout de données via un flux WMS : carte géologique<a class="headerlink" id="III22" href="#III22"></a></h3>
				
				<div class="manip">
					<p>Lancez QGIS si ce n'est pas déjà fait, ou bien créez un nouveau projet.</p>
					<p><img class="icone" src="illustrations/1_2_gestionnaire_donnees_icone.jpg" alt="icône gestionnaire de source de données" > Ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">DEPARTEMENT_CREUSE.gpkg</a></em> que vous trouverez dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
					<p>Donnez au projet le même SCR que la couche  <em class="data">DEPARTEMENT_CREUSE.shp</em>.</p>
				</div>
				<p>Nous allons maintenant ajouter au projet la carte géologique de la France au 1/1 000 000è via un flux WMS.</p>
				<div class="manip">
					<p><img class="icone" src="illustrations/1_2_gestionnaire_donnees_icone.jpg" alt="icône gestionnaire de source de données" >Cliquez sur l'icône du gestionnaire des sources de données, allez dans la rubrique <b>WMS/WMTS</b> :</p>
					<figure>
						<a href="illustrations/3_2_ajout_wms_fenetre.jpg" >
							<img src="illustrations/3_2_ajout_wms_fenetre.jpg" alt="Fenêtre ajout couche WMS" width="580">
						</a>
					</figure>
					<p>Cliquez sur le bouton <b>Nouveau</b> pour créer une nouvelle connexion. La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/3_2_wms_nouveau.jpg" >
							<img src="illustrations/3_2_wms_nouveau.jpg" alt="Fenêtre de création d'une nouvelle connexion WMS" width="400">
						</a>
					</figure>
					<ul>
						<li class="espace"><b>Nom :</b> tapez le nom de votre choix, par exemple BRGM</li>
						<li class="espace"><b>URL :</b> tapez l’URL suivante, qui correspond à l'adresse du serveur WMS du BRGM : https://geoservices.brgm.fr/geologie</li>
					</ul>
					<p class="note">Les adresses des flux produits par le <a class="ext" target="_blank" href="https://www.brgm.fr/" >Bureau des Recherches Géologiques et Minières (BRGM)</a> sont disponibles <a class="ext" target="_blank" href="https://infoterre.brgm.fr/page/geoservices-ogc" >ici</a>.</p>
					<p>Laissez les autres paramètres tels quels et cliquez sur <b>OK</b>. Vous voilà à nouveau dans la fenêtre d'ajout d'une couche WMS :</p>
					<ul>
						<li class="espace">Après avoir vérifié que votre connexion est bien sélectionnée dans la liste déroulante en haut de la fenêtre, cliquez sur <b>Connexion</b></li>
					</ul>
					<figure>
						<a href="illustrations/3_2_wms_connexion.jpg">
							<img src="illustrations/3_2_wms_connexion.jpg" alt="Fenêtre ajout d'une couche WMS, connexion au serveur du BRGM et choix de la couche à ajouter" width="500" >
						</a>
					</figure>
					<ul>
						<li class="espace">Rendez-vous dans la rubrique <b>0 GEOSERVICES_GEOLOGIE &#8594; 1 GEOLOGIE</b> et sélectionnez la couche correspondant à la <b>carte géologique image de la France au 1/1 000 000</b> (million).</li>
						<li class="espace">Vérifiez que les SCR de cette couche soit bien <b>RGF93 / Lambert-93 (code EPSG 2154)</b> afin que la couche ait le même SCR que notre projet : il faudra peut-être cliquer que le bouton à droite du SCR pour sélectionner le Lambert 93</li>
						<li class="espace">Cliquez sur <b>Ajouter</b>, patientez... Une fois la couche affichée, vous pouvez fermer la fenêtre du gestionnaire de sources de données</li>
						<li class="espace">Modifiez éventuellement votre <b>niveau de zoom</b> : cette carte étant au 1/1 000 000, la couche n'est visible qu'autour de cette échelle (vous pouvez lire l'échelle en cours dans la barre en bas de la fenêtre de QGIS)</li>
					</ul>
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/3_2_superposition_creuse_geol.jpg" >
							<img src="illustrations/3_2_superposition_creuse_geol.jpg" alt="superposition du département de la Creuse et de la carte géologique" width="300" >
						</a>
					</figure>
					<p>Il peut être nécessaire de changer l'ordre des couches en les faisant glisser dans la table des matières, et de <a href="01_02_info_geo.php#I23a">modifier le style</a> de la couche du département de la Creuse (ici, pas de remplissage et une bordure blanche).</p>
				</div>
				
				<p class="note">Pour aller plus loin : le niveau de zoom auquel une couche est visible est parfois indiqué dans le résumé ; sinon, il est possible d'interroger le serveur qui propose les couches, en allant par exemple ici à l'URL <a class="ext" target="_blank" href="http://geoservices.brgm.fr/geologie?service=wms&request=GetCapabilities" >http://geoservices.brgm.fr/geologie?service=wms&request=GetCapabilities</a> dans un navigateur internet, puis en recherchant les balises <b>MinScaleDenominator</b> et <b>MaxScaleDenominator</b> pour la couche choisie. Pour en savoir plus, rendez-vous sur le <a class="ext" target="_blank" href="https://georezo.net/wiki/main/standards/wms" >wiki du GeoRezo</a>.</p>
							
			
			<h3>Ajout de données via un flux WFS : cours d'eau<a class="headerlink" id="III23" href="#III23"></a></h3>
			
				<p>Le but va être ici d'ajouter une couche WFS de cours d'eau disponible via le <a class="ext" target="_blank" href="https://www.sandre.eaufrance.fr/">Sandre</a> (Service d'Administration Nationale des Données et Référentiels sur l'Eau). Les adresses des flux du Sandre sont disponible sur <a class="ext" target="_blank" href="https://www.sandre.eaufrance.fr/actualite/evolution-des-services-web-g%C3%A9ographiques" >cette page</a>.</p>
				<p>Cette opération est similaire à celle décrite ci-dessus pour une couche WMS.</p>
				
				<div class="manip">
				    <p>Cliquez sur l'icône du gestionnaire des sources de données, rubrique <b>WFS / OGC API - Features</b>&nbsp;:</p>
				    <figure>
						<a href="illustrations/3_2_ajout_wfs_fenetre.jpg" >
							<img src="illustrations/3_2_ajout_wfs_fenetre.jpg" alt="Fenêtre du gestionnaire de sources de données, rubrique WFS" width="600" >
						</a>
					</figure>
					<p>Cliquez sur le bouton <b>Nouveau</b> pour créer une nouvelle connexion. La fenêtre suivante apparaît&nbsp;:</p>
					<figure>
						<a href="illustrations/3_2_wfs_nouveau.jpg" >
							<img src="illustrations/3_2_wfs_nouveau.jpg" alt="Fenêtre de création d'une nouvelle connexion WFS (gestionnaire de sources de données)" width="400" >
						</a>
					</figure>
					<ul>
					   <li class="espace">Nom&nbsp;: tapez le nom de votre choix, par exemple <b>Sandre</b></li>
					   <li class="espace">URL&nbsp;: tapez l'adresse <b>https://services.sandre.eaufrance.fr/geo/sandre</b></li>
					</ul>
					
					<p class="note">Cette url est disponible <a class="ext" target="_blank" href="https://www.sandre.eaufrance.fr/actualite/evolution-des-services-web-g%C3%A9ographiques" >sur le site du Sandre</a>.</p>
					<p>Laissez les autres paramètres tels quels et cliquez sur OK. Vous voilà à nouveau dans la fenêtre d'ajout d'une couche WFS&nbsp;:</p>
					
					<figure>
						<a href="illustrations/3_2_wfs_connexion.jpg" >
							<img src="illustrations/3_2_wfs_connexion.jpg" alt="Fenêtre du gestionnaire de source de données : connexion au Sandre et choix de la couche de cours d'eau" width="600" >
						</a>
					</figure>
					<ul>
						<li class="espace">Après avoir vérifier que votre connexion est bien sélectionnée dans la liste déroulante en haut de la fenêtre, cliquez sur <b>Connexion</b></li>
						<li class="espace">En vous aidant éventuellement d'un filtre (<b>plans</b>), sélectionnez la couche correspondant aux <b>Plans d'eau - BD Topage - Métropole - 2022</b></li>
						<li class="espace">Vérifiez que le SCR soit bien le Lambert 93 RGF93 (code EPSG 2154) afin que toutes nos couches aient le même SCR, en cliquant éventuellement sur le bouton <b>Changer...</b></li>
						<li class="espace">Cliquez sur <b>Ajouter</b></li>
					</ul>
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/3_2_superposition_creuse_courdo.jpg" >
							<img src="illustrations/3_2_superposition_creuse_courdo.jpg" alt="superposition du département de la Creuse, de la carte géol et des plans d'eau" width="350" >
						</a>
					</figure>
					<p>Il peut être nécessaire de changer l'ordre des couches en les faisant glisser dans la table des matières, et de <a href="01_02_info_geo.php#I23a">modifier le style</a> de la couche du département de la Creuse. Vu qu'il s'agit ici d'un flux WFS et non WMS, il est également possible de modifier le style des cours d'eau. La carte géologique étant une couche WMS, on ne peut modifier son style mais il est possible de lui donner une <b>transparence</b> afin de l'atténuer.</p>
				</div>
				<p>De même, s'agissant d'un flux WFS, il est possible de <b>sauvegarder les cours d'eau</b> au format vectoriel sur votre ordinateur : clic droit sur la couche &#8594; Exporter &#8594; Sauvegarder les entités sous...</p>
	
			<h3>Ajout de données WMS ou WFS via le panneau explorateur<a class="headerlink" id="III24" href="#III24"></a></h3>
			
			 <p>Une autre méthode, plus rapide, pour créer des connexions et ajouter des couches WMS et WFS est de passer par le <a href="01_02_info_geo.php#I21b">panneau explorateur</a>.</p>
			 <p>Cependant, cette méthode ne permet pas autant de paramétrage que le gestionnaire de sources de données&nbsp;: par exemple, il n'est pas possible de choisir le SCR d'une couche.</p>
			 <p>Nous allons voir ici comment ajouter une couche de mines accessible via la connexion aux flux WMS du BRGM créée <a href="03_02_donnees_flux.php#III22" >plus haut</a>, en utilisant le panneau explorateur.</p>
			 
			 <div class="manip">
			     <p>Le <a href="01_02_info_geo.php#I21b">panneau explorateur</a> permet de charger rapidement des couches, en explorant vos dossiers sur votre ordinateur mais aussi vos connexions à des flux ou des bases de données.</p>
			     <p>Si vous ne le voyez pas, activez-le dans le Menu Vue &#8594; Panneaux &#8594; Panneau Explorateur.</p>
			     <p>Dépliez la rubrique <b>WMS/WMTS</b> en cliquant sur le petit triangle, puis <b>BRGM &#8594; Géoservices... &#8594; Mines</b> et double-cliquer sur <b>Mines Substances principales - Points</b> pour l'ajouter à QGIS.</p>
			     <figure>
					<a href="illustrations/3_2_explorateur_mines.jpg" >
						<img src="illustrations/3_2_explorateur_mines.jpg" alt="Ajout de la couche WMS de mines du BRGM via l'explorateur" width="350" >
					</a>
				</figure>
				<p>La légende de la couche est lisible dans la liste des couches&nbsp;:</p>
				<figure>
					<a href="illustrations/3_2_superposition_creuse_courdo_mines.jpg" >
						<img src="illustrations/3_2_superposition_creuse_courdo_mines.jpg" alt="superposition du département de la Creuse, de la carte géol, des plans d'eaux et des mines avec la légende" width="600" >
					</a>
				</figure>
			 </div>
			 
			 <p>Attention, si la couche avait été par défaut dans un autre SCR que celui du projet et des autres couches (Lambert 93), il y aurait eu des problèmes d'affichage. Il vaut mieux dans ce cas passer par le gestionnaire de sources de données pour spécifier le SCR voulu, s'il est disponible.</p>
			
			
			<h3>Avantages et inconvénients des flux<a class="headerlink" id="III25" href="#III25"></a></h3>
				
				<p>Un inconvénient d'utiliser des flux est le temps de chargement et la nécessité d'avoir une connexion internet.</p>
				<p>Cependant, ils vous assurent de toujours visualiser la dernière mise à jour des données, vous évitent d'encombrer vos ordinateurs et vous permettent de transmettre des projets QGS à des collègues en étant sûr que ceux-ci puissent en visualiser les données (s'ils sont connectés à internet).</p>
				<p>En résumé, c'est probablement l'usage que vous ferez des données qui vous fera opter pour l'une ou l'autre solution.</p>
				
			<h3>Quelques adresses de flux WMS et WFS<a class="headerlink" id="III26" href="#III26"></a></h3>
			
			    <p>Vous pouvez trouver <a class="ext" target="_blank" href="https://github.com/igeofr/qgis2/tree/master/flux">ici</a> une liste de flux WFS et WMS, créée par l'utilisateur github <a class="ext" target="_blank" href="https://github.com/igeofr">igeofr</a>, merci à lui !</p>
			    <p>Vous pouvez soit ajouter ces flux manuellement, un par un, comme décrit plus haut, en copiant l'url, soit tous les ajouter en même temps. Pour cela, par exemple pour les flux WFS, collez le contenu entier du fichier QGIS_WFS.xml dans un fichier texte vierge, enregistrez ce fichier sous le nom QGIS_WFS.xml. Ensuite, dans QGIS : gestionnaire de sources &#8594; WFS ou WMS &#8594; Charger &#8594; sélectionnez le fichier XML, et choisissez les flux que vous souhaitez ajouter.</p>
			    
			    <p>L'<b>IGN</b> propose une grande quantité de <a class="ext" target="_blank" href="https://geoservices.ign.fr/services-web">flux WMS et WFS</a> accessibles gratuitement, n'hésitez pas à aller voir les services webs &#171;&nbsp;experts&nbsp;&#187;&nbsp;!</p>
	
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
