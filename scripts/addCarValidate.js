function validate() {
  var vm = document.form.vmodel.value;
  var vn = document.form.vnumber.value;
  var vc = document.form.vcapacity.value;
  var rent = document.form.rent.value;
  if (
    vm.trim().length == 0 ||
    vn.trim().length == 0 ||
    vc.trim().length == 0 ||
    rent.trim().length == 0
  ) {
    document.getElementById("warn").innerHTML = "Please fill all the fields";
    return false;
  } else {
    return true;
  }
}

function valid() {
  var n = document.conForm.noofdays.value;
  var d = document.conForm.date.value;
  if (n == 0 || d == 0) {
    document.getElementById("warn").innerHTML = "Please fill all the fields";
    return false;
  } else {
    return true;
  }
}
