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
                             src="">
                        <div class="msgcontent {{$m->userid ==2?'otherBubble other':'ownBubble own'}}"
                             data-id="{{$m->id}}">
                            {{$m->message}}
                        </div>
                    </div>
                    <span class="own d-none">08:55</span>
                </div>
            @endforeach
        </div>
        <div class="">
            <div class="">
                <div class="float-right">
                    <input type="file" class="d-none" id="inputFile">
                    <button class="btn btn-primary" onclick="MessageService.upFile()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                            <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                            <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"></path>
                        </svg>
                    </button>
                    <button class="btn btn-primary" onclick="MessageService.sendMessage()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"></path>
                        </svg></button>
                </div>
                <div class="wrap-text-input">
                    <input type="text" name="input-text" class="form-control input-text" placeholder="Chat message">
                </div>
                <div class="clearfix"></div>

            </div>
        </div>

    </div>

    <div class="text-center">



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
    <script src="/js/pusher.js"></script>
    <script>
        var MessageService = {
            current_target_id: 0,
            addEvents: (selector) => {
                selector.on('render', function (e) {
                    let m = $(this).find('.msgcontent');
                    let mmm = m.html();
                    let text = m.text().trim();
                    let result = (text.match(/\[img id:"(.+)"\]/));
                    if (result != null) {
                        console.log(result[1]);
                        $.get('/api/upload/' + result[1], (data) => {
                            let url = '/storage/files/' + data.filename + '/' + data.filename;
                            m.html("<div class='text-center img-preview'><img src='" + url + "'></div>");
                        })
                    }
                })
            },
            addMessage: (m) => {
                let mss = $(".bubbleWrapper").first().clone();
                $(mss).find('.msgcontent').html(m.message);
                $(mss).find('.msgcontent').attr('data-id', m.data.id);
                MessageService.addEvents($(mss));
                if (m.userid == 2) {
                    $(mss).find('.msgcontent').addClass('otherBubble other');
                    $(mss).find('.msgcontent').removeClass('ownBubble own');
                    $(mss).find('.inlineContainer').removeClass('own');
                } else {
                    $(mss).find('.inlineContainer').addClass('own');
                }
                $(mss).find('.msgcontent').html(m.message);
                $('#wrapMessage').append(mss);
                $(mss).trigger('render');
            },
            gotoBottom: () => {
                let out = document.getElementById("wrapMessage");
                out.scrollTop = out.scrollHeight - out.clientHeight;
            },
            sendMessage: () => {
                let userid = $(".userid:checked").val();
                let textInput = $(".input-text").val();
                $(".input-text").val('');
                $.post('/api/message', {"message": textInput, "userid": userid}, () => {
                    //$(".bubbleWrapper").trigger('render');
                });
            },
            thuhoi() {
                if (this.current_target_id === undefined) return;
                $.ajax({
                    url: '/api/message/' + this.current_target_id,
                    type: 'DELETE',
                    contentType: 'application/json',  // <---add this
                    dataType: 'text',                // <---update this
                    success: function (result) {
                        location.reload();
                    },
                    error: function (result) {
                        alert('error');
                    }
                });
            },
            upFile() {
                $("#inputFile").click();
            }
        }
        $("#inputFile").change(() => {
            uploadFile(() => {
                MessageService.sendMessage();
            });
        })
        $('.input-text').on('add-text', function (e, data) {
            console.log(data);
            $(this).val('[img id:"' + data.id + '"]');
        });

        function uploadFile(callback) {
            var file_data = $('#inputFile').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '/api/upload', // <-- point to server-side PHP script
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: (php_script_response) => {
                    data = JSON.parse(php_script_response);
                    $('.input-text').trigger('add-text', {id: data.id});
                    callback();
                }
            });
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
