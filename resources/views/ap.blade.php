@extends('layouts.app1')
@section('BodyContent')
<div class="text-center">
    <h2>Days together</h2>
    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
</div>
@endsection
@section('FooterContent')
    <script>
        var i = 0;
        setInterval(()=>{            
            if(i > 100){
                i = 0;
                $(".progress").hide();                
                $(".page-header,.card-section").hide();
                $(".loading-page").show();
                setInterval(()=>{    
                    location.reload();                
                },2000);
                
            }else{
                $(".progress-bar").css({"width":i+"%"});
                i+=1;
                console.log(i);
            }            
        }, 100);


        function showTime(){
            var pastDate = new Date('2022-08-06T18:00:00');
            var date = new Date();
            let mdd = date - pastDate;

            var x = mdd/ (24*3600*1000);
            var decimals = x - Math.floor(x);
            console.log(Math.round(x)+":"+Math.round(decimals * 24)); //Returns 0.20000000000000018
            var d = Math.floor(x);

            var h = Math.round(decimals * 24); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";    
            session = '';    
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;    
            var time = d+" days | "+ h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;        
            setTimeout(showTime, 1000);        
        }
        showTime();
    </script>
@endsection
    