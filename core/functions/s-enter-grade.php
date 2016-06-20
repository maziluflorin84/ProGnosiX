<?php

include '../init.php';
global $mysqli;

$user_ID = $_POST['ID'];
$course_id = $_POST['course_id'];
$evaluation_type = $_POST['evaluation_type'];
$evaluation_no = $_POST['evaluation_no'];
$student_grade = sanitize($_POST['student_grade']);

$errors = array();
if(!is_numeric($student_grade)){
	$errors[] = 'Grades must have numeric values';
	print_r($errors);
} else {
	$update = $mysqli->query("UPDATE `grades` SET `student_grade` = '$student_grade' WHERE `ID` = '$user_ID' AND
																							`course_id` = '$course_id' AND
																							`evaluation_type` = '$evaluation_type' AND
																							`evaluation_no` = '$evaluation_no'");
	if ($update)echo $errors[] = 'Success!';
	else {
		echo $errors[] = 'Error!';
	}
}
//return $errors;
header('Location: ../../s-guess-grade.php');
exit();
