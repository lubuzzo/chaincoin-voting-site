<?php

function countWithVoteRights() {
  include 'connect.php';

  $count = $pdo->query("SELECT COUNT(id) as count FROM votes WHERE voteRight = 1");
  $info = $count->fetch(PDO::FETCH_OBJ)->count;
  return $info;
}

function countWithoutVoteRight() {
  include 'connect.php';

  $count = $pdo->query("SELECT COUNT(id) as count FROM votes WHERE voteRight = 0");
  $info = $count->fetch(PDO::FETCH_OBJ)->count;
  return $info;
}

function getYea() {
  include 'connect.php';

  $count = $pdo->query("SELECT COUNT(id) as count FROM votes WHERE vote = 'YEA'");
  $info = $count->fetch(PDO::FETCH_OBJ)->count;
  return $info;
}

function getNah() {
  include 'connect.php';

  $count = $pdo->query("SELECT COUNT(id) as count FROM votes WHERE vote = 'NAY'");
  $info = $count->fetch(PDO::FETCH_OBJ)->count;
  return $info;
}


if (isset($_GET)) {
  if ($_GET['action'] == 'WVR')
    echo countWithVoteRights();
  else if ($_GET['action'] == 'WoVR')
    echo countWithoutVoteRight();
  else if ($_GET['action'] == 'Y')
    echo getYea();
  else if ($_GET['action'] == 'N')
    echo getNah();
} else {
  header("location: https://chaincoin.org/");
}
