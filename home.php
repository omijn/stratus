<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootswatch-yeti.min.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/fileinput.min.css"> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Stratus</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="php/logout.php">Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Section 1</a></li>
            <li><a href="#">Section 2</a></li>
            <li><a href="#">Section 3</a></li>
          </ul>          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">/home of <?php $split = explode("@", $_SESSION['email']); echo $split[0]; ?></h1>

          <div class="row">            
            <div class="col-md-2">
              <form action="php/upload_handler.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="userfile" style="font-size:22px;"/>
                    <input type="submit" value="Upload!" style="font-size:22px;"/>
              </form>
            </div>            

  
            <!-- <div class="col-md-2">
              <button class="btn btn-primary btn-lg" style="font-size:22px">Download all  <span class="glyphicon glyphicon-download" aria-hidden="true"></span></button>
            </div>             -->
          </div>

          <h2 class="sub-header">Directory listing</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>                  
                  <th>Size</th>
                  <th>Delete</th>
                </tr>
              </thead>

              <tbody>
                <?php
                    if($handle = opendir("userstorage/".$_SESSION['id'])){

                        $total = 0;

                        while(false !== ($entry = readdir($handle))) {                            
                            if($entry == '.' || $entry == '..')
                                continue;                        

                            $class = "file";

                            if(is_dir("userstorage/".$_SESSION['id']."/".$entry)) {
                                $entry = $entry."/";
                                $class = "dir";
                            }

                            echo '<tr>';

                            echo '<td class='.$class.'>';

                            if($class != "dir")
                                echo '<a href='."userstorage/".$_SESSION['id']."/".$entry.' target="_blank">';
                            else
                                echo '<a href='."php/folder_change.php".$_SESSION['id']."/".$entry.' target="_blank">';
                            echo $entry;
                            echo '</a>';
                            echo '</td>';

                            echo '<td>';
                            if($class != "dir") {
                                $filesize = filesize("userstorage/".$_SESSION['id']."/".$entry);
                                echo strval(round($filesize/1024, 2))." KB";
                                $total += $filesize;
                            }
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="php/delete_file.php" method="POST">';
                            echo '<button class="btn btn-danger btn-sm" type="submit" name="item" value="'.$entry.'"">';
                            echo 'Delete';
                            echo '</button>';
                            echo '</form>';
                            echo '<td>';

                            echo '</tr>';                            
                        }

                        closedir($handle);
                    }                    
                 ?>               
              </tbody>
            </table>

          </div>
          <h3>You are using <?php echo round($total/1024/1024, 2); echo "MB out of 30MB" ?></h3>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src"https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--<script src="js/fileinput.min.js" type="text/javascript"></script>-->
  </body>
</html>
