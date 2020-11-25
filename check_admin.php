<?php
if (!isset($_SESSION['id']) or $_SESSION['id'][0] != 'a')
  header('Location: index.php');
?>
