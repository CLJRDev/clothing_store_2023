let resetButton = document.querySelector('.button_reset');
resetButton.addEventListener('click', () => {
  document.querySelector('.tu_khoa').value = '';
  document.querySelector('.kich_thuoc').selectedIndex = -1;
  document.querySelector('.gia_tu').value = '';
  document.querySelector('.gia_den').value = '';
  document.querySelector('.loai_san_pham').selectedIndex = -1;
  document.querySelector('.hang_san_xuat').selectedIndex = -1;
  document.querySelector('.gioi_tinh').selectedIndex = -1;
  document.querySelector('trang_thai').selectedIndex = -1;
});