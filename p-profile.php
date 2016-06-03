<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
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
			<td><?php echo ($data['confirmed']==1 ? 'Yes' : 'No'); ?></td>
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
		<tr>
			<td>asdfdf</td>
			<td>asdfdf</td>
			<td>asdfdf</td>
			<td>asdfdf</td>
		</tr>
		<tr>
			<td>asdfdf</td>
			<td>asdfdf</td>
			<td>asdfdf</td>
			<td>asdfdf</td>
		</tr>
	</table>

<?php include 'includes/overall/footer.php' ?>