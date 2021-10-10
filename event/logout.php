<?php
require_once("dbconnect.php");
session_start();
unset($_SESSION["user"]);
unset($_SESSION["admin"]);
session_destroy();
echo "boo";
if(isset($_SESSION["user"]) || isset($_SESSION["admin"]) == null){
	echo "boo boo";
}
header("Location:index.php")
?>