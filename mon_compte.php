<!DOCTYPE html>
<?php
require_once('bdd_connexion.php');
include('check_session.php');
include('check_user.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/mon_compte.css" />
  <title>Cyaba</title>
</head>
<body>
  <?php
    $id = (int) filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
    $req = $bdd->query('SELECT * FROM users WHERE id ='. $id . '');
    $data = $req->fetch();

    if (isset($_POST['submit']) && $_POST['submit'] == "Modifier mes informations") {
      $update_infos = $bdd->prepare('UPDATE users SET Nom = ?, Prenom = ?, Mail = ?, Nom_utilisateur = ?, Mot_de_passe = ? WHERE ID = '. $id . '');
      $update_infos->execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['Mail'], $_POST['Nom_utilisateur'], $_POST['Mot_de_passe']));
      header('Location: mon_compte.php');
    }
  ?>
  <h1 class="hr">Mon compte</h1>
  <form id="user_infos" action="#" method="post" onsubmit="return check_fields()">
    <label for="nom">Nom</label>
    <input type="text" name="Nom" id="nom" value="<?php echo $data['Nom']; ?>">
    <p id="erreur_nom">Nom Incorrect</p>
    <label for="prenom">Prénom</label>
    <input type="text" name="Prenom" id="prenom" value="<?php echo $data['Prenom']; ?>">
    <p id="erreur_prenom">Prenom Incorrect</p>
    <label for="nom_utilisateur">Nom d'utilisateur</label>
    <input type="text" name="Nom_utilisateur" id="nom_utilisateur" value="<?php echo $data['Nom_utilisateur']; ?>">
    <p id="erreur_nom">Nom d'utilisateur incorrect</p>
    <label for="mail">Adresse email</label>
    <input type="text" name="Mail" id="mail"value="<?php echo $data['Mail']; ?>">
    <p id="erreur_mail">Mail Incorrect</p>
    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" name="Mot_de_passe" id="mot_de_passe" value="<?php echo $data['Mot_de_passe']; ?>">
    <p id="erreur_mdp">Mot de passe Incorrect</p>
    <label for="conf_mdp">Confirmation de mot de passe</label>
    <input type="password" name="Confirmation_Mot_de_passe" id="conf_mdp" value="<?php echo $data['Mot_de_passe']; ?>">
    <p id="erreur_confmdp">Les mots de passe ne sont pas identique</p>
    <input type="submit" id="submit" name="submit" value="Modifier mes informations">
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/placeholder.js"></script>
  <script>
    const check_fields = () => {
      $('p').css('display', 'none');
      const regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
      for (let i = 0; i < $('#user_infos input').length - 1; i++) {
        if ($('#user_infos input').eq(i).val().length < 3) {
          $('p').eq(i).css('display', 'block');
          return false;
        }
      }
      if (regex.test($('#mail').val()) == false)
        return false;
      if ($('#mot_de_passe').val() != $('#conf_mdp').val()) {
        $('#erreur_confmdp').css('display', 'block');
        return false;
      }
      alert('Modifications enregistrées');
    }
  </script>
</body>
</html>
