<head>
	<link rel="stylesheet" href="css/header.css"/>
</head>
<header>
	<form id="research" action="research.php" method="POST">
		<h1 id="title-admin">Administration</h1>
	</form>
	<nav>
		<ul>
			<li><a href="depot_produits.php">Dépôt de produits</a></li>
			<li><a href="admin_bdd.php">Base de données</a></li>
			<li><a href="deconnexion.php">Déconnexion</a></li>
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
