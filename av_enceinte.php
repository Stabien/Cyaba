<?php
require_once('bdd_connexion.php');
require_once('filtres.php');
require_once('get_produits.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/audiovisuel.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php include('header.php'); ?>
	<div id="global_container">
		<form id="filtres" method="POST" action="">
			<h2>Filtrer</h2>
			<div class="filtres_cat_container">
				<h5>Type de produit</h5>
				<?php filtres_attribut('Enceinte', $bdd, $_POST); ?>
			</div>
			<div class="filtres_cat_container">
				<h5 id="price_title">Prix &nbsp;(€)</h5>
				<?php filtres_prix('Enceinte', $bdd, $_POST); ?>
			</div>
			<div class="filtres_cat_container">
				<h5>Marques</h5>
				<?php filtres_marque('Enceinte', $bdd, $_POST); ?>
			</div>
		</form>
		<div id="produits_container">
			<?php get_produits('Enceinte', $bdd, $_POST); ?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
</body>
</html>
