//function addFunction(param, values1, values2) {
//	switch (param){
//		case 1:
//			document.getElementById("load-form").innerHTML = addFormStudent();
//			break;
//		case 2:
//			document.getElementById("load-form").innerHTML = addFormProfessor();
//			break;
//		case 3:
//			document.getElementById("load-form").innerHTML = addFormCourse(values1, values2);
//			break;
//	}
//}

function addFormStudent(){
	document.getElementById("load-form").innerHTML = '<form action="core/functions/a-add-student.php" method="post">'+
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
					'<div style="display: inline-block">' +
						'Year:<br>'+
						'<select name="class_year">'+
							'<option value="1">1</option>'+
							'<option value="2">2</option>'+
							'<option value="3">3</option>'+
						'</select>' +
					'</div>' +
					'<div style="display: inline-block; margin-left: 30px;">'+
						'Half-Year:<br>'+
						'<select name="class_semi_year">'+
							'<option value="A">A</option>'+
							'<option value="B">B</option>'+
						'</select>' +
					'</div>' +
				'<li><br>Class:<br>'+
						'<label><input type="radio" name="class_name" value="1">1</label>'+
						'<label><input type="radio" name="class_name" value="2">2</label>'+
						'<label><input type="radio" name="class_name" value="3">3</label>'+
						'<label><input type="radio" name="class_name" value="4">4</label>'+
						'<label><input type="radio" name="class_name" value="5">5</label>'+
						'<label><input type="radio" name="class_name" value="6">6</label>'+
						'<label><input type="radio" name="class_name" value="7">7</label>'+
				'</li>'+
				'<li>'+
					'<input type="submit" value="Add">'+
				'</li>'+
			'</ul>'+
		'</form>'

}

function addFormProfessor(){
	document.getElementById("load-form").innerHTML = '<form action="core/functions/a-add-professor.php" method="post">'+
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
			'<li>'+
				'<input type="submit" value="Add">'+
			'</li>'+
			'</ul>'+
		'</form>'
}

function addFormCourse(professors){
	var index;
	var code = '<form action="core/functions/a-add-course.php" method="post">'+
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
				'Head professor:<br>'+
				'<select name="professors"><option value=""></option>';
					for (index = 0; index < professors.length; ++index) {
						code = code + '<option value="' + professors[index]['ID'] + '">' + professors[index]['first_name'] + ' ' + professors[index]['last_name'] + '</option>';
					}
				code = code + '</select>'+
			'</li>'+
			'<li>'+
				'Assistant Teachers:<br>' +
				'<div class="assist-form" style=\'overflow:auto; height:100px;\'>'+
					'<form>'
						for (index = 0; index < professors.length; ++index){
							code = code + '<input type="checkbox" value = "' + professors[index]['ID'] + '" name=\"assist-profs[]\" id=\"assist-profs\" >' + professors[index]['first_name'] + ' ' + professors[index]['last_name'] + '<br>';
						}
					code = code + '</form>' +
				'</div>'+
			'</li>' +
			'<li>' +
				'<input type="submit" value="Add"></li>' +
			'</ul>'+
		'</form>'
	document.getElementById("load-form").innerHTML = code;
}

function editUser(row){
	document.getElementById("load-form").innerHTML = '<form action="core/functions/a-edit-user.php" method="post">'+
		'<ul class="form-list" >' +
		'<input type="hidden" name="ID" value="' + row['ID'] + '">'+
		'<input type="hidden" name="search_type" value="' + row['search_type'] + '">'+
		'<li>First Name:<br>' +
		'<input type="text" name="first_name" style="width: 200px;" value="' + row['first_name'] + '">' +
		'</li>' +
		'<li>Parent Initial:<br>' +
		'<input type="text" name="parent_init" style="width: 200px;" value="' + row['parent_init'] + '">' +
		'</li>' +
		'<li>Last Name:<br>' +
		'<input type="text" name="last_name" style="width: 200px;" value="' + row['last_name'] + '">' +
		'</li>' +
		'<li>Email:<br>' +
		'<input type="text" name="email" style="width: 200px;" value="' + row['email'] + '">' +
		'</li>' +
		'<li>' +
		'<input type="submit" value="Update">' +
		'</li>' +
		'</ul>' +
		'</form>'
}

function editCourses(row,data){
	var index;
	var code = '<form action="core/functions/a-edit-course.php" method="post">'+
		'<ul class="form-list" >' +
		'<input type="hidden" name="course_id" value="' + row['course_id'] + '">'+
		'<li>Course Name:<br>' +
		'<input type="text" name="course_name" style="width: 200px;" value="' + row['course_name'] + '">' +
		'</li>' +
		'<li>Course Year:<br>' +
		'<input type="text" name="year" style="width: 200px;" value="' + row['year'] + '">' +
		'</li>' +
		'<li>Semester:<br>' +
		'<input type="text" name="semester" style="width: 200px;" value="' + row['semester'] + '">' +
		'</li>' +
		'<li>Head Teacher:<br>' +
		'<select name="professors"><option value=""></option>';
			for (index = 0; index < data.length; ++index) {
				code = code + '<option value="' + data[index]['ID'] + '" '
					+ '>' + data[index]['first_name'] + ' ' + data[index]['last_name'] + '</option>';
			}
			code = code + '</select>'+
		'</li>' +
		'<li>Assistant Teachers:<br>' +
				'<div class="assist-form" style=\'overflow:auto; height:100px;\'>'+
				'<form>'
			for (index = 0; index < data.length; ++index){
				code = code + '<input type="checkbox" value = "' + data[index]['ID'] + '" name=\"assist-profs[]\" id=\"assist-profs\" >' + data[index]['first_name'] + ' ' + data[index]['last_name'] + '<br>';
			}

			code = code + '</form>' +
		'</div>'+
		'</li>' +
		'<li>' +
		'<input type="submit" value="Update">' +
		'</li>' +
		'</ul>' +
		'</form>'

	document.getElementById("load-form").innerHTML = code;
}