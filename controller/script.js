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
