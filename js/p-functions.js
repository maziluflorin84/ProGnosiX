function addEditForm(course){
	document.getElementById("load-form").innerHTML = '<form action="" method=post>'+
		'<ul id="form-list" >'+
			'<li>Course Name:<br>'+
				'<input type="text" name="course_name" style="width: 200px;" value="' + course['course_name'] + '">'+
			'</li>'+
			'<li>Year:<br>'+
				'<input type="text" name="year" style="width: 200px;" value="' + course['year'] + '">'+
			'</li>'+
			'<li>Semester:<br>'+
				'<input type="text" name="semester" style="width: 200px;" value="' + course['semester'] + '">'+
			'</li>'+
			'<li>Email:<br>'+
				'<input type="text" name="email" style="width: 200px;">'+
			'</li>' +
			'<li>'+
				'<input type="submit" value="Add">'+
			'</li>'+
		'</ul>'+
	'</form>'
}