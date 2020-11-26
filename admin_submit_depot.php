<?php
if (isset($_POST['submit'])) {
  include('bdd_connexion.php');

  if ($_POST['submit'] == 'Ajouter') {
    $req = $bdd->prepare('INSERT INTO produits (nom, prix, rayon, categorie, attribut,
    marque, images, images_2, images_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

    $req->execute(array($_POST['nom'], $_POST['prix'], $_POST['rayon'], $_POST['categorie'], $_POST['attribut'],
                        $_POST['marque'], $_POST['image_1'], $_POST['image_2'], $_POST['image_3']));
    $bdd->query('DELETE FROM depot_produits WHERE ID = ' . $_POST['id'] . '');
    header('Location: depot_produits.php');
  }
  if ($_POST['submit'] == 'Rejeter') {
    $bdd->query('DELETE FROM depot_produits WHERE ID = ' . $_POST['id'] . '');
    header('Location: depot_produits.php');
  }
}
?>
