function hideForm(id, s) {
  document.getElementById(id).style.display = s;
}

function showFormRegister() {
  hideForm("f-register", "block");
  hideForm("flogin", "none");
}

function showPassLogin() {
  var pass = document.getElementById("matkhau");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}

// register form
function showPassRegister() {
  var pass = document.getElementById("txtmatkhau");
  var pass2 = document.getElementById("txtnhaplaimatkhau");
  if (pass.type === "password" && pass2.type === "password") {
    pass.type = "text";
    pass2.type = "text";
  } else {
    pass.type = "password";
    pass2.type = "password";
  }
}

function checkEmail() {
  var email = document.getElementById("txtemail");
  var messError = document.getElementById("messError");
  if (email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    messError.innerHTML = "Vui lòng nhập đúng định dạng email. VD: abc@abc.com";
    inputError(email);
    return false;
  }
}

function checkTenND() {
  var tennd = document.getElementById("txttennd");
  var messError = document.getElementById("messError");
  if (tennd.value.length < 2 || tennd.value.length > 20) {
    messError.innerHTML = "Tên người dùng dài hơn 2 kí tự và nhỏ hơn 21 kí tự!";
    inputError(tennd);
    return false;
  }
}

function checkMatKhau() {
  var matkhau = document.getElementById("txtmatkhau");
  var messError = document.getElementById("messError");
  if (!matkhau.value.match(/^.{5,15}$/)) {
    messError.innerHTML = "Mật khẩu phải từ 5-15 kí tự!";
    inputError(matkhau);
    return false;
  }
}

function checkNhapLaiMatKhau() {
  var matkhau = document.getElementById("txtmatkhau");
  var nhaplaimatkhau = document.getElementById("txtnhaplaimatkhau");
  var messError = document.getElementById("messError");
  if (matkhau.value !== nhaplaimatkhau.value) {
    messError.innerHTML = "Mật khẩu nhập lại không chính xác!";
    inputError(nhaplaimatkhau);
    return false;
  }
}

function inputError(i) {
  let x = document.getElementById(i);
  x.style.borderColor = "1px solid red !important";
  x.focus();
}

function dropMenuInfo(i) {
  document.getElementById(i).classList.toggle("show");
}
