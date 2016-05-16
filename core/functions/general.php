<?php
function sanitize($data) {
	global $mysqli;
	return $mysqli->real_escape_string($data);
}
function return_name($user_id, $account_type) {
	global $mysqli;
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT `first_name`, `last_name` FROM `admin` WHERE `ID` = '$user_id'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT `first_name`, `last_name` FROM `professors` WHERE `ID` = '$user_id'");
			break;

		case 'students':
			$result = $mysqli->query("SELECT `first_name`, `last_name` FROM `students` WHERE `ID` = '$user_id'");
			break;
	}
	$names = $result->fetch_array();
	$name = $names['first_name']." ".$names['last_name'];
	return $name;
}