<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

	
		<div class="main">
		  <h1 class="hide_for_pdf">III.  Recherche et ajout de données</h1>
			<h2>III.2  Ajout de données via des flux</h2>
				<ul class="listetitres">
					<li><a href="#III21">Qu'est-ce qu'un flux WMS ou WFS ?</a></li>
					<li><a href="#III22">Ajout de données via un flux WMS ou WMTS</a>
					  <ul class= "listesoustitres">
							<li><a href="#III22a" >Flux WMS : l'exemple de la carte géologique</a></li>
							<li><a href="#III22b" >Flux WMTS : l'exemple de la base ADMIN EXPRESS</a></li>
						</ul>
					</li>
					<li><a href="#III23">Ajout de données via un flux WFS : cours d'eau</a></li>
					<li><a href="#III24">Ajout de données WMS/WMTS ou WFS via le panneau explorateur</a></li>
					<li><a href="#III25">Ajout de tuiles vectorielles : base ADMIN EXPRESS</a></li>
					<li><a href="#III26">Avantages et inconvénients des flux</a></li>
					<li><a href="#III27">Quelques adresses de flux</a></li>
				</ul>
	
			
			<h3>Qu'est-ce qu'un flux WMS ou WFS ?<a class="headerlink" id="III21" href="#III21"></a></h3>
			
				<p>Il est possible de visualiser directement dans un SIG des données accessibles sur un serveur, sans devoir préalablement les télécharger sur votre ordinateur. Ceci se fait via des flux. Les deux types de flux les plus courant permettant ceci sont les <b>flux WMS (Web Map Service)</b> et <b>WFS (Web Feature Service)</b>.</p>
				<ul>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Map_Service">flux WMS</a> vont vous permettre d'afficher des images, non modifiables.</li>
					<li>Les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Web_Feature_Service">flux WFS</a> vous permettront d'afficher des couches vecteur, non directement modifiables mais que vous pourrez ensuite télécharger au format shapefile.</li>
				</ul>			
				
			
			<h3>Ajout de données via un flux WMS ou WMTS<a class="headerlink" id="III22" href="#III22"></a></h3>
			
			  <p>Les flux de type WMS et WMTS permettent tout deux l'ajout d'images (cartes) non modifiables dans QGIS. Les données ne sont pas téléchargeables et on ne peut pas modifier leur style, sauf par exemple la transparence de la couche.</p>
			  <p>Mais à la différence du WMS, le WMTS permet d'obtenir des tuiles pré-calculées selon le niveau de zoom ; l'affichage variera donc suivant l'échelle, à la manière d'OpenStreetMap ou Google Maps. L'affichage sera donc généralement plus rapide avec le WMTS, tandis qu'avec le WMS les tuiles ne sont pas générées à l'avance et peuvent donc être générées &#171;&nbsp;à la demande&nbsp;&#187; (en choisissant par exemple le système de coordonnées).</p>
			
  			<h4>Flux WMS : l'exemple de la carte géologique<a class="headerlink" id="III22a" href="#III22a"></a></h4>
  				
  				<div class="manip">
  					<p>Lancez QGIS si ce n'est pas déjà fait, ou bien créez un nouveau projet.</p>
  					<p><img class="icone" src="illustrations/1_2_gestionnaire_donnees_icone.jpg" alt="icône gestionnaire de source de données" > Ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_03_RechercheDonnees.zip">departement_creuse.gpkg</a></em> que vous trouverez dans le dossier <b>TutoQGIS_03_RechercheDonnees/donnees</b>.</p>
  					<p>Vérifiez que votre projet soit bien dans le même SCR que la couche  <em class="data">departement_creuse.shp</em>, soit le RGF93/Lambert93 EPSG:2154.</p>
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
  						<li class="espace"><b>URL :</b> tapez l’URL suivante, qui correspond à l'adresse du serveur WMS du BRGM : <b>https://geoservices.brgm.fr/geologie</b></li>
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
  						<li class="espace">Rendez-vous dans la rubrique <b>0 GEOSERVICES_GEOLOGIE &#8594; 1 GEOLOGIE</b> et sélectionnez la couche correspondant à la <b>carte géologique image de la France au million</b>.</li>
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
  				
  			<h4>Flux WMTS : l'exemple de la base ADMIN EXPRESS<a class="headerlink" id="III22b" href="#III22b"></a></h4>
  			
  			 <p>Nous utiliserons ici un flux WMTS mis à disposition par l'IGN pour afficher la base ADMIN EXPRESS (limites administratives françaises).</p>
  			 
  			 <div class="manip">
    			 <p>Exactement de la même manière que précédemment, créez une connexion WMTS via le gestionnaire de source de données, avec les paramètres suivants :</p>
    			 <ul>
    			   <li>Nom&nbsp;: <b>IGN WMTS</b></li>
    			   <li>URL (disponible dans la <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/services/services-geoplateforme/diffusion#70062" >liste des services géoplateforme de diffusion de l'IGN</a>)&nbsp;: <b>https://data.geopf.fr/wmts?SERVICE=WMTS&VERSION=1.0.0&REQUEST=GetCapabilities</b></li>
    			 </ul>
    			 <p>Une fois connecté, chargez la couche <b>ADMINEXPRESS-COG-CARTO.LATEST</b> :</p>
    			 
    			 <figure>
  					<a href="illustrations/3_2_wmts_admin_express.jpg" >
  						<img src="illustrations/3_2_wmts_admin_express.jpg" alt="Fenêtre du gestionnaire de source de données, WMS/WMTS, Jeu de tuiles" width="620" >
  					</a>
    			 </figure>
    			 
    			 <p>Vous pouvez ensuite zoomer/dézoomer et voir l'affichage changer en fonction de l'échelle.</p>
    			 
    			 <figure>
  					<a href="illustrations/3_2_adminexpress_wmts_500000.jpg" >
  						<img src="illustrations/3_2_adminexpress_wmts_500000.jpg" alt="Base ADMIN EXPRESS WMTS affichée au 1/500 000 : EPCI" width="280" >
  					</a>
  					<a href="illustrations/3_2_adminexpress_wmts_8000000.jpg" >
  						<img src="illustrations/3_2_adminexpress_wmts_8000000.jpg" alt="Base ADMIN EXPRESS WMTS affichée au 1/8 000 000 : régions" width="280" >
  					</a>
  					<figcaption>À gauche, affichage au 1/500&nbsp;000 : EPCI, et à droite, affiche au 1/8&nbsp;000&nbsp;000 : régions.</figcaption>
    			 </figure>
    			 
    			 <p>Pour comparer les temps d'affichage entre WMTS et WMS, vous pouvez charger la même couche avec un flux WMS, en créant une connexion WMS avec l'URL suivante : <b>https://data.geopf.fr/wms-r?VERSION=1.3.0</b>.</p>
  			 </div>
							
			
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
						<li class="espace">En vous aidant éventuellement d'un filtre (<b>plans</b>), sélectionnez la couche correspondant aux <b>Plans d'eau - BD Topage - Métropole - 2025 (ou bien une autre année)</b></li>
						<li class="espace">Vérifiez que le SCR soit bien le Lambert 93 RGF93 (code EPSG 2154) afin que toutes nos couches aient le même SCR, en cliquant éventuellement sur le bouton <b>Changer...</b></li>
						<li class="espace">Cliquez sur <b>Ajouter</b></li>
						<li class="espace">Une fenêtre supplémentaire peut éventuellement s'ouvrir ; dans ce cas, cliquez sur <b>Ajouter une couche</b></li>
					</ul>
					<p>Vous devriez obtenir quelque chose de similaire à ceci :</p>
					<figure>
						<a href="illustrations/3_2_superposition_creuse_courdo.jpg" >
							<img src="illustrations/3_2_superposition_creuse_courdo.jpg" alt="superposition du département de la Creuse, de la carte géol et des plans d'eau" width="350" >
						</a>
					</figure>
					<p>Il peut être nécessaire de changer l'ordre des couches en les faisant glisser dans la table des matières, et de <a href="01_02_info_geo.php#I23a">modifier le style</a> de la couche du département de la Creuse. Vu qu'il s'agit ici d'un flux WFS et non WMS, il est également possible de modifier le style des cours d'eau. La carte géologique étant une couche WMS, on ne peut pas modifier son style mais il est possible de lui donner une <b>transparence</b> afin de l'atténuer.</p>
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
			
			
			<h3>Ajout de tuiles vectorielles : base ADMIN EXPRESS<a class="headerlink" id="III25" href="#III25"></a></h3>
			
			 <p>Les tuiles vectorielles fonctionnent selon le même principe que le WMTS, c'est-à-dire que des tuiles sont prédéfinies à différents niveaux de zoom, mais il s'agit cette fois de données vecteur. Il sera donc possible de modifier leur style, mais pas de les télécharger.</p>
			 
			 <p>Une fois de plus, nous utiliserons la base ADMIN EXPRESS de l'IGN, ce qui vous permettra de comparer avec les autres types de flux utilisés précedemment : WMS et WMTS.</p>
			 
			 <div class="manip">
			   <p>Dans le panneau explorateur, faites un clic <b>droit sur Tuiles vectorielles &#8594; Créer une connexion générique</b> :</p>
			   <figure>
					<a href="illustrations/2_3_tuiles_vect_nouvelle_connexion.jpg" >
						<img src="illustrations/2_3_tuiles_vect_nouvelle_connexion.jpg" alt="Fenêtre de création/modification d'une connection tuile vectorielle" width="600" >
					</a>
				</figure>
				<ul>
				  <li>Nom : par exemple IGN Admin Express</li>
				  <li>URL du style : <b>https://data.geopf.fr/annexes/ressources/vectorTiles/styles/ADMIN_EXPRESS/adminexpress.json</b></li>
				  <li>Source URL : <b>https://data.geopf.fr/tms/1.0.0/ADMIN_EXPRESS/{z}/{x}/{y}.pbf</b></li>
				</ul>
			 </div>
			 
			 <p class="note">Les URL de connexion et de style sont disponibles ici : <a class="ext" target="_blank" href="https://geoservices.ign.fr/documentation/services/services-geoplateforme/diffusion#70064" >https://geoservices.ign.fr/documentation/services/services-geoplateforme/diffusion#70064</a>.</p>
			 
			 <div class="manip">
			   <p>Validez ; la nouvelle connexion est maintenant disponible (ici une connexion = une couche).</p>
			   <figure>
					<a href="illustrations/2_3_explorateur_TMS.jpg" >
						<img src="illustrations/2_3_explorateur_TMS.jpg" alt="Panneau explorateur avec la connexion créée dans les tuiles vectorielles" width="200" >
					</a>
				</figure>
			   <p>Double-cliquez pour ajouter la couche à QGIS. Comme pour les couches équivalentes WMS/WMTS, le contenu varie suivant l'échelle, mais cette fois il est possible de modifier le style, ce que vous pouvez vérifier en allant dans les propriétés de la couche, rubrique symbologie. Notez également que l'affichage n'est pas pixellisé puisqu'il s'agit de données vectorielles.</p>
			 </div>
			 
			 <p>Un peu de documentation sur les tuiles vectorielles :</p>
			 <ul>
			   <li>Wikipedia : <a class="ext" target="_blank" href="https://en.wikipedia.org/wiki/Vector_tiles" >https://en.wikipedia.org/wiki/Vector_tiles</a></li>
			   <li>Doc QGIS : <a class="ext" target="_blank" href="https://docs.qgis.org/3.40/fr/docs/user_manual/working_with_vector_tiles/vector_tiles.html" >https://docs.qgis.org/3.40/fr/docs/user_manual/working_with_vector_tiles/vector_tiles.html</a></li>
			   <li>Everything You Wanted to Know About Vector Tiles (But Were Afraid to Ask) par daniel-j-h : <a class="ext" target="_blank" href="https://www.openstreetmap.org/user/daniel-j-h/diary/404061" >https://www.openstreetmap.org/user/daniel-j-h/diary/404061</a></li>
			 </ul>
			
			<h3>Avantages et inconvénients des flux<a class="headerlink" id="III26" href="#III26"></a></h3>
				
				<p>Un inconvénient d'utiliser des flux est le temps de chargement et la nécessité d'avoir une connexion internet.</p>
				<p>Cependant, ils vous assurent de toujours visualiser la dernière mise à jour des données, vous évitent d'encombrer vos ordinateurs et vous permettent de transmettre des projets QGS à des collègues en étant sûr que ceux-ci puissent en visualiser les données (s'ils sont connectés à internet).</p>
				<p>En résumé, c'est probablement l'usage que vous ferez des données qui vous fera opter pour l'une ou l'autre solution.</p>
				
			<h3>Quelques adresses de flux WMS et WFS<a class="headerlink" id="III27" href="#III27"></a></h3>
			
			    <p>Vous pouvez trouver <a class="ext" target="_blank" href="https://github.com/igeofr/qgis2/tree/master/flux">ici</a> une liste de flux WFS et WMS, créée par l'utilisateur github <a class="ext" target="_blank" href="https://github.com/igeofr">igeofr</a>, merci à lui !</p>
			    <p>Vous pouvez soit ajouter ces flux manuellement, un par un, comme décrit plus haut, en copiant l'url, soit tous les ajouter en même temps. Pour cela, par exemple pour les flux WFS, collez le contenu entier du fichier QGIS_WFS.xml dans un fichier texte vierge, enregistrez ce fichier sous le nom QGIS_WFS.xml. Ensuite, dans QGIS : gestionnaire de sources &#8594; WFS ou WMS &#8594; Charger &#8594; sélectionnez le fichier XML, et choisissez les flux que vous souhaitez ajouter.</p>
			    
			    <p>L'<b>IGN</b> propose <a class="ext" target="_blank" href="https://geoservices.ign.fr/services-web">une grande quantité de flux</a> accessibles gratuitement, n'hésitez pas à aller voir les services webs &#171;&nbsp;experts&nbsp;&#187;&nbsp;!</p>
	
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
