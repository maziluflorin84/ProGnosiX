<?php
include 'core/init.php';
if (logged_in()) {
	$account_type = $_SESSION['account_type'];
	if ($account_type === 'admin')
		header('Location: admin.php');
	elseif ($account_type === 'professors')
		header('Location: professors.php');
	elseif ($account_type === 'students')
		header('Location: students.php');
	exit();
}

include 'includes/overall/header.php';
?>

<h2>Log in</h2>

<div class="inner">
	<form action="login.php" method="post">
		<ul id="login">
			<li>
				Email:<br>
				<input type="text" name="email" style="width: 200px;">
			</li>
			<li>
				Password:<br>
				<input type="password" name="password" style="width: 200px;">
			</li>
			<li>
				Choose account type:<br>
				<input id="1" type="radio" name="account" value="admin">
				<label for="1">admin</label>
				<br>
				<input id="2" type="radio" name="account" value="professors">
				<label for="2">professor</label>
				<br>
				<input id="3" type="radio" name="account" value="students">
				<label for="3">student</label>
				<br>
			</li>
			<li>
				<input type="submit" value="Log in">
			</li>
		</ul>
	</form>
</div>

<?php include 'includes/overall/footer.php' ?>