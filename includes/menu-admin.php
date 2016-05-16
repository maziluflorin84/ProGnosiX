<div id="menu_box">
	<div class="border">
		<span class="menu_button">Add</span>
	</div>
	<div class="border">
		<span class="menu_button">Users</span>
	</div>
	<div class="border">
		<span class="menu_button">Courses</span>
	</div>
	<div class="logout">
		<span class="logout">
			User: <?php echo return_name($_SESSION['user_id'], $_SESSION['account_type']).' - ' ?>
			<a class="logout" href="logout.php">Logout</a>
		</span>
	</div>
</div>