<?php
if (logged_in()) {
	$account_type = $_SESSION['account_type'];
	if ($account_type === 'admin') {
		$style = 'css/a-style.css';
		$script = 'js/a-functions.js';
	} elseif ($account_type === 'professors') {
		$style = 'css/p-style.css';
		$script = 'js/p-functions.js';
	} elseif ($account_type === 'students') {
		$style = 'css/s-style.css';
		$script = 'js/s-functions.js';
	}

	if ($style)
		$other_style = '<link href="'.$style.'" rel="stylesheet" type="text/css" />';

	if ($script)
		$other_script = '<script type="text/javascript" src="'.$script.'"></script>';
}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ProGnosiX</title>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<?php
	if (isset($other_style))
		echo $other_style;
	if (isset($other_script))
		echo $other_script;
	?>
</head>