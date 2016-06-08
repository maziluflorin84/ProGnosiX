function addFunction(param, professors) {
    switch (param){
        case 1:
            document.getElementById("load-form").innerHTML = addFormStudent();
            break;
        case 2:
            document.getElementById("load-form").innerHTML = addFormProfessor();
            break;
        case 3:
            document.getElementById("load-form").innerHTML = addFormCourse(professors);
            break;
    }
}

function addFormStudent(){
    var code='<form action="" method=post>'+
            '<ul class="form-list" >'+
                '<li>First Name:<br>'+
                    '<input type="text" name="first_name" style="width: 200px;">'+
                '</li>'+
                '<li>Father Initial:<br>'+
                    '<input type="text" name="parent_init" style="width: 200px;">'+
                '</li>'+
                '<li>Last Name:<br>'+
                    '<input type="text" name="last_name" style="width: 200px;">'+
                '</li>'+
                '<li>Email:<br>'+
                    '<input type="text" name="email" style="width: 200px;">'+
                '</li>'+
                '<li>Year:<br>'+
                    '<input type="text" name="year" style="width: 200px;">'+
                '</li>'+
                '<li>Class:<br>'+
                    '<input type="text" name="class" style="width: 200px;">'+
                '</li>'+
                '<li>'+
                    '<input type="submit" value="Add">'+
                '</li>'+
            '</ul>'+
        '</form>'

    return code;
}

function addFormProfessor(){
    var code='<form action="" method=post>'+
        '<ul class="form-list" >'+
        '<li>First Name:<br>'+
        '<input type="text" name="first_name" style="width: 200px;">'+
        '</li>'+
        '<li>Father Initial:<br>'+
        '<input type="text" name="parent_init" style="width: 200px;">'+
        '</li>'+
        '<li>Last Name:<br>'+
        '<input type="text" name="last_name" style="width: 200px;">'+
        '</li>'+
        '<li>Email:<br>'+
        '<input type="text" name="email" style="width: 200px;">'+
        '</li>'+
        '<input type="submit" value="Add">'+
        '</li>'+
        '</ul>'+
        '</form>'

    return code;
}

function addFormCourse(professors){
    var index;
    var code='<form action="" method=post>'+
        '<ul class="form-list" >'+
            '<li>Course Name:<br>'+
                '<input type="text" name="course_name" style="width: 200px;">'+
            '</li>'+
            '<li>' +
                '<div style="display: inline-block">' +
                    'Year:<br>'+
                    '<select name="year">'+
                        '<option value="1">1</option>'+
                        '<option value="2">2</option>'+
                        '<option value="3">3</option>'+
                    '</select>' +
                '</div>' +
                '<div style="display: inline-block; margin-left: 30px;">'+
                    'Semester:<br>'+
                    '<select name="semester">'+
                        '<option value="1">1</option>'+
                        '<option value="2">2</option>'+
                    '</select>' +
                '</div>'+
            '</li>'+
            '<li>'+
                'Head professors:<br>'+
                '<select name="professors">';
                    for (index = 0; index < professors.length; ++index) {
                        code = code + '<option value="' + professors[index]['ID'] + '">' + professors[index]['first_name'] + ' ' + professors[index]['last_name'] + '</option>';
                    }
                code = code + '</select>'+
            '</li>'+
            '<li>' +
                '<input type="submit" value="Add"></li>' +
            '</ul>'+
        '</form>'

    return code;

}