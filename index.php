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
		
			<h2>Présentation</h2>
			
				<h3>En quelques mots</h3>
					<p>Ce tutoriel QGIS a été créé par le pôle Analyse et Représentation des données de l'UMR <a class="ext" target="_blank" href="http://www.passages.cnrs.fr/">PASSAGES</a> et est aujourd'hui maintenu par le <a class="ext" target="_blank" href="https://letg.cnrs.fr/mot9.html">RASTeR</a> de l'UMR <a class="ext" target="_blank" href="https://letg.cnrs.fr/">LETG</a>. Son but est de permettre aux débutants en SIG de s'initier à ceux-ci via le logiciel libre QGIS. Pour installer QGIS, rendez-vous sur <a class="ext" target="_blank" href="http://www.qgis.org/" >http://www.qgis.org/</a>.</p>
					<p>Le tutoriel est mis à jour pour chaque version maintenue &#171;&nbsp;à long terme&nbsp;&#187; de QGIS : actuellement il s'agit de la version <a class="ext" target="_blank" href="https://www.qgis.org/fr/site/forusers/visualchangelog322/index.html">3.22 'Białowieża'</a>.</p>
					
				<h3>Accès au tutoriel</h3>
					<p>Le tutoriel comporte 11 parties auxquelles vous pouvez accéder par le plan dans la partie droite de la page, ou bien via le <a href="plan_detaille.php">plan détaillé</a>.</p>
					<p>Chaque partie peut être réalisée indépendamment des autres ; cependant, la progression présentée suit un ordre logique.</p>
					<p>Si vous recherchez une notion précise, utilisez <a href="index_az.php">l'index</a>.</p>
								
				<h3>Mode d'emploi</h3>
					<h4>Manipulation</h4>
						<p>Tout au long du tutoriel, les parties décrivant des manipulations à effectuer dans QGIS sont différenciées par une bordure bleue et un fond bleu-gris :</p>
						<p class="manip"> Ceci décrit une manipulation à effectuer dans QGIS.</p>
						<p>Les données nécessaires pour effectuer ces manipulations sont accessibles dans la rubrique <a href="telechargement.php" >téléchargement</a>.</p>
					<h4>Aide</h4>
						<p>Quand une partie du texte apparaît soulignée en pointillés en bleu foncé, si vous passez la souris dessus, une image apparaît pour vous aider par exemple à trouver l'emplacement d'un menu ou d'un bouton dans QGIS.</p>
						<p class="manip">Sauvegardez votre projet sous un nouveau nom : 
							<a class="thumbnail_top" href="#thumb">Menu Projet &#8594; Enregistrer sous...
								<span>
									<img src="illustrations/1_4_sauvegarder_projet_sous.jpg" alt="Menu Projet, sauvegarder sous" height="350" >
								</span>
							</a>
						</p>
					<h4>Question/réponse</h4>
						<p>Des questions vous seront posées tout au long du tutoriel ; les réponses sont visibles en cliquant sur le petit triangle devant la question.</p>
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Pourquoi Jimi Hendrix connaît-il tous les symboles des cartes ?</label></p>
								<p class="reponse">Parce-que c'est une légende !</p>
							</div>
					<h4>Liens</h4>
						<p>Les liens internes au <a href="en_savoir_plus.php" >tutoriel</a> sont affichés en bleu, les <a class="ext" target="_blank" href="http://fr.wikipedia.org/wiki/Liens">liens</a> externes sont en gris et s'ouvriront dans une nouvelle fenêtre ou onglet.</p>
						
				    <a class="suiv" href="01_00_prise_en_main.php" >C'est parti !</a>
		
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux.inc.php'); ?>
		</div>	
		
		<div id="notforprint" style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>



</div>
</body>
</html>
