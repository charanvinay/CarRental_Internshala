function validate() {
  var email = document.form.email.value;
  var cust = document.getElementById("cust");
  var agent = document.getElementById("agent");
  var psd = document.form.password.value;
  var cpsd = document.form.cpassword.value;
  var sec = document.form.secQuestion.value;
  var secans = document.form.securityvalue.value;
  const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (cust.checked == false && agent.checked == false) {
    document.getElementById("warn").innerHTML = "Please select Registration type";
    return false;
  } else if (
    email.trim().length == 0 ||
    psd.trim().length == 0 ||
    cpsd.trim().length == 0 ||
    sec == "Choose..." ||
    secans.trim().length == 0
  ) {
    document.getElementById("warn").innerHTML = "Please fill all the fields";
    return false;
  } else if (!email.match(mailformat)) {
    document.getElementById("warn").innerHTML = "Please use valid email id";
    return false;
  } else if (psd.trim().length < 6) {
    document.getElementById("warn").innerHTML = "Password must be 6 letters</h5>";
    return false;
  } else if (psd != cpsd) {
    document.getElementById("warn").innerHTML = "Passwords not matched</h5>";
    return false;
  } else {
    return true;
  }
}
