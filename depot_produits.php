<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/depot_produits.css">
    <title></title>
  </head>
  <body>
    <?php
    include('check_session.php');
    include('check_admin.php');
    ?>
    <form class="produit" action="index.html" method="post">
      <label>Nom : <input type="text" readonly value=""></label>
      <label>Prix : <input type="text" readonly value=""></label>
      <label>Rayon : <input type="text" readonly value=""></label>
      <label>Catégorie : <input type="text" readonly value=""></label>
      <label>Attribut : <input type="text" readonly value=""></label>
      <label>Marque : <input type="text" readonly value=""></label>
      <label>Miniature 1 : <input type="text" readonly value=""></label>
      <label>Miniature 2 : <input type="text" readonly value=""></label>
      <label>Miniature 3 : <input type="text" readonly value=""></label>
      <div class="submit">
        <input type="submit" name="accepter" value="Accepter">
        <input type="submit" name="refuser" value="Refuser">
      </div>
    </form>
  </body>
</html>
