<?php
include 'header.php';
include 'navbar.php';
include 'dbConnection.php';
include 'function.php';
$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $val) {
        if(empty($val)) {
           $err[$key] =  alert("Cannot Empty Filed","danger");
         
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 >
                <i class="fa fa-user-friends" class="text-primary"> </i> 
                ENTER STAFF DETAILS
            </h4>
        </div>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-5">                    
                <div class="form-group">
                    <label for="name" class="control-label" >Staff code:</label>
                    <input type ="text" name="staffcode" class="form-control" placeholder="Enter your staffcode"> 
                    <?=$err['staffcode']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">First Name:</label>
                    <input type ="text" name="firstname" class="form-control" placeholder="Enter your Firstname"> 
                    <?=$err['firstname']??''?>
          
                </div>            
                <div class="form-group">
                    <label for="name" class="control-label">Last Name:</label>
                    <input type ="text" name="lastname" class="form-control" placeholder="Enter your Lastname"> 
                    <?=$err['lastname']??''?>
          
                </div>            
                <div class="form-group">
                    <label for="name" class="control-label" >date of birth:</label>
                    <input type ="date" name="date" class="form-control" placeholder="Enter your dateofbirth"> 
                    <?=$err['date']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label" > Address:</label>
                    <input type ="text" name="address" class="form-control" placeholder="Enter your Address"> 
                    <?=$err['address']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Phone No:</label>
                    <input type ="text" name="phoneno" class="form-control" placeholder="Enter your phoneno"> 
                    <?=$err['phoneno']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">other quality:</label>
                    <textarea id="purpose" name="quality" rows="4" cols="50" class="form-control"></textarea>
                    <?=$err['quality']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Email:</label>
                    <input type ="text" name="email" class="form-control" placeholder="Enter your Email"> 
                </div>
                <?=$err['email']??''?>
          
                <div>
                    &nbsp;<button class="btn btn-primary" name="btn"><i class="fa fa-user"></i> submit</button>
                    <button class="btn btn-success" name="update"><i class="fa fa-hand-pointer"></i> update</button>
                </div>
            </div>
            <div class="col-md-5">                    
                <div class="form-group">
                    <label for="name" class="control-label"> Lead Project name:</label>
                    <input type ="text" name="projectname" class="form-control" placeholder="Enter your projectName"> 
                    <?=$err['projectname']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">salary:</label>
                    <input type ="text" name="salary" class="form-control" placeholder="Enter your salary"> 
                    <?=$err['salary']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Joint Date:</label>
                    <input type ="date" name="joindate" class="form-control" placeholder="Enter your Jointdate"> 
                    <?=$err['joindate']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Working Team:</label>
                    <textarea id="purpose" name="team" rows="4" cols="50" class="form-control"></textarea>
                    <?=$err['team']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label" >EPF Details:</label>
                    <input type ="text" name="epf" class="form-control" placeholder="Enter your Epfdetails"> 
                    <?=$err['code']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label" >planned completion days:</label>
                    <input type ="date" name="completiondays" class="form-control" placeholder="Enter your completion days"> 
                    <?=$err['epf']??''?>
          
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">performance Level:</label>
                    <textarea id="purpose" name="level" rows="4" cols="50" class="form-control"></textarea>
                    <?=$err['level']??''?>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
if (!empty($_POST))
   {
     $post = $_POST;
     extract($post);
     if(empty($btn))
     {
       if(unWantedChar($staffcode)==true)
          {
             echo alert("Unwanted Characters","danger");
          }
       else if(alreadyExit($connection,"staffdetails","staffcode",$staffcode,"epf",$epf)==true)
          {
            echo alert("Already Exit...!","danger");
          }
       else
          {
            $sql = "INSERT INTO `staffdetails`( `staffcode`, `firstname`, `lastname`, `dates`, `addresses`, `phoneno`, `otherquality`, `email`, `projectname`, `salary`, `joindate`, `workingteam`, `epf`, `completiondays`, `levels`) VALUES ('$staffcode','$firstname','$lastname','$date','$address','$phoneno','$quality','$email','$projectname','$salary','$joindate','$team','$epf','$completiondays','$level')";
            if(mysqli_query($connection,$sql)){
                echo alert("Added successfully","success");
            }
            else{
                echo alert("something Wrong","danger");
            }
          }
      }             
}
include 'footer.php';
?>



