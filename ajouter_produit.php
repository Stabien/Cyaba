<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="css/ajouter_produit.css">
  </head>
  <body>
    <?php
    include('check_admin.php');
    include('header_admin.php');
    include('bdd_connexion.php');
    include('form_produit_verification.php');

    $submit = true;

    function handleFile($file) {
      $pathFile = 'css/images/' . basename($file["name"]);
      if (move_uploaded_file($file["tmp_name"], $pathFile))
        echo 'file_downloaded';
      else
        return false;
      return $pathFile;
    }

    if (isset($_POST['submit']) and $_POST['submit'] == 'Valider') {
      if (isset($_FILES["image_1"], $_FILES["image_2"], $_FILES["image_3"])) {
        // Check if input are corrects
        if (verification($_POST, $_FILES) == false) {
          $submit = false;
          return false;
        }
        // Download files in specific folder
        $image_1 = handleFile($_FILES["image_1"]);
        $image_2 = handleFile($_FILES["image_2"]);
        $image_3 = handleFile($_FILES["image_3"]);
        // Check if file exist and is downloaded
        if ($image_1 == false or $image_2 == false or $image_3 == false) {
          $submit = false;
          return false;
        }
      }

      $req = $bdd->prepare('INSERT INTO produits (nom, prix, rayon, categorie, attribut,
      marque, images, images_2, images_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

      $req->execute(array($_POST['nom'], $_POST['prix'], $_POST['rayon'], $_POST['categorie'],
                          $_POST['attribut'], $_POST['marque'], $image_1, $image_2, $image_3));
    }
    ?>
    <form enctype="multipart/form-data" onsubmit="return checkInput()" class="produit" action="ajouter_produit.php" method="post">
      <label>Nom : <input type="text" name="nom" value=""></label>
      <span>Veuillez rentrer un nom valide</span>
      <label>Prix : <input type="text" name="prix" value=""></label>
      <span>Veuillez rentrer un prix valide</span>
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
      <span>Veuillez rentrer un attribut valide</span>
      <label>Marque : <input type="text" name="marque" value=""></label>
      <span>Veuillez rentrer une marque valide</span>
      <label>Miniature 1 : <input type="file" accept="image/png, image/jpeg" name="image_1" value=""></label>
      <span>Veuillez mettre une image</span>
      <label>Miniature 2 : <input type="file" accept="image/png, image/jpeg" name="image_2" value=""></label>
      <span>Veuillez mettre une image</span>
      <label>Miniature 3 : <input type="file" accept="image/png, image/jpeg" name="image_3" value=""></label>
      <span>Veuillez mettre une image</span>
      <input type="submit" id="valider" name="submit" value="Valider">
    </form>
    <?php if ($submit == false) echo '<span>erreur</span>'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('select').css('width', parseInt($('input').eq(6).css('width')) + 8 + 'px');
    $('input').css('width', parseInt($('input').eq(6).css('width')));

    const checkInput = () => {
      for (let i = 0; i < $('input').length - 1; i++) {
        if ($('input').eq(i).val().length < 2 && i != 1) {
          $('span').css('display', 'none');
          $('span').eq(i).css('display', 'block');
          return false;
        }
        else if (i == 1) {
          if ($.isNumeric($('input').eq(i).val()) == false) {
            $('span').css('display', 'none');
            $('span').eq(i).css('display', 'block');
            return false;
          }
          else if ($('input').eq(i).val() < 0) {
            $('span').css('display', 'none');
            $('span').eq(i).css('display', 'block');
            return false;
          }
        }
      }
    }
  </script>
</html>
