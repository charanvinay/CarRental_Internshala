function forgetPasswordValidate() {
  var email = document.form.email.value;
  var psd = document.form.password.value;
  var cpsd = document.form.cpassword.value;
  var sec = document.form.secQuestion.value;
  var secans = document.form.securityvalue.value;
  if (
    email.trim().length == 0 ||
    psd.trim().length == 0 ||
    cpsd.trim().length == 0 ||
    secans.trim().length == 0 ||
    sec == "Choose..."
  ) {
    document.getElementById("warn").innerHTML = "Please fill all the fields";
    return false;
  } else if (psd.trim().length < 6) {
    document.getElementById("warn").innerHTML = "Password must be 6 letters";
    return false;
  } else if (psd != cpsd) {
    document.getElementById("warn").innerHTML = "Passwords not matched";
    return false;
  } else {
    return true;
  }
}
