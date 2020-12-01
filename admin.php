<?php
require_once('bdd_connexion.php');

if (isset($_POST['username'], $_POST['password'])) {
    $check_login = $bdd->prepare('SELECT COUNT(*) AS nb FROM admins WHERE username = ? AND password = ?');
    $check_login->execute(array(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password'])));
    $row = $check_login->fetch();
    if ($row['nb'] != 0) {
        $get_id = $bdd->prepare('SELECT ID FROM admins WHERE username = ? AND password = ?');
        $get_id->execute(array(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password'])));
        session_start();
        $_SESSION['id'] = 'a' . strval($get_id->fetch()[0]);
        header('Location: admin_bdd.php');
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
  </head>
  <body>
    <form action="" method="post">
      <h2>Administration</h2>
      <span class="erreur">Nom d'utilisateur trop court</span>
      <input type="text" name="username" placeholder="username">
      <span class="erreur">Mot de passe trop court</span>
      <input type="password" name="password" placeholder="password">
      <input type="submit" value="valider">
    </form>
    <script src="login_check_fields.js"></script>
  </body>
</html>
