<?php

include '../init.php';
global $mysqli;
$first_name = sanitize($_POST['first_name']);
$parent_init = sanitize($_POST['parent_init']);
$last_name = sanitize($_POST['last_name']);
$email = sanitize($_POST['email']);
$class_year = sanitize($_POST['class_year']);
$class_semi_year = sanitize($_POST['class_semi_year']);
$class_name = sanitize($_POST['class_name']);

$errors = array();
if (empty($first_name) === true || empty($parent_init) === true || empty($last_name) === true || empty($email) === true || empty($class_year) === true || empty($class_semi_year) === true || empty($class_name) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($first_name) > 32 || strlen($parent_init) > 1 || strlen($last_name) > 32 || strlen($email) > 50 ) {
		$errors[] = 'Values are too long!';
	} elseif (is_numeric($first_name) === true || is_numeric($parent_init) === true || is_numeric($last_name) === true) {
		$errors[] = 'Evaluations must have numeric values!';
	} else {
		$results = $mysqli->query("SELECT * FROM `classes` WHERE `class_name` = '$class_name' AND `class_semi_year` = '$class_semi_year' AND `class_year` = '$class_year'");
		$num_rows = $results->num_rows;
		if ($num_rows==1){
			$array=array();
			while($class = $results->fetch_assoc()){
				$array = $class;
			}
			$class_id =$array['class_id'];
		}else {
			$results = $mysqli->query("INSERT INTO `classes` (`class_name`,`class_semi_year`,`class_year`) VALUES ('$class_name', '$class_semi_year', '$class_year')");
			if($results === true){
				$results = $mysqli->query("SELECT * FROM `classes` WHERE `class_name` = '$class_name' AND `class_semi_year` = '$class_semi_year' AND `class_year` = '$class_year'");
				$num_rows = $results->num_rows;
				if ($num_rows==1){
					$array=array();
					while($class = $results->fetch_assoc()){
						$array = $class;
					}
					$class_id = $array['class_id'];
				}
			}
		}
		$length = 10;
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		$password = md5($randomString);
		$update = $mysqli->query("INSERT INTO `students` (`ID`,`class_id`,`first_name`,`parent_init`,`last_name`,`email`,`password`,`confirmed`) VALUES ('', '$class_id', '$first_name', '$parent_init', '$last_name', '$email', '$password', '0')");
		send_email($email, $randomString);
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Error!';
		}
	}
}
//return $errors;
header('Location: ../../a-add.php');
exit();