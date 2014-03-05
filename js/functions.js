/**
 * ���������� ����ʱ��Ⱥ����У������ݵĲ���С��10��ʱ�򣬸��ò���ǰ�����0������
 */
function addZero(num) {
	if (num < 10) {
		num = '0' + num;
	}
	return num;
}
/**
 * �����������Ŀ�ʼʱ��
 * �������ʱ��͵�ǰʱ�����������������������
 */
function timeElapseYearMonthDay(date){
	var currentDate = Date();
	var currentYear = currentDate.getYear();
	var oldYear = date.getYear();
	var yearInterval = currentYear - oldYear;
	
}
/**
 * ������������ʱ�� 
 * ����һ��ʱ�䣬�����ʱ����뵱ǰʱ���������Сʱ�����������������������ַ��� 
 * �ַ�����ʽΪ��xx��xxСʱxx����xx��
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
			+ "��</span><span class=\"digit\">" + hours
			+ "Сʱ</span><span class=\"digit\">" + minutes
			+ "����</span><span class=\"digit\">" + seconds + "��</span>";
	return result;
}

/**
 * ����������ʱ����ַ�������ʽΪ��1984-06-10 12:00:00
 * ���ظ��ַ���������
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