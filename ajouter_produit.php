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
    ?>
    <form class="produit" action="admin_submit_bdd.php" onsubmit="" method="post">
      <label>ID : <input type="text" name="id" value=""></label>
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
      <label>Miniature 1 : <input type="text" name="image_1" value=""></label>
      <label>Miniature 2 : <input type="text" name="image_2" value=""></label>
      <label>Miniature 3 : <input type="text" name="image_3" value=""></label>
      <input type="submit" id="valider" name="submit" value="Valider">
    </form>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    const inputWidth = parseInt($('input').eq(0).css('width')) + 8 + 'px';
    $('select').css('width', inputWidth);
  </script>
</html>
