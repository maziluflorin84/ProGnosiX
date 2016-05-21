<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
?>

	<div>
		<h2>Students Page - Guess Grade</h2>
	</div>

<?php include 'includes/overall/footer.php' ?>