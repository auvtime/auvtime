<!DOCTYPE html>
<html lang="zh">
<head>
	<link rel="stylesheet" type="text/css" href="css/auvtime.core.css" />
	<link rel="stylesheet" type="text/css" href="css/auvtime.min.css" />
	<link rel="stylesheet" type="text/css" href="css/auvtime.css" />
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/lifeTime.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=gb2312" />
	<title>auvtime</title>
</head>
<?php
	$username="u199488573_auvt";
	$userpass="auvtime";
	$dbhost="mysql.yupage.com";
	$dbdatabase="u199488573_auvt";
	
	$pdo = new PDO("mysql:host=".$dbhost.";dbname=u199488573_auvt",$username,$userpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("set names gbk");
	
	//ִ��MySQL���
	$sql = "SELECT * FROM auv_user";
	$result=$pdo->query($sql) or die("Unable to query��". mysql_error());
	//���ض�������¼
	$row=$result->fetch();
	
	$format = 'Y-m-d H:i:s';
	$nowDate = new DateTime();
	$timezone = new DateTimeZone("Asia/Hong_Kong");
	$nowDate->setTimezone($timezone);
	$nowTimeStr = $nowDate->format($format);
	
	$yearFormat = 'Y-m-d';
	$timeFormat = 'H:i:s';
	$minFormat = 'i';
	$secFormat = 's';
	$nowYear = $nowDate->format($yearFormat);
	$nowTime = $nowDate->format($timeFormat);
	$birthdayTime = DateTime::createFromFormat($format,$row[3],$timezone);
	$interval = $birthdayTime->diff($nowDate);
	$lifeTime = formatDateDiff($birthdayTime,$nowDate);

	
	function formatDateDiff($start, $end=null) {
		if(!($start instanceof DateTime)) {
			$start = new DateTime($start);
		}
	   
		if($end === null) {
			$end = new DateTime();
		}
	   
		if(!($end instanceof DateTime)) {
			$end = new DateTime($start);
		}
	   
		$interval = $end->diff($start);
	   
		$format = array();
		if($interval->y !== 0) {
			$format[] = "%y��";
		}
		if($interval->m !== 0) {
			$format[] = "%m����";
		}
		
		if($interval->d !== 0) {
			$format[] = "%d��";
		}
		if($interval->h !== 0) {
			$format[] = "%hСʱ";
		}
		if($interval->i !== 0) {
			$format[] = "%i����";
		}
		if($interval->s !== 0) {
			if(!count($format)) {
				return "less than a minute ago";
			} else {
				$format[] = "%s��";
			}
		}
	   
		// We use the two biggest parts
		if(count($format) > 4) {
			$format = array_shift($format).array_shift($format).array_shift($format).array_shift($format);
		} else {
			$format = array_pop($format);
		}
	   
		// Prepend 'since ' or whatever you like
		return $interval->format($format);
	} 
?>
<body>
	<div class="pagewrap">
		<div class="structure topnav persistent">
		    <div class="content">
		    	<span class="logo nav-item"><span class="nav-item"><a href="http://auvtime.com" class="orange">auvtime</a></span></span>
		    	<div id="nowTime" class="nowTime">
		    		<span id="nowTimeYear" class="nowTimeYear">
			    		<?php echo $nowYear?>
			    	</span>
			    	&nbsp;&nbsp;
			    	<span id="nowTimeHourMinSec" class="nowTimeHourMinSec">
			    		<?php echo $nowTime?>
			    	</span>
		    	</div>
		    	<ul class="nav accountlinks">
	                <li><span class="button dark orange">������</span></li>
	                <li class="signin">
	                    <a class="nav-link stats-notrack" href="http://auvtime.com/login">��¼</a>
	                </li>
	            </ul>
		    </div>
		</div>
		<div id="main" class="structure">
			<div class="content">
				<div id="lifeTime">
					<div class="logo">
						<a href="http://auvtime.com" class="orange"><span>auvtime</span></a>
					</div>
					<div class="name">
						<span><?php echo $row[2].",����ʺ���".$row[1].",���������".$row[3];?></span>
					</div>
					<div class="lifeLength">
						<script type="text/javascript">
						//�������վ��뵱ǰʱ�������Ϣ
						setInterval(function() {
							var birthday = <?php echo '"'.$birthdayTime->format($format).'"';?>;
							var birthdayDate = getDateFromString(birthday);
							var lifeLength = timeElapse(birthdayDate);
							lifeLength = lifeLength + 'ѽ��';
							$('#lifeLengthContent').html(lifeLength);
						},1000);
						</script>
						<div id="lifeLengthMonth">
							<span>����ι���㶼����ô��ʱ����:<?php echo $lifeTime?>,����</span>
							<span id="lifeLengthContent">
							
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="structure footer">
			<div class="content">
				<hr class="separator">
				<p class="copyright">
					<span>&copy; 2014 auvtime. All Rights Reserved.</span>
				</p>
			</div>
		</div>
	</div>
</body>

</html>
