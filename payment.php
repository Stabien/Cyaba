<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <link rel = "stylesheet" style = "text/css" href = "css/mydeco.css">
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
?>

<form action="" autocomplete="on" method="POST">
    <fieldset>
        <legend>Paiement</legend>
        <label></label>
        <input class = "Encadrer" type = "radio" name = "tcard"><img src = "css/images/Mastercard_logo.png" alt = "MasterCard" width = "70px">
        <input class = "Encadrer" type = "radio" name = "tcard"><img src = "css/images/Visa2.png" alt = "Visa" width = "70px">
        <input class = "Encadrer" type = "radio" name = "tcard"><img src = "css/images/PP.png" alt = "PayPal" width = "70px">
        <label class = "label">Numéro de Carte</label>
        <input class = "input" type = "text" name = "numero" placeholder = "1111-2222-3333" maxlength="12"
        pattern = "[0-9]{12}" required>
        <label class = "label">Nom du proprietaire</label>
        <input class = "input" type = "text" name = "nom" placeholder = "Jean Dupont" maxlength = "20" minlength = "2"
        pattern="[A-Za-z].{4,}" required>
        <label class = "label">Date d'expiration</label></br>
        <input class = "input" type = "date" name = "expiration" class = "resizedTxtbox"
        value = "01/01/2020" min = "01/01/2020" max = "01/01/2025" required></br>
        <label class = "label">CVV</label>
        <input class = "input" type = "text" class = "CVVtxtbox" name = "cvv"
        placeholder = "123" maxlength = "3" pattern = "[0-9].{2}" required>
        <input type = "submit" value ="Enregistrer" id = Sub name="submit">
    </fieldset>
</form>

</body>
</html>
