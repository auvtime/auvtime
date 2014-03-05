/**
 * 参数：数字 用在时间等函数中，当传递的参数小于10的时候，给该参数前边添加0并返回
 */
function addZero(num) {
	if (num < 10) {
		num = '0' + num;
	}
	return num;
}
/**
 * 参数：给定的开始时间
 * 计算出该时间和当前时间相隔的年数，月数和天数
 */
function timeElapseYearMonthDay(date){
	var currentDate = Date();
	var currentYear = currentDate.getYear();
	var oldYear = date.getYear();
	var yearInterval = currentYear - oldYear;
	
}
/**
 * 参数：给定的时间 
 * 给定一个时间，计算此时间距离当前时间的天数，小时数，分钟数，秒数并返回字符串 
 * 字符串格式为：xx天xx小时xx分钟xx秒
 */
function timeElapse(date) {
	var current = Date();
	var seconds = (Date.parse(current) - Date.parse(date)) / 1000;
	var days = Math.floor(seconds / (3600 * 24));
	seconds = seconds % (3600 * 24);
	var hours = Math.floor(seconds / 3600);
	hours = addZero(hours);
	seconds = seconds % 3600;
	var minutes = Math.floor(seconds / 60);
	minutes = addZero(minutes);
	seconds = seconds % 60;
	seconds = addZero(seconds);
	var result = "<span class=\"digit\">" + days
			+ "天</span><span class=\"digit\">" + hours
			+ "小时</span><span class=\"digit\">" + minutes
			+ "分钟</span><span class=\"digit\">" + seconds + "秒</span>";
	return result;
}

/**
 * 参数：给定时间的字符串，格式为：1984-06-10 12:00:00
 * 返回给字符串的日期
 */
function getDateFromString(timeString) {
	var year = timeString.substr(0,4);
	var month = timeString.substr(5,2);
	var day = timeString.substr(8,2);
	var hours = timeString.substr(11,2);
	var minutes = timeString.substr(14,2);
	var seconds = timeString.substr(17,2);
	var date = new Date(year, month, day, hours, minutes, seconds);
	return date;
}