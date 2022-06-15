<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Payments

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Payments

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal pull-right" method="post"><!-- form-horizontal Starts -->


<input type="text" name="search" class="form-inline" value="<?php echo $_POST['search']?>"  placeholder="Search">


<input type="submit" value="Search" class="btn btn-primary"/>

</form><!-- form-horizontal Ends -->

</br></br>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-hover table-bordered table-striped"><!-- table table-hover table-bordered table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Payment No:</th>
<th>Customer Name:</th>
<th>Invoice No:</th>
<th>Payment Status:</th>
<th>Amount Paid:</th>
<th>Payment Method:</th>
<th>Reference No:</th>
<th>Payment Date:</th>

<?php 
	if ($type != 3) {
		echo "<th>Confirm Payment:</th>";
	}
?>

<?php 
	if ($type != 3) {
		echo "<th>Delete Payment:</th>";
	}
?>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

if(isset($_POST['search'])){
	$query = $_POST['search'];
	$get_payments = "select * from payments INNER JOIN customers ON payments.customer_id = customers.customer_id WHERE customer_name LIKE '%$query%' OR invoice_no LIKE '%$query%' OR payment_mode LIKE '%$query%' OR ref_no LIKE '%$query%' OR payment_status LIKE '%$query%'";
	echo $get_pro;
} else {
	$get_payments = "select * from payments";
}

$i = 0;

$run_payments = mysqli_query($con,$get_payments);

while($row_payments = mysqli_fetch_array($run_payments)){

$payment_id = $row_payments['payment_id'];

$invoice_no = $row_payments['invoice_no'];

$status = $row_payments['payment_status'];

$amount = $row_payments['amount'];

$payment_mode = $row_payments['payment_mode'];

$ref_no = $row_payments['ref_no'];

$code = $row_payments['code'];

$payment_date = $row_payments['payment_date'];

$customer_id = $row_payments['customer_id'];

$i++;


?>


<tr>

<td><?php echo $i; ?></td>


<?php 

$get_customer = "select * from customers where customer_id='$customer_id'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_name = $row_customer['customer_name'];

?>


<td><?php echo $customer_name; ?></td>

<td bgcolor="yellow" ><?php echo $invoice_no; ?></td>

<td><?php echo $status; ?></td>

<td>₱<?php echo $amount; ?></td>

<td><?php echo $payment_mode; ?></td>

<td><?php echo $ref_no; ?></td>

<td><?php echo $payment_date; ?></td>


<?php 
	if ($type != 3) {
		echo "<td> <a href='index.php?payment_confirm=$payment_id'>

				<i class='fa fa-check' ></i> Confirm

			</a> </td>"; 
	}
?>


<?php 
	if ($type != 3) {
		echo "<td> <a href='index.php?payment_delete=$payment_id'>

				<i class='fa fa-trash-o' ></i> Delete

			</a> </td>"; 
	}
?>

</tr>


<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-hover table-bordered table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>