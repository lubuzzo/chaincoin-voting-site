<?php

  include 'env.php';

  try {
    $pdo = new PDO($driver . ":host=" . $host . ";dbname=" . $db, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
  }
  catch (PDOException $e) {
      die('Error: unable to connect to database -> ' . $e->getMessage());
  }
?>
