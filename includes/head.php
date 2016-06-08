<?php
if (logged_in()) {
	$account_type = $_SESSION['account_type'];
	if ($account_type === 'admin')
		$style = 'css/a-style.css';
	elseif ($account_type === 'professors')
		$style = 'css/p-style.css';
	elseif ($account_type === 'students')
		$style = 'css/s-style.css';

	if ($style)
		$other_style = '<link href="'.$style.'" rel="stylesheet" type="text/css" />';
}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ProGnosiX</title>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/a-functions.js"></script>
    <script type="text/javascript" src="js/s-functions.js"></script>
	<?php
	if (isset($other_style))
		echo $other_style;
	?>
</head>