<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);

$result = $mysqli->query("SELECT * FROM `courses`");
$rows = array();
$ids = array();
while ($row = $result->fetch_assoc()) {
//				echo '<br>'.$row['course_id'];
//				echo '<br>'.$row['course_name'];
//				echo '<br>'.$row['year'];
//				echo '<br>'.$row['semester'];
//				echo '<br>'.$row['assist_prof_ids'];
	if ($row['head_prof_id'] == $data['ID']) {
		$rows[] = $row;
	} else {
		$ids = explode(';', $row['assist_prof_ids']);
		foreach ($ids as $value)
			if ($value == $data['ID'])
				$rows[] = $row;
	}
}
?>

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
	<table class="table-data" cellspacing="0">
		<tr>
			<th>Course Name</th>
			<th>Head Professor</th>
			<th>Classes</th>
			<th>Edit Courses</th>
		</tr>
		<?php
		foreach ($rows as $prof) {
			echo
			'<tr>'.
				'<td>'.$prof['course_name'].'</td>'.
				'<td>'.$prof['head_prof_id'].'</td>'.
				'<td></td>';
			if ($prof['head_prof_id'] == $data['ID'])
				echo
				'<td><input type="submit" value="Edit"></td>';
			else
				echo
				'<td>N/A</td>';
			echo
			'</tr>';
		}
		?>
	</table>

<?php include 'includes/overall/footer.php'; ?>