<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
global $mysqli;
$results = $mysqli->query("SELECT `ID`,`first_name`,`last_name` FROM `professors`");
$data = array();
if ($results)
	while ($row = $results->fetch_assoc())
		$data[] = $row;

//$results = $mysqli->query("SELECT `course_id`, `course_name` FROM `courses`");
//$course_data = array();
//if ($results)
//	while ($course_row = $results->fetch_assoc())
//		$course_data[] = $course_row;

?>
	<h2>Add</h2>
	<div class="inner">
		<div class="side-form-left">
			<ul id='add-form'>
				<li>
					Choose what to add:<br>
					<label><input type="radio" onclick='addFormStudent();' name="my-radio">student</label>
					<br>
					<label><input type="radio" onclick='addFormProfessor();' name="my-radio">professor</label>
					<br>
					<label><input type="radio" onclick='addFormCourse(<?php echo json_encode($data); ?>);' name="my-radio">course</label>
				</li>
			</ul>
		</div>

		<div class="side-form-right">
			<div class="side-right-inner">
				<div id="load-form">

				</div>
			</div>
		</div>
		<!---->
		<!--            <div id="load-form">-->
		<!---->
		<!--            </div>-->


	</div>
<?php include 'includes/overall/footer.php' ?>