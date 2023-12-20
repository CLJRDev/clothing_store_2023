initialCheckOutPrice();
function initialCheckOutPrice(){
  let totalCheckout = 0;
  document.querySelectorAll('.total_price').forEach(item => {
    let convertedPrice = Number(item.innerText.split('$')[1]);
    totalCheckout += convertedPrice;
  });
  let spanElement = document.createElement('span');
  spanElement.style.color = '#ffbb38';
  spanElement.classList.add('fw-bold');
  spanElement.innerText = `($${totalCheckout})`;
  let checkOutButton = document.querySelector('.checkout_button');
  checkOutButton.innerText = `Thanh toán `;
  checkOutButton.appendChild(spanElement);
}
document.querySelectorAll('.so_luong_input').forEach(item => {
  item.addEventListener('input', (e) => {
    let quantity = Number(e.target.value);
    let price = item.dataset.price;
    let id = item.dataset.id;
    let totalPrice = Number(price * quantity);
    document.getElementById(`tong_tien_${id}`).innerText = `$${totalPrice}`;
    initialCheckOutPrice();
  })
}); 
