<?php include 'connect.php'; ?>
<html>
  <head>
    <title>Chaincoin vote track</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
    <script src="assets/js/jquery-3.2.1.min.js"></script>

  </head>

  <body>
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-12 col-xs-12">
          <h1 style="text-align: center;">Chaincoin Votation Track</h1>
        </div>

        <p style="clear: both"></p>
        <hr />

        <form class="form-horizontal" action="masternode.php" method="get">
          <div class="form-group">
            <label class="control-label col-sm-2" for="ip">Enter your IP:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ip" placeholder="127.0.0.1:11994" name="ip" <?php if(isset($_GET['ip'])) {?> value="<?php echo $_GET['ip'];?>" <?php } ?>></input>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-default btn-block btn-lg">Search</button>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-hover">
            <tr>
              <td><b>Masternode IP</b></td>
              <td><b>Vote</b></td>
            </tr>
            <?php

            if (!(isset($_GET['ip']))) {

              $mn = $pdo->query("SELECT ip, vote, voteRight from votes order by voteRight desc");
              $mn = $mn->fetchAll();
              foreach ($mn as $key => $value) { ?>

                <?php if ($value['voteRight'] == '1') {
                  if ($value['vote'] == 'YEA') {
                    ?> <tr class="success"> <?php
                  } else if ($value['vote'] == 'NAY') {
                    ?> <tr class="danger"><?php
                  } else {
                    ?><tr><?php
                  }
                } else {
                  ?> <tr class="info"> <?php
                }
                  ?>

                  <td><?php echo $value['ip'];?></td>
                  <td><?php echo $value['vote'];?></td>
                </tr>
              <?php }

            } else {
              $mn = $pdo->query("SELECT ip, vote, voteRight from votes where ip like '%".$_GET['ip']."%'");
              $mn = $mn->fetchAll();
              foreach ($mn as $key => $value) { ?>

                <?php if ($value['voteRight'] == '1') {
                  if ($value['vote'] == 'YEA') {
                    ?> <tr class="success"> <?php
                  } else if ($value['vote'] == 'NAY') {
                    ?> <tr class="danger"><?php
                  } else {
                    ?><tr><?php
                  }
                } else {
                  ?> <tr class="info"> <?php
                }
                  ?>

                  <td><?php echo $value['ip'];?></td>
                  <td><?php echo $value['vote'];?></td>
                </tr>
              <?php }
            }?>
          </table>
        </div>

      </div>
    </div>

  </body>
</html>
