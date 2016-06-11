<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
?>

<h2>Admin Page - Users</h2>
	<div class="inner">
		<form method="post" action='a-users.php'>
			<div class="side-form-left">
				<ul id='search-form'>
					<li>Search:<br>
						<input type="text" name="search_box" style="width: 200px;">
					</li>
					<li>
						<label><input type="radio" name="search">student</label>
						<label><input type="radio" name="search">professor</label>
					</li>
					<input type="submit" value="Search">
				</ul>
			</div>
		</form>

	</div>
<?php include 'includes/overall/footer.php' ?>




