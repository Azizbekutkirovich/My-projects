$(window).on('load', function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");
});

if (document.URL == "http://localhost:8080/quiz-school-demo-teacher/") {
	$('#home').addClass('active');
} else if (document.URL == "http://localhost:8080/quiz-school-demo-teacher/main/index") {
	$('#home').addClass('active');
} else if (document.URL == "http://localhost:8080/quiz-school-demo-teacher/test/upload") {
	$('#upload').addClass('active');
} else if (document.URL == 'http://localhost:8080/quiz-school-demo-teacher/teacher/select') {
	$('#info').addClass('active');
} else if (document.URL == 'http://localhost:8080/quiz-school-demo-teacher/teacher/selectview') {
	$('#view').addClass('active');
}