
const chat =  document.querySelector('.jspScrollable')
chat.scrollTop = chat.scrollHeight


$('#theirModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tes = button.data('whatever') // Extract info from data-* attributes
    var user = tes.split('|')
    var name = user[0]
    var image = user[1]
    var created = user[2]
    var modal = $(this)
    modal.find('.modal-body h1').text(name)
    modal.find('.modal-body .modalAvatar img').attr('src', '/img/' + image)
    modal.find('.modal-body p').text('created at: ' + created)
  })


$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tes = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-body .id').val(tes)
})
$('#reportModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tes = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-body .id').val(tes)
})

$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('whatever') // Extract info from data-* attributes
    var tes = button.parents('.ks-item .ks-body')
    var text = tes.find('.ks-message').text()
    var modal = $(this)
    modal.find('.modal-body .id').val(id)
    modal.find('.modal-body .pesan').val(text)


})

function copyMessage(e){
  f = e.parentElement.parentElement.parentElement.parentElement;
  message = f.querySelector('.ks-message').textContent
  navigator.clipboard.writeText(message);
  $('#copyToast').toast('show')
}

// function copyMessage(e){
//   var f = e.parents('.ks-item .ks-body');
//   var message = f.find('.ks-message').text()
//   navigator.clipboard.writeText(message);
//   $('#copyToast').toast('show')
// }

$('#kirimInput').change(function (event){
    var value = $(this).val();
    var tombol = $(this).parent().find('#kirimButton')
    if ( value.length > 0 ){
        tombol.prop('disabled', false)
    } else{
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
