<?php
require_once('bdd_connexion.php');

if (isset($_GET['id'])) {
    $req = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
    $req->execute(array($_GET['id']));
    $data = $req->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/detail.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php include('header.php'); ?>
    <div id="produit">
        <div id="img_title">
            <img src="<?php echo $data['images']; ?>" >
            <h2><?php echo $data['nom']; ?></h2>
        </div>
        <div id="lien">
            <p><?php echo $data['prix']; ?>€</p>
            <a href="#" id="ajouter">Ajouter au panier</a>
            <a href="#" id="buy">Acheter</a>
        </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
</body>
</html>
