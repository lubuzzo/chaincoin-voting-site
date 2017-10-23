<?php

  include 'dbFunctions.php';

  if (databaseExist()) {

    $cr = curl_init();
    curl_setopt($cr, CURLOPT_URL, "https://explorer.chaincoin.org/api/getvotelist");
    curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
    $return = curl_exec($cr);
    curl_close($cr);

    $votes = json_decode($return, true);

    foreach ($votes as $key => $value) {
      insertVote($key, $value);
    }

    $cr = curl_init();
    curl_setopt($cr, CURLOPT_URL, "https://explorer.chaincoin.org/api/getmasternodelist");
    curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
    $return = curl_exec($cr);
    curl_close($cr);

    $masterNodes = json_decode($return, true);

    foreach ($masterNodes as $key => $value) {
      insertWallet($key, explode(' ', $value)[5]);
    }

  } else {
    echo "Something wrong happened";
  }
