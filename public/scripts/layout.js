$(document).ready(function () {
	var isBarOpen = true;
	$('#toggleBar').bind('click',function () {
		isBarOpen = !isBarOpen;
		layout.makeBar(isBarOpen);
	});
});

var layout = layout || {};
layout.toggleBar_C = '#toggleBar';

layout.makeBar = function (isBarOpen) {
	var frame = $('.frame_container');

	if(!isBarOpen) {
		frame.css('left',0)
		return;
	} 
	frame.css('left',200);
};