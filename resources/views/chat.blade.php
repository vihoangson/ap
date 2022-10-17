@extends('layouts.app1')
@section('BodyContent')
    <div class="text-center">
        <h2>Chat</h2>
        <div id="wrapMessage">
            @foreach ($ms as $m)
                <div class="ele-message">{{$m->message}}</div>
            @endforeach
        </div>
        <input type="text" name="input-text" class="form-control input-text" placeholder="Chat message">
    </div>
@endsection
@section('FooterContent')
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
            addMessage(data.username);
        });

        function addMessage(m) {
            $('#wrapMessage').append($('<div class="ele-message">').html(m));
        }
        $(".input-text").keyup((e)=>{
            if(e.which ===13){
                let textInput = $(".input-text").val();
                $(".input-text").val('');
                $.post('/api/message',{"message":textInput});
            }
        })


    </script>
@endsection
