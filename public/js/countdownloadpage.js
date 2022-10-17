var i = 0;
const COUNT_TIME = 1000;
setInterval(()=>{
    if(i > 100){
        i = 0;
        $(".progress").hide();
        $(".page-header,.card-section").hide();
        $(".loading-page").show();
        setInterval(()=>{
            location.reload();
        },COUNT_TIME);

    }else{
        $(".progress-bar").css({"width":i+"%"});
        i+=1;
        console.log(i);
    }
}, 100);
