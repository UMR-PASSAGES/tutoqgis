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
			<h2>IV.5  Lancer le géoréférencement</h2>
				<ul class="listetitres">
					<li><a href="#IV51">Vérification avant calage : les erreurs</a>
						<ul class= "listesoustitres">
							<li><a href="#IV51a" >Erreur locale : en chaque point de contrôle</a></li>
							<li><a href="#IV51b" >Erreur globale : Erreur Quadratique Moyenne</a></li>
						</ul>
					</li>
					<li><a href="#IV52">Lancement du géoréférencement</a></li>
					<li><a href="#IV53">Vérification de la précision du calage</a>
						<ul class= "listesoustitres">
							<li><a href="#IV53a" >Lecture de la carte et du rapport PDF</a></li>
							<li><a href="#IV53b" >Vérification par superposition d'une autre couche</a></li>
						</ul>
					</li>
				</ul>
				<br>
			
			
			<h3>Vérification avant calage : les erreurs<a class="headerlink" id="IV51" href="#IV51"></a></h3>
			
			
				<h4>Erreur locale : en chaque point de contrôle<a class="headerlink" id="IV51a" href="#IV51a"></a></h4>
				
					<p>Maintenant que le type de transformation est renseigné, les erreurs pour chaque pixel ont été calculées dans la table des points de contrôle :</p>
					<figure>
						<a href="illustrations/4_5_table_avec_erreurs.jpg" >
							<img src="illustrations/4_5_table_avec_erreurs.jpg" alt="Tables de points de contrôle une fois les erreurs par pixel calculées" width="620">
						</a>
					</figure>
					<p>Comme indiqué dans la partie <a href="04_03_calage_carroyage.php#IV31" >IV.3.1</a> :</p>
					<ul>
						<li class="espace">les colonnes <b>dX (pixels) et dY (pixels)</b> correspondent à la différence entre les coordonnées qu'on souhaiterait voir prendre le point (dstX et dstY) et les coordonnées que prendra effectivement le point après le géoréférencement. Cette valeur variera selon le type de transformation choisie.</li>
						<li class="espace">La colonne <b>Résidu (pixels)</b> correspond à l'erreur associée à ce point, calculée à partir de dX[pixels] et dY[pixels]. Cette erreur est égale à la racine de la somme des carrés de dX[pixels] et dY[pixels], soit : <br>&#8730; ( dX[pixels] &#178; + dY[pixels] &#178; )</li>
					</ul>
					
					<div class="manip">
						<p>Classez les points par erreur décroissante, en cliquant deux fois sur l'en-tête de colonne Résidu (pixels).</p>
						<p>Avez-vous dans votre table des points avec des valeurs d'erreur très importantes par rapport aux autres ? Pouvez-vous en trouver la cause ? Vous pouvez décocher les points aberrants dans la colonne on/off.</p>
					</div>
					
						<p>Observez que, quand vous décochez un point de contrôle, son erreur résiduelle devient plus grande que lorsqu'il était coché, ce qui traduit une moins bonne précision de calage dans la zone autour de ce point. Il est fortement conseillé, lorsqu'on désactive un point, de le remplacer par un autre point situé dans le voisinage de matière à éviter des zones non prises en compte dans le calage et pour lesquelles on ne peut avoir de résidu, donc d'indicateur de qualité du calage.</p>
						
					<div class="manip">
						<p>Vous ne devriez normalement pas obtenir des erreurs résiduelles supérieures à 10 ; si nécessaire, supprimez et recréez des points de calage.</p>
					</div>
				
				
				<h4>Erreur globale : Erreur Quadratique Moyenne<a class="headerlink" id="IV51b" href="#IV51b"></a></h4>
				
					<p>Tout en bas de la table des points de contrôle est indiqué le type de transformation utilisée (polynomiale 1 dans notre cas) et l'erreur moyenne :</p>
					<figure>
						<a href="illustrations/4_5_table_emq.jpg" >
							<img src="illustrations/4_5_table_emq.jpg" alt="Tables de points de contrôle avec l'erreur moyenne insiquée tout en bas" width="650">
						</a>
					</figure>
					<p>En plus de l'erreur résiduelle calculée par pixel, la transformation renvoie une erreur globale appelée <b>Erreur Quadratique Moyenne (EMQ)</b> ou bien Root Mean Square (RMS). Cette erreur est calculée de la manière suivante :</p>
					<p>EMQ = &#8730; ( ( Somme dX[pixels] &#178; + Somme dY[pixels] &#178; ) / ( nb points – nb points min ) )</p>
					<p>Vous pouvez donc constater que si le nombre de points utilisés est égal au nombre de points minimum associé à la transformation, l'EMQ est considérée comme nulle. Une erreur nulle n'est donc pas forcément révélatrice d'un calage précis...</p>
					
					<div class="manip">
						<p>Vérifiez que votre EMQ soit inférieure à 5. Si les erreurs de chacun de vos points sont suffisamment faibles, comme vérifié <a href="04_05_lancement.php#IV51a" >plus haut</a>, cela devrait être le cas.</p>
						<p>Vérifiez ce qui se passe si vous décochez tous les points (colonne on/off) sauf trois. Cochez un quatrième point. Cochez à nouveau tous les points, sauf ceux ayant éventuellement des valeurs d'erreur aberrantes.</p>
					</div>
				
			<h3>Lancement du géoréférencement<a class="headerlink" id="IV52" href="#IV52"></a></h3>
			
				<div class="manip">
					<p><img class="icone" src="illustrations/4_5_lancement_icone.jpg" alt="icône de lancement du géoréférencement" >Pour procéder au géoréférencement proprement dit :
						<a class="thumbnail_bottom" href="#thumb">Menu Fichier &#8594; Débuter le géoréférencement
							<span>
								<img src="illustrations/4_5_lancement_menu.jpg" alt="Menu Fichier, Débuter le géoréférencement" height="170" >
							</span>
						</a>	
					ou bien cliquez sur l'icône correspondante.</p>
					<p>Une barre de progression d'affiche, le processus peut être relativement long, patientez...</p>
				</div>
					<p>Une fois le géoréférencement terminé, l'image calée s'affiche dans QGIS (en plus de s'afficher dans la fenêtre du géoréférenceur).</p>
					<p class="manip">Fermez la fenêtre du géoréférenceur.</p>
				
			<h3>Vérification de la précision du calage<a class="headerlink" id="IV53" href="#IV53"></a></h3>
					
				<h4>Lecture de la carte et du rapport PDF<a class="headerlink" id="IV53a" href="#IV53a"></a></h4>
				
					<p class="manip">Ouvrez tout d'abord la carte PDF, qui se situe à l'emplacement que vous avez choisi précédemment.</p>
					<figure>
						<a href="illustrations/4_5_carte.jpg" >
							<img src="illustrations/4_5_carte.jpg" alt="carte PDF issue du géoréférencement" width="550" >
						</a>
					</figure>
					<p>Cette carte montre le déplacement des différents points de calage. Attention, ce déplacement n'est pas représenté à l'échelle de l'image, mais selon une échelle en pixels située en bas à gauche de l'image.</p>
					<p>Par exemple, le point 0 en haut à gauche s'est déplacé d'environ 2 ou 3 pixels vers le bas et un peu moins d'un pixel vers la gauche. Vous pouvez constater que cette information coïncide avec celle de la table des points :</p>
					<figure>
					   <a href="illustrations/4_5_point_0.jpg" >
						  <img src="illustrations/4_5_point_0.jpg" alt="ligne correspondant au point 0 dans la table des points de contrôle" height="40" >
					   </a>
					</figure>
					<p>En effet, les informations des cases dX[pixels] et dY[pixels] indiquent un déplacement de 2,77 pixels en Y (vers le bas) et -0,82 pixels en Y (vers la gauche). Ces chiffres seront différents dans votre cas, mais ils seront cohérents avec votre carte PDF.</p>
					<p>Le rapport PDF contient la carte, la visualisation séparée des erreurs de calage en chaque point, ainsi que la table des points de contrôle avec les erreurs en X, en Y et totale pour chacun d'eux. Il n'indique malheureusement pas la RMSE (ou l'EMQ). Il demeure cependant possible de la recalculer sous un tableur en important le fichier-texte des points de contrôle (extension .points).</p>
				
				<h4>Vérification par superposition d'une autre couche<a class="headerlink" id="IV53b" href="#IV53b"></a></h4>
				
					<p>Une bonne manière de vérifier l'exactitude du géoréférencement est de superposer notre couche calée à une couche déjà correctement géoréférencée.</p>
					<p>Ici, nous allons utiliser la couche de pays de <a class="ext" target="_blank" href="http://www.naturalearthdata.com/">NaturalEarth</a>.</p>
					<div class="manip">
						<p>Si ce n'est pas déjà fait, ajoutez à QGIS votre carte calée de l'île d'Oahu.</p>
						<p>Ajoutez ensuite la couche shapefile <em class="data"><a href="donnees/TutoQGIS_04_Georef.zip">ne_10m_admin_0_countries</a></em>, disponible dans le dossier <b>TutoQGIS_04_Georef/donnees</b>.</p>
					</div>
					<p>Les deux couches doivent normalement se superposer (ajustez éventuellement le style de la couche de pays).</p>
					<figure>
						<a href="illustrations/4_5_superposition.jpg">
							<img src="illustrations/4_5_superposition.jpg" alt="superposition de la couche de pays et de l'image calée" width="550" >
						</a>
					</figure>
					<p>Félicitations, votre géoréférencement a fonctionné ! Vous pouvez si vous le voulez découvrir l'autre méthode pour géoréférencer, en se basant sur une couche déjà calée, dans le chapitre suivant.</p>
			

				<br>
				<a class="prec" href="04_04_parametrage.php">chapitre précédent</a>
				<a class="suiv" href="04_06_calage_autre_couche.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>				
				
		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_4.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
