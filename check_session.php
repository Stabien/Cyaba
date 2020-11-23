<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if (!isset($_SESSION['id']) or $_SESSION['id'] == null)
      include('header.php');
  else
      include('header_co.php');
?>
