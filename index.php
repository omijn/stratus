<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cloud Storage</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootswatch-yeti.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/index.css">

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Stratus</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


	<div class="jumbotron">
		<div class="container">
		  <div class="col-md-6">
		    <h1>Stratus Cloud.</h1>
		    <p class="lead">30MB of free cloud storage.</p>
		    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#signUpModal">Sign up</button>
		    <button class="btn btn-default btn-lg" data-toggle="modal" data-target="#signInModal">Sign in</button>
		  </div>

		  <div class="col-md-6">
		    <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span>
		    <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
		    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
		  </div> 
		</div>
	</div>


      <!-- Modals -->
      <!-- Sign in -->
      <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="signInModalLabel">Enter your registered email ID and password.</h4>
            </div>

            <div class="modal-body">
              <form action="php/login.php" method="POST" onsubmit="return signIn()">
                
                <div class="input-group">
                	<span class="input-group-addon" id="basic-addon1">@</span>
                  	<input id="email-si" name="email-si" type="text" class="form-control" placeholder="Email address">      	
                </div>

                <div class="input-group" style="width:100%; margin-top:20px;">
                  	<input id="password-si" name="password-si" type="password" class="form-control" placeholder="Password">                  
                </div>

                <input style="margin-top:20px" type="submit" value="Sign In" class="btn btn-success btn-lg"/>

              </form>
            </div>

            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>              
            </div>
          </div>
        </div>
      </div>

      <!-- Sign up -->
      <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="signUpModalLabel">Register for a Stratus account!</h4>
            </div>

            <div class="modal-body">
              <form action="php/signup.php" method="POST" onsubmit="return signUp()">
                
                <div class="input-group">
                	<span class="input-group-addon" id="basic-addon1">@</span>
                  	<input id="email-su" name="email-su" type="text" class="form-control" placeholder="Email address">
                </div>

                <div class="input-group" style="width:100%; margin-top:20px;">
                  	<input id="password-su" name="password-su" type="password" class="form-control" placeholder="Password">                  
                </div>

                <div class="input-group" style="width:100%; margin-top:20px;">
                  	<input id="confirmpassword-su" name="confirmpassword-su" type="password" class="form-control" placeholder="Confirm password">                  
                </div>

                <input style="margin-top:20px" type="submit" value="Sign Up" class="btn btn-success btn-lg"/>

              </form>

            </div>

            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>              
            </div>
          </div>
        </div>
      </div>


<!-- angular js -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- md5 plugin for jquery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/1.1.1/js/md5.min.js"></script>


<script>

	function signUp() {
      $("#password-su").val(md5($("#password-su").val()));
	}


	function signIn() {	
		  $("#password-si").val(md5($("#password-si").val()));
	}

</script>
</body>
</html>