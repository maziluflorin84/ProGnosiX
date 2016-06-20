<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$user_id = $_SESSION['user_id'];
$rows = professor_courses($data, $user_id);
?>
	<div class="side-form-left evaluation-left-side">
		<h2>Evaluation</h2>
		<form method="post" action="">
			<ul id="form-list">
				<li>
					<input type="hidden" name="prof_id" value="<?php echo $user_id; ?>">
					Select Course:<br>
					<select name="course_id" style="width: 250px;" onchange="checkEvalType(this.value);getEvalClasses(this.value);">
						<option selected disabled="Course Name"></option>
						<?php
						foreach ($rows as $row)
							echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
						?>
					</select>
				</li>
				<li id="evaluation-classes">

				</li>
				<li id="evaluation-type">

				</li>
				<li id="evaluation-number">

				</li>
				<li>
					Add maximum grade:<br>
					<input type="text" name="max_grade" value="10" style="width: 30px;">
				</li>
				<li>
					<input type="submit" value="Create and Start">
				</li>
				<?php
				if(empty($_POST) === false) {
					$errors = create_evaluations();
					echo output_errors($errors);
				}
				?>
			</ul>
		</form>
	</div>

	<div class="side-form-right">
		<div class="side-right-inner">
			<div id="load-form">
				<table class="table-data" cellspacing="0">
					<tr>
						<th>Course Name</th>
						<th>Evaluation Type</th>
						<th>Evaluation Number</th>
						<th>Classes</th>
						<th>Start/Stop</th>
					</tr>
					<tr>

					</tr>
				</table>
			</div>
		</div>
	</div>
<?php include 'includes/overall/footer.php' ?>