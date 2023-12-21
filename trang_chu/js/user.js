//Thẻ ảnh
let inputImg = document.getElementById('user_img');
//Thẻ input
let inputFile = document.getElementById('HinhAnh');
//Hàm load ảnh
inputFile.addEventListener('change', function(){
  inputImg.src = URL.createObjectURL(this.files[0]);
});