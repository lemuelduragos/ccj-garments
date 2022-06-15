<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

if ($_SESSION['customer_email']) {
	echo "fail";
}

if(isset($_POST['register'])){

	$params = $_POST['register'];

	$c_name = $params['name'];

	$c_email = $params['email'];

	$c_image = $params['picture']['url'];

	$c_token = $params['token'];

	$c_ip = getRealUserIp();

	$select_customer = "select * from customers where customer_email='$c_email'";

	$run_customer = mysqli_query($con,$select_customer);

	$check_customer = mysqli_num_rows($run_customer);

	if($check_customer==0){

		$insert_customer = "insert into customers (customer_name,customer_email,customer_image, customer_ip ,facebook_token) values ('$c_name','$c_email','$c_image', '$c_ip', '$c_token')";

		$run_customer = mysqli_query($con,$insert_customer);

		$sel_cart = "select * from cart where ip_add='$c_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		$_SESSION['customer_email']=$c_email;

		echo "success";
	} else {
		$_SESSION['customer_email'] = $c_email;

		echo "success";

	}
}

?>