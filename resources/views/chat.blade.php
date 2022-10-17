@extends('layouts.app1')

@section('HeaderContent')
    <style>

        .bubbleWrapper {
            padding: 2px 10px;
            display: flex;
            justify-content: flex-end;
            flex-direction: column;
            align-self: flex-end;
            color: #fff;
        }

        .inlineContainer {
            display: inline-flex;
        }

        .inlineContainer.own {
            flex-direction: row-reverse;
        }

        .inlineIcon {
            width: 20px;
            object-fit: contain;
        }

        .ownBubble {
            min-width: 60px;
            max-width: 700px;
            padding: 2px 18px;
            margin: 6px 8px;
            background-color: #d596a0;
            border-radius: 16px 16px 0 16px;
            border: 1px solid #ddb0b7;

        }

        .otherBubble {
            min-width: 60px;
            max-width: 700px;
            padding: 2px 18px;
            margin: 6px 8px;
            background-color: #6C8EA4;
            border-radius: 16px 16px 16px 0;
            border: 1px solid #54788e;

        }

        .own {
            align-self: flex-end;
            text-align: right;

        }

        .other {
            align-self: flex-start;
            text-align: left;

        }

        span.own,
        span.other {
            font-size: 14px;
            color: grey;
        }

        .type1 {
            color: deeppink;
            text-align: left;
        }

        .type2 {
            color: darkslateblue;
            text-align: right;
        }

        div#wrapMessage {
            overflow: auto;
            height: 338px;
        }
        .card-block{
            padding:13px;
        }

        @media only screen and (max-width: 800px) {
            .page-caption {
                padding-top: 34px;
                padding-bottom: 62px;
            }
        }
    </style>
@endsection
@section('BodyContent')


    <div class="text-center">
        <h2>Chat</h2>
        <input type="radio" class="userid" name="userid" value="1" checked id="userid1"> <label for="userid1">Em</label>
        <input type="radio" class="userid" name="userid" value="2" id="userid2"> <label for="userid2">Anh</label>

        <div id="wrapMessage">
            @foreach ($ms as $m)
                <div class="bubbleWrapper">
                    <div class="inlineContainer {{$m->userid ==1?'own':''}}">
                        <img class="inlineIcon d-none"
                             src="https://www.pinclipart.com/picdir/middle/205-2059398_blinkk-en-mac-app-store-ninja-icon-transparent.png">
                        <div class="msgcontent {{$m->userid ==2?'otherBubble other':'ownBubble own'}}">
                            {{$m->message}}
                        </div>
                    </div>
                    <span class="own d-none">08:55</span>
                </div>
            @endforeach
        </div>
        <input type="text" name="input-text" class="form-control input-text" placeholder="Chat message">
    </div>
@endsection
@section('FooterContent')
    <script>
        var config = {
            time_count: 10000
        }
    </script>
    <script src="/js/countdownloadpage.js"></script>

    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
        $(".card-block").click(()=>{
            i = 0;
        })

        var pusher = new Pusher('78735b7d18aa1796faad', {
            cluster: 'ap1',
            encrypted: true
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('status-liked');

        function gotoBottom() {
            let out = document.getElementById("wrapMessage");
            out.scrollTop = out.scrollHeight - out.clientHeight;
        }

        gotoBottom();
        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\StatusLiked', (data) => {
            addMessage(data);
            gotoBottom();
        });

        function addMessage(m) {
            let mss = $(".bubbleWrapper").first().clone();
            $(mss).find('.msgcontent').html(m.message);
            if (m.userid == 2) {
                $(mss).find('.msgcontent').addClass('otherBubble other');
                $(mss).find('.msgcontent').removeClass('ownBubble own');
                $(mss).find('.inlineContainer').removeClass('own');

            } else {
                $(mss).find('.inlineContainer').addClass('own');
            }

            $(mss).find('.msgcontent').html(m.message);
            $('#wrapMessage').append(mss);


            // $('#wrapMessage').append($('<div class="ele-message type'+m.userid+'">').html(m.message));
        }

        $(".input-text").keyup((e) => {
            i = 1;
            if (e.which === 13) {
                let userid = $(".userid:checked").val();
                let textInput = $(".input-text").val();
                $(".input-text").val('');
                $.post('/api/message', {"message": textInput, "userid": userid});
            }
        })
    </script>
@endsection
