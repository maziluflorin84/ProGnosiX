<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
$messages = array();
global $mysqli;
$results = $mysqli->query("SELECT `ID`,`first_name`,`last_name` FROM `professors`");
$data = array();
if ($results)
	while ($row = $results->fetch_assoc())
		$data[] = $row;

$user_id = $_SESSION['user_id'];
?>
	<div class="side-form-left search-form-left">
		<h2>Courses</h2>
		<div class="inner">
			<form method="post" action="">
				<ul id='search-form'>
					<li>Search:<br>
						<input type="text" name="search_box" style="width: 200px;">
					</li>
					<input type="submit" value="Search">
				</ul>
			</form>
			<?php
			if (empty($_POST) === false){
				$search_result=admin_search_course();
				if(empty($search_result) === false){
					echo '<table class="table-data search-table-data" cellspacing="0">'.
						'<tr>'.
						'<th>Course Name</th>'.
						'<th>Year</th>'.
						'<th>Semester</th>'.
						'<th>Head Teacher</th>'.
						'<th>Edit</th>'.
						'</tr>';
					foreach ($search_result as $row) {
						$head_prof = return_user_data($row['head_prof_id'], 'professors');
						$row['head_prof_name']=$head_prof['first_name'].' '.$head_prof['last_name'];
						echo '<tr>'.
							'<td>'.$row['course_name'].'</td>'.
							'<td>'.$row['year'].'</td>'.
							'<td>'.$row['semester'].'</td>'.
							'<td>'.$row['head_prof_name'].'</td>'.
							'<td><input type="submit" value="Edit" onclick=\'editCourses('.json_encode($row).','.json_encode($data).')\'></td>'.
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