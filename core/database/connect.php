<?php
$connect_error = 'Sorry, an error occured.';
$mysqli = new mysqli('localhost', 'ProGnosiX', 'ProGnosiX', 'prognosix');
if ($mysqli->connect_errno) {
	die($connect_error);
}