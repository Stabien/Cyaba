<?php
require_once('bdd_connexion.php');
if (isset($_POST['Nom'], $_POST['Prenom'], $_POST['Nom_utilisateur'], $_POST['Mail'], $_POST['Mot_de_passe'])) {
	$check_username = $bdd->query('SELECT Nom_utilisateur FROM users WHERE Nom_utilisateur="' . htmlspecialchars(strtolower($_POST['Nom_utilisateur'])) . '"');
	$check_email_address = $bdd->query('SELECT Mail FROM users WHERE Mail="' . htmlspecialchars(strtolower($_POST['Mail'])) . '"');
	if (!$check_username->fetch() && !$check_email_address->fetch()) {
		$req = $bdd->prepare('INSERT INTO users (Nom, Prenom, Nom_utilisateur, Mail, Mot_de_passe) VALUES(?, ?, ?, ?, ?)');
		$req->execute(array(htmlspecialchars($_POST['Nom']), htmlspecialchars($_POST['Prenom']), htmlspecialchars($_POST['Nom_utilisateur']), strtolower(htmlspecialchars($_POST['Mail'])), htmlspecialchars($_POST['Mot_de_passe'])));
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/Inscription.css"/>
    <title>Inscription</title>
</head>

<body>
	<?php
		include('check_session.php');
  ?>
    <form action="" method="post" onsubmit="return check_user_infos()">
        <fieldset>
            <legend>Inscription</legend>
            <div id="Encadrer">
                <div id="Soulignee">
                <input class="input" name="Nom" type="text" placeholder="Nom" id="para">
                <p>Please enter a valid name</p>
                <input class="input" name="Prenom" type="text" placeholder="Prénom" id="para">
                <p>Please enter a valid name</p>
                <input class="input" name="Nom_utilisateur" type="text" placeholder="Nom d'utilisateur" id="para">
                <p>Please enter a valid username</p>
                <?php
				if (isset($_POST['Nom'], $_POST['Prenom'], $_POST['Nom_utilisateur'], $_POST['Mail'], $_POST['Mot_de_passe'])) {
					if ($check_username->fetch())
						echo '<span>This username is already taken</span>';
				}
				?>
                <input class="input" name="Mail" type="text" placeholder="Email" id="para">
                <p>Please enter a valid email address</p>
                <?php
				if (isset($_POST['Nom'], $_POST['Prenom'], $_POST['Nom_utilisateur'], $_POST['Mail'], $_POST['Mot_de_passe'])) {
					if ($check_email_address->fetch())
						echo '<span>This email address is already taken</span>';
					}
				?>
                <input class="input" name="Mot_de_passe" type='password' placeholder="Mot de passe" id="para">
                <p>Please enter a valid password</p>
                <input class="input" name="conf_mot_de_passe" type='password' placeholder="Confirmer mot de passe" id="para">
                <p>Please enter a valid password</p>
                </div>
                <input type='submit' name="Envoie" id="Sub" placeholder="S'inscrire">
                <a href="Connexion.php" id="con">Déjà inscrit ?</a>
            </div>
        </fieldset>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/placeholder.js"></script>
    <script src="js/registration_check_fields.js"></script>
</body>

</html>
