<?php

include '../init.php';
global $mysqli;
$course_id = $_POST['course_id'];
$course_name = sanitize($_POST['course_name']);
$year = sanitize($_POST['year']);
$semester = sanitize($_POST['semester']);
$head_prof_id = $_POST['professors'];
$assists = $_POST['assist-profs'];
$assist_profs = implode(';',$assists);
$errors = array();
if (empty($course_name) === true || empty($year) === true || empty($semester) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($course_name) > 50) {
		$errors[] = 'Course name too long!';
	} else {
		$update = $mysqli->query("UPDATE `courses` SET
													`course_name` = '$course_name',
													`year` = '$year',
													`semester` = '$semester',
													`head_prof_id` = '$head_prof_id',
													`assist_prof_ids` = '$assist_profs'
												WHERE `course_id` = '$course_id'");
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Error!';
		}
	}
}
//return $errors;
header('Location: ../../a-courses.php');
exit();