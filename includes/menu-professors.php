<div id="menu_box">
	<div class="border">
		<span class="menu_button">Profile</span>
	</div>
	<div class="border">
		<span class="menu_button">Edit Profile</span>
	</div>
	<div class="border">
		<span class="menu_button">Evaluation</span>
	</div>
	<div class="border">
		<span class="menu_button">Grades</span>
	</div>
	<div class="border">
		<span class="menu_button">Set Grades</span>
	</div>
	<div class="logout">
		<span class="logout">
			User: <?php echo return_name($_SESSION['user_id'], $_SESSION['account_type']).' - ' ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>