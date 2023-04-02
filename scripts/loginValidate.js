function validate() {
  var u = document.form.email.value;
  var p = document.form.password.value;
  if (u.trim().length == 0) {
    document.getElementById("warn").innerHTML = "Please enter your register email id";
    return false;
  } else if (p.trim().length == 0) {
    document.getElementById("warn").innerHTML = "Please enter your password";
    return false;
  } else {
    return true;
  }
}
