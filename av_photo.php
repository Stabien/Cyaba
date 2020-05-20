<?php
require_once('bdd_connexion.php');
require_once('filtres.php');
require_once('get_produits.php')
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
				<?php filtres_attribut('Photo', $bdd); ?>
			</div>
			<div class="filtres_cat_container">
				<h5 id="price_title">Prix &nbsp;(€)</h5>
				<?php filtres_prix('Photo', $bdd); ?>
			</div>
			<div class="filtres_cat_container">
				<h5>Marques</h5>
				<?php filtres_marque('Photo', $bdd); ?>
			</div>
		</form>
		<div id="produits_container">
			<?php
				if(isset($_POST['marque']))
					get_produits('Photo', $bdd);
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
	<script>
	function sendData() {
		var all_marque = $('.marque');
		var all_attribut = $('.attribut');
		var prix = $('#range').val();
		var marque = [];
		var attribut = [];

		for (i = 0; i < $('.marque').length; i++) {
			if (all_marque[i].checked)
				marque.push(all_marque[i].value);
		}
		for (i = 0; i < $('.attribut').length; i++) {
			if (all_attribut[i].checked)
			attribut.push(all_attribut[i].value);
		}

		$.get(
			'av_photo.php',
		 	{
				marque: marque,
				attribut: attribut,
				prix: prix
			}
		);
		console.log(marque);
		console.log(attribut);
		console.log(prix);
	}
	</script>
</body>
</html>
