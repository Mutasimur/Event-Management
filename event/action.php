<?php
require_once("dbconnect.php");
if (isset($_POST['submit'])) {

	// $file=$_FILES['file'];

	// print_r($file);
	// $file_name=$_FILES['file']['name'];
	// $file_tem=$_FILES['file']['tmp_name'];
	// $file_name=$_FILES['file']['name'];
	// $file_ext=explode('.',$file_name);
	// $fileacext=strtolower(end($file_ext));
	// echo $file_name;

	// $allowed=array('jpg','jpeg','png');
	// echo $_FILES['file']['error'];
	// if (in_array($fileacext, $allowed)) {
	// 	echo "you can not";
	// }
	// $filenamenw=uniqid('',true).".".$fileacext;
	// $fileloc='pic/'.$filenamenw;
	// move_uploaded_file($file_tem, $fileloc);
	//header("location:upload1.php?uploadSuccess");
    $sql = "INSERT INTO `venue`(`v_id`, `v_name`, `email`, `address`, `phone_no`, `bank_info`, `cost`, `capacity`, `date`, `vtime`, `booked`) VALUES ('$_POST[vid]','$_POST[vname]','$_POST[vmail]','$_POST[vaddress]','$_POST[vnumber]','$_POST[vbank]','$_POST[vcost]','$_POST[vcapacity]','$_POST[vdate]','$_POST[vtime]',0)";
  	echo "hoise";
  	$conn->query($sql);

    header("Location:upload1.php?insertSuccessful");
}
?>