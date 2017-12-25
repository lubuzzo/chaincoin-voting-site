<?php

  function createTable(){
    include 'connect.php';
    include 'env.php';

    $createTable = $pdo->query("CREATE TABLE `votes` (
      id INT(10) AUTO_INCREMENT PRIMARY KEY,
      ip VARCHAR(51) NOT NULL UNIQUE,
      vote VARCHAR(7) NOT NULL,
      time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      voteRight int(1) NOT NULL DEFAULT '0',
      INDEX `ip_index` (`ip`)
    )");

    if ($createTable == false)
      die($pdo->errorInfo()[2]);
    else
      return 1;
  }

  function tableExist() {
    include 'connect.php';
    include 'env.php';

    if (!($pdo->query("SELECT 1 FROM `votes`")))
      return createTable();
    return 1;
  }

  function countVotes() {
    include 'connect.php';
    include 'env.php';

    $count = $pdo->query("SELECT COUNT(id) as count FROM votes");
    return $count->fetch(PDO::FETCH_OBJ)->count;
  }

  function startVotation($ip) {
    include 'connect.php';
    include 'env.php';

    $pdo->query("INSERT INTO `votes` (`ip`, `vote`, `voteRight`) VALUES ('".$ip."', 'ABSTAIN', '1')");
  }

  function nodeExist($ip, $vote) {
    include 'connect.php';
    include 'env.php';

    $exist = $pdo->query("SELECT count(id) as id, vote as vote FROM `votes` WHERE `ip` = '".$ip."'");
    if (($exist->fetch(PDO::FETCH_OBJ)->id) == 0)
      insertNewNode($ip, $vote);
    else {
      if (($exist->fetch(PDO::FETCH_OBJ)->vote != $vote) && ($vote != "ABSTAIN"));
      insertVote($ip, $vote);
    }
    return 1;
  }

  function insertNewNode($ip, $vote) {
    include 'connect.php';
    include 'env.php';

    $pdo->query("INSERT INTO `votes` (`ip`, `vote`, `voteRight`) VALUES ('".$ip."', '".$vote."', '0')");
  }

  function insertVote($ip, $vote) {
    include 'connect.php';
    include 'env.php';

    $pdo->query("UPDATE `votes` SET `vote` = '".$vote."' WHERE `ip` = '".$ip."'");
  }
