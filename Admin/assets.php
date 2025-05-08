<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assets</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<?php
define('TITLE', 'Assests');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php'); 
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
<input id="myInput" class="mb-5 form-control" type="text" placeholder="Search..">

  <!--Table-->
  <p class=" bg-dark text-white p-2">Product/Parts Details</p>
  <?php
    $sql = "SELECT * FROM assets_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">DOP</th>
        <th scope="col">Available</th>
        <th scope="col">Total</th>
        <th scope="col">Original Cost Each</th>
        <th scope="col">Selling Price Each</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="myTable">';
    while($row = $result->fetch_assoc()){
      echo '<tr>
        <th scope="row">'.$row["pid"].'</th>
        <td>'.$row["pname"].'</td>
        <td>'.$row["pdop"].'</td>
        <td>'.$row["pava"].'</td>
        <td>'.$row["ptotal"].'</td>
        <td>'.$row["poriginalcost"].'</td>
        <td>'.$row["psellingcost"].'</td>
        <td>
          <form action="editproduct.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["pid"] .'><button type="submit" class="btn btn-info" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["pid"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
          <form action="sellproduct.php" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["pid"] .'><button type="submit" class="btn btn-success" name="issue" value="Issue"><i class="fas fa-handshake"></i></button></form>
        </td>
      </tr>';
    }
    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>
</div>
<a class="btn btn-danger box" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('includes/footer.php'); 
?>
</body>
</html>
