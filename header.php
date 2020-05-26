<head>
	<link rel="stylesheet" href="css/header.css"/>
</head>

<header>
	<form id="research" action="research.php" method="POST">
		<a id="title" href="index.php">CYABA</a>
		<input type="text" name="keyword" placeholder="Rechercher">
		<input type="image" src="css/images/loupe_b.png">
		<div class="template_icone">
			<a href="Connexion.php" class="right_header">
				<img id="connexion" src="css/images/account_color.png">
				Se connecter
			</a>
		</div>
		<div class="template_icone">
			<a href="connexion.php" class="right_header">
				<img id="panier" src="css/images/panier_color.png">
				Panier
			</a>
		</div>
	</form>
	<nav>
		<ul>
			<li><a href="#">Nos meilleures ventes</a></li>
			<li><a href="#">Nos promotions</a></li>
			<li class="mega_menu">
				<a href="#" id="audiovisuel">Audiovisuel</a>
				<ul id="menu_av">
					<li><a href="av_photo.php">Appareil photo</a></li>
					<li><a href="av_camera.php">Caméra</a></li>
					<li><a href="av_enceinte.php">Enceinte</a></li>
				</ul>
			</li>
			<li class="mega_menu">
				<a href="#" id="informatique">Informatique</a>
				<ul id="menu_info">
					<li><a href="info_ordinateur.php">Ordinateur</a></li>
					<li><a href="info_peripherique.php">Périphérique</a></li>
					<li><a href="info_piece.php">Pièce</a></li>
				</ul>
			</li>
			<li class="mega_menu">
				<a href="#" id="oc">Objets connectés</a>
				<ul id="menu_oc">
					<li><a href="oc_maison.php">Maison</a></li>
					<li><a href="oc_sport.php">Sport</a></li>
				</ul>
			</li>
			<li><a href="#">Nous contacter</a></li>
			<li><a href="#">A propos</a></li>
		</ul>
	</nav>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$('#audiovisuel').on('mouseover', function() {
		$('#menu_av').css('height', '120px');
	});
	$('#menu_av').on('mouseover', function() {
		$('#menu_av').css('height', '120px');
	});
	$('#audiovisuel').on('mouseout', function() {
		$('#menu_av').css('height', '0');
	});
	$('#menu_av').on('mouseout', function() {
		$('#menu_av').css('height', '0');
	});
	$('#informatique').on('mouseover', function() {
		$('#menu_info').css('height', '120px');
	});
	$('#menu_info').on('mouseover', function() {
		$('#menu_info').css('height', '120px');
	});
	$('#informatique').on('mouseout', function() {
		$('#menu_info').css('height', '0');
	});
	$('#menu_info').on('mouseout', function() {
		$('#menu_info').css('height', '0');
	});
	$('#oc').on('mouseover', function() {
		$('#menu_oc').css('height', '120px');
	});
	$('#menu_oc').on('mouseover', function() {
		$('#menu_oc').css('height', '120px');
	});
	$('#oc').on('mouseout', function() {
		$('#menu_oc').css('height', '0');
	});
	$('#menu_oc').on('mouseout', function() {
		$('#menu_oc').css('height', '0');
	});
</script>
