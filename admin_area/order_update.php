<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

$order_id = @$_GET['order_update'];

$get_order = "select custom_product.product_img1 AS 'custom_img', pending_orders.* from pending_orders left join custom_product ON custom_product.product_id=pending_orders.custom_prod_id where order_id='$order_id'";

$run_order = mysqli_query($con,$get_order);

$check_order = mysqli_num_rows($run_order);

$product = mysqli_fetch_array($run_order);

$product_id = $product['product_id'];

$quantity = $product['qty'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$custom_img = $product['custom_img'];

if ($custom_img) {
  $pro_img1 = $custom_img;
} else {
  $pro_img1 = $row_products['product_img1'];
}

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3'];

$pro_label = $row_product['product_label'];

$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];



?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> View Orders / Update Order

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-wrench"></i> Update Order

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->

<center>
	
<div class="form-group"><!-- form-group Starts -->



<img src="product_images/<?php echo $pro_img1; ?>" class="img-responsive" >
<br>


<label class="col-md-5 control-label" >Product Quantity </label>

<div class="col-md-3" ><!-- col-md-7 Starts -->

<input type="text" value="<?php echo $quantity; ?>" disabled="true" name="product_qty" class="form-control" >

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Order Status</label>

<div class="col-md-3" ><!-- col-md-7 Starts -->

<select required="true" name="order_status" class="form-control" >

<option value="" >Select Status</option>
<option>Confirmed</option>
<option>Order in Progress</option>
<option>To Ship</option>
<option>Shipped</option>
<option>Complete</option>

</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->



<button class="btn btn-warning" type="submit" name="update_order">

<i class="fa fa-shopping-cart" ></i> Update

</button>

</div>


</center>

</form><!-- form-horizontal Ends -->



</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 

<?php

}

if(isset($_POST['update_order'])) {

$status = $_POST['order_status'];



$get_payment_invoice = "select invoice_no from pending_orders where order_id=$order_id";

$run_get_invoice= mysqli_query($con,$get_payment_invoice);

$row_invoice = mysqli_fetch_array($run_get_invoice);


$update_order = "update pending_orders set order_status='$status' where invoice_no='$row_invoice[0]'";

$run_update = mysqli_query($con,$update_order);


$update_order = "update customer_orders set order_status='$status' where invoice_no='$row_invoice[0]'";

$run_update= mysqli_query($con,$update_order);


if($run_update){

echo "<script>alert('Order Has Been Udpated')</script>";

echo "<script>window.open('index.php?view_orders','_self')</script>";

}

else {

echo "<script>alert('Failed to update order')</script>";

}

}
?>