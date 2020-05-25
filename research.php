<?php
require_once('bdd_connexion.php');

if (isset($_POST['keyword']) && strlen($_POST['keyword']) > 0) {
    if (strlen($_POST['keyword']) != 1 or $_POST['keyword'][0] != ' ') {
        $req = $bdd->prepare('SELECT * FROM produits WHERE nom LIKE "%"?"%"');
        $req->execute(array($_POST['keyword']));
        $tmp = 1;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/research.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php include('header.php');
    if (isset($tmp)) {
        while ($data = $req->fetch()) {
            echo '
            <div id="produits">
                <div href="#" id="img_container">
                    <a href="detail.php?id='. $data["id"] .'"><img id="photo_produit" src="' . $data["images"] . '"></a>
                </div>
                <div id="name_container">
                    <a href="detail.php?id='. $data["id"] .'">' . $data["nom"] .'</a>
                    <p>En stock</p>
                </div>
                <div id="right_infos">
                    <p>' . $data["prix"] . ' €</p>
                    <a href="#">Ajouter au panier</a>
                </div>
            </div>';
        }
    }
    ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
</body>
</html>
