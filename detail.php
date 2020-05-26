<?php
require_once('bdd_connexion.php');
session_start();

if (isset($_GET['id']) or isset($_GET['id_produit'])) {
    if (isset($_GET['id_produit']))
        $_GET['id'] = $_GET['id_produit'];
    $req = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
    $req->execute(array($_GET['id']));
    $data = $req->fetch();
}

if (isset($_GET['id_produit']) && isset($_SESSION['id']) && $_SESSION['id'] != 0) {
    $req = $bdd->prepare('INSERT INTO panier (id_panier, id_produit) VALUES (?, ?)');
    $req->execute(array($_SESSION['id'], $_GET['id_produit']));
    header('Location: index.php');
}
else if (isset($_GET['id_produit']) && (isset($_SESSION['id']) == false or $_SESSION['id'] == 0))
    header('Location: connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/detail.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php
    if (isset($_SESSION['id']) == false or $_SESSION['id'] == 0)
        include('header.php');
    else
        include('header_co.php');
    ?>
    <div id="produit">
        <div id="img_title">
            <img src="<?php echo $data['images']; ?>" >
            <h2><?php echo $data['nom']; ?></h2>
        </div>
        <div id="lien">
            <p><?php echo $data['prix']; ?>€</p>
            <a href="?id_produit=<?php echo $data["id"]; ?>" id="ajouter">Ajouter au panier</a>
            <a href="payment.php" id="buy">Acheter</a>
        </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
</body>
</html>
