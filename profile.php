<?php 

require 'controller/Controller.php';
$controller = new Controller();

$title = "Profile Page";
$r_username = "";
$r_firstname = "";
$r_middlename = "";
$r_lastname = "";
$r_gender = "";
$r_homeaddress = "";
$r_emailaddress = "";
$r_mobilenumber = "";

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


?>

<?php include_once 'include/header.php'; ?>


          


            
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan='2'>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $r_username; ?></td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td><?php echo $r_firstname; ?></td>
                    </tr>
                    <tr>
                        <td>Middle Name:</td>
                        <td><?php echo $r_middlename; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                       <td><?php echo $r_lastname; ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><?php echo $r_gender; ?></td>
                    </tr>
                    <tr>
                        <td>Home Address:</td>
                        <td><?php echo $r_homeaddress; ?></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                       <td><?php echo $r_emailaddress; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile Number:</td>
                        <td><?php echo $r_mobilenumber; ?></td>
                    </tr>
                    <tr>
                        <td colspan='2' class='text-center'><a href='profileedit.php'><button type='submit' class="btn btn-lg btn-primary" id='btn-edit' name='btn-edit'>Edit</button></a></td>
                    </tr>
                </tbody>
            </table>

<?php include_once 'include/footer.php'; ?>