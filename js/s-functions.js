function checkPass(){
    var newPassword = document.getElementById('new_password');
    var confirmPassword = document.getElementById('confirm_password');

    var message = document.getElementById('confirm_message');

    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if (newPassword.value == confirmPassword.value){
        confirmPassword.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
    } else {
        confirmPassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
    }
}