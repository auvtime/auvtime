$(document).ready(function() {
	//���õ�ǰʱ��
	setInterval(function() {
		var hours = new Date().getHours();
		var mins = new Date().getMinutes();
		var seconds = new Date().getSeconds();
		var nowTimeHourMinSec = addZero(hours) + ':' + addZero(mins) + ':' + addZero(seconds);
		$('#nowTimeHourMinSec').html(nowTimeHourMinSec);
	}, 1000);
	
});