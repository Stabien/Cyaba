<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/contact.css"/>
	<title>A Propos</title>
</head>

<body>

<?php
		include('check_session.php');
?>
    <div class = "container">
        <form>
            <h2>Contactez nous</h2>
            <p><label>Votre Nom et Prenom</label> <input name="myName" type="text" id="name"
            placeholder="Michel Dupont" size="40px" required></p>
            <p><label>Votre Address E-mail</label> <input name="myEmail" type="text" id="email"
            placeholder="M.Dupont@hotmail.fr" size="40px"
            pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
            required></p>
            <p><label>Message</label>  <textarea name="message" id = "styled"></textarea></p>
            <p><input type="submit" id="button" value="Envoyer"></p>
        </form>
    </div>
</body>
</html>
