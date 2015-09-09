<?php 

require 'controller/Controller.php';
$controller = new Controller();

$title = 'Login Page';
$controller->login_access();

$r_username = "";
$r_password = "";
$r_message = "";

if(isset($_POST['btn-submit'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    $array = array('username' => $username,
                    'password' => $password);
    $result = $controller->login_validate($array);
    
    if(isset($result['message'])){
        $r_message = $result['message'];
    }
    
    if(isset($result['username'])){
        $r_username = $result['username'];
    }
}


?>


<?php include_once 'include/header.php'; ?>
       <?php if(!empty($r_message)){ ?>

        <div class="alert alert-warning alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $r_message; ?>
        </div>

       <?php } ?>

    <div class="container">  
       
      <form method='post' id='form-login' action='<?php echo $_SERVER['PHP_SELF']; ?>' class="form-signin">
        <h2 class="form-signin-heading">Please login</h2>
        <label for="username" class="sr-only">Username</label>
        <input type='text' id='username' name='username'  class="form-control"  placeholder="Username"  value='<?php echo $r_username; ?>' autofocus=""/>
        <label for="password" class="sr-only">Password</label>
        <input type='password' id='password' name='password' class="form-control" placeholder="Password" value=''/>
        <button type='submit' class="btn btn-sm btn-primary btn-block" id='btn-submit' name='btn-submit' >Submit</button>
        <div class='text-center'><a href='register.php' class='text-primary'>Not yet registered?</a></div>
      </form>

    </div> <!-- /container -->


<?php include_once 'include/footer.php'; ?>
