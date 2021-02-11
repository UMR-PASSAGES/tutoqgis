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
			<h2>II.4  Passer d'un système de coordonnées à un autre</h2>
				<ul class="listetitres">
					<li><a href="#II41">Modifier le SCR du projet</a></li>
					<li><a href="#II42">Modifier le SCR d'une couche</a></li>
					<li><a href="#II43">Redéfinir le SCR d'une couche</a></li>
				</ul>
	
				
			<h3>Modifier le SCR du projet<a class="headerlink" id="II41" href="#II41"></a></h3>
			
				<p>Vous avez pu constater dans la partie <a href="02_03_couches_projets.php">II.3 Couches et projets : à chacun son système</a> que les couches d'un projet sont affichées dans le SCR du projet. Comment modifier le SCR du projet pour afficher les couches dans le SCR de votre choix&nbsp;?</p>
				<p>Nous allons modifier le SCR du projet <em class="data">monde.qgz</em> du WGS84 vers <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Projection_de_Robinson" >Robinson</a> (code EPSG 53030).</p>
				<div class="manip">
					<p><img class="icone" src="illustrations/tous/1_4_ouvrir_projet_icone.png" alt="Icône Ouvrir">A partir de QGIS, ouvrez le projet <em class="data"><a href="donnees/TutoQGIS_02_Geodesie.zip">monde.qgz</a></em> situé dans le dossier <b>TutoQGIS_02_Geodesie/projets</b></p>
					<p>(Si vous avez déjà un autre projet du tutoriel ouvert, il est inutile de le sauvegarder).</p>
				</div>
					<p>Ce projet comporte une couche de pays, une couche avec les <a href="02_02_coord.php#II22c">indicatrices de Tissot</a>, et une couche de graticule, c'est-à-dire de méridiens et de parallèles distants ici de 15 degrés.</p>
				<div class="manip">
					<div class="question">
						<input type="checkbox" id="faq-1">
						<p><label for="faq-1">Dans quel SCR sont les 3 couches du projet ?</label></p>
						<p class="reponse">Elles sont toutes les 3 en WGS84, code EPSG 4326 (pour le vérifier, allez dans les propriétés de la couche, rubrique Information).</p>
					</div>	
					<p>
						<a class="thumbnail_bottom" href="#thumb">Ouvrez les propriétés du projet
								<span>
									<img src="illustrations/tous/2_3_proprietes_projet_menu.png" alt="Menu Projet, Propriétés du projet" height="300" >
								</span>
						</a>
					, rubrique SCR :</p>
					<figure>
						<a href="illustrations/tous/2_4_modif_scr_projet.png" >
							<img src="illustrations/tous/2_4_modif_scr_projet.png" alt="Modifier le SCR d'un projet" width="600">
						</a>
					</figure>
					<p><em class="numero">1. </em>Vérifiez que la case <b>Aucune projection</b> soit bien décochée.</p>
					<p><em class="numero">2. </em>Tapez <b>robinson</b> dans cette partie, ou bien 53030 (code EPSG).</p>
					<p><em class="numero">3. </em>Le filtre est activé dans la liste des derniers SCR utilisés. Selon si vous avez déjà utilisé Robinson ou non, cette partie sera donc ou vide ou avec une ou deux lignes correspondant à ce système.</p>
					<p><em class="numero">4. </em>Le filtre est également activé dans la liste de tous les SCR disponibles : seuls les SCR dont le nom contient "Robinson" sont affichés. <b>Sélectionnez Sphere Robinson, code EPSG 53030</b>.</p>
					<p><em class="numero">5. </em><b>Vous devez voir dans cette partie le SCR que vous venez de sélectionner.</b></p>
					<p>Cliquez sur <b>OK</b>.</p>
				
				    <p>Toutes les couches du projet sont désormais affichées en Robinson. Leur SCR n'a cependant pas été modifié, ce que vous pouvez <a href="02_03_couches_projets.php#II32">vérifier</a>. Observez les modifications apportées aux pays et aux indicatrices de Tissot.</p>
				
				    <p class="note">Si des bugs d'affichage apparaissent, zoomez ou dézoomez.</p>
	
					<p>Répétez cette manipulation pour que le SCR du projet passe en :</p>
					<ul>
						<li>Mercator, code EPSG 54004</li>
						<li>Projection azimutale équidistante du pôle Sud, code EPSG 102019</li>
						<li>RGF93 / Lambert-93, code EPSG 2154</li>
					</ul>
					<div class="question">
						<input type="checkbox" id="faq-2">
						<p><label for="faq-2">Qu'observez-vous dans ce dernier cas ? A quoi cela est-il dû ?</label></p>
						<p class="reponse">Le RGF93 / Lambert-93 est un système adapté à l'emprise de la France métropolitaine&nbsp;; tout le reste du monde est donc de plus en plus déformé au fur et à mesure qu'on s'éloigne de la France.</p>
					</div>
					<p>Nous allons maintenant repasser le projet en WGS84. Puisqu'il existe dans ce projet des couches en WGS84, vous pouvez utiliser un raccourci pour cela :
						<br>
						<a class="thumbnail_bottom" href="#thumb">Clic-droit sur une couche (n'importe laquelle puisqu'elles sont toutes trois en WGS84) &#8594; SCR de la couche &#8594; Définir le SCR du projet depuis cette couche
							<span>
								<img src="illustrations/tous/2_4_def_scr_projet_couche.png" alt="Définir le SCR du projet à partir du SCR d'une couche" height="320" >
							</span>
						</a>
					</p>
				</div>
				<p>Le SCR du projet est maintenant le même que celui de la couche, c'est-à-dire WGS84.</p>
				<p class="attention">Vous avez pu constater que modifier le SCR du projet ne modifie pas les données. Cette manipulation permet de visualiser les données dans le SCR de votre choix, à des fins cartographiques par exemple.</p>
			
			
			<h3>Modifier le SCR d'une couche<a class="headerlink" id="II42" href="#II42"></a></h3>
			
				<p>Nous avons vu que QGIS gère le cas où plusieurs couches dans différents SCR sont affichés dans un même projet. Cependant, certaines manipulations nécessitent que toutes les couches soient dans le même SCR. Par ailleurs, par souci de clarté et pour éviter les erreurs, on peut vouloir travailler avec des couches dans le même SCR.</p>
				<p>Pour toutes ces raisons, il est utile de savoir modifier le SCR d'une couche.</p>
				<p>Cette manipulation implique de <b>recalculer les coordonnées de tous les objets de la couche dans un autre SCR</b>.</p>
				<p>Par exemple, si la couche d'origine est en WGS84 et contient un point correspondant à la ville de Paris, et que le but est d'obtenir une couche en RGF93 / Lambert-93 , les coordonnées initiales du point (48,89 2,35) en WGS84 seront recalculées pour devenir (652381 6862047) en RGF93 / Lambert-93.</p>
				<p>Cette manipulation <b>crée une nouvelle couche</b>. La couche d'origine et la couche résultat se superposeront exactement dans QGIS si la projection à la volée est activée, puisqu'elles contiendront exactement les mêmes objets.</p>
				<div class="manip">
					<p>L'objectif sera ici de créer une nouvelle couche pays dans la projection de Bonne (code ESRI 53024).</p>
					<p>Pour cela, affichez la <b>boîte à outils de traitements</b> : menu Traitements &#8594; Boîte à outils.</p>
					<figure>
						<a href="illustrations/tous/2_4_traitement_reprojeter.png" >
							<img src="illustrations/tous/2_4_traitement_reprojeter.png" alt="Emplacement de l'outil reprojeter dans la boîte à outils de traitements" width="400" >
						</a>
					</figure>
					<p>Dans la barre de recherche de cette boîte à outils, tapez <b>projection</b> et double-cliquez sur l'outil <b>Reprojeter une couche</b>.</p>
				</div>
				<p class="note">Vous noterez que cet outil est improprement nommé : il peut en effet être utiliser pour modifier le SCR d'une couche, que les SCR de départ et d'arrivée soit projetés ou géographiques&nbsp;!</p>
				<div class="manip">
					<p>La fenêtre suivante apparaît :</p>
					<figure>
						<a href="illustrations/tous/2_4_reprojeter_fenetre.png" >
							<img src="illustrations/tous/2_4_reprojeter_fenetre.png" alt="Fenêtre de l'outil reprojeter" width="600" >
						</a>
					</figure>
					<ul>
						<li class="espace">Couche source : sélectionnez <b>ne_110m_admin_0_countries</b> dans la liste</li>
						<li class="espace">SCR cible : cliquez sur l'icône à droite et choisissez le SCR <b>Sphere Bonne, code ESRI 53024</b></li>
						<li class="espace">Advanced Parameters : dans certains cas, pour passer d'un SCR à un autre, différentes transformations sont disponibles. Nous n'utiliserons pas ici cette option</li>
						<li class="espace">Reprojeté : laissez l'option par défaut, à savoir créer une couche temporaire. Le but étant ici de tester la manipulation, il n'est pas nécessaire de sauvegarder une nouvelle couche sur votre ordinateur.</li>
					</ul>
					<p>Cliquez sur <b>Exécuter</b>.</p>
					<p>Si vous avez bien coché la case correspondante, la couche est automatiquement ajoutée à la carte. Sinon, ajoutez-la dans QGIS.</p>
					
					<p>Vérifiez dans ses propriétés que son SCR soit bien Sphere Bonne.</p>
                	<div class="question">
                		<input type="checkbox" id="faq-3">
                		<p><label for="faq-3">Comment afficher cette couche dans son SCR, pour savoir à quoi ressemble la projection de Bonne ?</label></p>
                		<p class="reponse">Clic droit sur le nom de la couche &#8594; SCR de la couche &#8594; Définir le SCR du projet depuis cette couche, ou bien dans les propriétés du projet, rubrique SCR, choisissez le SCR Sphere Bonne.</p>
                	</div>
					<figure>
						<a href="illustrations/tous/2_4_bonne.png" >
							<img src="illustrations/tous/2_4_bonne.png" alt="Projection de Bonne" width="300">
						</a>
					</figure>
				</div>
				<p class="attention">Modifier le SCR d'une couche crée une nouvelle couche. Cette manipulation est utile pour pouvoir effectuer ensuite des traitements sur les données, ou pour éviter toute source de confusion en ayant uniquement des données dans le même SCR.</p>
				
				
			<h3>Redéfinir le SCR d'une couche<a class="headerlink" id="II43" href="#II43"></a></h3>			
				
				<p>Il existe une autre manipulation souvent confondue avec le fait de modifier le SCR d'une couche : <b>redéfinir le SCR d'une couche</b>. Dans ce cas, les coordonnées ne sont pas recalculées et aucune nouvelle couche n'est créée, le SCR associé à la couche est simplement modifié.</p>
				<p>Pour reprendre l'exemple utilisé plus haut d'une couche en WGS84 contenant un point correspondant à la ville de Paris de coordonnées (48,856700 2,351000), si le SCR de cette couche est redéfini en RGF93 / Lambert-93, les coordonnées du point resteront (48,856700 2,351000) mais ces coordonnées seront renseignées comme étant mesurées dans le SCR RGF93 / Lambert-93.</p>
				<p>Le point ne sera donc pas affiché, ou affiché à un endroit aberrant, puisqu'il n'est pas possible de trouver de telles coordonnées dans ce SCR (en RGF93 / Lambert-93, les X varient de 100 000 à 1 200 000 et les Y de 6 000 000 à 7 100 000).</p>
				<p>Redéfinir le SCR d'une couche n'est donc utile que dans deux cas bien précis :</p>
					<ul>
						<li><b>le SCR n'est pas défini du tout</b>, ce qui peut arriver par exemple pour certaine couches trouvées sur internet. Il faudra alors retrouver dans quel SCR a été initialement créée la couche</li>
						<li><b>le SCR est mal défini</b> (quelqu'un - ou vous-même ! - a donc déjà effectué cette manipulation à tort)</li>
					</ul>
				<div class="manip">
					<p>Pour être sûr de vous rendre compte si une couche n'a pas de SCR défini, rendez-vous dans le menu
						<a class="thumbnail_bottom" href="#thumb">Préférences  &#8594; Options
							<span>
								<img src="illustrations/tous/2_3_preferences_options_menu.png" alt="Menu Préférences, Options" height="150" >
							</span>
						</a>
						, rubrique <b>SCR</b> :
					</p>
					<figure>
						<a href="illustrations/tous/2_4_options_sans_scr.png" >
							<img src="illustrations/tous/2_4_options_sans_scr.png" alt="Options, rubrique SCR" width="600">
						</a>
					</figure>
					<p>Pour l'option <b>Quand une nouvelle couche est créée ou quand une couche est chargée sans SCR</b>, choisissez l'option <b>Demander le SCR</b>.</p>
				</div>
				<p>Ainsi, si vous chargez une couche dont le SCR n'est pas défini, QGIS vous avertira et vous demandera de spécifier un SCR pour cette couche (ce sera cependant à vous de retrouver le SCR initial dans lequel aura été créée cette couche).</p>
				
				<p class="attention">Redéfinir le SCR d'une couche est une opération très (trop !) facilement accessible : à partir des propriétés d'une couche, rubrique <b>Source</b>, il suffit de sélectionner un autre SCR dans la liste déroulante.</p>
				<p class="attention">Rappelez-vous de ne pas procéder ainsi pour modifier le SCR d'une couche, mais d'utiliser plutôt l'outil <b>Reprojeter</b> de la boîte à outils de traitement. La confusion entre ces 2 opérations est une source d'erreur très courante&nbsp;!</p>
				
				<br>
				<a class="prec" href="02_03_couches_projets.php">chapitre précédent</a>
				<a class="suiv" href="03_00_recherche_ajout.php">partie III : recherche et ajout de données</a>
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
