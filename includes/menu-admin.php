<div id="menu_box">
	<a href="a-add.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='a-add.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Add</span>
	</a>
	<a href="a-users.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='a-users.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Users</span>
	</a>
	<a href="a-courses.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='a-courses.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Courses</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo return_name($_SESSION['user_id'], $_SESSION['account_type']).' - ' ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>