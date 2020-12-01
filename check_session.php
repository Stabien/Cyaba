<?php
if (session_status() == PHP_SESSION_NONE)
  session_start();

if (!isset($_SESSION['id']) or $_SESSION['id'][0] != 'u')
  include('header.php');
else if ($_SESSION['id'][0] == 'u')
  include('header_user.php');
?>
