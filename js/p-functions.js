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

function checkEvalType(val) {
	document.getElementById("evaluation-type").innerHTML = 'Select Evaluation Type:<br>' +
		'<select name="type" style="width: 250px;" onchange="getEvalNo(' + val + ', this.value)">' +
			'<option selected disabled="Evaluation Type"></option>' +
			'<option value="course_ev">Course Evaluation</option>' +
			'<option value="seminar_ev">Seminar Evaluation</option>' +
			'<option value="project_ev">Project Evaluation</option>' +
		'</select>'
}

function getEvalNo(val1, val2) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("evaluation-number").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "core/functions/p-evaluation-num.php?val1=" + val1 + "&val2=" + val2, true);
	xmlhttp.send();
}
function getEvalClasses(val) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("evaluation-classes").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "core/functions/p-evaluation-classes.php?val=" + val, true);
	xmlhttp.send();
}