<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else {

if ($type == 1) {
	$role = "Admin";
} else if ($type == 2) {
	$role = "Manager";
} else {
	$role = "Staff";
}


?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?view_products" >Welcome <?php echo $_SESSION['name'] ?></a>

</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

</li><!-- li Ends -->

<li><!-- Products li Starts -->

<?php 
	if ($type != 2) {
		echo "<a href='#' data-toggle='collapse' data-target='#products'>

				<i class='fa fa-fw fa-table'></i> Products

				<i class='fa fa-fw fa-caret-down'></i>


			</a>"; 

	} else {
		echo "<a href='index.php?view_products'> 
				<i class='fa fa-fw fa-eye'></i> View Products
			</a>"; 

	}
?>


<ul id="products" class="collapse">

<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_product'> Add Products </a>
			</li>"; 
	}
?>


<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?view_products'> View Products </a>
			</li>"; 
	}
?>

</ul>

</li><!-- Products li Ends -->

<li><!-- Bundles Li Starts --->

<?php 
	if ($type != 2) {
		echo "<a href='#' data-toggle='collapse' data-target='#bundles'>

				<i class='fa fa-fw fa-edit'></i> Bundles

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 

	} else {
		echo "<a href='index.php?view_bundles'> 
				<i class='fa fa-fw fa-eye'></i> View Bundles
			</a>"; 

	}
?>



<ul id="bundles" class="collapse">

<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_bundle'> Add Bundle </a>
			</li>"; 
	}
?>

<li>
<a href="index.php?view_bundles"> View Bundles </a>
</li>




<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_rel'> Assign Products to Bundle </a>
			</li>"; 
	}
?>

</ul>

</li><!-- bundle li Ends -->

<li><!-- manufacturer li Starts -->

<?php 
	if ($type == 0) {
		echo "<a href='#' data-toggle='collapse' data-target='#manufacturers'><!-- anchor Starts -->

				<i class='fa fa-fw fa-briefcase'></i> Manufacturers

				<i class='fa fa-fw fa-caret-down'></i>


			</a>"; 
	}
?>
<!-- anchor Ends -->

<ul id="manufacturers" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_manufacturer"> Add Manufacturer </a>
</li>

<li>
<a href="index.php?view_manufacturers"> View Manufacturers </a>
</li>

</ul><!-- ul collapse Ends -->


</li><!-- manufacturer li Ends -->


<li><!-- li Starts -->

<?php 
	if ($type != 2) {
		echo "<a href='#' data-toggle='collapse' data-target='#p_cat'>

				<i class='fa fa-fw fa-pencil'></i> Products Categories

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 

	} else {
		echo "<a href='index.php?view_p_cats'> 
				<i class='fa fa-fw fa-eye'></i> View Products Categories
			</a>"; 

	}
?>

<ul id="p_cat" class="collapse">

<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_p_cat'> Add Product Category </a>
			</li>"; 
	}
?>

<li>
<a href="index.php?view_p_cats"> View Products Categories </a>
</li>


</ul>

</li><!-- li Ends -->


<li><!-- store section li Starts -->

<?php 
	if ($type != 2) {
		echo "<a href='#' data-toggle='collapse' data-target='#store'>

				<i class='fa fa-fw fa-briefcase'></i> Brands

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 

	} else {
		echo "<a href='index.php?view_store'> 
				<i class='fa fa-fw fa-eye'></i> View Brands
			</a>"; 

	}
?>


<ul id="store" class="collapse">

<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_store'> Add Brands </a>
			</li>"; 
	}
?>


<li>
<a href="index.php?view_store"> View Brands </a>
</li>

</ul>

</li><!-- store section li Ends -->


<li><!-- contact us li Starts -->

<?php 
	if ($type == 1) {
		echo "<a href='#' data-toggle='collapse' data-target='#contact_us'><!-- anchor Starts -->

				<i class='fa fa-fw fa-pencil'> </i> Contact Us Section

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 
	}
?>

<!-- anchor Ends -->

<ul id="contact_us" class="collapse">

<li>

<a href="index.php?edit_contact_us"> Edit Contact Us </a>

</li>

<li>

<a href="index.php?insert_enquiry"> Add Enquiry Type </a>

</li>

<li>

<a href="index.php?view_enquiry"> View Enquiry Types </a>

</li>

</ul>

</li><!-- contact us li Ends -->

<li><!-- about us li Starts -->

<?php 
	if ($type == 1) {
		echo "<a href='index.php?edit_about_us'>

				<i class='fa fa-fw fa-edit'></i> Edit About Us Page

			</a>"; 
	}
?>

</li><!-- about us li Ends -->


<li><!-- terms li Starts -->

<?php 
	if ($type != 3) {
		echo "<a href='#' data-toggle='collapse' data-target='#terms' ><!-- anchor Starts -->

				<i class='fa fa-fw fa-table'></i> Terms

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 
	}
?>
<!-- anchor Ends -->

<ul id="terms" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_term"> Add Terms </a> 
</li>

<li>
<a href="index.php?view_terms"> View Terms </a> 
</li>

</ul><!-- ul collapse Ends -->


</li><!-- terms li Ends -->



<li>

<a href="index.php?view_customers">

<i class="fa fa-fw fa-edit"></i> View Customers

</a>

</li>

<li>

<a href="index.php?view_orders">

<i class="fa fa-fw fa-list"></i> View Orders

</a>

</li>

<li>

<a href="index.php?view_payments">

<i class="fa fa-fw fa-pencil"></i> View Payments

</a>

</li>

<li><!-- li Starts -->

<?php 
	if ($type == 1) {
		echo "<a href='#' data-toggle='collapse' data-target='#users'>

				<i class='fa fa-fw fa-gear'></i> Users

				<i class='fa fa-fw fa-caret-down'></i>

			</a>"; 

	}
?>

<ul id="users" class="collapse">


<?php 
	if ($type == 1) {
		echo "<li>
				<a href='index.php?insert_user'> Insert User </a>
			</li>"; 
	}
?>

<?php 
	if ($type == 1) {
		echo "<li>
				<a href='index.php?view_users'> View Users </a>
			</li>"; 
	}
?>

</ul>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>