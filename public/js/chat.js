var AppService = {
    showLoadingScreen: () => {
        $('#loadingScreen').show();
    },
    hideLoadingScreen: () => {
        $('#loadingScreen').hide();
    },
    setCurrentUserId: () => {
        let crr_userid = localStorage.getItem('userid');
        $("#userid" + crr_userid).prop('checked', 'checked');
        $(".userid").change((e) => {
            localStorage.setItem('userid', $(e.target).attr('value'));
        })
    }
}

// set radio button
AppService.setCurrentUserId();

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
                    let url = data.fullurl;
                    m.html("<div class='text-center img-preview'><img src='" + url + "'></div>");
                })
            }
        })
    },
    deleteMessage:(id_delete)=>{
        $(".bubbleWrapper").find('[data-id=' + id_delete + ']').hide();
    },
    addMessage: (m) => {
        let mss = $(".bubbleWrapper").first().clone();
        $(mss).find('.msgcontent').html(m.message);
        $(mss).find('.msgcontent').attr('data-id', m.data.id);
        $(mss).attr('data-id', m.data.id);
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
        MessageService.gotoBottom();
    },
    gotoBottom: () => {
        console.log('gotoBottom');
        let out = document.getElementById("wrapMessage");
        out.scrollTop = out.scrollHeight - out.clientHeight + 100;
    },
    sendMessage: () => {
        if($(".input-text").val().trim() === ''){
            alert('Please enter text');
            return;
        }
        let userid = $(".userid:checked").val().trim();
        let textInput = $(".input-text").val().trim();
        $(".input-text").val('');
        AppService.showLoadingScreen();
        $.post('/api/message', {"message": textInput, "userid": userid}, () => {
            AppService.hideLoadingScreen();
        });
    },
    thuhoi() {
        console.log('thuhoi');
        if (this.current_target_id === undefined) return;
        AppService.showLoadingScreen();
        $.ajax({
            url: '/api/message/' + this.current_target_id,
            type: 'DELETE',
            contentType: 'application/json',  // <---add this
            dataType: 'text',                // <---update this
            success: function (result) {
                AppService.hideLoadingScreen();
                $("#mi-modal").modal('hide');
            },
            error: function (result) {
                AppService.hideLoadingScreen();
                $("#mi-modal").modal('hide');
            }
        });
    },
    upFile() {
        $("#inputFile").click();
    }
}
// Sau 2 giây thì nhảy xuống dưới
setTimeout(() => {
    MessageService.gotoBottom();
}, 500);

function uploadFile(callback) {
    var file_data = $('#inputFile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    AppService.showLoadingScreen();
    $.ajax({
        url: '/api/upload', // <-- point to server-side PHP script
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: (php_script_response) => {
            AppService.hideLoadingScreen();
            data = JSON.parse(php_script_response);
            $('.input-text').trigger('add-text', {id: data.id});
            callback();
        },
        error: () => {
            AppService.hideLoadingScreen();
        }
    });
}


var pusher = new Pusher(config.pusher_key, {
    cluster: config.pusher_cluster,
    encrypted: true
});
// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('sent-message');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\SentMessage', (data) => {
    MessageService.addMessage(data);
});
channel.bind('App\\Events\\DeleteMessage', (data) => {
    MessageService.deleteMessage(data.data.id);
});


var current_target = null;
var current_target_id = null;
$(document).on('click', '.msgcontent', (event) => {
    current_target = $(event.target).closest('.msgcontent');
    current_target_id = $(current_target).attr('data-id');
    MessageService.current_target_id = current_target_id;
    $(".modal-body").html($(current_target).html());
    $(".modal-body").removeClass("d-none");
    $("#mi-modal").modal('show');
});

MessageService.addEvents($(".bubbleWrapper"));
$(".bubbleWrapper").trigger('render');

$(".input-text").keyup((e) => {
    i = 1;
    if (e.which === 13) {
        MessageService.sendMessage();
    }
})
$(".card-block").click(() => {
    timeoutPage = 0;
})
$(".thuhoi").click(() => {
    MessageService.thuhoi();
})
$("#inputFile").change(() => {
    uploadFile(() => {
        MessageService.sendMessage();
    });
})
$('.input-text').on('add-text', function (e, data) {
    $(this).val('[img id:"' + data.id + '"]');
});







