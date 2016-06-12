<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

<<<<<<< HEAD
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$user_id = $_SESSION['user_id'];
$result = $mysqli->query("SELECT * FROM `courses`");
$rows = array();
$ids = array();
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
=======
$messages = array();
if(empty($_POST) === false) {
	$messages = update_courses();
>>>>>>> 7c2153d4f26bfb8b633af07bd91fac84bb145b24
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
<<<<<<< HEAD
		<table class="table-data" cellspacing="0">
=======
		<table class="table-data courses" cellspacing="0">
>>>>>>> 7c2153d4f26bfb8b633af07bd91fac84bb145b24
			<tr>
				<th>Course Name</th>
				<th>Head Professor</th>
				<th>Classes</th>
				<th>Edit Course</th>
			</tr>
			<?php
<<<<<<< HEAD
			foreach ($rows as $prof) {
				echo
				'<tr>'.
					'<td>'.$prof['course_name'].'</td>'.
					'<td>'.$prof['head_prof_name'].'</td>'.
					'<td></td>';
				if ($prof['head_prof_id'] == $user_id)
					echo
					'<td><input type="submit"  onclick=\'addEditForm('.json_encode($prof).')\' value="Edit"></td>';
=======
			foreach ($rows as $row) {
				echo
				'<tr>'.
					'<td>'.$row['course_name'].'</td>'.
					'<td>'.$row['head_prof_name'].'</td>'.
					'<td></td>';
				if ($row['head_prof_id'] == $user_id)
					echo
					'<td><input type="submit"  onclick=\'addEditForm('.json_encode($row).')\' value="Edit"></td>';
>>>>>>> 7c2153d4f26bfb8b633af07bd91fac84bb145b24
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
<<<<<<< HEAD

=======
				<?php
				if(!empty($messages))
					echo output_errors($messages);
				?>
>>>>>>> 7c2153d4f26bfb8b633af07bd91fac84bb145b24
			</div>
		</div>
	</div>

<?php include 'includes/overall/footer.php'; ?>