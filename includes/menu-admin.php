<?php
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$location = basename($_SERVER['PHP_SELF']);
?>

<div id="menu_box">
	<a href="a-add.php" class="<?php echo ($location=='a-add.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Add</span>
	</a>
	<a href="a-users.php" class="<?php echo ($location=='a-users.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Users</span>
	</a>
	<a href="a-courses.php" class="<?php echo ($location=='a-courses.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Courses</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo $data['first_name']." ".$data['last_name'].' - '; ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>