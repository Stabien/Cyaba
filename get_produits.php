<?php
function get_produits($categorie, $bdd, $post) {

    $req = $bdd->prepare('SELECT COUNT(DISTINCT marque) AS total FROM produits WHERE categorie = ?');
    $req->execute(array($categorie));
    $nb_marque = $req->fetch();

    $req = $bdd->prepare('SELECT COUNT(DISTINCT attribut) AS total FROM produits WHERE categorie = ?');
    $req->execute(array($categorie));
    $nb_attribut = $req->fetch();

    if (isset($post["marque"]) && isset($post["attribut"]) == false) {
        for ($i = 0; $i < $nb_marque["total"]; $i++) {
            if (isset($post["marque"][$i])) {
                $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ? AND marque = ? AND prix <= ?');
                $get_line->execute(array($categorie, $post["marque"][$i], $post["prix"]));
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
    }
    else if (isset($post["attribut"]) && isset($post["marque"]) == false) {
        for ($i = 0; $i < $nb_attribut["total"]; $i++) {
            if (isset($post["attribut"][$i])) {
                $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ? AND attribut = ? AND prix <= ?');
                $get_line->execute(array($categorie, $post["attribut"][$i], $post["prix"]));
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
    }
    else if (isset($post["attribut"]) && isset($post["marque"])) {
        for ($j = 0; $j < $nb_marque["total"]; $j++) {
            for ($i = 0; $i < $nb_attribut["total"]; $i++) {
                if (isset($post["attribut"][$i], $post["marque"][$j])) {
                    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ? AND attribut = ? AND marque = ? AND prix <= ?');
                    $get_line->execute(array($categorie, $post["attribut"][$i], $post["marque"][$j], $post["prix"]));
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
        }
    }
    else {
        if (isset($post["prix"])) {
            $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ? AND prix <= ?');
            $get_line->execute(array($categorie, $post["prix"]));
        }
        else {
            $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
            $get_line->execute(array($categorie));
        }
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
