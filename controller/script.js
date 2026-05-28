const checkEmpty = () => {
  let user = document.getElementById("user");
  let pass = document.getElementById("pass");

  if (!user.value.trim()) {
    alert("Bạn chưa điền Tên đăng nhập");
    user.focus();
    return false;
  } else if (!pass.value.trim()) {
    alert("Bạn chưa điền Mật khẩu");
    pass.focus();
    return false;
  } else {
    return true;
  }
};

const checkPayment = () => {
  let name = document.getElementById("name");
  let address = document.getElementById("address");
  let email = document.getElementById("email");
  let tel = document.getElementById("tel");
  let pttt = document.querySelector('input[name="pttt"]:checked');

  if (!name.value.trim()) {
    alert("Bạn chưa nhập Họ tên");
    name.focus();
    return false;
  } else if (!address.value.trim()) {
    alert("Bạn chưa nhập Địa Chỉ");
    address.focus();
    return false;
  } else if (!email.value.trim()) {
    alert("Bạn chưa nhập Email");
    email.focus();
    return false;
  } else if (!tel.value.trim()) {
    alert("Bạn chưa nhập Số điện thoại");
    tel.focus();
    return false;
  } else if (!pttt) {
    alert("Bạn chưa chọn phương thức thanh toán");
    return false;
  } else {
    return true;
  }
};
