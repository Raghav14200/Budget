<?php
$con=mysqli_init();
mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL);
$signup=mysqli_connect("budgetserver.mysql.database.azure.com","budget@budgetserver","password1#","budget") or die(mysqli_error($signup));



?>
