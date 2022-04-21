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

?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                    <label for="name" class="control-label">id:</label>
                    <input type="hidden" name="id" class="form-control" placeholder="Enter your projectcode" value="<?php echo $row['id'];  ?>">
                
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">projectcode:</label>
                    <input type="text" name="code" class="form-control" placeholder="Enter your projectcode" value="<?php echo $row['code'];?>">
                
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Procurement code:</label>
                    <input type="text" name="procode" class="form-control" placeholder="Enter your procurementcode "value="<?php echo $row['procode']; ?>">
                  
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">date of initiation:</label>
                    <input type="date" name="date" class="form-control" placeholder="Enter your date"value="<?php echo $row['date']; ?>">
               
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project Implementer:</label>
                    <input type="text" name="projectimp" class="form-control" placeholder="Enter your project implementer"value="<?php echo $row['projectimp'];?>">
                 
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project coordinator:</label>
                    <input type="text" name="coord" class="form-control" placeholder="Enter your project coordinator"value="<?php echo $row['coord']; ?>">
                    
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">project purpose:</label>
                    <textarea value="<?php echo $row['purpose'] ?>"id="purpose" name="purpose" rows="4" cols="50" class="form-control"></textarea >
                  
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">planned costing:</label>
                    <input type="text" name="cost" class="form-control" placeholder="Enter your planned costing"value="<?php $row['cost'];?>">
                  
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">impl start date:</label>
                    <input type="date" name="startdate" class="form-control" placeholder="Enter your impl start date"value="<?php $row['startdate'];?>">
                 
                </div>
                <button class="btn btn-primary" name="btn"><i class="fa fa-user"></i>submit</button>
                <button type="submit" class="btn btn-success" name="view" ><i class="fa fa-hand-pointer"></i>view</button>
               </div></br>
               <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="control-label">Project name:</label>
                    <input type="text" name="proname" class="form-control" placeholder="Enter your projectName"value="<?php echo $row['proname']; ?>">
     
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">cost at initiation :</label>
                    <input type="date" name="costini" class="form-control" placeholder="Enter your cost intiation"value="<?php echo $row['costini']; ?>">
                
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Project manager:</label>
                    <input type="text" name="manager" class="form-control" placeholder="Enter your project manager"value="<?php $row['manager'] ?>">
                  
                </div>
                <div class="form-group">
                    <label for="name" class="control-label"> purpose:</label>
                    <textarea id="purpose" name="purpose" rows="4" cols="50" class="form-control"value="<?php echo $row['scope']; ?>"></textarea>
               
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">funding:</label>
                    <input type="text" name="funding" class="form-control" placeholder="Enter your funding"value="<?php echo $row['funding']; ?>">
                  
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">planned completion days:</label>
                    <input type="text" name="plandays" class="form-control" placeholder="Enter your completion days"value="<?php echo $row['plandays'];  ?>">
               
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">current costing:</label>
                    <input type="text" name="currentcost" class="form-control" placeholder="Enter your Name"value="<?php echo $row['currentcost'];  ?>">
     
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">impl end date:</label>
                    <input type="date" name="impldate" class="form-control" placeholder="Enter your Name"value="<?php echo $row['impldat'] ;?>">
               
                </div>
            </div>
      </form>

<?php
include 'footer.php';
?>