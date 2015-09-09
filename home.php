<?php 

require 'controller/Controller.php';
$controller = new Controller();

$title = "Home Page";

?>
<?php include_once 'include/header.php'; ?>

 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th colspan="7" class='text-center'>Registered Users</th>
                </tr>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($controller->profile_list() as $list){ ?>
                <tr>
                    <td><?php echo $list['firstname']; ?></td>
                    <td><?php echo $list['middlename']; ?></td>
                    <td><?php echo $list['lastname']; ?></td>
                    <td><?php echo $list['emailaddress']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
            
     
<?php include_once 'include/footer.php'; ?>

