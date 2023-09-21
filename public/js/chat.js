
const chat = document.querySelector('.jspScrollable')
chat.scrollTop = chat.scrollHeight


$('#theirModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var tes = button.data('whatever')
    var user = tes.split('|')
    var name = user[0]
    var image = user[1]
    var created = user[2]
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body h1').text(name)
    modal.find('.modal-body .modalAvatar img').attr('src', '/img/' + image)
    modal.find('.modal-header .trigger').data('id', id)
    modal.find('.modal-body p').text('created at: ' + created)
})


$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var tes = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-body .id').val(tes)
})
$('#leaveRoomModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var tes = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-body .id').val(tes)
})

$('#reportModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var apa = button.data('whatever')
    var id = button.data('id')
    var modal = $(this)
    if (apa == 'message') {
        modal.find('.modal-title').text('laporkan pesan')
    } else if (apa == 'user') {
        modal.find('.modal-title').text('laporkan user')
    }
    modal.find('.modal-body .id').val(id)
    modal.find('.modal-body .apa').val(apa)
})

$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('whatever')
    var tes = button.parents('.ks-item .ks-body')
    var text = tes.find('.ks-message').text()
    var modal = $(this)
    modal.find('.modal-body .id').val(id)
    modal.find('.modal-body .pesan').val(text)
})

function copyMessage(e) {
    f = e.parentElement.parentElement.parentElement.parentElement;
    message = f.querySelector('.ks-message').textContent
    navigator.clipboard.writeText(message);
    $('#copyToast').toast('show')
}

$('#kirimInput').change(function (event) {
    var value = $(this).val();
    var tombol = $(this).parent().find('#kirimButton')
    if (value.length > 0) {
        tombol.prop('disabled', false)
    } else {
        tombol.prop('disabled', true)
    }
})

var loadFile = function () {
    var image = $("#output");
    var button = $("#btnProfileDiri");
    var input = $("input#file")
    image.attr('src', URL.createObjectURL(input.prop('files')[0]))
    button.removeClass("btn-primary").addClass("btn-warning").attr('type', 'submit').attr('data-dismiss', '');
    button.text("edit")
};



//   $('document').ready(()=>{
//     setInterval(showMessages, 100);
//   })
