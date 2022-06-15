<script type="text/javascript">
	window.onload = function() {
	  logout();
	};
</script>
<?php

session_start();

session_destroy();

echo "<script>window.open('index.php','_self')</script>";


?>