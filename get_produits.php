<?php
function get_produits($categorie, $bdd, $post) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));

    if (isset($post["marque"]) || isset($post["attribut"])) {

    }
    else {
        while ($data = $get_line->fetch()) {
            echo '
            <div id="produits">
                <div href="#" id="img_container">
                    <a href="#"><img id="photo_produit" src="' . $data["images"] . '"></a>
                </div>
                <div id="name_container">
                    <a href="#">' . $data["nom"] .'</a>
                    <p>En stock</p>
                </div>
                <div id="right_infos">
                    <p>' . $data["prix"] . ' €</p>
                    <a href="#">Ajouter au panier</a>
                </div>
            </div>';
        }
    }
}
?>
