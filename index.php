<?php

//connection

    require( "includes/connection.php");

    require( "includes/session.php");

    //call confirm logged in

    confirm_logged_in();

    $session_email =$_SESSION['email'];

    //fetch
    $query ="SELECT *  FROM budgetusers_tbl WHERE email ='$session_email'";
    $result = mysqli_query ($conn, $query) OR DIE (mysqli_error($conn));

     while ($row = mysqli_fetch_array($result)){
     	$session_userid = $row['id'];
     	$session_firstname = $row['firstname'];
     	$session_lastname = $row['lastname'];

     }

     //echo '<h2>WELCOME '.$session_firstname.' '.$session_lastname.'</h2>';

     //echo '<a href="logout.php">Logout</a>';

?>


<?php
if (isset($_POST['btn_add'])) {
	$itemname= $_POST['itemname'];
  $itemcost= $_POST['itemcost'];

	$query="INSERT INTO budgetitems_tbl (itemname,itemcost)VALUES('$itemname',' $itemcost')";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>budget item</title>
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
	    <div class="col-md-8">
	   <div class="blac">

	    <?php
	     echo '<h2>WELCOME '.$session_firstname.' '.$session_lastname.'</h2>';

         echo '<a href="logout.php">Logout</a>';
	    ?>

		    <center><h3>Budget item</h3></center>
		        <?php
if (isset($_POST['btn_add'])) {
	$itemname=$_POST['itemname'];
	 $itemcost=$_POST['itemcost'];
}
?>
<form action="index.php" method="post">

	<label>Item name</label>
	<input type="text" name="itemname" class="form-control">
    
    <label>Item cost</label>
	<input type="text" name="itemcost" class="form-control"><br>

	<input type="submit" name="btn_add" class="btn-black" style="width: 100%;">

	</form>

<table>


	<thead>
		<tr style="font-weight: bold;">
			<td>Budget item</td>
			<td>Cost</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
$query="SELECT*FROM budgetitems_tbl";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo '<td>'. $row['itemname']. '</td>';
echo '<td>'. $row['itemcost']. '</td>';
echo '<td><a class="btn btn-primary btn-sm" href="edit.php?id='.$row['id'].'">edit</a>
	<a class="btn btn-danger btn-sm"  href="index.php?deleteid='.$row['id'].'"onclick="return confirm (\'delete?\');">delete</a></td>';
echo '</tr>';
}
if (isset($_GET['deleteid'])){
	$deleteid=$_GET['deleteid'];
	$query="DELETE FROM budgetitems_tbl WHERE id=$deleteid";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	header('Location:index.php');

}

		?>
	</tbody>
</table>

	</div>
	</div>
	    <div class="col-md-2"></div>
</div>



</body>
</html>