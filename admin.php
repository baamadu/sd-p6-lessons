<?php
   
   require 'modules/database.php';
   require 'modules/functions.php';
   session_start();

   var_dump($_SESSION);

   if (!isAdmin()) {
      header (header:"location:indexe.php");
    }
    ?>

    <h4>Welkom admin</h4>