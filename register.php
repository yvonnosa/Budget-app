<?php

//connection

    require( "includes/connection.php");

?>


<?php
//check if form is submitted
if (isset($_POST['btn_register'])) {// start

  //form data
  $fname = ucfirst(mysqli_escape_string($conn, $_POST['fname']));
  $lname = ucfirst(mysqli_escape_string($conn, $_POST['lname']));
  $email = mysqli_escape_string($conn, $_POST['email']);
  $password = md5($_POST['password']);

  $query = "INSERT INTO budgetusers_tbl (firstname,lastname,email,password) 
  VALUES ('{$fname}','{$lname}','{$email}','{$password}')";

  $result = mysqli_query($conn,$query) OR die(mysqli_error($conn));
  header("Location:login.php?success=true");
 

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

 <script>
function validateForm() {
    var fname = document.myForm.fname.value;
    var lname = document.myForm.lname.value;
    var email = document.myForm.email.value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    var password = document.myForm.password.value;
    var cpassword = document.myForm.cpassword.value;

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }

    if (fname == "") {
        alert("Please enter your firstname");
        return false;
    }

    if (lname == "") {
        alert("Please enter your lastname");
        return false;
    }

    if (password == "") {
        alert("Please enter a valid password");
        return false;
    }

    if (cpassword == "") {
        alert("Please confirm your password");
        return false;
    }
}
</script>

</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">



      
      <center><div class="black">
      <h2><label style=" color: grey;">Registration form</label></h2>
   <form name="myForm" action="register.php" onsubmit="return validateForm()" method="POST">
    
  <input type="text" name="fname" placeholder="Enter firstname" class="form-control"><br>
 
  <input type="text" name="lname" placeholder="Enter lastname" class="form-control"><br>
  
  <input type="text" name="email" placeholder="Enter email" class="form-control"><br>
 
  <input type="password" name="password" placeholder="Enter password" class="form-control"><br>
  
  <input type="password" name="cpassword" placeholder="Confirm password" class="form-control"> <br>
  <input type="submit" name="btn_register" value="Submit" class="btn-black" style="width: 100%;">
  </form>
     </div>
     </center>

      </div>
      <div class="col-md-2"></div>
      

      </div>
    </div>
  
 
</body>
</html>