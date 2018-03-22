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
			<h2>XI.4  Comprendre et lancer un script Python</h2>
				<ul class="listetitres">
					<li><a href="#XI41">Lancer une commande Python dans QGIS</a></li>
					<li><a href="#XI42">Ouvrir un script Python</a></li>
					<li><a href="#XI43">Paramétrer le script</a></li>
					<li><a href="#XI44">Lancer le script</a></li>
				</ul>
				<br>
				
				<p>Chaque manipulation que nous faisons dans QGIS via l'interface graphique (ajouter une couche, découper une couche etc.) peut également être faite sous forme d'une ligne de commande dans le langage <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Python_%28langage%29">Python</a>.</p>
				<p>Par exemple, pour ajouter la couche <em class="data">SAINTE_RADEGONDE.shp</em>, située dans le dossier /mnt/travail/temp, vous pouvez soit l'ajouter à la main comme nous l'avons fait jusqu'ici, soit taper la commande Python suivante :</p>
				<p class="code">qgis.utils.iface.addVectorLayer("/mnt/travail/temp/SAINTE_RADEGONDE.shp", "SAINTE_RADEGONDE", "ogr")</p>
				<p>Ce qui revient à lancer l'outil d'ajout de couche vecteur <b>addVectorLayer</b> de QGIS, avec 3 paramètres :</p>
				<ul>
					<li>l'emplacement de la couche : <b>/mnt/travail/temp/SAINTE_RADEGONDE.shp</b></li>
					<li>le nom avec lequel la couche sera affichée dans QGIS : <b>SAINTE_RADEGONDE</b></li>
					<li>le nom du fournisseur de données : <b>ogr</b> car QGIS utilise en interne une <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/Biblioth%C3%A8que_logicielle">bibliothèque</a> nommée ogr pour accéder aux shapefiles</li>
				</ul>
				<p>Nous allons ici ouvrir un script Python existant qui découpe et reprojette en WGS84 toutes les couches shapefiles présentes dans un même dossier. Sans rentrer dans le détail, nous verrons comment est constitué ce script, comment le paramétrer et le lancer.</p>
				
				<h3><a class="titre" id="XI41">Lancer une commande Python dans QGIS</a></h3>
				
				<div class="manip">
					<p>Rendez-vous dans le menu <b>Extension &#8594; Console Python</b>.</p>
					<p>La console s'ouvre en bas de la fenêtre de QGIS. Dans cette console, vous pouvez taper des commandes Python qui seront exécutées une à une.</p>
					<p>Tapez <b>print ('hello !')</b> en bas de la console :</p>
					<figure>
						<a href="illustrations/tous/11_04_test_console.png" >
							<img src="illustrations/tous/11_04_test_console.png" alt="test de la console : taper une commande" width="620">
						</a>
					</figure>
					<p>Puis appuyez sur la touche entrée. Vous devriez voir votre commande, suivie du résultat, en haut de la console :</p>
					<figure>
						<a href="illustrations/tous/11_04_test_console_resultat.png" >
							<img src="illustrations/tous/11_04_test_console_resultat.png" alt="test de la console : taper une commande" width="620">
						</a>
					</figure>
					<p>Vous venez d’utiliser la commande <b>Print</b>, qui permet d'afficher du texte dans la console. Vous pouvez également tester la commande citée plus haut pour ajouter une couche vecteur :</p>
					<p class="code">qgis.utils.iface.addVectorLayer("/mnt/travail/temp/SAINTE_RADEGONDE.shp", "SAINTE_RADEGONDE", "ogr")</p>
					<p>En adaptant le chemin vers la couche.</p>
				</div>
				
				<p>Il est possible de travailler uniquement en lançant ainsi des commandes une à une ; seulement, les commandes utilisées ne seront pas sauvegardées et ne pourront donc être réutilisées sans tout retaper à la main (même s'il est possible de faire défiler les dernières commandes utilisées en appuyant sur la touche flèche haut du clavier).</p>
				
				<h3><a class="titre" id="XI42">Ouvrir un script Python</a></h3>
					
					<p>Pour sauvegarder et réutiliser facilement votre travail, le plus simple est d'utiliser ce qu'on appelle un script. Il s'agit simplement d'un fichier texte comportant une suite de commandes, et qui porte l'extension PY puisqu'il s'agit d'un script Python.</p>
					<p>Ce tutoriel n'étant pas un tutoriel Python, nous nous contenterons d'ouvrir un script existant plutôt que d'en créer un nous-mêmes.</p>
					
					<div class="manip">
						<p>Pour ouvrir un script : cliquez sur l'icône <b>Afficher l'éditeur</b> de la console : l'éditeur de script s'ouvre.</p>
						<figure>
							<a href="illustrations/tous/11_04_editeur_icone.png" >
								<img src="illustrations/tous/11_04_editeur_icone.png" alt="icône afficher l'éditeur dans la console Python" width="620">
							</a>
						</figure>
						<p>Dans l'éditeur, cliquez sur l'icône <b>Ouvrir fichier</b> (celle du haut) et allez chercher le script <b>clip_and_reproject.py</b> situé dans <b>TutoQGIS_11_Automatisation/scripts</b>.</p>
						<figure>
                        	<a href="illustrations/tous/11_04_ouvrir_script_icone.png" >
                        		<img src="illustrations/tous/11_04_ouvrir_script_icone.png" alt="Icône d'ouverture de script de l'éditeur Python" width="620">
                        	</a>
                        </figure>
						<p>N'hésitez pas à agrandir la partie consacrée à la console dans QGIS, au détriment de la fenêtre de visualisation des données.</p>
						<p>Lisez le contenu du script. <b>Les lignes commençant par un # sont des commentaires</b> : leur contenu ne sera pas pris en compte, ils sont uniquement utiles pour mieux comprendre le script.</p>
					</div>
					<p>L'objectif n'est pas de comprendre dans le détail tout ce que fait ce script, mais de comprendre globalement ce qui s'y passe, notamment au moyen des commentaires. Il s'agit ici d'un script faisant le même travail que le modèle que vous avez réalisé en <a href="11_03_modeleur.php">XI.3</a> en mode par lot, à savoir découper plusieurs couches par une même couche et reprojeter les couches obtenues en WGS84.</p>

				
				<h3><a class="titre" id="XI43">Paramétrer le script</a></h3>
				
					<p>Au début du script, vous trouverez ces lignes :</p>
					<figure>
						<a href="illustrations/tous/11_04_parametres.png" >
							<img src="illustrations/tous/11_04_parametres.png" alt="lignes du script correspondant aux paramètres en entrée" width="550">
						</a>
					</figure>
					<p>Il s'agit des paramètres en entrée et sortie du script :</p>
					<ul>
						<li><b>input folder</b> : le dossier où sont situées les couches à découper</li>
						<li><b>mask layer</b> : la couche qui servira de masque de découpe</li>
						<li><b>output folder</b> : le dossier où seront enregistrées les couches créées (ce dossier doit déjà exister)</li>
					</ul>
					<div class="manip">
						<p>A vous de modifier ces paramètres suivant l'emplacement des données sur votre ordinateur !</p>
					</div>
					<p class="note">Sur Windows, les chemins seront de la forme 'C:/…' par exemple.</p>
				
				<h3><a class="titre" id="XI44">Lancer le script</a></h3>
					<div class="manip">
						<p><img class="icone" src="illustrations/tous/11_04_executer_script_icone.png" alt="icône exécuter le script" >Pour lancer le script, cliquez sur l'icône <b>Exécuter le script</b> en haut de l'éditeur. Vérifiez que tout ait bien fonctionné.</p>
						<p>Quelles modifications apporter au script pour que :</p>
						<div class="question">
							<input type="checkbox" id="faq-1">
							<p><label for="faq-1">les couches soient reprojetées non plus en WGS84 mais en NTF / Lambert zone II (code EPSG 27572) ?</label></p>
							<p class="reponse">Ligne 57, remplacer <b>'EPSG:4326'</b> par <b>'EPSG:27572'</b>. Vous pouvez également remplacer ligne 55 <b>'_wgs84.shp'</b> par <b>'_ntfl2.shp'</b> (il s'agit du suffixe qui sera ajouté au nom de la nouvelle couche).</p>
						</div>
						<div class="question">
							<input type="checkbox" id="faq-2">
							<p><label for="faq-2">au lieu de l'outil Clip de découpage, ce soit l'outil Intersection qui soit utilisé ?</label></p>
							<p class="reponse">Dans la boîte à outils de traitements &#8594; géotraitements QGIS &#8594; Outils de recouvrement de vecteur(s), lancez l'outil d'intersection et allez sur l'onglet <b>Aide</b>, rubrique <b>Console usage</b>. Notez le nom de l'algorithme ; puis ligne 39 remplacez <b>qgis:clip</b> par ce nom : <b>qgis:intersection</b>.</p>
						</div>
					</div>
						
				<br>
				<a class="prec" href="11_03_modeleur.php">chapitre précédent</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_11.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
