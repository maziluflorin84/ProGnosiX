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

function guessGrades(row){
		document.getElementById("load-form").innerHTML='<form action="core/functions/s-enter-grade.php" method="post">'+
			'<ul class="form-list" >' +
			'<input type="hidden" name="ID" value="' + row['ID'] + '">'+
			'<input type="hidden" name="course_id" value="' + row['course_id'] + '">'+
			'<input type="hidden" name="evaluation_type" value="' + row['type'] + '">'+
			'<input type="hidden" name="evaluation_no" value="' + row['number'] + '">'+
			'<li>Enter your Grade:<br>' +
			'<input type="text" name="student_grade" style="width: 200px;" 	>' +
			'</li>' +
			'<li>' +
			'<input type="submit" value="Update">' +
			'</li>' +
			'</ul>' +
			'</form>'
}