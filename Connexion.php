<?php
require_once('bdd_connexion.php');

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != -1)
    header('index.php');
if (isset($_POST['Nom_utilisateur'], $_POST['Mot_de_passe'])) {
    $check_login = $bdd->prepare('SELECT COUNT(*) AS nb FROM users WHERE Nom_utilisateur = ? AND Mot_de_passe = ?');
    $check_login->execute(array(htmlspecialchars($_POST['Nom_utilisateur']),htmlspecialchars($_POST['Mot_de_passe'])));
    $row = $check_login->fetch();
    if ($row['nb'] != 0) {
        $get_id = $bdd->prepare('SELECT ID FROM users WHERE Nom_utilisateur = ? AND Mot_de_passe = ?');
        $get_id->execute(array(htmlspecialchars($_POST['Nom_utilisateur']), htmlspecialchars($_POST['Mot_de_passe'])));
        session_start();
        $_SESSION['id'] = $get_id->fetch()[0];
        header('Location: index.php');
    }
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/Connexion.css"/>
    <title>Connexion</title>
</head>
<body>
    <?php include('header.php'); ?>
    <form action="" method="post" id="Inscription" onsubmit="return check_user_infos()">
        <fieldset>
            <legend>Connexion</legend>
            <div id="Encadrer">
                <input class="input" name="Nom_utilisateur" type="text" placeholder="Nom d'utilisateur" id="para">
                <input class="input" name="Mot_de_passe" type='password' placeholder="Mot de passe" id="para">
                <button type='submit' name="Envoie" id="Sub">Se connecter</button>
                <a href="Inscription.php" id="ins">Créez un compte</a>
                <?php
                if (isset($_POST['Nom_utilisateur'], $_POST['Mot_de_passe'])) {
                    if ($row['nb'] != 1)
                        echo "<span id='fail_login'>Mauvais nom d'utilisateur et/ou mot de passe</span>";
                    }
                else
                    echo '<br><br>';
                ?>
            </div>
        </fieldset>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/placeholder.js"></script>
    <script src="js/login_check_fields.js"></script>
</body>

</html>
