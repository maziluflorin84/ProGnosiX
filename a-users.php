<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
?>

<h2>Admin Page - Users</h2>

<?php include 'includes/overall/footer.php' ?>