<!DOCTYPE html>
<?php
require_once('bdd_connexion.php');
include('check_session.php');
include('check_user.php');
?>

<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="css/mon_compte.css" />
  <title>Info Utilisateur</title>
</head>

<body>
  <?php
    $id = (int) filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
    $req = $bdd->query('SELECT * FROM users WHERE id ='. $id . '');
    $data = $req->fetch();

    if (isset($_POST['submit']) && $_POST['submit'] == "Modifier mes informations") {
      $update_infos = $bdd->prepare('UPDATE users SET Nom = ?, Prenom = ?, Mail = ?, Nom_utilisateur = ?, Mot_de_passe = ? WHERE ID = '. $id . '');
      $update_infos->execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['Mail'], $_POST['Nom_utilisateur'], $_POST['Mot_de_passe']));
      Header('Location: mon_compte.php');
    }
  ?>
  <h1 class="hr">Mon compte</h1>
  <form id="user_infos" action="#" method="post" onsubmit="return check_fields()">
    <input type="text" name="Nom" id="nom" placeholder="Nom" value="<?php echo $data['Nom']; ?>">
    <p id="erreur_nom">Nom Incorrect</p>
    <input type="text" name="Prenom" id="prenom" placeholder="Prenom" value="<?php echo $data['Prenom']; ?>">
    <p id="erreur_prenom">Prenom Incorrect</p>
    <input type="text" name="Nom_utilisateur" id="nom_utilisateur" placeholder="Nom d'utilisateur" value="<?php echo $data['Nom_utilisateur']; ?>">
    <p id="erreur_nom">Nom d'utilisateur incorrect</p>
    <input type="text" name="Mail" id="mail" placeholder="Email" value="<?php echo $data['Mail']; ?>">
    <p id="erreur_mail">Mail Incorrect</p>
    <input type="password" name="Mot_de_passe" id="motdepasse" placeholder="Mot de passe" value="<?php echo $data['Mot_de_passe']; ?>">
    <p id="erreur_mdp">Mot de passe Incorrect</p>
    <br>
    <input type="password" name="Confirmation_Mot_de_passe" id="Conf_motdepasse" placeholder="Confirmer le mot de passe" value="<?php echo $data['Mot_de_passe']; ?>">
    <p id="erreur_confmdp">Les mots de passe ne sont pas identique</p>
    <input type="submit" id="submit" name="submit" value="Modifier mes informations">
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/placeholder.js"></script>
  <script>
    const check_fields = () => {
      $('p').css('display', 'none');
      const regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
      for (let i = 0; i < $('input').length - 1; i++)
        if ($('#user_infos input').eq(i).val().length < 3) {
          $('p').eq(i).css('display', 'block');
          return false;
        }
      if (!regex.test($('#mail')).val())
        return false;
    }
  </script>
</body>
</html>
