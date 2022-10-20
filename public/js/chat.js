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
    MessageService.thuhoi(current_target_id);
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





