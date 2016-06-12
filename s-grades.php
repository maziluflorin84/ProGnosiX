<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
global $mysqli;
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);

$class_id = $data['class_id'];
$year = student_class_year($class_id);
$course_rows = student_courses($year);

if (empty($_POST) === false){
	$course_id = $_POST['course_id'];
	$evaluation_type = $_POST['evaluation_type'];
	$results=$mysqli->query("SELECT * FROM `grades` WHERE `course_id` = '$course_id' AND `evaluatio_type` = '$evaluation_type' ");
	$grades = array();
	if($results){
		while($rows = $results->fetch_assoc()){
			$grades[] = $rows;
		}
		print_r($grades);
	}
}
?>

    <h2>Students Page - Grades</h2>
    <form method="post" action="">
		<div class="select-grades">
			<select name="course_id">
				<option selected disabled="Course Name">Course Name</option>
				<?php
					foreach ($course_rows as $course_row) {
						echo '<option value="'.$course_row['course_name'].'">'.$course_row['course_name'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="select-grades">
			<select name="evaluation_type">
				<option selected disabled="Evaluation Type">Evaluation Type</option>
				<option value="course_ev">Course Evaluation</option>
				<option value="seminar_ev">Seminar Evaluation</option>
				<option value="project_ev">Project Evaluation</option>
<!--					--><?php
//					foreach ($evaluation_type as $results_evaluation_type) {
//						echo '<option value="'.$evaluation_type['evaluation_type'].'">'.$evaluation_type['evaluation_type'].'</option>';
//					}
//					?>
			</select>
		</div>
		<div class="select-grades">
			<input type="submit" value="Show Grades">
		</div>
    </form>




<?php include 'includes/overall/footer.php' ?>