var current_target = null;
var current_target_id = null;
$(document).on('click', '.bubbleWrapper', (event) => {
    current_target = event.target;
    current_target_id = $(current_target).attr('data-id');
    $(".modal-body").html($(current_target).text());
    $(".modal-body").removeClass("d-none");
    $("#mi-modal").modal('show');
});

$(".thuhoi").click(() => {
    $.ajax({
        url: '/api/message/' + current_target_id,
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
})
$(".card-block").click(() => {
    timeoutPage = 0;
})


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
}

$(".input-text").keyup((e) => {
    i = 1;
    if (e.which === 13) {
        sendMessage();
    }
})

function sendMessage() {
    let userid = $(".userid:checked").val();
    let textInput = $(".input-text").val();
    $(".input-text").val('');
    $.post('/api/message', {"message": textInput, "userid": userid});
}
