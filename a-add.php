<?php
include 'core/init.php';
if (!logged_in()) {
	header('Location: index.php');
	exit();
}
include 'includes/overall/header.php';
?>
<h2>Admin Page - Add</h2>
    <div class="inner">
        <form method="post" action='a-add.php'>
            <div class="side-form-left">
                <ul id='add-form'>
                    <li>
                        Choose what to add:<br>
                        <input id="1" type="radio" name="choice" value="student">
                        <label for="1">student</label>
                        <br>
                        <input id="2" type="radio" name="choice" value="professor">
                        <label for="2">professor</label>
                        <br>
                        <input id="3" type="radio" name="choice" value="course">
                        <label for="3">course</label>
                        <br>
                    </li>

<!--                <li>-->
<!--                    First Name:<br>-->
<!--                    <input type="text" name="first_name" style="width: 200px;">-->
<!--                </li>-->
<!--                <li>-->
<!--                    Father Initial:<br>-->
<!--                    <input type="text" name="parent_init" style="width: 200px;">-->
<!--                </li>-->
<!--                <li>-->
<!--                    Last Name:<br>-->
<!--                    <input type="text" name="last_name" style="width: 200px;">-->
<!--                </li>-->
<!--                <li>-->
<!--                    First Name:<br>-->
<!--                    <input type="text" name="first_name" style="width: 200px;">-->
<!--                </li>-->

                </ul>
            </div>
            <div class="side-form-right">
                <div class="side-right-inner">
                    hello<br>
                    hello<br>
                    hello<br>
                    hello<br>
                    hello<br>
                </div>
            </div>
        </form>
    </div>
<?php include 'includes/overall/footer.php' ?>