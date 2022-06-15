<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >

</head>

<body>

<div class="container" ><!-- container Starts -->

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" >User Login</h2>

<input type="text" class="form-control" name="username" placeholder="Username" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Password" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Log in

</button>


</form><!-- form-login Ends -->

</div><!-- container Ends -->



</body>

</html>

<?php

if(isset($_POST['admin_login'])){

$username = mysqli_real_escape_string($con,$_POST['username']);

$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

$get_admin = "select * from admins where username='$username' AND admin_pass='$admin_pass'";

$run_admin = mysqli_query($con,$get_admin);

$row_user = mysqli_fetch_array($run_admin);

$count = mysqli_num_rows($run_admin);

$name = $row_user['username'];

if($count==1){

$_SESSION['name']=$name;

$_SESSION['admin_email']=$username;

echo "<script>alert('You are Logged in into admin panel')</script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}
else {

echo "<script>alert('Email or Password is Wrong')</script>";

}

}

?>