<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="css/ajouter_produit.css">
  </head>
  <body>
    <?php
    include('check_session.php');
    include('check_admin.php');
    include('bdd_connexion.php');

    function handleFile($file) {
      $pathFile = 'css/images/' . basename($file["name"]);
      if (move_uploaded_file($file["tmp_name"], $pathFile))
        echo 'file_downloaded';
      else
        echo 'error while downloading';
      return $pathFile;
    }

    if (isset($_POST['submit']) and $_POST['submit'] == 'Valider') {
      if (isset($_FILES["image_1"], $_FILES["image_2"], $_FILES["image_3"])) {
        $image_1 = handleFile($_FILES["image_1"]);
        $image_2 = handleFile($_FILES["image_2"]);
        $image_3 = handleFile($_FILES["image_3"]);
      }

      $req = $bdd->prepare('INSERT INTO produits (nom, prix, rayon, categorie, attribut,
      marque, images, images_2, images_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

      $req->execute(array($_POST['nom'], $_POST['prix'], $_POST['rayon'], $_POST['categorie'],
                          $_POST['attribut'], $_POST['marque'], $image_1, $image_2, $image_3));
    }
    ?>
    <form enctype="multipart/form-data" class="produit" action="ajouter_produit.php" method="post">
      <label>Nom : <input type="text" name="nom" value=""></label>
      <label>Prix : <input type="text" name="prix" value=""></label>
      <label>Rayon :
        <select name="rayon">
          <option value="Audiovisuel">Audiovisuel</option>
          <option value="Informatique">Informatique</option>
          <option value="Objets connectes">Objets connectés</option>
        </select>
      </label>
      <label>Catégorie :
        <select name="categorie">
          <option value="Photo">Appareil Photo</option>
          <option value="Camera">Camera</option>
          <option value="Enceinte">Enceinte</option>
          <option value="Ordinateur">Ordinateur</option>
          <option value="Périphérique">Périphérique</option>
          <option value="Pièce">Pièce</option>
          <option value="Maison">Maison</option>
          <option value="Sport">Sport</option>
        </select>
      </label>
      <label>Attribut : <input type="text" name="attribut" value=""></label>
      <label>Marque : <input type="text" name="marque" value=""></label>
      <label>Miniature 1 : <input type="file" accept="image/png, image/jpeg" name="image_1" value=""></label>
      <label>Miniature 2 : <input type="file" accept="image/png, image/jpeg" name="image_2" value=""></label>
      <label>Miniature 3 : <input type="file" accept="image/png, image/jpeg" name="image_3" value=""></label>
      <input type="submit" id="valider" name="submit" value="Valider">
    </form>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('select').css('width', parseInt($('input').eq(6).css('width')) + 8 + 'px');
    $('input').css('width', parseInt($('input').eq(6).css('width')));
  </script>
</html>
