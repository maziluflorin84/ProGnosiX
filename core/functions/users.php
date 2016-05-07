<?php
function logged_in() {
	return (isset($_SESSION['user_id']) && isset($_SESSION['account_type'])) ? true : false;
}

function user_exists($email, $account_type) {
	global $mysqli;
	$email = sanitize($email);
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT * FROM `admin` WHERE `email` = '$email'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT * FROM `professors` WHERE `email` = '$email'");
			break;

		case 'students':
			$result = $mysqli->query("SELECT * FROM `students` WHERE `email` = '$email'");
			break;
	}
	$num_rows = $result->num_rows;
	return ($num_rows == 1) ? true : false;
}

function user_active($email, $account_type) {
	global $mysqli;
	$email = sanitize($email);
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT * FROM `admin` WHERE `email` = '$email'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT * FROM `professors` WHERE `email` = '$email' AND `confirmed` = 1");
			break;

		case 'students':
			$result = $mysqli->query("SELECT * FROM `students` WHERE `email` = '$email' AND `confirmed` = 1");
			break;
	}
	$num_rows = $result->num_rows;
	return ($num_rows == 1) ? true : false;
}

function user_id_from_email($email, $account_type) {
	global $mysqli;
	$email = sanitize($email);
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT `ID` FROM `admin` WHERE `email` = '$email'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT `ID` FROM `professors` WHERE `email` = '$email'");
			break;

		case 'students':
			$result = $mysqli->query("SELECT `ID` FROM `students` WHERE `email` = '$email'");
			break;
	}
	while ($row = $result->fetch_assoc())
		foreach ($row AS $value)
			$user_id = $value;
	return $user_id;
}

function login($email, $password, $account_type) {
	global $mysqli;
	$ID = user_id_from_email($email, $account_type);

	$email = sanitize($email);
	$password = md5($password);
	switch ($account_type) {
		case 'admin':
			$result = $mysqli->query("SELECT `ID` FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");
			break;

		case 'professors':
			$result = $mysqli->query("SELECT `ID` FROM `professors` WHERE `email` = '$email' AND `password` = '$password'");
			break;

		case 'students':
			$result = $mysqli->query("SELECT `ID` FROM `students` WHERE `email` = '$email' AND `password` = '$password'");
			break;
	}
	$num_rows = $result->num_rows;
	return ($num_rows == 1) ? $ID : false;
}