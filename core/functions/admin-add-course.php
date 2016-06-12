<?php

global $mysqli;
$course_id = $_POST['course_id'];
$course_name = sanitize($_POST['course_name']);
$course_ev_no = sanitize($_POST['course_ev_no']);
$seminar_ev_no = sanitize($_POST['seminar_ev_no']);
$project_ev_no = sanitize($_POST['project_ev_no']);
$errors = array();
if (empty($course_name) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($course_name) > 128) {
		$errors[] = 'Course name too long!';
	} elseif (is_numeric($course_ev_no) === false || is_numeric($seminar_ev_no) === false || is_numeric($project_ev_no) === false) {
		$errors[] = 'Evaluations must have numeric values!';
	} else {
		$update = $mysqli->query("UPDATE `courses` SET `course_name` = '$course_name', `course_ev_no` = '$course_ev_no', `seminar_ev_no` = '$seminar_ev_no', `project_ev_no` = '$project_ev_no' WHERE `course_id` = '$course_id'");
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Wrong old password!';
		}
	}
}
return $errors;