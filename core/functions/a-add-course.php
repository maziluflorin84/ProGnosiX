<?php

include '../init.php';
global $mysqli;
$course_name = sanitize($_POST['course_name']);
$year = $_POST['year'];
$semester = $_POST['semester'];
$head_prof_id = $_POST['professors'];
$assists = $_POST['assist-profs'];
$assist_profs = implode(';',$assists);
$errors = array();
if (empty($course_name) === true) {
	$errors[] = 'All fields must be filled!';
} else {
	if (strlen($course_name) > 50) {
		$errors[] = 'Course name is too long!';
	}
	else{
		$update = $mysqli->query("INSERT INTO `courses` (`course_id`,`course_name`,`year`,`semester`,`head_prof_id`,`assist_prof_ids`,`course_ev_no`,`seminar_ev_no`,`project_ev_no`)
													VALUES ('', '$course_name', '$year', '$semester', '$head_prof_id', '$assist_profs', '', '', '')");
		if ($update) $errors[] = 'Success!';
		else {
			$errors[] = 'Error!';
		}
	}
}
print_r($errors);
//return $errors;
header('Location: ../../a-add.php');
exit();