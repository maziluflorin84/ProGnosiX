<?php
include 'core/init.php';

if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(isset($_POST['account']))
		$account_type = $_POST['account'];
	else
		$account_type = false;

	if (empty($email) === true || empty($password) === true || !$account_type) {
		$errors[] = 'Please enter the email, the password and select an account type';
	} else if (user_exists($email, $account_type) === false) {
		$errors[] = 'The email address you entered is not related to an account';
	} else if (user_active($email, $account_type) === false) {
		$errors[] = 'You haven\'t activated your account';
	} else {
		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
		}
		$login = login($email, $password, $account_type);
		if ($login === false) {
			$errors[] = 'That email/password combination is incorrect!';
		} else {
			$_SESSION['user_id'] = $login;
			$_SESSION['account_type'] = $account_type;
			if ($account_type === 'admin')
				header('Location: a-add.php');
			elseif ($account_type === 'professors')
				header('Location: p-profile.php');
			elseif ($account_type === 'students')
				header('Location: s-profile.php');
			exit();
		}
	}
}

if (logged_in()) {
	$account_type = $_SESSION['account_type'];
	if ($account_type === 'admin')
		header('Location: a-add.php');
	elseif ($account_type === 'professors')
		header('Location: p-profile.php');
	elseif ($account_type === 'students')
		header('Location: s-profile.php');
	exit();
}

include 'includes/overall/header.php';
?>

<h2>Log in</h2>

<div class="inner">
	<form action="index.php" method="post">
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
			<?php
				echo output_errors($errors);
			?>
		</ul>
	</form>
</div>

<?php include 'includes/overall/footer.php' ?>