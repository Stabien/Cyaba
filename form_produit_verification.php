<?php
function verification($post, $files) {
  $mb = 1048576;
  $rayon = ['Audiovisuel', 'Informatique', 'Objets connectes'];
  $allCategories = ['Photo', 'Camera', 'Enceinte', 'Ordinateur',
                    'Périphérique', 'Pièce', 'Maison', 'Sport'];
  $sortedCategories = [
    ['Photo', 'Camera', 'Enceinte'],
    ['Ordinateur','Périphérique', 'Pièce'],
    ['Maison', 'Sport']
  ];
  // Check input length
  if (strlen($post['nom']) < 2 or strlen($post['attribut']) < 2 or strlen($post['marque']) < 2)
    return false;
  // Check price input
  if (!is_numeric($post['prix']))
    return false;
  // Check rayon and categorie values
  if (!in_array($post['rayon'], $rayon) or !in_array($post['categorie'], $allCategories))
    return false;
  // Check categorie values depending on the rayon values
  if ($post['rayon'] == $rayon[0] and !in_array($post['categorie'], $sortedCategories[0]))
    return false;
  if ($post['rayon'] == $rayon[1] and !in_array($post['categorie'], $sortedCategories[1]))
    return false;
  if ($post['rayon'] == $rayon[2] and !in_array($post['categorie'], $sortedCategories[2]))
    return false;
  // Check file inputs
  if (!is_uploaded_file($files['image_1']['tmp_name']) or
      !is_uploaded_file($files['image_2']['tmp_name']) or
      !is_uploaded_file($files['image_3']['tmp_name']))
    return false;
  if ($files['image_1']['size'] > 10 * $mb or
      $files['image_2']['size'] > 10 * $mb or
      $files['image_3']['size'] > 10 * $mb)
    return false;
  // if everything is good return true*/
  return true;
}
?>
