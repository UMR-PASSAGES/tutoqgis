<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">
	
	
		<div class="main">
		  <h1 class="hide_for_pdf">VI.  Sélectionner des données : les requêtes</h1>
			<h2>VI.2  Sélectionner des éléments en fonction de leur position par rapport à d'autres : requêtes spatiales</h2>
				<ul class="listetitres">
					<li><a href="#VI21">Faire une requête spatiale simple</a></li>
					<li><a href="#VI22">Les opérateurs</a></li>
					<li><a href="#VI23">Quelques exemples</a></li>
				</ul>
				<br>
				
			<p>Nous venons de voir comment sélectionner des éléments en fonction des données de la table attributaire&nbsp;; nous allons voir ici comment sélectionner des éléments en fonction de leur position par rapport aux éléments d'une autre couche.</p>
			<p>Contrairement aux requêtes attributaires, les requêtes spatiales mettent donc le plus souvent deux couches en jeu&nbsp;: une couche dans laquelle sera faite la sélection, et une couche de référence.</p>
			<p>On peut par exemple, à l'aide d'une couche de points et d'une couche de polygones, sélectionner tous les points situés dans les polygones.</p>
			
			<h3>Faire une requête spatiale simple<a class="headerlink" id="VI21" href="#VI21"></a></h3>
			
				<div class="manip">
					<p>Ouvrez un nouveau projet QGIS et ajoutez-y la couche <em class="data"><a href="donnees/TutoQGIS_06_Requetes.zip">communes_bretagne</a></em>.</p>
					<p>En vous connectant au <a href="03_02_donnees_flux.php#III23">flux WFS</a> <b>https://geobretagne.fr/geoserver/eolien_bretagne/wfs</b>, ajoutez également au projet la couche <em class="data">Eoliennes publiées par Géorisques</em>.</p>
					<p class="note">Au cas où la connexion au flux échouerait, cette couche est également disponible dans le dossier <a href="donnees/TutoQGIS_06_Requetes.zip">TutoQGIS_06_Requetes</a> sous le nom <em class="data">aerogenerateurs_georisques_vgs.shp</em>.</p>
					<figure>
                    	<a href="illustrations/6_2_eoliennes_bretagne.jpg" >
                    		<img src="illustrations/6_2_eoliennes_bretagne.jpg" alt="Eoliennes en Bretagne" width="500">
                    	</a>
                    </figure>
				</div>
				<p>Le but va être ici de <b>sélectionner toutes les communes de Bretagne sur lesquelles sont implantées une ou plusieurs éoliennes</b>.</p>
				<p class="note">Les données provenant d'un flux, il est possible que vos requêtes donnent des résultats légèrement différents de ceux présentés ici, si le flux a été mis à jour&nbsp;!</p>
				
			    <div class="manip">
    				<p>Si la boîte à outils de traitements n'est pas visible, activez-la en vous rendant dans le <b>menu Traitement &#8594; Boîte à outils</b>.</p>
    				
					<figure>
                    	<a href="illustrations/6_2_select_localisation_emplacement.jpg" >
                    		<img src="illustrations/6_2_select_localisation_emplacement.jpg" alt="Emplacement de l'outil de sélection par localisation dans la boîte à outils" width="400">
                    	</a>
                    </figure>
                    <p>Dans la rubrique <b>Sélection dans un vecteur</b>, double-cliquez sur l'outil <b>Sélection par localisation</b> :</p>
                    <figure>
                    	<a href="illustrations/6_2_select_localisation_fenetre.jpg" >
                    		<img src="illustrations/6_2_select_localisation_fenetre.jpg" alt="Fenêtre de l'outil de sélection par localisation" width="620">
                    	</a>
                    </figure>
                    <ul>
                        <li class="espace"><b>Sélectionnez les entités depuis :</b> il s'agit de la couche dans laquelle sera faite la sélection, sélectionnez la couche de communes</li>
                        <li class="espace"><b>Où les entités :</b> différents opérateurs sont disponibles. Vous pouvez choisir <b>intersecte</b>, ou bien <b>contient</b>, pour le même résultat dans ce cas</li>
                        <li class="espace"><b>En comparant les entités de :</b> cette formulation obscure vous invite à choisir la couche par rapport à laquelle vous souhaitez sélectionner des entités, ici la <b>couche d'éoliennes</b> puisque nous voulons sélectionner les communes contenant des éoliennes</li>
                        <li class="espace">Vérifiez que <b>Créer une nouvelle sélection</b> soit bien l'option choisie, afin de ne pas partir d'une sélection existante</li>
                        <li class="espace">Cliquez sur <b>Exécuter</b>, vous pouvez ensuite fermer la fenêtre.</li>
                    </ul>
					<p>Vous devriez obtenir 182 communes sélectionnées (mais ce nombre peut varier légèrement si vous chargez les données via le flux WFS et qu'elles ont été mises à jour depuis la rédaction de ce tutoriel) :</p>
					<figure>
                    	<a href="illustrations/6_2_select_localisation_res.jpg" >
                    		<img src="illustrations/6_2_select_localisation_res.jpg" alt="Communes sélectionnées" width="450">
                    	</a>
                    </figure>
                    <p>Vous pouvez voir le nombre d'entités sélectionnées dans la barre tout en bas de la fenêtre de QGIS :</p>
                    <figure>
                    	<a href="illustrations/6_2_barre_nb_entites_select.jpg" >
                    		<img src="illustrations/6_2_barre_nb_entites_select.jpg" alt="barre du bas avec le nombre d'entités sélectionnées" width="600">
                    	</a>
                    </figure>
                    <p>ou bien en haut de la table attributaire des communes :</p>
                    <figure>
                    	<a href="illustrations/6_2_table_nb_entites_select.jpg" >
                    		<img src="illustrations/6_2_table_nb_entites_select.jpg" alt="haut de la table attributaire avec le nombre d'entités sélectionnées" width="550">
                    	</a>
                    </figure>
                </div>
			
			<h3>Les opérateurs<a class="headerlink" id="VI22" href="#VI22"></a></h3>
			
				<p>Dans l'exemple ci-dessus, nous avons utilisé l'opérateur <b>Intersecte</b> ou <b>Contient</b>. Il en existe d'autres&nbsp;; les opérateurs possibles varient en fonction de la nature des couches source et de référence (point, ligne, polygone).</p>
			
				<table>
						<caption>Opérateurs de requête spatiale disponibles en fonction des types des couches de de départ et de référence.</caption>
						 <tr>
					       <th>Couche de départ :</th>
					       <th class="clair" colspan="2"><img class="noshadow" src="illustrations/6_2_point.png" alt="icône de point" ></th>
					       <th class="centre" colspan="3"><img class="noshadow" src="illustrations/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="clair" colspan="2"><img class="noshadow" src="illustrations/6_2_polygone.png" alt="icône de polygone" ></th>
					   </tr>
					   <tr>
					       <th>Couche de référence :</th>
					       <th class="clair"><img class="noshadow" src="illustrations/6_2_point.png" alt="icône de point" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/6_2_ligne.png" alt="icône de ligne" ><img class="noshadow" src="illustrations/6_2_polygone.png" alt="icône de polygone" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/6_2_point.png" alt="icône de point" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="centre"><img class="noshadow" src="illustrations/6_2_polygone.png" alt="icône de polygone" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/6_2_point.png" alt="icône de point" ><img class="noshadow" src="illustrations/6_2_ligne.png" alt="icône de ligne" ></th>
					       <th class="clair"><img class="noshadow" src="illustrations/6_2_polygone.png" alt="icône de polygone" ></th>
					   </tr>
					   <tr>
					       <td>A l'intérieur</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Chevauche</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Croise</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Contient</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Est disjoint</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Est égal</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr>
					       <td>Intersecte</td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclair"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					   <tr class="alt">
					       <td>Touche</td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centre"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_faux.svg" alt="icône faux" height="12" ></td>
					       <td class="centreclairalt"><img class="noshadow" src="illustrations/6_2_correct.svg" alt="icône correct" height="12" ></td>
					   </tr>
					</table>
					
					<p>Par exemple, un point peut se trouver à l'intérieur d'un polygone mais une ligne ne peut se trouver à l'intérieur d'un point.</p>
					
					<p>Pour en savoir plus sur les différents opérateurs, rendez-vous <a class="ext" target="_blank" href="https://gis.stackexchange.com/questions/217444/understanding-join-attributes-by-location-in-qgis/305193#305193" >ici</a> ou <a class="ext" target="_blank" href="https://github.com/boundlessgeo/workshops/blob/master/workshops/postgis/source/en/spatial_relationships.rst#spatial-relationships" >là</a> (en anglais, mais les dessins sont parlants !).</p>
					
				<h3>Quelques exemples<a class="headerlink" id="VI23" href="#VI23"></a></h3>
					
					<div class="manip">
    					<p><a href="03_02_donnees_flux.php#III23">Toujours en utilisant le flux WFS</a> <b>https://geobretagne.fr/geoserver/eolien_bretagne/wfs</b>, ajoutez la couche <em class="data ">Parcs éoliens publiés par Géorisques</em>.</p>
							<p class="note">Au cas où la connexion au flux échouerait, cette couche est également disponible dans le dossier <a href="donnees/TutoQGIS_06_Requetes.zip">TutoQGIS_06_Requetes</a> sous le nom <em class="data">parcs_eoliens_georisques_vgs.shp</em>.</p>
    					<p>Ajoutez également si ça n'est pas déjà fait la couche <em class="data"><a href="donnees/TutoQGIS_06_Requetes.zip">departement</a></em>.</p>
    					<p>Votre projet doit donc contenir les 4 couche suivantes :</p>
    					<figure>
                        	<a href="illustrations/6_2_projet.jpg" >
                        		<img src="illustrations/6_2_projet.jpg" alt="CProjet avec les 4 couches chargées" width="600">
                        	</a>
                        </figure>   
    					<p>En utilisant différents opérateurs, pouvez-vous dire ?...</p>
    					<p class="note">Entre deux requêtes, n'oubliez pas de tout désélectionner :<img class="iconemid" src="illustrations/6_3_deselection_icone.jpg" alt="icône de désélection"  height="30"></p>
    					<p class="note">Attention, le nombre d'entités sélectionnées peut varier légèrement si vous chargez des données via des flux WFS et que ces données ont été mises à jour depuis la rédaction de ce tutoriel.</p>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">Combien de communes bretonnes ont des parcs éoliens sur leur territoire&nbsp;?</label></p>
							<p class="reponse">Sélection des communes qui intersectent les parcs éoliens : <b>250 communes sélectionnées</b>.</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-3">
							<p><label for="faq-3">Combien d'éoliennes se trouvent hors de Bretagne ?</label></p>
							<p class="reponse">Sélection des éoliennes disjointes des communes : <b>29 éoliennes sélectionnés</b>.</p>
							<p class="reponse"><img class="icone" src="illustrations/6_2_inverser_selection_icone.jpg" alt="icône inverser la sélection" >Vous pouvez aussi partir des éoliennes intersectant les communes, et <b>inverser la sélection</b> avec le bouton correspondant en haut de la table attributaire des communes.</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-4">
							<p><label for="faq-4">Combien de communes ne contiennent pas d'éoliennes ?</label></p>
							<p class="reponse">Sélection des communes disjointes des éoliennes : <b>1020 communes sélectionnées</b></p>
							<p class="reponse"><img class="icone" src="illustrations/6_2_inverser_selection_icone.jpg" alt="icône inverser la sélection" >Vous pouvez aussi partir des communes contenant des éoliennes, et <b>inverser la sélection</b> avec le bouton correspondant en haut de la table attributaire des communes.</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-5">
							<p><label for="faq-5">Combien le département du Finistère contient-il d'éoliennes ?</label></p>
							<p class="reponse">Il faut procéder en 2 étapes : 1/ sélectionner &#171; à la main &#187; le département du Finistère en cliquant dessus à partir de la couche <b>departement</b> 2/ utiliser l'outil de sélection par localisation pour sélectionner les éoliennes à l'intérieur des départements, en cochant la case <b>Entités sélectionnées uniquement</b>.</p>
							<p class="reponse">Au final, on trouve <b>155 éoliennes sélectionnées</b>.</p>
						</div>
					</div>
						
					<p>Dans le chapitre suivant, nous verrons comment combiner une ou plusieurs requêtes, spatiales ou attributaires&nbsp;!</p>
				
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
