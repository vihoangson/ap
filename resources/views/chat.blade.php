@extends('layouts.app1')

@section('HeaderContent')
    <style>
        .type1{
            color:deeppink;
            text-align: left;
        }
        .type2{
            color:darkslateblue;
            text-align: right;
        }
    </style>
@endsection
@section('BodyContent')
    <div class="text-center">
        <h2>Chat</h2>
        <input type="radio" class="userid" name="userid" value="1" checked id="userid1"> <label for="userid1" >Em</label>
        <input type="radio" class="userid" name="userid" value="2"  id="userid2"> <label for="userid2" >Anh</label>

        <div id="wrapMessage">
            @foreach ($ms as $m)
                <div class="ele-message type{{$m->userid}}">{{$m->message}}</div>
            @endforeach
        </div>
        <input type="text" name="input-text" class="form-control input-text" placeholder="Chat message">
    </div>
@endsection
@section('FooterContent')
    <script>
        const COUNT_TIME = 1000;
    </script>
    <script src="/js/countdownloadpage.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>

        var pusher = new Pusher('78735b7d18aa1796faad', {
            cluster: 'ap1',
            encrypted: true
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('status-liked');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\StatusLiked', (data) => {
            addMessage(data);
        });

        function addMessage(m) {
            $('#wrapMessage').append($('<div class="ele-message type'+m.userid+'">').html(m.message));
        }
        $(".input-text").keyup((e)=>{
            i = 1;
            if(e.which ===13){
                let userid = $(".userid:checked").val();
                let textInput = $(".input-text").val();
                $(".input-text").val('');
                $.post('/api/message',{"message":textInput,"userid":userid});
            }
        })
    </script>
@endsection
