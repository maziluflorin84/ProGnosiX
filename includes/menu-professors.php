<?php
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$location = basename($_SERVER['PHP_SELF']);
?>
<div id="menu_box">
	<a href="p-profile.php" class="<?php echo ($location=='p-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Profile</span>
	</a>
	<a href="p-edit-profile.php" class="<?php echo ($location=='p-edit-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Edit Profile</span>
	</a>
	<a href="p-evaluation.php" class="<?php echo ($location=='p-evaluation.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Evaluation</span>
	</a>
	<a href="p-grades.php" class="<?php echo ($location=='p-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Grades</span>
	</a>
	<a href="p-set-grades.php" class="<?php echo ($location=='p-set-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Set Grades</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo $data['first_name']." ".$data['last_name'].' - '; ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>