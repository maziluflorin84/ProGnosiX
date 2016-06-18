<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
?>
	<div class="side-form-left">
		<h2>Admin Page - Users</h2>
		<div class="inner">
			<form method="post" action='a-search.php'>
				<ul id='search-form'>
					<li>Search:<br>
						<input type="text" name="search_box" style="width: 200px;">
					</li>
					<li>
						<label><input type="radio" name="search_type" value="student" checked="checked">student</label>
						<label><input type="radio" name="search_type" value="professor">professor</label>
					</li>
					<input type="submit" value="Search">
				</ul>
			</form>
		</div>
		<div>


		</div>
	</div>
	<div class="side-form-right">
		<div class="side-right-inner">
			<div id="load-form">

			</div>
		</div>
	</div>

<?php include 'includes/overall/footer.php' ?>




