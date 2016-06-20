<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
global $mysqli;
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$user_id = $_SESSION['user_id'];
$class_id = $data['class_id'];
$year = student_class_year($class_id);
$course_rows = student_courses($year);

?>
<div class="side-form-left">
	<h2>Guess Grade</h2>
	<h3 >Active sessions:</h3>
	<div>
		<form method="post" action="	">
			<div class="select-grades">
				<select name="course_id">
					<option selected disabled="Course Name">Course Name</option>
					<?php
					foreach ($course_rows as $course_row) {
						if(empty($_POST) === false){
							if($course_row['course_id'] == $_POST['course_id']){
								echo '<option value="'.$course_row['course_id'].'" selected>'.$course_row['course_name'].'</option>';
							} else {
								echo '<option value="'.$course_row['course_id'].'">'.$course_row['course_name'].'</option>';
							}
						}
						echo '<option value="'.$course_row['course_id'].'">'.$course_row['course_name'].'</option>';
					}
					?>
				</select>
			</div>
			<div class="select-grades">
				<select name="evaluation_type">
					<option selected disabled="Evaluation Type">Evaluation Type</option>
					<option value="course_ev" <?php echo ((empty($_POST) === false) && $_POST['evaluation_type'] == 'course_ev') ? ' selected' : ''; ?>>Course Evaluation</option>
					<option value="seminar_ev" <?php echo ((empty($_POST) === false) && $_POST['evaluation_type'] == 'seminar_ev') ? ' selected' : ''; ?>>Seminar Evaluation</option>
					<option value="project_ev" <?php echo ((empty($_POST) === false) && $_POST['evaluation_type'] == 'project_ev') ? ' selected' : ''; ?>>Project Evaluation</option>

				</select>
			</div>
			<div class="select-grades">
				<input type="submit" value="Show Sessions">
			</div>
		</form>
	</div>

	<div>
		<?php
		if (empty($_POST) === false){
			$course_id = $_POST['course_id'];
			$evaluation_type = $_POST['evaluation_type'];
			$results=$mysqli->query("SELECT * FROM `evaluations` WHERE `course_id` = '$course_id' AND `type` = '$evaluation_type' AND `activate` = 1 ");
			$evaluations = array();
			while($row = $results->fetch_assoc()){
				$evaluations[] = $row;
			}
			if(empty($evaluations) === false){
				echo '<table class="table-data grades-table-data" cellspacing="0">';
				echo '<tr>';
				echo '<th>Course name</th>';
				echo '<th>Evaluation Type</th>';
				echo '<th>Evaluation Number</th>';
				echo '<th>Guess your Grade</th>';
				echo '</tr>';
				foreach ($evaluations as $row) {
					echo '<tr>';
					$evaluation_number = $row['number'];
					$course_data = return_course_data($row['course_id']);
					$row['course_name']=$course_data['course_name'];
					echo '<td>'.$row['course_name'].'</td>';
					echo '<td>'.$row['type'].'</td>';
					echo '<td>'.$row['number'].'</td>';
					echo '<td>';

					$results=$mysqli->query("SELECT `student_grade` FROM  `grades` WHERE `course_id` = '$course_id' AND `stud_id` =
					 '$user_id' AND `evaluation_type` = '$evaluation_type' AND `evaluation_no` = '$evaluation_number'");
					$num_rows = $results->num_rows;
					if($num_rows == 1){
						$grade = 0;
						if($results){
							while ($grades = $results->fetch_assoc())
								foreach ($grades AS $stud_grade)
								$grade = $stud_grade;
						}
						//while ($grades = $results->fetch_assoc())
						//		$grade = $value;
						if($grade == 0){
							echo '<input type="submit" value="Grade" onclick=\'guessGrades('.json_encode($row).')\'>';
						} else {
							echo 'You already submited your grade!';
						}
					}
					echo '</td>';
					echo '</tr>';
				}
				echo '</table>';
			} else {
				echo '<div class="wrong-evaluation-type">Please enter a proper evaluation type for the initial course!</div>';
			}
		}
		?>
	</div>
</div>
<div class="side-form-right">
	<div class="side-right-inner">
		<div id="load-form">

		</div>
	</div>
</div>
<?php include 'includes/overall/footer.php' ?>