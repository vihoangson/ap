var i = 0;
setInterval(()=>{
    if(i > 100){
        i = 0;
        $(".progress").hide();
        $(".page-header,.card-section").hide();
        $(".loading-page").show();
        setInterval(()=>{
            location.href = '/';
        },2000);
    }else{
        $(".progress-bar").css({"width":i+"%"});
        i+=1;
    }
}, config.time_count);
console.log(config.time_count);
