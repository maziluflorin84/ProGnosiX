<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
global $mysqli;
$results=$mysqli->query("SELECT `ID`,`first_name`,`last_name` FROM `professors`");
$data = array();
while($row = $results->fetch_assoc())
    $data[] = $row;
?>
<h2>Admin Page - Add</h2>
    <div class="inner">
        <form method="post" action='a-add.php'>
            <div class="side-form-left">
                <ul id='add-form'>
                    <li>
                        Choose what to add:<br>
                        <label><input type="radio" onclick='addFunction(1,<?php echo json_encode($data); ?>);' name="my-radio">student</label>
                        <br>
                        <label><input type="radio" onclick='addFunction(2,<?php echo json_encode($data); ?>);' name="my-radio">professor</label>
                        <br>
                        <label><input type="radio" onclick='addFunction(3,<?php echo json_encode($data); ?>);' name="my-radio">course</label>

                    </li>
                </ul>
            </div>

            <div class="side-form-right">
                <div class="side-right-inner">
                    <div id="load-form">

                    </div>
                </div>
            </div>
<!---->
<!--            <div id="load-form">-->
<!---->
<!--            </div>-->


        </form>
    </div>
<?php include 'includes/overall/footer.php' ?>