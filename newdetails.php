<?php
include 'header.php';
include 'navbar.php';
include 'dbConnection.php';
include 'function.php';
$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $val) {
        if(empty($val)) {
            $err[$key] = alert("Empty Field","danger");
        }
    }
}
if (isset($_POST['view'])) 
{
        header("Location: view.php");
    
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4> <i class="fa fa-wallet"> </i> ENTER NEW PROJECT DETAILS</hr></h4>
        </div><hr>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="control-label">projectcode:</label>
                    <input type="text" name="code" class="form-control" placeholder="Enter your projectcode">
                    <?=$err['code']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Procurement code:</label>
                    <input type="text" name="procode" class="form-control" placeholder="Enter your procurementcode">
                    <?=$err['procode']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">date of initiation:</label>
                    <input type="date" name="date" class="form-control" placeholder="Enter your date">
                    <?=$err['date']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project Implementer:</label>
                    <input type="text" name="projectimp" class="form-control" placeholder="Enter your project implementer">
                    <?=$err['projectimp']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project coordinator:</label>
                    <input type="text" name="coord" class="form-control" placeholder="Enter your project coordinator">
                    <?=$err['coord']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project purpose:</label>
                    <textarea id="purpose" name="purpose" rows="4" cols="50" class="form-control"></textarea>
                    <?=$err['purpose']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">planned costing:</label>
                    <input type="text" name="cost" class="form-control" placeholder="Enter your planned costing">
                    <?=$err['cost']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">impl start date:</label>
                    <input type="date" name="startdate" class="form-control" placeholder="Enter your impl start date">
                    <?=$err['startdate']??''?></br>
                </div>
                <button class="btn btn-primary" name="btn"><i class="fa fa-user"></i>submit</button>
                <button type="submit" class="btn btn-success" name="view" ><i class="fa fa-hand-pointer"></i>view</button>
               </div></br>
               <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="control-label">Project name:</label>
                    <input type="text" name="proname" class="form-control" placeholder="Enter your projectName">
                    <?=$err['proname']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">cost at initiation :</label>
                    <input type="date" name="costini" class="form-control" placeholder="Enter your cost intiation">
                    <?=$err['costini']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Project manager:</label>
                    <input type="text" name="manager" class="form-control" placeholder="Enter your project manager">
                    <?=$err['manager']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label"> purpose:</label>
                    <textarea id="purpose" name="purpose" rows="4" cols="50" class="form-control"></textarea>
                    <?=$err['purpose']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">funding:</label>
                    <input type="text" name="funding" class="form-control" placeholder="Enter your funding">
                    <?=$err['funding']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">planned completion days:</label>
                    <input type="text" name="plandays" class="form-control" placeholder="Enter your completion days">
                    <?=$err['plandays']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">current costing:</label>
                    <input type="text" name="currentcost" class="form-control" placeholder="Enter your Name">
                    <?=$err['currentcost']??''?>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">impl end date:</label>
                    <input type="date" name="impldate" class="form-control" placeholder="Enter your Name">
                    <?=$err['impldat']??''?>
                </div>
            </div>
      </form>
</div>
<?php
if (!empty($_POST)) {
    if(empty($btn)){
        $post = $_POST;
        extract($post);
        if( unWantedChar($code)){
            echo  alert("Unwanted Character","danger");
        }
       else if(alreadyExit($connection,"newdetails","code",$code,"procode",$procode)) 
        {
          echo alert("Already exit","danger");
        }
        else{
            $sql ="INSERT INTO `newdetails`(`code`, `procode`, `dateini`, `proimp`, `coordinater`, `purpose`, `cost`, `datess`, `names`, `costini`, `manager`, `scope`, `funding`, `plandays`, `currentcost`, `impldate`) VALUES ('$code','$procode','$date','$projectimp','$coord','$purpose','$cost','$startdate','$proname','$costini','$manager','$purpose','$funding','$plandays','$currentcost','$impldate')";

            if(mysqli_query($connection,$sql)){
                echo alert("Added successfully!","success");
            }
            else{
                echo alert("Something Error","danger");
            }
        }
    }
}

include 'footer.php';
?>
<script>
function Redirectpage() {
  location.replace("http://localhost/MONITOR.php/view.php");
}
</script>