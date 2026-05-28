const checkEmptyDM = () => {
  let tendm = document.getElementById("tendm");

  if (!tendm.value.trim()) {
    alert("Bạn chưa điền Tên danh mục");
    tendm.focus();
    return false;
  } else {
    return true;
  }
};

const checkEmptySP = () => {
  let iddm = document.getElementById("iddm");
  let tensp = document.getElementById("tensp");
  let img = document.getElementById("img");

  if (iddm.value == 0) {
    alert("Bạn chưa chọn danh mục");
    iddm.focus();
    return false;
  } else if (!tensp.value.trim()) {
    alert("Bạn chưa điền Tên sản phẩm");
    tensp.focus();
    return false;
  } else if (img.value == "") {
    alert("Bạn chưa upload Ảnh sản phẩm");
    img.focus();
    return false;
  } else {
    return true;
  }
};
