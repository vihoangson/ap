@extends('layouts.app1')
@section('HeaderContent')
    <link rel="stylesheet/less" type="text/css" href="/css/chat.less"/>
    <script src="/js/less.js" type="text/javascript"></script>
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
                        <div class="msgcontent {{$m->userid ==2?'otherBubble other':'ownBubble own'}}"
                             data-id="{{$m->id}}">
                            {{$m->message}}
                        </div>
                    </div>
                    <span class="own d-none">08:55</span>
                </div>
            @endforeach
        </div>
        <input type="text" name="input-text" class="form-control input-text" placeholder="Chat message">
    </div>

    <div class="text-center">
        <button class="btn btn-primary" onclick="sendMessage()">Send</button>
        <a class="btnlogout btn btn-secondary" href="/logout">Logout</a></div>
    <div class="text-center"></div>


    <div class="modal" tabindex="-1" role="dialog" id="mi-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-none">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger thuhoi">Thu hồi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
        var MessageService = {
            addMessage: (m) => {
                let mss = $(".bubbleWrapper").first().clone();
                $(mss).find('.msgcontent').html(m.message);
                $(mss).find('.msgcontent').attr('data-id', m.data.id);
                if (m.userid == 2) {
                    $(mss).find('.msgcontent').addClass('otherBubble other');
                    $(mss).find('.msgcontent').removeClass('ownBubble own');
                    $(mss).find('.inlineContainer').removeClass('own');
                } else {
                    $(mss).find('.inlineContainer').addClass('own');
                }
                $(mss).find('.msgcontent').html(m.message);
                $('#wrapMessage').append(mss);
            },
            gotoBottom: () => {
                let out = document.getElementById("wrapMessage");
                out.scrollTop = out.scrollHeight - out.clientHeight;
            },
            sendMessage: () => {
                let userid = $(".userid:checked").val();
                let textInput = $(".input-text").val();
                $(".input-text").val('');
                $.post('/api/message', {"message": textInput, "userid": userid});
            }
        }

        var pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
            cluster: '{{config('broadcasting.connections.pusher.options.cluster')}}',
            encrypted: true
        });
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('status-liked');
        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\StatusLiked', (data) => {
            MessageService.addMessage(data);
            MessageService.gotoBottom();
        });

    </script>
    <script src="/js/chat.js"></script>
@endsection
