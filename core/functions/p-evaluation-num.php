<?php
include '../init.php';
global $mysqli;

$course_id = intval($_GET['val1']);
$evaluation_type = $_GET['val2'];

switch($evaluation_type) {
	case 'course_ev':
		$results = $mysqli->query("SELECT `course_ev_no` FROM `courses` WHERE `course_id` = '$course_id'");
		break;
	case 'seminar_ev':
		$results = $mysqli->query("SELECT `seminar_ev_no` FROM `courses` WHERE `course_id` = '$course_id'");
		break;
	case 'project_ev':
		$results = $mysqli->query("SELECT `project_ev_no` FROM `courses` WHERE `course_id` = '$course_id'");
		break;
}

if ($results)
	while ($eval_row = $results->fetch_assoc())
		foreach ($eval_row AS $value)
			$eval_no = $value;

if ($eval_no != 0) {
	echo 'Select Evaluation Number:<br>'.
			'<select name="number">';
	for ($i=1; $i<=$eval_no; $i++)
		echo '<option value="'.$i.'">'.$i.'</option>';
	echo '</select>';

} else {
	echo 'There is no evaluation available for this type';
}