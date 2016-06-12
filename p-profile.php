<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

$messages = array();
if(empty($_POST) === false) {
	$messages = update_courses();
}
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$user_id = $_SESSION['user_id'];
$rows = professor_courses($data, $user_id);
?>

	<div class="side-form-left">
		<h2>Profile</h2>
		<table class="table-data" cellspacing="0">
			<tr>
				<td style="width: 25%">First Name</td>
				<td><?php echo $data['first_name']; ?></td>
			</tr>
			<tr>
				<td style="width: 25%">Last Name</td>
				<td><?php echo $data['last_name']; ?></td>
			</tr>
			<tr>
				<td style="width: 25%">Email</td>
				<td><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<td style="width: 25%">Activated</td>
				<td><?php echo ($data['confirmed'] == 1 ? 'Yes' : 'No'); ?></td>
			</tr>
		</table>

		<h2>Courses</h2>
		<table class="table-data courses" cellspacing="0">
			<tr>
				<th>Course Name</th>
				<th>Head Professor</th>
				<th>Classes</th>
				<th>Edit Course</th>
			</tr>
			<?php
			$courses_classes = explode(';', $data['course_classes']);
			foreach ($rows as $row) {
				echo
				'<tr>'.
					'<td>'.$row['course_name'].'</td>'.
					'<td>'.$row['head_prof_name'].'</td>';
				foreach ($courses_classes as $course_classes) {
//		to continue!!!!!!!			$co
				}
				echo '<td>'.$data['course_classes'].'</td>';
				if ($row['head_prof_id'] == $user_id)
					echo
					'<td><input type="submit"  onclick=\'addEditForm('.json_encode($row).')\' value="Edit"></td>';
				else
					echo
					'<td>N/A</td>';
				echo
				'</tr>';
			}
			?>
		</table>
	</div>

	<div class="side-form-right">
		<div class="side-right-inner">
			<div id="load-form">
				<?php
				if(!empty($messages))
					echo output_errors($messages);
				?>
			</div>
		</div>
	</div>

<?php include 'includes/overall/footer.php'; ?>