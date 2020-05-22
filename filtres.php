<?php
function filtres_marque($categorie, $bdd, $post) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $marque = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $marque[$i] = $data["marque"];
	    $i++;
    }

    $marque_sort = array_unique($marque);
    $counter = 0;

    for ($i = 0; $i < count($marque); $i++) {
        if (isset($marque_sort[$i], $post["marque"][$counter])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" name="marque[' . $counter . ']" "class="marque" value="' . $marque_sort[$i] . '" checked="checked" onchange="$(\'#filtres\').submit()">
                <label for="' . $marque_sort[$i] . '">' . $marque_sort[$i] . '</label>
                </div>';
            $counter++;
        }
        else if (isset($marque_sort[$i])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" name="marque[' . $counter . ']" "class="marque" value="' . $marque_sort[$i] . '" onchange="$(\'#filtres\').submit()">
                <label for="' . $marque_sort[$i] . '">' . $marque_sort[$i] . '</label>
                </div>';
            $counter++;
        }
    }
}

function filtres_prix ($categorie, $bdd, $post) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $prix = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $prix[$i] = $data["prix"];
	    $i++;
    }

    sort($prix);
    if (isset($post["prix"])) {
        echo '<div class="checkbox_filtres" id="price">
                 <p>' . round($prix[0] + 0.5 , 0) . '</p>
                 <div id="container_position">
                     <input type="range" min="'. round($prix[0] + 0.5, 0) . '" max="' . round($prix[count($prix) - 1] + 0.5, 0) . '" step="1" id="range" name="prix" value="'
                     . $post["prix"] . '"onchange="$(\'#filtres\').submit()">
                     <span id="current_value">'. $post["prix"] . '</span>
                 </div>
                 <p>' . round($prix[count($prix) - 1] + 0.5 , 0) . '</p>
             </div>';
    }
    else {
        echo '<div class="checkbox_filtres" id="price">
                 <p>' . round($prix[0] + 0.5 , 0) . '</p>
                 <div id="container_position">
                     <input type="range" min="'. round($prix[0] + 0.5, 0) . '" max="' . round($prix[count($prix) - 1] + 0.5, 0) . '" step="1" id="range" name="prix" value="'
                     . round($prix[count($prix) - 1] + 0.5, 0) . '"onchange="$(\'#filtres\').submit()">
                     <span id="current_value">'. round($prix[count($prix) - 1] + 0.5, 0) . '</span>
                 </div>
                 <p>' . round($prix[count($prix) - 1] + 0.5 , 0) . '</p>
             </div>';
    }
}

function filtres_attribut($categorie, $bdd, $post) {
    $get_line = $bdd->prepare('SELECT * FROM produits WHERE categorie = ?');
    $get_line->execute(array($categorie));
    $attribut = array();
    $i = 0;

    while ($data = $get_line->fetch()) {
	    $attribut[$i] = $data["attribut"];
	    $i++;
    }

    $attribut_sort = array_unique($attribut);
    $counter = 0;

    for ($i = 0; $i < count($attribut); $i++) {
        if (isset($attribut_sort[$i], $post["attribut"][$counter])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" class="attribut" name="attribut[' . $counter . ']" value="' . $attribut_sort[$i] . '" checked="checked" onchange="$(\'#filtres\').submit()">
                <label for="' . $attribut_sort[$i] . '">' . $attribut_sort[$i] . '</label>
                </div>';
            $counter++;
        }
        else if (isset($attribut_sort[$i])) {
            echo '<div class="checkbox_filtres">
                <input type="checkbox" class="attribut" name="attribut[' . $counter . ']" value="' . $attribut_sort[$i] . '" ; onchange="$(\'#filtres\').submit()">
                <label for="' . $attribut_sort[$i] . '">' . $attribut_sort[$i] . '</label>
                </div>';
            $counter++;
        }
    }
}
?>
