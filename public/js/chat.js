var current_target = null;
var current_target_id = null;
$(document).on('click', '.msgcontent', (event) => {
    current_target = event.target;
    current_target_id = $(current_target).attr('data-id');
    MessageService.current_target_id = current_target_id;
    $(".modal-body").html($(current_target).html());
    $(".modal-body").removeClass("d-none");
    $("#mi-modal").modal('show');
});

$(".thuhoi").click(() => {
    MessageService.thuhoi();
})
$(".card-block").click(() => {
    timeoutPage = 0;
})
MessageService.gotoBottom();
$(".input-text").keyup((e) => {
    i = 1;
    if (e.which === 13) {
        MessageService.sendMessage();
    }
})
MessageService.addEvents($(".bubbleWrapper"));
$(".bubbleWrapper").trigger('render');




