<html>
  <head>
    <title>Chaincoin vote track</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <script>
      var wVoteRight = 0, woVoteRight = 0;

      function voteRight() {
        $.get( "http://127.0.0.1/api.php?action=WVR", function( data ) {
          wVoteRight = data;
          $( "#voteRight" ).html( wVoteRight );
        });
      }

      function withoutVoteRight() {
        $.get( "http://127.0.0.1/api.php?action=WoVR", function( data ) {
          woVoteRight = data;
          $( "#woVoteRight" ).html( woVoteRight );
        });
      }

      function votedYes() {
        $.get( "http://127.0.0.1/api.php?action=Y", function( data ) {
          $( "#votedYes" ).html( data + " (" + parseFloat((data / wVoteRight) * 100).toFixed(2) + "%)" );
        });
      }

      function votedNo() {
        $.get( "http://127.0.0.1/api.php?action=N", function( data ) {
          $( "#votedNo" ).html( data + " (" + parseFloat((data / wVoteRight) * 100).toFixed(2) + "%)"  );
        });
      }

      voteRight();
      withoutVoteRight();
      votedYes();
      votedNo();

      setInterval(function() {

        voteRight();
        withoutVoteRight();
        votedYes();
        votedNo();

      }, 300000);
    </script>
  </head>

  <body>
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-12 col-xs-12">
          <h1>Chaincoin Votation Track</h1>
        </div>

        <p style="clear: both"></p>
        <hr />

        <div>
          <h2>Current vote propose: </h2>
          <div class="col-md-5 well well-sm">
            <p><b>With</b> Voting Rights: <span id="voteRight"></span></p>
          </div>
          <div class="col-md-5 col-md-offset-2 well well-sm">
            <p><b>Without</b> Voting Rights: <span id="woVoteRight"></span></p>
          </div>

          <p style="clear: both"></p>

          <div class="col-md-5 well well-sm">
            <p>Voted <b>YES</b>: <span id="votedYes"></span></p>
          </div>
          <div class="col-md-5 col-md-offset-2 well well-sm">
            <p>Voted <b>NO</b>: <span id="votedNo"></span></p>
          </div>

        </div>

    </div>
  </body>
</html>
