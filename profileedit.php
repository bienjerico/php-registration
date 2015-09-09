<?php 

require 'controller/Controller.php';
$controller = new Controller();

$title = "Profile Page | Edit";

$r_username       = "";
$r_firstname      = "";
$r_middlename     = "";
$r_lastname       = "";
$r_gender         = "";
$r_homeaddress    = "";
$r_emailaddress   = "";
$r_mobilenumber   = "";
$r_message        = "";

if(isset($_SESSION['user_id'])){

    
    $result = $controller->profile_user($_SESSION['user_id']);

    $r_username = $result['username'];
    $r_firstname = $result['firstname'];
    $r_middlename = $result['middlename'];
    $r_lastname = $result['lastname'];
    $r_gender = $result['gender'];
    $r_homeaddress = $result['homeaddress'];
    $r_emailaddress = $result['emailaddress'];
    $r_mobilenumber = $result['mobilenumber'];
}







if(isset($_POST['btn-submit'])){
    
    $username       = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password       = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $conpassword    = filter_var($_POST['conpassword'], FILTER_SANITIZE_STRING);
    $firstname      = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $middlename     = filter_var($_POST['middlename'], FILTER_SANITIZE_STRING);
    $lastname       = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $gender         = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $homeaddress    = filter_var($_POST['homeaddress'], FILTER_SANITIZE_STRING);
    $emailaddress   = filter_var($_POST['emailaddress'], FILTER_SANITIZE_STRING);
    $mobilenumber   = filter_var($_POST['mobilenumber'], FILTER_SANITIZE_STRING);
    
    
    $array = array('username' => $username,
                    'password' => $password,
                    'conpassword' => $conpassword,
                    'firstname' => $firstname,
                    'middlename' => $middlename,
                    'lastname' => $lastname,
                    'gender' => $gender,
                    'homeaddress' => $homeaddress,
                    'emailaddress' => $emailaddress,
                    'mobilenumber' => $mobilenumber,
                    'process'   => 'update');
    
    $result = $controller->profile_validate($array);
//    print_r($result);
    if(isset($result['message'])){
        $r_message = $result['message'];
    }
   
    
    if(isset($result['username'])){
        $r_username = $result['username'];
    }
    if(isset($result['firstname'])){
        $r_firstname= $result['firstname'];
    }
    if(isset($result['middlename'])){
        $r_middlename= $result['middlename'];
    }
    if(isset($result['lastname'])){
        $r_lastname= $result['lastname'];
    }
    if(isset($result['gender'])){
        $r_gender= $result['gender'];
    }
    if(isset($result['homeaddress'])){
        $r_homeaddress= $result['homeaddress'];
    }
    if(isset($result['emailaddress'])){
        $r_emailaddress= $result['emailaddress'];
    }
    if(isset($result['mobilenumber'])){
        $r_mobilenumber= $result['mobilenumber'];
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


        <form method='post' id='form-register'  name='form-register' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan='2'>Edit Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $r_username; ?><input type='hidden'  class="form-control" id='username' name='username' value='<?php echo $r_username; ?>'/></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input type='password'  class="form-control" id='password' name='password' value=''/></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type='password' class="form-control" id='conpassword' name='conpassword' value=''/></td>
                    </tr>
                    <tr>
                        <td colspan="2">Personal Information</td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td><input type='text'  class="form-control" id='firstname' name='firstname' value='<?php echo $r_firstname; ?>'/><span class='text-danger'>Required</span></td>
                    </tr>
                    <tr>
                        <td>Middle Name:</td>
                        <td><input type='text' class="form-control" id='middlename' name='middlename' value='<?php echo $r_middlename; ?>'/></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type='text'  class="form-control" id='lastname' name='lastname' value='<?php echo $r_lastname; ?>'/><span class='text-danger'>Required</span></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><select id='gender' name='gender'  class="form-control">
                                <option value='male' <?php if($r_gender=='male'){ echo 'selected'; } ?>>Male</option>
                                <option value='female'  <?php if($r_gender=='female'){ echo 'selected'; } ?>>Female</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td colspan="2">Contact Information</td>
                    </tr>
                    <tr>
                        <td>Home Address:</td>
                        <td><input type='text'   class="form-control" id='homeaddress' name='homeaddress' value='<?php echo $r_homeaddress; ?>'/></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type='text'  class="form-control" id='emailaddress' name='emailaddress' value='<?php echo $r_emailaddress; ?>'/></td>
                    </tr>
                    <tr>
                        <td>Mobile Number:</td>
                        <td><input type='text' class="form-control" id='mobilenumber' name='mobilenumber' value='<?php echo $r_mobilenumber; ?>'/></td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'><button type='submit'  class="btn btn-lg btn-primary"  id='btn-submit' name='btn-submit'>Update</button>
                            <a href='profile.php'><button type='button'  class="btn btn-lg btn-warning"  id='btn-backtologin' name='btn-backtologin'>Back to Profile</button></a></td>
                    </tr>
                </tbody>
            </table>
        </form>
<?php include_once 'include/footer.php'; ?>

