	<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$class_id = $data['class_id'];
global $mysqli;
$class_ids = $mysqli->query("SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
while ($class_id = $class_ids->fetch_assoc()) {
	$class = $class_id['class_semi_year'].$class_id['class_name'];
	$year = $class_id['class_year'];
}
?>

	<h2>Profile</h2>
    <table class="table-data" cellspacing="0">
        <tr>
            <td style="width: 30%"><b>First Name</b></td>
            <td><?php echo $data['first_name']; ?></td>
        </tr>
        <tr>
            <td style="width: 30%"><b>Father Initial</b></td>
            <td><?php echo $data['parent_init']; ?></td>
        </tr>
        <tr>
            <td style="width: 30%"><b>Last Name</b></td>
            <td><?php echo $data['last_name']; ?></td>
        </tr>
        <tr>
            <td style="width: 30%"><b>Email</b></td>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
            <td style="width: 30%"><b>Year</b></td>
            <td><?php echo $year; ?></td>
        </tr>
        <tr>
            <td style="width: 30%"><b>Class</b></td>
            <td><?php echo $class; ?></td>
        </tr>
    </table>

    <form action="s-change-password.php" method="post">
        <button type="submit">Change Password</button>
    </form>


<?php include 'includes/overall/footer.php' ?>