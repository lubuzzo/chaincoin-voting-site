<?php

  include 'dbFunctions.php';

  if (tableExist()) {

    $myfile = fopen("example.txt", "r") or die("Unable to open file!");
    //echo nl2br(fread($myfile,filesize("example.txt")));

    //var_dump(countVotes());

    //$votes = json_decode($myfile, true);

    $votes = json_decode(fread($myfile, filesize("example.txt")), true);
    //var_dump($votes);
    //foreach ($votes as $key => $value) {
     //startVotation($key);
     //echo $key . "<br />";
    //}

    if (countVotes() == '0') {
      foreach ($votes as $key => $value) {
        startVotation($key);
        echo $key . "<br />";
      }
    } else {
      foreach ($votes as $key => $value) {
        nodeExist($key, $value);
        //insertNewNode($key);
        //startVotation();
        echo $key . "<br />";
      }
    }


    //foreach ($votes as $key => $value) {
    //  insertVote($key, $value);
    //}

    fclose($myfile);


    // $cr = curl_init();
    // curl_setopt($cr, CURLOPT_URL, "https://explorer.chaincoin.org/api/getvotelist");
    // curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
    // $return = curl_exec($cr);
    // curl_close($cr);
    //
    // $votes = json_decode($return, true);
    //
    // foreach ($votes as $key => $value) {
    //   insertVote($key, $value);
    // }
    //
    // $cr = curl_init();
    // curl_setopt($cr, CURLOPT_URL, "https://explorer.chaincoin.org/api/getmasternodelist");
    // curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
    // $return = curl_exec($cr);
    // curl_close($cr);
    //
    // $masterNodes = json_decode($return, true);
    //
    // foreach ($masterNodes as $key => $value) {
    //   insertWallet($key, explode(' ', $value)[5]);
    // }

  } else {
    echo "Something wrong happened";
  }
