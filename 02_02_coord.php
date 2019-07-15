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
			<h2>II.2  Des coordonnées, oui mais dans quel système ?</h2>
				<ul class="listetitres">
					<li><a href="#II21">Systèmes de coordonnées</a>
						<ul class= "listesoustitres">
							<li><a href="#II21a">Qu'est-ce qu'un système de coordonnées ?</a></li>
							<li><a href="#II21b">Quelques exemples de systèmes de coordonnées</a></li>
						</ul>
					</li>
					<li><a href="#II22">Coordonnées en deux dimensions : les projections</a>
						<ul class= "listesoustitres">
							<li><a href="#II22a">Qu'est-ce qu'une projection ?</a></li>
							<li><a href="#II22b">Trois grands types de projections : cylindriques, coniques et azimutales</a></li>
							<li><a href="#II22c">A chaque projection ses déformations</a></li>
							<li><a href="#II22d">Quelques exemples de projections</a></li>
						</ul>
					</li>
					<li><a href="#II23">A retenir</a></li>
					<li><a href="#II24">Quelques ressources internet</a></li>
				</ul>
				<br>
	
			<p>Les coordonnées peuvent être exprimées en degrés, en mètres... et dans des référentiels différents. Un même point aura des coordonnées différentes selon le système de coordonnées utilisé.</p>
	
	
			<h3><a class="titre" id="II21">Systèmes de coordonnées</a></h3>
			
			
				<h4><a class="titre" id="II21a">Qu'est-ce qu'un système de coordonnées ?</a></h4>
			
					<p>Un système de coordonnées est un système utilisé pour mesurer des coordonnées. Il peut être défini par un ellipsoïde. Un point sera alors localisé par ses coordonnées géographiques, exprimées par la latitude <b>Ф</b>, la longitude <b>λ</b>, et la hauteur ellipsoïdale <b>h</b> mesurée suivant la normale à l'ellipsoïde.</p>
					<figure>
						<a href="illustrations/tous/2_2_coord_geographiques.svg" >
							<img src="illustrations/tous/2_2_coord_geographiques.png" alt="coordonnées géographiques" width="300">
						</a>
					</figure>
					<p>Longitude et latitude sont des mesures d'angles et peuvent être exprimées en degrés, en grades ou en radians.</p>
					<p class="note">Attention à ne pas confondre la hauteur ellipsoïdale, mesurée par rapport à l'ellipsoïde, et l'altitude normale mesurée par rapport au géoïde. Avant les années 1960, les altitudes étaient mesurées par rapport au niveau de la mer (altitude orthométrique).</p>
	
				<h4><a class="titre" id="II21b">Quelques exemples de systèmes de coordonnées</a></h4>
				
					<p>Il existe de nombreux systèmes de coordonnées. Ils sont recensés par l'<b>EPSG</b> (European Petroleum Survey Group) qui a attribué un code à chacun. Quelques exemples :</p>
				
					<p><b>WGS84 (World Geodetic System 1984) :</b>
					<br>
					Système global initialement mis au point par le département de la défense des États Unis en 1984, mis à jour en 2004. Son exactitude est métrique, et son ellipsoïde se nomme IAG-GRS80.</p>
					<p><b>RGF93 (Réseau Géodésique Français 1993) :</b>
					<br>
					Système global obtenu par densification des points du réseau mondial associé ETRS89. Il s'agit du système officiel français. Ce système est facilement compatible avec le WGS84 par exemple.</p>
					<p><b>ED50 (European Datum 1950) :</b>
					<br>
					Système européen mis en place à la suite de la seconde guerre mondiale. Son ellipsoïde associé se nomme Hayford 1909.</p>			
					<p><b>NTF (Nouvelle Triangulation de la France) :</b>
					<br>
					Système local issu de mesures réalisées depuis la fin du XIXème jusqu'en 1991. Son ellipsoïde associé est Clarke 1880 et son méridien d'origine Paris.</p>
					<p class="note">En France, le système NTF a été abandonné au profit du système RGF93 qui présente une meilleure compatibilité avec les autres systèmes mondiaux. Il existe toutefois encore aujourd'hui de nombreuses données utilisant le système NTF.</p>
	
					<p>Certains systèmes seront adaptés à une zone précise, d'autre à la Terre entière. Plusieurs systèmes coexistent souvent pour une même zone, en raison par exemple de l'avancée des techniques ou de règlements.</p>	
					<p><b>Un même point aura des coordonnées différentes selon le système utilisé pour les mesurer</b>. Le tableau ci-dessous montre les coordonnées de Paris dans différents systèmes.</p>				
					
					<table>
						<caption>Coordonnées de Paris mesurées dans différents systèmes.</caption>
					   <tr>
					       <th>Système de coordonnées</th>
					       <th>Code</th>
					       <th>Latitude (en degrés)</th>
					       <th>Longitude (en degrés)</th>
					   </tr>
					   <tr>
					       <td>WGS84</td>
					       <td>EPSG:4326</td>
					       <td>48,856700</td>
					       <td>2,351000</td>
					   </tr>
					   <tr class="alt">
					       <td>ED50</td>
					       <td>EPSG:4230</td>
					       <td>48,857615</td>
					       <td>2,352286</td>
					   </tr>
					   <tr>
					       <td>RGF93</td>
					       <td>EPSG:4171</td>
					       <td>48,856700</td>
					       <td>2,351000</td>
					   </tr>
					   <tr class="alt">
					       <td>NTF</td>
					       <td>EPSG:4807</td>
					       <td>48,856769</td>
					       <td>0,014494</td>
					   </tr>
					</table>
					
				<p class="attention">On sait maintenant comment un point peut être défini par 3 coordonnées X, Y et Z. Comment représenter maintenant la Terre en 2 dimensions, pour en faire une carte par exemple ?</p>		
					
					
			<h3><a class="titre" id="II22">Coordonnées en deux dimensions : les projections</a></h3>
				
				<h4><a class="titre" id="II22a">Qu'est-ce qu'une projection ?</a></h4>		
				
					<p><b>Le principe est de projeter des données 3D sur une surface plane</b>. Il y aura donc forcément des déformations : pensez à une peau d'orange qu'on écrase, et qui va se déchirer.</p>
					<p>On appelle projection cartographique le système de correspondance entre les coordonnées géographiques (donc mesurées avec un système de référence) et les points du plan de projection.</p>
					<p>De nombreuses méthodes de projections existent, chacune adaptée à un usage différent.</p>
					<p>Lorsqu'on utilise une projection, on parle de <b>coordonnées projetées</b>. Ces coordonnées sont par définition bidimensionnelles, et seront exprimées généralement <b>en unités métriques</b>.</p>
					<p>Une projection permet donc de représenter sur une surface plane une partie d'un modèle ellipsoïdal, mais aussi :
						<ul>
							<li>d'obtenir des valeurs métriques plus facilement exploitables que les valeurs angulaires de latitude et longitude</li>
							<li>de rendre plus facile une évaluation des distances</li>
						</ul>
						
				<h4><a class="titre" id="II22b">Trois grands types de projections : cylindriques, coniques et azimutales</a></h4>					
					
					<p>Dans tous les cas, on va projeter la surface de la Terre sur une forme que l'on peut dérouler pour obtenir une surface plane : un cylindre, un cône ou un plan. On distingue ainsi les <b>projections cylindriques, coniques et azimutales</b>. Il existe d'autres types de projections.</p>
					<figure>
						<a href="http://commons.wikimedia.org/wiki/File:Projection_cylindrique.jpg#file" >
							<img src="illustrations/tous/2_2_projection_cylindrique.jpg" alt="Projection cylindrique, conique et azimutale" width="150">
						</a>
						<a href="http://commons.wikimedia.org/wiki/File:Projection_conique.jpg" >
							<img src="illustrations/tous/2_2_projection_conique.jpg" alt="Projection cylindrique, conique et azimutale" width="155">
						</a>
						<a href="http://commons.wikimedia.org/wiki/File:Projection_azimutale_stereographique.jpg" >
							<img src="illustrations/tous/2_2_projection_azimutale.jpg" alt="Projection cylindrique, conique et azimutale" width="250">
						</a>
						<figcaption>Projection cylindrique, conique et azimutale (Source : Traroth, Wikimedia Commons, licence GFDL).</figcaption>
					</figure>
					
				<h4><a class="titre" id="II22c">A chaque projection ses déformations</a></h4>					
					
					<p>On peut aussi classer les projections selon leurs propriétés. On distingue ainsi :</p>
					<ul>
						<li>les projections <b>équivalentes</b> qui conservent les surfaces</li>
						<li>les projections <b>conformes</b> qui conservent les angles.</li>
						<li>les projections <b>aphylactiques</b>, ni conformes ni équivalentes. Elles peuvent être équidistantes, c'est-à-dire conserver les distances sur les méridiens.</li>
					</ul>
					<p>Une projection ne peut être à la fois conforme et équivalente.</p>
					<p>Pour visualiser les déformations liées à une projection, on peut utiliser les <b>indicatrices de Tissot</b>. Ce sont des cercles identiques dessinés sur la Terre avant projection, qui se retrouveront donc déformés après projection. Si la projection déforme les angles, les cercles seront transformés en ellipses, si elle déforme les surfaces les cercles auront des surfaces différentes.</p>
					
				<h4><a class="titre" id="II22d">Quelques exemples de projections</a></h4>
	
					<p><b>Projection cylindrique conforme de Mercator</b>
					<br>Cette projection conserve les angles, mais déforme de plus en plus les surfaces au fur et à mesure qu'on se rapproche des pôles. Elle est largement utilisée, notamment par Google.</p>
					<figure>
						<a href="http://commons.wikimedia.org/wiki/File:Tissot_indicatrix_world_map_Mercator_proj.svg" >
							<img src="illustrations/tous/2_2_mercator.svg" alt="projection de Mercator" width="300">
						</a>
						<figcaption>Projection de Mercator (source : Eric Gaba – utilisateur Wikimedia Commons : Sting, licence GFDL).</figcaption>
					</figure>
					
					<p><b>Projection cylindrique équivalente de Peters</b>
					<br>
					Cette projection permet une vision juste des proportions des surfaces des continents, mais ne garde pas les bonnes formes au contraire de la carte de Mercator. Elle permet notamment d'éviter de sous-dimensionner les pays du Sud.</p>
					<figure>
						<a href="http://commons.wikimedia.org/wiki/File:Tissot_indicatrix_world_map_Gall-Peters_equal-area_proj.svg" >
							<img src="illustrations/tous/2_2_peters.svg" alt="projection de Peters" width="400">
						</a>
						<figcaption>Projection de Peters (source : Eric Gaba – utilisateur Wikimedia Commons : Sting, licence GFDL).</figcaption>
					</figure>
					
					<p><b>Projection conique conforme de Lambert</b>
					<br>
					Contrairement aux projection de Mercator et Peters, cette projection est utilisée pour représenter seulement une partie du globe. Suivant ses paramètres, la zone couverte sera différente. L'illustration montre la projection <b>Lambert 93</b>, projection officielle française : les déformations sont minimisées pour la France.</p>
					<figure>
						<a href="illustrations/tous/2_2_lambert93.svg" >
							<img src="illustrations/tous/2_2_lambert93.png" alt="projection conique conforme lambert 93" width="400">
						</a>
						<figcaption>Projection Lambert 93 (source : pôle ARD, adess, domaine public)</figcaption>
					</figure>
					
					<p><b>Projection azimutale équidistante du pôle sud</b>
					<br>	
					<figure>
						<a href="illustrations/tous/2_2_azim.svg" >
							<img src="illustrations/tous/2_2_azim.png" alt="projection azimutale équidistante pôle sud" width="350">
						</a>
						<figcaption>Projection azimutale équidistante pôle sud (source : pôle ARD, adess, domaine public)</figcaption>
					</figure>
					
					<p><b>Projection Transverse Universelle de Mercator (UTM)</b>
					<br>
					Il s'agit en fait d'une série de projections, le monde étant divisé en <a class="ext" target="_blank" href="http://upload.wikimedia.org/wikipedia/commons/e/ed/Utm-zones.jpg" >60 fuseaux</a> de 6° de longitude. Une projection différente est utilisée pour chaque fuseau : le cylindre utilisé subit à chaque fois une rotation légèrement différente. Ceci permet de minimiser les déformations. La France est ainsi traversée par 3 fuseaux : 30, 31 et 32. Cette projection peut être associée au système WGS84, ou ED50 par exemple.
					<br>
					<figure>
						<a href="http://commons.wikimedia.org/wiki/File%3AUtm_projections.svg" >
							<img src="illustrations/tous/2_2_Utm_projections.svg" alt="rotation d'un cylindre autour de la Terre" width="200">
						</a>
						<figcaption>Projection UTM : rotation d'un cylindre autour de la Terre.<br>Par Javiersanp (Travail personnel) [<a class="ext" target="_blank" href="http://creativecommons.org/licenses/by-sa/3.0">CC-BY-SA-3.0</a> ou <a class="ext" target="_blank" href="http://www.gnu.org/copyleft/fdl.html">GFDL</a>], <a class="ext" target="_blank" href="http://commons.wikimedia.org/wiki/File%3AUtm_projections.svg">via Wikimedia Commons</a></figcaption>
					</figure>
					
					<p><b>Un même point aura des coordonnées différentes selon la projection utilisée</b> (et le système associé à cette projection). Ci-dessous, les coordonnées de Paris mesurées dans différents sytèmes et projections.</p>
					
					<table>
						<caption>Coordonnées de Paris mesurées dans différents systèmes et projections.</caption>
					   <tr>
					       <th>Système et projection</th>
					       <th>Code</th>
					       <th>X (en mètres)</th>
					       <th>Y (en mètres)</th>
					   </tr>
					   <tr>
					       <td>Mercator</td>
					       <td>EPSG:54004</td>
					       <td>261712.122</td>
					       <td>6218386.300</td>
					   </tr>
					   <tr class="alt">
					       <td>Peters</td>
					       <td>SR-ORG:22</td>
					       <td>185368.909</td>
					       <td>6753027.140</td>
					   </tr>
					   <tr>
					       <td>RGF93 Lambert93</td>
					       <td>EPSG:2154</td>
					       <td>652381.068</td>
					       <td>6862047.100</td>
					   </tr>
					   <tr class="alt">
					       <td>Azimutale équidistante pôle sud</td>
					       <td>EPSG:102019</td>
					       <td>632368.408</td>
					       <td>15402681.400</td>
					   </tr>
					</table>
					<br>
					
					<p>Il existe d'autres types de projections, ni cylindriques, conformes ou azimutales.</p>
					
					<p><b>En résumé, la projection parfaite n'existe pas</b> ; il faut essayer de faire au mieux pour l'usage auquel on destine la carte (à ce sujet, vous pouvez voir <a class="ext" target="_blank" href="https://www.onf.ca/film/carte_impossible#temp-share-panel">ce film</a>). Par exemple, les cartes utilisées pour la navigation conservent généralement les angles et non les distances. L'échelle de la carte influe également sur le choix de la projection.</p>
				
			<h3><a class="titre" id="II23">A retenir</a></h3>
			
				<p>On peut exprimer les coordonnées d'un point :</p>
				<ul>
					<li>sous forme de coordonnées géographiques en degrés : latitude, longitude, hauteur ellipsoïdale. Ces coordonnées sont calculées <b>dans un système géodésique de référence, sans utilisation de projection</b></li>
					<li>sous forme de coordonnées en projection en mètres (représentation plane), calculées <b>dans un système géodésique de référence et avec une projection cartographique</b></li>
				</ul>
				<p>Exemple : les coordonnées de Paris peuvent être exprimées sous forme de coordonnées géographiques en degrés dans le système RGF93, ou bien sous forme de coordonnées projetées en mètres dans le même système RGF93 avec en plus utilisation de la projection Lambert 93.</p>
				<p class="note">Il est à noter que la projection Lambert 93 a été conçue pour être utilisée uniquement avec le système RGF93.</p>
				<p>Chaque ensemble système de coordonnées et projection s'il y en a une, ou simplement système de coordonnées, est référencé par un code, généralement défini par l'EPSG.</p>
				<p class="attention">Pour simplifier, dans le reste de ce tutoriel, le système de coordonnées et sa projection associée s'il y en a une seront nommés SCR (Système de Coordonnées de Référence) suivant la terminologie utilisée par QGIS.</p>
				
			
			<h3><a class="titre" id="II24">Quelques ressources internet</a></h3>
			
				<ul>
					<li>Comprendre le principe des projections : <a class="ext" target="_blank" href="https://www.onf.ca/film/carte_impossible#temp-share-panel">la carte impossible</a></li>
					<li>Liste des systèmes de coordonnées avec leurs codes EPSG ou autre : <a class="ext" target="_blank" href="http://spatialreference.org/" >http://spatialreference.org/</a></li>
					<li>Comparaison de projections : <a class="ext" target="_blank" href="http://bl.ocks.org/syntagmatic/ba569633d51ebec6ec6e" >http://bl.ocks.org/syntagmatic/ba569633d51ebec6ec6e</a> et <a class="ext" target="_blank" href="https://www.map-projections.net/imglist.php" >https://www.map-projections.net/imglist.php</a></li>
					<li>Aide au choix d'une projection : <a class="ext" target="_blank" href="http://projectionwizard.org/" >http://projectionwizard.org/</a></li>
				</ul>
			
				<br>
				<a class="prec" href="02_01_intro.php">chapitre précédent</a>
				<a class="suiv" href="02_03_couches_projets.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>
			
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_2.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>
	
	<?php include('footer.inc.php'); ?>
	
</div>
</body>
</html>
