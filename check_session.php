<?php
  if (session_status() == PHP_SESSION_NONE)
    session_start();

  if (!isset($_SESSION['id']) or $_SESSION['id'] == null)
    include('header.php');
  else if ($_SESSION['id'][0] == 'a')
    include('header_user.php');
  else if ($_SESSION['id'][0] == 'u')
    include('header_admin.php');
?>
