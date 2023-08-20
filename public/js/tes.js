function view() {
    var x = document.querySelector('#inputPassword');
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}