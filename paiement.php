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
if (isset($_SESSION['id']) == false or $_SESSION['id'] == null)
  header('Location: connexion.php');

if (isset($_POST['submit']) && isset($_GET['id_user'])) {
  $req = $bdd->prepare('DELETE FROM panier WHERE id_panier = ?');
  $req->execute(array($_GET['id_user']));
  header('Location: index.php');
}

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
?>
  <form id="form_paiement" action="" autocomplete="on" method="POST">
    <h1>Livraison</h1>
    <label>Adresse de livraison</label>
    <input type="text" id="adresse" name="adresse" placeholder="Ex: 10 avenue de Meudon" required>
    <label>Ville</label>
    <input type="text" id="ville" name="ville" placeholder="Ex: Paris" required>
    <label>Code postal</label>
    <input type="text" name="postal" class="resizedTxtbox" placeholder="Ex: 75000" required>
    <label>Téléphone</label>
    <input type="text" minlength="10" name="telephone" required placeholder="Ex: 0612345678" >
    <h1>Paiement</h1>
    <label>Nom du propriétaire</label>
    <input type="text" id="nom" name="nom" minlength="2" placeholder="Ex: Jean Dupont" pattern="[A-Za-z].{4,}" required>
    <label>Numéro de carte</label>
    <input type="text" id="numero "name="numero" maxlength="16" pattern="[0-9]{16}" placeholder="Ex: 1111222233334444" required>
    <label>Date d'expiration</label>
    <input name="expiration" pattern="(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})" class="resizedTxtbox" placeholder="Ex: 01/02" required>
    <label>CVV</label>
    <input type="text" name="cvv" maxlength="3" pattern="[0-9].{2}" placeholder="Ex: 123" required>
    <span>Total à payer : <?php if (isset($totalCost)) echo $totalCost; ?> €</span>
    <input type="submit" value="Payer ma commande" id="Sub" name="submit">
  </form>
</body>
</html>
