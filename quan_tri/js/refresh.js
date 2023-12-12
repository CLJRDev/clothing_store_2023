document.querySelectorAll('.button_reset').forEach(resetButton => {
  resetButton.addEventListener('click', () => {
    document.querySelectorAll('.js_text').forEach(jsText =>{
      jsText.value = '';
    });
    document.querySelectorAll('.js_select').forEach(jsSelect =>{
      jsSelect.value = -1;
    });
  });
});
