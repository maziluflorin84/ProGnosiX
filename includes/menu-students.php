<div id="menu_box">
	<a href="s-profile.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='s-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Profile</span>
	</a>
	<a href="s-grades.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='s-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Grades</span>
	</a>
	<a href="s-guess-grade.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='s-guess-grade.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Guess Grade</span>
	</a>
	<a href="s-statistics.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='s-statistics.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Statistics</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo return_name($_SESSION['user_id'], $_SESSION['account_type']).' - ' ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>