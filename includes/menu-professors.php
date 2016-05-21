<div id="menu_box">
	<a href="p-profile.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='p-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Profile</span>
	</a>
	<a href="p-edit-profile.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='p-edit-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Edit Profile</span>
	</a>
	<a href="p-evaluation.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='p-evaluation.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Evaluation</span>
	</a>
	<a href="p-grades.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='p-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Grades</span>
	</a>
	<a href="p-set-grades.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='p-set-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Set Grades</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo return_name($_SESSION['user_id'], $_SESSION['account_type']).' - ' ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>