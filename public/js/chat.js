var current_target = null;
var current_target_id = null;
$(document).on('click', '.msgcontent', (event) => {
    current_target = $(event.target).closest('.msgcontent');
    // current_target.closest('.msgcontent')
    current_target_id = $(current_target).attr('data-id');
    MessageService.current_target_id = current_target_id;
    $(".modal-body").html($(current_target).html());
    $(".modal-body").removeClass("d-none");
    $("#mi-modal").modal('show');
});
$(document).ready(() => {
    MessageService.gotoBottom();
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
});







