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
			<h2>VI.2  Sélectionner des éléments en fonction de leur position par rapport à d'autres : requêtes spatiales</h2>
				<ul class="listetitres">
					<li><a href="#VI21">Faire une requête spatiale simple</a>
					   <ul class="listesoustitres">
							<li><a href="#VI21a">Avec l'outil de sélection par localisation</a></li>
							<li><a href="#VI21b">Avec l'extension de requête spatiale</a></li>
						</ul>
					</li>
					<li><a href="#VI22">Quelques opérateurs</a></li>
				</ul>
				<br>
				
			<p>Nous venons de voir comment sélectionner des éléments en fonction des données de la table attributaire ; nous allons voir ici comment sélectionner des éléments en fonction de leur position par rapport aux éléments d'une autre couche.</p>
			<p>Contrairement aux requêtes attributaires, les requêtes spatiales mettent donc le plus souvent deux couches en jeu : une couche dans laquelle sera faite la sélection, et une couche de référence.</p>
			<p>On peut par exemple, à l'aide d'une couche de points et d'une couche de polygones, sélectionner tous les points situés dans les polygones.</p>
			
			<h3><a class="titre" id="VI21">Faire une requête spatiale simple</a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS et ajoutez-y la couche <em class="data">communes_NordPasDeCalais</em>.</p>
					<p>En vous connectant au flux WFS <b>http://ws.carmen.developpement-durable.gouv.fr/WFS/24/profil_env?</b> (cf. <a href="03_02_donnees_flux.php#III23">partie III.2.3</a>), ajoutez également au projet la couche <em class="data">Installations de traitement de déchets</em>.</p>
					<p class="note">Au cas où la connexion au flux échouerait, cette couche est également disponible dans le dossier TutoQGIS_06_Requetes/donnees.</p>
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Dans quel SCR sont ces deux couches ?</label></p>
						<p class="reponse">La couche de communes est en RGF93 Lambert 93 EPSG:2154. La couche d'installations de traitement de déchets est en ETRS89 EPSG:4258, système européen de référence non projeté et seul SCR disponible via ce flux.</p>
					</div>
				</div>
				<p>Le but va être ici de sélectionner toutes les communes du Nord-Pas-de-Calais sur lesquelles sont implantées une ou plusieurs installations de traitement de déchets.</p>
				
				<h4><a class="titre" id="VI21a">Avec l'outil de sélection par localisation</a></h4>
				    <div class="manip">
        				<p>Rendez-vous dans le
    						<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Outils de recherche &#8594; Sélection par localisation
    							<span>
    								<img src="illustrations/tous/6_2_select_localisation_menu.png" alt="Menu Vecteur, requête spatiale, requête spatiale" height="300" >
    							</span>
    						</a>	
    					.</p>
    					<figure>
                        	<a href="illustrations/tous/6_2_select_localisation.png" >
                        		<img src="illustrations/tous/6_2_select_localisation.png" alt="Outil de sélection par localisation" height="340">
                        	</a>
                        </figure>
                        <ul>
                            <li><b>Sélection d'entités dans :</b> il s'agit de la couche dans laquelle sera faite la sélection, sélectionnez la couche de communes</li>
                            <li><b>qui intersecte les entités dans :</b> il s'agit de la couche par rapport à laquelle seront sélectionnés les éléments, sélectionnez la couche d'éoliennes</li>
                            <li>Vérifiez que la case <b>Inclure les entités en entrée qui intersectent les entités sélectionnées</b> soit cochée</li>
                            <li>Cliquez sur <b>OK</b>, vous pouvez ensuite fermer la fenêtre.</ul>
                        </ul>
                    </div>
                    <p>Aucune commune n'est sélectionnée... Que s'est-il passé ?</p>
                    <p>Nos deux couches étant dans deux SCR différents, elles n'ont pu être croisées. <b>Beaucoup d'outils impliquant plusieurs couches de données ne fonctionneront que si elles sont toutes dans le même SCR.</b></p>
                    
                    <div class="manip">
    					<p>Réessayez en sauvegardant au préalable la couche d'installations de traitement de déchets en RGF93 Lambert 93 (cf. <a href="02_04_changer_systeme.php#II42" >partie II.4.2</a>).</p>
    					<p>Vous devriez obtenir 74 communes sélectionnées :</p>
    					<figure>
                        	<a href="illustrations/tous/6_2_select_localisation_res.png" >
                        		<img src="illustrations/tous/6_2_select_localisation_res.png" alt="Communes sélectionnées" height="300">
                        	</a>
                        </figure>
                    </div>
					
				<h4><a class="titre" id="VI21b">Avec l'extension de requête spatiale </a></h4>
                    <p>Il existe (au moins) une autre méthode pour effectuer des requêtes spatiales dans QGIS.</p>
                    <div class="manip">
                        <p>Rendez-vous dans le <b>menu Extensions &#8594; Installer/Gérer les extensions</b>. Dans la rubrique Toutes, cochez la case <b>Extension de requête spatiale</b>.</p>
                        <figure>
                        	<a href="illustrations/tous/6_2_requete_spatiale_activation.png" >
                        		<img src="illustrations/tous/6_2_requete_spatiale_activation.png" alt="Activation de l'extension de requête spatiale" width="620">
                        	</a>
                        </figure>
                        <p>(Cette extension est installée par défaut, mais non activée).</p>
    					<p>Rendez-vous dans le
    						<a class="thumbnail_bottom" href="#thumb">menu Vecteur &#8594; Requête spatiale &#8594; Requête spatiale
    							<span>
    								<img src="illustrations/tous/6_2_req_spatial_menu.png" alt="Menu Vecteur, requête spatiale, requête spatiale" height="225" >
    							</span>
    						</a>	
    					.</p>
    					<figure>
    						<a href="illustrations/tous/6_2_req_spatial_fenetre.png" >
    							<img src="illustrations/tous/6_2_req_spatial_fenetre.png" alt="Fenêtre de requête spatiale : sélection des communes contenant les installations" height="400" >
    						</a>
    					</figure>
    					<ul>
    						<li class="espace"><b>Sélection des entités sources depuis :</b> il s'agit de la couche dans laquelle sera faite la sélection, sélectionnez la couche de communes</li>
    						<li class="espace"><b>Où l'entité :</b> sélectionnez l'opérateur <b>Contient</b></li>
    						<li class="espace"><b>Entités références de :</b> il s'agit de la couche par rapport à laquelle seront sélectionnés les éléments, sélectionnez la couche d'installations issue du flux, en ETRS89</li>
    						<li class="espace">Cliquez sur <b>Appliquer</b> et patientez un peu...</li>
    					</ul>
    					<figure>
    						<a href="illustrations/tous/6_2_req_spatial_fenetre_2.png" >
    							<img src="illustrations/tous/6_2_req_spatial_fenetre_2.png" alt="Fenêtre de requête spatiale : sélection des communes contenant les installations, résultat" height="370" >
    						</a>
    					</figure>
    					<p>Comme précédemment, 74 communes sont sélectionnées. Notez que cet outil, contrairement au précédent, <b>fonctionne pour deux couches ayant des SCR différents !</b></p>
    					<p>Dans la partie droite de la fenêtre de requête spatiale sont listées les objets répondant à la requête; il est possible de zoomer sur chacun de ces objets en cochant la case <b>Zoom sur l'objet</b> puis en cliquant sur une ligne.</p>
    					<p><img class="icone" src="illustrations/tous/6_2_sauv_selection_icone.png" alt="icône pour créer une couche à partir de la sélection dans la fenêtre de requête spatiale" >Il est également possible dans cette fenêtre de créer une couche temporaire à partir de la sélection, en cliquant sur l'icône <b>Créer une couche depuis la sélection</b>.</p>
    					<p>Cette couche sera uniquement sauvegardée dans le projet ; pour la sauvegarder définitivement, clic droit sur son nom, enregistrer sous...</p>
				    </div>
				    <p>Les deux outils que nous venons de voir sont à peu près équivalents mais présentent des différence au niveau des opérateurs notamment, du temps de traitement et de la gestion des SCR. A vous de choisir lequel est le plus adapté en fonction de ce que vous souhaitez faire !</p>
			
			
			<h3><a class="titre" id="VI22">Quelques opérateurs</a></h3>
			
				<p>Dans l'exemple ci-dessus, nous avons utilisé l'opérateur <b>Contient</b>. Il en existe d'autres ; ils varient en fonction de la nature des couches source et de référence (point, ligne, polygone).</p>
			
				<table>
						<caption>Opérateurs de requête spatiale disponibles en fonction des types des couches de de départ et de référence.</caption>
						 <tr>
					       <th>Couche de départ :</th>
					       <th class="clair" colspan="2"><img class="noshadow" src="illustrations/tous/6_2_point.png" alt="icône de point" ></th>
					       <th class="centre" colspan="3"><img class="noshadow" src="illustrations/tous/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="clair" colspan="2"><img class="noshadow" src="illustrations/tous/6_2_polygone.png" alt="icône de polygone" ></th>
					   </tr>
					   <tr>
					       <th>Couche de référence :</th>
					       <th class="clair"><img class="noshadow" src="illustrations/tous/6_2_point.png" alt="icône de point" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/tous/6_2_ligne.png" alt="icône de ligne" ><img class="noshadow" src="illustrations/tous/6_2_polygone.png" alt="icône de polygone" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/tous/6_2_point.png" alt="icône de point" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/tous/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/tous/6_2_polygone.png" alt="icône de polygone" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/tous/6_2_point.png" alt="icône de point" ><img class="noshadow" src="illustrations/tous/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/tous/6_2_polygone.png" alt="icône de polygone" ></th>
					   </tr>
					   <tr>
					       <td>A l'intérieur</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Chevauche</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Croise</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Contient</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Est disjoint</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Est égal</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Intersecte</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Touche</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/tous/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					</table>
					
					<p>Par exemple, un point peut se trouver à l'intérieur d'un polygone mais une ligne ne peut se trouver à l'intérieur d'un point.</p>
					
					<div class="manip">
					<p>Ajoutez la couche <em class="data">dept59</em> créée dans la <a href="06_01_req_attrib.php#VI12">partie VI.1.2</a>.</p>
					<p>Connectez-vous au flux WFS <b>http://services.sandre.eaufrance.fr/geo/zonage</b> (cf. <a href="03_02_donnees_flux.php#III23">partie III.2.3</a>) et ajoutez la couche <em class="data ">CoursEau1</em> correspondant aux cours d'eau de + de 100 km.</p>
					<p>En utilisant différents opérateurs, pouvez-vous dire ?...</p>
					<p class="note">Entre deux requêtes, n'oubliez pas de tout désélectionner :<img class="iconemid" src="illustrations/tous/6_3_deselection_icone.png" alt="icône de désélection"  height="30"></p>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">S'il y a des installations de traitements de déchets qui ne sont pas dans une commune du Nord-Pas-de-Calais ?</label></p>
							<p class="reponse">En sélectionnant les installations disjointes des communes (0/96), ou bien les installations à l'intérieur des communes (96/96), on peut en déduire que toutes les installations sont bien dans le Nord-Pas-de-Calais.</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-3">
							<p><label for="faq-3">Combien de communes sont traversées par un cours d'eau ?</label></p>
							<p class="reponse">En sélectionnant les communes intersectant les cours d'eau (483/1545), ou bien les communes disjointes des cours d'eau (1062/1545), on peut en déduire que 483 communes sont traversées par un cours d'eau.</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-4">
							<p><label for="faq-4">Combien le département du Nord comporte-t-il de communes ?</label></p>
							<p class="reponse">En sélectionnant les communes à l'intérieur du département du Nord, 650/1545 communes sont sélectionnées.</p>
						</div>
					</div>
					
				
				<br>
				<a class="prec" href="06_01_req_attrib.php">chapitre précédent</a>
				<a class="suiv" href="06_03_req_combinees.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>					
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_6.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
