
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

function copyMessage(e){
  f = e.parentElement;
  g = f.parentElement;
  h = g.parentElement;
  i = h.parentElement;
  message = i.querySelector('.ks-message').textContent
  navigator.clipboard.writeText(message);
  $('#copyToast').toast('show')
}
