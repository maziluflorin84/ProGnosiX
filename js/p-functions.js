function addEditForm(course){
	var options_course = "";
	var options_seminar = "";
	var options_project = "";
	var i;
	for (i=0; i<15; i=i+1) {
		options_course += '<option value="' + i + '"' + ((course['course_ev_no']==i) ? ' selected' : '') + '>' + i + '</option>';
		options_seminar += '<option value="' + i + '"' + ((course['seminar_ev_no']==i) ? ' selected' : '') + '>' + i + '</option>';
		options_project += '<option value="' + i + '"' + ((course['project_ev_no']==i) ? ' selected' : '') + '>' + i + '</option>';
	}
	document.getElementById("load-form").innerHTML = '<form action="" method=post>'+
		'<ul id="form-list" >' +
			'<input type="hidden" name="course_id" value="' + course['course_id'] + '">'+
			'<li>Course Name:<br>' +
				'<input type="text" name="course_name" style="width: 200px;" value="' + course['course_name'] + '">' +
			'</li>' +
			'<li>Number of course evaluations:<br>' +
				'<select name="course_ev_no">' +
					options_course +
				'</select>' +
			'</li>' +
			'<li>Number of seminar evaluations:<br>' +
				'<select name="seminar_ev_no">' +
					options_seminar +
				'</select>' +
			'</li>' +
			'<li>Number of project evaluations:<br>' +
				'<select name="project_ev_no">' +
					options_project +
				'</select>' +
			'</li>' +
			'<li>' +
				'<input type="submit" value="Change">' +
			'</li>' +
		'</ul>' +
	'</form>'
}