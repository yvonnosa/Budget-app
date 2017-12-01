<?php

//connection

    require( "includes/connection.php");


     require( "includes/session.php");

?>

<?php

//check whether form has been submitted
if (isset($_POST['btn_login'])) {//
	//form data
	$email = mysqli_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);

	$query = "SELECT * FROM budgetusers_tbl WHERE email ='$email' AND password = '$password' ";
    $result = mysqli_query ($conn, $query) OR DIE (mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    if ($row > 0) {
    	
    	
    	$_SESSION['email'] =$email;
    	header("Location: index.php");
    }

    else {
    	//no user exists
    	header("Location: login.php?error_login=true");
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

 <script>
function validateForm() {
    var email = document.myForm.email.value;
    

    var password = document.myForm.password.value;

    if (email =="") {
        alert("Please enter email");
        return false;
    }
    
     if (password =="") {
        alert("Please enter a valid password");
        return false;
    }

   

    
}
</script>


</head>
<body>

<div class="container-fluid">

   <!-- <div class="row">
   	    <div class="col-md-2"></div>
   	        <div class="col-md-8">
   	            
   	        </div>

   	    <div class="col-md-2"></div>
   </div> -->

	<div class="row">
		<div class="col-md-2"></div>
		    <div class="col-md-8">
        <center><div class="black">
		        <center><h2><label style="padding-top: 5%;">Login</label></h2></center>

		        <?php if (isset($_GET['success'])) {// ?>
   	                    <div class="alert alert-success ">
                        Registered succesfully
                        </div>

   	                    <?php } // ?>
   	                

   	                     <?php if (isset($_GET['error_login'])) {// ?>
   	                     <div class="alert alert-danger" >
  
                     <strong>danger!</strong> This alert box could indicate a successful or positive action.
                     </div>
   	                    <?php  }// ?>
   	        
			        <form name="myForm" action="login.php" onsubmit="return validateForm()" method="POST">
				        <input type="email" name="email" placeholder="Enter email" class="form-control"><br>

				        <input type="password" name="password" placeholder="Enter password" class="form-control"><br>

				        <input type="submit" name="btn_login" value="Login" class="btn-black" style="width: 100%;">
			        </form>
		    </div>
        </div></center>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>