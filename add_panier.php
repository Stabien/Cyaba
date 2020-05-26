<?php
if (isset($_GET['id']) && isset($_SESSION['id']) && $_SESSION['id'] != 0) {
    $req = $bdd->prepare('INSERT INTO panier (id_panier, id_produit) VALUES (?, ?)');
    $req->execute(array($_SESSION['id'], $_GET['id']));
}
?>
