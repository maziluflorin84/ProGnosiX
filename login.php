<?php
//include 'core/init.php';
//
//if (empty($_POST) === false) {
//	$email = $_POST['email'];
//	$password = $_POST['password'];
//	$account_type = $_POST['account'];
//
//	if (empty($email) === true || empty($password) === true) {
//		$errors[] = 'Please enter the email and the password';
//	} else if (user_exists($email, $account_type) === false) {
//		$errors[] = 'The email address you entered is not related to an account';
//	} else if (user_active($email, $account_type) === false) {
//		$errors[] = 'You haven\'t activated your account';
//	} else {
//		if (strlen($password) > 32) {
//			$errors[] = 'Password too long';
//		}
//		$login = login($email, $password, $account_type);
//		if ($login === false) {
//			$errors[] = 'That email/password combination is incorrect!';
//		} else {
//			$_SESSION['user_id'] = $login;
//			$_SESSION['account_type'] = $account_type;
//			if ($account_type === 'admin')
//				header('Location: a-add.php');
//			elseif ($account_type === 'professors')
//				header('Location: p-profile.php');
//			elseif ($account_type === 'students')
//				header('Location: s-profile.php');
//			exit();
//		}
//	}
//
//	header('Location: index.php');
//	print_r($errors);
//
//}