<?php

include '../init.php';
global $mysqli;
$user_id = $_POST['ID'];
$first_name = sanitize($_POST['first_name']);
$parent_init = sanitize($_POST['parent_init']);
$last_name = sanitize($_POST['last_name']);
$email = sanitize($_POST['email']);
$search_type = $_POST['search_type'];

$errors = array();
if (empty($first_name) === true || empty($parent_init) === true || empty($last_name) === true || empty($email) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($first_name) > 32 || strlen($parent_init) > 1 || strlen($last_name) > 32 || strlen($email) > 50 ) {
		$errors[] = 'Values are too long!';
	} elseif (is_numeric($first_name) === true || is_numeric($parent_init) === true || is_numeric($last_name) === true) {
		$errors[] = 'Evaluations must have numeric values!';
	} else {
			if($search_type=='student'){
		$update = $mysqli->query("UPDATE `students` SET
													`first_name` = '$first_name',
													`parent_init` = '$parent_init',
													`last_name` = 'last_name',
													`email` = 'email'
												WHERE `ID` = '$user_id'");
			}
		else{
			$update = $mysqli->query("UPDATE `professors` SET
													`first_name` = '$first_name',
													`parent_init` = '$parent_init',
													`last_name` = 'last_name',
													`email` = 'email'
												WHERE `ID` = '$user_id'");
		}
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Error!';
		}
	}
}
//return $errors;
header('Location: ../../a-users.php');
exit();