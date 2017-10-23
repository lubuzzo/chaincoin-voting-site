<?php

  function createDb(){
    include 'connect.php';
    include 'env.php';

    $createTable = $pdo->query("CREATE TABLE `votes` (
      id INT(10) AUTO_INCREMENT PRIMARY KEY,
      wallet VARCHAR(64) DEFAULT NULL UNIQUE,
      ip VARCHAR(51) NOT NULL UNIQUE,
      vote VARCHAR(7) NOT NULL,
      INDEX `ip_index` (`ip`),
      INDEX `wallet_index` (`wallet`)
    )");

    if ($createTable == false)
      die($pdo->errorInfo()[2]);
    else
      return 1;
  }

  function databaseExist() {
    include 'connect.php';
    include 'env.php';

    if (!($pdo->query("SELECT 1 FROM `votes`")))
      return createDb();
    return 1;
  }

  function insertVote($ip, $vote) {
    include 'connect.php';
    include 'env.php';

    $pdo->query("INSERT INTO `votes` (`ip`, `vote`) VALUES ('".$ip."', '".$vote."')");
  }

  function insertWallet($ip, $wallet) {
    include 'connect.php';
    include 'env.php';

    $ip = str_replace(' ', '', $ip);

    $pdo->query("UPDATE `votes` SET `wallet`='".$wallet."' WHERE `ip`='".$ip."'");
  }
