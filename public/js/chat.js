
const chat =  document.querySelector('.jspScrollable') 
chat.scrollTop = chat.scrollHeight 


$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tes = button.data('whatever') // Extract info from data-* attributes
    var user = tes.split('|')
    var name = user[0]
    var image = user[1]
    var created = user[2]
    var modal = $(this)
    modal.find('.modal-body h1').text(name)
    modal.find('.modal-body .modalAvatar').attr('src', '/img/' + image) 
    modal.find('.modal-body p').text('created at: ' + created)
    // modal.find('.modal-body image').src('/img/' + image)
  })