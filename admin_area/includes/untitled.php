<li><!-- li Starts -->

<?php 
	if ($type != 2) {
		echo "<a href='#' data-toggle='collapse' data-target='#cat'>

			<i class='fa fa-fw fa-arrows-v'></i> Categories

			<i class='fa fa-fw fa-caret-down'></i>

		</a>"; 

	} else {
		echo "<a href='index.php?view_cats'> 
				<i class='fa fa-fw fa-eye'></i> View Categories
			</a>"; 

	}
?>


<ul id="cat" class="collapse">

<?php 
	if ($type != 2) {
		echo "<li>
				<a href='index.php?insert_cat'> Add Category </a>
			</li>"; 
	}
?>

<li>
<a href="index.php?view_cats"> View Categories </a>
</li>


</ul>

</li><!-- li Ends -->