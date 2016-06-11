function checkPass(){
    var newPassword = document.getElementById('new_password');
    var confirmPassword = document.getElementById('confirm_password');
    var resetBtn = document.getElementById('reset');
    var oldPassword = document.getElementById('old_password');

    var message = document.getElementById('confirm_message');

    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if (oldPassword.value == 0 || newPassword.value == 0 || confirmPassword.value == 0){
        resetBtn.disabled = true;
    }else {
        if ((newPassword.value == confirmPassword.value) && (newPassword.value != 0 && confirmPassword.value != 0)){
            confirmPassword.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            resetBtn.disabled = false;
        } else if (newPassword.value != 0 && confirmPassword.value != 0){
            confirmPassword.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            resetBtn.disabled = true;
        }
    }
}