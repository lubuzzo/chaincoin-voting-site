<?php

  include 'dbFunctions.php';
  include 'ChainCoin.php';

  if (tableExist()) {

    $chaincoin = new ChainCoin();
    $info = $chaincoin->callMethod('masternode', array(0 => 'list', 1 => 'votes' ));
    if ($chaincoin->getError() == NULL) {

      if (countVotes() == '0') {
        foreach ($info as $key => $value) {
          startVotation($key);
        }
      } else {
        foreach ($info as $key => $value)
          nodeExist($key, $value);
      }
    }
    else
      echo $chaincoin->getError();

  } else {
      echo "Something wrong happened";
  }
