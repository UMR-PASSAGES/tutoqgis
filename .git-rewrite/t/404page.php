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
			<div id="h2Hori">Erreur 404</div>
	
			<h4>Nous sommes désolés, cette page n'existe pas.</h4>
				<p>Peut-être souhaitez-vous aller à la <a href="index.php" >page d'accueil</a> du tutoriel ?</p>
				<p>Vous pouvez également accéder directement aux différentes partie du tutoriel grâce aux menus situés dans la colonne de droite.</p>
			
			<h4>Savez-vous d'où vient le code d'erreur 404 ?</h4>
				<p>La légende attribue le numéro d’erreur 404 à l’anecdote selon laquelle au CERN, en Suisse, les chercheurs, excédés d’aller sans cesse relancer un ­serveur défaillant installé dans le bureau numéro 404, aient attribué ce numéro d’erreur au défaut de connexion en ­souvenir de cette pièce maudite (Source: <a href="http://fr.wikipedia.org/wiki/Erreur_HTTP_404">Wikipédia</a>).</p>
			
		</div>
		
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux.inc.php'); ?>
		</div>
		
		<div style="clear:both;"></div>
	
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
