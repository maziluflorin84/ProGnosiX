<?php
function sanitize($data) {
	global $mysqli;
	return $mysqli->real_escape_string($data);
}
function return_user_data($user_id, $account_type) {
	global $mysqli;
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT * FROM `admin` WHERE `ID` = '$user_id'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT * FROM `professors` WHERE `ID` = '$user_id'");
			break;

		case 'students':
			$result = $mysqli->query("SELECT * FROM `students` WHERE `ID` = '$user_id'");
			break;
	}
	$data = $result->fetch_array();
	return $data;
}

function output_errors($errors) {
	$output = array();
	foreach ($errors as $error) {
		$output[] = '<li style="color: #ff0000; font-size: 14px;">'.$error.'</li>';
	}
	return implode('', $output);
}