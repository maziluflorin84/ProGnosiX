<?php
include '../init.php';
global $mysqli;

$course_id = intval($_GET['val']);

$results = $mysqli->query("SELECT `year` FROM `courses` WHERE `course_id` = '$course_id'");

if ($results)
	while ($eval_row = $results->fetch_assoc())
		$year = $eval_row['year'];

$results2 = $mysqli->query("SELECT * FROM `classes` WHERE `class_year` = '$year'");
$classes = array();
if ($results2)
	while($class_row = $results2->fetch_assoc())
		$classes[] = $class_row;



echo '<div class="assist-form" style="overflow:auto; height:auto;">';
foreach ($classes as $class) {
	echo '<input type="checkbox" value="'.$class['class_id'].'" name="class_id[]" id="classes">'.$class['class_semi_year'].$class['class_name'].' ';
}
echo '</div>';