<div id="menu_box">
	<a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='index.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Login</span>
	</a>
	<a href="contact.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='contact.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Contact Admin</span>
	</a>
	<a href="about.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='about.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">About</span>
	</a>
	<a href="authors.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='authors.php' ? 'border_on' : 'border'); ?>">
		<span class="menu_button">Authors</span>
	</a>
</div>