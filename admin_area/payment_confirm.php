<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php

if(isset($_GET['payment_confirm'])){

$confirm_id = $_GET['payment_confirm'];

$get_payment_invoice = "select invoice_no from payments where payment_id=$confirm_id";

$run_get_invoice= mysqli_query($con,$get_payment_invoice);

$row_invoice = mysqli_fetch_array($run_get_invoice);

$confirm = "Confirmed";

$update_payment = "update payments set payment_status='$confirm' where payment_id='$confirm_id'";

$run_udpate = mysqli_query($con,$update_payment);

$update_payment = "update pending_orders set order_status='$confirm' where invoice_no='$row_invoice[0]'";

$run_udpate = mysqli_query($con,$update_payment);

$update_payment = "update customer_orders set order_status='$confirm' where invoice_no='$row_invoice[0]'";

$run_udpate = mysqli_query($con,$update_payment);


if($run_udpate){

echo "<script>alert('Payment Has Been Confirmed')</script>";

echo "<script>window.open('index.php?view_payments','_self')</script>";


}


}



?>




<?php } ?>