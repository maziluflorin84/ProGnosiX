<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';

$messages = array();
?>
	<div class="side-form-left search-form-left">
		<h2>Users</h2>
		<div class="inner">
			<form method="post" action="">
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
			<?php
			if (empty($_POST) === false){
				$search_result=admin_search_user();
				if(empty($search_result) === false){
					echo '<table class="table-data search-table-data" cellspacing="0">'.
						'<tr>'.
						'<th>First Name</th>'.
						'<th>Parent Init</th>'.
						'<th>Last Name</th>'.
						'<th>Email</th>'.
						'<th>Edit</th>'.
						'</tr>';
					foreach ($search_result as $row) {
						echo '<tr>'.
							'<td>'.$row['first_name'].'</td>'.
							'<td>'.$row['parent_init'].'</td>'.
							'<td>'.$row['last_name'].'</td>'.
							'<td>'.$row['email'].'</td>'.
							'<td><input type="submit" value="Edit" onclick=\'editUser('.json_encode($row).')\'></td>'.
							'</tr>';
					}
					echo '</table>';
				} else {
					echo "<p style='color: red;'>"."The search didn't return any results!"."</p>";
				}
			}
			?>
		</div>
	</div>

	<div class="side-form-right">
		<div class="side-right-inner">
			<div id="load-form">
				<?php
				if(!empty($messages))
					echo output_errors($messages);
				?>
			</div>
		</div>
	</div>

<?php include 'includes/overall/footer.php' ?>