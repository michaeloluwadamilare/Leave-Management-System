<?php
session_start();
require_once("app/connect.php");

$staff_id = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['login'])) {
	$sql = "SELECT * FROM staffdetails WHERE staff_id = '$staff_id' AND password = '$password'";
	$query = mysql_query($sql) or die(mysql_error());
	$user = mysql_fetch_array($query);
	if (mysql_num_rows($query)==1) {
		$_SESSION['staff_id'] = $user['staff_id'];
		$_SESSION['passport'] = $user['passport'];
		$_SESSION['name'] = $user['name'];
		$_SESSION['position'] = $user['position'];
		$_SESSION['gender'] = $user['gender'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['level'] = $user['level'];
		$_SESSION['phoneNo'] = $user['phoneNo'];
		$_SESSION['address'] = $user['address'];
		$_SESSION['dob'] = $user['dob'];
		$_SESSION['department'] = $user['department'];
		$_SESSION['faculty'] = $user['faculty'];
		$_SESSION['leavestatus'] = $user['leavestatus'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['staff_type'] = $user['staff_type'];
		header("Location: userpage.php?level=".sha1($user['level'])."");
	}
	else{
		header("Location: stafflogin.php?id=error");

	}
	
}

?>