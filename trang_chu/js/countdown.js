let countDownDate = new Date("Jan 5, 2025 15:37:25").getTime();
let id = setInterval( () => {
  let now = new Date().getTime();
  let distance = countDownDate - now;
  let days = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.querySelector('.days').innerText = days;
  document.querySelector('.hours').innerText = hours;
  document.querySelector('.minutes').innerText = minutes;
  document.querySelector('.seconds').innerText = seconds;
  if(distance < 0)
    clearInterval(id);
}, 1000);