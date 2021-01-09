<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/deposer_objet.css"/>
    <title>Inscription</title>
</head>

<body>
	<?php
  include('check_session.php');
  include('bdd_connexion.php');
  include('form_produit_verification.php');

  function handleFile($files) {
    $pathFile = 'css/images/' . basename($files['name']);
    $baseName = pathinfo($files['name'], PATHINFO_FILENAME);
    $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
    $i = 1;
    while(file_exists($pathFile)) {
        $fileName = (string) $baseName . ' (' . $i . ').';
        $completeFileName = $fileName . $extension;
        $pathFile = 'css/images/' . basename($completeFileName);
        $i++;
    }
    if (move_uploaded_file($files['tmp_name'], $pathFile))
      echo $pathFile;
    else
      return false;
    return $pathFile;
  }
  if (isset($_POST['submit']) and $_POST['submit'] == 'Valider') {
    if (isset($_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'])) {
      // Check if input are corrects
      if (verification($_POST, $_FILES) == false)
        return false;
      // Download files in specific folder
      $image_1 = handleFile($_FILES['image_1']);
      $image_2 = handleFile($_FILES['image_2']);
      $image_3 = handleFile($_FILES['image_3']);
      // Check if file exist and is downloaded
      if ($image_1 == false or $image_2 == false or $image_3 == false)
        return false;
    }
    $req = $bdd->prepare('INSERT INTO depot_produits (nom, prix, rayon, categorie, attribut,
    marque, images, images_2, images_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $req->execute(array($_POST['nom'], $_POST['prix'], $_POST['rayon'], $_POST['categorie'],
                        $_POST['attribut'], $_POST['marque'], $image_1, $image_2, $image_3));
  }
  ?>
  <form enctype="multipart/form-data" onsubmit="return checkInput()" class="produit" action="deposer_objet.php" method="post">
    <label>Nom : <input type="text" name="nom" value=""></label>
    <span>Veuillez rentrer un nom valide</span>
    <label>Prix : <input type="text" name="prix" value=""></label>
    <span>Veuillez rentrer un prix valide</span>
    <label>Rayon :
      <select id="select-rayon" name="rayon">
        <option value="Audiovisuel">Audiovisuel</option>
        <option value="Informatique">Informatique</option>
        <option value="Objets connectes">Objets connectés</option>
      </select>
    </label>
    <label>Catégorie :
      <select id="select-categorie" name="categorie">
        <option value="Photo">Appareil Photo</option>
        <option value="Camera">Camera</option>
        <option value="Enceinte">Enceinte</option>
        <option value="Ordinateur" style="display: none">Ordinateur</option>
        <option value="Périphérique" style="display: none">Périphérique</option>
        <option value="Pièce" style="display: none">Pièce</option>
        <option value="Maison" style="display: none">Maison</option>
        <option value="Sport" style="display: none">Sport</option>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    // Define width for all fields
    $('select').css('width', parseInt($('input').eq(6).css('width')) + 8 + 'px');
    $('.produit input').css('width', parseInt($('input').eq(6).css('width')));
    // Change available categorie values depending on rayon value selected
    $('#select-rayon').on('change', () => {
      // Reset display for all options
      for (let i = 0; i < 8; i++) {
        $('#select-categorie option:eq(' + i + ')').css('display', 'none');
      }
      switch ($('#select-rayon option:selected').val()) {
        case "Audiovisuel":
          // Displays only options 1, 2 and 3
          for (let i = 0; i < 3; i++)
            $('#select-categorie option:eq(' + i + ')').css('display', 'block');
          // Change select to the first element of the categorie chosen
          $('#select-categorie option:eq(0)').prop('selected', 'selected');
          break;
        case "Informatique":
          // Displays only options 4, 5 and 6
          for (let i = 3; i < 6; i++)
            $('#select-categorie option:eq(' + i + ')').css('display', 'block');
          // Change select to the first element of the categorie chosen
          $('#select-categorie option:eq(3)').prop('selected', 'selected');
          break;
        case "Objets connectes":
          // Displays only options 7 and 8
          for (let i = 6; i < 8; i++)
            $('#select-categorie option:eq(' + i + ')').css('display', 'block');
          // Change select to the first element of the categorie chosen
          $('#select-categorie option:eq(6)').prop('selected', 'selected');
          break;
      }
    });
    // Check input values before submit
    const checkInput = () => {
      for (let i = 2; i < $('input').length - 1; i++) {
        if ($('input').eq(i).val().length < 2 && i != 3) {
          $('span').css('display', 'none');
          $('span').eq(i - 2).css('display', 'block');
          return false;
        }
        else if (i == 3) {
          if ($.isNumeric($('input').eq(i).val()) == false) {
            $('span').css('display', 'none');
            $('span').eq(i - 2).css('display', 'block');
            return false;
          }
          else if ($('input').eq(i).val() < 0) {
            $('span').css('display', 'none');
            $('span').eq(i - 2).css('display', 'block');
            return false;
          }
        }
      }
    }
  </script>
</body>
</html>
