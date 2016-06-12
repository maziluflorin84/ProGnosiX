function addEditForm(course){
	document.getElementById("load-form").innerHTML = '<form action="" method=post>'+
		'<ul id="form-list" >' +
			'<input type="hidden" name="course_id" value="' + course['course_id'] + '">'+
			'<li>Course Name:<br>' +
				'<input type="text" name="course_name" style="width: 200px;" value="' + course['course_name'] + '">' +
			'</li>' +
			'<li>Number of course evaluations:<br>'+
				'<input type="text" name="course_ev_no" style="width: 200px;" value="' + course['course_ev_no'] + '">' +
			'</li>' +
			'<li>Number of seminar evaluations:<br>'+
				'<input type="text" name="seminar_ev_no" style="width: 200px;" value="' + course['seminar_ev_no'] + '">' +
			'</li>' +
			'<li>Number of project evaluations:<br>'+
				'<input type="text" name="project_ev_no" style="width: 200px;" value="' + course['project_ev_no'] + '">' +
			'</li>' +
			'<li>' +
				'<input type="submit" value="Edit">'+
			'</li>' +
		'</ul>' +
	'</form>'
}