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
    include('bdd_connexion.php');
    ?>

    <main>
    <?php
    $req = $bdd->query('SELECT * FROM depot_produits');

    while ($data = $req->fetch()) {
      echo '
      <form class="produit" action="admin_submit_depot.php" method="post">
        <label>ID : <input type="text" name="id" readonly value="' . $data['ID'] . '"></label>
        <label>Nom : <input type="text" name="nom" readonly value="' . $data['nom'] . '"></label>
        <label>Prix : <input type="text" name="prix" readonly value="' . $data['prix'] . '"></label>
        <label>Rayon : <input type="text" name="rayon" readonly value="' . $data['rayon'] . '"></label>
        <label>Catégorie : <input type="text" name="categorie" readonly value="' . $data['categorie'] . '"></label>
        <label>Attribut : <input type="text" name="attribut" readonly value="' . $data['attribut'] . '"></label>
        <label>Marque : <input type="text" name="marque" readonly value="' . $data['marque'] . '"></label>
        <label>Miniature 1 : <input type="text" name="image_1" readonly value="' . $data['images'] . '"></label>
        <label>Miniature 2 : <input type="text" name="image_2" readonly value="' . $data['images_2'] . '"></label>
        <label>Miniature 3 : <input type="text" name="image_3" readonly value="' . $data['images_3'] . '"></label>
        <div class="submit">
          <input type="submit" id="ajouter" name="submit" value="Ajouter">
          <input type="submit" id="rejeter" name="submit" value="Rejeter">
        </div>
      </form>
      ';
    }
    ?>
    </main>
  </body>
</html>
