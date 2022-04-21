<?php
include "header.php";
include "navbar.php";
include "dbConnection.php";
if(isset($_GET['update'])){
    $id = $_GET['update'];

}

$sql = "SELECT * FROM newdetails WHERE id = '$id'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);

$id = $row['id'];
$Code = $_POST['code'];
$Procode = $_POST['procode'];
$Dateini = $_POST['date'];
$Proimp = $_POST['projectimp'];
$Coordinater = $_POST['coord'];
$Purpose = $_POST['purpose'];
$Cost = $_POST['cost'];
$Date = $_POST['startdate'];
$Name = $_POST['proname'];
$Costini =  $_POST['costini'];
$Manager = $_POST['manager'];
$Scope = $_POST['scope'];
$Funding = $_POST['funding'];
$Plandays = $_POST['plandays'];
$Currentcost = $_POST['currentcost'];
$Impldate = $_POST['impldat'];

?>
<!-- <form action="" method="POST">
id:<input type="text" name="id" value="<?php echo $id; ?>"></br> 
code  <input type="text" name="code" value="<?php echo $Code; ?>"></br> 
procode  <input type="text" name="procode" value="<?php echo $Procode; ?>"></br> 
Date initiation <input type="text" name="date" value="<?php echo $Dateini; ?>"></br> 
project imp<input type="text" name="projectimp" value="<?php echo $Proimp; ?>"></br> 
coordinater<input type="text" name="coord" value="<?php echo $Coordinater; ?>"></br> 
Purpose <input type="text" name="purpose" value="<?php echo $Purpose; ?>"></br> 
cost<input type="text" name="cost" value="<?php echo $Cost; ?>"></br> 
startdate<input type="text" name="startdate" value="<?php echo $Date; ?>"></br> 
Name<input type="text" name="proname" value="<?php echo $Name; ?>"></br> 
cost initialization <input type="text" name="costini" value="<?php echo $Costini; ?>"></br> 
manager <input type="text" name="manager" value="<?php echo $Manager; ?>"></br> 
scope<input type="text" name="purpose" value="<?php echo $Scope; ?>"></br> 
funding <input type="text" name="funding" value="<?php echo $Funding; ?>"></br> 
plandays<input type="text" name="plandays" value="<?php echo $Plandays; ?>"></br> 
currentcost <input type="text" name="currentcost" value="<?php echo $Currentcost; ?>"></br> 
implementdate<input type="text" name="impldate" value="<?php echo $Impldate; ?>"></br> 
<input class="btn btn-primary" type="submit" name="btn" value="Submit">
</form> -->
<?php
if(!empty($_POST)){
    $post = $_POST;
    extract($post);
 
    $sql =" UPDATE `newdetails` SET `id`='$id',`code`='$code',`procode`='$procode',`dateini`='$date',`proimp`='$projectimp',`coordinater`='$coord',`purpose`='$purpose',`cost`='$cost',`datess`='$startdate',`names`='$proname',`costini`='$costini',`manager`='$manager',`scope`='$purpose',`funding`='$funding',`plandays`='$plandays',`currentcost`='$currentcost',`impldate`='$impldate' WHERE  'id' = '$id'";
    if(mysqli_query($connection,$sql)){
        echo "update success ful";
    }else{
        echo "error";
    }
}


?>




<?php
include "footer.php";
?>