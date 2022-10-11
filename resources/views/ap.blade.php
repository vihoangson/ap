@extends('layouts.app1')
@section('BodyContent')
<h2>Days together: {{$days}} </p>
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
                i+=1
                console.log(i);
            }            
        }, 100);
    </script>
@endsection
    