<?php
include 'header.php';
include 'navbar.php';
include 'dbConnection.php';
include 'function.php';
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Code</th>
      <th scope="col">procurementcode</th>
      <th scope="col">date initiation</th>
      <th scope="col">project implementor</th>
      <th scope="col">project coordinator</th>
      <th scope="col">project purpose</th>
      <th scope="col">plan costing</th>
      <th scope="col">implementdate</th>
      <th scope="col">projectname</th>
      <th scope="col">cost and initialization</th>
      <th scope="col">project manager</th>
      <th scope="col">purpose</th>
      <th scope="col">funding</th>
      <th scope="col">plan completion days</th>
      <th scope="col">current costing</th>
      <th scope="col">implemenationenddays</th>
      <th scope="col">update</th>
    </tr>
  </thead>

  <?php    

$sql = "SELECT * FROM `newdetails` WHERE 1";
$result = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($result)){
?>

     <tbody>
    <tr>
        <td><?= $row['id'] ?></th>
        <td><?= $row['code'] ?></td>
        <td><?= $row['procode'] ?></td>
        <td><?= $row['dateini'] ?></td>
        <td><?= $row['proimp'] ?></td>
        <td><?= $row['coordinater'] ?></td>
        <td><?= $row['purpose'] ?></td>
        <td><?= $row['cost'] ?></td>
        <td><?= $row['datess'] ?></td>
        <td><?= $row['names'] ?></td>
        <td><?= $row['costini'] ?></td>
        <td><?= $row['manager'] ?></td>
        <td><?= $row['scope'] ?></td>
        <td><?= $row['funding'] ?></td>
        <td><?= $row['plandays'] ?></td>
        <td><?= $row['currentcost'] ?></td>
        <td><?= $row['impldate'] ?></td>

        <td>
        <td><a class="btn btn-primary" href="update1.php?update=<?php echo $row['id']; ?>" role="button">update</a></td>


    </tr>
</tbody>

<?php
}
echo '</table>';
?>

<?php
include 'footer.php';
?>
