<?php
function filtres_marque($categorie, $bdd) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $marque = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $marque[$i] = $data["marque"];
	    $i++;
    }

    $marque_sort = array_unique($marque);

    for ($i = 0; $i < count($marque); $i++) {
        if (isset($marque_sort[$i])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" name="' . $marque_sort[$i] . '">
                <label for="' . $marque_sort[$i] . '">' . $marque_sort[$i] . '</label>
                </div>';
        }
    }
}

function filtres_prix ($categorie, $bdd) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $prix = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $prix[$i] = $data["prix"];
	    $i++;
    }

    asort($prix);

    echo '<div class="checkbox_filtres" id="price">
             <p>' . round($prix[0] - 0.5 , 0) . '</p>
             <div id="container_position">
                 <input type="range" min="'. round($prix[0] - 0.5, 0, PHP_ROUND_HALF_DOWN) . '" max="' . round($prix[count($prix) - 1] + 0.5, 0, PHP_ROUND_HALF_DOWN) . '" step="1" id="range">
                 <span id="current_value">'. round(($prix[count($prix) - 1] + $prix[0]) / 2, 0, PHP_ROUND_HALF_DOWN) . '</span>
             </div>
             <p>' . round($prix[count($prix) - 1] + 0.5 , 0, PHP_ROUND_HALF_DOWN) . '</p>
         </div>';
}

function filtres_attribut($categorie, $bdd) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $attribut = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $attribut[$i] = $data["attribut"];
	    $i++;
    }

    $attribut_sort = array_unique($attribut);

    for ($i = 0; $i < count($attribut); $i++) {
        if (isset($attribut_sort[$i])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" name="' . $attribut_sort[$i] . '">
                <label for="' . $attribut_sort[$i] . '">' . $attribut_sort[$i] . '</label>
                </div>';
        }
    }
}
?>
