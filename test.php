<?php

require 'ChainCoin.php';

$chaincoin = new ChainCoin();
$info = $chaincoin->callMethod('masternode', array(0 => 'list', 1 => 'votes' ));
if ($chaincoin->getError() == NULL) {
        foreach($info as $key => $votes) {
                echo $key . "\n";
        }
}
else
  echo $chaincoin->getError();
