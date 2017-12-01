<?php

require( "includes/connection.php");

?>


<?php

if(isset($_GET['id'])) {
  $selectedid=$_GET['id'];
}

elseif (isset($_POST['btn_update'])) {
  $id= $_POST['id'];
  $itemname= $_POST["itemname"];
  $itemcost= $_POST["itemcost"];
  $query="UPDATE budgetitems_tbl SET itemname= '{$itemname}',itemcost= '{$itemcost}' WHERE id= $id";
  $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
  header("Location: edit.php");
}

else{
  header("Location: index.php");
}
  //fetch
  $query="SELECT * FROM budgetitems_tbl WHERE id=$selectedid";
  $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
  while ($row=mysqli_fetch_array($result)) {
       echo $itemname=$row['itemname'];
       echo $itemcost=$row['itemcost'];
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>

 <div class="row">
 	<div class="col-md-2"></div>
 	<div class="col-md-8" style="margin-top: 10%;">
  <center><div class="blac" style="padding-top: 8%;">

  <!-- form2 start -->
  <form  method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $selectedid; ?>">
    <input type="text" name="itemname" class="form-control" value="<?php echo $itemname; ?>" placeholder="Enter item name"><br>
    <input type="text" name="itemcost" class="form-control" value="<?php echo $itemcost; ?>" placeholder="Enter item cost"><br>
    <input type="submit" name="btn_update" value="Update" class="btn btn-primary">
    <input type="submit" name="btn btn_danger" value="Cancel" class="btn btn-danger">
  </form>
  <!-- form2 collapse -->

  </div>
  </div></center>
 	<div class="col-md-2"></div>
 </div>
</body>
</html>