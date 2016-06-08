<?php
include 'core/init.php';
if (!logged_in()) {
    header('Location: index.php');
    exit();
}


if (empty($_POST) === false){
    global $mysqli;
    $new_password = $_POST['new_password'];
    $old_password = $_POST['old_password'];

    if (empty($old_password) === true) {
        $errors[] = 'Please enter old password';
    } else {
        if (strlen($old_password) > 32) {
            $errors[] = 'Password too long';
        } else {
            $user_id = $_SESSION['user_id'];
            $old_password = md5($old_password);
            $new_password = md5($new_password);
            $result = $mysqli->query("SELECT * FROM `students` WHERE `password` = '$old_password'");
            $num_rows = $result->num_rows;
            if ($num_rows == 1) {
                $update = $mysqli->query("UPDATE `students` SET `password` = '$new_password' WHERE `ID` = '$user_id'");
                if ($update) $success = 'Success!';
                else $errors[] = 'Wrong old password!';
            }
        }
    }
}
include 'includes/overall/header.php';
?>

   <h2>Edit your password</h2>

    <form action="" method="post">
        <ul id="password-save">
            <li>
                Old Password:<br>
                <input type="password" id="old_password" name="old_password" />
            </li>
            <li>
                New Password:<br>
                <input type="password" id="new_password" name="new_password" />
            </li>
            <li>
                Confirm Password:<br>
                <input type="password" id="confirm_password" name="confirm_password" onkeyup="checkPass(); return false;"/>
                <span id="confirm_message" class="confirm_message"></span>
            </li>
            <li>
                <button type="submit" >Change</button>
            </li>
            <?php
                echo output_errors($errors);
                if (isset($success))
                    echo '<p style="color: #66cc66">'.$success.'</p>';
            ?>
        </ul>
    </form>


<?php include 'includes/overall/footer.php' ?>