<?php 
include("db_connect.php");
$title = mysqli_real_escape_string($con,$_POST['title']);
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$cnum = mysqli_real_escape_string($con,$_POST['cnum']);
$distric = mysqli_real_escape_string($con,$_POST['distric']);



$sqlinset ="INSERT INTO `customer`(`title`, `first_name`, `middle_name`, `last_name`, `contact_no`, `district`) VALUES ('$title','$fname','','$lname','$cnum','$distric')";
$result = mysqli_query($con,$sqlinset);



if ($result) {
	echo "Succeessfully Submited";
}else{
	echo "Insert Correct Details";
}
?>