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


?>

    <h2>Students Page - Grades</h2>
	<div>
		<form method="post" action="">
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
				<input type="submit" value="Show Grades">
			</div>
		</form>
	</div>

	<div>
		<?php
		if (empty($_POST) === false){
			$course_id = $_POST['course_id'];
			$evaluation_type = $_POST['evaluation_type'];
			$results=$mysqli->query("SELECT * FROM `grades` WHERE `course_id` = '$course_id' AND `evaluation_type` = '$evaluation_type' ");
			$grades = array();
			while($row = $results->fetch_assoc()){
				$grades[] = $row;
			}

			if(empty($grades) === false){
				echo '<table class="table-data" cellspacing="0">';
				echo '<tr>';
					echo '<th>Evaluation Number</th>';
					echo '<th>Professor Grade</th>';
					echo '<th>Student Grade</th>';
					echo '<th>Final Grade</th>';
				echo '</tr>';
				foreach ($grades as $row) {
					echo '<tr>';
						echo '<td>'.$row['evaluation_no'].'</td>';
						echo '<td>'.$row['prof_grade'].'</td>';
						echo '<td>'.$row['student_grade'].'</td>';
						echo '<td>'.$row['final_grade'].'</td>';
					echo '</tr>';
				}
				echo '</table>';
			} else {
				echo "<p style='color: red;'>"."Please enter a proper evaluation type for the initial course!"."</p>";
			}
		}
		?>
	</div>


<?php include 'includes/overall/footer.php' ?>