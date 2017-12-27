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
