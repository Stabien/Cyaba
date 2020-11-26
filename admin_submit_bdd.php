<?php
if (isset($_POST['submit'])) {
  include('bdd_connexion.php');

  if ($_POST['submit'] == 'Modifier') {
    $req = $bdd->prepare('UPDATE produits SET nom = ?, prix = ?, rayon = ?, categorie = ?, attribut = ?,
    marque = ?, images = ?, images_2 = ?, images_3 = ? WHERE id = ' . $_POST['id'] . '');

    $req->execute(array($_POST['nom'], $_POST['prix'], $_POST['rayon'], $_POST['categorie'], $_POST['attribut'],
                        $_POST['marque'], $_POST['image_1'], $_POST['image_2'], $_POST['image_3']));
    header('Location: admin_bdd.php');
  }
  if ($_POST['submit'] == 'Supprimer') {
    $bdd->query('DELETE FROM produits WHERE id = ' . $_POST['id'] . '');
    header('Location: admin_bdd.php');
  }
}
?>
