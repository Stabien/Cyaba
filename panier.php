<?php
require_once('bdd_connexion.php');
session_start();

if (isset($_SESSION['id'])) {
    $id = (int) filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
    $req = $bdd->prepare('SELECT * FROM panier WHERE id_panier = ?');
    $req->execute(array($id));
}
if (isset($_GET['delete'])) {
    $req_delete = $bdd->prepare('DELETE FROM panier WHERE id = ?');
    $req_delete->execute(array($_GET['delete']));
    header('Location: panier.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/panier.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php include('check_session.php'); ?>
    <?php include('check_user.php'); ?>

    <div id="produits_container">
    <?php
    if (isset($_SESSION['id'])) {
        while ($data_panier = $req->fetch()) {
            $req_produit = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
            $req_produit->execute(array($data_panier["id_produit"]));
            $data = $req_produit->fetch();
            echo '<div id="produits">
                <div href="#" id="img_container">
                    <a href="#"><img id="photo_produit" src="' . $data["images"] . '"></a>
                </div>
                <div id="name_container">
                    <a href="#">' . $data["nom"] .'</a>
                    <p>En stock</p>
                </div>
                <div id="right_infos">
                    <p>' . $data["prix"] . ' €</p>
                    <a id="delete" href="?delete=' . $data_panier["id"] .'">Supprimer du panier</a>
                </div>
            </div>';
            $display_button = true;
        }
    }
    ?>
    </div>
    <?php
    if (isset($display_button)) {
      $id = (int) filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
      echo '<a id="paiement" href="payment.php?id_user='. $id .'">Payer le panier</a>';
    }
    else {
        echo '<h3>Le panier est vide</h3>';
    }
    ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
