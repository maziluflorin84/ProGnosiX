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
		if($error == 'Success!')
			$output[] = '<p style="color: #66cc66; font-size: 12px; font-weight: bold;">'.$error.'</p>';
		else
			$output[] = '<p style="color: #ff6666; font-size: 12px; font-weight: bold;">'.$error.'</p>';
	}
	return implode('', $output);
}

function professor_courses($data, $user_id) {
	global $mysqli;
	$result = $mysqli->query("SELECT * FROM `courses`");
	$rows = array();
//	$ids = array();
	while ($row = $result->fetch_assoc()) {
		$head_prof_id = $row['head_prof_id'];
		if ($head_prof_id == $user_id) {
			$row['head_prof_name'] = $data['first_name'].' '.$data['last_name'];
			$rows[] = $row;
		} else {
			$head_profs = $mysqli->query("SELECT * FROM `professors` WHERE `ID` = '$head_prof_id'");
			while ($head_prof = $head_profs->fetch_assoc())
				$row['head_prof_name'] = $head_prof['first_name'].' '.$head_prof['last_name'];
			$ids = explode(';', $row['assist_prof_ids']);
			foreach ($ids as $value)
				if ($value == $user_id)
					$rows[] = $row;
		}
	}
	return (isset($rows) ? $rows : false);
}

function update_courses() {
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
		} elseif(is_numeric($course_ev_no) === false || is_numeric($seminar_ev_no) === false || is_numeric($project_ev_no) === false) {
			$errors[] = 'Evaluations must have numeric values!';
		} else {
			$update = $mysqli->query("UPDATE `courses` SET `course_name` = '$course_name', `course_ev_no` = '$course_ev_no', `seminar_ev_no` = '$seminar_ev_no', `project_ev_no` = '$project_ev_no' WHERE `course_id` = '$course_id'");
			if ($update) $errors[] = 'Success!';
			else{
				$errors[] = 'Wrong old password!';
			}
		}
	}
	return $errors;
}

function student_class_year($class_id) {
	global $mysqli;
	$class_id_rows = array();
	$results=$mysqli->query("SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
	while($rows = $results->fetch_assoc()){
		$class_id_rows = $rows;
	}
	$year = $class_id_rows['class_year'];
	return $year;
}

function student_courses($year) {
	global $mysqli;
	$results=$mysqli->query("SELECT `course_id`, `course_name` FROM `courses` WHERE `year` = '$year'");
	$course_rows = array();
	if($results)
		while($course_data = $results->fetch_assoc())
			$course_rows[] = $course_data;
	return $course_rows;
}