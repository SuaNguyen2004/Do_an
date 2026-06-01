const checkRegister = () => {
  let user = document.getElementById("user");
  let pass = document.getElementById("pass");

  if (user.value.length > 20) {
    alert("Tên tài khoản tối đa 20 kí tự");
    user.focus();
    return false;
  } else if (pass.value.length > 20) {
    alert("Mật khẩu tối đa 20 kí tự");
    pass.focus();
    return false;
  } else {
    return true;
  }
};

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

const validateForm = () => {
  if (!checkEmpty()) {
    return false;
  }
  if (!checkRegister()) {
    return false;
  }

  return true;
};

const checkPayment = () => {
  let name = document.getElementById("name");
  let address_detail = document.getElementById("address_detail");
  let province = document.getElementById("province");
  let district = document.getElementById("district");
  let email = document.getElementById("email");
  let tel = document.getElementById("tel");
  let pttt = document.querySelector('input[name="pttt"]:checked');

  if (!name.value.trim()) {
    alert("Bạn chưa nhập Họ tên");
    name.focus();
    return false;
  } else if (!address_detail.value.trim()) {
    alert("Bạn chưa nhập Địa chỉ cụ thể");
    address_detail.focus();
    return false;
  } else if (province.value == "") {
    alert("Bạn chưa chọn Tỉnh / thành phố");
    province.focus();
    return false;
  } else if (district.value == "") {
    alert("Bạn chưa chọn Quận/ Huyện");
    district.focus();
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
