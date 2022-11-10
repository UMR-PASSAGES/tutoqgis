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
			<h2>XII.3  Classification non supervisée</h2>
			
			<ul class="listetitres">
				<li><a href="#XII31">Qu'est-ce qu'une classification non supervisée ?</a></li>
				<li><a href="#XII32">Prise en main des données</a></li>
				<li><a href="#XII33">Extraction des signatures spectrales</a></li>
				<li><a href="#XII34">Classification au moyen de la méthodes des K-Means</a></li>
			</ul>
			<br>
				
				<p>L'objectif de ce chapitre est de réaliser une <b>classification</b>, c'est-à-dire de partir d'une image satellite pour obtenir une couche d'occupation du sol avec différentes catégories.</p>
				
				<p>Pour cela, nous allons utiliser une image Sentinel-2 du Sud de l'Inde. Nous commencerons par explorer cette image et ses signature spectrales, comme vu <a href="12_01_intro_teledec.php" >ici</a> et <a href="12_02_info_spectrale.php" >là</a>, avant d'effectuer une classification non supervisée par la méthode des K-Means pour en extraire l'occupation du sol.</p>
				
				<h3>Qu'est-ce qu'une classification non supervisée ?<a class="headerlink" id="XII31" href="#XII31"></a></h3>
				
          <p>Un peu de théorie avant de commencer&nbsp;! <b>Une classification a pour but de partir d'une image pour en regrouper les pixels sous forme de catégories.</b> Typiquement, on va partir d'une image satellite pour arriver à une couche d'occupation du sol avec par exemple 4 catégories&nbsp;: surface en eau, sol nu, forêt, cultures. Bien sûr, les catégories vont varier suivant l'image et l'objectif.</p>
          
          <p>On va distinguer 2 grands types de classification : <b>supervisée</b> ou <b>non supervisée</b>. Nous allons voir dans ce chapitre un exemple de classification non supervisée, c'est-à-dire uniquement basée sur les traitements statistiques de l'image, sans recours à un échantillonnage terrain. En gros c'est le logiciel qui fait tout le travail, ce qui a comme vous vous en doutez des avantages et des inconvénients&nbsp;!</p>
          
          <p>L'hypothèse de travail est que les objets de l'image ayant une signature spectrale identique ou similaire appartiennent à la même classe d'occupation du sol.</p>
          
          <p>Il existe plusieurs algorithmes de classification non supervisée&nbsp;:</p>
          <ul>
            <li>le regroupement par moyenne-K (K-Means, que nous allons voir ici)</li>
            <li>le regroupement par ISODATA</li>
            <li>...</li>
          </ul>
          
          <p>Pour en savoir plus sur les classifications, vous pouvez vous rendre sur le <a class="ext" target="_blank" href="https://www.rncan.gc.ca/cartes-outils-et-publications/imagerie-satellitaire-et-photos-aeriennes/tutoriel-notions-fondamentales-teledetection/9310" >tutoriel du Centre canadien de cartographie et d’observation de la Terre</a>.</p>
				
				<h3>Prise en main des données<a class="headerlink" id="XII32" href="#XII32"></a></h3>
				
          <p>L'image que nous allons utiliser est une image Sentinel-2 su Sud de l'Inde d'avril 2020.</p>
          
          <div class="manip">
            <p>Ouvrez un nouveau projet QGIS et ajoutez-y l'image geotiff <em class="data">S2A_20200401</em>.</p>
            <p>Pour voir où se situe la zone, <a href="03_04_fonds_carte.php#III42a">ajoutez par exemple un fonds OpenStreetMap</a>.</p>
            <figure>
  						<a href="illustrations/tous/12_03_imagesat.png" >
  							<img src="illustrations/tous/12_03_imagesat.png" alt="Vue générale et zoom de l'image satellite" width="600">
  						</a>
  					</figure>
  					
  					<p class="keskonfai">Il n'y a que 10 bandes sur cette image et non 13 ?</p>
  					
  					<p>Pour explorer cette image, nous pouvons tester différentes <a href="12_01_intro_teledec.php#XII14b">compositions colorées</a>.</p>
  					<p>Commençons par une composition colorée "en vraie couleur", avec les bandes rouge, vert et bleu, soit les bandes 4, 3 et 2&nbsp;:</p>
  					<figure>
  						<a href="illustrations/tous/12_03_compocol_432.png" >
  							<img src="illustrations/tous/12_03_compocol_432.png" alt="Composition colorée en vraie couleur de l'image Sentinel-2" width="600">
  						</a>
  					</figure>
  					<p>On peut aussi tester des compositions en fausse couleur&nbsp;:</p>
  					<p class="keskonfai">Lesquelles ?</p>
          </div>
          
          <p class="keskonfai">Interprétation ?</p>
				
				<h3>Extraction des signatures spectrales<a class="headerlink" id="XII33" href="#XII33"></a></h3>
				
				  <p>Nous allons maintenant extraire les signatures spectrales des 4 types d'occupation du sol suivants&nbsp;:</p>
				  
				  <ol>
				    <li>Surface en eau</li>
				    <li>Surface en forêt</li>
				    <li>Surface en sol nu</li>
				    <li>Surface en cultures</li>
				  </ol>
				  
				  <p>Pour cela, vous pouvez vous référer <a href="12_02_info_spectrale.php#XII21">ici</a>.</p>
				
				<h3>Classification au moyen de la méthodes des K-Means<a class="headerlink" id="XII34" href="#XII34"></a></h3>
				
				  

				
				<br>
				<a class="prec" href="12_02_info_spectrale.php">chapitre précédent</a>
				<a class="suiv" href="12_04_teledec_recap.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_12.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
