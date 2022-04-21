<?php
include 'header.php';
include 'navbar.php';
include 'dbConnection.php';
include 'function.php';

$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $val) {
        if(empty($val)) {
            $err[$key] = '<div class="alert alert-danger" role="alert">
                            cannot be empty..!
                          </div>';
        }
    }
}
?>
   <div class="container">
        <h1>
            <img src="image/eagle.png" height="50">
            <b>GENIUS AUTHORITY</b>
        </h1>
        <h1>
            <b>ICT PROJECTS MONITORING SYSTEM</b>
        </h1>
        <div class="form">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">User id:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter userid">
                    <?=$err['userid']??''?>
                    </div>
           
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Name">Name:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter your Name">
                    <?=$err['Name']??''?>
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="Department">Department:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="Department"  name="department"placeholder="Enter Department">
                        <?=$err['department']??''?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Role">Role:</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="Role"  name="role" placeholder="Enter Role">
                        <?=$err['role']??''?>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="Email ">Email :</label>
                        <div class="col-sm-5">
                        <input type="email" class="form-control" id="Email " name= "email" placeholder="Enter Email ">
                        <?=$err['email']??''?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">username:</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username:">
                        <?=$err['username']??''?>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Password:</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" id="email" name="password" placeholder="Enter Password">
                        <?=$err['password']??''?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit"  name="btnadduser"  class="btn btn-primary "><i class="fa fa-user"></i> Adduser</button>
                    <button type="submit " name="update" class="btn btn-success"><i class="fa fa-hand-pointer"></i> Update</button>
                </div>
    <?php
    // if(isset($_POST['update'])){
    // $userId = $_POST['userid'];
    // $Name =$_POST['Name'];
    // $Department = $_POST['department'];
    // $Role = $_POST['role'];
    // $Email = $_POST['email'];
    // $userName = $_POST['username'];
    // $Password = md5($_POST['password']);
    // $ID = $_GET['id'];
    // error_reporting(0);
    // $connection= new mysqli('localhost','root','','project monitoring system');
    // $sql = "UPDATE users SET userid  = '$userId',fullname = '$Name ',department= '$Department',userRole=' $Role',email='$Email',username='$userName',userpassword='$Password' WHERE id = '$ID'";
    // if($connection->query($sql)){

    //     echo   '<div class="col-md-12">
    //             <div class="alert alert-success" role="alert">update sucess full!</div>
    //             </div>';
    // }else{
    //         echo "update fail<br>";
    //     }
    
    ?>
            </form>
        </div>
    </div>
<?php

if (!empty($_POST)) {

    $post = $_POST;
    extract($post);
    if(empty($btn)){
        if(unWantedChar($userid)==true){
           echo  alert("Unwanted char","danger");
        }
        else if(alreadyExit($connection,"users","userid",$userid,"fullname",$Name)==true){
            echo alert("Already Exit","danger");
        }
        else{
            $sql = "INSERT INTO `users`(`userid`,`fullname`,`department`,`userRole`,`email`,`username`, `userpassword`)VALUES('$userid','$Name','$department','$role','$email','$username','$password')";

            if(mysqli_query($connection,$sql)){
                echo alert("Added successfully","success");
            }
            else{
                echo alert("something error","danger");
            }
        }
    }
}
include 'footer.php';
?>