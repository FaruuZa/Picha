function view(e) {
    var x = e.parentElement.querySelector('.inputPassword');
    if (x.type === "password") {
      x.type = "text";
      e.classList.remove('fa-eye');
      e.classList.add('fa-eye-slash');

    } else {
      x.type = "password";
      e.classList.remove('fa-eye-slash');
      e.classList.add('fa-eye');
    }
}
