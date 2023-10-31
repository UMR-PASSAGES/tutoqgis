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
			<h1>III.4  Ajouter un fonds de carte en ligne</h1>
				<ul class="listetitres">
					<li><a href="#III41">Principe</a></li>
					<li><a href="#III42">Afficher un fonds via l'explorateur</a>
					   <ul class="listesoustitres">
					       <li><a href="#III42a">Ajouter un fonds proposé par défaut</a></li>
					       <li><a href="#III42b">Ajouter de nouveaux fonds</a></li>
					   </ul>
					</li>
					<li><a href="#III43">Afficher un fonds avec l'extension QuickMapServices</a></li>
				</ul>
	
			<h2>Principe<a class="headerlink" id="III41" href="#III41"></a></h2>
			
			    <p>Il est possible d'afficher dans QGIS des fonds de carte &#171;&nbsp;en ligne &nbsp;&#187;, comme par exemple les fonds <a class="ext" target="_blank" href="https://www.openstreetmap.org/">OpenStreetMap</a> ou Google Maps. <b>Ces fonds ne seront pas modifiables</b>, la seule possibilité étant de les rendre plus ou moins transparents pour les atténuer.</p>
			    
			    <p class="note">Pour en savoir plus sur OpenSreetMap, c'est au <a href="03_05_donnees_osm.php">chapitre suivant</a> !</p>
			    
			    <p>Ajouter de tels fonds est utile pour se repérer rapidement, ou bien pour servir de fonds pour une carte&nbsp;;  dans ce dernier cas il faut que le fonds soit adapté à l'objectif de la carte et y apporte des informations utiles sans l'alourdir.</p>
			    
			    <p>De tels fonds sont dits &#171;&nbsp;tuilés &nbsp;&#187; car ils sont découpés en carrés jointifs (tuiles) pour faciliter l'affichage, à chaque niveau de zoom. On parle également de tuiles XYZ, X et Y correspondant à  la position de la tuile et Z au niveau de zoom. Pour en savoir plus : <a class="ext" target="_blank" href="https://en.wikipedia.org/wiki/Tiled_web_map">la page (en anglais) de wikipedia</a></p>
			
			<h2>Afficher un fonds via l'explorateur<a class="headerlink" id="III42" href="#III42"></a></h2>

		        <p>Depuis QGIS 3, il existe une solution pour ajouter des fonds de carte sans installation d'extension.</p>
		        
		        <h3>Ajouter un fonds proposé par défaut<a class="headerlink" id="III42a" href="#III42a"></a></h3>
		        
    		        <div class="manip">
    		            <p>Ouvrez un nouveau projet QGIS.</p>
    			        <p>Rendez-vous dans le panneau <b>Explorateur</b> de QGIS. Si vous ne voyez pas ce panneau, activez-le via le <b>menu Vue &#8594; Panneaux &#8594; Explorateur</b>.</p>
    			        <p>Dans ce panneau Explorateur, allez dans la rubrique <b>XYZ Tiles</b> : un fonds s'y trouve par défaut : OpenStreetMap.</p>
    			        <figure>
                        	<a href="illustrations/3_4_xyz_tiles.jpg" >
                        		<img src="illustrations/3_4_xyz_tiles.jpg" alt="panneau explorateur, rubrique xyz tiles" width="220">
                        	</a>
                         </figure>
                         <p>Double-cliquez sur ce fonds pour l'ajouter à QGIS.</p>
    		        </div>
    		        
    		        <p>Beaucoup d'autres fonds sont disponibles de la même manière, mais il faut d'abord créer les connexions correspondantes. Cette manipulation ne devra être effectuée qu'une seule fois, les fonds seront ensuite accessibles dans le panneau explorateur de la même manière que le fonds OpenStreetMap proposé par défaut.</p>
    		        
    		    <h3>Ajouter de nouveaux fonds<a class="headerlink" id="III42b" href="#III42b"></a></h3>
    		    
    		        <p>Il faut tout d'abord trouver des adresses de fonds à ajouter à QGIS. Vous pouvez trouver quelques adresses <a class="ext" target="_blank" href="https://www.spatialbias.com/2018/02/qgis-3.0-xyz-tile-layers/">au bas de cette page</a>, qui explique par ailleurs comment en obtenir d'autres. Voir aussi <a class="ext" target="_blank" href="https://wiki.openstreetmap.org/wiki/Tile_servers" >la page Tile Servers du wiki OpenStreetMap</a>, comme décrit <a href="03_05_donnees_osm.php#III52" >plus loin</a>.</p>
    		        <p>Ici, nous allons ajouter un fonds en niveaux de gris utilisant les données OpenStreetMap, qui se nomme Carto Positron.</p>
		        
    		        <div class="manip">
    		            <p>Copiez l'URL du serveur Carto Positron : <b>https://cartodb-basemaps-a.global.ssl.fastly.net/light_all/{z}/{x}/{y}.jpg</b></p>
    		            <p>Dans QGIS, panneau explorateur, clic-droit sur XYZ Tiles &#8594; Nouvelle connexion...</p>
    		            <figure>
                        	<a href="illustrations/3_4_positron_connexion.jpg" >
                        	    <img src="illustrations/3_4_positron_connexion.jpg" alt="Fenêtre de nouvelle connexion à un serveur de tuiles" width="400">
                            </a>
                        </figure>
                        <ul>
                            <li>Nom : il s'agit du nom qui apparaîtra dans le panneau explorateur, vous pouvez taper par exemple <b>Carto Positron</b></li>
                            <li>URL : collez l'URL que vous avez préalablement copiée
                        </ul>
                        <p>Laissez les valeurs par défaut pour les autres paramètres, cliquez sur OK.</p>
                        <p>Le fonds Carto Positron apparaît maintenant avec le fonds OpenStreetMap dans la rubrique XYZ Tiles.</p>
                        <figure>
                            <a href="illustrations/3_4_positron_xyz.jpg" >
                        	    <img src="illustrations/3_4_positron_xyz.jpg" alt="panneau explorateur, rubrique XYZ Tiles : le fonds Carto Positron apparaît" width="180">
                        	</a>
                        </figure>
                        <p>Double-cliquez pour l'ajouter :</p>
                        <figure>
                        	<a href="illustrations/3_4_positron_visu.jpg" >
                        	    <img src="illustrations/3_4_positron_visu.jpg" alt="Aperçu du fonds Carto Positron : Brest" width="500">
                            </a>
                        </figure>
    		        </div>
    		        
    		        <p class="note">Attention à ne pas utiliser le caractère / (&#171;&nbsp;slash&nbsp;&#187;) dans le nom des connexions !</p>
    		        <p class="note">Attention également, certaines url de serveurs de tuiles sont sous la forme <b>http://a.tile.stamen.com/toner/${z}/${x}/${y}.jpg</b> : il faut alors supprimer les <b>$</b> pour obtenir <b>http://a.tile.stamen.com/toner/{z}/{x}/{y}.jpg</b>.</p>
			   
		    <h2>Afficher un fonds avec l'extension QuickMapServices<a class="headerlink" id="III43" href="#III43"></a></h2>
		    
		        <p>Une autre méthode pour ajouter des fonds de carte consiste à utiliser l'extension <a class="ext" target="_blank" href="https://github.com/nextgis/quickmapservices">QuickMapServices</a>, qui propose un certain nombre de fonds, notamment des fonds OpenStreetMap et Google Maps.</p>
		        
		        <p class="note">L'extension QuickMapServices est similaire à l'extension <b>OpenLayers</b> sur laquelle elle est d'ailleurs basée, mais propose plus de couches et utilise un serveur de tuilage, ce qui semble provoquer moins d'erreur lors de changements de niveau de zoom et de SCR.</p>
				<div class="manip">
					<p>Pour installer QuickMapServices : 
						<a class="thumbnail_bottom" href="#thumb">Menu Extension &#8594; Installer/Gérer les extensions
							<span>
								<img src="illustrations/4_6_extensions_menu.jpg" alt="Menu Extension, Installer/Gérer les extensions" height="100" >
							</span>
						</a>	
					 : la fenêtre du gestionnaire d'extensions s'ouvre.</p>
					<figure>
						<a href="illustrations/4_6_install_quickmapservices.jpg" >
							<img src="illustrations/4_6_install_quickmapservices.jpg" alt="Installation de QuickMapServices" width="600">
						</a>
					</figure>
					<p>Dans la rubrique <b>Tout</b>, tapez &#171; quickmap &#187; dans la partie <b>Rechercher</b> pour limiter les résultats, sélectionnez <b>QuickMapServices</b> puis cliquez sur <b>Installer l'extension</b> en bas à droite de la fenêtre.</p>
					<p>Fermez la fenêtre du gestionnaire d'extensions.</p>
				</div>
				
				<p>Par défaut, QuickMapServices permet l'ajout de quelques fonds de carte, que vous pouvez voir en allant dans le menu Internet &#8594; QuickMapservices... Il est possible d'en ajouter d'autres !</p>
				
				<div class="manip">
				   <p>Menu Internet &#8594; QuickMapServices &#8594; Settings :</p>
				   <p>Dans l'onglet <b>More services</b>, cliquez sur le bouton <b>Get contributed pack</b>.</p>
				   <figure>
						<a href="illustrations/4_6_quickmapservices_moreservices.jpg" >
							<img src="illustrations/4_6_quickmapservices_moreservices.jpg" alt="Ajouter des fonds dans QuickMapServices" width="500">
						</a>
					</figure>
					<p>Rendez-vous ensuite dans l'onglet <b>Visibility</b> pour décocher les fonds qui ne vous semblent pas à première vue utiles, pour plus de clarté.</p>
				<p>Pour ajouter les données OSM : le menu QuickMapServices est maintenant visible dans le menu Internet. Chargez la couche <b>OSM standard</b> dans la rubrique OSM.</p>
					<figure>
						<a href="illustrations/4_6_menu_quickmapservices.jpg" >
							<img src="illustrations/4_6_menu_quickmapservices.jpg" alt="Menu QuickMapServices" width="600">
						</a>
					</figure>
			    </div>
				    
				<p class="attention">Quelle que soit la méthode utilisée pour charger un fonds de carte OSM, il aura pour SCR WGS84/Pseudo-Mercator (EPSG 3857). Il est possible de modifier le SCR du projet pour afficher les fonds OSM dans d'autres SCR, mais ceci peut parfois provoquer des problèmes d'affichage.</p>	
			<br>
			<a class="prec" href="03_03_donnees_XY.php">chapitre précédent</a>
			<a class="suiv" href="03_05_donnees_osm.php">chapitre suivant</a>
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
