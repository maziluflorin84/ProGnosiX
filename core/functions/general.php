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

function return_course_data($course_id){
	global $mysqli;
	$result = &$mysqli->query("SELECT * FROM `courses` WHERE `course_id` = '$course_id'");
	$data = $result->fetch_array();
	return $data;
}

function output_errors($messages) {
	$output = array();
	foreach ($messages as $error) {
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

function update_courses($update_from) {
	global $mysqli;
	$course_id = $_POST['course_id'];
	$course_name = sanitize($_POST['course_name']);
	$errors = array();
	if (empty($course_name) === true) {
		$errors[] = 'All fields must be filled!';
	} else {
		if (strlen($course_name) > 128) {
			$errors[] = 'Course name too long!';
		} else {
			$update = true;
			switch($update_from) {
				case "professor":
					$course_ev_no = $_POST['course_ev_no'];
					$seminar_ev_no = $_POST['seminar_ev_no'];
					$project_ev_no = $_POST['project_ev_no'];

					$update = $mysqli->query("UPDATE `courses` SET
													`course_name` = '$course_name',
													`course_ev_no` = '$course_ev_no',
													`seminar_ev_no` = '$seminar_ev_no',
													`project_ev_no` = '$project_ev_no'
												WHERE `course_id` = '$course_id'");
					break;
				case "admin":
					$year = $_POST['year'];
					$semester = $_POST['semester'];
					$head_prof_id = $_POST['professors'];
					$assists = $_POST['assist-profs'];
					$assist_prof_ids = implode(';',$assists);

					$update = $mysqli->query("UPDATE `courses` SET
													`course_name` = '$course_name',
													`year` = '$year',
													`semester` = '$semester',
													`head_prof_id` = '$head_prof_id',
													`assist_prof_ids` = '$assist_prof_ids'
												WHERE `course_id` = '$course_id'");
					break;
			}
			if ($update) $errors[] = 'Success!';
			else{
				$errors[] = $mysqli->error;
			}
		}
	}
	return $errors;
}

function create_evaluations() {
	global $mysqli;
	$course_id = $_POST['course_id'];
	$type = $_POST['type'];
	$number = $_POST['number'];
	$prof_id = $_POST['prof_id'];
	$classes = $_POST['class_id'];
	$class_id = implode(';',$classes);
	$max_grade = $_POST['max_grade'];

	$errors = array();

	$result = $mysqli->query("SELECT `activate` FROM `evaluations` WHERE `course_id` = '$course_id' AND `type` = '$type' AND `number` = '$number'");
	$num_rows = $result->num_rows;
	if ($num_rows == 1) {
		$errors[] = 'Evaluation session already exists';
	} else {
		$update = $mysqli->query("INSERT INTO `evaluations` (`ID`,`course_id`,`type`,`number`,`prof_id`,`class_id`, `max_grade`, `activate`)
													VALUES ('', '$course_id', '$type', '$number', '$prof_id', '$class_id', '$max_grade', 1)");
		if ($update) $errors[] = 'Success!';
		else{
			$errors[] = $mysqli->error;
		}
	}
	return $errors;
//		while ($row = $result->fetch_assoc())
//			foreach ($row AS $value)
//				$activate = $value;
//		return $activate;

	//	$errors = array();
	//
	//
	//
	//
	//	$update = $mysqli->query("UPDATE `evaluations` SET `activate` = '$assist_prof_ids' WHERE `ID` = '$course_id'");
	//
	//	if ($update) $errors[] = 'Success!';
	//	else{
	//		$errors[] = $mysqli->error;
	//	}
	//	return $errors;
}

function return_evaluations($prof_id) {
	global $mysqli;
	$results = $mysqli->query("SELECT * FROM `evaluations` WHERE `prof_id` = '$prof_id'");
	while($row = $results->fetch_assoc()){
//		$row['search_type']=$search_type;
//		$search_result[] = $row;
	}
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

function admin_search_user(){
	global $mysqli;
	$search_form = sanitize($_POST['search_box']);
	$search_type = $_POST['search_type'];
	$search_result = array();
	if (empty($search_form) === true) {
		$errors[] = 'Search field must be filled!';
	} else {
		if ($search_type =="student"){
			$results = $mysqli->query("SELECT `ID`, `first_name`, `parent_init`, `last_name`, `email` FROM `students` WHERE `first_name` LIKE '%$search_form%' OR `last_name` LIKE '%$search_form%'");
		}
		else{
			$results = $mysqli->query("SELECT `ID`, `first_name`, `parent_init`, `last_name`, `email` FROM `professors` WHERE `first_name` LIKE '%$search_form%' OR `last_name` LIKE '%$search_form%'");
		}
		while($row = $results->fetch_assoc()){
			$row['search_type']=$search_type;
			$search_result[] = $row;
		}
	}
	return $search_result;
}

function activeSessionsForm(){
	global $mysqli;
	$search_result = array();
	if (empty($search_form) === true) {
		$errors[] = 'Search field must be filled!';
	} else {
			$results = $mysqli->query("SELECT `course_id`, `type`, `number` FROM `evaluations` WHERE `activate` = 1");
		while($row = $results->fetch_assoc()){
			$search_result[] = $row;
		}
	}
	return $search_result;
}

function admin_search_course(){
	global $mysqli;
	$search_form = sanitize($_POST['search_box']);
	$search_result = array();
	if (empty($search_form) === true) {
		$errors[] = 'Search field must be filled!';
	} else {
			$results = $mysqli->query("SELECT `course_id`, `course_name`, `year`, `semester`, `head_prof_id`, `assist_prof_ids` FROM `courses` WHERE `course_name` LIKE '%$search_form%'");
		}
		while($row = $results->fetch_assoc()){
			$search_result[] = $row;
		}
	return $search_result;
}

function send_email($to, $password) {
	$subject = 'ProGnosiX account created!';
	$body = "There is a new ProGnosiX account created in your name!\r\nTo enter your account, please use the following credentials:\r\n\r\nEmail: ".$to."\r\nPassword: ".$password."\r\n\r\n--\r\nProGnosiX";
	$from = 'From: prognosix.mailing@gmail.ro';
	mail($to, $subject, $body, $from);
}