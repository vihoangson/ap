@extends('layouts.app1')
@section('BodyContent')
<div class="text-center">
    <h2>Days together</h2>
    <div id="MyClockDisplay" class="clock"></div>
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
        channel.bind('App\\Events\\StatusLiked', function(data) {
            alert(data);
        });
    </script>
@endsection
