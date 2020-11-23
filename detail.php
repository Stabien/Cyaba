<?php
require_once('bdd_connexion.php');
session_start();

if (isset($_GET['id']) or isset($_GET['id_produit'])) {
    if (isset($_GET['id_produit']))
        $_GET['id'] = $_GET['id_produit'];
    $req = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
    $req->execute(array($_GET['id']));
    $data = $req->fetch();
}

if (isset($_GET['id_produit']) && isset($_SESSION['id']) && $_SESSION['id'] != 0) {
    $req = $bdd->prepare('INSERT INTO panier (id_panier, id_produit) VALUES (?, ?)');
    $req->execute(array($_SESSION['id'], $_GET['id_produit']));
    header('Location: index.php');
}
else if (isset($_GET['id_produit']) && (isset($_SESSION['id']) == false or $_SESSION['id'] == 0))
    header('Location: connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/detail.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php
		  include('check_session.php');
    ?>
    <div id="produit">
        <div id="img_title">
            <img id="image_1" src="<?php echo $data['images']; ?>" >
            <?php
            if (isset($data['images_2']) && strlen($data['images_2']) > 0) {
                echo '<img id="image_2" src="' . $data["images_2"] . '">';
            }
            if (isset($data['images_3']) && strlen($data['images_3']) > 0) {
                echo '<img id="image_3" src="' . $data["images_3"] . '">';
            }
            ?>
            <div id="miniature">
                <img id="minia_1" src="<?php echo $data['images']; ?>">
            <?php
            if (isset($data['images_2']) && strlen($data['images_2']) > 0)
                echo '<img id="minia_2" src="' . $data["images_2"] . '">';
            if (isset($data['images_3']) && strlen($data['images_3']) > 0)
                echo '<img id="minia_3" src="' . $data["images_3"] . '">';
                ?>
            </div>
            <h2><?php echo $data['nom']; ?></h2>
        </div>
        <div id="lien">
            <p><?php echo $data['prix']; ?>€</p>
            <a href="?id_produit=<?php echo $data["id"]; ?>" id="ajouter">Ajouter au panier</a>
            <a href="payment.php" id="buy">Acheter</a>
        </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
    <script>
    $("#minia_1").on('click', function() {
        $('#image_1').css('display', 'block');
        $('#image_2').css('display', 'none');
        $('#image_3').css('display', 'none');
    });
    $("#minia_2").on('click', function() {
        $('#image_2').css('display', 'block');
        $('#image_1').css('display', 'none');
        $('#image_3').css('display', 'none');
    });
    $("#minia_3").on('click', function() {
        $('#image_3').css('display', 'block');
        $('#image_2').css('display', 'none');
        $('#image_1').css('display', 'none');
    });
    </script>
</body>
</html>
