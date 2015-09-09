<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    

  
    <script src="assets/js/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/responsive-nav.js"></script>
    <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>



</head>
<body>

    <?php if(!$controller->page_access()){ ?>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li> <?php echo $controller->login_button(); ?></li>
        </ul>
        </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
        </nav>
    <?php } ?>
    
    <div class="container">  
        <div class="wrapper"> 

  