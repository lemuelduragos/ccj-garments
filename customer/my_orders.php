
<center><!-- center Starts -->

<h1>My Orders</h1>

<p class="lead"> Your orders on one place.</p>

<p class="text-muted" >

If you have any questions, please feel free to <a href="../contact.php" > contact us,</a> our customer service center is working for you 24/7.


</p>


</center><!-- center Ends -->

<hr>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover" ><!-- table table-bordered table-hover Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Order Number:</th>
<th>Due Amount:</th>
<th>Qty:</th>
<th>Order Date:</th>
<th>Paid/Unpaid:</th>
<th>Status:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!--- tbody Starts --->

<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$get_orders = "SELECT invoice_no, SUM(due_amount) AS due_amount, SUM(qty) AS qty, ANY_VALUE(order_date) AS order_date, ANY_VALUE(order_status) AS order_status FROM customer_orders where customer_id='$customer_id' GROUP BY invoice_no";

$run_orders = mysqli_query($con,$get_orders);

$i = 0;

while($row_orders = mysqli_fetch_array($run_orders)){

$order_id = $row_orders['invoice_no'];

$due_amount = $row_orders['due_amount'];

$qty = $row_orders['qty'];

$order_date = substr($row_orders['order_date'],0,11);

$order_status = $row_orders['order_status'];

$i++;

echo $order_status;


?>

<tr><!-- tr Starts -->

<td><?php echo $order_id; ?></td>

<td>₱<?php echo $due_amount; ?></td>

<td><?php echo $qty; ?></td>

<td><?php echo $order_date; ?></td>

<td><?php echo $order_status; ?></td>

<td>
<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-primary btn-sm" > Confirm If Paid </a>
</td>


</tr><!-- tr Ends -->

<?php } ?>

</tbody><!--- tbody Ends --->


</table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->



