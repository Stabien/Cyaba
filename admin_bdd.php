<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de données</title>
    <link rel="stylesheet" href="css/bdd.css">
  </head>
  <body>
    <?php
    include('check_admin.php');
    include('header_admin.php');
    include('bdd_connexion.php');
    ?>

    <main>
    <?php
    $req = $bdd->query('SELECT * FROM produits');

    while ($data = $req->fetch()) {
      echo '
      <form class="produit" action="admin_submit_bdd.php" onsubmit="return confirmation()" method="post">
        <label>ID : <input type="text" name="id" value="' . $data['id'] . '"></label>
        <label>Nom : <input type="text" name="nom" value="' . $data['nom'] . '"></label>
        <label>Prix : <input type="text" name="prix" value="' . $data['prix'] . '"></label>
        <label>Rayon : <input type="text" name="rayon" value="' . $data['rayon'] . '"></label>
        <label>Catégorie : <input type="text" name="categorie" value="' . $data['categorie'] . '"></label>
        <label>Attribut : <input type="text" name="attribut" value="' . $data['attribut'] . '"></label>
        <label>Marque : <input type="text" name="marque" value="' . $data['marque'] . '"></label>
        <label>Miniature 1 : <input type="text" name="image_1" value="' . $data['images'] . '"></label>
        <label>Miniature 2 : <input type="text" name="image_2" value="' . $data['images_2'] . '"></label>
        <label>Miniature 3 : <input type="text" name="image_3" value="' . $data['images_3'] . '"></label>
        <div class="submit">
          <input type="submit" class="modifier" onclick="buttonName =\'modifier\'" name="submit" value="Modifier">
          <input type="submit" class="supprimer" onclick="buttonName =\'supprimer\'" name="submit" value="Supprimer">
        </div>
      </form>
      ';
    }
    ?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      let buttonName;
      const confirmation = () => {
        return confirm('Êtes-vous sûr de vouloir ' + buttonName + ' ce produit ?');
        return choice;
      }
    </script>
  </body>
</html>
