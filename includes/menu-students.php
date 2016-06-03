<?php
$data = return_user_data($_SESSION['user_id'], $_SESSION['account_type']);
$location = basename($_SERVER['PHP_SELF']);
?>
<div id="menu_box">
	<a href="s-profile.php" class="<?php echo ($location=='s-profile.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Profile</span>
	</a>
	<a href="s-grades.php" class="<?php echo ($location=='s-grades.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Grades</span>
	</a>
	<a href="s-guess-grade.php" class="<?php echo ($location=='s-guess-grade.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Guess Grade</span>
	</a>
	<a href="s-statistics.php" class="<?php echo ($location=='s-statistics.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Statistics</span>
	</a>
	<div class="logout">
		<span class="logout">
			User: <?php echo $data['first_name']." ".$data['last_name'].' - '; ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>