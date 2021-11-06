<?php 
include("db_connect.php");
$icode = mysqli_real_escape_string($con,$_POST['icode']);
$iname = mysqli_real_escape_string($con,$_POST['iname']);
$icat = mysqli_real_escape_string($con,$_POST['icat']);
$isubcat = mysqli_real_escape_string($con,$_POST['isubcat']);
$quantity = mysqli_real_escape_string($con,$_POST['quantity']);
$uprice = mysqli_real_escape_string($con,$_POST['uprice']);



$sqlinset ="INSERT INTO `item`(`item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) VALUES ('$icode','$icat','$isubcat','$iname','$quantity','$uprice')";
$result = mysqli_query($con,$sqlinset);


if ($result) {
	echo "Succeessfully Submited";
}else{
	echo "Insert Correct Details";
}
?>