<div id="header">
	<div align="center" class="logo"></div>
	<div class="menu_bar">
		<?php
		if (logged_in()) {
			$account_type = $_SESSION['account_type'];
			if ($account_type === 'admin')
				include 'includes/menu-admin.php';
			elseif ($account_type === 'professors')
				include 'includes/menu-professors.php';
			elseif ($account_type === 'students')
				include 'includes/menu-students.php';
		} else {
			include 'includes/menu-login.php';
		}
		?>
	</div>
</div>