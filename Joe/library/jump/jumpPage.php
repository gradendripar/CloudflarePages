<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>执念博客.....</title>
    <style>
        @font-face {
            font-family: unidreamLED;
            src: url('./UnidreamLED.ttf')
            /* src: url("./UnidreamLED.ttf"); */
        }
        body{
            font-size: 0px;
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #cad6dd;
            overflow: hidden;
            background-color: #141929;
		    font-family: unidreamLED;
        }
        .NowData{
            background-image: -webkit-linear-gradient(bottom, rgb(255 0 0), rgb(120 8 220));
            background-size: 100% 20px;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .yearBox{
            height: 10vh;
            width: 10vh;
            position: absolute;
            display: flex;
            font-size: 16px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: 1s;
            background-image: -webkit-linear-gradient(bottom, rgb(255 0 0), rgb(120 8 220));
            background-size: 100% 20px;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .mounthBox{
            height: 25vh;
            width: 25vh;
            position: absolute;
            display: flex;
            align-items: center;
            border-radius: 50%;
            transition: 1s;
        }
        .dayBox{
            height: 40vh;
            width: 40vh;
            border-radius: 50%;
            display: flex;
            align-items: center;
            position: absolute;
            transition: 1s;
        }
        .hourBox{
            height: 55vh;
            width: 55vh;
            position: absolute;
            display: flex;
            align-items: center;
            transition: 1s;
            border-radius: 50%;
        }
        .minuteBox{
            height: 70vh;
            width: 70vh;
            position: absolute;
            display: flex;
            align-items: center;
            border-radius: 50%;
            transition: 1s;
        }
        .secondBox{
            height: 85vh;
            width: 85vh;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 50%;
            transition: 1s;
        }
    </style>
</head>
<body onload="location.href = https://zhinianblog.com;">

    <div class="secondBox"></div>
    <div class="minuteBox"></div>
    <div class="hourBox"></div>
    <div class="dayBox"></div>
    <div class="mounthBox"></div>
    <div class="yearBox"></div>

<script>
    let sencond = ``
    for(i=0;i<60;i++){
        let onediv = `<div id = "sencond${i+1}" style="font-size: 16px;width: 100%;text-align: right;position: absolute;display: inline-block;transform: rotate(${(i-1)*-6}deg);"> ${i+1} 秒</div>`
        sencond = sencond + onediv
    }
    document.querySelector('.secondBox').innerHTML = sencond
    let minute = ``
    for(i=0;i<60;i++){
        let onediv = `<div id = "minute${i+1}"  style="font-size: 16px;width: 100%;text-align: right;position: absolute;display: inline-block;transform: rotate(${(i)*-6}deg);"> ${i+1} 分</div>`
        minute = minute + onediv
    }
    document.querySelector('.minuteBox').innerHTML = minute
    let hour = ``
    for(i=0;i<24;i++){
        let onediv = `<div id = "hour${i+1}" style="font-size: 16px;width: 100%;text-align: right;position: absolute;display: inline-block;transform: rotate(${(i)*-15}deg);"> ${i+1} 时</div>`
        hour = hour + onediv
    }
    document.querySelector('.hourBox').innerHTML = hour
    let day = ``
    for(i=0;i<31;i++){
        let onediv = `<div id = "day${i+1}" style="font-size: 16px;width: 100%;text-align: right;position: absolute;display: inline-block;transform: rotate(${(i)*-11.25}deg);"> ${i+1} 日</div>`
        day = day + onediv
    }
    document.querySelector('.dayBox').innerHTML = day
    let mounth = ``
    for(i=0;i<12;i++){
        let onediv = `<div id = "mounth${i+1}" style="font-size: 16px;width: 100%;text-align: right;position: absolute;display: inline-block;transform: rotate(${(i)*-30}deg);"> ${i+1} 月</div>`
        mounth = mounth + onediv
    }
    document.querySelector('.mounthBox').innerHTML = mounth

    var sencond360 = 0
    var Minute360 = 0
    var hour360 = 0
    var day360 = 0
    var mounth360 = 0
    
    var oldsencond = 0
    var oldMinute = 0
    var oldhour = 0
    var oldday = 0
    var oldmounth = 0

    function transformBox(){
        let nowDate = new Date()
        let sencond = nowDate.getSeconds()
        let minute = nowDate.getMinutes()
        let hour = nowDate.getHours()
        let day = nowDate.getDate()
        let mounth = nowDate.getMonth()
        let year = nowDate.getFullYear()
        if(sencond === 0 && oldsencond !== sencond){
            sencond360 = sencond360 + 1 
        }
        if(minute === 0 && oldMinute !== minute){
            Minute360 = Minute360 + 1
        }
        if(hour === 0 && oldhour !== hour){
            hour360 = hour360 + 1
        }
        if(day === 1 && oldday !== day){
            day360 = day360 + 1
        }
        if(mounth === 0 && oldmounth !== mounth){
            mounth360 = mounth360 + 1
        }
        document.querySelector('.secondBox').style.transform = `rotate(${sencond360*360 + (sencond-1)*6}deg)`
        document.querySelector('.minuteBox').style.transform = `rotate(${Minute360*360 + (minute-1)*6}deg)`
        document.querySelector('.hourBox').style.transform = `rotate(${hour360*360 + (hour-1)*15}deg)`
        document.querySelector('.dayBox').style.transform = `rotate(${day360*360 + (day-1)*11.25}deg)`
        document.querySelector('.mounthBox').style.transform = `rotate(${mounth360*360 + (mounth)*30}deg)`
        document.querySelector('.yearBox').innerHTML = year + ' 年'
        let nowDates = document.querySelectorAll('.NowData')
        nowDates.forEach(element => {
            element.classList=''
        });
        document.querySelector(`#sencond${sencond+1}`).classList='NowData'
        document.querySelector(`#minute${minute===0?'60':minute}`).classList='NowData'
        document.querySelector(`#hour${hour===0?'24':hour}`).classList='NowData'
        document.querySelector(`#day${day}`).classList='NowData'
        document.querySelector(`#mounth${mounth+1}`).classList='NowData'

        oldsencond = sencond
        oldMinute = minute
        oldhour = hour
        oldday = day
        oldmounth = mounth
    }
    transformBox()
    setInterval(() => {
        transformBox()
    }, 1000);
	
	
	
	setInterval(() => {
		var url = getQueryVariable('url');
		if(!url) {
			url = "https://zhinianblog.com";
		}
        window.location.href = url;
    }, 3000);
	
	
	
	function getQueryVariable(variable) {
	    var reg = new RegExp("(^|&)" + variable + "=([^&]*)(&|$)", "i");
		var r = window.location.search.substr(1).match(reg);
		if (r != null) {
			return unescape(r[2]);
		}
		return null;
	}
</script>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>
</body>
</html>
