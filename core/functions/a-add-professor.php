<?php

include '../init.php';
global $mysqli;
$first_name = sanitize($_POST['first_name']);
$parent_init = sanitize($_POST['parent_init']);
$last_name = sanitize($_POST['last_name']);
$email = sanitize($_POST['email']);
$errors = array();
if (empty($first_name) === true || empty($parent_init) === true || empty($last_name) === true || empty($email) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($first_name) > 32 || strlen($parent_init) > 1 || strlen($last_name) > 32 || strlen($email) > 50 ) {
		$errors[] = 'Values are too long!';
	} elseif (is_numeric($first_name) === true || is_numeric($parent_init) === true || is_numeric($last_name) === true) {
		$errors[] = 'Evaluations must have numeric values!';
	} else {
		$password = md5('prognosix');
		$update = $mysqli->query("INSERT INTO `professors` (`ID`,`first_name`,`parent_init`,`last_name`,`email`,`password`,`course_classes`,`confirmed`) VALUES ('', '$first_name', '$parent_init', '$last_name', '$email', '$password','', '0')");
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Error!';
		}
	}
}
//return $errors;
header('Location: ../../a-add.php');
exit();