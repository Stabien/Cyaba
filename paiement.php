<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <link rel="stylesheet" href="css/paiement.css">
  <meta name="viewport" content="width=1400, maximum-scale=1">
</head>
<body>
<?php
require_once('bdd_connexion.php');
session_start();
include('check_session.php');

function securityCheck() {
  if (isset($_SESSION['id']) == false or $_SESSION['id'] == null)
    header('Location: connexion.php');

  if ((!isset($_GET['id_user']) && !isset($_GET['id_produit'])) or
      isset($_GET['id_user'], $_GET['id_produit']))
    header('Location: index.php');

  if ((isset($_GET['id_user']) && is_numeric($_GET['id_user']) == false) or
      (isset($_GET['id_produit']) && is_numeric($_GET['id_produit']) == false))
    header('Location: index.php');
}

securityCheck();

if (isset($_GET['id_user'])) {
  $totalCost = 0;
  $reqProduits = $bdd->query('SELECT id_produit FROM panier WHERE id_panier = ' . $_GET['id_user'] . '');
  while ($dataPanier = $reqProduits->fetch()) {
    $reqPrice = $bdd->query('SELECT prix FROM produits WHERE id = ' . $dataPanier[0] . '');
    $totalCost += $reqPrice->fetch()[0];
  }
}

if (isset($_GET['id_produit'])) {
  $reqProduit = $bdd->query('SELECT prix FROM produits WHERE id = ' . $_GET['id_produit'] . '');
  $totalCost = $reqProduit->fetch()[0];
}

if (isset($_POST['submit_commande'])) {
  securityCheck();

  $id_user = (int) filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
  $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $key = "";

  for ($i = 0; $i < 15; $i++) {
    $random = rand(0, 61);
    $key .= $characters[$random];
  }

  $reqInsertInfos = $bdd->prepare('INSERT INTO commandes (id_commande, id_user,
  adresse, ville, code_postal, telephone, nom_cb, num_cb, expiration_cb, cvv_cb)
  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

  $reqInsertInfos->execute(array($key, $id_user, $_POST['adresse'], $_POST['ville'], $_POST['code_postal'],
  $_POST['telephone'], $_POST['nom_cb'], $_POST['num_cb'], $_POST['expiration_cb'], $_POST['cvv_cb']));

  if (isset($_GET['id_user'])) {
    $reqPanier = $bdd->query('SELECT id_produit FROM panier WHERE id_panier = ' . $id_user . '');

    while($dataPanier = $reqPanier->fetch()) {
      $reqInsertProduits = $bdd->prepare('INSERT INTO commande_produits (id_commande, id_produit) VALUES(?, ?)');
      $reqInsertProduits->execute(array($key, $dataPanier[0]));
    }
    $reqDelete = $bdd->prepare('DELETE FROM panier WHERE id_panier = ?');
    $reqDelete->execute(array($_GET['id_user']));
  }
  if (isset($_GET['id_produit'])) {
    $reqInsertSingle = $bdd->prepare('INSERT INTO commande_produits (id_commande, id_produit) VALUES(?, ?)');
    $reqInsertSingle->execute(array($key, $_GET['id_produit']));
  }
  header('Location: commande_success.php');
}
?>
  <form id="form_paiement" action="" autocomplete="on" method="POST">
    <h1>Livraison</h1>
    <label>Adresse de livraison</label>
    <input type="text" name="adresse" placeholder="Ex: 10 avenue de Meudon" required>
    <label>Ville</label>
    <input type="text" name="ville" placeholder="Ex: Paris" required>
    <label>Code postal</label>
    <input type="text" name="code_postal" class="resizedTxtbox" placeholder="Ex: 75000" required>
    <label>Téléphone</label>
    <input type="text" maxlength="12" name="telephone" pattern="(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})" required placeholder="Ex: 0612345678" >
    <h1>Paiement</h1>
    <label>Nom du propriétaire</label>
    <input type="text" name="nom_cb" minlength="2" placeholder="Ex: Jean Dupont" pattern="[A-Za-z].{4,}" required>
    <label>Numéro de carte</label>
    <input type="text" name="num_cb" maxlength="16" pattern="[0-9]{16}" placeholder="Ex: 1111222233334444" required>
    <label>Date d'expiration</label>
    <input name="expiration_cb" pattern="(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})" class="resizedTxtbox" placeholder="Ex: 01/02" required>
    <label>CVV</label>
    <input type="text" name="cvv_cb" maxlength="3" pattern="[0-9].{2}" placeholder="Ex: 123" required>
    <span>Total à payer : <?php if (isset($totalCost)) echo $totalCost; ?> €</span>
    <input type="submit" value="Valider ma commande" id="Sub" name="submit_commande">
  </form>
</body>
</html>
