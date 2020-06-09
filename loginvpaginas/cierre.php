<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>

<?php
session_start();

session_destroy();

header("location:login.php");
?>



</body>
</html>