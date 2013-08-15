$(document).ready(function() {
	$(".noteLine form input").fadeTo(10, 0);
	$(".noteLine").mouseenter(function() {
		$(this).find("input").fadeTo('fast', 1);
	});
	$(".noteLine").mouseleave(function() {
		$(this).find("input").fadeTo('fast', 0);
	});
});