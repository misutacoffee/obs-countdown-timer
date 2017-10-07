<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Countdown Timer</title>
<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
<style>
	body{
		background:#00FF00;
		color:#FFFFFF;
		font-family: 'Rajdhani', sans-serif;
		font-size:140px;
	}
</style>
</head>

<body>
<div id="clockdiv">
	<span class="minutes"></span>:<span class="seconds"></span>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

//https://www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/

var defaultMin=12;
var min = "<?php echo $_GET[min];?>";
if (min == ""){min=defaultMin;}

function getTimeRemaining(endtime) {
	var t = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor((t / 1000) % 60);
	var minutes = Math.floor((t / 1000 / 60) % 60);
	return {
		'total': t,
		'minutes': minutes,
		'seconds': seconds
	}
}

function initializeClock(id, endtime) {
	var clock = document.getElementById(id);
	var minutesSpan = clock.querySelector('.minutes');
	var secondsSpan = clock.querySelector('.seconds');

	function updateClock() {
		var t = getTimeRemaining(endtime);
		minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
		secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

		if (t.total <= 0) {
			clearInterval(timeinterval);
		}
	}

	updateClock();
	var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + min * 60 * 1000);
initializeClock('clockdiv', deadline);
	
</script>
</html>